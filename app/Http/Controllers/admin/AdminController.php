<?php
/**
 *
 */
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * construct
     * admin.authミドルウェアのセット
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
}
