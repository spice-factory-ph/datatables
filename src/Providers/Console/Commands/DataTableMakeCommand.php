<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class DataTableMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:spice-datatable {name: model name}';

    protected $description = 'Create a new datatable class';

    protected function getStub()
    {
        return __DIR__ . "/../../../../stubs/scripts.stub";
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\SpiceDatatable\DataTables';
    }
}
