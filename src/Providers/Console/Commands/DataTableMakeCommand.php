<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputArgument;

class DataTableMakeCommand extends Command
{
    protected $signature = 'make:spice-datatable {model}';

    protected $description = 'Create a new datatable class';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $model = $this->argument('model');
        // Execute the command 'sail artisan datatables:make {model}'
        Artisan::call('datatables:make ' . $model);

        // Log the created files
        $this->output->writeln('Creating datatable for ' . $model . '...');
        $this->output->writeln(Artisan::output());

        Artisan::call('spice-make:scripts ' . $model);
        $this->output->writeln('Creating scripts for ' . $model . '...');
        $this->output->writeln(Artisan::output());
    }
}
