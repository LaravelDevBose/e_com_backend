<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Resources\Admin\DeliveryMethod as DeliveryMethodResource;
use App\Models\DeliveryMethod;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DeliveryMethodController extends Controller
{
    public $route = 'admin.delivery.method.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.delivery_method.index');
    }

    public function delivery_method_list(){
        $deliveryMethods = DeliveryMethod::notDelete()->latest()->get();
        if(!empty($deliveryMethods)){
            $coll = DeliveryMethodResource::collection($deliveryMethods);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Delivery Methods not Found');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'delivery_title'=>'required',
            'min_time'=>'required',
            'max_time'=>'required',
            'cost_price'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $method = DeliveryMethod::create([
                    'delivery_title'=>$request->delivery_title,
                    'min_time'=>$request->min_time,
                    'max_time'=>$request->max_time,
                    'cost_price'=>$request->cost_price,
                    'delivery_status'=>(!empty($request->delivery_status) && $request->delivery_status == 1) ? $request->delivery_status : 2,
                ]);
                if($method){
                    DB::commit();
                    $data = new DeliveryMethodResource(DeliveryMethod::find($method->delivery_id));
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Delivery Method Store Successfully',$data);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($deliveryId)
    {
        $method = DeliveryMethod::where('delivery_id', $deliveryId)->first();
        if(!empty($method)){
            $data = new DeliveryMethodResource($method);

            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK, 'Delivery Method Find');
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_NOT_FOUND, 'Delivery Method Not Found');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'delivery_title'=>'required',
            'min_time'=>'required',
            'max_time'=>'required',
            'cost_price'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $method = DeliveryMethod::where('delivery_id', $id)->first();
                if(empty($method)){
                    throw new Exception('Delivery Method Not Found.', Response::HTTP_NOT_FOUND);
                }

                $method =$method->update([
                    'delivery_title'=>$request->delivery_title,
                    'min_time'=>$request->min_time,
                    'max_time'=>$request->max_time,
                    'cost_price'=>$request->cost_price,
                    'delivery_status'=>(!empty($request->delivery_status) && $request->delivery_status == 1) ? $request->delivery_status : 2,
                ]);
                if($method){
                    DB::commit();
                    $data = new DeliveryMethodResource(DeliveryMethod::find($id));
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Delivery Method Update Successfully', $data);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($deliveryId)
    {
        try{
            DB::beginTransaction();
            $method = DeliveryMethod::where('delivery_id', $deliveryId)->first();

            $method->update([
                'delivery_status'=>config('app.delete'),
            ]);

            if($method){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Delivery Method Delete Successfully');
            }{
                throw new Exception('Invalid Information.!', Response::HTTP_BAD_REQUEST);
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }
    }
}
