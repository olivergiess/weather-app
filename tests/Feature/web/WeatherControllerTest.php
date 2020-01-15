<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    private function factory()
    {
        $response = $this->get('/');

        return $response;
    }

    public function testStatusCode200()
    {
        $result = $this->factory();

        $result->assertStatus(200);
    }
}
