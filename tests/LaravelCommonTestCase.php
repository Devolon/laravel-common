<?php

namespace Devolon\Common\Tests;

use Devolon\Common\CommonServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Orchestra\Testbench\TestCase;

abstract class LaravelCommonTestCase extends TestCase
{
    protected function getEnvironmentSetUp($app)
    {
        $app->make(Repository::class);

        $app['config']->set('app.debug', 'true');
    }

    protected function getPackageProviders($app)
    {
        return [CommonServiceProvider::class];
    }
}
