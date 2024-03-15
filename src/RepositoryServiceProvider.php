<?php

namespace SurazDott;

use Illuminate\Support\ServiceProvider;
use SurazDott\Commands\MakeInterfaceCommand;
use SurazDott\Commands\MakeRepositoryCommand;
use SurazDott\Commands\MakeServiceCommand;

/**
 * Class RepositoryServiceProvider
 */
class RepositoryServiceProvider extends ServiceProvider
{
    protected array $commands = [
        MakeInterfaceCommand::class,
        MakeRepositoryCommand::class,
        MakeServiceCommand::class,
    ];

    /**
     * Register bindings in the container.
     */
    public function register(): void
    {
        $this->commands($this->commands);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
