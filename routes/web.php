<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::group([
    'prefix'=>'admin',
    'namespace'=>'Admin',
], function (){
    Route::get('/',[AdminController::class, 'index'])->name('home')->middleware('checkLoginAdmin');
//------------------------add_user-------------------------
    Route::get('/create-user',[AdminController::class,'create'])->name('admin.create-user');
    Route::post('/store-user',[AdminController::class,'store'])->name('admin.store-user');
//------------------------add_admin-------------------------
    Route::get('/create-admin',[AdminController::class,'adminCreate'])->name('admin.create-admin');
    Route::post('/store-admin',[AdminController::class,'adminStore'])->name('admin.store-admin');
    //--------------------edit_user-------------------------
    Route::get('/edit-user/{id}',[AdminController::class,'userEdit'])->name('admin.edit-user');
    Route::post('/edit-user/{id}',[AdminController::class,'userUpdate'])->name('admin.update-user');
//------------------------delete_user------------------------
    Route::get('/del-user/{id}',[AdminController::class,'userDestroy'])->name('admin.destroy-user');

//--------------------edit_admin-------------------------
    Route::get('/edit-admin/{id}',[AdminController::class,'adminEdit'])->name('admin.edit-admin');
    Route::post('/edit-admin/{id}',[AdminController::class,'adminUpdate'])->name('admin.update-admin');
//------------------------delete_admin------------------------
    Route::get('/del-admin/{id}',[AdminController::class,'adminDestroy'])->name('admin.destroy-admin');
});
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
