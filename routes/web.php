<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Dashboard;
use App\Http\Controllers\Backend\adminRoom;
use App\Http\Controllers\Backend\adminStaff;
use App\Http\Controllers\Backend\adminCate;
use App\Http\Controllers\Backend\adminProduct;


use App\Http\Controllers\Frontend\form;
use App\Http\Controllers\Frontend\Product;
use App\Http\Controllers\Frontend\Home;
use App\Http\Controllers\Frontend\Contact;

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
    });

    Route::get('/' ,  [Dashboard::class ,'index'])->name('admin.index');

    Route::prefix('phong')->name('room.')->group(function(){
        Route::get('/' ,  [adminRoom::class ,'index'])->name('index');
        Route::post('/create' ,  [adminRoom::class ,'create'])->name('create');
        Route::get('/edit/{id}' ,  [adminRoom::class ,'edit'])->name('edit');
        Route::get('/delete/{id}' ,  [adminRoom::class ,'distroy'])->name('delete');
        Route::post('/udpate/{room}' ,  [adminRoom::class ,'update'])->name('update');
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
});


// Regiter
Route::prefix('register')->name('register.')->group(function(){
    Route::get('/' , [form::class ,'viewRegister'])->name('view-register');
    Route::post('/register-save' , [form::class ,'register'])->name('save');
});

Route::middleware('guest')->prefix('login')->name('login.')->group(function(){
    Route::get('/' , [form::class ,'viewLogin'])->name('login');
    Route::post('/login-save' , [form::class ,'login'])->name('save');
});


Route::get('/logout', [form::class, 'logOut'])->name('logOut')->middleware('auth');