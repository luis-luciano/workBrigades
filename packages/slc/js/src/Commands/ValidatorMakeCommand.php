<?php

namespace Slc\Js\Commands;

use Illuminate\Console\Command;

class ValidatorMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'js:make:validator
                            {name : The name of the validator module.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new validator module';

    /**
     * The type of module being generated.
     *
     * @var string
     */
    protected $type = 'Validator';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {

        return __DIR__ . '/../stubs/validator.stub';
    }

    /**
     * Get the default folder for the controller.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultFolder()
    {
        return 'app/validators/';
    }
}
