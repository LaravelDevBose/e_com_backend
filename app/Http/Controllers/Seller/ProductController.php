<?php

namespace App\Http\Controllers\Seller;



use App\Helpers\TemplateHelper;
use App\Http\Resources\Admin\ProductCollection;
use App\Http\Resources\Admin\Product as ProductResource;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\Size;
use App\Models\SizeGroupCategory;
use App\Models\SkinType;
use App\Traits\ResponserTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public $seller_template;

    public function __construct()
    {
        $this->seller_template = TemplateHelper::sellerTemplate();
        $this->middleware('auth:seller');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('seller_panel.'.$this->seller_template.'.product.index');
    }

    public function product_collection(Request $request){
        $products = Product::with(['thumbImage','category'=>function($query){
            return $query->with(['parent'=>function($q){
                return $q->with(['parent']);
            }]);
        }, 'brand','variations'])->latest()->get();
        return ProductCollection::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seller_panel.'.$this->seller_template.'.product.create');
    }

    public function product_create_dependency($catID){

        $sizeGroupIDs = SizeGroupCategory::where('category_id', $catID)->pluck('size_group_id');
        $sizes = Size::whereIn('size_group_id', $sizeGroupIDs)->select('size_id as id','size_name as text')->isActive()->latest()->get();
        return response()->json([
            'warrantyType'=>Product::WarrantyType,
            'dangersGoods'=>Product::DangersGoods,
            'colors'=>Color::isActive()->select('color_id as id', 'color_name as text')->latest()->get(),
            'sizes'=>$sizes,
            'skinTypes'=>SkinType::isActive()->select('skin_type_id as id', 'skin_type as text')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        #TODO Form Validation
        $validator = Validator::make($request->all(),[
            'category_id'=>'required',
            'product_name'=>'required|string|max:255',
            'highlight'=>'required|string|max:1500',
            'description'=>'required',
            'package_weight'=>'required',
            'package_length'=>'required',
            'package_width'=>'required',
            'package_height'=>'required',
            'product_status'=>'required',
            'variations'=>'required|array',
            'imageIds'=>'required|array',
            'thumb_id'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                #Store Data in Product Table
                $product = Product::create([
                    'product_sku'=>Product::product_sku_generate(),
                    'category_id'=>$request->category_id,
                    'brand_id'=>$request->brand_id,
                    'product_name'=>$request->product_name,
                    'product_slug'=>str_slug($request->product_name),
                    'highlight'=>$request->highlight,
                    'description'=>$request->description,
                    'lang_product_name'=>$request->lang_product_name,
                    'lang_highlight'=>$request->lang_highlight,
                    'lang_description'=>$request->lang_description,
                    'dangers_goods'=>implode(',', $request->dangers_goods),
                    'what_in_box'=>$request->what_in_box,
                    'package_weight'=>$request->package_weight,
                    'package_length'=>$request->package_length,
                    'package_width'=>$request->package_width,
                    'package_height'=>$request->package_height,
                    'delivery_cost1'=>$request->delivery_cost1,
                    'delivery_cost2'=>$request->delivery_cost2,
                    'product_status'=>(!empty($request->product_status) && $request->product_status == 1) ? $request->product_status : 2,
                    'warranty_type'=>$request->warranty_type,
                    'thumb_id'=>$request->thumb_id,
                    'video_url'=>$request->video_url,
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
                        #Store Data in Product Variation Table
                        if(!empty($request->variations)){
                            $variations = $request->variations;
                            foreach ($variations as $variation){

                                $variation = (object) $variation;
                                $gift ='';
                                if(!empty($variation->gift_product)){
                                    $gift = Product::where('product_sku', $variation->gift_product)->first();
                                }

                                ProductVariation::create([
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
                        }


                        #Store Data in Product Image Table

                        if(!empty($request->imageIds)){
                            $imageIds = $request->imageIds;
                            foreach ($imageIds as  $imageId){
                                $imageId = (object)$imageId;
                                ProductImage::create([
                                    'product_id'=>$product->product_id,
                                    'pri_id'=>$imageId->pri_id,
                                    'model'=>ProductVariation::VARIATION_MODEL[strtolower($request->pri_model)],
                                    'attachment_id'=>$imageId->image_id,
                                    'image_status'=>config('app.active')
                                ]);
                            }
                        }

                    }
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Product Store Successfully', route('seller.product.index'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('seller_panel.'.$this->seller_template.'.product.show',[
            'product_id'=>$product->product_id,
        ]);
    }

    public function single_product(Product $product){

        $product = $product->load(['category'=>function($query){
            return $query->with(['parent'=>function($q){
                return $q->with('parent');
            }]);
        }, 'brand', 'productDetails', 'variations', 'productImages'=>function($query){
            return $query->with('attachment')->isActive();
        }]);

        if(!empty($product)){
            $data = new ProductResource($product);
            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_NOT_FOUND, 'Product Not Found');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



}
