<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;

class ForecastEndpointsSuccessfulTest extends TestCase
{
    private function factory()
    {
        $response = $this->get('/api/forecast/Brisbane');

        return $response;
    }

    public function testReadOk()
    {
        $result = $this->factory();

        $result->assertOk();
    }

    public function testReadResponseHasAvg()
    {
        $result = $this->factory();

        $result->assertJson([['avg' => true]]);
    }

    public function testReadResponseHasLow()
    {
        $result = $this->factory();

        $result->assertJson([['low' => true]]);
    }

    public function testReadResponseHasHigh()
    {
        $result = $this->factory();

        $result->assertJson([['high' => true]]);
    }

    public function testReadResponseHasStatus()
    {
        $result = $this->factory();

        $result->assertJson([['status' => true]]);
    }
}
