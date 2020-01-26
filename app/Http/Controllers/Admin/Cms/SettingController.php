<?php

namespace App\Http\Controllers\Admin\Cms;


use App\Models\Attachment;
use App\Models\Setting;
use App\Traits\ResponserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Exception;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function setting_page(){
        return view('cms.setting.setting_page');
    }

    public function setting_data(){
        $contactSettingData= Setting::where('type', Setting::Setting_Type['contact'])->get();
        $contactSetting = array();
        $campaignSetting = array();
        $deliverySetting = array();
        $generalSetting = array();

        if(!empty($contactSettingData)){
            foreach ($contactSettingData as $setting){
                if($setting->key == 'logo_image'){
                    if(!empty($setting->value) || $setting->value != ''){
                        $attachment = Attachment::find($setting->value);
                        if(!empty($attachment)){
                            $logo_image = $attachment->image_path;
                        }
                    }else{
                        $logo_image='';
                    }
                }else{
                    $contactSetting[$setting->key] = $setting->value;
                }
            }

        }

        $campaignSettingData= Setting::where('type', Setting::Setting_Type['campaign'])->get();
        if(!empty($campaignSettingData)){
            foreach ($campaignSettingData as $campaign){
                $campaignSetting[$campaign->key] = $campaign->value;
            }

        }
        $deliverySettingData= Setting::where('type', Setting::Setting_Type['delivery'])->get();
        if(!empty($deliverySettingData)){
            foreach ($deliverySettingData as $campaign){
                $deliverySetting[$campaign->key] = $campaign->value;
            }

        }
        $generalSettingData= Setting::where('type', Setting::Setting_Type['general'])->get();
        if(!empty($generalSettingData)){
            foreach ($generalSettingData as $campaign){
                $generalSetting[$campaign->key] = $campaign->value;
            }

        }
        $data = [
            'contactSetting'=>$contactSetting,
            'campaignSetting'=>$campaignSetting,
            'deliverySetting'=>$deliverySetting,
            'generalSetting'=>$generalSetting,
            'logoImage'=>$logo_image,
        ];

        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function contact_setting_store(Request $request){
        try{
//            return $request->all();
            DB::beginTransaction();
            foreach($request->all() as $key=>$value){
                Setting::updateOrCreate(
                    ['key'=>$key, 'type'=>Setting::Setting_Type['contact']],
                    [ 'value'=>$value ]);

            }
            DB::commit();
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Contact Setting Update Successfully');
        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }

    public function campaign_setting_store(Request $request){
        try{

            DB::beginTransaction();
            foreach($request->all() as $key=>$value){
                Setting::updateOrCreate(
                    ['key'=>$key, 'type'=>Setting::Setting_Type['campaign']],
                    [ 'value'=>$value ]);
            }

            DB::commit();
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Campaign Setting Update Successfully');
        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
    public function delivery_setting_store(Request $request){
        try{
            DB::beginTransaction();
            foreach($request->all() as $key=>$value){
                Setting::updateOrCreate(
                    ['key'=>$key, 'type'=>Setting::Setting_Type['delivery']],
                    [ 'value'=>$value ]);
            }

            DB::commit();
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Delivery Setting Update Successfully');
        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
    public function general_setting_store(Request $request){
        try{
            DB::beginTransaction();
            foreach($request->all() as $key=>$value){
                Setting::updateOrCreate(
                    ['key'=>$key, 'type'=>Setting::Setting_Type['general']],
                    [ 'value'=>$value ]);
            }

            DB::commit();
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'General Setting Update Successfully');
        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
    public function logo_image_store(Request $request){
        try{
            DB::beginTransaction();
            if(empty($request->attachment_id)){
                throw new Exception('Image Not Uploaded. Upload an Image.');
            }
            $setting = Setting::where('key','logo_image')->update([
                        'value'=>$request->attachment_id
                    ]);
            if(!empty($setting)){
                $setting = Setting::where('key','logo_image')->first();
                $logo_image = '';
                $attachment = Attachment::find($setting->value);
                if(!empty($attachment)){
                    $logo_image = $attachment->image_path;
                }
                DB::commit();
                return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Logo Update Successfully',['logoImage'=>$logo_image]);
            }else{
                throw new Exception('Something Wrong! Logo Image Upload Not Successful');
            }

        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
