<?php

declare(strict_types=1);

namespace Spicefactoryph\SpiceDatatable\Providers;

use Spicefactoryph\SpiceDatatable\Providers\Console\Commands\ActionsMakeCommand;
use Illuminate\Support\ServiceProvider;
use Spicefactoryph\SpiceDatatable\Providers\Console\Commands\DataTableMakeCommand;
use Spicefactoryph\SpiceDatatable\Providers\Console\Commands\IndexMakeCommand;
use Spicefactoryph\SpiceDatatable\Providers\Console\Commands\ScriptsMakeCommand;

final class DatatableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // publish the css file from assets/main.css
            $this->publishes(
                [
                    __DIR__ . '/../resources/assets' => public_path('spicedatatable'),
                ],
                'assets'
            );

            $this->commands(
                commands: [
                    ScriptsMakeCommand::class,
                    IndexMakeCommand::class,
                    ActionsMakeCommand::class,
                    DataTableMakeCommand::class,
                ]
            );
        }
    }

    public function register()
    {
    }
}
