<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ScriptsMakeCommand extends GeneratorCommand
{
    protected $signature = "spice-make:scripts {name}";

    protected $name = "scripts";
    protected $description = 'Create scripts for datatable';

    protected function getStub()
    {
        return __DIR__ . "/../../../../stubs/scripts.stub";
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $scriptName = strtolower($this->argument('name'));
        return config('view.paths') . '\\' . $scriptName . '\\' . $scriptName . '\\scripts.blade.php';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model.'],
        ];
    }
}
