<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Controllers\Controller;
use App\Admin;

class LoginController extends Controller
{
    /**
     * index
     * ログインフォームを表示します
     *
     */
    public function index()
     {
        return view('admin.login')
                   ->with([
                       'message' => 'test index',
                       'LoginError' => ''
                   ]);
     }

    /**
     * login
     * 認証を行います
     *
     * @params Request $request
     */
     public function login(LoginRequest $request)
     {
         try {
            if(self::isLogin($request->loginid, $request->password) == 0) {
                return redirect('/admin/login/')
                     ->with(['error_message' => 'ログインIDまたはパスワードが違います']);
            }

            // session put
            $request->session()->put('login.user', 'login_success');

            return view('admin.index');

         } catch (Exception $e) {
             throw new Exception($e->getMessage());
         }
     }

     /**
      * isLogin
      *
      * @param $loginid
      * @param $password
      * @return bool
      */
      private static function isLogin($loginid, $password)
      {
          return Admin::whereRaw(
                                'loginid = :loginid and password = :password',
                                [
                                    ':loginid' => $loginid,
                                    ':password' => $password
                                ]
                            )->count();
      }
}
