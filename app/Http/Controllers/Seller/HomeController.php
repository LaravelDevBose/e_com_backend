<?php

namespace App\Http\Controllers\Seller;

use App\Helpers\TemplateHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        $this->middleware('auth');
    }

    public function index(){
        return view('templates.'.$this->template_name.'.seller.home.index');
    }
}
