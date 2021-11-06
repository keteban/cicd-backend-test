<?php

namespace App\Providers;

use App\Repositories\EmployeeRepository;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
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
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
    }
}
