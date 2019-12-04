<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Buyer;
use App\User;
use App\Helpers\TemplateHelper;
use App\Http\Resources\Frontend\product\ProductCollection;
use App\Models\Product;
use App\Models\WishList;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
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

        return view('templates.'.$this->template_name.'.buyer.home.dashboard');
    }
    public function account_information(){

        return view('templates.'.$this->template_name.'.buyer.account_info.account_information');
    }
    public function edit_contact_info(){

        return view('templates.'.$this->template_name.'.buyer.home.dashboard');
    }
    public function change_password(){

        return view('templates.'.$this->template_name.'.buyer.home.dashboard');
    }


    public function my_wishlist(){

        $wishListProductIDs = WishList::isActive()->where('buyer_id', auth()->id())->pluck('product_id');
        $products = Product::whereIn('product_id', $wishListProductIDs)->isActive()->get();

        return view('templates.'.$this->template_name.'.buyer.wishlist.my_wishlist',[
            'products'=>$products,
        ]);
    }

    public function buyer_info()
    {
        $buyer = User::where('user_id', auth()->guard('web')->id())->with('buyer')->first();
        if(!empty($buyer)){
            return ResponserTrait::singleResponse($buyer, 'success',Response::HTTP_OK);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Buyer Not Found');
        }
    }

    public function update_buyer_info(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name'=>'required|string',
            'phone_no'=>'required|string',
            'buyer_address'=>'required|string',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $user = auth()->guard('web')->user()->update([
                    'full_name'=> $request->full_name,
                    'phone_no'=>$request->phone_no,
                ]);
                if($user){
                    Buyer::where('user_id', auth()->id())->update([
                        'buyer_address'=>$request->buyer_address,
                    ]);
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Buyer Info Updated Successfully');
                }else{
                    throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
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
