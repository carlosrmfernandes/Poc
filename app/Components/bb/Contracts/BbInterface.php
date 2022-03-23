<?php

namespace App\Components\bb\Contracts;

interface BbInterface
{

     /**
     * @param array data
     * @return Object
     */
    public function bb(
        array $data
    ): Object;
}
