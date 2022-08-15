<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class Cart extends Controller
{
     
    public function index(){
        if( session()->exists('cart')){
            $cart = session('cart');
        }
        return view('client.cart' , [
            'cart' => $cart
        ]);
    }

    public function addCart(Request $request){
        $rowProduct = Product::find($request->id);
            //  $cart = session('cart');
            $cart = [];
            if (session()->exists('cart')) {
                $cart = session('cart');
                if (array_key_exists($request->id, $cart)) {
                    $cart[$request->id] = [
                        'id' => $request->id,
                        'name' => $rowProduct->name,
                        'img' => $rowProduct->image,
                        'size' => 'Size:'  . '-' . $request->size  . '|'  . 'Color :' . $request->color,
                        'price' => $rowProduct->price_sale,
                        'number' => $cart[$request->id]['number'] + $request->quantity,
                    ];
                } else {
                    $cart[$request->id] = [
                       'id' => $request->id,
                        'name' => $rowProduct->name,
                        'img' => $rowProduct->image,
                        'size' => 'Size:'  . '-' . $request->size   . '|'  . 'Color :' . $request->color,
                        'price' => $rowProduct->price_sale,
                        'number' =>$request->quantity,
                    ];
                }
            } else {
                $cart = [];
                $cart[$request->id] = [
                    'id' => $request->id,
                    'name' => $rowProduct->name,
                    'img' => $rowProduct->image,
                    'size' => 'Size:'  . '-' . $request->size   . '|'  . 'Color :' . $request->color,
                    'price' => $rowProduct->price_sale,
                    'number' => $request->quantity,
                ];
            }

  
            session()->put('cart',  $cart);
            $result = session('cart');
            return redirect()->back()->with('success',  'Thêm giỏ hàng thành công');
    }

    public function updateCart(){
        $data = json_decode($_GET['cartUpdate']);
        // dd($data);
        $cart = session('cart');
           foreach ($data as $ky => $value) {
            if (session()->exists('cart')) {
                 $cart[$value->id]['number'] = $value->value;
               }
           }
           session()->forget('cart');       
           session()->put('cart', $cart);
           session()->put('success', 'Update success !!!');
           echo 'success';
    }

    public function deleteCart($id){
        $cart = session('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã xóa thành công');
    }

    public function Order(){
        $cart = [];
        if( session()->exists('cart')){
            $cart = session('cart');
        }
        return view('client.order' , ['cart' => $cart]);
    }

    public function OrderStore(Request $request){

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ];

        $messages =   [
            'name.required' => 'Name bắt buộc nhập',
            'email.required' => 'Email bắt buộc nhập',
            'address.required' => 'Address bắt buộc nhập',
            'phone.required' => 'Phone bắt buộc nhập',
        ];

        $this->validate($request, $rules, $messages);

        try {
            $order = new \App\Models\Order();
            if(Auth::check()){
                $user_id = Auth::id();
            }
            $order->user_id = $user_id;
            $order->fill($request->all());
            $order->save();
        } catch (\Throwable $th) {
            abort(500 ,'Not save Order');
            return false;
        }
        // dd($order->id);

        if (session()->exists('cart')) {
            foreach (session('cart') as $key) {
                \App\Models\OrderDetail::create([
                    'product_id' =>  $key['id'],
                    'order_id' =>  $order->id,
                    'image' =>  $key['img'],
                    'quantity' =>  $key['number'],
                    'price' =>  $key['price'],
                    'atribute'=> $key['size'],
                ]);
            }
            session()->forget('cart');
        }
        return redirect()->route('home')->with('success' , 'Thánh toán thành công');
    }
}
