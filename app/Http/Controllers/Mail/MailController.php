<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendMail(Request $request)
    {

        $token = User::select('email')->where('security_code', '=', $request->security_code)->first();
        if($token===null)
        {
            return redirect('/');
        }
        else{
            $email =$token;
            $num = $this->random_alphanumeric_string(4);
            $details = [
                'title' => 'Mail from SUPER JUNIOR 限定動画&グッズ当たる!キャンペーン',
                'body' => 'Token code is' . " " . $num
            ];
            $user=User::where('security_code', '=', $request->security_code)->first();
            $user->token_key=$num;
            $user->save();
            Mail::to($email)->send(new SendMail($details));
            return view('mail.verify-token');
        }

    }
    // xử lí nhập mã token
    public function sendToken(Request $request)
    {
        $token_key = User::select('token_key','video_id')->where('token_key', '=', $request->token_key)->first();
        $user=User::where('token_key', $request->token_key)->first();
        $user->token_key=null;
        $user->save();
        if($token_key===null)
        {
            return view('mail.verify-token');
        }
        else{
            $video=Video::where('id',$token_key->video_id)->first();
            return view('mail.video')->with('video',$video);
        }
    }
    function random_alphanumeric_string($length)
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $length);
    }
}
