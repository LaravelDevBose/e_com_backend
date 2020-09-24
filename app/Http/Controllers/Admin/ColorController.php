<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\ColorCollection;
use App\Http\Resources\Admin\Color as ColorResource;
use App\Models\Color;
use App\Traits\ResponserTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ColorController extends Controller
{
    public $template_name = 'limitless_v2';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = new ColorCollection(Color::notDelete()->latest()->get());
        if (!empty($colors)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $colors);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NO_CONTENT, 'No Color Data Found', []);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.'.$this->template_name.'.color.index');
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
                    $color = new ColorResource(Color::find($color->color_id));
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_CREATED, 'Color Created Successfully', $color);
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
            'color_name'=>'required|string:max:190',
            'color_code'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $color = Color::where('color_id', $id)->first();
                if(empty($color)){
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
                $color = $color->update([
                    'color_name'=>$request->color_name,
                    'color_code'=>$request->color_code,
                    'color_status'=>(!empty($request->color_status) && $request->color_status == 1) ? $request->color_status : 2,
                ]);
                if($color){
                    DB::commit();
                    $color =new ColorResource(Color::find($id));

                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Color Update Successfully', $color);
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
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Color Deleted Successfully');
                }{
                    throw new Exception('Invalid Information.!');
                }
            }catch(Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Invalid Color Info');
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
