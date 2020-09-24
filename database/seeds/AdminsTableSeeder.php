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
        Admin::create([
            'full_name'=>'Supper Admin',
            'user_name'=>'super_admin',
            'email'=>'super@admin.com',
            'phone_no'=>'123456789',
            'admin_role'=>1,
            'admin_status'=>1,
            'password'=>Hash::make('123456789')
        ]);
    }
}
