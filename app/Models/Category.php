<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['name' , 'room_id' , 'status'];

    public  function room(){
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function product(){
        return $this->hasMany(Product::class , 'product_id');
    }
}
