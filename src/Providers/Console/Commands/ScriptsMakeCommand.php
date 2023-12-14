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

        if ($this->file->exists($path)) {
            $this->error("A view already exists at {$path}!");
        }

        if (!$this->file->exists($directory)) {
            $this->file->makeDirectory($directory, 0777, true);
        }

        $this->file->put($path, $contents);
        $this->info("Created a new view at {$path}");
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
