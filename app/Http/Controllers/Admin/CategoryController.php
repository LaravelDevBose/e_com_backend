<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Frontend\ProductHelper;
use App\Http\Resources\Admin\ProductCollection;
use App\Traits\ResponserTrait;
use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\Category as CategoryResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public $route = 'admin.category.';

    public function __construct()
    {
        view()->share('route',$this->route);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::notDelete()->with(['attachment','parent'=>function($query){
            $query->notDelete()->with('parent');
        }])->latest()->get();
        return new CategoryCollection($categories);
    }

    public function category_tree(){
        $categories = Category::notDelete()->isParent()->with(['children'])->get();
        return CategoryResource::collection($categories);
    }

    public function all_category_tree(){
        $categories = Category::notDelete()->isParent()->with(['children'=>function($query){
            return $query->with('children');
        }])->get();
        return CategoryResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'category_name'=>'required',
            'category_status'=>'required',
            'attachmentIds'=>'array'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $category = Category::create([
                    'category_name'=>$request->category_name,
                    'category_slug'=>Str::slug($request->category_name),
                    'parent_id'=>(!empty($request->parent_id))?$request->parent_id : null,
                    'attachment_id'=>(!empty($request->attachmentIds))? $request->attachmentIds[0]:null,
                    'category_status'=>(!empty($request->category_status) && $request->category_status == 1) ? $request->category_status : 2,
                ]);
                if($category){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Category Store Successfully',
                        'url'=>route('admin.category'),
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
                        $message .=  $errorItem .' ';
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
    public function show(Category $category)
    {
        return new CategoryResource($category);
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
    public function destroy(Request $request)
    {


        $category = Category::findOrFail($request->category_id);
        if($category){
            try{
                DB::beginTransaction();
                $category->update([
                    'category_status'=>0,
                ]);

                if($category){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Category Delete Successfully'
                    ]);
                }{
                    throw new Exception('Invalid Information.!');
                }
            }catch(Exception $ex){
                DB::rollBack();
                return response()->json([
                    'status' => 'error',
                    'message' => $ex->getMessage()
                ]);
            }
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Invalid Information.!'
            ]);
        }
    }

    public function category_wish_products(Request $request)
    {
        $products = [];
        if(!empty($request->categoryIds)){
            $reqData = [
                'categoryIds'=>$request->categoryIds,
            ];
            $products = ProductHelper::products_list($reqData);
        }

        if(!empty($products)){
            $collection = ProductCollection::collection($products);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $collection);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Products Not Found',[]);
        }
    }
}
