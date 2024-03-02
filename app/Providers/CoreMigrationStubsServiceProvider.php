<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class CoreMigrationStubsServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register(): void
    {
        $this->app->extend(
            'migration.creator',
            fn (MigrationCreator $migrationCreator, Application $app) => new MigrationCreator(
                $migrationCreator->getFilesystem(),
                $app['config']->get('migration.stub_path')
            )
        );
    }
}
