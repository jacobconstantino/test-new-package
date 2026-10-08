<?php

namespace JohnC\Logger;

use Illuminate\Support\ServiceProvider;

class LoggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Safety net: package defaults always available
        $this->mergeConfigFrom(__DIR__.'/../config/logger.php', 'logger');

        $this->app->singleton(Logger::class, fn () => new Logger());
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/logger.php' => config_path('logger.php'),
            ], ['logger', 'logger-config']);

            $this->publishesMigrations([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], ['logger', 'logger-migrations']);
        }
    }
}
