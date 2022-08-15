<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $fillable = ['quantity' , 'price' , 'product_id' , 'order_id' , 'image' ,  'atribute'];
    use HasFactory;

    protected $casts =  [
        'quantity' => 'int',
    ];

    public function product(){
        return $this->belongsTo(\App\Models\Product::class , 'product_id');
    }

    public function order(){
        return $this->belongsTo(\App\Models\Order::class , 'order_id');
    }
}
