<?php

namespace App\Providers;

use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Repositories\Eloquent\SellerRepository;
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
    }
}
