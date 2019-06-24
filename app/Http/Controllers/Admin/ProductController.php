<?php

namespace App\Http\Controllers\Admin;



use App\Models\Color;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductImage;
use App\Models\ProductVariation;
use App\Models\Size;
use App\Models\SizeGroupCategory;
use Exception;
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    public function product_create_dependency($catID){

        $sizeGroupIDs = SizeGroupCategory::where('category_id', $catID)->pluck('size_group_id');
        $sizes = Size::whereIn('size_group_id', $sizeGroupIDs)->select('size_id as id','size_name as text')->isActive()->latest()->get();
        return response()->json([
            'warrantyType'=>Product::WarrantyType,
            'dangersGoods'=>Product::DangersGoods,
            'colors'=>Color::isActive()->select('color_id as id', 'color_name as text')->latest()->get(),
            'sizes'=>$sizes
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
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                #Store Data in Product Table
                $product = Product::create([
                    'category_id'=>$request->category_id,
                    'brand_id'=>$request->brand_id,
                    'product_name'=>$request->product_name,
                    'highlight'=>$request->highlight,
                    'description'=>$request->description,
                    'lang_product_name'=>$request->lang_product_name,
                    'lang_highlight'=>$request->lang_highlight,
                    'lang_description'=>$request->lang_description,
                    'dangers_goods'=>$request->dangers_goods,
                    'what_in_box'=>$request->what_in_box,
                    'package_weight'=>$request->package_weight,
                    'package_length'=>$request->package_length,
                    'package_width'=>$request->package_width,
                    'package_height'=>$request->package_height,
                    'delivery_cost1'=>$request->delivery_cost1,
                    'delivery_cost2'=>$request->delivery_cost2,
                    'product_status'=>(!empty($request->product_status) && $request->product_status == 1) ? $request->product_status : 2,
                    'warranty_type'=>$request->warranty_type,
                    'video_url'=>$request->video_url,
                ]);
                if($product){
                    #TODO Store Data in Product Details Table
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
                        #TODO Store Data in Product Variation Table
                        if(!empty($request->variations)){
                            $variations = $request->variations;
                            foreach ($variations as $variation){
                                ProductVariation::create([
                                    'product_id'=>$product->product_id,
                                    'seller_sku'=>$variation->seller_sku,
                                    'pri_id'=>$variation->pri_id,
                                    'pri_model'=>$variation->pri_model,
                                    'sec_id'=>$variation->sec_id,
                                    'sec_model'=>$variation->sec_model,
                                    'quantity'=>$variation->quantity,
                                    'price'=>$variation->price,
                                    'special_price'=>$variation->special_price,
                                    'gift_product_id'=>$variation->gift_product_id,
                                    'gift_product_sku'=>$variation->gift_product_sku,
                                ]);
                            }
                        }


                        #TODO Store Data in Product Image Table

                        if(!empty($request->imageIds)){
                            $imageIds = $request->imageIds;
                            foreach ($imageIds as  $imageId){
                                ProductImage::create([
                                    'product_id',
                                    'variation_id',
                                    'attachment_id',
                                    'image_status'
                                ]);
                            }
                        }

                    }
                    DB::commit();
                    return response()->json([
                        'cost'=>new DeliveryCostResource(DeliveryCost::find($cost->cost_id)),
                        'res'=>[
                            'status'=>'success',
                            'message'=>'Delivery Cost Store Successfully',
                        ]
                    ]);
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
    public function show($id)
    {
        //
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
