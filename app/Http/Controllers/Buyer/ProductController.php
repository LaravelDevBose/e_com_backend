<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Resources\Admin\ProductCollection;
use App\Models\Category;
use Exception;
use App\Http\Resources\Admin\Category as CategoryResource;
use App\Helpers\TemplateHelper;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Traits\CommonData;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

    public function product_ist()
    {
        $products = Product::with(['thumbImage','category'=>function($query){
            return $query->with(['parent'=>function($q){
                return $q->with(['parent']);
            }]);
        }, 'brand'])->where('seller_id', auth()->user()->seller->seller_id)->latest()->get();
        return ResponserTrait::collectionResponse('success', Response::HTTP_OK, ProductCollection::collection($products));
    }

    public function product_create_dependency()
    {
        $categories = CommonData::category_tree();
        $brands = Brand::isActive()->select('brand_id as id', 'brand_name as text')->latest()->get();
        $conditions = Product::flipProductCondition();
        $conditionArray = array();
        foreach ($conditions as $key=> $condition){
            array_push($conditionArray,[
                'id'=>$key,
                'text'=>$condition,
            ]);
        }
        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'found', [
            'categories'=>CategoryResource::collection($categories),
            'brands'=>$brands,
            'conditions'=>$conditionArray,
        ]);
    }

    public function create()
    {
        return view('templates.'.$this->template_name.'.buyer.seller.product.create_product');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_name'=>'required|string|max:255',
            'highlight'=>'required|string|max:1500',
            'description'=>'required',
            'product_type'=>'required',
            'product_qty'=>'required',
            'product_price'=>'required',
            'product_condition'=>'required',
            'imageIds'=>'required|array',
            'thumb_id'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                #Store Data in Product Table

                # Get Product Category Id;

                if(!empty($request->main_cat_id)){
                    $catId = $request->main_cat_id;
                }else{
                    throw new Exception('Select a Category', Response::HTTP_BAD_REQUEST);
                }

                if(!empty($request->sec_cat_id)){
                    $catId = $request->sec_cat_id;
                }
                if(!empty($request->trd_cat_id)){
                    $catId = $request->trd_cat_id;
                }
                $product = Product::create([
                    'product_sku'=>Product::product_sku_generate(),
                    'category_id'=>$catId,
                    'brand_id'=>$request->brand_id,
                    'product_name'=>$request->product_name,
                    'product_slug'=>str_slug($request->product_name),
                    'highlight'=>$request->highlight,
                    'description'=>$request->description,
                    'product_status'=>(!empty($request->product_status)) ? $request->product_status :3,
                    'thumb_id'=>$request->thumb_id,
                    'seller_id'=>auth()->guard('web')->user()->seller->seller_id,
                    'product_qty'=>$request->product_qty,
                    'product_price'=>$request->product_price,
                    'seller_sku'=>$request->seller_sku,
                ]);
                if($product){

                    #Store Data in Product Details Table
                    $details= ProductDetails::create([
                        'product_id'=>$product->product_id,
                        'main_materials'=>$request->main_materials,
                        'product_model'=>$request->product_model,
                        'num_of_pieces'=>$request->num_of_pieces,
                        'product_occasion'=>$request->product_occasion,
                        'color_shade'=>$request->color_shade,
                        'skin_type'=>$request->skin_type,
                        'extra_details'=>$request->extra_details,
                        'warranty_policy'=>$request->warranty_policy,
                        'warranty_policy_eng'=>$request->warranty_policy_eng,
                        'warranty_period'=>$request->warranty_period,
                    ]);

                    if(!empty($details)){
                        if(!empty($request->product_type) && $request->product_type == Product::ProductType['Variation']){
                            if(!empty($request->variations)){
                                $variations = $request->variations;
                                $variationArray = array();
                                foreach ($variations as $variation){

                                    $variation = (object) $variation;
                                    $gift ='';
                                    if(!empty($variation->gift_product)){
                                        $gift = Product::where('product_sku', $variation->gift_product)->first();
                                    }

                                    array_push($variationArray,[
                                        'product_id'=>$product->product_id,
                                        'seller_sku'=>$variation->seller_sku,
                                        'pri_id'=>$variation->color_id,
                                        'pri_model'=>config('app.variation_model.color'),
                                        'sec_id'=>$variation->size_id,
                                        'sec_model'=>config('app.variation_model.size'),
                                        'quantity'=>$variation->qty,
                                        'price'=>$variation->price,
//                                    'special_price'=>(!empty($variation->special_price))?$variation->special_price:0,
                                        'gift_product_id'=>(!empty($gift))?$gift->product_id: 0,
                                        'gift_product_sku'=>(!empty($gift))?$gift->product_sku: '',
                                    ]);

                                }
                                $variationProduct = ProductVariation::insert($variationArray);
                            }


                            #Store Data in Product Image Table

                            if(!empty($request->imageIds)){
                                $imageIds = $request->imageIds;
                                $imageArray = array();
                                foreach ($imageIds as  $imageId){
                                    $imageId = (object)$imageId;
                                    array_push($imageArray,[
                                        'product_id'=>$product->product_id,
                                        'pri_id'=>$imageId->pri_id,
                                        'model'=>ProductVariation::VARIATION_MODEL[strtolower($request->pri_model)],
                                        'attachment_id'=>$imageId->image_id,
                                        'image_status'=>config('app.active')
                                    ]);
                                }
                                $productImages = ProductImage::insert($imageArray);
                            }
                        }else{
                            if(!empty($request->imageIds)){
                                $imageIds = $request->imageIds;
                                $imageArray = array();
                                foreach ($imageIds as  $imageId){
                                    $imageId = (object)$imageId;
                                    array_push($imageArray,[
                                        'product_id'=>$product->product_id,
                                        'pri_id'=>'',
                                        'model'=>'',
                                        'attachment_id'=>$imageId->image_id,
                                        'image_status'=>config('app.active')
                                    ]);
                                }
                                $productImages = ProductImage::insert($imageArray);
                            }
                        }
                    }else{
                        throw new Exception('Invalid Product Details Information', Response::HTTP_BAD_REQUEST);
                    }
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Product Store Successfully','', route('buyer.seller.product.index'));
                }else{
                    throw new Exception('Invalid Product Information', Response::HTTP_BAD_REQUEST);

                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', 400, $errors);
        }

    }

    public function show($productId)
    {
        $categoryInfo = array();
        $product = Product::where('product_id', $productId)->with(['thumbImage','productImages'])->first();
        $category = Category::where('category_id', $product->category_id)->first();
        if(!empty($category->parent_id)){
            $parentCat = Category::where('category_id', $category->parent_id)->first();
            if(!empty($parentCat->parent_id)){
                $categoryInfo =[
                    'main_cat_id'=>$parentCat->parent_id,
                    'sec_cat_id'=>$parentCat->category_id,
                    'trd_cat_id'=>$category->category_id,
                ];
            }else{
                $categoryInfo =[
                    'main_cat_id'=>$parentCat->category_id,
                    'sec_cat_id'=>$category->category_id,
                    'trd_cat_id'=>'',
                ];
            }
        }else{
            $categoryInfo=[
                'main_cat_id'=>$category->category_id,
                'sec_cat_id'=>'',
                'trd_cat_id'=>'',
            ];
        }
        $data =[
            'product'=>$product,
            'categoryInfo'=>$categoryInfo,
        ];

        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK, 'Product found');

    }

    public function edit($slug)
    {
        $product = Product::where('product_slug', $slug)->first();
        return view('templates.'.$this->template_name.'.buyer.seller.product.edit_product',[
            'productId'=>$product->product_id
        ]);
    }
}
