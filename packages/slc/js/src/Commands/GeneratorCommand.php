<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

abstract class GeneratorCommand extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The type of module being generated.
     *
     * @var string
     */
    protected $type;

    /**
     * Create a new module creator command instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    abstract protected function getStub();

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $name = $this->parseName($this->getNameInput());

        $path = $this->getPath($name);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildModule($name));

        $this->info($this->type . ' created successfully.');

        $this->callSilent('js:dumpautoload');
    }

    /**
     * Determine if the module already exists.
     *
     * @param  string  $rawName
     * @return bool
     */
    protected function alreadyExists($rawName)
    {
        $name = $this->parseName($rawName);

        return $this->files->exists($path = $this->getPath($name));
    }

    /**
     * Get the destination module path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        return base_path() . "/resources/assets/js/" . $this->parseName($name) . '.js';
    }

    /**
     * Parse the name and format according to the default folder.
     *
     * @param  string  $name
     * @return string
     */
    protected function parseName($name)
    {
        if (Str::startsWith($name, '/')) {
            $name = Str::substr($name, 1, strlen($name));
        }

        if (Str::startsWith($name, $this->getDefaultFolder())) {
            return $name;
        }

        return $this->getDefaultFolder() . $name;
    }

    /**
     * Get the default folder for the module.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultFolder()
    {
        return '';
    }

    /**
     * Build the directory for the module if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }

    /**
     * Build the module with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildModule($name)
    {
        $stub = $this->files->get($this->getStub());

        return $stub;
    }

    /**
     * Get the desired module name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return $this->argument('name');
    }
}
