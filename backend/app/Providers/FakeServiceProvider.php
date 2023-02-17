<?php

namespace App\Providers;

use App\Fake\CNSProvider;
use Faker\{Factory, Generator};
use Illuminate\Support\ServiceProvider;

class FakeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $fake = Factory::create();
            $fake->addProvider(new CNSProvider($fake));
            return $fake;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
