<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

final class DataTableMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:spice-datatable {name: model name}';

    protected $description = 'Create a new datatable class';

    protected $type = 'Datatable';

    protected function getStub()
    {
        $readonly = Str::contains(
            haystack: PHP_VERSION,
            needles: '8.2',
        );

        $file = $readonly ? 'dto-82.stub' : 'dto.stub';

        return __DIR__ . "/../../../stubs/{$file}";
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\DataTables';
    }

    protected function getNameInput()
    {
        $name = trim($this->argument('name'));

        if (Str::endsWith($name, 'DataTable')) {
            return $name;
        }

        return $name . 'DataTable';
    }
}
