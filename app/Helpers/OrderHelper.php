<?php


namespace App\Helpers;


use App\Models\Order;
use App\Models\OrderItem;

class OrderHelper
{
    public static function order_list($request=null){
        $request = (Object) $request;

        $orders = Order::with('buyer.user', 'orderItems', 'billing', 'shipping');

        if(!empty($request->buyer_id)){
            $orders = $orders->where('buyer_id', auth()->guard('web')->user()->buyer->buyer_id);
        }

        if(!empty($request->status)){
            $orders = $orders->orderStatus($request->status);
        }

        if(!empty($request->order_by)){
            if(!empty($request->sort_column)){
                $orders = $orders->orderBy($request->sort_column, $request->order_by);
            }else{
                $orders = $orders->orderBy('order_id', $request->order_by);
            }
        }

        if(!empty($request->start_date) && !empty($request->end_date)){
            $orders = $orders->whereDate('order_date','>=', $request->start_date)->whereDate('order_date', '<=', $request->end_date);
        }

        if(!empty($request->take)){
            $orders= $orders->take($request->take);
        }

        if(!empty($request->paginate)){
            $orders = $orders->paginate($request->paginate);
        }else{
            $orders = $orders->get();
        }

        return $orders;
    }


    public static function order_item_list($request=null){
        $request = (Object) $request;

        $orderItems = OrderItem::with('order','buyer.user','product.thumbImage', 'size', 'color', 'brand');

        if(!empty($request->seller_id)){
            $orderItems = $orderItems->where('seller_id', auth()->user()->seller->seller_id);
        }

        if(!empty($request->status)){
            $orderItems = $orderItems->orderItemStatus($request->status);
        }

        if(!empty($request->order_by)){
            if(!empty($request->sort_column)){
                $orderItems = $orderItems->orderBy($request->sort_column, $request->order_by);
            }else{
                $orderItems = $orderItems->orderBy('item_id', $request->order_by);
            }
        }

        if(!empty($request->take)){
            $orderItems= $orderItems->take($request->take);
        }

        if(!empty($request->paginate)){
            $orderItems = $orderItems->paginate($request->paginate);
        }else{
            $orderItems = $orderItems->get();
        }

        return $orderItems;
    }
}
