<?php

namespace App\Http\Controllers\Api;

use App\User;
use Carbon\Carbon;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SocialProvider;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Resources\Frontend\user\UserResource;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=> 'required|string|email',
            'password'=> 'required|min:8',
        ]);
        if ($validator->passes()) {
            try {
                $credential=[
                    'email'=>$request->username,
                    'password'=>$request->password,
                ];
                if (Auth::guard('web')->attempt($credential)) {
                    $user = Auth::user();
                    $token =  $user->createToken('Password Access Token');
                    $response = [
                        'user'=> new UserResource($user),
                        'token_type'=> 'Bearer',
                        'access_token'=> $token->accessToken,
                        'token_id'=>$token->token->id
                    ];
                    DB::commit();
                    return ApiResponser::AllResponse('Success', Response::HTTP_OK, true,'Login successful', $response);
                } else {
                    throw new \Exception('Invalid Email and Password not match', Response::HTTP_UNPROCESSABLE_ENTITY);
                }
            }catch (\Exception $ex){
                DB::rollback();
                return ApiResponser::AllResponse('error', $ex->getCode(), false, $ex->getMessage());
            }
        }else {
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::ValidationResponse($errors, 'Validation');
        }
    }

    public function register(Request  $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'phone'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $user = User::create([
                    'full_name' => $request->name,
                    'email' => $request->email,
                    'phone_no' => $request->phone,
                    'password' => Hash::make($request->password),
                    'status'=>config('app.active'),
                ]);

                if(!empty($user)){
                    //event(new Registered($user));

                    $token =  $user->createToken('Personal Access Token');
                    $response = [
                        'user'=> new UserResource($user),
                        'token_type'=> 'Bearer',
                        'access_token'=> $token->accessToken,
                        'token_id'=>$token->token->id
                    ];

                    DB::commit();
                    return ApiResponser::AllResponse('Success', Response::HTTP_OK, true,'Login successful', $response);
                }else{
                    throw new \Exception('Unsuccessful. Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (\Exception $ex){
                DB::rollback();
                return ApiResponser::AllResponse('error', $ex->getCode(), false, $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ApiResponser::ValidationResponse($errors, 'Validation');

        }
    }

    public function social_login(Request $request)
    {
        try{
            $getProvider = SocialProvider::where('provider', $request->provider)->where('provider_id', $request->id)->latest()->first();
            if(empty($getProvider)){
                DB::beginTransaction();
                $user = User::create([
                    'full_name'     => $request->name,
                    'email'    => $request->email,
                    'phone_no' => '',
                    'status'=>config('app.active'),
                ]);
                if(!empty($user)){
                    $sProvider = SocialProvider::create([
                        'user_id'=>$user->user_id,
                        'provider_id'=>$request->id,
                        'provider'=>$request->provider,
                    ]);

                    if(!empty($sProvider)){
                        $tokenResult = $user->createToken('Personal Access Token');
                        $token = $tokenResult->token;
                        $token->expires_at = Carbon::now()->addYear();
                        $token->save();
                        $response = [
                            'user'=> new UserResource($user),
                            'token_type'=> 'Bearer',
                            'access_token'=> $tokenResult->accessToken,
                            'token_id'=>$token->token->id
                        ];
                        DB::commit();
                        return ApiResponser::AllResponse('Success', Response::HTTP_OK, true,'Login successful', $response);

                    }else{
                        throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                    }
                }else{
                    throw new \Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }
            }else{
                $user = User::where('user_id', $getProvider->user_id)->first();
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;
                $token->expires_at = Carbon::now()->addYear();
                $token->save();
                $response = [
                    'user'=> new UserResource($user),
                    'token_type'=> 'Bearer',
                    'access_token'=> $tokenResult->accessToken,
                    'token_id'=>$token->token->id
                ];
                DB::commit();
                return ApiResponser::AllResponse('Success', Response::HTTP_OK, true,'Login successful', $response);
            }

        }catch(\Exception $ex){
            DB::rollBack();
            return ApiResponser::AllResponse('error',  Response::HTTP_BAD_REQUEST, false, $ex->getMessage());
        }
    }

    public function logout(Request  $request)
    {
        if (Auth::check()) {
            $user_id = $request->user()->id;
            DB::table('oauth_access_tokens')->where('user_id', $user_id)->delete();
//            Auth::guard('api')->logout();
            return ApiResponser::AllResponse('success', Response::HTTP_OK, true,'You Are Logout');
        }else{
            return ApiResponser::AllResponse('error', Response::HTTP_BAD_REQUEST, false,'You Are Already Logout');
        }

        // Single Device Logout Method
        /*$result = $request->user()->token()->revoke();
        if($result){
            return ApiResponser::allResponse('success', Response::HTTP_OK, true,'You Are Logout');
        }else{
            return ApiResponser::allResponse('error', Response::HTTP_BAD_REQUEST, false,'You Are Already Logout');
        }*/
    }
}
