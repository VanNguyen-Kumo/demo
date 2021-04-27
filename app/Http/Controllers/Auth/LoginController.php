<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin')->except('login', 'logout');
//    }

    public function index($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return view('auth.login');
    }

    public function login(LoginRequest $request,$locale)
    {
        auth()->user();
        $req = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($req)) {
            return redirect($locale.'/admin');
        } else {
            return redirect($locale.'/admin/login');
        }
    }

    public function logout(Request $request,$locale)
    {
      Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate(); //same
        return redirect($locale.'/admin/login');
    }
}
