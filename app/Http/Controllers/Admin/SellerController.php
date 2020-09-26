<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\SellerCollection;
use App\Http\Resources\Admin\SellerResource;
use App\Models\Seller;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class SellerController extends Controller
{
    public $route = 'admin.seller.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin_panel.'.$this->template_name.'.seller.index');
    }

    public function seller_list(){
        $sellers = Seller::notDelete()->latest()->get();
        $coll = new SellerCollection($sellers);
        return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
    }

    public function seller_select_list()
    {
        $sellers = Seller::select('seller_id as id', 'seller_name as text')->where('seller_status', config('app.active'))->latest()->get();
        return response()->json($sellers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.'.$this->template_name.'.seller.create');
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
            'seller_name'=>'required|string',
            'seller_phone'=>'required|string',
            'seller_address'=>'required|string',
            'shop_name'=>'required|string',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $seller = Seller::create([
                    'seller_name'=>$request->seller_name,
                    'seller_phone'=>$request->seller_phone,
                    'seller_address'=>$request->seller_address,
                    'shop_name'=>$request->shop_name,
                    'seller_email'=>$request->seller_email,
                    'shop_address'=>$request->shop_address,
                    'shop_phone'=>$request->shop_phone,
                    'shop_email'=>$request->shop_email,
                    'shop_category'=>$request->shop_category,
                    'seller_status'=>(!empty($request->seller_status) && $request->seller_status == 1) ? $request->seller_status : 2,
                ]);
                if($seller){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_CREATED,'Seller Store Successfully','', route('admin.seller.index'));
                }else{
                    throw new Exception('Invalid Seller Information', Response::HTTP_BAD_REQUEST);
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
    public function show($sellerId)
    {
        $seller = Seller::where('seller_id', $sellerId)->first();
        if(!empty($seller)){
            $data = new SellerResource($seller);
            return ResponserTrait::singleResponse($data, 'Success', Response::HTTP_OK);
        }
        return ResponserTrait::allResponse('Not Found', Response::HTTP_NOT_FOUND, 'Seller Information Not Found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seller = Seller::where('seller_id', $id)->first();
        if (empty($seller)){
            abort(404);
        }
        return view('admin_panel.'.$this->template_name.'.seller.edit', [
            'sellerId'=>$id
        ]);
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
            'seller_name'=>'required|string',
            'seller_phone'=>'required|string',
            'seller_address'=>'required|string',
            'shop_name'=>'required|string',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $seller = Seller::find($id);
                if(empty($seller)){
                    throw new Exception('Invalid Seller Information', Response::HTTP_BAD_REQUEST);
                }
                $sellerU = $seller->update([
                    'seller_name'=>$request->seller_name,
                    'seller_phone'=>$request->seller_phone,
                    'seller_address'=>$request->seller_address,
                    'shop_name'=>$request->shop_name,
                    'seller_email'=>$request->seller_email,
                    'shop_address'=>$request->shop_address,
                    'shop_phone'=>$request->shop_phone,
                    'shop_email'=>$request->shop_email,
                    'shop_category'=>$request->shop_category,
                    'seller_status'=>(!empty($request->seller_status) && $request->seller_status == 1) ? $request->seller_status : 2,
                ]);
                if(!empty($sellerU)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Seller Update Successfully','', route('admin.seller.index'));
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
    public function destroy($sellerId)
    {
        try{
            DB::beginTransaction();
            $seller = Seller::find($sellerId);
            if (empty($seller)){
                throw new Exception('Invalid Seller Information', Response::HTTP_NOT_FOUND);
            }
            $seller->update([
                'seller_status'=>0,
            ]);

            if(!empty($seller)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Seller Delete Successfully');
            }{
                throw new Exception('Invalid Information.!', Response::HTTP_BAD_REQUEST);
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
