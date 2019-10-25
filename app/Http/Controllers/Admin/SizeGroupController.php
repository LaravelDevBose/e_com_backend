<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
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
use Maatwebsite\Excel\Facades\Excel;

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
                    $sizeGroupCatArray = array();
                    if($request->categoryIDs){
                        foreach ($request->categoryIDs as $key=> $categoryId){
                            $categoryList = Category::All_children_Ids($categoryId);
                            foreach ($categoryList as $catKey=>$cat){
                                array_push($sizeGroupCatArray, [
                                    'size_group_id'=>$sizeGroup->size_group_id,
                                    'category_id'=>$cat,
                                    'sgc_status'=> config('app.active')
                                ]);
                            }
                        }
                    }
                    $groupCategory = SizeGroupCategory::insert($sizeGroupCatArray);
                    if(!empty($groupCategory)){
                        if($request->sizeNames){
                            $sizeNames = $request->sizeNames;
                            $sizeArray = array();
                            for ($i=1; $i< count($sizeNames); $i++){
                                array_push($sizeArray,[
                                    'size_group_id'=>$sizeGroup->size_group_id,
                                    'size_name'=>$sizeNames[$i],
                                    'size_status'=> config('app.active')
                                ]);
                            }
                            if(empty($sizeArray)){
                                throw new Exception('No Size Name Found');
                            }

                            $sizes = Size::insert($sizeArray);
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
                        }else{
                            throw new Exception('No Size Name Found');
                        }
                    }else{
                        throw new Exception('Size Category Not Added');
                    }

//                    return $request->sizeNames;
                }else{
                    throw new Exception('Invalid Information');
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

    public function import_size_group(Request $request){
        $file = $request->file('excel_file')->getRealPath();

        $excel_file = Excel::load($file)->ignoreEmpty()->get()->toArray();
        $result =0;
        if(!empty($excel_file) && isset($excel_file[0])){
            foreach ($excel_file as $r =>$row){
                foreach ($row as $c => $coll){
                    if(!empty($coll['size_group_title'])){
                        $sizeGroup = SizeGroup::create([
                            'size_group_title'=>$coll['size_group_title'],
                            'size_group_slug'=>Str::slug($coll['size_group_title']),
                            'size_group_status'=>$coll['size_group_status']?? config('app.inactive')
                        ]);
                        if($sizeGroup){
                            if(!empty($coll['size_group_categories'])){
                                $categoryIDs = explode(',',$coll['size_group_categories']);
                                foreach ($categoryIDs as $key => $categoryID){
                                    SizeGroupCategory::create([
                                        'size_group_id'=>$sizeGroup->size_group_id,
                                        'category_id'=>$categoryID,
                                        'sgc_status'=> config('app.active')
                                    ]);
                                }
                            }

                            $result++;
                        }

                    }
                }

            }

            if($result == count($excel_file)){
                return response()->json([
                    'status'=>'success',
                    'message'=>'All Size Group Data Store Successfully',
                    'url'=>route('admin.size_group.create'),
                ]);
            }else{
                return response()->json([
                    'status'=>'success',
                    'message'=>'Some of Size Group Data Not Store Successfully',
                    'url'=>route('admin.size_group.create'),
                ]);
            }
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Uploaded File is Empty. No Data Found.'
            ]);
        }
    }

    public function import_size(Request $request){
        $file = $request->file('excel_file')->getRealPath();

        $excel_file = Excel::load($file)->ignoreEmpty()->get()->toArray();
        $result =0;
        if(!empty($excel_file) && isset($excel_file[0])){
            foreach ($excel_file as $r =>$row){
                foreach ($row as $c => $coll){
                    if(!empty($coll['size_group_id']) && !empty($coll['size_name'])){
                        $size = Size::create([
                            'size_group_id'=>$coll['size_group_id'],
                            'size_name'=>Str::slug($coll['size_name']),
                            'size_status'=>$coll['size_status'] ?? config('app.inactive')
                        ]);
                        if($size){
                            $result++;
                        }

                    }
                }

            }

            if($result == count($excel_file)){
                return response()->json([
                    'status'=>'success',
                    'message'=>'All Size Data Store Successfully',
                    'url'=>route('admin.size_group.create'),
                ]);
            }else{
                return response()->json([
                    'status'=>'success',
                    'message'=>'Some of Size Data Not Store Successfully',
                    'url'=>route('admin.size_group.create'),
                ]);
            }
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Uploaded File is Empty. No Data Found.'
            ]);
        }
    }
}
