<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Exception;
use App\Models\SizeGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SizeGroupCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Admin\SizeGroup as SizeGroupResource;
use App\Http\Resources\Admin\SizeGroupCollection;

class SizeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizeGroups= SizeGroup::notDelete()->with(
            [
                'categories'=>function($query){ return $query->with(['category']); },
                'sizes'=>function($query){ return $query->isActive();},
            ])->latest()->get();
        return new SizeGroupCollection($sizeGroups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_size.size_group');
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
            'size_group_title'=>'required',
            'size_group_status'=>'required',
            'categoryIDs'=>'required|array',
            'sizeNames'=>'required|array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $sizeGroup = SizeGroup::create([
                    'size_group_title'=>$request->size_group_title,
                    'size_group_slug'=>Str::slug($request->size_group_title),
                    'size_group_status'=>(!empty($request->size_group_status) && $request->size_group_status == 1) ? $request->size_group_status : 2,
                ]);
                if($sizeGroup){

                    if($request->categoryIDs){
                        foreach ($request->categoryIDs as $key=> $categoryId){
                            SizeGroupCategory::create([
                                'size_group_id'=>$sizeGroup->size_group_id,
                                'category_id'=>$categoryId,
                                'sgc_status'=> config('app.active')
                            ]);
                        }
                    }

//                    return $request->sizeNames;
                    if($request->sizeNames){
                        $sizeNames = $request->sizeNames;

                        for ($i=1; $i< count($sizeNames); $i++){
                            Size::create([
                                'size_group_id'=>$sizeGroup->size_group_id,
                                'size_name'=>$sizeNames[$i],
                                'size_status'=> config('app.active')
                            ]);
                        }
                    }
                    DB::commit();
                    $SGroup = SizeGroup::with(
                        [
                            'categories'=>function($query){ return $query->with('category'); },
                            'sizes'=>function($query){ return $query->isActive(); }
                        ])->find($sizeGroup->size_group_id);

                    return response()->json([
                        'sizeGroup'=>new SizeGroupResource($SGroup),
                        'res'=>[
                            'status'=>'success',
                            'message'=>'Size Group Store Successfully',
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
    public function destroy(SizeGroup $sizeGroup)
    {
        if($sizeGroup){
            try{
                DB::beginTransaction();
                $sizeGroup->update([
                    'size_group_status'=>0,
                ]);

                if($sizeGroup){
                    $sizeGroupCatIDs = SizeGroupCategory::where('size_group_id',$sizeGroup->size_group_id)->pluck('id');
                    SizeGroupCategory::where('id', $sizeGroupCatIDs)->update(['sgc_status'=>0 ]);

                    $sizeIDs = Size::where('size_group_id',$sizeGroup->size_group_id)->pluck('size_id');
                    Size::where('size_id', $sizeIDs)->update(['size_status'=>0 ]);

                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Size Group Delete Successfully'
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