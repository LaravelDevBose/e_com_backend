<?php

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Setting::SETTING_KEY as $key=>$value){
            Setting::create([
                'key'=>$key,
                'value'=>'',
                'type'=>$value
            ]);
        }
    }
}
