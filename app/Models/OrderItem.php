<?php

namespace App\Models;

use App\User;
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
    ];

    protected $table = 'order_items';
    protected $primaryKey  = 'item_id';

    protected $fillable = [
        'order_id',
        'user_id',
        'seller_id',
        'seller_sku',
        'product_id',
        'product_name',
        'size_id',
        'color_id',
        'qty',
        'price',
        'subtotal',
        'discount',
        'total_price',
        'image_id',
        'item_status',
        'cancel_by',
        'created_by',
        'updated_by',
        'deleted_by',
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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
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
