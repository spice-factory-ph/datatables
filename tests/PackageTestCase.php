<?php

declare(strict_types=1);

namespace Spicefactoryph\SpiceDatatable\Tests;

use Spicefactoryph\SpiceDatatable\Providers\DatatableServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class PackageTestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            DatatableServiceProvider::class,
        ];
    }
}
