<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\ProductOption;
use App\Models\ProductOptionDetail;
use App\Models\OptionDetail;
use App\Models\productUser;

class Product extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = 'products';
    protected $fillable = ['name' , 'quantity_view' , 'status' ,'quantity' , 'price' , 'price_sale' , 'cate_id', 'description' , 'user_id' , 'intro_service'];

    public function category(){
        return $this->belongsTo(Category::class ,'cate_id');
    }

    public function productOption(){
        return $this->hasMany(ProductOption::class ,'product_id');
    }

    public function ProductViewd(){
        return $this->belongsTo(
            productUser::class ,'product_id'
        );
    }
   
}