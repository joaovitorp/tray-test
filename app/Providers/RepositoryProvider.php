<?php

namespace App\Providers;

use App\Repositories\Contracts\CommissionTypeRepositoryInterface;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Repositories\Eloquent\CommissionTypeRepository;
use App\Repositories\Eloquent\SaleRepository;
use App\Repositories\Eloquent\SellerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
        $this->app->bind(SellerRepositoryInterface::class, SellerRepository::class);
        $this->app->bind(CommissionTypeRepositoryInterface::class, CommissionTypeRepository::class);
    }
}
