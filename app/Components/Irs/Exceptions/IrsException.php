<?php

namespace App\Components\Irs\Exceptions;

use Exception;
use Throwable;
use Illuminate\Support\Facades\Log;

class IrsException extends Exception
{
    /**
     * ExampleWeatherException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(
        $message = '',
        $code = 500,
        Throwable $previous = null
    ) {
        Log::error('Irs Error: ' . $message);
        parent::__construct($message, $code, $previous);
    }
}
