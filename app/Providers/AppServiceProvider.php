<?php

namespace App\Providers;
use App\Implementations\CompanyImplementation;
use App\Implementations\ProductImplementation;
use App\Interfaces\CompanyInterface;
use App\Interfaces\ProductInterface;
use Illuminate\Support\ServiceProvider;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CompanyInterface::class, CompanyImplementation::class);
        $this->app->bind(ProductInterface::class, ProductImplementation::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
