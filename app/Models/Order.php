<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const OrderStatus = [
        'Active'=>1,
        'Cancel'=>2,
        'Payment fail'=>3,
        'Confirm'=>4,
        'Ready To Ship'=>5,
        'Delivered'=>6,
    ];

    const Delivery_media = [
        'Media 1'=>1,
        'Media 2'=>2
    ];

    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_no',
        'buyer_id',
        'total_qty',
        'sub_total',
        'discount',
        'voucher_id',
        'voucher_price',
        'total',
        'order_date',
        'order_status',
        'shipping_method',
        'delivery_date',
        'delivery_media',
        'delivery_charge'
    ];

    protected $appends = array('status_label');

    public function scopeOrderStatus($query, $status){
        return $query->where('order_status', $status);
    }

    public function getOrderDateAttribute(){
        return Carbon::parse($this->attributes['order_date'])->format('d M Y');
    }

    public function getDeliveryDateAttribute(){
        return Carbon::parse($this->attributes['order_date'])->format('d M Y');
    }

    public function getSubTotalAttribute(){
        return number_format($this->attributes['sub_total'], 2);
    }
    public function getTotalAttribute(){
        return number_format($this->attributes['total'], 2);
    }

    public function getStatusLabelAttribute(){
        $status = array_flip(Self::OrderStatus);
        return $status[$this->attributes['order_status']];
    }

    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function billing(){
        return $this->hasOne(BillingInfo::class, 'order_id', 'order_id');
    }

    public function shipping(){
        return $this->hasOne(ShippingInfo::class, 'order_id', 'order_id');
    }

    public function payment(){
        return $this->hasOne(PaymentInfo::class, 'order_id', 'order_id');
    }

    public function deliveryMethod()
    {
        return $this->hasOne(DeliveryMethod::class, 'delivery_id', 'shipping_method');
    }
}
