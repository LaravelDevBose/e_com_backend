<?php

namespace App\Http\Controllers\Buyer;

use App\Helpers\TemplateHelper;
use App\Models\AddressBook;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AddressBookController extends Controller
{

    public $template_name;

    public function __construct()
    {
        $this->template_name = TemplateHelper::templateName();
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $addressBooks = AddressBook::myAddress()->isActive()->latest()->get();
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $addressBooks);
        }
        return view('templates.'.$this->template_name.'.buyer.address_book');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone_no'=>'required|string',
            'address'=>'required|string',
            'city'=>'required|string',
            'state'=>'required|string',
            'postal_code'=>'required|string',
            'country'=>'required|string',
            'address_type'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $address = AddressBook::create([
                    'buyer_id'=>auth()->guard('web')->user()->buyer->buyer_id,
                    'first_name'=> $request->first_name,
                    'last_name'=>$request->last_name,
                    'phone_no'=>$request->phone_no,
                    'address'=>$request->address,
                    'city'=>$request->city,
                    'state'=>$request->state,
                    'postal_code'=>$request->postal_code,
                    'country'=>$request->country,
                    'address_type'=>$request->address_type,
                    'address_status'=>config('app.active')
                ]);
                if($address){
                    DB::commit();
                    return ResponserTrait::singleResponse($address, 'success', Response::HTTP_OK,'Address Store Successfully');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function show(AddressBook $addressBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function edit(AddressBook $addressBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AddressBook $addressBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AddressBook  $addressBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddressBook $addressBook)
    {
        //
    }
}
