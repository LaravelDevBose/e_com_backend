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
        if(!empty($contactSettingData)){
            $contactSetting = array();
            foreach ($contactSettingData as $key => $value){
                if($key == 'logo_image'){
                    $attachment = Attachment::find($value);
                    if(!empty($attachment)){
                        $contactSetting[$key] = $attachment->image_path;
                    }

                }
            }

        }

        $campaignSettingData= Setting::where('type', Setting::Setting_Type['campaign'])->get();
        if(!empty($campaignSettingData)){
            $campaignSetting = array();
            foreach ($campaignSettingData as $key => $value){

                $campaignSetting[$key] = $value;

            }

        }
        $data = [
            'contactSetting'=>$contactSetting,
            'campaignSetting'=>$campaignSetting
        ];

        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function contact_setting_store(Request $request){
        try{

        }catch (Exception $ex){
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
