<?php

namespace Krimt\ApiFirstCrudPackage\Providers;

use Illuminate\Support\ServiceProvider;
use Krimt\ApiFirstCrudPackage\Commands\ApiCrudGeneratorCommand;

class ApiCrudServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        dd('Hello from ApiCrudServiceProvider');

    }
}
