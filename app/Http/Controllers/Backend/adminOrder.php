<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class adminOrder extends Controller
{
   public function index(){
    $orders = Order::orderby('orders.id' , 'desc')->paginate(request('limit') ?? 5 );
    return view('admin.adminOrder.adminOrder' ,compact('orders'));
   } 

   public function detail($id){
    $orderDetail = Order::find($id);
    $products = OrderDetail::where('order_id' , $id)->get();
    $sum = 0;
    foreach($products as $key){
        $sum+=$key->price * $key->quantity;
    }
    return view('admin.adminOrder.detail', compact('orderDetail' , 'products' , 'sum'));
   }

   public function updateStatus(){
            $status = $_GET['status'] ? $_GET['status'] : '';
            $order_id = $_GET['order_id'] ? $_GET['order_id'] : '';
            $order = Order::find($order_id);
            if($status == ""){
                $order->status = 0;
                $order->save();
                echo 'success';
            }else{
                $order->status = $status;
                $order->save();
                echo 'success';
            }   
   }
   
   public function deleteOrderDetail($id){
        $orderDetail  = OrderDetail::find($id);
        if($orderDetail){
            $orderDetail->delete();
        }
        return redirect()->back()->with('success' , 'Delete success');
   }

   public function delete($id){
        $order  = Order::find($id);
        if($order){
            $order->delete();
        }
        return redirect()->back()->with('success' , 'Delete success');
   }
}