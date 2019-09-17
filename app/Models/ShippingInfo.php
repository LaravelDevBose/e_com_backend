<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    const METHOD = [
        'Flat Rate'=>1,
    ];

    protected $table = 'shipping_infos';

    protected $primaryKey = 'shipping_id';

}
