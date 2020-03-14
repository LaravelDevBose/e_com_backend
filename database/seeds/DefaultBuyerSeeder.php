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
        $user = User::create([
            'full_name'=>'Default Buyer',
            'email'=>'buyer@demo.com',
            'phone_no'=>'123456',
            'account_type'=>User::AccountType['buyer'],
            'is_buyer'=>1,
            'is_seller'=>0,
            'status'=>1,
            'password'=>Hash::make('123456789')
        ]);
        if(!empty($user)){
            Buyer::create([
                'user_id'=>$user->user_id,
                'buyer_address'=>'buyer, Address',
                'buyer_status'=>config('app.active'),
            ]);
        }
    }
}
