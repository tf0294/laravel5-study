<?php

namespace App\Http\Middleware\Admin;

use Closure;

class Auth
{
    /**
     * 管理画面認証チェックフィルター
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ログインチェック
        if (! self::isLogined($request)) {
            return redirect('/admin/login');
        }

        return $next($request);
    }

    /**
     * isLogined
     *
     * @param Request $request
     * @return bool
     */
    private static function isLogined($request)
    {
        return ($request->session()->get('login.user'));
    }
}
