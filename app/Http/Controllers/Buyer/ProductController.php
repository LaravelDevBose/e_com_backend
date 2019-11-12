<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\TemplateHelper;
use App\Models\Brand;
use App\Models\Product;
use App\Traits\CommonData;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        if(empty($this->template_name)){
            $this->template_name = config('app.default_template');
        }
        $this->middleware('auth');
    }

    public function index()
    {
        return view('templates.'.$this->template_name.'.buyer.seller.product.list_product');
    }

    public function product_create_dependency()
    {
        $categories = CommonData::category_tree();
        $brands = Brand::isActive()->select('brand_id as id', 'brand_name as text')->latest()->get();
        $conditions = Product::flipProductCondition();
        $conditionArray = array();
        foreach ($conditionArray as $key=> $condition){
            array_push($conditionArray,[
                'id'=>$key,
                'text'=>$condition,
            ]);
        }
        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'found', [
            'categories'=>$categories,
            'brands'=>$brands,
            'condition'=>$condition,
        ]);
    }

    public function create()
    {
        return view('templates.'.$this->template_name.'.buyer.seller.product.create_product');
    }

    public function store(Request $request)
    {

    }

    public function show()
    {
        return view('templates.'.$this->template_name.'.buyer.seller.product.show_product');
    }
}
