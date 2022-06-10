<?php

namespace App\Providers;

use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Repositories\Eloquent\SellerRepository;
use App\Repositories\Eloquent\SaleRepository;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SellerRepositoryInterface::class, SellerRepository::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
    }
}
