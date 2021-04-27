<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\App;


class RegisterController extends Controller
{
    public function create($locale){
        App::setLocale($locale);
        session()->put('locale', $locale);
        return view('auth.register');
    }
    public function store(RegisterRequest $request,$locale){
        Admin::create([
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
            'confirm_password'=>bcrypt($request['confirm_password']),
        ]);
        return view('auth.login');
    }
}
