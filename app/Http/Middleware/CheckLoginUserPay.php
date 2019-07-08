<?php


namespace App\Http\Middleware;

use Closure;

class CheckLoginUserPay
{
    /**
    * get_data_user('web') mặc định lấy id, nếu chưa có thì chưa đăng nhập
     */
    public function handle($request, Closure $next)
    {
        if (!get_data_user('web')){
            return redirect()->route('get.login');
        }
        return $next($request);
    }
}