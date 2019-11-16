<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard(){
        return view('home.index');
    }
}
