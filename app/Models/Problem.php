<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'description', 'image' , 'is_read'];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
