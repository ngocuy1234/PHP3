<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard;
use App\Http\Controllers\Backend\adminRoom;
use App\Http\Controllers\Backend\adminStaff;
use App\Http\Controllers\Backend\adminCate;
use App\Http\Controllers\Backend\adminProduct;
use App\Http\Controllers\Backend\adminOrder;
use App\Http\Controllers\Backend\adminUser;


use App\Http\Controllers\Frontend\form;
use App\Http\Controllers\Frontend\Product;
use App\Http\Controllers\Frontend\Home;
use App\Http\Controllers\Frontend\Contact;
use App\Http\Controllers\Frontend\Cart;
use App\Http\Controllers\Frontend\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->prefix('quan-tri')->group(function(){

    Route::middleware('admin')->prefix('nhan-vien')->name('staff.')->group(function(){
        Route::get('/' ,  [adminStaff::class ,'index'])->name('index');
        Route::get('/delete/{id}' ,  [adminStaff::class ,'distroy'])->name('delete');
        Route::get('/updateRole' ,  [adminStaff::class ,'updateRole'])->name('updateRole');
    });

    Route::middleware('admin')->prefix('khach-hang')->name('user.')->group(function(){
        Route::get('/' ,  [adminUser::class ,'index'])->name('index');
    });

    Route::get('/' ,  [Dashboard::class ,'index'])->name('admin.index');

    Route::prefix('phong')->name('room.')->group(function(){
        Route::get('/' ,  [adminRoom::class ,'index'])->name('index');
        Route::post('/create' ,  [adminRoom::class ,'create'])->name('create');
        Route::get('/edit/{id}' ,  [adminRoom::class ,'edit'])->name('edit');
        Route::get('/delete/{id}' ,  [adminRoom::class ,'distroy'])->name('delete');
        Route::post('/udpate/{room}' ,  [adminRoom::class ,'update'])->name('update');
    });


    Route::prefix('don-hang')->name('order.')->group(function(){
        Route::get('/' ,  [adminOrder::class ,'index'])->name('index');
        Route::get('/detail/{id}' ,  [adminOrder::class ,'detail'])->name('detail');
        Route::get('updateStatus' ,  [adminOrder::class ,'updateStatus'])->name('updateStatus');
        Route::get('deleteOrderDetail/{id}' ,  [adminOrder::class ,'deleteOrderDetail'])->name('deleteOrderDetail');
        Route::get('delete/{id}' ,  [adminOrder::class ,'delete'])->name('delete');
    });

    Route::prefix('danh-muc-sp')->name('cate.')->group(function(){
        Route::get('/' ,  [adminCate::class ,'index'])->name('index');
        Route::post('/store' ,  [adminCate::class ,'store'])->name('store');
        Route::get('/delete/{id}' ,  [adminCate::class ,'distroy'])->name('delete');
        Route::get('/update-status' ,  [adminCate::class ,'updateStatus'])->name('updateStatus');
        Route::get('/filter' ,  [adminCate::class ,'filter'])->name('filter');
    });

    Route::prefix('san-pham')->name('product.')->group(function(){
        Route::get('/' ,  [adminProduct::class ,'index'])->name('index');
        Route::get('/update-status' ,  [adminProduct::class ,'updateStatus'])->name('updateStatus');
        Route::get('/delete/{id}' ,  [adminProduct::class ,'destroy'])->name('delete');
        Route::get('/edit/{id}' ,  [adminProduct::class ,'edit'])->name('edit');
        Route::get('/create' ,  [adminProduct::class ,'create'])->name('create');
        Route::post('/store',  [adminProduct::class ,'store'])->name('store');
        Route::get('/propertie',  [adminProduct::class ,'propertie'])->name('propertie');
        Route::post('/distortion',  [adminProduct::class ,'distortionUpdateQuantity'])->name('distortionUpdateQuantity');
        Route::post('/distortionStore',  [adminProduct::class ,'distortionStore'])->name('distortionStore');
        Route::get('/propertie/{id}/detail',  [adminProduct::class ,'propertieDetail'])->name('propertieDetail');
        Route::get('/propertieDea/{id}',  [adminProduct::class ,'propertieDetailDelete'])->name('propertieDetailDelete');
        Route::post('/propertieDeaStore',  [adminProduct::class ,'propertieDetailStore'])->name('propertieDetailStore');
        Route::get('/propertieDelete/{id}',  [adminProduct::class ,'propertieDelete'])->name('propertieDelete');
        Route::post('/propertie-save',  [adminProduct::class ,'propertieStore'])->name('propertieStore');
        Route::prefix('detail')->name('detail.')->group(function(){
            Route::get('{id}',  [adminProduct::class ,'detail'])->name('detail');
            Route::get('{id}/add-distortion',  [adminProduct::class ,'distortion'])->name('distortion');
        });
    });
});


