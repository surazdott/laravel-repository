<?php

namespace SurazDott\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeServiceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository-service {name : The name of the repository service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository service class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $namespace = $this->getNamespace($name);
        $class = Str::replace($namespace.'\\', '', $name);

        return Str::replace('{{ class }}', $class, $stub);
    }
}
