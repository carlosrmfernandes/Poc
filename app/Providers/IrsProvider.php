<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use App\Components\Irs\Client;
use App\Components\Irs\Strategies\IrsStrategy;

class IrsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            $config = config('irs');
            $client = new GuzzleClient([
                'base_uri' => $config['base_uri'],
            ]);

            return new Client(new IrsStrategy($client));
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
