<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'loginid' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * attributes
     *
     * @return array
     */
     public function attributes()
     {
         return [
             'loginid' => 'ログインID',
             'password' => 'パスワード'
         ];
     }
}
