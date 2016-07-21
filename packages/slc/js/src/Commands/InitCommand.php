<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an assets structure';

    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!$this->wantToInit()) {
            return $this->comment('Init canceled.');
        }

        $this->info('Generating assets structure.');

        $this->generateAssetsStructure();

        $this->generateGulpFileExample();

        // create a file to know if the user has "inited" the project
        touch(__DIR__ . '/../done');
    }

    protected function wantToInit()
    {
        if (file_exists(__DIR__ . '/../done')) {
            return $this->confirm('Do you want to init again? [y|N]');
        }
        return true;
    }

    protected function generateAssetsStructure()
    {
        $this->files->copyDirectory(__DIR__ . '/../stubs/structure', base_path() . '/resources/assets');
    }

    protected function generateGulpFileExample()
    {
        $this->files->copy(__DIR__ . '/../stubs/js-gulpfile.js', base_path() . '/js-gulpfile.js');
    }
}
