<?php

namespace App\Http\Controllers\Seller;

use App\Events\OnCancelOrderItem;
use App\Helpers\OrderHelper;
use App\Helpers\TemplateHelper;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public $seller_template;

    public function __construct()
    {
        $this->seller_template = TemplateHelper::sellerTemplate();
        if(empty($this->seller_template)){
            $this->seller_template = config('app.seller_template');
        }
        $this->middleware('auth:seller');
    }

    public function index(){
        return view('seller_panel.'.$this->seller_template.'.order.index');
    }

    public function latest_order(){
        return view('seller_panel.'.$this->seller_template.'.order.latest');
    }

    public function deliver_order_page(){
        return view('seller_panel.'.$this->seller_template.'.order.deliver_order_page');
    }

    public function ready_to_ship_order(){
        return view('seller_panel.'.$this->seller_template.'.order.ready_to_ship');
    }

    public function order_cancel_page(){
        return view('seller_panel.'.$this->seller_template.'.order.cancel_order');
    }

    public function order_item_list(Request $request){
        $orderItems = OrderHelper::order_item_list($request);
        if(!empty($orderItems)){
            // TODO Order Collection added
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $orderItems);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Order Found');
        }
    }

    public function order_item_status(){
        $status = array_flip(OrderItem::ItemStatus);
        if(!empty($status)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $status);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Order Found');
        }
    }

    public function update_order_item_status(Request $request){
        $validator = Validator::make($request->all(),[
            'item_id'=>'required',
            'item_status'=>'required|integer'
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $orderItem = OrderItem::where('item_id', $request->item_id)->first();

                if(empty($orderItem)){
                    throw new \Exception('Invalid Order Information', Response::HTTP_BAD_REQUEST);
                }
                $orderItem = $orderItem->update([
                    'item_status'=>$request->item_status,
                ]);

                if(!empty($orderItem)){
                    // Update Product Qty If Seller Cancel the Order;
                    if($request->item_status == OrderItem::AllItemStatus['Cancel']){
                        event(new OnCancelOrderItem($request->item_id));
                    }
                    DB::commit();
                    $orderItem = OrderItem::where('item_id', $request->item_id)->first();
                    $data = [
                        'item_id'=>$orderItem->item_id,
                        'item_status'=>$orderItem->item_status,
                        'item_status_label'=>$orderItem->item_status_label,
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
