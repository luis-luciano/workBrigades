<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;

class ListenerMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js:make:listener
                            {name : The name of the listener module.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new listener module';

    /**
     * The type of module being generated.
     *
     * @var string
     */
    protected $type = 'Listener';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {

        return __DIR__ . '/../stubs/listener.stub';
    }

    /**
     * Get the default folder for the controller.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultFolder()
    {
        return 'app/listeners/';
    }
}
