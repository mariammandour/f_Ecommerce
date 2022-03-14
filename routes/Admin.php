<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuth;
use App\Http\Controllers\Admin\faqController;
use App\Http\Controllers\Admin\sliderController;
use App\Http\Controllers\Admin\contactController;


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

Route::group(['prefix' => 'Admin', 'as' => 'Admin.'], function () {
    Route::get('login', [AdminAuth::class, 'login'])->name('login');
    Route::post('dologin', [AdminAuth::class, 'dologin'])->name('dologin');
    Route::get('/forgetPassword', [AdminAuth::class, 'forgetPassword'])->name('forgetPassword');
    Route::post('/forgetPassword_Post', [AdminAuth::class, 'forgetPassword_Post'])->name('forgetPassword_Post');
    Route::get('/resetpassword/{token}', [AdminAuth::class, 'reset_password'])->name('reset_password');
    Route::post('/resetpassword/{token}', [AdminAuth::class, 'reset_password_final'])->name('reset_password_final');
    Route::group(['middleware' => 'Admin:admin'], function () {
        config('auth.defines', 'Admin');
        Route::get('logout', [AdminAuth::class, 'logout'])->name('logout');
        Route::get('/', function () {
            return view('Admin/home');
        });
    });
});

Route::group(['middleware' => 'Admin:admin'], function () {
    Route::group(['prefix' => 'Admin', 'as' => 'admin.'], function () {
        Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
            Route::get('create', [faqController::class, 'create'])->name('create');
            Route::post('store', [faqController::class, 'store'])->name('store');
            Route::get('index', [faqController::class, 'index'])->name('index');
            Route::delete('delete', [faqController::class, 'delete'])->name('delete');
            Route::get('edit/{faqId}', [faqController::class, 'edit'])->name('edit');
            Route::put('update', [faqController::class, 'update'])->name('update');
        });
    });
});

Route::group(['middleware' => 'Admin:admin'],function(){
    Route::group(['prefix'=> 'Admin', 'as'=> 'admin.'],function(){
        Route::group(['prefix'=> 'slider', 'as'=> 'slider.'],function(){
            Route::get('create',[sliderController::class,'create'])->name('create');
            Route::post('store',[sliderController::class,'store'])->name('store');
            Route::get('index',[sliderController::class,'index'])->name('index');
            Route::delete('delete',[sliderController::class,'delete'])->name('delete');
            Route::get('edit/{faqId}',[sliderController::class,'edit'])->name('edit');
            Route::put('update',[sliderController::class,'update'])->name('update');
        });
    });
    
});

Route::group(['middleware' => 'Admin:admin'],function(){
    Route::group(['prefix'=> 'Admin', 'as'=> 'admin.'],function(){
        Route::group(['prefix'=> 'links', 'as'=> 'links.'],function(){
            Route::get('index',[contactController::class,'index'])->name('index');
            Route::get('edit{linkId}',[contactController::class,'edit'])->name('edit');
            Route::put('update',[contactController::class,'update'])->name('update');
        });
    });
    
});
