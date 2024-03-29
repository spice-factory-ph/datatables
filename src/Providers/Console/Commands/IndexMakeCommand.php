<?php

declare(strict_types=1);

namespace Spicefactoryph\SpiceDatatable\Providers\Console\Commands;

use Illuminate\View\Factory;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class IndexMakeCommand extends Command
{
    protected $signature = "spice-make:index {name}";
    protected $description = 'Create index blade for datatable';


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
        $path = 'resources/views/' . $name . 's/index.blade.php';
        $directory = dirname($path);
        $contents = $this->getStubContents(__DIR__ . '/../../../../stubs/index.stub');

        $this->info('Creating index.blade.php for ' . $name . ' datatable...');

        if ($this->file->exists($path)) {
            $this->error("A datatable already exists at {$path}!");
        }

        if (!$this->file->exists($directory)) {
            $this->file->makeDirectory($directory, 0777, true);
        }

        $this->file->put($path, $contents);
        $this->info("Created a new datatable index at {$path}");
        $this->info("The default route is set for get:'api/datatables/{$name}s");
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
        $contents = str_replace('|Model|', $this->argument('name'), $contents);
        return $contents;
    }
}
