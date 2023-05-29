<?php

namespace App\Providers;

use App\Services\Interfaces\ActivityInterface;
use App\Services\Interfaces\AddExportInterface;
use App\Services\Interfaces\AddImportInterface;
use App\Services\Interfaces\AddProductInterface;
use App\Services\Interfaces\AuthInterface;
use App\Services\Interfaces\BuyerInterface;
use App\Services\Interfaces\CompanyFilterInterface;
use App\Services\Interfaces\CompanyInterface;
use App\Services\Interfaces\CompanyListInterface;
use App\Services\Interfaces\ExportProductInterface;
use App\Services\Interfaces\FilterProductInterface;
use App\Services\Interfaces\ImportproductInterface;
use App\Services\Interfaces\InterestedAtInterface;
use App\Services\Interfaces\InterestedInterface;
use App\Services\Interfaces\ModifyItemInterface;
use App\Services\Interfaces\RegisterInterface;
use App\Services\Interfaces\SellerInterface;
use App\Services\Interfaces\TokenInterface;
use App\Services\Interfaces\ViewInterface;
use App\Services\Services\ActivityService;
use App\Services\Services\AddExportService;
use App\Services\Services\AddImportService;
use App\Services\Services\AddProductServices;
use App\Services\Services\AuthService;
use App\Services\Services\BuyerService;
use App\Services\Services\CompanyFilterService;
use App\Services\Services\CompanyListService;
use App\Services\Services\CompanyService;
use App\Services\Services\ExportProductService;
use App\Services\Services\FilterProductService;
use App\Services\Services\ImportProductService;
use App\Services\Services\InterestedAtService;
use App\Services\Services\InterestedInService;
use App\Services\Services\ModifyItemService;
use App\Services\Services\RegisterService;
use App\Services\Services\SellerService;
use App\Services\Services\TokenService;
use App\Services\Services\ViewService;
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
        $this->app->bind(ActivityInterface::class, ActivityService::class);
        $this->app->bind(AuthInterface::class, AuthService::class);
        $this->app->bind(CompanyFilterInterface::class, CompanyFilterService::class);
        $this->app->bind(CompanyListInterface::class, CompanyListService::class);
        $this->app->bind(ExportProductInterface::class, ExportProductService::class);
        $this->app->bind(FilterProductInterface::class, FilterProductService::class);
        $this->app->bind(ImportproductInterface::class, ImportProductService::class);
        $this->app->bind(ModifyItemInterface::class, ModifyItemService::class);
        $this->app->bind(RegisterInterface::class, RegisterService::class);
        $this->app->bind(SellerInterface::class, SellerService::class);
        $this->app->bind(TokenInterface::class, TokenService::class);
        $this->app->bind(ViewInterface::class, ViewService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
