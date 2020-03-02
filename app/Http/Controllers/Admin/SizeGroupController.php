<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Size;
use App\Traits\ResponserTrait;
use Exception;
use App\Models\SizeGroup;
use Illuminate\Http\Response;
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
        $sizeGroups= SizeGroup::notDelete()->with(['categories.category', 'sizes'=>function($query){
                return $query->isActive();
                },
            ])->latest()->get();
        return SizeGroupResource::collection($sizeGroups);
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
                                throw new Exception('No Size Name Found',Response::HTTP_BAD_REQUEST);
                            }

                            $sizes = Size::insert($sizeArray);
                            DB::commit();
                            $SGroup = SizeGroup::with(
                                [
                                    'categories'=>function($query){ return $query->with('category'); },
                                    'sizes'=>function($query){ return $query->isActive(); }
                                ])->find($sizeGroup->size_group_id);
                            $data = new SizeGroupResource($SGroup);
                            return ResponserTrait::singleResponse($data,'success', Response::HTTP_CREATED, 'Size Group Created Successfully');
                        }else{
                            throw new Exception('No Size Name Found',Response::HTTP_BAD_REQUEST);
                        }
                    }else{
                        throw new Exception('Size Category Not Added',Response::HTTP_BAD_REQUEST);
                    }

//                    return $request->sizeNames;
                }else{
                    throw new Exception('Invalid Information',Response::HTTP_BAD_REQUEST);
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
        $validator = Validator::make($request->all(),[
            'size_group_title'=>'required',
            'size_group_status'=>'required',
            'categoryIDs'=>'required|array',
            'sizeNames'=>'required|array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $sizeGroup = SizeGroup::where('size_group_id', $id)->first();

                if(empty($sizeGroup)){
                    throw new Exception('Invalid Information Pass', Response::HTTP_NOT_FOUND);
                }
                $sizeGroup = $sizeGroup->update([
                    'size_group_title'=>$request->size_group_title,
                    'size_group_slug'=>Str::slug($request->size_group_title),
                    'size_group_status'=>(!empty($request->size_group_status) && $request->size_group_status == 1) ? $request->size_group_status : 2,
                ]);
                if(!empty($sizeGroup)){
                    $sizeGroupCatArray = array();
                    if($request->categoryIDs){

                        $deletedCatId = array();

                        $categoryList = Category::All_children_Ids_by_array_data($request->categoryIDs);
                        $allGroupCatIds = SizeGroupCategory::where('size_group_id', $id)->where('sgc_status', 1)->pluck('category_id')->toArray();

                        // check new category id is added or not
                        foreach ($categoryList as $key =>$catId){
                            if(!in_array($catId, $allGroupCatIds)){
                                array_push($sizeGroupCatArray, [
                                    'size_group_id'=>$id,
                                    'category_id'=>$catId,
                                    'sgc_status'=> config('app.active')
                                ]);
                            }
                        }

                        // check is any exist category id is remove or not
                        foreach ($allGroupCatIds as $key =>$catId){
                            if(!in_array($catId, $categoryList)){
                                array_push($deletedCatId, $catId);
                            }
                        }

                        // if existing category remove then make then remove
                        if(!empty($deletedCatId)&& count($deletedCatId) > 0){
                            SizeGroupCategory::where('size_group_id', $id)->whereIn('category_id', $deletedCatId)
                                ->update([
                                    'sgc_status'=>0,
                                ]);
                        }

                        $groupCategory = SizeGroupCategory::insert($sizeGroupCatArray);

                        if(!empty($groupCategory)){
                            if($request->sizeNames){
                                $sizeNames = $request->sizeNames;
                                if(empty($sizeNames)){
                                    throw new Exception('No Size Name Found',Response::HTTP_BAD_REQUEST);
                                }
                                $sizeArray = array();
                                $existSizes = Size::where('size_group_id',$id)->where('size_status', 1)->pluck('size_name', 'size_id')->toArray();

                                for ($i=1; $i< count($sizeNames); $i++){
                                    if(!in_array($sizeNames[$i],$existSizes)){
                                        array_push($sizeArray,[
                                            'size_group_id'=>$id,
                                            'size_name'=>$sizeNames[$i],
                                            'size_status'=> config('app.active')
                                        ]);
                                    }
                                }

                                $deletedSizeIds = array();

                                foreach ($existSizes as $sizeId=>$sizeName){
                                    if(!in_array($sizeName, $sizeNames)){
                                        array_push($deletedSizeIds, $sizeId);
                                    }
                                }
                                if(!empty($deletedSizeIds) && count($deletedSizeIds) > 0){
                                    Size::whereIn('size_id', $deletedSizeIds)->update([
                                        'size_status'=>0,
                                    ]);
                                }
                                $sizes = Size::insert($sizeArray);
                                if(!empty($sizes)){
                                    DB::commit();
                                    $SGroup = SizeGroup::with(
                                        [
                                            'categories'=>function($query){ return $query->with('category'); },
                                            'sizes'=>function($query){ return $query->isActive(); }
                                        ])->find($id);
                                    $data = new SizeGroupResource($SGroup);
                                    return ResponserTrait::singleResponse($data,'success', Response::HTTP_OK, 'Size Group Updated Successfully');
                                }else{
                                    throw new Exception('Invalid size Information Pass', Response::HTTP_BAD_REQUEST);
                                }

                            }else{
                                throw new Exception('No Size Name Found',Response::HTTP_BAD_REQUEST);
                            }
                        }else{
                            throw new Exception('Size Category Not Added',Response::HTTP_BAD_REQUEST);
                        }
                    }else{
                        throw new Exception('Invalid Category Information', Response::HTTP_BAD_REQUEST);
                    }
                }else{
                    throw new Exception('Invalid Information',Response::HTTP_BAD_REQUEST);
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
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Size Group Deleted Successfully');

                }{
                    throw new Exception('Invalid Information.!', Response::HTTP_BAD_REQUEST);
                }
            }catch(Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'Invalid Information');
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
