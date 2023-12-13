<?php

declare(strict_types=1);

namespace Ianjaybronola\SpiceDatatable\Providers\Console\Commands;

use Illuminate\View\Factory;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class ScriptsMakeCommand extends Command
{
    protected $signature = "spice-make:scripts {name}";
    protected $description = 'Create scripts for datatable';


    /**
     * @var File
     */
    private $file;

    /**
     * @var Factory
     */
    private $view;

    protected function getStub()
    {
        return __DIR__ . "/../../../../stubs/scripts.stub";
    }

    /**
     * Create a new command instance.
     *
     * @param Filesystem $file
     * @param Factory    $viewFactory
     */
    public function __construct(Filesystem $file, Factory $viewFactory)
    {
        $this->file = $file;
        $this->view = $viewFactory;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $view = strtolower($this->argument('name'));
        $path = config('view.paths')[0] . '/datatables/scripts' . $view . '/scripts.blade.php';
        $directory = dirname($path);

        if ($this->file->exists($path)) {
            $this->error("A view already exists at {$path}!");
        }

        if (!$this->file->exists($directory)) {
            $this->file->makeDirectory($directory, 0777, true);
        }

        $this->file->put($path, $view);
        $this->info("Created a new view at {$path}");
    }
}
