<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\TemplateHelper;
use App\Models\AddressBook;
use App\Models\PaymentInfo;
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
            $dataCollection = [
                'address_list'=>$address,
                'payment_methods'=>array_flip(PaymentInfo::Payment_Method),
                'shipping_methods'=>array_flip(ShippingInfo::METHOD),
            ];
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $dataCollection);
        }
        return view('templates.'.$this->template_name.'.buyer.checkout.checkout');
    }

}
