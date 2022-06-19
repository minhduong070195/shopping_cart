<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'customer_name', 'customer_phone', 'customer_address', 'total_money',
        'payment_method', 'status', 'deleted_at', 'created_at', 'updated_at'
    ];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }


    public static function getOrderByTypePurchase($typePurchase)
    {
        $userId = Auth::guard('customer')->user()->id;
        return Order::where('status', $typePurchase)->where('customer_id', $userId)->get();
    }
}
