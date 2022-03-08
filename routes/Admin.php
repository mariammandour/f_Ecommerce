<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuth;


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
    Route::get('login',[AdminAuth::class,'login'])->name('login');
    Route::post('dologin',[AdminAuth::class,'dologin'])->name('dologin');
    Route::get('/forgetPassword', [AdminAuth::class,'forgetPassword'])->name('forgetPassword');
    Route::post('/forgetPassword_Post', [AdminAuth::class,'forgetPassword_Post'])->name('forgetPassword_Post');
    Route::get('/resetpassword/{token}', [AdminAuth::class,'reset_password'])->name('reset_password');
    Route::post('/resetpassword/{token}', [AdminAuth::class,'reset_password_final'])->name('reset_password_final');
    Route::group(['middleware' => 'Admin:admin'], function () {
        config('auth.defines', 'Admin');
        Route::get('logout',[AdminAuth::class,'logout'])->name('logout');
        Route::get('/', function () {
            return view('Admin/home');
        });
    });
});
