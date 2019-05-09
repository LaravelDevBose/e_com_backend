<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';

    protected $primaryKey =  'campaign_id';

    protected $fillable = [
        'campaign_title',
        'campaign_start',
        'campaign_end',
        'campaign_details',
        'attachment_id',
    ];


}
