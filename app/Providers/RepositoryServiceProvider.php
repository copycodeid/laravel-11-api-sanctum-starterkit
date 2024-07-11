<?php

namespace App\Providers;

use App\Repository;
use App\Contract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Auth
        $this->app->bind(
            abstract: Contract\AuthRepositoryContract::class,
            concrete: Repository\AuthRepository::class,
        );
    }

    public function boot(): void
    {
        //
    }
}
