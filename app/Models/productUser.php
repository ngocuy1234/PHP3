<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class productUser extends Model
{
    public $table = 'product_user';
    use HasFactory;

    public function product_user(){
        return $this->belongsTo(Product::class ,'product_id');
    }

}
