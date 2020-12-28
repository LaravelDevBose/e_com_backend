<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    const OrderStatus = [
        'Active'=>1,
        'Cancel'=>2,
        'Payment fail'=>3,
        'Confirm'=>4,
        'Ready To Ship'=>5,
        'Delivered'=>6,
        'Un-paid'=>7,
    ];

    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_no',
        'user_id',
        'total_qty',
        'sub_total',
        'discount',
        'cancel_total',
        'total',
        'order_date',
        'order_status',
        'delivery_method_id',
        'delivery_date',
        'delivery_media',
        'delivery_charge',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $appends = array('status_label', 'order_total');

    public static function order_no_generate(){
        $order = self::whereDate('created_at', '>=', Carbon::today()->startOfMonth())->whereDate('created_at', '<=', Carbon::today())->count();
        return 'PKR-'.Carbon::now()->format('Ydm').'-'.($order+1);
    }

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
    public function getOrderTotalAttribute(){
        return number_format($this->attributes['total'], 2);
    }

    public function getStatusLabelAttribute(){
        $status = array_flip(self::OrderStatus);
        return $status[$this->attributes['order_status']];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function shipping(){
        return $this->hasOne(ShippingInfo::class, 'order_id', 'order_id');
    }

    public function payment(){
        return $this->hasOne(PaymentInfo::class, 'order_id', 'order_id');
    }

    public function deliveryMethod()
    {
        return $this->hasOne(DeliveryMethod::class, 'delivery_id', 'delivery_method_id');
    }
}
