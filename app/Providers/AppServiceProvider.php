<?php

namespace App\Providers;

use App\Core\Administrators\Administrator;
use App\Core\Administrators\IAdministrator;
use App\Core\Categories\Category;
use App\Core\Categories\ICategory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAdministrator::class, Administrator::class);
        $this->app->bind(ICategory::class, Category::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
