<?php

namespace SurazDott\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeRepositoryCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository
        {name : The name of the repository}
        {--interface : Create an interface along with the repository}
        {--service : Create an interface and service along with the repository}
        {--all : Create an interface service along with the repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/repository.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
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

    /**
     * Handle the command
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('service')) {
            $this->createService();
        }

        if ($this->option('interface')) {
            $this->createInterface();
        }

        if ($this->option('all')) {
            $this->createInterface();
            $this->createService();
        }

        return parent::handle();
    }

    /**
     * Create service for the repository
     *
     * @return void
     */
    private function createService()
    {
        $name = $this->argument('name');
        $name = Str::studly($name);

        if (Str::contains($name, 'Repository') == true) {
            $name = Str::replace('Repository', 'Service', $name);
        }

        $this->call('make:repository-service', [
            'name' => $name,
        ]);
    }

    /**
     * Create service for the repository
     *
     * @return void
     */
    private function createInterface()
    {
        $name = $this->argument('name');
        $name = Str::studly($name);

        if (Str::contains($name, 'Repository') == true) {
            $name = Str::replace('Repository', 'RepositoryInterface', $name);
        }

        $this->call('make:repository-interface', [
            'name' => $name,
        ]);
    }
}
