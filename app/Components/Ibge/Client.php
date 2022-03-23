<?php
namespace App\Components\Ibge;
use Exception;
use App\Components\Ibge\Contracts\IbgeInterface;
use App\Components\Ibge\Exceptions\IbgeException;

class Client
{
    /**
     * @var ibgeInterface
     */
    protected $ibgeInterface;

    /**
     * Client constructor.
     * @param ExampleWeatherInterface $exampleWeatherInterface
     */
    public function __construct(IbgeInterface $ibgeInterface)
    {
        $this->ibgeInterface = $ibgeInterface;
    }

    /**
     * @return array
     * @throws IbgeException
     */
    public function cnae(
    ): array {
        try {
            return $this->ibgeInterface->cnae(
            );
        } catch (Exception $exception) {
            throw new IbgeException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
