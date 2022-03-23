<?php

namespace App\Components\Irs\Contracts;

interface IrsInterface
{

    /**
     * @param int $cnpj
     * @return Object
     */
    public function irs(
        int $cnpj
    ): Object;
}
