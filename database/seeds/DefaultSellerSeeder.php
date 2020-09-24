<?php

use Illuminate\Database\Seeder;
use App\Models\Seller;
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
        Seller::create([
            'seller_name'=>'Saliim Mall',
            'seller_phone'=>'123456789',
            'seller_address'=>'Seller Address',
            'shop_name'=>'Saliim Mall',
            'seller_email'=>'mall@sallim.com',
            'shop_address'=>'Shop Address',
            'shop_phone'=>'123456789',
            'shop_email'=>'mall@saliim.com',
            'seller_status'=>Seller::ShopStatus['Active'],
        ]);
    }
}
