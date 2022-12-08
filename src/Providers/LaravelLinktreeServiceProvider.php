<?php

namespace Skcin7\LaravelLinktree\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Skcin7\LaravelLinktree\LinktreeManager;
use Skcin7\LaravelLinktree\LinktreeSettings;

class LaravelLinktreeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'linktree');


        if($this->app->runningInConsole()) {
            // Export the migration
            $this->publishes([
                __DIR__ . '/../../database/migrations/2018_08_08_100000_create_linktree_settings_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_linktree_settings_table.php'),
                __DIR__ . '/../../database/migrations/2018_08_08_100001_create_linktree_groups_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_linktree_groups_table.php'),
                __DIR__ . '/../../database/migrations/2018_08_08_100002_create_linktree_links_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_linktree_links_table.php'),
            ], 'linktree-migrations');

            // Publish database seeders:
            $this->publishes([
                __DIR__ . '/../../database/seeders/LinktreeSeeder.php' => database_path('seeders/LinktreeSeeder.php'),
            ], 'linktree-seeders');

        }

        if($this->app->runningInConsole()) {
            // Publish assets
            $this->publishes([
                __DIR__.'/../../resources/assets/images' => public_path('images/linktree'),
            ], 'linktree-assets');

        }



//        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
//        $loader->alias('Linktree', "Skcin7\\LaravelLinktree\\Facades\\LinkTree");

    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => 'linktree',
            //'middleware' => '',

            // 'prefix' => config('blogpackage.prefix'),
            // 'middleware' => config('blogpackage.middleware'),
        ];
    }

    public function register()
    {
        $app = $this->app;

        $this->app->bind('linktree', function($app) {
            return new LinktreeManager();
        });

        $this->app->bind('settings', function($app) {
            return new LinktreeSettings();
        });


        $this->app->alias('linktree', 'Skcin7\LaravelLinktree\LinktreeManager');

    }
}
