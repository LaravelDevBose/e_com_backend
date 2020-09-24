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
    public $template_name = 'limitless_v2';

    public function setting_page(){
        return view('admin_panel.'.$this->template_name.'.cms.setting.setting_page');
    }

    public function setting_data(){
        $contactSettingData= Setting::where('type', Setting::Setting_Type['contact'])->get();
        $contactSetting = array();

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
        $data = [
            'contactSetting'=>$contactSetting
        ];

        return ResponserTrait::singleResponse($data, 'success', Response::HTTP_OK);
    }

    public function contact_setting_store(Request $request)
    {
        try {
//            return $request->all();
            DB::beginTransaction();
            foreach ($request->all() as $key => $value) {
                Setting::updateOrCreate(
                    ['key' => $key, 'type' => Setting::Setting_Type['contact']],
                    ['value' => $value]);

            }
            DB::commit();
            return ResponserTrait::allResponse('success', Response::HTTP_OK, 'Contact Setting Update Successfully');
        } catch (Exception $ex) {
            DB::rollBack();
            return ResponserTrait::allResponse('error', Response::HTTP_BAD_REQUEST, $ex->getMessage());
        }
    }
}
