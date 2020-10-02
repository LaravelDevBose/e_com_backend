<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\DiscountProductCollection;
use App\Models\DiscountProduct;
use App\Traits\ResponserTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class DiscountProductController extends Controller
{
    public $template_name = 'limitless_v2';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.discount_product.index');

    }

    public function list(){
        $couponCodes = DiscountProduct::notDelete()->with(['product'=>function($query){
            return $query->NotDelete()->with('thumbImage', 'category');
        }])->latest()->get();
        return new DiscountProductCollection($couponCodes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin_panel.'.$this->template_name.'.discount_product.create');
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
            'productIds'=>'required|array',
            'expiredAts'=>'required|array',
            'discounts'=>'required|array',
            'start_dates'=>'required|array',
            'discounts.*.percent'=>'required|integer|min:0|not_in:0',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $discountProductArray = array();

                foreach ($request->productIds as $key => $value){
                    $dis = $request->discounts[$key]['percent'];
                    $start = $request->start_dates[$key]['date_time'];
                    $exi = $request->expiredAts[$key]['date_time'];
                    array_push($discountProductArray, [
                        'product_id'=>$value,
                        'discount_percent'=>$dis,
                        'start_at'=>Carbon::parse($start)->format('Y-m-d'),
                        'expire_at'=>Carbon::parse($exi)->format('Y-m-d'),
                        'status'=> config('app.active'),
                    ]);
                }

                if(!empty($discountProductArray) && count($discountProductArray) > 0){
                    $disProduct = DiscountProduct::insert($discountProductArray);
                    if(!empty($disProduct)){
                        DB::commit();
                        return ResponserTrait::allResponse(
                            'success',
                            Response::HTTP_OK,
                            'Discount Products Store Successfully',
                            '',
                            route('admin.discount_product.index')
                        );
                    }
                }else{
                    throw new Exception('Invalid Discount Product Information', Response::HTTP_BAD_REQUEST);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($disProId)
    {
        try{
            DB::beginTransaction();
            $disPro = DiscountProduct::find($disProId);
            if (empty($disPro)){
                throw new Exception('Invalid Discount Product Information', Response::HTTP_NOT_FOUND);
            }
            $disPro->update([
                'status'=> config('app.delete'),
            ]);

            if(!empty($disPro)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Discount Product Delete Successfully');
            }{
                throw new Exception('Invalid Information.!');
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
