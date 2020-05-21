<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Resources\Admin\ProductCollection;
use App\Models\AddressBook;
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
use Illuminate\Support\Str;

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
        }, 'brand'])->where('seller_id', auth()->user()->seller->seller_id)->notDelete()->latest()->get();
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
                    'product_slug'=>Str::slug($request->product_name),
                    'highlight'=>$request->highlight,
                    'description'=>$request->description,
                    'product_status'=>Product::ProductStatus['Review'],
                    'thumb_id'=>$request->thumb_id,
                    'seller_id'=>auth()->guard('web')->user()->seller->seller_id,
                    'product_qty'=>$request->product_qty,
                    'product_price'=>$request->product_price,
                    'seller_sku'=>$request->seller_sku,
                    'product_condition'=>$request->product_condition,
                    'product_city'=>(!empty($request->product_city))? AddressBook::cityList[$request->product_city] :  auth()->guard('seller')->user()->seller->seller_city,
                ]);
                if(!empty($product)){
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
                        if(empty($productImages)){
                            throw new Exception('Product Image Invalid', Response::HTTP_BAD_REQUEST);
                        }
                    }
                    $product = $product->update([
                        'product_slug'=>Str::slug($request->product_name).'-'.$product->product_id,
                    ]);
                    if(!empty($product)){
                        DB::commit();
                        return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Product Store Successfully','', route('buyer.seller.product.index'));
                    }else{
                        throw new Exception('Invalid Product Information', Response::HTTP_BAD_REQUEST);
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
            return ResponserTrait::validationResponse('validation', 400, $errors);
        }

    }

    public function show($productId)
    {
        $categoryInfo = array();
        $product = Product::where('product_id', $productId)->with(['thumbImage','productImages.attachment'])->first();
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
        if($product->seller_id !== auth()->guard('web')->user()->seller->seller_id){
            abort(Response::HTTP_UNAUTHORIZED,'Unauthorized for Delete This Product ');
        }
        return view('templates.'.$this->template_name.'.buyer.seller.product.edit_product',[
            'productId'=>$product->product_id
        ]);
    }

    public function update(Request $request, $productId)
    {
        $validator = Validator::make($request->all(),[
            'product_name'=>'required|string|max:255',
            'highlight'=>'required|string|max:1500',
            'description'=>'required',
            'product_type'=>'required',
            'product_qty'=>'required',
            'product_price'=>'required',
            'product_condition'=>'required',
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
                $product = Product::where('product_id', $productId)->first();

                if(empty($product)){
                    throw new Exception('Invalid Product Information', Response::HTTP_NOT_FOUND);
                }

                if($product->seller_id !== auth()->guard('web')->user()->seller->seller_id){
                    throw new Exception('Unauthorized for Update This Product ', Response::HTTP_UNAUTHORIZED);
                }
                $product = $product->update([
                    'category_id'=>$catId,
                    'brand_id'=>$request->brand_id,
                    'product_name'=>$request->product_name,
                    'product_slug'=>Str::slug($request->product_name).'-'.$productId,
                    'highlight'=>$request->highlight,
                    'description'=>$request->description,
                    'product_status'=>Product::ProductStatus['Review'],
                    'thumb_id'=>$request->thumb_id,
                    'product_qty'=>$request->product_qty,
                    'product_price'=>$request->product_price,
                    'seller_sku'=>$request->seller_sku,
                    'product_condition'=>$request->product_condition,
                ]);
                if(!empty($product)){
                    if(!empty($request->imageIds)){
                        $imageIds = $request->imageIds;
                        $imageArray = array();
                        foreach ($imageIds as  $imageId){
                            $imageId = (object)$imageId;
                            array_push($imageArray,[
                                'product_id'=>$productId,
                                'pri_id'=>'',
                                'model'=>'',
                                'attachment_id'=>$imageId->image_id,
                                'image_status'=>config('app.active')
                            ]);
                        }
                        $productImages = ProductImage::insert($imageArray);
                    }

                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Product Update Successfully','', route('buyer.seller.product.index'));
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

    public function destroy($slug)
    {
        try{
            $product = Product::where('product_slug', $slug)->first();

            if(empty($product)){
                throw new Exception('Invalid Product Info', Response::HTTP_NOT_FOUND);
            }

            if($product->seller_id !== auth()->guard('web')->user()->seller->seller_id){
                throw new Exception('Unauthorized for Delete This Product ', Response::HTTP_UNAUTHORIZED);
            }

            $product = $product->update([
                'product_status'=>config('app.delete'),
            ]);

            if(!empty($product)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Product Deleted Successfully');
            }
        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
