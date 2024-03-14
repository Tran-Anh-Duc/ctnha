<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (!$request->expectsJson()) {
            return route('bread.viewLogin');
        }

        //$a = Auth::guard()->check();

//        if (!Auth::guard()->check()) {
//
//            return redirect()->route('bread.viewLogin');
//            // Chuyển hướng đến trang đăng nhập nếu người dùng chưa đăng nhập
//        }

        return $next($request);
    }
}
