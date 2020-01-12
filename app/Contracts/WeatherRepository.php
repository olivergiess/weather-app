<?php

namespace App\Contracts;

interface WeatherRepository
{
    public function showThirtyDayForecast(string $city);
}
