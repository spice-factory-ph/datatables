<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DataTableMakeCommand extends Command
{
    protected $signature = 'make:spice-datatable {model} {--buttons=}';

    protected $description = 'Create a new datatable class';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $model = $this->argument('model');
        $includeButtons = $this->option('buttons');

        // Execute the command 'sail artisan datatables:make {model}'
        Artisan::call('datatables:make ' . $model);

        // Log the created files
        $this->output->writeln('Creating datatable for ' . $model . '...');
        $this->output->writeln(Artisan::output());

        // call artisan make:scripts and pass options same as this option buttons
        $this->output->writeln('Creating scripts for ' . $model . '...');
        if ($includeButtons) {
            $this->output->writeln('Including buttons: ' . $includeButtons);
        }
        Artisan::call('make:scripts', [
            'name' => strtolower($model),
            '--buttons' => $includeButtons
        ]);
        $this->output->writeln(Artisan::output());

        // $this->call('spice-make:scripts', ['name' => strtolower($model), '--buttons=' => $includeButtons]);
        // $this->output->writeln(Artisan::output());

        // $this->call('spice-make:index', ['name' => $model]);
        // $this->output->writeln(Artisan::output());

        // $this->call('spice-make:actions', ['name' => $model]);
        // $this->output->writeln(Artisan::output());
    }
}
