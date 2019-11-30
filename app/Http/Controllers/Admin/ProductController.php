<?php

namespace App\Http\Controllers\Admin;



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
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $template_name = 'limitless_v2';

    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.product.index');
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
    public function create(Request $request)
    {
        if($request->ajax()){
            $data = [
                'warrantyType'=>Product::WarrantyType,
                'dangersGoods'=>Product::DangersGoods,
                'skinTypes'=>SkinType::isActive()->select('skin_type_id as id', 'skin_type as text')->latest()->get(),
                'product_type'=>Product::flipProductType(),
            ];
            if(!empty($data)){
                return ResponserTrait::singleResponse($data,'success', Response::HTTP_OK, '');
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_OK, 'Data Not Found', [],'');
            }
        }else{
            return view('admin_panel.'.$this->template_name.'.product.create');
        }
    }

    public function product_create_dependency($catID){

        $sizeGroupIDs = SizeGroupCategory::where('category_id', $catID)->pluck('size_group_id');
        $sizes = Size::whereIn('size_group_id', $sizeGroupIDs)->select('size_id as id','size_name as text')->isActive()->latest()->get();
        $data = [
            'colors'=>Color::isActive()->select('color_id as id', 'color_name as text')->latest()->get(),
            'sizes'=>$sizes,
        ];

        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK, '');
    }

    public function get_product_status(){
        return ResponserTrait::singleResponse(Product::flipProductStatus(),'success', Response::HTTP_OK, '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'category_id'=>'required',
            'product_name'=>'required|string|max:255',
            'highlight'=>'required|string|max:1500',
            'description'=>'required',
            'package_weight'=>'required',
            'product_type'=>'required',
            'package_length'=>'required',
            'package_width'=>'required',
            'package_height'=>'required',
            'product_status'=>'required',
            'imageIds'=>'required|array',
            'thumb_id'=>'required',
        ];

        $messages = [
            'category_id.required'=>'Select a Category.',
            'product_name.required'=>'Add Your Product Name.',
            'product_name.string'=>'Product Name Must Be a String.',
            'product_name.max'=>'Product Name Max 255 Character.',
            'highlight.required'=>'Product Highlight is Required.',
            'highlight.string'=>'Product Highlight Must Be a String.',
            'highlight.max'=>'Product Highlight Max 1000 Character.',
            'description.required'=>'Product Description is Required.',
            'package_weight.required'=>'Package Weight is Required.',
            'product_type.required'=>'Product Type is Required.',
            'package_length.required'=>'Package Length is Required.',
            'package_width.required'=>'Package Width is Required.',
            'package_height.required'=>'Package Height is Required.',
            'product_status.required'=>'Product Status is Required.',
            'imageIds.required'=>'Select Your Product Image',
            'thumb_id.required'=>'Select Product Thumbnail Image',
        ];

        if ($request->product_type == 1){
            $rules = array_merge($rules,[
                'seller_sku'=>'required|string|max:20',
                'product_qty'=>'required|integer|min:0|not_in:0',
                'product_price'=>'required|integer|min:0|not_in:0',
            ]);

            $messages = array_merge($messages,[
                'seller_sku.required'=>'Must Add Product SKU.',
                'seller_sku.string'=>'SKU Must Be a String.',
                'seller_sku.max'=>'SKU Max 20 Character.',
                'product_qty.required'=>'Must Add Product QTY.',
                'product_qty.string'=>'Product QTY Must Be a Integer.',
                'product_qty.min'=>'Product QTY Not 0.',
                'product_qty.not_in'=>'Product QTY Not 0.',
                'product_price.required'=>'Must Add Product Price.',
                'product_price.string'=>'Product Price Must Be a Integer.',
                'product_price.min'=>'Product Price Not 0.',
                'product_price.not_in'=>'Product Price Not 0.',
            ]);
        }

        if ($request->product_type == 2){
            $rules = array_merge($rules,[
                'variations'=>'required|array',
                'variations.*.color_id'=>'required',
                'variations.*.size_id'=>'required',
                'variations.*.seller_sku'=>'required',
                'variations.*.qty'=>'required|integer|min:0|not_in:0',
                'variations.*.price'=>'required|integer|min:0|not_in:0',
                'variations.*.status'=>'required',
            ]);

            $messages = array_merge($messages,[
                'variations.required'=>'Add Your Product Variations.',
                'variations.array'=>'Add Your Product Variations.',

                'variations.*.color_id.required'=>'Select Product Colors.',
                'variations.*.size_id.required'=>'Select Product Sizes.',
                'variations.*.seller_sku.required'=>'Add Product Seller SKU.',
                'variations.*.status.required'=>'Active All Variations Status',

                'variations.*.qty.required'=>'Variation Product Qty is Required.',
                'variations.*.qty.string'=>'Variation Product Qty Must Be a Integer Number.',
                'variations.*.qty.min'=>'Variation Product Qty Not 0.',
                'variations.*.qty.not_in'=>'Variation Product Qty Not 0.',

                'variations.*.price.required'=>'Every Variation Product Price is Required.',
                'variations.*.price.string'=>'Every Variation Product Price Must Be a Integer Number',
                'variations.*.price.min'=>'Variation Product Price Not 0.',
                'variations.*.price.not_in'=>'Variation Product Price Not 0.',
            ]);
        }

        $validator = Validator::make($request->all(),$rules,$messages);

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
                    'seller_id'=>1, // Seller id 1 = Admin Default
                    'product_type'=>$request->product_type,
                ]);
                if(!empty($product)){
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
                        'product_type'=>$request->product_type,
                        'cod_avail'=>$request->cod_avail,
                    ]);

                    if(!empty($details)){

                        if(!empty($request->product_type) && $request->product_type == Product::ProductType['Variation']){
                            #Store Data in Product Variation Table
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
                            $product->update([
                                'product_qty'=>$request->product_qty,
                                'product_price'=>$request->product_price,
                                'seller_sku'=>$request->seller_sku,
                            ]);
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
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Product Store Successfully',
                        'url'=>route('admin.product.index')
                    ]);
                }else{
                    throw new Exception('Invalid Product Information', Response::HTTP_BAD_REQUEST);

                }

            }catch (Exception $ex){
                DB::rollBack();
                return response()->json([
                    'status' => 'error',
                    'message' => $ex->getMessage()
                ]);
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            $message = null;
            foreach ($errors as $error){
                if(!empty($error)){
                    foreach ($error as $errorItem){
                        $message .=  $errorItem .'<br/> ';
                    }
                }
            }
            return response()->json([
                'status' => 'validation',
                'message' => ($message != null) ? $message :'Invalid File!'
            ]);
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
        return view('admin_panel.'.$this->template_name.'.product.show',[
            'product_id'=>$product->product_id,
        ]);
    }

    public function single_product($productId){


        $product = Product::where('product_id', $productId)->with(['category'=>function($query){
            return $query->with(['parent'=>function($q){
                return $q->with('parent');
            }]);
        }, 'brand','thumbImage','productDetails','productImages'=>function($query){
            return $query->with('attachment')->isActive();
        },'variations'=>function($q){
            return $q->with('primaryModel', 'secondaryModel');
        }])->first();

        if(!empty($product)){
            $data = new ProductResource($product);
            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Product Not Found', '', route('error.404'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $editData = [
            'category_id'=>$product->category_id,
            'product_type'=>$product->product_type,
        ];
        return view('admin_panel.'.$this->template_name.'.product.edit',[
            'productId'=>$product->product_id,
            'editData'=>$editData,
        ]);
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
        $rules = [
            'category_id'=>'required',
            'product_name'=>'required|string|max:255',
            'highlight'=>'required|string|max:1500',
            'description'=>'required',
            'package_weight'=>'required',
            'product_type'=>'required',
            'package_length'=>'required',
            'package_width'=>'required',
            'package_height'=>'required',
            'product_status'=>'required',
            'imageIds'=>'required|array',
            'thumb_id'=>'required',
        ];

        $messages = [
            'category_id.required'=>'Select a Category.',
            'product_name.required'=>'Add Your Product Name.',
            'product_name.string'=>'Product Name Must Be a String.',
            'product_name.max'=>'Product Name Max 255 Character.',
            'highlight.required'=>'Product Highlight is Required.',
            'highlight.string'=>'Product Highlight Must Be a String.',
            'highlight.max'=>'Product Highlight Max 1000 Character.',
            'description.required'=>'Product Description is Required.',
            'package_weight.required'=>'Package Weight is Required.',
            'product_type.required'=>'Product Type is Required.',
            'package_length.required'=>'Package Length is Required.',
            'package_width.required'=>'Package Width is Required.',
            'package_height.required'=>'Package Height is Required.',
            'product_status.required'=>'Product Status is Required.',
            'imageIds.required'=>'Select Your Product Image',
            'thumb_id.required'=>'Select Product Thumbnail Image',
        ];

        if ($request->product_type == 1){
            $rules = array_merge($rules,[
                'seller_sku'=>'required|string|max:20',
                'product_qty'=>'required|integer|min:0|not_in:0',
                'product_price'=>'required|integer|min:0|not_in:0',
            ]);

            $messages = array_merge($messages,[
                'seller_sku.required'=>'Must Add Product SKU.',
                'seller_sku.string'=>'SKU Must Be a String.',
                'seller_sku.max'=>'SKU Max 20 Character.',
                'product_qty.required'=>'Must Add Product QTY.',
                'product_qty.string'=>'Product QTY Must Be a Integer.',
                'product_qty.min'=>'Product QTY Not 0.',
                'product_qty.not_in'=>'Product QTY Not 0.',
                'product_price.required'=>'Must Add Product Price.',
                'product_price.string'=>'Product Price Must Be a Integer.',
                'product_price.min'=>'Product Price Not 0.',
                'product_price.not_in'=>'Product Price Not 0.',
            ]);
        }

        if ($request->product_type == 2){
            $rules = array_merge($rules,[
                'variations'=>'required|array',
                'variations.*.color_id'=>'required',
                'variations.*.size_id'=>'required',
                'variations.*.seller_sku'=>'required',
                'variations.*.qty'=>'required|integer|min:0|not_in:0',
                'variations.*.price'=>'required|integer|min:0|not_in:0',
                'variations.*.status'=>'required',
            ]);

            $messages = array_merge($messages,[
                'variations.required'=>'Add Your Product Variations.',
                'variations.array'=>'Add Your Product Variations.',

                'variations.*.color_id.required'=>'Select Product Colors.',
                'variations.*.size_id.required'=>'Select Product Sizes.',
                'variations.*.seller_sku.required'=>'Add Product Seller SKU.',
                'variations.*.status.required'=>'Active All Variations Status',

                'variations.*.qty.required'=>'Variation Product Qty is Required.',
                'variations.*.qty.string'=>'Variation Product Qty Must Be a Integer Number.',
                'variations.*.qty.min'=>'Variation Product Qty Not 0.',
                'variations.*.qty.not_in'=>'Variation Product Qty Not 0.',

                'variations.*.price.required'=>'Every Variation Product Price is Required.',
                'variations.*.price.string'=>'Every Variation Product Price Must Be a Integer Number',
                'variations.*.price.min'=>'Variation Product Price Not 0.',
                'variations.*.price.not_in'=>'Variation Product Price Not 0.',
            ]);
        }

        $validator = Validator::make($request->all(),$rules,$messages);
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


    public function product_status_update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'product_id'=>'required',
            'product_status'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $product = Product::find($request->product_id);
                if(empty($product)){
                    throw new Exception('Invalid Product Information', Response::HTTP_BAD_REQUEST);
                }
                $statusUpdate = $product->update([
                    'product_status'=>$request->product_status,
                ]);
                if(!empty($statusUpdate)){
                    $status = Product::flipProductStatus();
                    $data = [
                        'product_id'=>$request->product_id,
                        'product_status'=>$request->product_status,
                        'status_label'=>$status[$request->product_status]
                    ];
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Product Status Update Successfully',$data);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }

    }

}
