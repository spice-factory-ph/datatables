<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\View\Factory;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class ScriptsMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'spice-make:scripts';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create scripts for datatable';


    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Execute the console command.
     */
    public function handle(): bool|null
    {
        return parent::handle();
    }

    protected function getStub()
    {
        return $this->resolveStubPath('/../../../../stubs/scripts.stub');
        // return __DIR__ . "/../../../../stubs/scripts.stub";
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $modelName = strtolower($this->argument('name'));
        $class = parent::buildClass($name);
        $class = str_replace(['{{ model }}'], $modelName, $class);
        $class = str_replace(['{{ model_variable }}'], strtolower($modelName), $class);

        return $class;
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     */
    protected function resolveStubPath($stub): string
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : __DIR__ . $stub;
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */

    /**
     * Create a new command instance.
     *
     * @param Filesystem $file
     * @param Factory    $viewFactory
     */
    // public function __construct(Filesystem $file, Factory $viewFactory)
    // {
    //     $this->file = $file;
    //     $this->view = $viewFactory;

    //     parent::__construct();
    // }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    // public function handle()
    // {
    //     $view = strtolower($this->argument('name'));
    //     $path = 'resources/views/datatables/scripts/' . $view . '/scripts.blade.php';
    //     $directory = dirname($path);

    //     if ($this->file->exists($path)) {
    //         $this->error("A view already exists at {$path}!");
    //     }

    //     if (!$this->file->exists($directory)) {
    //         $this->file->makeDirectory($directory, 0777, true);
    //     }

    //     $this->file->put($path, $view);
    //     $this->info("Created a new view at {$path}");
    // }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        $view = strtolower($this->argument('name'));
        return 'resources/views/datatables/scripts/' . $view . '/scripts.blade.php';
    }
}
