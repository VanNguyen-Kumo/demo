<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Models\Admin;
use Excel;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index(){
//        dd(auth('admin')->user());
        $user = User::paginate(10);
        $admin=Admin::paginate(10);
        return view('admin.index')->with(["user"=>$user,"admin"=>$admin]);
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
    public function adminCreate(){
        return view('admin.create_admin');
    }
    public function adminStore(AdminRequest $request){
        Admin::create([
            'username' => $request['username'],
            'password'=>$request['password'],
        ]);

        return redirect('/admin');
    }
//    public function getProvince($value)
//    {
//        return strtoupper($value);
//    }
    public function userEdit($id){

      $user=User::where('id','=',$id)->first();
        return view('admin.edit_user')->with('user',$user);

    }
    public function userUpdate( UserRequest $request, $id){

        $user=User::find($id);
        $user->email = $request->email;
        $user->security_code=$request->security_code;
        $user->video_type=$request->video_type;
        $user->token_key=$request->token_key;
        $user->save();
        return Redirect('/admin');
    }
    public function userDestroy($id){
        $user=User::where('id','=',$id)->first();
        $user->delete();
        return redirect('/admin');
    }

    public function adminEdit($id){

        $admin=Admin::where('id','=',$id)->first();
        return view('admin.edit_admin')->with('admin',$admin);

    }
    public function adminUpdate(AdminRequest $request, $id){

        $admin=Admin::find($id);
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->is_super_admin = $request->is_super_admin;
        $admin->save();
        return Redirect('/admin');
    }
    public function adminDestroy($id){
        $admin=Admin::where('id','=',$id)->first();
        $admin->delete();
        return redirect('/admin');
    }
    public function  exportExcel(){
        return Excel::download(new UsersExport,'User.xlsx');
    }
    public function  exportCSV(){
        return Excel::download(new UsersExport,'User.csv');
    }
    public function search(Request $request){
        $query=request('keyword');
        $user=User::where('email', 'LIKE', '%' .$query. '%')->paginate(10);
        $admin=Admin::paginate(7);
        return view('admin.index')->with(['user'=>$user,'admin'=>$admin]);

    }

}


