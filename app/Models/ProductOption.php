<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductOptionDetail;

class ProductOption extends Model
{
    use HasFactory;
    public $table = 'product_options';
    public $fillable = ['id' , 'product_id' , 'unit_price' , 'available_stock' ];

    public function product(){
        return $this->belongsTo(Product::class ,  'product_id');
    }

    public function productOptionDetail(){
        return $this->belongsToMany(\App\Models\OptionDetail::class , ProductOptionDetail::class , 'product_option_id' , 'option_detail_id')->with('option');
    }
}
