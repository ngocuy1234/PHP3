<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class Dashboard extends Controller
{
    
    public function index(){
        $customer = User::where('users.role' , 2)->get()->count();
        $category = Category::all()->count();
        $product = Product::all()->count();
        $staff = User::where('users.role' , 1)->orWhere('users.role' , 0)->get()->count();
        $chart = Category::select('categories.name', Product::raw("COUNT(products.cate_id) as number_cate"))
        ->join('products', 'products.cate_id', '=', 'categories.id')
        ->groupBy("products.cate_id", "categories.name")->get();

        // dd($chart);
        return view('admin.Dashboard.dashboard' ,[
            'customer' => $customer,
            'category' => $category,
            'product' => $product,
            'staff' => $staff,
            'chart' => $chart,
        ]);
    }
}
