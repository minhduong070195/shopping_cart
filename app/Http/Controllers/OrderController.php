<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\ZipCode;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * cart confirm
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function confirm()
    {
        $listCategoryName = Category::getListCategoryName();

        return view('page.cart.cart_confirm')->with([
            'getCategoryName' => $listCategoryName,
        ]);
    }

    /**
     * Save order
     *
     * @param Request $request
     * @return array
     */
    public function processBuy(Request $request)
    {
        $results = array(
            'success' => false,
            'message' => 'System error, try again',
            'redirect' => ''
        );

        DB::beginTransaction();
        try{
            $input = $request->input();

            if($input){
                $totalMoney = 0;
                foreach ($input['products'] as $product){
                    $product = Product::getProductById($product['product_id']);
                    $totalMoney += (int)$product['price'];
                }

                // Save Order
                $customerInfo = $input['customerInfo'];
                $customerId = Customer::getCustomerIdByEmail($customerInfo['email']);
                $dataOrder = array(
                    'customer_id' => $customerId['id'],
                    'order_code' => 'OD-'.Carbon::now()->format('YmdHis'),
                    'customer_name' => $customerInfo['name'],
                    'customer_email' => $customerInfo['email'],
                    'customer_phone' => $customerInfo['phone_number'],
                    'customer_address' => $customerInfo['address'],
                    'total_money' => $totalMoney,
                    'payment_method' => Config::get('constants.payment_method.PAYMENT_METHOD_ADVANCE'),
                    'status' => Config::get('constants.status.enable'),
                );

                $orderId = DB::table('orders')->insertGetId($dataOrder);

                // Save order detail
                $dataCart = array();
                foreach ($input['products'] as $key => $product){
                    $productModel = Product::getCategoryIdByProductId($product['product_id']);

                    $dataCart[$key]['order_id'] = $orderId;
                    $dataCart[$key]['category_id'] = $productModel['category_id'];
                    $dataCart[$key]['product_id'] = $product['product_id'];
                    $dataCart[$key]['quantity'] = $product['quantity'];
                    $dataCart[$key]['status'] = Config::get('constants.status.enable');
                }
                $saveOrderDetail = OrderDetail::insert($dataCart);

                if($orderId && $saveOrderDetail){
                    DB::commit();
                    $request->session()->forget('cart');

                    $results['success'] = true;
                    $results['message'] = 'Order Successfully ';
                    $results['redirect'] = route('fashi');

                    return $results;
                }else{
                    DB::rollBack();
                }
            }

        }catch (\Exception $exception){
            echo 'Message: ' . $exception->getMessage() . ' at line ' . $exception->getLine() . ' in ' .$exception->getFile();
        }
    }

    public function getZipCode()
    {
        $result = array(
            'success' => false,
            'data' => null,
        );
        $zipcodeModel = ZipCode::getZipCode($_POST['zipcode']);

        if($zipcodeModel){
            $result['success'] = true;
            $result['data']['refecture_name'] = $zipcodeModel['refecture_name'];
        }
        return response()->json($result);
    }
}
