<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use App\Components\bb\Client;
use App\Components\bb\Strategies\BbStrategy;

class BbProviderovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            $config = config('bb');
            $client = new GuzzleClient([
                'base_uri' => $config['bb_base_url'],
            ]);

            return new Client(new BbStrategy($client));
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
