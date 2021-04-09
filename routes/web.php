<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Admin;

Route::get('/admin',[Admin\AdminController::class, 'index'])->name('home')->middleware('checkLoginAdmin');

//------------------------add_user-------------------------
Route::get('admin/create-user',[Admin\AdminController::class,'create'])->name('admin.create-user');
Route::post('admin/store-user',[Admin\AdminController::class,'store'])->name('admin.store-user');;

Route::group([
    'prefix'=>'admin',
    'namespace'=>'Auth',
//    'name'=>'admin.'
], function (){
    //------------------------login--------------------------
        Route::get('login',[LoginController::class,'index'])->name('admin.login');
        Route::post('login',[LoginController::class,'login']);

    //------------------------register------------------------
        Route::get('create',[RegisterController::class,'create'])->name('admin.create');
        Route::post('store',[RegisterController::class,'store']);

    //------------------------logout-------------------------
        Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');


});
