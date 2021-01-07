<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'admin_roles';
    protected $primaryKey= 'admin_role_id';

    protected $fillable = [
        'admin_id',
        'role_id',
        'orders',
        'order_update',
        'product',
        'manage_product',
        'add_product',
        'customer',
        'manage_customer',
        'shops',
        'manage_shop',
        'category',
        'manage_category',
        'brand',
        'manage_brand',
        'color',
        'manage_color',
        'tag',
        'manage_tag',
        'size',
        'manage_size',
        'delivery_method',
        'manage_delivery_method',
        'cms',
        'slider',
        'manage_slider',
        'general_page',
        'manage_general_page',
        'setting',
        'manage_setting',
        'newsletter',
        'manage_newsletter',
        'account_setting',
        'admin_account',
        'manage_admin_account',
        'coupon_create',
        'coupon_manage',
        'report',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    const superAdminRoles = [
        'orders',
        'order_update',
        'product',
        'manage_product',
        'add_product',
        'customer',
        'manage_customer',
        'shops',
        'manage_shop',
        'category',
        'manage_category',
        'brand',
        'manage_brand',
        'color',
        'manage_color',
        'tag',
        'manage_tag',
        'size',
        'manage_size',
        'delivery_method',
        'manage_delivery_method',
        'cms',
        'slider',
        'manage_slider',
        'general_page',
        'manage_general_page',
        'setting',
        'manage_setting',
        'newsletter',
        'manage_newsletter',
        'account_setting',
        'admin_account',
        'manage_admin_account',
        'coupon_create',
        'coupon_manage',
        'report',
        'product_discount'
    ];

    const adminRoles = [
        'orders',
        'order_update',
        'product',
        'manage_product',
        'add_product',
        'customer',
        'manage_customer',
        'shops',
        'manage_shop',
        'category',
        'manage_category',
        'brand',
        'manage_brand',
        'color',
        'manage_color',
        'tag',
        'manage_tag',
        'size',
        'manage_size',
        'cms',
        'slider',
        'manage_slider',
        'newsletter',
        'manage_newsletter',
    ];

    const subAdminRoles = [
        'orders',
        'order_update',
        'product',
        'manage_product',
        'add_product',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }
}
