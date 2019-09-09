<?php


namespace App\Helpers;


use App\Models\Setting;

class TemplateHelper
{

    public static function templateName()
    {
        $templateInfo = Setting::where('key', 'template_name')->where('type', Setting::Setting_Type['template'])->first();
        if (!empty($templateInfo))
            return $templateInfo->value;
        return config('app.default_template');
    }
}
