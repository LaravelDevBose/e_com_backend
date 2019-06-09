<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Resources\Admin\BrandCollection;
use App\Http\Resources\Admin\Brand as BrandResource;

class BrandController extends Controller
{
    public $route = 'admin.brand.';

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
        $brands = Brand::notDelete()->with(['attachment'])->latest()->get();
        return new BrandCollection($brands);
    }

    public function brand_list(){
        $brands = Brand::isActive()->select('brand_id as id', 'brand_name as text')->latest()->get();
        return response()->json($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.index');
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
            'brand_name'=>'required',
            'attachment_id'=>'array'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $brand = Brand::create([
                    'brand_name'=>$request->brand_name,
                    'brand_slug'=>Str::slug($request->brnad_name),
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id[0]:null,
                    'brand_status'=>(!empty($request->brand_status) && $request->brand_status == 1) ? $request->brand_status : 2,
                ]);
                if($brand){
                    DB::commit();
                    return response()->json([
                        'brand'=> new BrandResource(Brand::find($brand->brand_id)),
                        'res'=>[
                            'status'=>'success',
                            'message'=>'Brand Store Successfully',
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
    public function show(Brand $brand)
    {
        return new BrandResource($brand);
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
    public function destroy(Brand $brand)
    {
        if($brand){
            try{
                DB::beginTransaction();
                $brand->update([
                    'brand_status'=>0,
                ]);

                if($brand){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Brand Delete Successfully'
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
}
