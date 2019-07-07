<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\SkinTypeCollection;
use App\Http\Resources\Admin\SkinType as SkinTypeResource;
use App\Models\SkinType;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class SkinTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new SkinTypeCollection(SkinType::notDelete()->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skin_type.index');
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
            'skin_type'=>'required|string:max:190',
            'skin_type_status'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $skinType = SkinType::create([
                    'skin_type'=>$request->skin_type,
                    'skin_type_status'=>(!empty($request->skin_type_status) && $request->skin_type_status == 1) ? $request->skin_type_status : 2,
                ]);
                if($skinType){
                    DB::commit();
                    return response()->json([
                        'tag'=> new SkinTypeResource(SkinType::find($skinType->skin_type_id)),
                        'res'=>[
                            'status'=>'success',
                            'message'=>'Skin Type Store Successfully',
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
    public function destroy(SkinType $skinType)
    {
        if($skinType){
            try{
                DB::beginTransaction();
                $skinType->update([
                    'skin_type_status'=>0,
                ]);

                if($skinType){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Skin Type Delete Successfully'
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

    public function import_file(Request $request){
        $file = $request->file('excel_file')->getRealPath();

        $excel_file = Excel::load($file)->ignoreEmpty()->get()->toArray();
        $result =0;
        if(!empty($excel_file) && isset($excel_file[0])){
            foreach ($excel_file as $r =>$row){
                foreach ($row as $c => $coll){
                    if(!empty($coll['skin_type'])){
                        $color = SkinType::create([
                            'skin_type'=>$coll['skin_type'],
                            'skin_type_status'=>$coll['skin_type_status']?? 2
                        ]);
                        if($color){
                            $result++;
                        }
                    }
                }

            }

            if($result == count($excel_file)){
                return response()->json([
                    'status'=>'success',
                    'message'=>'All Data Store Successfully',
                    'url'=>route('admin.skinType.create')
                ]);
            }else{
                return response()->json([
                    'status'=>'success',
                    'message'=>'Some of Data Not Store Successfully',
                    'url'=>route('admin.skinType.create')
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
