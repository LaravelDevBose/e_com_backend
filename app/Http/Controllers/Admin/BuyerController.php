<?php

namespace App\Http\Controllers\Admin;

use App\Models\Buyer;
use App\Models\Order;
use App\Traits\ResponserTrait;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
{
    public $route = 'admin.buyer.';

    public function __construct()
    {
        view()->share('route',$this->route);
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $buyers = Buyer::notDelete()->with(['user', 'orders'=>function($query){
                return $query->where('order_status', Order::OrderStatus['Cancel']);
            }])->latest()->paginate(20);

            if(!empty($buyers)){
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $buyers);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Buyer Found');
            }
        }else{
            return view('buyer.index');
        }
    }

    public function buyer_show(Request $request, Buyer $buyer)
    {
        if($request->ajax()){
            $buyer = $buyer->load(['user', 'order']);
            if(!empty($buyer)){
                return ResponserTrait::singleResponse($buyer, 'status', Response::HTTP_OK, 'Buyer Details Found');
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Buyer Details Not Found', '', route('error.404'));
            }
        }else{
            return view('buyer.show',[
                'buyerId'=>$buyer->buyer_id,
            ]);
        }
    }

    public function buyer_status_change(Request $request,$buyerId){
        try{
            DB::beginTransaction();
            $buyer = Buyer::where('buyer_id', $buyerId)->first();

            if(empty($buyer)){
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Buyer Information Not Found', '', route('error.404'));
            }
            $userId = $buyer->user_id;

            $buyer = $buyer->update([
                'buyer_status'=>$request->status
            ]);
            if(!empty($buyer)){
                $user = User::where('user_id', $userId)
                    ->update([
                        'status'=>$request->status
                    ]);

                if(!empty($user)){
                    DB::commit();
                    $data = [
                        'id'=>$buyerId,
                        'status'=>$request->status
                    ];
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Customer Status Successfully', $data);
                }else{
                    throw  new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
            }else{
                throw  new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());

        }
    }

    public function destroy($buyerId){
        try{
            DB::beginTransaction();
            $buyer = Buyer::where('buyer_id', $buyerId)->first();

            if(empty($buyer)){
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Buyer Information Not Found', '', route('error.404'));
            }
            $userId = $buyer->user_id;
            $buyer = $buyer->update([
                'buyer_status'=>0
            ]);
            if(!empty($buyer)){
                $user = User::where('user_id', $userId)
                    ->update([
                        'status'=>0
                    ]);

                if(!empty($user)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Customer Delete Successfully');
                }else{
                    throw  new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
            }else{
                throw  new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());

        }
    }
}
