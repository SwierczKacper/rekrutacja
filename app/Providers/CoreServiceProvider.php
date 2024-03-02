<?php

declare(strict_types=1);

namespace App\Providers;

use App\Command\Adapters\LaravelCommandBus;
use App\Command\CommandBusInterface;
use Illuminate\Contracts\Bus\Dispatcher as DispatcherContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->singleton(
            abstract: CommandBusInterface::class,
            concrete: fn (Application $app) => new LaravelCommandBus($app->make(DispatcherContract::class))
        );
    }

    public function register(): void
    {
        $this->app->register(CoreMigrationStubsServiceProvider::class);
        $this->app->register(APICommunicationServiceProvider::class);
    }
}
