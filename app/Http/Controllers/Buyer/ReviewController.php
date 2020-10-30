<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Resources\Frontend\order\OrderItemCollection;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Traits\ApiResponser;
use Exception;
use App\Helpers\TemplateHelper;
use App\Models\Review;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{

    public function review_list()
    {
        $reviews = Review::notDelete()->latest()->with('item', 'product')->where('buyer_id', auth()->user()->buyer->buyer_id)->paginate(20);

        if(!empty($reviews)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $reviews);
        }else{
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'You haven\'t written any review');
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
                    'buyer_id'=>auth()->user()->buyer->buyer_id,
                    'item_id'=>$request->item_id,
                    'product_id'=>$request->product_id,
                    'review'=>$request->review,
                    'rating'=>$request->rating,
                    'review_status'=>config('app.active'),
                ]);


                if(!empty($review)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Thank you. For Your Great Review.', route('buyer.reviews.index'));
                }else{
                    throw new Exception('Invalid Information!', Response::HTTP_BAD_REQUEST);
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
}
