<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatestDealProduct extends Model
{
    protected $table = 'latest_deal_products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'latest_deal_id',
        'product_id',
        'status',
    ];

    public function latest_deal()
    {
        return $this->belongsTo(LatestDeal::class, 'latest_deal_id', 'latest_deal_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id')
            ->with('brand', 'category', 'singleVariation', 'thumbImage','reviews');
    }
}
