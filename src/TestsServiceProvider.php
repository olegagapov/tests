<?php
namespace OlegAgapov\Tests;

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
        $this->publishes([
            __DIR__.'/../config/package_tests.php' => config_path('package_tests.php'),
        ], 'package-tests-config');
    }
    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/package_tests.php',
            'package_tests'
        );
    }
}
// The code is quite simple here. In the boot method, we put the code to allow the developer
// to export the config options by simply writing:
//  php artisan vendor:publish --tag=package-tests-config

// And in the register method, we tell the Laravel app to add the config options from
// our file into the web app config. Commit the update and let’s create our config file next.


// cd packages/OlegAgapov/Tests/src/config
// cd ../../../../

