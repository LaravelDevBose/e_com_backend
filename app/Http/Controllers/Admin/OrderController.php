<?php

namespace App\Http\Controllers\Admin;

use App\Events\OnCancelOrderItem;
use App\Helpers\OrderHelper;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Setting;
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
        $contactInfos = Setting::where('type', Setting::Setting_Type['contact'])->pluck('value', 'key');
        $order = Order::where('order_id', $orderId)->first();
        if(empty($order)){
            abort(Response::HTTP_NOT_FOUND);
        }
        return view('order.show',[
            'orderId'=>$orderId,
            'contactInfos'=>$contactInfos
        ]);
    }
    public function order_details($orderId){
        $order = Order::where('order_id', $orderId)->with('buyer.user', 'orderItems.product','orderItems.seller.shop', 'billing', 'shipping', 'payment', 'orderItems.image')->first();
        if(!empty($order)){
            return ResponserTrait::singleResponse($order, 'success', Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Order Not Found', '', route('admin.order.index'));
        }
    }

    public function invoice_print($orderId){
        $order = Order::where('order_id', $orderId)->with('buyer.user', 'orderItems.product','orderItems.seller.shop', 'billing', 'shipping', 'payment', 'orderItems.image')->first();
        $contactInfos = Setting::where('type', Setting::Setting_Type['contact'])->pluck('value', 'key');
        return view('order.invoice_print', [
            'order'=>$order,
            'contactInfos'=>$contactInfos
        ]);
    }

    public function update_order_status(Request $request){
        $validator = Validator::make($request->all(),[
            'order_no'=>'required',
            'status'=>'required|integer'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $order = Order::where('order_no', $request->order_no)->with('orderItems')->first();
                $orderId = $order->order_id;
                if(empty($order)){
                    throw new \Exception('Invalid Order Information', Response::HTTP_BAD_REQUEST);
                }

                if($request->status == Order::OrderStatus['Cancel']) {
                    $totalOrderItem = $order->orderItems->count();
                    $itemStatus = $order->orderItems->whereIn('item_status', [OrderItem::ItemStatus['Active'], OrderItem::ItemStatus['Cancel']])->count();

                    if ($totalOrderItem !== $itemStatus) {
                        throw new \Exception('Not Able To Cancel this Order. Some Item Are Already Shipped Or Ready To Ship', Response::HTTP_NOT_ACCEPTABLE);
                    }
                }

                $order = $order->update([
                    'order_status'=>$request->status,
                ]);

                if(!empty($order)){
                    if($request->status == Order::OrderStatus['Cancel']){
                        $activeItems = OrderItem::where('order_id', $orderId)->where('item_status', OrderItem::ItemStatus['Active'])->get();
                        foreach ($activeItems as $item){
                            $item->update([
                                'item_status'=>OrderItem::ItemStatus['Cancel'],
                                'cancel_by'=>OrderItem::CancelBy['Admin'],
                            ]);
                            event(new OnCancelOrderItem($item->item_id)); // Update Product qty if cancel order
                        }
                    }else{
                        $notCancelItems = OrderItem::where('order_id', $orderId)->where('item_status','!=', OrderItem::ItemStatus['Cancel'])->get();
                        foreach ($notCancelItems as $item){
                            $item->update([
                                'item_status'=>$request->status,
                            ]);
                        }
                    }
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

    public function update_order_item_status(Request $request){
        $validator = Validator::make($request->all(),[
            'item_id'=>'required',
            'status'=>'required|integer'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $orderItem = OrderItem::where('item_id', $request->item_id)->first();
                $orderId = $orderItem->order_id;
                if(empty($orderItem)){
                    throw new \Exception('Invalid Order Information', Response::HTTP_BAD_REQUEST);
                }
                $orderItem = $orderItem->update([
                    'item_status'=>$request->status,
                    'cancel_by'=>OrderItem::CancelBy['Admin'],
                ]);

                if(!empty($orderItem)){
                    if($request->status == OrderItem::AllItemStatus['Cancel']){

                        event(new OnCancelOrderItem($request->item_id)); // Product Stock Update when Cancel order

                        $notCancelItem = OrderItem::where('order_id', $orderId)->where('item_status', '!=', OrderItem::ItemStatus['Cancel'])->count();
                        if($notCancelItem == 0){
                            $order = Order::where('order_id', $orderId)
                                ->update([
                                    'order_status'=>Order::OrderStatus['Cancel'],
                                ]);
                            if(empty($order)){
                                throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                            }
                        }

                    }
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Order Item Status Updated.');
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
