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
            'full_name'=>'Saliim Mall',
            'email'=>'mall@saliim.com',
            'phone_no'=>'123456',
            'account_type'=>User::AccountType['seller'],
            'is_buyer'=>0,
            'is_seller'=>1,
            'status'=>1,
            'password'=>Hash::make('123456789')
        ]);
        if(!empty($user)){
            $seller = Seller::create([
                'user_id'=>$user->user_id,
                'seller_name'=>'Saliim Mall',
                'seller_address'=>'Seller Address',
                'seller_phone'=>'123456789',
                'seller_email'=>'mall@sallim.com',
                'seller_status'=>Seller::ShopStatus['Active'],
                'seller_type'=>Seller::SellerType['Normal'],
            ]);
            if(!empty($seller)){
                Shop::create([
                    'seller_id'=>$seller->seller_id,
                    'shop_name'=>'Saliim Mall',
                    'shop_slug'=>Str::slug('Saliim Mall'),
                    'shop_address'=>'Shop Address',
                    'phone_no'=>'123456789',
                    'shop_email'=>'mall@saliim.com',
                ]);
            }
        }
    }
}
