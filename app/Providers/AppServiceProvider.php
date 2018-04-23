<?php

namespace App\Providers;

use
App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Helpers\Helper;
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
		$locations = Helper::getLocations();
        $sidebar_category = Category::where('parent_id',NULL)->where('status',1)->orderBy('sorting','asc')->get();
		View::share('sidebar_category', $sidebar_category);
		View::share('locations', $locations);

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
