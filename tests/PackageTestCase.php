<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Tests;

use Ianjaybronola\SpiceDatatable\Providers\DatatableServiceProvider;
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
