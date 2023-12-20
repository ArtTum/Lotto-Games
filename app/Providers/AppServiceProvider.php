<?php

namespace App\Providers;

use App\Repositories\Contracts\LottoDrawRepositoryInterface;
use App\Repositories\LottoDrawRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(LottoDrawRepositoryInterface::class, LottoDrawRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
