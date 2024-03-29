<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    const ItemStatus = [
        'Active'=>1,
        'Cancel'=>2,
//        'Payment fail'=>3, /from admin
//        'Confirm'=>4, /from admin
        'Ready To Ship'=>5,
//        'Delivered'=>6, /from Admin
    ];

    const AllItemStatus = [
        'Active'=>1,
        'Cancel'=>2,
        'Payment fail'=>3, //from admin
        'Confirm'=>4, //from admin
        'Ready To Ship'=>5,
        'Delivered'=>6, //from Admin
        'Return'=>7,
    ];

    const CancelBy = [
        'Admin'=>1,
        'Buyer'=>2,
        'Seller'=>3
    ];

    protected $table = 'order_items';
    protected $primaryKey  = 'item_id';

    protected $fillable = [
        'order_id',
        'buyer_id',
        'seller_id',
        'product_id',
        'product_name',
        'size_id',
        'size',
        'color_id',
        'color',
        'brand_id',
        'brand',
        'price',
        'qty',
        'subtotal',
        'discount',
        'total_price',
        'item_status',
        'cancel_by',
        'image_id'
    ];

    protected $appends = [
        'item_status_label'
    ];

    public function getItemStatusLabelAttribute(){
        $status = array_flip(Self::AllItemStatus);
        return $status[$this->attributes['item_status']];
    }

    public function scopeOrderItemStatus($query, $status){
        return $query->where('item_status', $status);
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function buyer(){
        return $this->belongsTo(Buyer::class, 'buyer_id', 'buyer_id');
    }

    public function seller(){
        return $this->belongsTo(Seller::class, 'seller_id', 'seller_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function size(){
        return $this->belongsTo(Size::class, 'size_id', 'size_id');
    }

    public function color(){
        return $this->belongsTo(Color::class, 'color_id', 'color_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function review(){
        return $this->hasOne(Review::class, 'item_id', 'item_id');
    }

    public function image(){
        return $this->hasOne(Attachment::class, 'attachment_id', 'image_id');
    }
}
