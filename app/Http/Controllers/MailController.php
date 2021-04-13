<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index()
    {
        return view('home');
    }

    public function sendMail(Request $request)
    {
        $token = User::where('email', '=', $request->email)->first();
        if($token===null)
        {
            return redirect('/');
        }
        else{
            $email = $request->email;
            $num = $this->random_alphanumeric_string(4);

            $details = [
                'title' => 'Mail from demo',
                'body' => 'Token code is' . " " . $num
            ];

            $token->token_key = $num;
            $token->save();
            Mail::to($email)->send(new SendMail($details));
            return redirect('/');
        }

    }

    function random_alphanumeric_string($length)
    {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $length);
    }
}
