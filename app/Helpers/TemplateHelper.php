<?php


namespace App\Helpers;


use App\Models\Setting;

class TemplateHelper
{

    public static function templateName()
    {
        $templateInfo = Setting::where('key', 'template_name')->where('type', Setting::Setting_Type['template'])->first();
        if (!empty($templateInfo)){
            return $templateInfo->value;
        }
        return config('app.default_template');
    }

    public static function sellerTemplate()
    {
        $templateInfo = Setting::where('key', 'seller_template')->where('type', Setting::Setting_Type['template'])->first();
        if (!empty($templateInfo)){
            return $templateInfo->value;
        }else{
            return config('app.seller_template');
        }


    }
}