Route::middleware('auth')->prefix('/')->group(function(){
    Route::prefix('order')->name('order.')->group(function(){
        Route::get('/' , [Cart::class ,'Order'])->name('order');
        Route::post('/store' , [Cart::class ,'OrderStore'])->name('store');
    });

    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/' , [Profile::class ,'index'])->name('index');
        Route::get('/order/{id}' , [Profile::class ,'index'])->name('order');
        Route::get('/order/delete/{id}' , [Profile::class ,'deleteProOrder'])->name('deleteProOrder');
        Route::post('/update-info' , [Profile::class ,'updateInfo'])->name('updateInfo');
        Route::get('/updateStatus/{id}' , [Profile::class ,'updateStatus'])->name('updateStatus');
    });
});


// Regiter
Route::prefix('register')->name('register.')->group(function(){
    Route::get('/' , [form::class ,'viewRegister'])->name('view-register');
    Route::post('/register-save' , [form::class ,'register'])->name('save');
});




Route::get('/' , [Home::class ,'index'])->name('home')->middleware('client');




Route::get('/lien-he' , [Contact::class ,'index'])->name('contact');


Route::prefix('/san-pham')->name('client.product.')->group(function(){
    Route::get('/' , [Product::class ,'index'])->name('product');
    Route::get('/detail/{id}' , [Product::class ,'detail'])->name('detail');
    Route::get('/filter-select' , [Product::class ,'filterSelect'])->name('filterSelect');
    Route::get('/filter-cate' , [Product::class ,'filterCate'])->name('filterCate');
    Route::get('/filter-room' , [Product::class ,'filterRoom'])->name('filterRoom');
    Route::get('/filter-search' , [Product::class ,'filterSearch'])->name('filterSearch');
});

// Regiter
Route::prefix('cart')->name('cart.')->group(function(){
    Route::post('/add' , [Cart::class ,'addCart'])->name('addCart');
    Route::get('/' , [Cart::class ,'index'])->name('cart');
    Route::get('/delete/{id}' , [Cart::class , 'deleteCart'])->name('deleteCart');
    Route::get('/updateCart' , [Cart::class ,'updateCart'])->name('updateCart');
});


// Regiter
Route::prefix('register')->name('register.')->group(function(){
    Route::get('/' , [form::class ,'viewRegister'])->name('view-register');
    Route::post('/register-save' , [form::class ,'register'])->name('save');
});



Route::middleware('guest')->prefix('login')->name('login.')->group(function(){
    Route::get('/' , [form::class ,'viewLogin'])->name('login');
    Route::post('/login-save' , [form::class ,'login'])->name('save');
    Route::get('/login-google/callback' ,[form::class , 'saveLoginGoogle'])->name('saveLoginGoogle');
    Route::get('/login-google' ,[form::class , 'getLoginGoogle'])->name('getLoginGoogle');
});


Route::get('/logout', [form::class, 'logOut'])->name('logOut')->middleware('auth');

Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});