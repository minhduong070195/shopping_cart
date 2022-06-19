<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::getProductIndex();
        $categories = Category::getAllCategories();
        $countFavoriteProduct = Product::getCountFavoriteProduct();

        return view('index')->with([
            'products' => $products,
            'categories' => $categories,
            'countFavorite' => $countFavoriteProduct,
            'test' => '<b>viet nam</b>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProduct(Request $request)
    {
        $data = Product::select('*')->where("name", "LIKE", "%{$request['product_name']}%")->get();
        $categories = Category::getAllCategories();
        $countFavoriteProduct = Product::getCountFavoriteProduct();

        return view('index')->with([
            'products' => $data,
            'countFavorite' => $countFavoriteProduct,
            'input' => $request->input(),
            'categories' => $categories,
        ]);
    }

    /**
     * Lấy danh sách các sản phẩm được yêu thích
     */
    public function getListFavoriteProduct()
    {
        if(Auth::guard('customer')->check()) {
            $listFavoriteProduct = Product::listFavoriteProduct();
            $countFavoriteProduct = Product::getCountFavoriteProduct();
            $categories = Category::getAllCategories();

            return view('page.products.products_in_favorite')->with([
                'listFavorite' => $listFavoriteProduct,
                'countFavorite' => $countFavoriteProduct,
                'categories' => $categories,
            ]);
        }else{
            return route('customer.getSignIn');
        }
    }

    /**
     * Api handle favorites product
     *
     * @param $id
     * @return array
     */
    public function changeFavoriteItem($id)
    {
        $results = [
            'success' => false,
            'link_login' => null,
            'data' => array(),
            'flag' => null,
            'message' => 'Chức năng yêu thích tạm thời không hoạt động, hãy trở lại vào lần sau.',
        ];
        $product = Product::where(['id' => $id])->first();
        if ($product) {
            DB::beginTransaction();
            try {
                $success = false;
                if(!Auth::guard('customer')->check()) {
                    $results['success'] = true;
                    $results['link_login'] = route('customer.getSignIn');
                }else{
                    if ($product->favorites == 0) {
                        $success = Product::updateFavoriteById($id, 1);
                        $countFavorite = Product::getCountFavoriteProduct();
                        $results['success'] = true;
                        $results['data'] = $countFavorite;
                        $results['flag'] = 'like';
                        $results['message'] = 'Đã thêm sản phẩm vào mục yêu thích';
                    }
                    if ($product->favorites == 1) {
                        $success = Product::updateFavoriteById($id, 0);
                        $countFavorite = Product::getCountFavoriteProduct();
                        $results['success'] = true;
                        $results['data'] = $countFavorite;
                        $results['flag'] = 'dislike';
                        $results['message'] = 'Đã xóa sản phẩm khỏi mục yêu thích';
                    }

                    if ($success) {
                        DB::commit();
                    } else {
                        DB::rollBack();
                    }
                }
            } catch (\Exception $exception) {
                echo $exception->getMessage();
            }
        }

        return $results;
    }

    /**
     * @param $id
     * @return array
     */
    public function removeFavoriteItem($id)
    {
        $results = array(
            'view_render' => null,
            'quantity_favorite' => 0
        );
        DB::beginTransaction();
        try{
            // Xóa khỏi danh sách yêu thích => cập nhật favorite = 0
            $success = Product::updateFavoriteById($id, 0);
            $listFavoriteProduct = Product::listFavoriteProduct();
            $countFavoriteProduct = Product::getCountFavoriteProduct();
            $getListCategoryName = Category::getListCategoryName();

            if($success){
                DB::commit();
                $results['quantity_favorite'] = $countFavoriteProduct;
                $results['view_render'] = (string)view('page.render.list_favorite_render')->with([
                    'listFavorite' => $listFavoriteProduct,
                    'getListCategoryName' => $getListCategoryName
                ])->render();

                return $results;
            }else{
                DB::rollBack();
            }
        }
        catch (\Exception $exception){
            echo $exception->getMessage();
        }
    }


    //================= Bài Test Phỏng Vấn =================
    public function Cau_Hoi_2()
    {
        $input = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $output = array();

        // Dùng lặp For()
        //for ($i = count($input)-1; $i >= 0; $i--){
        //    array_push($output, $input[$i]);
        //}


        // Dùng lặp While()
        $output = array();
        $n = count($input);

        while ($n > 0){
            array_push($output, $input[$n-1]);
            $n-=1;
        }

        dd($output);
    }

    public function Cau_Hoi_3(){
        $array = ['b', 'd', 'b', 'a', 'b', 'd', 'b', 1, 'b', 'a', 'b'];
        $output = self::findActive($array);
        dd($output);
    }

    public function findActive($input)
    {
        $active = ceil(count($input)/2);
        $result = null;
        $outputArray = array();
        for($i = 0; $i < count($input); $i++){
            if(!isset($outputArray[$input[$i]])){
                $outputArray[$input[$i]] = 1;
            } else{
                $outputArray[$input[$i]] = $outputArray[$input[$i]] + 1;
            }
        }

        foreach ($outputArray as $key => $value){
            if($value == $active) {
                $result = $key;
            }
        }

        return $result;
    }
    //================= Bài Test Phỏng Vấn =================

    public function getProductDetail($id)
    {
        $results = array(
            'data' => null,
            'message' => 'Not Found',
            'code' => 404
        );

        if(!empty($id)){
            $product = Product::getProductById($id);

            if(!empty($product)){
                $results['data'] = $product;
                $results['message'] = 'success';
                $results['code'] = 200;
            }
        }

        return response()->json($results);
    }
}
