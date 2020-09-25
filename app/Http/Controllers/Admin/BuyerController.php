<?php

namespace App\Http\Controllers\Admin;

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
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.buyer.index');
    }

    public function user_list()
    {
        $users = User::notDelete()->with(['orders'=>function($query){
            return $query->where('order_status', Order::OrderStatus['Cancel']);
        }])->latest()->paginate(20);

        if(!empty($users)){
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $users);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, 'No Buyer Found');
        }
    }

    public function buyer_show(User $user)
    {
        return view('admin_panel.'.$this->template_name.'.buyer.show',[
            'buyerId'=>$user->user_id,
        ]);
    }

    public function user_details(User $user){
        $user = $user->load(['order']);
        if(!empty($user)){
            return ResponserTrait::singleResponse($user, 'status', Response::HTTP_OK, 'Buyer Details Found');
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Buyer Details Not Found', '', route('error.404'));
        }
    }

    public function buyer_status_change(Request $request,$userId){
        try{
            DB::beginTransaction();
            $user = User::where('user_id', $userId)->first();

            if(empty($user)){
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Buyer Information Not Found', '', route('error.404'));
            }
            $userId = $user->user_id;

            $user = $user->update([
                'buyer_status'=>$request->status
            ]);
            if(!empty($user)){
                $user = User::where('user_id', $userId)
                    ->update([
                        'status'=>$request->status
                    ]);

                if(!empty($user)){
                    DB::commit();
                    $data = [
                        'id'=>$userId,
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

    public function destroy($userId){
        try{
            DB::beginTransaction();
            $user = User::where('user_id', $userId)->first();

            if(empty($user)){
                return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Buyer Information Not Found', '', route('error.404'));
            }
            $user = $user->update([
                    'status'=> config('app.delete')
                ]);

            if(!empty($user)){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Customer Delete Successfully');
            }else{
                throw  new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
            }
        }catch (\Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());

        }
    }
}
