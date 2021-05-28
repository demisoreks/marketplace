<?php

namespace App\Providers;

use App\Core\Administrators\Administrator;
use App\Core\Administrators\IAdministrator;
use App\Core\BillingIntervals\BillingInterval;
use App\Core\BillingIntervals\IBillingInterval;
use App\Core\Categories\Category;
use App\Core\Categories\ICategory;
use App\Core\Languages\ILanguage;
use App\Core\Languages\Language;
use App\Core\Vendors\IVendor;
use App\Core\Vendors\Vendor;
use App\Core\Versions\IVersion;
use App\Core\Versions\Version;
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
        $this->app->bind(IVersion::class, Version::class);
        $this->app->bind(IBillingInterval::class, BillingInterval::class);
        $this->app->bind(IVendor::class, Vendor::class);
        $this->app->bind(ILanguage::class, Language::class);
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
