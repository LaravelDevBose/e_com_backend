<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\TemplateHelper;
use App\Models\AddressBook;
use App\Models\PaymentInfo;
use App\Models\Setting;
use App\Models\ShippingInfo;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CheckoutController extends Controller
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

    public function index(Request $request){

        if($request->ajax()){
            $dataCollection = array();
            $addressBooks = AddressBook::myAddress()->isActive()->latest()->get();
            $address = AddressBook::addressBookSelect($addressBooks);
            $shippingPrice = Setting::where('key','delivery_rate')->first()->value;
            if(empty($shippingPrice)){
                $shippingPrice = 50;
            }
            $payment_methods = [];
            $methods = array_flip(PaymentInfo::Payment_Method);
            $acceptedMethods = Setting::where('type', Setting::Setting_Type['delivery'])->where('key', '!=', 'delivery_rate')->pluck('value', 'key');
            if(!empty($acceptedMethods)){
                foreach ($acceptedMethods as $key=> $acceptedMethod){

                    if($key== PaymentInfo::setting_key[1] && $acceptedMethod == 1){
                        array_push($payment_methods,[
                            'key'=>1,
                            'value'=>$methods[1]
                        ]);
                    }
                    if($key== PaymentInfo::setting_key[2] && $acceptedMethod == 1){
                        array_push($payment_methods,[
                            'key'=>2,
                            'value'=>$methods[2]
                        ]);
                    }
                    if($key== PaymentInfo::setting_key[3] && $acceptedMethod == 1){
                        array_push($payment_methods,[
                            'key'=>3,
                            'value'=>$methods[3]
                        ]);
                    }
                }
            }
            $dataCollection = [
                'address_list'=>$address,
                'payment_methods'=>$payment_methods,
                'shipping_methods'=>array_flip(ShippingInfo::METHOD),
                'shipping_price'=>$shippingPrice,
            ];
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $dataCollection);
        }
        return view('templates.'.$this->template_name.'.buyer.checkout.checkout');
    }

}
