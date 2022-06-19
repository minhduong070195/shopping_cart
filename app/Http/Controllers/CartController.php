<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    /**
     * get list product in cart
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countFavoriteProduct = Product::getCountFavoriteProduct();
        $categories = Category::getAllCategories();
        $listCategoryName = Category::getListCategoryName();

        return view('page.cart.list_cart')->with([
            'countFavorite' => $countFavoriteProduct,
            'categories' => $categories,
            'getCategoryName' => $listCategoryName,
        ]);
    }

    /**
     * Add product to cart
     *
     * @param Request $request
     * @param $id
     * @return array
     */
    public function addCart(Request $request, $id)
    {
        $results = [
            'success' => false,
            'link_login' => null,
            'view_render' => null,
        ];

        if(Auth::guard('customer')->check()){
            $product = DB::table('products')->find($id);
            if($product != null){
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $newCart = new Cart($oldCart);
                $newCart->addCart($product, $id);
                $request->session()->put('cart', $newCart);
            }
            $results['success'] = true;
            $results['view_render'] = view('page.render.cart_render')->render();
        }else{
            $results['success'] = true;
            $results['link_login'] = route('customer.getSignIn');
        }

        return $results;
    }

    /**
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function removeItemCart(Request $request, $id)
    {
        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->removeItemCart($id);

        if(count($newCart->products) > 0){
            $request->session()->put('cart', $newCart);
        }else{
            $request->session()->forget('cart');
        }

        return view('page.render.cart_render');
    }

    /**
     * @param Request $request
     * @param $id
     * @return array
     */
    public function removeItemListCart(Request $request, $id)
    {
        $results = array(
            'view_cart' => null,
            'view_list' => null
        );

        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->removeItemCart($id);

        if(count($newCart->products) > 0){
            $request->session()->put('cart', $newCart);
        }else{
            $request->session()->forget('cart');
        }

        $results['view_cart'] = (string)view('page.render.cart_render');
        $results['view_list'] = (string)view('page.render.list_cart_render');

        return $results;
    }

    /**
     * @param Request $request
     * @param $id
     * @param $quantity
     * @return array
     */
    public function updateItemListCart(Request $request, $id, $quantity){
        $results = array(
            'view_cart' => null,
            'view_list' => null,
        );

        $oldCart = Session('cart') ? Session('cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updateItemListCart($id, $quantity);
        $request->session()->put('cart', $newCart);

        $results['view_cart'] = (string)view('page.render.cart_render')->render();
        $results['view_list'] = (string)view('page.render.list_cart_render')->render();

        return $results;
    }
}
