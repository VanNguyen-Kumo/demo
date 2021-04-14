<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers;
use App\Http\Controllers\User;
Route::group([
    'prefix'=>'admin',
    'namespace'=>'Admin',
], function (){
    Route::get('/',[AdminController::class, 'index'])->name('home')->middleware('checkLoginAdmin');
//------------------------add_user-------------------------
    Route::get('/create-user',[AdminController::class,'create'])->name('admin.create-user')->middleware('checkLoginAdmin');
    Route::post('/store-user',[AdminController::class,'store'])->name('admin.store-user');
//------------------------add_admin-------------------------
    Route::get('/create-admin',[AdminController::class,'adminCreate'])->name('admin.create-admin')->middleware('checkLoginAdmin');
    Route::post('/store-admin',[AdminController::class,'adminStore'])->name('admin.store-admin');
    //--------------------edit_user-------------------------
    Route::get('/edit-user/{id}',[AdminController::class,'userEdit'])->name('admin.edit-user')->middleware('checkLoginAdmin');
    Route::post('/edit-user/{id}',[AdminController::class,'userUpdate'])->name('admin.update-user');
//------------------------delete_user------------------------
    Route::get('/del-user/{id}',[AdminController::class,'userDestroy'])->name('admin.destroy-user')->middleware('checkLoginAdmin');;

//--------------------edit_admin-------------------------
    Route::get('/edit-admin/{id}',[AdminController::class,'adminEdit'])->name('admin.edit-admin')->middleware('checkLoginAdmin');
    Route::post('/edit-admin/{id}',[AdminController::class,'adminUpdate'])->name('admin.update-admin');
//------------------------delete_admin------------------------
    Route::get('/del-admin/{id}',[AdminController::class,'adminDestroy'])->name('admin.destroy-admin')->middleware('checkLoginAdmin');
    //--------------------export-user-------------------------
    Route::get('/exportExcel-user',[AdminController::class,'exportExcel'])->name('admin.exportExcel-user')->middleware('checkLoginAdmin');
    Route::get('/exportCSV-user',[AdminController::class,'exportCSV'])->name('admin.exportCSV-user')->middleware('checkLoginAdmin');
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
        Route::get('create',[RegisterController::class,'create'])->name('admin.create')->middleware('checkLoginAdmin');
        Route::post('store',[RegisterController::class,'store']);

    //------------------------logout-------------------------
        Route::get('logout',[LoginController::class,'logout'])->name('admin.logout')->middleware('checkLoginAdmin');


});

Route::get('/',[User\UserController::class,'index'])->name('index');
//Route::get('/senMail',[Controllers\MailController::class,'index'])->name('sendMail.index');
Route::post('/sendMail',[Controllers\MailController::class,'sendMail'])->name('sendMail');
Route::post('/sendToken',[Controllers\MailController::class,'sendToken'])->name('sendToken');
