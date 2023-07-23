<?php

namespace Echo909\ChatgptApi;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class ChatgptApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/chatgpt-api.php', 'chatgpt-api');

        $this->publishConfig();

        // $this->loadViewsFrom(__DIR__.'/resources/views', 'chatgpt-api');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/routes.php');
        });
    }

    /**
    * Get route group configuration array.
    *
    * @return array
    */
    private function routeConfiguration()
    {
        return [
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register facade
        $this->app->singleton('chatgpt-api', function () {
            return new ChatgptApi;
        });
    }

    /**
     * Publish Config
     *
     * @return void
     */
    public function publishConfig()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/chatgpt-api.php' => config_path('chatgpt-api.php'),
            ], 'config');
        }
    }
}
