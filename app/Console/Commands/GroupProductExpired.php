<?php

namespace App\Console\Commands;

use App\Models\GroupProduct;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GroupProductExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Group Product make Expired After Expired date end';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $groupProducts = GroupProduct::isActive()->get();
        if(!empty($groupProducts)){
            foreach ($groupProducts as $groupProduct){
                $groupProduct->update([
                    'status'=>GroupProduct::Status['Expired']
                ]);
            }
        }

    }
}
