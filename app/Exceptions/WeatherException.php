<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

use Throwable;

class WeatherException extends HttpException
{
    public function __construct(int $statusCode = 400, string $message = 'Unable to retrieve forecast data.')
    {
        parent::__construct($statusCode, $message);
    }
}
