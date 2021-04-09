<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin')->except('login', 'logout');
//    }

    public function index()
    {

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        auth()->user();
        $req = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($req)) {
            return redirect('/admin');
        } else {
            return redirect('/admin/login');
        }

    }

    public function logout(Request $request)
    {
      Auth::guard('admin')->logout();
////        $this->auth->logout();

//     $this->guard('admin')->logout();
//       $request->session()->invalidate();
//        Session::flush();
////       $request->session()->invalidate();
        return redirect('/admin/login');
    }
}
