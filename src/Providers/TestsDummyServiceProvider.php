<?php
namespace OlegAgapov\Tests\Providers;

use Illuminate\Support\ServiceProvider;

class TestsDummyServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return  void
     */
    public function boot()
    {

    }
    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return  void
     */
    public function register()
    {

    }
}
// The code is quite simple here. In the boot method, we put the code to allow the developer
// to export the config options by simply writing:

//  php artisan vendor:publish --tag=package-tests-config

// And in the register method, we tell the Laravel app to add the config options from
// our file into the web app config. Commit the update and let’s create our config file next.

// composer require OlegAgapov/Tests

// cd packages/OlegAgapov/Tests/src/config
// cd ../../../../../
// cd packages/OlegAgapov/Tests
// cd ../../../

