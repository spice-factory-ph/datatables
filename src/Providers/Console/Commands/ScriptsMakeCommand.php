<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class ScriptsMakeCommand extends GeneratorCommand
{
    protected $name = 'make:scripts {model}';
    protected $description = 'Create scripts for datatable';

    protected function getStub()
    {
        return __DIR__ . "/../../../../stubs/scripts.stub";
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        $scriptName = strtolower($this->name);
        return $rootNamespace . '\Resources\views\\' . $scriptName . '\\' . $scriptName . '\\scripts.js';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['model', InputArgument::REQUIRED, 'The name of the model.'],
        ];
    }
}