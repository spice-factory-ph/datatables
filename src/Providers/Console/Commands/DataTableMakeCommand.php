<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\GeneratorCommand;

final class DataTableMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:spice-datatable {model}';

    protected $description = 'Create a new datatable class';

    protected $type = 'Datatable';

    protected function getStub()
    {
        $readonly = Str::contains(
            haystack: PHP_VERSION,
            needles: '8.2',
        );

        $file = $readonly ? 'dto-82.stub' : 'dto.stub';

        return __DIR__ . '/../../../../stubs/' . $file;
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\DataTables';
    }

    public function handle()
    {
        $model = $this->argument('model');
        // Execute the command 'sail artisan datatables:make {model}'
        Artisan::call('datatables:make ' . $model);

        // Log the created files
        $this->output->writeln('Creating datatable for ' . $model . '...');
        $this->output->writeln(Artisan::output());
    }
}
