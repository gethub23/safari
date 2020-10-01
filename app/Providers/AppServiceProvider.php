<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\User;
use App\Models\Admin;
use App\Models\Intro;
use App\Models\Service;

use App\Observers\UserObserver;
use App\Observers\BannersObserver;
use App\Observers\CategoryObserver;
use App\Observers\ServiceObserver;
use App\Observers\AdminObserver;
use App\Observers\IntroObserver;



use App\Models\Report;
use App\Models\AppSetting;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use DB;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // -------------- observers ---------------- \\
            Banner          ::observe(BannersObserver           ::class);
            Category        ::observe(CategoryObserver          ::class);
            // Service         ::observe(ServiceObserver           ::class);
            // User            ::observe(UserObserver              ::class);
            Admin           ::observe(AdminObserver             ::class);
            Intro           ::observe(IntroObserver             ::class);
        // -------------- observers ---------------- \\



        // -------------- components ---------------- \\
            Blade::component('dashboard.shared.components.reload'            , 'Reload'           );
            Blade::component('dashboard.shared.components.addbutton'         , 'AddButton'        );
            Blade::component('dashboard.shared.components.addmodel'          , 'AddModel'         );
            Blade::component('dashboard.shared.components.deleteall'         , 'DeleteAll'        );
            Blade::component('dashboard.shared.components.deleteallmodel'    , 'DeleteAllModel'   );
            Blade::component('dashboard.shared.components.deletebutton'      , 'DeleteButton'     );
            Blade::component('dashboard.shared.components.deletemodel'       , 'DeleteModel'      );
            Blade::component('dashboard.shared.components.editbutton'        , 'EditButton'       );
            Blade::component('dashboard.shared.components.editmodel'         , 'EditModel'        );
            Blade::component('dashboard.shared.components.table'             , 'Table'            );
            Blade::component('dashboard.shared.components.scripts'           , 'Scripts'          );
            Blade::component('dashboard.shared.components.showbutton'        , 'ShowButton'       );
            Blade::component('dashboard.shared.components.showmodel'         , 'ShowModel'        );
        // -------------- components ---------------- \\

        // -------------- lang ---------------- \\
            app()->singleton('lang', function (){
                if ( session() -> has( 'lang' ) )
                    return session( 'lang' );
                else
                    return 'ar';

            });
        // -------------- lang ---------------- \\

    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
