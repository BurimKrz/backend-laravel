<?php

namespace App\Providers;

use App\Services\Interfaces\AddExportInterface;
use App\Services\Interfaces\AddImportInterface;
use App\Services\Interfaces\AddProductInterface;
use App\Services\Interfaces\BuyerInterface;
use App\Services\Interfaces\CompanyInterface;
use App\Services\Interfaces\InterestedAtInterface;
use App\Services\Interfaces\InterestedInterface;
use App\Services\Services\AddExportService;
use App\Services\Services\AddImportService;
use App\Services\Services\AddProductServices;
use App\Services\Services\BuyerService;
use App\Services\Services\CompanyService;
use App\Services\Services\InterestedAtService;
use App\Services\Services\InterestedInService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(CompanyInterface::class, CompanyService::class);
       $this->app->bind(InterestedInterface::class, InterestedInService::class);
       $this->app->bind(BuyerInterface::class, BuyerService::class);
       $this->app->bind(InterestedAtInterface::class, InterestedAtService::class);
       $this->app->bind(AddProductInterface::class, AddProductServices::class);
       $this->app->bind(AddImportInterface::class, AddImportService::class);
       $this->app->bind(AddExportInterface::class, AddExportService::class);

    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
