<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Resources\Frontend\order\OrderItemCollection;
use App\Http\Resources\Frontend\review\ReviewResource;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Traits\ApiResponser;
use Exception;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{

    public function review_list(Request $request)
    {
        $reviews = Review::notDelete()->latest()
            ->with('product.thumbImage')
            ->where('user_id', $request->user()->user_id)->get();
        if(!empty($reviews)){
            $coll =  ReviewResource::collection($reviews);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::allResponse('success', Response::HTTP_OK, 'You haven\'t written any review');
        }
    }

    public function get_order_items($orderNo)
    {
        $order = Order::where('order_no', $orderNo)->first();
        if(empty($order)){
            return ApiResponser::AllResponse('success', Response::HTTP_NOT_FOUND, false);
        }
        $orderItems = OrderItem::where('order_id', $order->order_id)->with('product', 'image','review')->get();
        if(!empty($orderItems)){
            $coll = new OrderItemCollection($orderItems);
            return ApiResponser::CollectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ApiResponser::AllResponse('success', Response::HTTP_NOT_FOUND, false);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'rating'=>'required',
            'review'=>'required',
            'item_id'=>'required',
            'product_id'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $product = Product::where('product_id',$request->product_id)->first();
                if(empty($product)){
                    throw new Exception('Invalid Product Information', Response::HTTP_NOT_FOUND);
                }

                $orderItem = OrderItem::where('item_id',$request->item_id)->first();
                if(empty($orderItem)){
                    throw new Exception('Invalid Order Information', Response::HTTP_NOT_FOUND);
                }

                $review = Review::create([
                    'user_id'=>$request->user()->user_id,
                    'item_id'=>$request->item_id,
                    'product_id'=>$request->product_id,
                    'review'=>$request->review,
                    'rating'=>$request->rating,
                    'review_status'=>config('app.active'),
                ]);


                if(!empty($review)){
                    DB::commit();
                    return ApiResponser::AllResponse('success', Response::HTTP_OK, true,'Thank you. For Your Great Review.');
                }else{
                    throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::ValidationResponse($errors,'validation', Response::HTTP_BAD_REQUEST);
        }
    }
}
