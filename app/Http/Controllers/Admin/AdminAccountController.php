<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Http\Resources\Admin\AdminResource;
use App\Models\Admin;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminAccountController extends Controller
{
    public $route = 'admin.account.';
    public $template_name = 'limitless_v2';
    public function __construct()
    {
        view()->share('route',$this->route);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_panel.'.$this->template_name.'.account.index');
    }

    public function admin_list(){
        $admins = Admin::notDelete()->where('admin_id', '!=', auth()->guard('admin')->user()->admin_id)->latest()->get();
        if(!empty($admins)){
            $coll = AdminResource::collection($admins);
            return ResponserTrait::collectionResponse('success', Response::HTTP_OK, $coll);
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'No Admin Found');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name'=>'required|string|max:120',
            'user_name'=>'required|string|max:120|unique:admins',
            'email'=>'required|string|email|max:255|unique:admins',
            'phone_no'=>'required|string|max:12',
            'admin_role'=>'required',
            'password'=>'required|string|min:8|confirmed',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                $admin = Admin::create([
                    'full_name'=>$request->full_name,
                    'user_name'=>$request->user_name,
                    'email'=>$request->email,
                    'phone_no'=>$request->phone_no,
                    'admin_role'=>$request->admin_role,
                    'password'=>Hash::make($request->password),
                    'admin_status'=>(!empty($request->admin_status) && $request->admin_status == 1) ? $request->admin_status : 2,
                ]);
                if(!empty($admin)){
                    DB::commit();
                    $data = new AdminResource(Admin::find($admin->admin_id));
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'New Admin Created Successfully',$data);
                }else{
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        if(!empty($admin)){
            $data = new AdminResource($admin);
            return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK, 'Admin Data Found');
        }else{
            return ResponserTrait::allResponse('error', Response::HTTP_NOT_FOUND, 'Admin Data Not Found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'full_name'=>'required|string|max:120',
            'user_name'=>'required|string|max:120|unique:admins,user_name,'.$id.',admin_id',
            'email'=>'required|string|email|max:255|unique:admins,email,'.$id.',admin_id',
            'phone_no'=>'required|string|max:12',
            'admin_role'=>'required',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $admin = Admin::where('admin_id', $id)->first();
                if(empty($admin)){
                    throw new Exception('Invalid Admin Info.', Response::HTTP_NOT_FOUND);
                }
                $admin = $admin->update([
                    'full_name'=>$request->full_name,
                    'user_name'=>$request->user_name,
                    'email'=>$request->email,
                    'phone_no'=>$request->phone_no,
                    'admin_role'=>$request->admin_role,
                    'admin_status'=>(!empty($request->admin_status) && $request->admin_status == 1) ? $request->admin_status : 2,
                ]);
                if(!empty($admin)){
                    DB::commit();
                    $data = new AdminResource(Admin::find($id));
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Admin Information Updated Successfully',$data);
                }else{
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $admin = Admin::where('admin_id', $id)->first();
            if(empty($admin)){
                throw new Exception('Invalid Admin Information', Response::HTTP_NOT_FOUND);
            }
            $admin = $admin->update([
                    'admin_status'=>config('app.delete'),
                ]);

            if($admin){
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Admin Deleted Successfully');
            }{
                throw new Exception('Invalid Information.!');
            }
        }catch(Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
        }
    }

    public function setting_page()
    {
        return view('admin_panel.'.$this->template_name.'.account.setting_page');
    }

    public function details_update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name'=>'required|string|max:120',
            'user_name'=>'required|string|max:120|unique:admins,user_name,'.auth()->guard('admin')->user()->admin_id.',admin_id',
            'email'=>'required|string|email|max:255|unique:admins,email,'.auth()->guard('admin')->user()->admin_id.',admin_id',
            'phone_no'=>'required|string|max:12',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();
                $admin = Admin::where('admin_id', auth()->guard('admin')->user()->admin_id)->first();
                if(empty($admin)){
                    throw new Exception('Invalid Information.', Response::HTTP_NOT_FOUND);
                }
                $admin = $admin->update([
                    'full_name'=>$request->full_name,
                    'user_name'=>$request->user_name,
                    'email'=>$request->email,
                    'phone_no'=>$request->phone_no,
                ]);
                if(!empty($admin)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Account Information Updated Successfully');
                }else{
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $errors);
        }
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'current_password'=>'required|string|min:8',
            'password'=>'required|string|min:8|confirmed',
        ]);

        if($validator->passes()){
            try{
                DB::beginTransaction();

                if(!Hash::check($request->current_password, auth()->guard('admin')->user()->getAuthPassword())){
                    throw new Exception('Invalid Current Password.', Response::HTTP_NOT_FOUND);
                }

                $admin = Admin::where('admin_id', auth()->guard('admin')->user()->admin_id)->first();
                if(empty($admin)){
                    throw new Exception('Invalid Information.', Response::HTTP_NOT_FOUND);
                }
                $admin = $admin->update([
                    'password'=>Hash::make($request->password),
                ]);
                if(!empty($admin)){
                    DB::commit();
                    return ResponserTrait::allResponse('success', Response::HTTP_OK,'Account Password Updated Successfully');
                }else{
                    throw new Exception('Invalid Information', Response::HTTP_BAD_REQUEST);
                }

            }catch (Exception $ex){
                DB::rollBack();
                return ResponserTrait::allResponse('error', $ex->getCode(), $ex->getMessage());
            }
        }else{
            $errors = array_values($validator->errors()->getMessages());
            return ResponserTrait::validationResponse('validation', Response::HTTP_NOT_ACCEPTABLE, $errors);
        }
    }
}
