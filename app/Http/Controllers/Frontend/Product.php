<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Product as ModelProduct;
use App\Models\Category;

class Product extends Controller
{
    public function index(){
        $rooms = Room::all();
        $cates = Category::all();
        $products = ModelProduct::select('id' , 'name' , 'image' , 'price' , 'price_sale')
        ->orderby('products.id' , 'desc')->paginate(request('limit') ?? 10);
        // dd($rooms);
        return view('client.product' , [
            'rooms' => $rooms,
            'cates' => $cates,
            'products' => $products
        ]);
    }

    public function detail($id){
        $product = ModelProduct::width('productOption')->find($id);
        dd($product);
        return view('client.product-detail');
    }
}
