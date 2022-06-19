<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'display_name', 'status'];

    // Begin RelationShip
    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'category_id');
    }
    // End RelationShip

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAllCategories()
    {
        return Category::all();
    }

    /**
     * @param $name
     * @return mixed
     */
    public static function getCategoryByName($name)
    {
        $category = Category::where('name', $name)->first();

        return $category;
    }

    /**
     *
     */
    public static function getListCategoryName()
    {
        $listCategoryName = DB::table('categories')->pluck( 'name', 'id')->toArray();

        return $listCategoryName;
    }
}
