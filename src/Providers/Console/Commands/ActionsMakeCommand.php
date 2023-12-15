<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\View\Factory;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ActionsMakeCommand extends Command
{
    protected $signature = "spice-make:actions {name}";
    protected $description = 'Create actions view for datatable';


    /**
     * @var File
     */
    private $file;

    /**
     * Create a new command instance.
     *
     * @param Filesystem $file
     * @param Factory    $viewFactory
     */
    public function __construct(Filesystem $file)
    {
        $this->file = $file;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = strtolower($this->argument('name'));
        $path = 'resources/views/datatables/actions' . '/' . $name . '.blade.php';
        $directory = dirname($path);
        $contents = $this->getStubContents(__DIR__ . '/../../../../stubs/actions.stub');

        $this->info('Creating actions for ' . $name . ' datatable...');

        if ($this->file->exists($path)) {
            $this->error("An actions.blade file already exists at {$path}!");
        }

        if (!$this->file->exists($directory)) {
            $this->file->makeDirectory($directory, 0777, true);
        }

        $this->file->put($path, $contents);
        $this->info("Created a new blade file at {$path}");
        $this->output->writeln("Please make sure to line 25 of {$name}DataTable.php on line 25");
        $this->output->writeln("\t->addColumn('action',function (\$data) {");
        $this->output->writeln("\t\treturn view('datatables.actions.{$name}', ['data' => \$data]);");
        $this->output->writeln("\t})");
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub)
    {
        $contents = file_get_contents($stub);
        $contents = str_replace('|model|', strtolower($this->argument('name')), $contents);

        return $contents;
    }
}
