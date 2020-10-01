<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Banner;

class ExpireBanners extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expire:banner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make banners active 0 where it expires';

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
        $banners = Banner::where('active', 1)->get();
        foreach ($banners as $banner) {
            if ($banner->expired_at <= \Carbon\Carbon::now()){
                $banner->active = 0 ;
                $banner->save();
            }
        }
    }
}
