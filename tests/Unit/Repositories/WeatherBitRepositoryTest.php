<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;

class WeatherBitRepositoryTest extends TestCase
{
    private function factory(string $city)
    {
        $repository = new \App\Repositories\WeatherBitRepository();

        return $repository->showForecast($city);
    }

    public function testSuccessfulShowForecastReturnsForecastCollection()
    {
        $result = $this->factory('Brisbane');

        $this->assertInstanceOf(\App\Http\Resources\ForecastCollection::class, $result);
    }

    public function testFailedShowForecastThrowsWeatherException()
    {
        $this->expectException(\App\Exceptions\WeatherException::class);

        $this->factory('');
    }

    public function testFailedShowForecastExceptionMessageHasCityName()
    {
        $this->expectExceptionMessage('Unable to retrieve forecast data for city TEST');

        $this->factory('TEST');
    }
}
