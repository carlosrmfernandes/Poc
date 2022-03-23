<?php

namespace App\Components\bb\Strategies;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Components\bb\Contracts\BbInterface;
use App\Components\bb\Exceptions\BbException;

class BbStrategy implements BbInterface
{

    /**
     * @var Client
     */
    protected $client;
    protected $token;

    /**
     * ExampleWeatherStrategy constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $data
     * @return Object
     * @throws Exceptions
     */
    public function bb(
        array $data
    ): Object
    {
        try {

            $response = $this->client->request('POST', 'oauth/token',[
                'verify' => false,
                'json' => $data,
            ]);

            return json_decode($response->getBody()->getContents());

        } catch (ClientException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents());

            throw new BbException(
            $response, $exception->getCode()
            );
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
