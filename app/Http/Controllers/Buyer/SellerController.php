<?php

namespace App\Http\Controllers\Buyer;

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
}
