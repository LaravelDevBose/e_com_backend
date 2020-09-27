<?php

namespace App\Http\Controllers\Admin;



use App\Http\Resources\Admin\ProductCollection;
use App\Http\Resources\Admin\Product as ProductResource;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\ProductVariation;
use App\Models\Size;
use App\Models\SizeGroupCategory;
use App\Traits\ResponserTrait;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
        $products = Product::with(['thumbImage','category','brand','variations', 'seller'])
        ->where('product_status', '!=', Product::ProductStatus['Review'])
        ->latest()->notDelete()->get();
        $status = Product::flipProductStatus();
        return view('admin_panel.'.$this->template_name.'.product.index',[
            'products'=>$products,
            'status'=>$status,
        ]);
    }

    public function product_collection(Request $request){
        $products = Product::with(['thumbImage','category'=>function($query){
            return $query->with(['parent'=>function($q){
                return $q->with(['parent']);
            }]);
        }, 'brand','variations'])
        ->where('product_status', '!=', Product::ProductStatus['Review'])
        ->latest()->notDelete()->get();
        return ProductCollection::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin_panel.'.$this->template_name.'.product.create');
    }

    public function product_create_dependency($catID){

        $sizeGroupIDs = SizeGroupCategory::where('category_id', $catID)->where('sgc_status', config('app.active'))->pluck('size_group_id');
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $rules = [
            'category_id'=>'required',
            'product_name'=>'required|string|max:255',
            'highlight'=>'required|string|max:1500',
            'description'=>'required',
            'product_type'=>'required',
            'product_status'=>'required',
            'imageIds'=>'required|array',
            'thumb_id'=>'required',
            'seller_id'=>'required',
            'variations'=>'required|array',
            'variations.*.seller_sku'=>'required',
            'variations.*.qty'=>'required|integer|min:0|not_in:0',
            'variations.*.price'=>'required|min:0|not_in:0',
            'variations.*.status'=>'required',
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
            'product_type.required'=>'Product Type is Required.',
            'product_status.required'=>'Product Status is Required.',
            'imageIds.required'=>'Select Your Product Images',
            'thumb_id.required'=>'Select Product Thumbnail Image',
            'seller_id.required'=>'Select Product Seller Information',

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
        ];

        if ($request->product_type == 1){
            array_merge($messages,[
                'variations.required'=>'Add Product Seller Sku, Price and Qty.',
                'variations.array'=>'Add Product Seller Sku, Price and Qty.',
            ]);
        }

        if ($request->product_type == 2){
            $rules = array_merge($rules,[
                'variations'=>'required|array',
                'variations.*.color_id'=>'required',
                'variations.*.size_id'=>'required',
            ]);

            array_merge($messages,[
                'variations.required'=>'Add Product Size, Color, Seller Sku, Price and Qty.',
                'variations.array'=>'Add Product Size, Color, Seller Sku, Price and Qty.',

                'variations.*.color_id.required'=>'Select Product Colors.',
                'variations.*.size_id.required'=>'Select Product Sizes.',

            ]);
        }

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                #Store Data in Product Table
                $product = Product::create([
                    'category_id'=>$request->category_id,
                    'brand_id'=>$request->brand_id,
                    'seller_id'=>$request->seller_id,
                    'product_name'=>$request->product_name,
                    'product_sku'=>Product::product_sku_generate(),
                    'product_slug'=>Str::slug($request->product_name).'_'.Str::random(4),
                    'thumb_id'=>$request->thumb_id,
                    'highlight'=>$request->highlight,
                    'description'=>$request->description,
                    'video_url'=>$request->video_url,
                    'product_type'=>$request->product_type,
                    'product_status'=>(!empty($request->product_status) && $request->product_status == 1) ? $request->product_status : 2,
                ]);
                if(!empty($product)){
                    #Store Data in Product Details Table
                    $details= ProductDetails::create([
                        'product_id'=>$product->product_id,
                        'main_materials'=>$request->main_materials,
                        'product_model'=>$request->product_model,
                        'num_of_pieces'=>$request->num_of_pieces,
                        'color_shade'=>$request->color_shade,
                        'extra_details'=>$request->extra_details,
                        'warranty_policy'=>$request->warranty_policy,
                        'warranty_period'=>$request->warranty_period,
                    ]);

                    if(!empty($details)){
                        $variations = $request->variations;

                        $variationArray = array();

                        foreach ($variations as $variation){
                            $variation = (object)$variation;
                            array_push($variationArray,[
                                'product_id'=>$product->product_id,
                                'seller_sku'=>$variation->seller_sku,
                                'color_id'=>!empty($variation->color_id)? $variation->color_id: null,
                                'size_id'=>!empty($variation->size_id)? $variation->size_id : null,
                                'quantity'=>$variation->qty,
                                'price'=>$variation->price,
                                'variation_status'=>$variation->status,
                            ]);

                        }
                        $variationProduct = ProductVariation::insert($variationArray);
                        if(!empty($variationProduct)){
                            if(!empty($request->imageIds)){
                                $imageIds = $request->imageIds;
                                $imageArray = array();
                                foreach ($imageIds as  $imageId){
                                    $imageId = (object)$imageId;
                                    array_push($imageArray,[
                                        'product_id'=>$product->product_id,
                                        'attachment_id'=>$imageId->image_id,
                                        'image_status'=>config('app.active')
                                    ]);
                                }
                                ProductImage::insert($imageArray);
                            }
                            if (!empty($request->tag_ids)){
                                $productTags = array();
                                foreach ($request->tag_ids as $key => $tag){
                                    array_push($productTags,[
                                        'product_id'=>$product->product_id,
                                        'tag_id'=>$tag,
                                        'status'=>config('app.active')
                                    ]);
                                }
                                ProductTag::insert($productTags);
                            }
                            DB::commit();

                            return ResponserTrait::allResponse(
                                'success',
                                Response::HTTP_CREATED,
                                'Product Store Successfully',
                                '',
                                route('admin.product.index')
                            );

                        }else{
                            throw new Exception('Invalid Product Variation Information', Response::HTTP_BAD_REQUEST);
                        }


                    }else{
                        throw new Exception('Invalid Product Details Information', Response::HTTP_BAD_REQUEST);
                    }

                }else{
                    throw new Exception('Invalid Product Information', Response::HTTP_BAD_REQUEST);

                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
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
        }, 'brand','seller','thumbImage','productDetails','productImages'=>function($query){
            return $query->with('attachment')->isActive();
        },'variations'=>function($q){
            return $q->with('color', 'size');
        }, 'variation', 'tags'])->first();

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'category_id'=>'required',
            'product_name'=>'required|string|max:255',
            'highlight'=>'required|string|max:1500',
            'description'=>'required',
            'product_type'=>'required',
            'product_status'=>'required',
            'seller_id'=>'required',
            'variations'=>'required|array',
            'variations.*.seller_sku'=>'required',
            'variations.*.qty'=>'required|integer|min:0|not_in:0',
            'variations.*.price'=>'required|min:0|not_in:0',
            'variations.*.status'=>'required',
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
            'product_type.required'=>'Product Type is Required.',
            'product_status.required'=>'Product Status is Required.',
            'seller_id.required'=>'Select Product Seller Information',

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
        ];

        if ($request->product_type == 1){
            array_merge($messages,[
                'variations.required'=>'Add Product Seller Sku, Price and Qty.',
                'variations.array'=>'Add Product Seller Sku, Price and Qty.',
            ]);
        }

        if ($request->product_type == 2){
            $rules = array_merge($rules,[
                'variations'=>'required|array',
                'variations.*.color_id'=>'required',
                'variations.*.size_id'=>'required',
            ]);

            array_merge($messages,[
                'variations.required'=>'Add Product Size, Color, Seller Sku, Price and Qty.',
                'variations.array'=>'Add Product Size, Color, Seller Sku, Price and Qty.',

                'variations.*.color_id.required'=>'Select Product Colors.',
                'variations.*.size_id.required'=>'Select Product Sizes.',

            ]);
        }

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $product = Product::where('product_id', $id)->first();

                if(empty($product)){
                    throw new Exception('Product Not Found', Response::HTTP_NOT_FOUND);
                }

                $productU =$product->update([
                    'category_id'=>$request->category_id,
                    'brand_id'=>$request->brand_id,
                    'seller_id'=>$request->seller_id,
                    'product_name'=>$request->product_name,
                    'product_slug'=>Str::slug($request->product_name).'_'.Str::random(4),
                    'thumb_id'=>!empty($request->thumb_id)? $request->thumb_id : $product->thumb_id,
                    'highlight'=>$request->highlight,
                    'description'=>$request->description,
                    'product_status'=>(!empty($request->product_status) && $request->product_status == 1) ? $request->product_status : 2,
                    'video_url'=>$request->video_url,
                    'product_type'=>$request->product_type,
                ]);

                if(!empty($productU)){
                    #Store Data in Product Details Table
                    $details= ProductDetails::updateOrCreate(
                        ['product_id'=> $id],
                        [
                            'main_materials'=>$request->main_materials,
                            'product_model'=>$request->product_model,
                            'num_of_pieces'=>$request->num_of_pieces,
                            'color_shade'=>$request->color_shade,
                            'extra_details'=>$request->extra_details,
                            'warranty_policy'=>$request->warranty_policy,
                            'warranty_period'=>$request->warranty_period,

                        ]);
                    if(!empty($details)){
                        ProductVariation::where('product_id', $id)->update(['variation_status'=> config('app.delete')]);
                        $variations = $request->variations;
                        $variation = array();

                        foreach ($variations as $variation){
                            $variation = (object)$variation;
                            $variationU = ProductVariation::updateOrCreate([
                                'product_id'=>$product->product_id,
                                'color_id'=>!empty($variation->color_id)? $variation->color_id: null,
                                'size_id'=>!empty($variation->size_id)? $variation->size_id : null,
                            ], [
                                'seller_sku'=>$variation->seller_sku,

                                'quantity'=>$variation->qty,
                                'price'=>$variation->price,
                                'variation_status'=>$variation->status,
                            ]);
                        }

                        if(!empty($variationU)){
                            if(!empty($request->imageIds)){
                                $imageIds = $request->imageIds;
                                $imageArray = array();
                                foreach ($imageIds as  $imageId){
                                    $imageId = (object)$imageId;
                                    array_push($imageArray,[
                                        'product_id'=>$product->product_id,
                                        'attachment_id'=>$imageId->image_id,
                                        'image_status'=>config('app.active')
                                    ]);
                                }
                                ProductImage::insert($imageArray);
                            }
                            if (!empty($request->tag_ids)){
                                $tagIds = ProductTag::where('product_id', $id)
                                    ->where('status', config('app.active'))
                                    ->pluck('tag_id')->toArray();
                                $productTags = array();
                                foreach ($request->tag_ids as $key => $tag){
                                    if (!in_array($tag, $tagIds)){
                                        array_push($productTags,[
                                            'product_id'=>$product->product_id,
                                            'tag_id'=>$tag,
                                            'status'=>config('app.active')
                                        ]);
                                    }
                                }
                                ProductTag::insert($productTags);
                            }
                            DB::commit();
                            return ResponserTrait::allResponse(
                                'success',
                                Response::HTTP_OK,
                                'Product Updated Successfully',
                                '',
                                route('admin.product.index')
                            );

                        }else{
                            throw new Exception('Invalid Product Variation Information', Response::HTTP_BAD_REQUEST);
                        }

                    }else{
                        throw new Exception('Invalid Product Details Information', Response::HTTP_BAD_REQUEST);
                    }
                }else{
                    throw new Exception('Invalid Product Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $product = Product::where('product_id', $id)->first();
            if(empty($product)){
                throw new Exception('Invalid Product Information', Response::HTTP_NOT_FOUND);
            }

            /*if($product->seller_id !== 1){
                throw new Exception("You Are Not Owner Of This Product. You Can't Delete This.", Response::HTTP_UNAUTHORIZED);
            }*/

            $product = $product->update([
                'product_status'=>config('app.delete')
            ]);

            if(!empty($product)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK,'Product Deleted Successfully');
            }else{
                throw new Exception('Product Not Deleted Successfully', Response::HTTP_BAD_REQUEST);
            }

        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }
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
                    return redirect()->back();
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
    public function variation_delete($productId, $variationId)
    {
        try{
            DB::beginTransaction();
            $product = Product::find($productId);
            if(empty($product)){
                throw new Exception('Invalid Product Information', Response::HTTP_BAD_REQUEST);
            }
            $variation = ProductVariation::where('product_id', $productId)->where('variation_id', $variationId)->first();
            if(empty($variation)){
                throw new Exception('Product Variation Not Found', Response::HTTP_NOT_FOUND);
            }
            $variation = $variation->update([
                'variation_status'=>config('app.delete'),
            ]);
            if(!empty($variation)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK,'Product Variation Delete Successfully');
            }

        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }

}
