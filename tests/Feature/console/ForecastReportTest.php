<?php

namespace Tests\Unit\Repositories;

use Tests\TestCase;

use Illuminate\Support\Facades\Artisan;

class ForecastReportTest extends TestCase
{
    private function factory(string $cities)
    {
        Artisan::call('forecast', ['cities' => $cities]);

        $output = Artisan::output();

        return $output;
    }

    public function testContainsCityName()
    {
        $output = $this->factory('Brisbane');

        $this->assertStringContainsString( 'Brisbane', $output);
    }

    public function testMultipleCities()
    {
        $output = $this->factory('Brisbane, Gold Coast');

        $this->assertStringContainsString( 'Gold Coast', $output);
    }
}
