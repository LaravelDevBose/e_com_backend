<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Resources\Admin\SliderCollection;
use App\Models\Slider;
use App\Traits\ResponserTrait;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    use ResponserTrait;

    public function index(){
        return view('cms.slider.index');
    }

    public function slider_list(){
        $sliders = Slider::notDelete()->with('attachment')->orderBy('slider_id', 'desc')->get();
        if(!empty($sliders)){
            $collection = SliderCollection::collection($sliders);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $collection);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'No slider Data');
        }
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
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Slider Details Store Successfully', '', route('admin.cms.sliders.index'));
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
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
            return ResponserTrait::allResponse('validation', Response::HTTP_NOT_ACCEPTABLE, ($message != null) ? $message :'Invalid File!', '', '');

        }
    }
}
