<?php

namespace App\Providers;

use App\Helpers\Helpers;
use Illuminate\Support\ServiceProvider;
use OpenAI;
use OpenAI\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            abstract: Client::class,
            concrete: fn () => OpenAI::client(
                apiKey: strval(config('openai.api_key'))
            )
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Helpers::mailConfig();
    }
}
