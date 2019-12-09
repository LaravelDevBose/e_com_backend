<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Frontend\ProductHelper;
use App\Http\Resources\Admin\ProductCollection;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Shop;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public $route = 'admin.shop.';

    public function __construct()
    {
        view()->share('route',$this->route);
        $this->middleware('auth:admin');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $shops = Shop::with(['shopLogo','seller'=>function($query){
                $query->with(['user','orderItems','products'=>function($query){
                    return $query->notDelete();
                }])->notDelete();
            }])->latest()->get();

            if(!empty($shops)){
                return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $shops);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Shop Found');
            }
        }else{
            return view('shop.index');
        }
    }

    public function shop_status()
    {
        $shopStatus = array_flip(Seller::ShopStatus);
        if(!empty($shopStatus)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $shopStatus);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Shop Status Found');
        }
    }

    public function shop_status_change(Request $request,$sellerId){
        try{
            DB::beginTransaction();
            $seller = Seller::where('seller_id', $sellerId)->first();

            if(empty($seller)){
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Shop Information Not Found', '', route('error.404'));
            }

            $seller = $seller->update([
                'seller_status'=>$request->status
            ]);
            if(!empty($seller)){
                $status = array_flip(Seller::ShopStatus);
                $data = [
                    'seller_id'=>$sellerId,
                    'status'=>$request->status,
                    'status_label'=>$status[$request->status],
                ];
                DB::commit();

                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Shop Status Successfully', $data);
            }else{
                throw  new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());

        }
    }

    public function show(Request $request, $sellerId)
    {
        $seller = Seller::where('seller_id', $sellerId)->with('user')->first();
        if($request->ajax()){
            if(empty($seller)){
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Shop Information Not Found', '', route('error.404'));
            }

            $orders = OrderItem::where('seller_id', $sellerId)->with(['buyer.user', 'order', 'product.thumbImage']);
            $shop = Shop::where('seller_id', $sellerId)->with('shopLogo')->first();
            $latest_orders = $orders->orderBy('item_id', 'desc')->take(15)->get();
            $shopOverview =[
                'total_order'=>$orders->count(),
                'total_sale'=> $orders->sum('total_price'),
                'total_order_qty'=>$orders->sum('qty'),
                'total_product'=> Product::where('seller_id', $sellerId)->notDelete()->count()
            ];
            $data=[
                'shop_info'=>$shop,
                'seller_info'=>$seller,
                'overview_report'=>$shopOverview,
                'latest_orders'=> $latest_orders,
            ];
            if(!empty($shop)){
                return ResponserTrait::singleResponse($data,'success', Response::HTTP_OK);
            }else{
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Shop Found');
            }
        }else{
            if(empty($seller)){
                return redirect()->route('error.404');
            }
            return view('shop.show',[
                'seller_id'=>$sellerId,
            ]);
        }
    }

    public function destroy($sellerId){
        try{
            DB::beginTransaction();
            $seller = Seller::where('seller_id', $sellerId)->first();

            if(empty($seller)){
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Shop Information Not Found', '', route('error.404'));
            }

            //TODO check active product and active order then delete
            $seller = $seller->update([
                'shop_status'=> config('app.delete')
            ]);
            if(!empty($seller)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Shop Delete Successfully');
            }else{
                throw  new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());

        }
    }
}
