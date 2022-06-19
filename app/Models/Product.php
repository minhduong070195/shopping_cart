<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'price', 'image'];

    // Begin RelationShip
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    // End RelationShip

    public static function getAllProduct()
    {
        return Product::all();
    }

    public static function getProductIndex()
    {
        return Product::where('display_index', 1)->get();
    }

    public static function getCountFavoriteProduct()
    {
        $count = 0;
        $favoritePro = DB::table('products')->where('favorites', '=', 1)->get();

        if ($favoritePro){
            $count = count($favoritePro);
        }

        return $count;
    }

    public static function listFavoriteProduct()
    {
        $listFavoriteProduct = Product::where('favorites', 1)->where('deleted_at', null)->get();

        return $listFavoriteProduct;
    }

    public static function updateFavoriteById($id, $isFavorite)
    {
        $update = Product::where(['id' => $id])->update(['favorites' => $isFavorite]);

        return $update;
    }

    public static function getListProductByCategoryId($id)
    {
        $products = array();
        if(!empty($id)){
            $products = Product::where('category_id', $id)->get();
        }

        return $products;
    }

    public static function getProductById($productId)
    {
        if(!empty($productId)){
            return Product::where('id', $productId)->select('*')->first();
        }

        return null;
    }

    public static function getCategoryIdByProductId($productId)
    {
        if(!empty($productId)){
            return Product::where('id', $productId)->select('category_id')->first();
        }
        return null;
    }
}
