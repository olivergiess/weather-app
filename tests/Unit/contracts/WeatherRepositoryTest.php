<?php

namespace Tests\Unit\Contracts;

use Tests\TestCase;

class WeatherRepositoryTest extends TestCase
{
    private function factory()
    {
        return $this->app->make(\App\Contracts\WeatherRepository::class);
    }

    public function testWeatherRepositoryBoundToWeatherBitRepository()
    {
        $result = $this->factory();

        $this->assertInstanceOf(\App\Repositories\WeatherBitRepository::class, $result);
    }
}
