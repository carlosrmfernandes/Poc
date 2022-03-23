<?php
namespace App\Components\Irs;
use Exception;
use App\Components\Irs\Contracts\IrsInterface;
use App\Components\Irs\Exceptions\IrsException;

class Client
{
    /**
     * @var irsInterface
     */
    protected $irsInterface;

    /**
     * Client constructor.
     * @param IrsInterface $irsInterface
     */
    public function __construct(IrsInterface $irsInterface)
    {
        $this->irsInterface = $irsInterface;
    }

    /**
     * @param int $cnpj
     * @return Object
     * @throws IrsException
     */
    public function irs(
        int $cnpj
    ): Object {
        try {
            return $this->irsInterface->irs(
                $cnpj
            );
        } catch (Exception $exception) {
            throw new IrsException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
