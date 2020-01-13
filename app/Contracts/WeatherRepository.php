<?php

namespace App\Contracts;

interface WeatherRepository
{
    public function showForecast(string $city, int $days = 5);
}
