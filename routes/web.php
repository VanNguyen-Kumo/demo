<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Video\VideoController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\CSV\CSVController;

Route::group([
    'prefix'=>'{locale}/admin/',
    'namespace'=>'Admin',
], function (){

    Route::get('/',[AdminController::class, 'index'])->name('home')->middleware(['checkLoginAdmin','setLocale']);
    Route::get('/search/',[AdminController::class, 'index'])->name('search')->middleware('checkLoginAdmin');

//--------------------edit_admin-------------------------
    Route::get('/edit-admin/{id}',[AdminController::class,'edit'])->name('admin.edit-admin')->middleware('checkLoginAdmin');
    Route::post('/edit-admin/{id}',[AdminController::class,'update'])->name('admin.update-admin');

    //------------------------delete_admin------------------------
    Route::get('/del-admin/{id}',[AdminController::class,'destroy'])->name('admin.destroy-admin')->middleware('checkLoginAdmin');
});

Route::group([
    'prefix'=>'{locale}/admin',
    'namespace'=>'Auth',
//    'name'=>'admin.'
], function (){
    //------------------------login--------------------------
        Route::get('login',[LoginController::class,'index'])->name('admin.login');
        Route::post('login',[LoginController::class,'login']);

    //------------------------register------------------------
        Route::get('create',[RegisterController::class,'create'])->name('admin.create')->middleware('checkLoginAdmin');
        Route::post('store',[RegisterController::class,'store'])->name('admin.store')->middleware('checkLoginAdmin');

    //------------------------logout-------------------------
        Route::get('logout',[LoginController::class,'logout'])->name('admin.logout')->middleware('checkLoginAdmin');


});

Route::group([
    'prefix'=>'admin',
    'namespace'=>'Mail',

], function (){
    Route::post('/sendMail',[MailController::class,'sendMail'])->name('sendMail');
    Route::post('/sendToken',[MailController::class,'sendToken'])->name('sendToken');
});

Route::group([
    'prefix'=>'{locale}/admin',
    'namespace'=>'CSV',

], function (){
    //--------------------export-user-------------------------
    Route::get('/exportExcel-user',[CSVController::class,'exportExcel'])->name('admin.exportExcel-user')->middleware('checkLoginAdmin');
    Route::get('/exportCSV-user',[CSVController::class,'exportCSV'])->name('admin.exportCSV-user')->middleware('checkLoginAdmin');
    //--------------------import-user-------------------------
    Route::get('/importCSV-user',[CSVController::class,'fileCSV'])->name('admin.fileCSV-user')->middleware('checkLoginAdmin');
    Route::post('/importCSV-user',[CSVController::class,'importCSV'])->name('admin.importCSV-user')->middleware('checkLoginAdmin');
});
Route::group([
    'prefix'=>'{locale}/admin',
    'namespace'=>'User',

], function (){


    //------------------------add_user-------------------------
    Route::get('/create-user',[UserController::class,'create'])->name('admin.create-user')->middleware('checkLoginAdmin');
    Route::post('/store-user',[UserController::class,'store'])->name('admin.store-user');
    //--------------------edit_user-------------------------
    Route::get('/edit-user/{id}',[UserController::class,'edit'])->name('admin.edit-user')->middleware('checkLoginAdmin');
    Route::post('/edit-user/{id}',[UserController::class,'update'])->name('admin.update-user');
//------------------------delete_user------------------------
    Route::get('/del-user/{id}',[UserController::class,'destroy'])->name('admin.destroy-user')->middleware('checkLoginAdmin');

});
Route::group([
    'prefix'=>'{locale}/admin',
    'namespace'=>'Video',

], function (){
    //--------------------add-video-------------------------
    Route::get('/create-video',[VideoController::class,'create'])->name('admin.create-video')->middleware('checkLoginAdmin');
    Route::post('/create-video',[VideoController::class,'store'])->name('admin.store-video')->middleware('checkLoginAdmin');

    //--------------------edit_video-------------------------
    Route::get('/edit-video/{id}',[VideoController::class,'edit'])->name('admin.edit-video')->middleware('checkLoginAdmin');
    Route::post('/edit-video/{id}',[VideoController::class,'update'])->name('admin.update-video');

    //------------------------delete_video------------------------
    Route::get('/del-video/{id}',[VideoController::class,'destroy'])->name('admin.destroy-video')->middleware('checkLoginAdmin');

});
Route::get('/',[UserController::class,'index'])->name('index');
