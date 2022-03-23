<?php
namespace App\Components\bb;
use Exception;
use App\Components\bb\Contracts\BbInterface;
use App\Components\bb\Exceptions\BbException;

class Client
{
    /**
     * @var bbInterface
     */
    protected $bbInterface;

    /**
     * Client constructor.
     * @param BbInterface $bbInterface
     */
    public function __construct(BbInterface $bbInterface)
    {
        $this->bbInterface = $bbInterface;
    }

     /**
     * @param array data
     * @return Object
     * @throws Exception
     */
    public function bb(
        array $data
    ): Object {
        try {
            return $this->bbInterface->bb(
                $data
            );
        } catch (Exception $exception) {
            throw new BbException(
                $exception->getMessage(),
                $exception->getCode()
            );
        }
    }
}
