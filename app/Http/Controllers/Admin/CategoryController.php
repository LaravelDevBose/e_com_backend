<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\Category as CategoryResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Null_;


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
        $categories = Category::isActive()->with(['attachment','parent'=>function($query){
            $query->isActive()->with('parent');
        }])->get();
        return new CategoryCollection($categories);
    }

    public function category_tree(){
        $categories = Category::isActive()->isParent()->with('children')->get();
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
                    'category_status'=>$request->category_status,
                ]);
                if($category){
                    $res =[
                        'category'=> new CategoryResource($category),
                        'res'=>[
                            'status'=>'success',
                            'url'=>route('admin.category'),
                        ]
                    ];
                    DB::commit();
                    return response()->json($res);
                }

            }catch (Exception $ex){
                DB::rollBack();
                $res =[
                    'status' => 'error',
                    'message' => $ex->getMessage()
                ];
                return response()->json([
                    'res'=>$res,
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
            $res = [
                'status' => 'validation',
                'message' => ($message != null) ? $message :'Invalid File!'
            ];
            return response()->json([
                'res'=>$res
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
    public function destroy($id)
    {
        //
    }
}
