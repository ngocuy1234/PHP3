<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OptionDetail;

class ProductOptionDetail extends Model
{
    use HasFactory;
    public $table = 'product_option_details';
    public $fillable = ['id' , 'product_option_id' , 'option_detail_id'];

    public function optionDetail(){
        return $this->hasMany(optionDetail::class ,  'option_detail_id');
    }
}
