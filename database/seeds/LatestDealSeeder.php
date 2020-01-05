<?php

use Illuminate\Database\Seeder;
use App\Models\LatestDeal;
use Carbon\Carbon;

class LatestDealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LatestDeal::create([
            'start_time'=>Carbon::now(),
            'end_time'=> Carbon::now()->addMonths(2),
            'status'=>config('app.active'),
        ]);
    }
}
