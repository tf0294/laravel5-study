<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class UserRegistRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required',
            'loginid' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * attributes
     *
     * @return Array
     */
     public function attributes()
     {
         return [
             'user_name' => 'ユーザ名',
             'loginid' => 'ログインID',
             'password' => 'パスワード'
         ];
     }
}
