<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\DeliveryCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Admin\DeliveryCostCollection;
use App\Http\Resources\Admin\DeliveryCost as DeliveryCostResource;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DeliveryCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DeliveryCostCollection(DeliveryCost::notDelete()->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delivery_cost.index');
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
            'cost_title'=>'required|string|max:190',
            'delivery_area'=>'required',
            'package_weight'=>'required',
            'package_length'=>'required',
            'package_width'=>'required',
            'package_height'=>'required',
            'cost_price'=>'required',
            'cost_status'=>'required|boolean',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $cost = DeliveryCost::create([
                    'cost_title'=>$request->cost_title,
                    'delivery_area'=>$request->delivery_area,
                    'package_weight'=>$request->package_weight,
                    'package_length'=>$request->package_length,
                    'package_width'=>$request->package_width,
                    'package_height'=>$request->package_height,
                    'cost_price'=>$request->cost_price,
                    'cost_status'=>(!empty($request->cost_status) && $request->cost_status == 1) ? $request->cost_status : 2,
                ]);
                if($cost){
                    DB::commit();
                    return response()->json([
                        'cost'=>new DeliveryCostResource(DeliveryCost::find($cost->cost_id)),
                        'res'=>[
                            'status'=>'success',
                            'message'=>'Delivery Cost Store Successfully',
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
    public function destroy(DeliveryCost $deliveryCost)
    {

        if($deliveryCost){
            try{
                DB::beginTransaction();
                $deliveryCost->update([
                    'cost_status'=>0,
                ]);

                if($deliveryCost){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Delivery Cost Delete Successfully'
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

    public function import_delivery_cost(Request $request){
        $file = $request->file('excel_file')->getRealPath();

        $excel_file = Excel::load($file)->ignoreEmpty()->get()->toArray();
        $result =0;
        if(!empty($excel_file) && isset($excel_file[0])){
            foreach ($excel_file as $r =>$row){
                foreach ($row as $c => $coll){
                    $validate = Validator::make($coll, [
                                'cost_title'=>'required',
                                'delivery_area'=>'required',
                                'package_weight'=>'required',
                                'package_length'=>'required',
                                'package_width'=>'required',
                                'package_height'=>'required',
                                'cost_price'=>'required'
                            ]);
                    if($validate->passes()){
                        $cost = DeliveryCost::create([
                            'cost_title'=>$coll['cost_title'],
                            'package_weight'=>$coll['package_weight'],
                            'package_length'=>$coll['package_length'],
                            'package_width'=>$coll['package_width'],
                            'package_height'=>$coll['package_height'],
                            'cost_price'=>$coll['cost_price'],
                            'cost_status'=>$coll['cost_status']?? 2,
                            'delivery_area'=>$coll['delivery_area'],
                        ]);
                        if($cost){
                            $result++;
                        }
                    }
                }

            }

            if($result == count($excel_file)){
                return response()->json([
                    'status'=>'success',
                    'message'=>'All Delivery Cost Store Successfully',
                    'url'=>route('admin.delivery_cost.create')
                ]);
            }else{
                return response()->json([
                    'status'=>'success',
                    'message'=>'Some of Delivery Cost Data Not Store Successfully',
                    'url'=>route('admin.delivery_cost.create')
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
