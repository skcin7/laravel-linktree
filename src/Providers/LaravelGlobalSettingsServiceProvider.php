<?php

namespace Skcin7\LaravelGlobalSettings\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Skcin7\LaravelGlobalSettings\LaravelGlobalSettingsManager;
use Illuminate\Support\Facades\Config;

class LaravelGlobalSettingsServiceProvider extends ServiceProvider
{
    /**
     * Boot the global settings package.
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'global_settings');


        if($this->app->runningInConsole()) {

//            $this->publishes([
//                // Migration:
//                __DIR__ . '/../../database/migrations/2022_12_15_100000_create_global_settings_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_global_settings_table.php'),
//
//                // Seeder:
//                __DIR__ . '/../../database/seeders/GlobalSettingsSeeder.php' => database_path('seeders/GlobalSettingsSeeder.php'),
//
//                // Config:
//                __DIR__ . '/../../config/global_settings_config.php' => config_path('global_settings.php')
//            ], 'laravel-global-settings');


            // Publish the Migration:
            $this->publishes([
                __DIR__ . '/../../database/migrations/2022_12_15_100000_create_global_settings_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_global_settings_table.php'),
            ], 'laravel-global-settings-migrations');

            // Publish the Seeder:
            $this->publishes([
                __DIR__ . '/../../database/seeders/GlobalSettingsSeeder.php' => database_path('seeders/GlobalSettingsSeeder.php'),
            ], 'laravel-global-settings-seeders');

            // Publish the Config:
            $this->publishes([
                __DIR__ . '/../../config/global_settings_config.php' => config_path('global_settings.php')
            ], 'laravel-global-settings-config');

        }

//        if($this->app->runningInConsole()) {
//            // Publish assets
//            $this->publishes([
//                __DIR__.'/../../resources/assets/images' => public_path('images/linktree'),
//            ], 'linktree-assets');
//        }





        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('GlobalSettings', "Skcin7\\LaravelGlobalSettings\\Facades\\LaravelGlobalSettings");

    }

    /**
     * Register the routes for the global settings package.
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/global_settings_routes_web.php');
        });
    }

    /**
     * Configuration to use for the global settings routes.
     * @return array
     */
    protected function routeConfiguration(): array
    {
        return [
            'middleware' => Config('global_settings.routes.middleware', []),
            'as' => Config('global_settings.routes.name_prefix', 'global_settings.'),
            'namespace' => Config('global_settings.routes.namespace', 'Skcin7\LaravelGlobalSettings\Http\Controllers'),
            'prefix' => Config('global_settings.routes.prefix', 'global_settings'),
        ];
    }

    /**
     * Register the global settings package.
     * @return void
     */
    public function register()
    {
//        $app = $this->app;

        $this->mergeConfigFrom(__DIR__ . '/../../config/global_settings_config.php', 'global_settings');

        $this->app->bind('global_settings', function($app) {
            return new LaravelGlobalSettingsManager();
        });

        $this->app->alias('global_settings', 'Skcin7\LaravelGlobalSettings\LaravelGlobalSettingsManager');

    }
}
