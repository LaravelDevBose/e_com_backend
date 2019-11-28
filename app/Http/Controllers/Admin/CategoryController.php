<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Frontend\ProductHelper;
use App\Helpers\TemplateHelper;
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
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $categories = Category::notDelete()->with(['attachment','parent'=>function($query){
                $query->notDelete()->with('parent');
            }])->latest()->get();
            if(!empty($categories)){
                $coll = new CategoryCollection($categories);
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Category List Found');
            }
        }else{
            return view('admin_panel.'.$this->template_name.'.category.index');
        }

    }

    public function category_tree(){
        $categories = Category::isActive()->isParent()->with(['children'=>function($q){
            return $q->isActive();
        }])->get();
        return CategoryResource::collection($categories);
    }

    public function all_category_tree(){
        $categories = Category::isActive()->isParent()->with(['children'=>function($query){
            return $query->with(['children'=>function($q){
                return $q->isActive();
            }])->isActive();
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
        return view('admin_panel.'.$this->template_name.'.category.create');
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
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $category = Category::create([
                    'category_name'=>$request->category_name,
                    'trans_category_name'=>$request->trans_category_name,
                    'category_slug'=>Str::slug($request->category_name),
                    'parent_id'=>(!empty($request->parent_id))?$request->parent_id : null,
                    'banner_id'=>(!empty($request->banner_id))? $request->banner_id:null,
                    'sect_banner_id'=>(!empty($request->sect_banner_id))? $request->sect_banner_id:null,
                    'category_status'=>(!empty($request->category_status) && $request->category_status == 1) ? $request->category_status : 2,
                    'is_show'=>(!empty($request->is_show) && $request->is_show == 1) ? $request->is_show : 2,
                ]);
                if($category){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Category Store Successfully','', route('admin.category'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $category = Category::where('category_id',$id)->with('attachment')->first();
        if(!empty($category)){
            return ResponserTrait::singleResponse(new CategoryResource($category), 'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Category Not Found', [], route('admin.category'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $category = Category::where('category_id',$id)->with('attachment')->first();
        if(empty($category)){
            return abort(Response::HTTP_NOT_FOUND);
        }
        return view('admin_panel.'.$this->template_name.'.category.edit',[
            'categoryId'=>$id,
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
        $validator = Validator::make($request->all(),[
            'category_name'=>'required',
            'category_status'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $category = Category::find($id);
                if(empty($category)){
                    throw new Exception('Invalid Category Information', Response::HTTP_NOT_FOUND);
                }

                $category = $category->update([
                    'category_name'=>$request->category_name,
                    'trans_category_name'=>$request->trans_category_name,
                    'category_slug'=>Str::slug($request->category_name),
                    'parent_id'=>(!empty($request->parent_id))?$request->parent_id : null,
                    'attachment_id'=>(!empty($request->attachmentIds))? $request->attachmentIds:null,
                    'category_status'=>(!empty($request->category_status) && $request->category_status == 1) ? $request->category_status : 2,
                    'is_show'=>(!empty($request->is_show) && $request->is_show == 1) ? $request->is_show : 2,
                ]);
                if($category){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Category Update Successfully','', route('admin.category'));
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
            $categoryIds = array();
            foreach ($request->categoryIds as $key => $categoryId){
                $catIds = Category::All_children_Ids($categoryId);
                if(!empty($catIds)){
                    $categoryIds = array_merge($categoryIds, $catIds);
                }
            }
            $reqData = [
                'categoryIds'=>$categoryIds,
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
