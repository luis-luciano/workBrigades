<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class DumpAutoloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js:dumpautoload';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate an autoloader for javascript assets';

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
        $this->info('Generating autoload file.');

        $path = $this->getPath();

        $this->files->put($path, $this->buildAutoload());
    }

    protected function getPath()
    {
        return base_path() . "/resources/assets/js/vendor/autoload.js";
    }

    protected function buildAutoload()
    {
        $stub = $this->files->get($this->getStub());

        $files = collect($this->files->files(base_path() . "/resources/assets/js/app/controllers"));

        if ($files && $controllers = $this->getControllers($files)) {
            $stub .= $controllers . $this->globalizeControllers($files);
        }

        return $stub;
    }

    protected function getStub()
    {
        return __DIR__ . '/../stubs/autoload.stub';
    }

    protected function getControllers($files)
    {
        $content = '';

        $map = $this->getControllersMap($files);

        foreach ($map as $folder => $files) {
            foreach ($files as $key => $file) {
                $content .= "var $file = require('../app/{$folder}/{$file}.js');\n";
            }
        }

        return $content;
    }

    protected function getControllersMap($files)
    {
        $map['controllers'] = $files->map(function ($file, $key) {
            return (string) pathinfo($file, PATHINFO_FILENAME);
        });

        return $map;
    }

    protected function globalizeControllers($files)
    {
        $map = $this->getControllersMap($files);

        $content = "require('../app/globalize.js')({";

        foreach ($map as $folder => $files) {
            foreach ($files as $key => $file) {
                $content .= "\n    $file,";
            }
        }

        $content .= "\n});";

        return $content;
    }
}
