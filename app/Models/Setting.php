<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const Setting_Type =[
        'contact'=>1,
        'campaign'=>2,
    ];
    const SETTING_KEY=[
        'contact_phone'=>'1',
        'contact_mobile'=>'1',
        'contact_email'=>'1',
        'contact_address'=>'1',
        'logo_image'=>'1',
        'campaign_email'=>'2',
        'sending_time'=>'2',
        'email_subject'=>'2',
        'email_heading'=>'2',
        'email_body'=>'2',
        'email_footer'=>'2'
    ];

    protected $table = 'settings';

    protected $primaryKey = 'id';

    protected $fillable=[
        'key',
        'value',
        'type',
    ];
}
