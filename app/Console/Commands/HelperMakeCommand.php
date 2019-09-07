<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class HelperMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:helper';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un nuevo Helper';
    /**
     * The type of class being generated.
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
        return app_path('Console' . DIRECTORY_SEPARATOR . 'stubs'.DIRECTORY_SEPARATOR. 'helper.stub');
    }
    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\' . config('helpers.directory', 'Helpers');
    }
}
