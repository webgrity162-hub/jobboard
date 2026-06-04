<?php

namespace App\Providers;

use App\Services\Interfaces\ApplicationRepositoryInterface;
use App\Services\Interfaces\AuthRepositoryInterface;
use App\Services\Interfaces\JobRepositoryInterface;
use App\Services\Repositories\ApplicationRepository;
use App\Services\Repositories\AuthRepository;
use App\Services\Repositories\JobRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(JobRepositoryInterface::class,JobRepository::class);
        $this->app->bind(AuthRepositoryInterface::class,AuthRepository::class);
        $this->app->bind(ApplicationRepositoryInterface::class,ApplicationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
