<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * logoout
     * ログアウト
     *
     * @param Request $request
     */
    public function index(Request $request)
    {
        try {
            $request->session()->flush();
            return view('admin.logout');
        } catch (Exception $e) {
            throw new Exception($e->getMessage());

        }
    }
}
