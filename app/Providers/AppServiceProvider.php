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
use App\Core\Products\Categories\IProductCategory;
use App\Core\Products\Categories\ProductCategory;
use App\Core\Products\Features\IProductFeature;
use App\Core\Products\Features\ProductFeature;
use App\Core\Products\IProduct;
use App\Core\Products\Languages\IProductLanguage;
use App\Core\Products\Languages\ProductLanguage;
use App\Core\Products\Plans\IProductPlan;
use App\Core\Products\Plans\ProductPlan;
use App\Core\Products\Product;
use App\Core\Products\Requirements\IProductRequirement;
use App\Core\Products\Requirements\ProductRequirement;
use App\Core\Products\Versions\IProductVersion;
use App\Core\Products\Versions\ProductVersion;
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
        $this->app->bind(IProduct::class, Product::class);
        $this->app->bind(IProductCategory::class, ProductCategory::class);
        $this->app->bind(IProductRequirement::class, ProductRequirement::class);
        $this->app->bind(IProductFeature::class, ProductFeature::class);
        $this->app->bind(IProductLanguage::class, ProductLanguage::class);
        $this->app->bind(IProductVersion::class, ProductVersion::class);
        $this->app->bind(IProductPlan::class, ProductPlan::class);
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
