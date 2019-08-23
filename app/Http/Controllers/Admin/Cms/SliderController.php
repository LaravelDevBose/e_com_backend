<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Models\Slider;
use App\Traits\ResponserTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    use ResponserTrait;

    public function index(){

    }

    public function create(){

        return view('cms.slider.create');
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
            'slider_title'=>'required',
            'sub_title'=>'required',
            'attachmentIds'=>'required|array'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $slider = Slider::create([
                    'slider_title'=>$request->slider_title,
                    'sub_title'=>$request->sub_title,
                    'btn_text'=>$request->btn_text,
                    'btn_url'=>$request->btn_url,
                    'slider_position'=>$request->slider_position,
                    'attachment_id'=>$request->attachmentIds[0],
                    'slider_status'=>(!empty($request->slider_status) && $request->slider_status == config('app.active')) ? $request->slider_status : config('app.inactive'),
                ]);
                if($slider){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Slider Details Store Successfully',
                        'url'=>route('admin.cms.sliders.index'),
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
}
