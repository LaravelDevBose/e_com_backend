<?php

namespace App\Http\Controllers\Auth;

use App\Http\Resources\Admin\Brand as BrandResource;
use App\Models\Seller;
use App\Traits\ResponserTrait;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class SellerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/seller/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:seller');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'phone_no' => $data['phone_no'],
            'password' => Hash::make($data['password']),
            'account_type'=>User::AccountType['seller'],
            'is_seller'=>config('app.one'),
            'status'=>config('app.active'),
        ]);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'shop_name'=>'required|string',
            'full_name'=>'required|string',
            'user_name'=>'required|string|max:255|unique:users',
            'phone_no'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                event(new Registered($user = $this->create($request->all())));
                if($user){
                    $seller = Seller::create([
                        'user_id'=>$user->user_id,
                        'shop_name'=>$request->shop_name,
                    ]);

                    if(!empty($seller)){
                        DB::commit();
                        return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Seller Created Successfully', '', route('seller.login'));
                    }else{
                        throw new \Exception('Seller Not Create. Invalid Information', Response::HTTP_BAD_REQUEST);
                    }

                }else{
                    throw new \Exception('User Not Create. Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (\Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            $message = null;
            foreach ($errors as $error){
                if(!empty($error)){
                    foreach ($error as $errorItem){
                        $message .=  $errorItem .' ';
                    }
                }
            }
            return ResponserTrait::allResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $message);

        }
    }
}
