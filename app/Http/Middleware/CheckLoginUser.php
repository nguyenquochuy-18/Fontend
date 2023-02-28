<?php


namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;

class CheckLoginUser
{
    public function handle($request, \Closure $next)
    {
        if (!get_data_user('web'))
        {
            return redirect()->route('get.login');
        }
        return $next($request);
    }
}
