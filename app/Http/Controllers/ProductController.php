<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function getProductByCategory($name)
    {
        $category = Category::getCategoryByName($name);
        $categoryId = null;
        if($category){
            $categoryId = $category->id;
        }
        $listProduct = Product::getListProductByCategoryId($categoryId);

        $categories = Category::getAllCategories();
        $countFavoriteProduct = Product::getCountFavoriteProduct();

        return view('page.products.products_in_category')->with([
            'products' => $listProduct,
            'categories' => $categories,
            'countFavorite' => $countFavoriteProduct
            ]);

    }
}
