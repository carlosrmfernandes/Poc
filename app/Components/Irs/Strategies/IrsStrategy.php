<?php

namespace App\Components\Irs\Strategies;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use App\Components\Irs\Contracts\IrsInterface;
use App\Components\Irs\Exceptions\IrsException;

class IrsStrategy implements IrsInterface
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
     * @param int $cnpj
     * @return Object
     * @throws Exception
     */
    public function irs(
    int $cnpj
    ): Object
    {
        try {

            $response = $this->client->request('GET', 'cnpj/'.$cnpj);

            return json_decode($response->getBody()->getContents());
        } catch (ClientException $exception) {
            $response = json_decode($exception->getResponse()->getBody()->getContents());

            throw new IrsException(
            $response->message, $exception->getCode()
            );
        } catch (Exception $exception) {
            throw $exception;
        }
    }

}
