<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Buyer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DefaultBuyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name'=>'Default Buyer',
            'email'=>'buyer@demo.com',
            'phone_no'=>'123456',
            'address'=>'Shamoliy, Dhaka-1207',
            'status'=>1,
            'password'=>Hash::make('123456789')
        ]);
    }
}
