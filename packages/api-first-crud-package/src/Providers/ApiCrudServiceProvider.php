<?php

namespace Krimt\ApiFirstCrudPackage\Providers;

use Illuminate\Support\ServiceProvider;
use Krimt\ApiFirstCrudPackage\Commands\ApiCrudGeneratorCommand;

class ApiCrudServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            ApiCrudGeneratorCommand::class,
        ]);
    }

    public function boot()
    {
//        dd(base_path('stubs'));
//        $this->publishes([
//            __DIR__.'/../stub' => base_path('stubs'),
//        ]);

    }
}
