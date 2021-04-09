<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
class AdminController extends Controller
{
    public function index(){
//        dd(auth('admin')->user());
        $user = User::all();
        return view('admin.index')->with("user", $user);
    }
    public function addUser(){

    }
}
