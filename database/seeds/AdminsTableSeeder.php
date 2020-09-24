<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'full_name'=>'Supper Admin',
            'user_name'=>'super_admin',
            'email'=>'super@admin.com',
            'phone_no'=>'123456789',
            'admin_role'=>1,
            'admin_status'=>1,
            'password'=>Hash::make('123456789')
        ]);
        if (!empty($admin)){
            \App\Models\AdminRole::create([
                'admin_id'=> $admin->admin_id,
                'role_id'=>1,
                'orders'=>1,
                'order_update'=>1,
                'product'=>1,
                'manage_product'=>1,
                'add_product'=>1,
                'publish_product'=>1,
                'customer'=>1,
                'manage_customer'=>1,
                'shops'=>1,
                'manage_shop'=>1,
                'category'=>1,
                'manage_category'=>1,
                'brand'=>1,
                'manage_brand'=>1,
                'color'=>1,
                'manage_color'=>1,
                'tag'=>1,
                'manage_tag'=>1,
                'size'=>1,
                'manage_size'=>1,
                'skin_type'=>1,
                'manage_skin_type'=>1,
                'delivery_method'=>1,
                'manage_delivery_method'=>1,
                'cms'=>1,
                'product_group'=>1,
                'manage_product_group'=>1,
                'latest_deal'=>1,
                'manage_latest_deal'=>1,
                'slider'=>1,
                'manage_slider'=>1,
                'general_page'=>1,
                'manage_general_page'=>1,
                'setting'=>1,
                'manage_setting'=>1,
                'newsletter'=>1,
                'manage_newsletter'=>1,
                'account_setting'=>1,
                'admin_account'=>1,
                'manage_admin_account'=>1,
            ]);
        }
    }
}
