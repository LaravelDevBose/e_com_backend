<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public $template_name = 'limitless_v2';
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard(){
        return view('admin_panel.'.$this->template_name.'.home.index');
    }

}
