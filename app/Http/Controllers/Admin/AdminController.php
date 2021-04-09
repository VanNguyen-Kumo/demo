<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
//        dd(auth('admin')->user());
        $user = User::all();
        return view('admin.index')->with("user", $user);
    }
    public function create(){
        return view('admin.create_user');
    }
    public function store(UserRequest $request){
        User::create([
            'email' => $request['email'],
            'security_code'=>$request['security_code'],
            'video_type'=>$request['video_type'],
            'token_key'=>$request['token_key'],
        ]);

        return redirect('/admin');
    }
//    public function getProvince($value)
//    {
//        return strtoupper($value);
//    }
}


