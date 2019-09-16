<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\TemplateHelper;
use App\Models\AddressBook;
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
        $this->middleware('auth');
    }

    public function index(Request $request){

        if($request->ajax()){
            $dataCollection = array();
            $addressBooks = AddressBook::myAddress()->isActive()->latest()->get();
            $address = AddressBook::addressBookSelect($addressBooks);
            $dataCollection = [
                'address'=>$address,
            ];
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $dataCollection);
        }
        return view('templates.'.$this->template_name.'.buyer.checkout.checkout');
    }

}
