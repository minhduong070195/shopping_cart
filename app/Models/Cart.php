<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;
    public $listCategoryName = array();

    public function __construct($cart)
    {
        if($cart){
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuantity = $cart->totalQuantity;
            $this->listCategoryName = $cart->listCategoryName;
        }
    }

    public function addCart($product, $id)
    {
        $newProduct = array('quantity' => 0, 'price' => $product->price, 'productInfo' => $product);
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }

        $newProduct['quantity']++;
        $newProduct['price'] = $newProduct['quantity'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $product->price;
        // $this->getTotalPrice($product);
        $this->totalQuantity++;
        // $this->getTotalQuantity();
        $this->listCategoryName = Category::getListCategoryName();
    }

    public function removeItemCart($id)
    {
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }

    public function updateItemListCart($id, $quantity)
    {
        // B1: Lấy tổng SL và tổng tiền giỏ hàng - số lượng và tổng giá của sản phẩm có id = $id
        $this->totalQuantity -= $this->products[$id]['quantity'];
        $this->totalPrice -= $this->products[$id]['price'];

        // B2: Cập nhật lại số lượng và tổng giá của sp có id = $id
        if($quantity < 1){
            unset($this->products[$id]);
        }else{
            $this->products[$id]['quantity'] = $quantity;
            $this->products[$id]['price'] = $quantity * $this->products[$id]['productInfo']->price;
            // B3: Cập nhật lài tổng SL và tổng tiền giỏ hàng
            $this->totalQuantity += $this->products[$id]['quantity'];
            $this->totalPrice += $this->products[$id]['price'];
            $this->listCategoryName = Category::getListCategoryName();
        }
    }

    protected function getTotalPrice($product)
    {
        return $this->totalPrice += $product->price;
    }

    protected function getTotalQuantity()
    {
        return $this->totalQuantity++;
    }
}
