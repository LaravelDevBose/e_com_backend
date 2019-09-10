<?php

namespace App\Http\Controllers\Seller;

use App\Helpers\TemplateHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public $seller_template;

    public function __construct()
    {
        $this->seller_template = TemplateHelper::sellerTemplate();
        $this->middleware('auth');
    }

    public function index(){
        return view('seller_panel.'.$this->seller_template.'.home.index');
    }
}
