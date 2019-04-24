<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //  kiểm tra người dùng đăn nhập không
        if (Auth::check()) 
        {
            //cho chuy cập và kiểm tra truyền quyền bằng 1
            $user = Auth::user();
            
            if ($user->level >= 1)
                {
                  return $next($request);  
                }
            else 
                {
                    return redirect('tracnghiem-login-admin')->with('thongbao','Bạn không đủ quyền');
                }
        }
        else 
        {
            return redirect('tracnghiem-login-admin')->with('thongbao','Bạn không đủ quyền');
        }
        //khai bao  vào file Kernel để duyệt

}
}
