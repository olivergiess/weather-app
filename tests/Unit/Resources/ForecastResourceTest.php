<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;

use App\Http\Resources\ForecastResource;

class ForecastResourceTest extends TestCase
{
    private function factory()
    {
        $data = (object)[
          'temp' => 23,
          'low_temp' => 21.2,
          'high_temp' => 25.3,
          'datetime' => '2019-01-01',
          'weather' => (object)[
              'description' => 'Overcast clouds'
          ]
        ];

        $resource = ForecastResource::make($data);

        return $resource->resolve();
    }

    public function testResultIsArray()
    {
        $result = $this->factory();

        $this->assertIsArray($result);
    }

    public function testResultHasDay()
    {
        $result = $this->factory();

        $this->assertArrayHasKey('day', $result);
    }

    public function testResultHasAvg()
    {
        $result = $this->factory();

        $this->assertArrayHasKey('avg', $result);
    }

    public function testResultHasLow()
    {
        $result = $this->factory();

        $this->assertArrayHasKey('low', $result);
    }

    public function testResultHasHigh()
    {
        $result = $this->factory();

        $this->assertArrayHasKey('high', $result);
    }

    public function testResultHasStatus()
    {
        $result = $this->factory();

        $this->assertArrayHasKey('status', $result);
    }
}
