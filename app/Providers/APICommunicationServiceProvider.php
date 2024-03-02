<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\APICommunicationService;
use Illuminate\Support\ServiceProvider;

class APICommunicationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(APICommunicationService::class, function ($app) {
            return new APICommunicationService();
        });
    }
}
