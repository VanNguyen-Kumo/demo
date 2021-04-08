<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;


class RegisterController extends Controller
{
//    /*
//    |--------------------------------------------------------------------------
//    | Register Controller
//    |--------------------------------------------------------------------------
//    |
//    | This controller handles the registration of new users as well as their
//    | validation and creation. By default this controller uses a trait to
//    | provide this functionality without requiring any additional code.
//    |
//    */
//
//    use RegistersUsers;
//
//    /**
//     * Where to redirect users after registration.
//     *
//     * @var string
//     */
////    protected $redirectTo = RouteServiceProvider::HOME;
////
////    /**
////     * Create a new controller instance.
////     *
////     * @return void
////     */
////    public function __construct()
////    {
////        $this->middleware('guest');
////    }
//
//    /**
//     * Get a validator for an incoming registration request.
//     *
//     * @param  array  $data
//     * @return \Illuminate\Contracts\Validation\Validator
//     */
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'username' => ['required', 'string', 'max:255'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],
//
//        ]);
//    }
//
//    /**
//     * Create a new user instance after a valid registration.
//     *
//     * @param  array  $data
//     * @return \App\Models\User
//     */
//    protected function create(RegisterRequest $request)
//    {
//        return Admin::create([
//            'username' => $request['username'],
//            'password' => Hash::make($request['password']),
//        ]);
//    }
    public function create(){
        return view('auth.register');
    }
    public function store(RegisterRequest $request){
        return Admin::create([
            'username' => $request['username'],
            'password' => bcrypt($request['password']),
        ]);
    }
}
