<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Models\Admin;
use App\Models\Video;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{

    public function index(Request $request, $locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        $query = request('keyword');
        $user = User::where('email', 'LIKE', '%' . $query . '%')->paginate(config('constants.paginate'));
        $admin = Admin::query()->paginate(config('constants.paginate'));
        $video = Video::query()->paginate(config('constants.paginate'));
        return view('admin.index')->with(['user' => $user, 'admin' => $admin,'video'=>$video]);
    }

    public function edit($locale,$id)
    {
        $admin = Admin::where('id',$id)->first();
        return view('admin.edit')->with('admin', $admin);
    }

    public function update(AdminRequest $request, $locale,$id)
    {
        $params = $request->validated();
        $params['password'] = bcrypt($params['password']);
        Admin::where('id',$id)->update($params);
        return Redirect($locale.'/admin');
    }

    public function destroy($locale,$id)
    {

        Admin::where('id',$id)->delete();
        return redirect($locale.'/admin');
    }
}


