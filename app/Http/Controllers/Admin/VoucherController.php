<?php

namespace App\Http\Controllers\Admin;

use App\Models\Voucher;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('voucher.index');
    }

    public function formData(){
        $voucherType = Voucher::VoucherType;
        $applyTo = Voucher::ApplyTo;
        return response()->json([
            'voucherType'=>$voucherType,
            'applyTo'=>$applyTo,
            'discountType'=>Voucher::DiscountType,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateArray = [
            'voucher_name'=>'required|string|max:190',
            'voucher_start'=>'required|date|after:yesterday',
            'voucher_end'=>'required|date|after:voucher_start',
            'voucher_type'=>'required|boolean',
            'voucher_code'=>'required|string|max:100',
            'voucher_issued'=>'required|integer',
            'discount_type'=>'required|integer',
            'discount_value'=>'required|',
            'min_order_value'=>'required',
            'usage_limit'=>'required|integer',
            'apply_to'=>'required|integer',
        ];

        if($request->discount_type == 2){
            array_push($validateArray,[
                'max_discount'=>'required'
            ]);
        }
        if($request->apply_to === 2){
            array_push($validateArray,[
                'productIDs'=>'required|array'
            ]);
        }

        $validator = Validator::make($request->all(),$validateArray);


        if($validator->passes()){
            try{
                DB::beginTransaction();

                $voucher = Voucher::create([
                    'voucher_name'=>$request->voucher_name,
                    'voucher_start'=>Carbon::parse($request->voucher_start)->format('Y-m-d H:i:s'),
                    'voucher_end'=>Carbon::parse($request->voucher_end)->format('Y-m-d H:i:s'),
                    'voucher_type'=>$request->voucher_type,
                    'voucher_code'=>$request->voucher_code,
                    'voucher_issued'=>$request->voucher_issued,
                    'discount_type'=>$request->discount_type,
                    'discount_value'=>$request->discount_value,
                    'max_discount'=>(!empty($request->max_discount))?$request->max_discount:'0.00',
                    'min_order_value'=>$request->min_order_value,
                    'usage_limit'=>$request->usage_limit,
                    'apply_to'=>$request->apply_to,
                    'collect_start'=>(!empty($request->collect_start))? Carbon::parse($request->voucher_start)->format('Y-m-d H:i:s'):null,
                    'attachment_id'=>(!empty($request->attachmentIds))? $request->attachmentIds[0]:null,
                    'voucher_status'=>(!empty($request->category_status) && $request->category_status == 1) ? $request->category_status : 2,
                ]);
                if($voucher){
                    DB::commit();
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Voucher Store Successfully',
                        'url'=>route('admin.voucher.index'),
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
    public function destroy($id)
    {
        //
    }
}
