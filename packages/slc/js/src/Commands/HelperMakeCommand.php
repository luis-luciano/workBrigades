<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;

class HelperMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js:make:helper
                            {name : The name of the helper module.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new helper module';

    /**
     * The type of module being generated.
     *
     * @var string
     */
    protected $type = 'Helper';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {

        return __DIR__ . '/../stubs/helper.stub';
    }

    /**
     * Get the default folder for the controller.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultFolder()
    {
        return 'app/helpers/';
    }
}
