<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Twilio;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{

    /**
     * show page of customer
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $orders = Order::getOrderByTypePurchase(1);
        $orderToPay = array();
        foreach ($orders as $order){
            $orderToPay[$order['id']] = $order->orderDetail;
        }
        $countFavoriteProduct = Product::getCountFavoriteProduct();
        $categories = Category::getAllCategories();
        $getCategoryName = Category::getListCategoryName();

        return view('page.customer_page.index')->with([
            'countFavorite' => $countFavoriteProduct,
            'categories' => $categories,
            'orderToPay' => $orderToPay,
            'getCategoryName' => $getCategoryName,
        ]);
    }

    /**
     * show form sign in
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getSignIn()
    {
        return view('page.customer_page.auth.sign_in');
    }

    /**
     * handle logic sign in
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postSignIn(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:5|max:50',
            'password' => 'required',
        ]);

        if ($request['remember'] == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::guard('customer')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/fashi');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);

    }

    /**
     * show form sign up
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function getSignUp()
    {
        return view('page.customer_page.auth.sign_up');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postSignUp(RegisterRequest $request)
    {
        $customer = Customer::create($request->validated());

        Auth::guard('customer')->login($customer);

        return redirect('/me')->with('success', "Account successfully registered.");
    }

    /**
     * logout account customer
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/sign-in');
    }

    public function profile($id)
    {
        $profile = Customer::where('id', $id)->first();
        $genderList = Config::get('constants.gender');
        return view('page.customer_page.profile')->with([
            'profile' => $profile,
            'genderList' => $genderList
        ]);
    }

    /**
     * ajax render purchase to view /me
     *
     * @param $slug
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPurchase($slug)
    {
        DB::beginTransaction();
        try {
            $results = array(
                'success' => false,
                'data' => null,
                'message' => 'Error System, try again',
            );

            $listType = Config::get('constants.type_purchase');
            $getListType = Config::get('constants.get_type_purchase');
            if(in_array($slug, $listType)){
                $getCategoryName = Category::getListCategoryName();
                $categories = Category::getAllCategories();
                $listOrder = Order::getOrderByTypePurchase($getListType[$slug]);
                $orderToPay = array();
                foreach ($listOrder as $order){
                    $orderToPay[$order['id']] = $order->orderDetail;
                }

                $viewRender = view('page.render.me_render')
                    ->with([
                        'orderToPay' => $orderToPay,
                        'getCategoryName' => $getCategoryName,
                        'categories' => $categories,

                    ])->render();

                $results['success'] = true;
                $results['data'] = $viewRender;
                $results['message'] = 'successfully';
            }

            return response()->json($results);
        }catch (\Exception $e){
            echo $e->getMessage();
        }
    }

    public function updateProfile(Request $request, $customerId)
    {
        DB::beginTransaction();
        try {
            $file = $request->file('uploadImage');
            $input = $request->input();
            $customer = array();

            if($file){
                $filename= date('YmdHi').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('public/images/customer'), $filename);
                $customer['image']= $filename;
            }

            $customer['username'] = $input['username'];
            $customer['email'] = $input['email'];
            $customer['phone'] = $input['phone'];
            $customer['address'] = $input['address'];
            $genderList = Config::get('constants.gender');
            $customer['gender'] = $genderList[$input['gender']];
            $day = (strlen($input['birthday-day']) == 1) ? '0'.$input['birthday-day'] : $input['birthday-day'];
            $month = (strlen($input['birthday-month']) == 1) ? '0'.$input['birthday-month'] : $input['birthday-month'];
            $year = $input['birthday-day'];
            $customer['birthday'] = $day.'-'.$month.'-'.$year;

            $updateCus = Customer::where('id', $customerId)->update($customer);

            if($updateCus){
                DB::commit();
                return redirect('/me/update-profile/'.$customerId);
            }else{
                DB::rollBack();
            }
        }catch (\Exception $exception){
            dd('Error: '.$exception->getMessage().' at line '.$exception->getLine().' in file '.$exception->getFile());
        }
    }

    public function showForm()
    {
        $customer = Customer::find(Auth::guard('customer')->id());

        return view('page.customer_page.auth.verify_otp')->with(['phone' => $customer->phone]);
    }

    /**
     * Send OTP
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendOtp(Request $request)
    {
        $twilio = new Twilio();
        $id = 'AC0ad135b7fdb864b0b7c889d8856559ca';
        $token = '5f3467b5889e3e3869994e86e22c1547';
        $from = '+14405574270';
        $to = '+84398471928';
        $otp = rand(100000, 999999);
        $request->session()->put('session_otp', $otp);
        $results = $twilio->send_twilio_sms($id, $token, $from, $to, $otp);
        $xml = simplexml_load_string($results);
        $json = json_encode($xml);
        $response = json_decode($json);

        return response()->json($response);
    }

    /**
     * Function to verify OTP.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyOtp(Request $request){
        $otp = $request->otp;
        $result = array(
            'success' => false,
            'message' => 'Mobile number verification failed'
        );

        $otpSession = Session::has('session_otp') ? Session::get('session_otp') : null;
        if ($otp == $otpSession) {
            Session::forget('session_otp');
            $result['success'] = true;
            $result['message'] = 'Your mobile number is verified!';
        }

        return response()->json($result);
    }

    public function changePassword()
    {
        $customer = Customer::find(Auth::guard('customer')->id());

        return view('page.customer_page.auth.change_password');
    }
}
