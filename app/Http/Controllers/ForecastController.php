<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\Contracts\WeatherRepository;

class ForecastController extends BaseController
{
    protected $weatherRepository;

    public function __construct(WeatherRepository $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    public function show(string $city)
    {
        $forecast = $this->weatherRepository->showForecast($city);

        return response()
            ->json($forecast);
    }
}
