<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const Setting_Type = [
        'contact' => 1,
        'campaign' => 2,
        'template' => 3,
        'delivery'=>4,
    ];
    const SETTING_KEY = [
        'template_name' => '3',
        'seller_template' => '3',
        'contact_phone' => '1',
        'contact_mobile' => '1',
        'contact_email' => '1',
        'contact_address' => '1',
        'about_us' => '1',
        'logo_image' => '1',
        'campaign_email' => '2',
        'sending_time' => '2',
        'email_subject' => '2',
        'email_heading' => '2',
        'email_body' => '2',
        'email_footer' => '2',
        'delivery_rate'=>4,
        'cash_on_delivery'=>4,
        'paypal_payment'=>4,
        'card_payment'=>4,
    ];

    protected $table = 'settings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'key',
        'value',
        'type',
    ];
}
