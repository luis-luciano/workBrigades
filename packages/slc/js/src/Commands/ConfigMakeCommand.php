<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;

class ConfigMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js:make:config
                            {name : The name of the configuration file.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new configuration file';

    /**
     * The type of module being generated.
     *
     * @var string
     */
    protected $type = 'Configuration file';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {

        return __DIR__ . '/../stubs/configuration.stub';
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

        $pluginName = camel_case($this->argument('name'));

        // replace plugin name description
        $stub = str_replace('{{plugin}}', $pluginName, $stub);

        // replace plugin name title
        $stub = str_replace('{{PLUGIN}}', ucwords($pluginName), $stub);

        return $stub;
    }

    /**
     * Get the default folder for the controller.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultFolder()
    {
        return 'config/';
    }
}
