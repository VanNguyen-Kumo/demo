<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;


class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(RegisterRequest $request){
        Admin::create([
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'confirm_password'=>bcrypt($request['confirm_password']),
        ]);
        return view('auth.login');
    }
}
