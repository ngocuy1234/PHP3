<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Option;
use App\Models\OptionDetail;
use App\Models\ProductOption;
use App\Models\ProductOptionDetail;

class adminProduct extends Controller
{
    public function index(){
        $product = Product::orderby('products.id' , 'desc')->paginate(request('limit') ?? 5 );
        return view('admin.adminProduct.adminProduct' , ['products' => $product]);
    }

    public function updateStatus(){
        try {
            $prDetail = Product::find($_GET['product_id']);
            $prDetail->status = $_GET['status'];
            $prDetail->save();
            echo  'success';
        } catch (\Throwable $th) {
            echo 'error';
        }
    }

    public function create(){
        $cates =  Category::all();
        return view('admin.adminProduct.formProduct' ,['cates' => $cates]);
    }

    public function destroy($id){
        try {
            $prDetail = Product::find($id);
            
            if($prDetail){
                $prDetail->delete();
                session()->put('success' ,'Delete sucess !!!');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function store(Request $request){
        // dd($request->all());
        
            $product = new Product();
            if($request->hasFile('image')){
              $file = $request->image;
              $filename =  $file->getClientoriginalName();
             $file->move(public_path('/upload'), $filename);
            }
            $product->image = $filename;
            $product->fill($request->all());
            $product->save();
            return redirect()->route('product.index')->with('success' , 'Add product success !!!');
       
    }

    public function  edit($id){
        $proDetail = Product::find($id);
        $cates = Category::all();
        return view('admin.adminProduct.formProduct', ['prodDetail' => $proDetail , 'cates' => $cates]);
    }

    public function detail($id){
       $detail = Product::find($id);
       $properties =  ProductOption::where('product_id' , $id)->get()->count();
       return view('admin.adminProduct.detail' , ['detail' => $detail , 'countProperties' => $properties] );
    }

    public function propertie(){
        // dd($id);
        $options = Option::with('optionDetail')->paginate(request('limit') ?? 5);
        // dd($optionDetail);
        return view('admin.adminProduct.propertie' , ['options' => $options]);
    }

    public function propertieStore(Request $request){
        try {
            $option = new Option();
            $option->fill($request->all());
            $option->save();
            return redirect()->back()->with('success' , 'Add success !!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error' , 'Add error !!!');
        }
    }

    public function  propertieDetailDelete($id){
        try {
            $optionDer = OptionDetail::find($id);
            if($optionDer){
                $optionDer->delete();
                return redirect()->back()->with('success' , 'Delete success !!!');
            }
           } catch (\Throwable $th) {
            return redirect()->back()->with('error' , 'Delete error !!!');
           }
    }

    public function  propertieDetailStore(Request $request){
        try {
            $option = new OptionDetail();
            $option->fill($request->all());
            $option->save();
            return redirect()->back()->with('success' , 'Add success !!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error' , 'Add error !!!');
        }
    }


    public function  propertieDetailSave($id){
        try {
            $optionDer = OptionDetail::find($id);
            if($optionDer){
                $optionDer->delete();
                return redirect()->back()->with('success' , 'Delete success !!!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error' , 'Delete error !!!');
        }
    }

    public function propertieDelete($id){
       try {
        $option = Option::find($id);
        if($option){
            $option->delete();
            return redirect()->back()->with('success' , 'Delete success !!!');
        }
       } catch (\Throwable $th) {
        return redirect()->back()->with('error' , 'Delete error !!!');
       }

    }

    public function distortion($id){
        $product = Product::find($id);
        $distortie = Option::with('optionDetail')->get();
        return view('admin.adminProduct.distortion' ,['product' => $product ,'distortie' => $distortie]);
    }

    public function propertieDetail($id){
        $optionDetail = Option::with('optionDetail')->find($id);
        // dd($optionDetail);
        return view('admin.adminProduct.propertie-detail' , ['optionDetail' => $optionDetail]);
    }

    public function distortionUpdateQuantity(Request $request){
        $product = Product::find($request->id);
        $distortie = Option::with('optionDetail')->get();
        if($product){
            $product->quantity_distortion =  $request->quantity_distortion;
            $product->save();
        };
        return view('admin.adminProduct.distortion' ,
        ['product' => $product ,
        'distortie' => $distortie]);
    }


    public function distortionStore(Request $request){
        $distortie = new ProductOption();
        
        if($request->hasFile('image')){
            $file = $request->image;
            $filename =  $file->getClientoriginalName();
           $file->move(public_path('/upload'), $filename);
          }

          $distortie->image =  $filename;
          $distortie->fill($request->all());
          $distortie->save();

          foreach ($request->distortie as $i) { 
            $proOptionDetail = new ProductOptionDetail();
            $proOptionDetail->option_detail_id = $i;
            $proOptionDetail->product_option_id =  $distortie->id;
            $proOptionDetail->save();
          };

          $product = Product::find($distortie->product_id);
    
          $product->quantity_distortion = $product->quantity_distortion - 1;
          $product->save();

          return redirect()->route('product.detail.distortion' , $product->id)->with('success' ,  'Add success !!!');
        }
}