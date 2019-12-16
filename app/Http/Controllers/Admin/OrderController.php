<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\OrderHelper;
use App\Models\Order;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function index(Request $request){
        return view('order.index');
    }

    public function latest_order(Request $request){
        return view('order.latest_order');
    }

    public function order_list(Request $request){
        $orders = OrderHelper::order_list($request);
        if(!empty($orders)){
            // TODO Order Collection added
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $orders);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Order Found');
        }
    }

    public function order_status(){
        $status = array_flip(Order::OrderStatus);
        if(!empty($status)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $status);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Order Found');
        }
    }

    public function show($orderId){
        $order = Order::where('order_id', $orderId)->first();
        if(empty($order)){
            abort(Response::HTTP_NOT_FOUND);
        }
        return view('order.show',[
            'orderId'=>$orderId,
        ]);
    }
    public function order_details($orderId){
        $order = Order::where('order_id', $orderId)->with('buyer.user', 'orderItems.product','orderItems.seller.shop', 'billing', 'shipping', 'payment')->first();
        if(!empty($order)){
            return ResponserTrait::singleResponse($order, 'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Order Not Found', '', route('admin.order.index'));
        }
    }

    public function update_order_status(Request $request){
        $validator = Validator::make($request->all(),[
            'order_no'=>'required',
            'status'=>'required|integer'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $order = Order::where('order_no', $request->order_no)->first();

                if(empty($order)){
                    throw new \Exception('Invalid Order Information', Response::HTTP_BAD_REQUEST);
                }
                $order = $order->update([
                    'order_status'=>$request->status,
                ]);

                if(!empty($order)){
                    DB::commit();
                    $order = Order::where('order_no', $request->order_no)->first();
                    $data = [
                        'order_no'=>$order->order_no,
                        'order_status'=>$order->order_status,
                        'status_label'=>$order->status_label,
                    ];
                    return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK, 'Order Status Successfully Updated.');
                }else{
                    throw new \Exception('Order Status Not Updated', Response::HTTP_BAD_REQUEST);
                }

            }catch (\Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_BAD_REQUEST, $errors);
        }
    }
}
