<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\View\Factory;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ScriptsMakeCommand extends Command
{
    protected $signature = "spice-make:scripts {name}";
    protected $description = 'Create scripts for datatable';


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
        $view = $this->argument('name');
        $path = 'resources/views/datatables/scripts' . '/' . $view . '.blade.php';
        $directory = dirname($path);
        $contents = $this->getStubContents(__DIR__ . '/../../../../stubs/scripts.stub');

        $this->info('Creating scripts for ' . $view . ' datatable...');

        if ($this->file->exists($path)) {
            $this->error("A script file already exists at {$path}!");
        }

        if (!$this->file->exists($directory)) {
            $this->file->makeDirectory($directory, 0777, true);
        }
        $this->modifyDataTableWithParams();
        $this->file->put($path, $contents);
        $this->info("Created a new script file at {$path}");
    }

    private function modifyDataTableWithParams()
    {
        //check if name attribute + DataTable class file exists
        $dataTableClassName = $this->argument('name') . 'DataTable';
        $dataTableClassPath = 'app/DataTables/' . $dataTableClassName . '.php';

        if (!$this->file->exists($dataTableClassPath)) {
            $this->error("A DataTable class file for {$dataTableClassName} does not exist at {$dataTableClassPath}!");
        }
        $classContent = $this->file->get($dataTableClassPath);

        // find "Button::make('reload')
        //     ]);" in content
        // append the contents in drawcallback stub file
        $drawCallbackStub = $this->getStubContents(__DIR__ . '/../../../../stubs/drawcallback.stub');
        $classContent = str_replace(']);', $drawCallbackStub, $classContent);

        // find and replace "selectStyleSingle" with selectStyleMulti
        $classContent = str_replace('selectStyleSingle', 'selectStyleMulti', $classContent);

        // replace ->addColumn('action', 'sample.action') with the contents inside addcolumn.stub
        $addColumnStub = $this->getStubContents(__DIR__ . '/../../../../stubs/addcolumn.stub');
        $classContent = str_replace("->addColumn('action', 'datatables.actions.engine')", $addColumnStub, $classContent);

        // replace the contents of class to appended version
        $this->file->put($dataTableClassPath, $classContent);
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
        $contents = str_replace('|model|', $this->argument('name'), $contents);

        return $contents;
    }
}
