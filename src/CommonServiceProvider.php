<?php

namespace Devolon\Common;

use Devolon\Common\Bases\Repository;
use Devolon\Common\Services\RepositoryRegistry;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->when(RepositoryRegistry::class)
            ->needs(Repository::class)
            ->giveTagged(Repository::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Virtual/' => app_path('Virtuals/Common')
        ], 'devolon-common-swagger-documentation');
    }
}
