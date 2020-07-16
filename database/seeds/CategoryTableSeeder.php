<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category_name'=>'Car',
            'category_slug'=>'car_1',
            'parent_id'=> null,
            'category_status'=>config('app.active'),
            'is_show'=>1,
            'trans_category_name'=>'Car',
        ]);
    }
}
