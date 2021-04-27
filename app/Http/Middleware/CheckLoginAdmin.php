<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session()->get('locale'));
        }
        $locale=app()->getLocale();
       // if(Auth::guard('admin')->check()&&Auth::guard('admin')->user()->is_super_admin===1)
        if(Auth::guard('admin')->check())
        {
            return $next($request);
        }else{
            return redirect($locale.'/admin/login');
        }

    }


}
