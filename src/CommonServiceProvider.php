<?php

namespace Devolon\Common;

use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Virtual/' => app_path('Virtuals/Common')
        ], 'devolon-common-swagger-documentation');
    }
}
