<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class Home extends Controller
{
    public $query;
    public function __construct(){
        // $query 
        // $this->query = 
        // Product::select('id'  ,'name' , 'image' , 'price' , 'price_sale' , 'quantity_view')
        // ->where('products.status' , 1)
        // ->skip(0)->take(10);
    } 

    public function index(){
        $products = Product::select('id'  ,'name' , 'image' , 'price' , 'price_sale' , 'quantity_view')
        ->where('products.status' , 1)->orderby('products.id' , 'desc')
        ->skip(0)->take(10)->get();
        // dd(Product::all());
        $productMoreView = Product::select('id'  ,'name' , 'image' , 'price' , 'price_sale' , 'quantity_view')
        ->where('products.status' , 1)->orderby('products.quantity_view' , 'desc')
        ->skip(0)->take(10)->get();
        return view('client.home' ,  [
            'products' => $products,
            'productMoreView' =>  $productMoreView,
        ]);
    }
}
