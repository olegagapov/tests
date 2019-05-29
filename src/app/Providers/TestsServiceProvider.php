<?php

namespace AlexClaimer\Tests\App\Providers;

use Illuminate\Support\ServiceProvider;

class TestsServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../../resources/views', 'tests-contact-form');
        //dd(__METHOD__);
        $this->publishes([__DIR__ . '/../../../config/package_tests.php' => config_path('package_tests.php')],
            'package-tests-config');
    }

    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {
        //dd(__METHOD__);
        $this->mergeConfigFrom(__DIR__ . '/../../../config/package_tests.php', 'package_tests');
    }
}

