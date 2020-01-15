<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;

class ForecastEndpointsFailureTest extends TestCase
{
    private function factory()
    {
        $response = $this->get('/api/forecast/asdasd');

        return $response;
    }

    public function testRead400()
    {
        $result = $this->factory();

        $result->assertStatus(400);
    }

    public function testReadMessage()
    {
        $result = $this->factory();

        $result->assertSeeText('Unable to retrieve forecast data for city asdasd.');
    }
}
