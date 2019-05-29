The code is quite simple here. In the boot method, we put the code to allow the developer
to export the config options by simply writing:

php artisan vendor:publish --tag=package-tests-config

And in the register method, we tell the Laravel app to add the config options from
our file into the web app config. Commit the update and let’s create our config file next.

composer require AlexClaimer/Tests --dev



cd packages/AlexClaimer/Tests/src/config

cd ../../../../../


cd packages/AlexClaimer/Tests

cd ../../../

composer dump-autoload

    "require-dev": {
        "phpunit/phpcov": "~4.0|~5.0|~6.0",
        "phpunit/phpunit": "~5.7.14|~6.1|~7.0|~8.0",
        "laravel/framework": "~5.5.0|~5.6.0|~5.7.0|~5.8.0",
        "orchestra/testbench": "~3.0",
        "laravel/browser-kit-testing": "~2.0.0|~3.0.0|~4.0.0|~5.0.0|~5.1",
        "orchestra/testbench-browser-kit": "~3.5|~3.6|~3.7|~3.8"
    }
    
    
        "require": {
            "php": "^7.1.3",
            "illuminate/support": "~5.8.0",
            "intervention/image": "^2.4"
        },
