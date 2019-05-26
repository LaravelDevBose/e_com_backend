<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\ColorCollection;
use App\Http\Resources\Admin\Color as ColorResource;
use App\Models\Color;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ColorCollection(Color::notDelete()->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.index');
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
            'color_name'=>'required|string:max:190',
            'color_code'=>'required',
            'color_status'=>'required'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $color = Color::create([
                    'color_name'=>$request->color_name,
                    'color_code'=>$request->color_code,
                    'color_status'=>(!empty($request->color_status) && $request->color_status == 1) ? $request->color_status : 2,
                ]);
                if($color){
                    DB::commit();
                    $res = [
                        'status'=>'success',
                        'message'=>'Color Store Successfully',
                    ];

                    return response()->json([
                        'color'=>new ColorResource(Color::find($color->color_id)),
                        'res'=>$res,
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
    public function destroy(Color $color)
    {
        if($color){
            try{
                DB::beginTransaction();
                $color->update([
                    'color_status'=>0,
                ]);

                if($color){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Color Delete Successfully'
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

    public function import(Request $request){
        $file = $request->file('excel_file')->getRealPath();

        $excel_file = Excel::load($file)->ignoreEmpty()->get()->toArray();
        $result =0;
        if(!empty($excel_file) && isset($excel_file[0])){
            foreach ($excel_file as $r =>$row){
                foreach ($row as $c => $coll){
                    if(!empty($coll['name']) && !empty($coll['code']) ){

                        if(strpos($coll['code'], '#') === 0){
                            $color = Color::create([
                                'color_name'=>$coll['name'],
                                'color_code'=>$coll['code'],
                                'color_status'=>$coll['status']?? 2
                            ]);
                            if($color){
                                $result++;
                            }

                        }
                    }
                }

            }

            if($result == count($excel_file)){
                return response()->json([
                    'status'=>'success',
                    'message'=>'All Color Data Store Successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>'success',
                    'message'=>'Some of Color Data Not Store Successfully'
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
