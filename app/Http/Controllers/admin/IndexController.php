<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Component\AdminTrait;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * index
     */
     public function index()
     {
         return view('admin.index');
     }
}
