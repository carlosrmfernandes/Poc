<?php

namespace App\Components\Ibge\Strategies;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Components\Ibge\Contracts\IbgeInterface;
use App\Components\Ibge\Exceptions\IbgeException;

class IbgeStrategy implements IbgeInterface
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * ExampleWeatherStrategy constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**

     * @return array
     * @throws Exception
     */
    public function cnae(

    ): array
    {
        try {
            $response = $this->client->request('GET' ,'classes');
            return json_decode($response->getBody()->getContents());
        } catch (ClientException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents());

            throw new IbgeException(
            $response->message, $exception->getCode()
            );
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
