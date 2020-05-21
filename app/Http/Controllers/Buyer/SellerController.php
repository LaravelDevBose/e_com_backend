<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\OrderHelper;
use App\Models\AddressBook;
use App\Models\OrderItem;
use Exception;
use App\Helpers\TemplateHelper;
use App\Models\Seller;
use App\Traits\ResponserTrait;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        if(empty($this->template_name)){
            $this->template_name = config('app.default_template');
        }
        $this->middleware('auth');
    }

    public function index(){
        return view('templates.'.$this->template_name.'.buyer.seller.dashboard.dashboard');
    }

    public function register_page()
    {
        if(auth()->guard('web')->check()){
            $user = User::where('user_id', auth()->id())->first();
            return view('templates.'.$this->template_name.'.buyer.seller.auth.register',[
                'user'=>$user
            ]);
        }else{
            return redirect()->route('front.index');
        }

    }

    public function create_seller_account(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'seller_name'=>'required',
            'seller_email'=>'required',
            'seller_phone'=>'required',
            'seller_address'=>'required',
            'seller_city'=>'required',
            'seller_type'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $seller = Seller::create([
                    'user_id'=>auth()->id(),
                    'seller_name'=>$request->seller_name,
                    'seller_email'=>$request->seller_email,
                    'seller_phone'=>$request->seller_phone,
                    'seller_address'=>$request->seller_address,
                    'seller_city'=>AddressBook::cityList[$request->seller_city],
                    'seller_type'=>$request->seller_type,
                    'seller_status'=>config('app.active')
                ]);

                if(!empty($seller)){
                    $user = User::where('user_id', auth()->id())
                        ->update([
                            'account_type'=>User::AccountType['both']
                        ]);
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,
                        'Your Registration Successfully', '', route('buyer.seller.home'));
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

    public function order_list(Request $request){
        $orderItems = OrderItem::with('order','buyer.user','product', 'size', 'color', 'brand', 'image')
                        ->where('seller_id', auth()->user()->seller->seller_id)
                        ->get();
        if(!empty($orderItems)){
            // TODO Order Collection added
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $orderItems);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_OK, 'No Order Found');
        }
    }

    public function change_order_status(Request $request)
    {
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

                if($orderItem->seller_id !== auth()->user()->seller->seller_id){
                    throw new \Exception('You Are UnAuthorize For This Action', Response::HTTP_UNAUTHORIZED);
                }

                $orderItem = $orderItem->update([
                    'item_status'=>$request->item_status,
                ]);

                if(!empty($orderItem)){
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
