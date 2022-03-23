<?php

namespace App\Components\Ibge\Contracts;

interface IbgeInterface
{

    /**
     * @return array
     */
    public function cnae(
    ): array;
}
