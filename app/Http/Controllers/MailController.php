<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
//    public function index()
//    {
//        return view('home');
//    }

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
            return view('verify-token');
        }

    }
    public function sendToken(Request $request)
    {
        $token_key = User::select('token_key','video_type')->where('token_key', '=', $request->token_key)->first();
        $user=User::where('token_key', '=', $request->token_key)->first();
        $user->token_key=null;
        $user->save();
        if($token_key===null)
        {
            return view('verify-token');
        }
        elseif($token_key->video_type==='B'){

            return view('videoB');

        }
        elseif ($token_key->video_type==='A'){

            return view('videoA');

        }

    }
    function random_alphanumeric_string($length)
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $length);
    }
}
