<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Seller;
use App\Models\Shop;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DefaultSellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'full_name'=>'Brainchild Shop',
            'email'=>'seller@demo.com',
            'phone_no'=>'01714711730',
            'account_type'=>User::AccountType['seller'],
            'is_buyer'=>0,
            'is_seller'=>1,
            'status'=>1,
            'password'=>Hash::make('123456789')
        ]);
        if(!empty($user)){
            $seller = Seller::create([
                'user_id'=>$user->user_id,
                'shop_name'=>'Brainchild Shop',
                'shop_address'=>'Samoliy, Dhaka',
                'shop_phone'=>'01714711730',
                'shop_email'=>'myshop@demo.com',
                'shop_status'=>Seller::ShopStatus['Active'],
            ]);
            if(!empty($seller)){
                Shop::create([
                    'seller_id'=>$seller->seller_id,
                    'shop_name'=>'Brainchild Shop',
                    'shop_slug'=>Str::slug('Brainchild Shop'),
                ]);
            }
        }
    }
}
