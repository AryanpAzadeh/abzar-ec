<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_number' , 'user_id' , 'status' , 'grand_total' , 'item_count' , 'is_paid' , 'payment_method' , 'name' , 'address' , 'city' ,
        'state' , 'post_code' , 'phone' , 'notes' , 'tracking_number' , 'sub_total' , 'coupon' , 'email' , 'post_tracking' , 'shipping'];

    protected $casts = [
        'coupon' => 'array',
    ];

    public function items()
    {
        return $this->belongsToMany(Product::class , 'order_items' , 'order_id' , 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
