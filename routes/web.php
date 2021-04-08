<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;

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
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('checkLoginAdmin');
Route::get('/admin/login',[Auth\LoginController::class,'index']);
Route::post('/admin/login',[Auth\LoginController::class,'login']);
Route::get('/admin/create',[Auth\RegisterController::class,'create']);
Route::post('/admin/store',[Auth\RegisterController::class,'store']);
