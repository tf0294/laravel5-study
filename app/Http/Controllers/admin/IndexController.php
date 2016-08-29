<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Component\AdminTrait;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminController;

class IndexController extends AdminController
{
    /**
     * index
     */
     public function index()
     {
         return view('admin.index');
     }
}
