<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\VideoRequest;
use App\Imports\UsersImport;
use App\Models\User;
use App\Models\Admin;
use App\Models\Video;
use Excel;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {

        $user = User::paginate(5);
        $admin = Admin::paginate(5);
        return view('admin.index')->with(["user" => $user, "admin" => $admin]);
    }

    public function create()
    {
        return view('admin.create_user');
    }

    public function store(UserRequest $request)
    {
        $video_id=Video::select('id')->first();
        $params=$request->validated();
        $params['video_id'] = $video_id->id;
        User::create($params->validated());
        return redirect('/admin');
    }

    public function adminCreate()
    {
        return view('admin.create_admin');
    }

    public function adminStore(AdminRequest $request)
    {
        Admin::create($request->validated());
        return redirect('/admin');
    }

    public function userEdit($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.edit_user')->with('user', $user);
    }

    public function userUpdate(UserRequest $request, $id)
    {
      User::where('id',$id)->update($request->validated());
        return Redirect('/admin')->with('success', 'Update success');
    }

    public function userDestroy($id)
    {
       User::where('id',$id)->delete();
        return redirect('/admin');
    }

    public function adminEdit($id)
    {
        $admin = Admin::where('id', '=', $id)->first();
        return view('admin.edit_admin')->with('admin', $admin);
    }

    public function adminUpdate(AdminRequest $request, $id)
    {
        $params = $request->validated();
        $params['password'] = bcrypt($params['password']);
        Admin::where('id',$id)->update($params);
        return Redirect('/admin');
    }

    public function adminDestroy($id)
    {
        Admin::where('id', '=', $id)->delete();
        return redirect('/admin');
    }

    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'User.xlsx');
    }

    public function exportCSV()
    {
        return Excel::download(new UsersExport, 'User.csv');
    }

   public function fileCSV(){
        return view('admin.importCSV');
   }

    public function importCSV( Request $request)
    {
        $path = $request->file('csv')->getRealPath();
        Excel::import(new UsersImport,$path);
        return redirect('admin');
    }

    public function search(Request $request)
    {
        $query = request('keyword');
        $user = User::where('email', 'LIKE', '%' . $query . '%')->paginate(10);
        $admin = Admin::paginate(7);
        return view('admin.index')->with(['user' => $user, 'admin' => $admin]);
    }

    public function createVideo(){
        return view('admin.create-video');
    }
    public function storeVideo(VideoRequest $request){

        $ext    = $request->thumbnail_url->getClientOriginalName();
        $request->thumbnail_url->move(public_path('images'),$ext);
        $image = $request->validated();
        $image['thumbnail_url'] = $ext;
        Video::create($image);
        return redirect('/admin');
    }
}


