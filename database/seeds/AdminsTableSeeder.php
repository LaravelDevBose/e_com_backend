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
            'full_name'=>'Brainchild Software',
            'user_name'=>'brainchild',
            'email'=>'brainchild',
            'phone_no'=>'01714711730',
            'admin_role'=>1,
            'admin_status'=>1,
            'password'=>Hash::make('BrainChildS0ft')
        ]);
    }
}
