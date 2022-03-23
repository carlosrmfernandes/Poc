<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use App\Components\Ibge\Client;
use App\Components\Ibge\Strategies\IbgeStrategy;

class IbgeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            $config = config('ibge');
            $client = new GuzzleClient([
                'base_uri' => $config['base_uri'],
            ]);

            return new Client(new IbgeStrategy($client));
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
