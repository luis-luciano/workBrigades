<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;

class ControllerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js:make:controller
                            {name : The name of the controller module.}
                            {--plain : Generate an empty controller module.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new resource controller module';

    /**
     * The type of module being generated.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('plain')) {
            return __DIR__ . '/../stubs/controller.plain.stub';
        }

        return __DIR__ . '/../stubs/controller.stub';
    }

    /**
     * Get the default folder for the controller.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultFolder()
    {
        return 'app/controllers/';
    }
}
