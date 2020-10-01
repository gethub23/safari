<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class createCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:section {name=name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create all section requirments (folder , file , model , controller) ';

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
        $model = $this->argument('name');
        $folderNmae = strtolower(str_plural(class_basename($model)));
        Artisan::call('make:model',['name' => 'Models/'.$model,'-m' => true]);
        Artisan::call('make:controller', ['name' => 'Admin/'.str_plural(class_basename($model)).'Controller']);
        File::makeDirectory('resources/views/dashboard/'.$folderNmae);
        File::copy('resources/views/dashboard/shared/copy/index.blade.php',base_path('resources/views/dashboard/'.$folderNmae.'/index.blade.php'));
        File::copy('app/Observers/UserObserver.php',base_path('app/Observers/'.$model.'Observer.php'));
////        Artisan::call('make:observer', ['name' => $model.'Observer']);
    }
}
