<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers;

use Illuminate\Support\ServiceProvider;
use Ianjaybronola\SpiceDatatable\Providers\Console\Commands\DataTableMakeCommand;

final class DatatableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DataTableMakeCommand::class,
            ]);
        }
    }
}
