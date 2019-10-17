<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Carbon\Carbon;
use Exception;
use App\Models\GroupProduct;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GroupProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $groupProducts = GroupProduct::with(['product'=>function($query){
                return $query->with('brand', 'category', 'singleVariation', 'thumbImage');
            }])->notDelete()->latest()->get();
            if(!empty($groupProducts)){
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $groupProducts);
            }else{
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Group Product Not Found');
            }
        }else{
            return view('group_products.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $data = [
                'groups'=>GroupProduct::groupsSelect(),
            ];
            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
        }else{
            return view('group_products.create');
        }
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
            'group_type'=>'required',
            'productIds'=>'required|array',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $groupProducts = array();
                $i=1;
                $expiredAt = $request->expiredAts;
                foreach ($request->productIds as $key=> $productId){
                    $product = Product::where('product_id', $productId)->first();
                    if(!empty($product)){
                        array_push($groupProducts,[
                            'group_type'=>$request->group_type,
                            'product_id'=>$productId,
                            'position'=>$i,
                            'expired_at'=>(!empty($request->expiredAts))? Carbon::parse($expiredAt[$key]['date_time'])->format('Y-m-d H:i:s') :null,
                            'status'=>config('app.active'),
                            'created_by'=>auth()->guard('admin')->id(),
                            'created_at'=>now(),
                        ]);
                        $i++;
                    }
                }
                if(empty($groupProducts)){
                    throw new Exception('Product is Not Selected', Response::HTTP_BAD_REQUEST);
                }
                $groups = GroupProduct::insert($groupProducts);
                if(!empty($groups)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Product Added To this Group Successfully', '', route('admin.group.index'));
                }else{
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
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
