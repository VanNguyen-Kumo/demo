<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('guest')->except('login', 'logout');
//    }

    public function index(){
        return view('auth.login');
    }
    public function login(LoginRequest $request){

        $req= $request->only('username','password');

        if(Auth::guard('admin')->attempt($req))
        {
            return redirect('/admin')->with('success', 'Đăng nhập thành công');
        }
        return redirect('admin/login')->with('error', 'Đăng nhập thất bại');
    }
}
