<?php

namespace SurazDott\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeInterfaceCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository-interface {name : The name of the repository interface}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository interface class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository Interface';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/interface.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories\Interfaces';
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
