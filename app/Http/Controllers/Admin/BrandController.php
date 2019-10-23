<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Traits\ResponserTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Resources\Admin\BrandCollection;
use App\Http\Resources\Admin\Brand as BrandResource;

class BrandController extends Controller
{
    public $route = 'admin.brand.';
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
        $brands = Brand::notDelete()->with(['attachment'])->latest()->get();
        if($request->ajax()) {
            $coll = new BrandCollection($brands);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
        }

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
        return view('admin_panel.'.$this->template_name.'.brand.index');
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
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $brand = Brand::create([
                    'brand_name'=>$request->brand_name,
                    'brand_slug'=>Str::slug($request->brnad_name),
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id:null,
                    'brand_status'=>(!empty($request->brand_status) && $request->brand_status == 1) ? $request->brand_status : 2,
                ]);
                if($brand){
                    DB::commit();
                    $brand = new BrandResource(Brand::find($brand->brand_id));
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Brand Store Successfully',$brand);
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
        $validator = Validator::make($request->all(),[
            'brand_name'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $brand = Brand::find($id);
                if(empty($brand)){
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
                $brand = $brand->update([
                    'brand_name'=>$request->brand_name,
                    'brand_slug'=>Str::slug($request->brnad_name),
                    'attachment_id'=>(!empty($request->attachment_id))? $request->attachment_id:null,
                    'brand_status'=>(!empty($request->brand_status) && $request->brand_status == 1) ? $request->brand_status : 2,
                ]);
                if(!empty($brand)){
                    $brand = new BrandResource(Brand::where('brand_id',$id)->with('attachment')->first());
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Brand Update Successfully',$brand, '');
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
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Brand Delete Successfully');
                }{
                    throw new Exception('Invalid Information.!');
                }
            }catch(Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Invalid Brand Information');

        }
    }
}
