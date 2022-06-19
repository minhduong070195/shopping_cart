<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $fillable = ['order_id', 'category_id', 'product_id', 'quantity', 'status'];


    public static function getOrderDetailByOrderId($orderId)
    {
        return OrderDetail::where('order_id', $orderId)->get();
    }
}
