<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Component\AdminTrait;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRegistRequest;
use App\Http\Requests\Admin\UserEditComplateRequest;
use App\Admin;
use Carbon\Carbon;

class UserController extends Controller
{
    use AdminTrait;

    protected static $model = 'Admin';
    protected static $view = 'user';

    /**
     * complate
     *
     * @param UserRegistRequest $request
     */
    public function complate(UserRegistRequest $request)
    {
        try {
            Admin::insert([
                    'user_name' => $request->user_name,
                    'loginid' => $request->loginid,
                    'password' => $request->password
                ]);

            return redirect('/admin/user')
                       ->with(['success' => '登録が完了しました。'] );

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * edit_complate
     *
     * @param UserEditComplateRequest $request
     */
     public function edit_complate(UserEditComplateRequest $request)
     {
         try {
             if (! $admins = Admin::whereRaw(
                           'id = :id', [':id' => $request->id]
                       )->first()) {
                throw new Exception('Image Data Getting Failed. [id:' . $request->id . ']');
             }

             $admins->user_name = $request->user_name;
             $admins->loginid = $request->loginid;
             // now()
             $admins->updated = Carbon::now();

             $admins->save();

             return redirect('/admin/user')
                    ->with(['success' => '編集が完了しました。']);
         } catch (Exception $e) {
             throw new Exception($e->getMessage());
         }
     }
}
