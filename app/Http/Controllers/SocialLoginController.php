<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\SocialProvider;
use App\Traits\ResponserTrait;
use App\User;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
        try{
            DB::beginTransaction();
            $getUser = Socialite::driver($provider)->user();
            $getProvider = SocialProvider::where('provider', $provider)->where('provider_id', $getUser->id)->with('user')->latest()->first();
            if(empty($getProvider)){
                $user = User::create([
                    'full_name'     => $getUser->name,
                    'email'    => $getUser->email,
                    'phone_no' => '',
                    'account_type'=>User::AccountType['buyer'],
                    'status'=>config('app.active'),
                    'is_buyer'=>config('app.one'),
                ]);

                if(!empty($user)){
                    $buyer = Buyer::create([
                        'user_id'=>$user->user_id,
                        'buyer_status'=>config('app.active'),
                    ]);
                    if(!empty($buyer)){
                        $sProvider = SocialProvider::create([
                            'user_id'=>$user->user_id,
                            'provider_id'=>$getUser->id,
                            'provider'=>$provider,
                        ]);

                        if(!empty($sProvider)){
                            auth()->login($user);
                            DB::commit();
                            /*if (!empty(\Gloudemans\Shoppingcart\Facades\Cart::content())){
                                return redirect()->route('buyer.checkout');
                            }else{
                                return redirect()->route('buyer.home');
                            }*/
                            $data =[
                                'user'=>Auth::guard('web')->user()->toJson(),
                                'whoIs'=>'buyer',
                            ];
                            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Login Successfully', $data, route('buyer.home'));
                        }else{
                            throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                        }
                    }else{
                        throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                    }
                }else{
                    throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
            }else{
                if(empty($getProvider->user)){
                    $user = User::create([
                        'full_name'     => $getUser->name,
                        'email'    => $getUser->email,
                        'phone_no' => '',
                        'account_type'=>User::AccountType['buyer'],
                        'status'=>config('app.active'),
                        'is_buyer'=>config('app.one'),
                    ]);
                    if(!empty($user)){
                        $buyer = Buyer::create([
                            'user_id'=>$user->user_id,
                            'buyer_status'=>config('app.active'),
                        ]);
                        if(!empty($buyer)){
                            $sProvider = $getProvider->update([
                                'user_id'=>$user->user_id,
                                'provider_id'=>$getUser->id,
                                'provider'=>$provider,
                            ]);

                            if(!empty($sProvider)){
                                auth()->login($user);
                                DB::commit();

                                $data =[
                                    'user'=>Auth::guard('web')->user()->toJson(),
                                    'whoIs'=>'buyer',
                                ];
                                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Login Successfully', $data, route('buyer.home'));
                            }else{
                                throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                            }
                        }else{
                            throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                        }
                    }else{
                        throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                    }
                }else{
                    DB::commit();
                    auth()->login($getProvider->user);
                    $data =[
                        'user'=>Auth::guard('web')->user()->toJson(),
                        'whoIs'=>'buyer',
                    ];
                    return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Login Successfully', $data, route('buyer.home'));
                }

            }

        }catch(\Exception $ex){
            DB::rollBack();
            return redirect()->route('login');
        }

    }
}
