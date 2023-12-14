<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers;

use Illuminate\Support\ServiceProvider;
use Ianjaybronola\SpiceDatatable\Providers\Console\Commands\DataTableMakeCommand;
use Ianjaybronola\SpiceDatatable\Providers\Console\Commands\IndexMakeCommand;
use Ianjaybronola\SpiceDatatable\Providers\Console\Commands\ScriptsMakeCommand;

final class DatatableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    ScriptsMakeCommand::class,
                    IndexMakeCommand::class,
                    DataTableMakeCommand::class,
                ]
            );
        }
    }

    public function register()
    {
    }
}
