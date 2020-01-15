<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;

use Throwable;

class WeatherException extends HttpException
{
    public function __construct(string $city, int $statusCode = 400)
    {
        $message = 'Unable to retrieve forecast data for city '.$city.'.';

        parent::__construct($statusCode, $message);
    }
}
