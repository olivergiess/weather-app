<?php

namespace App\Repositories;

use App\Contracts\WeatherRepository;
use App\Http\Resources\ForecastCollection;
use App\Http\Resources\ForecastResource;
use GuzzleHttp\Client;

class OpenWeatherRepository implements WeatherRepository
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.weatherbit.io/v2.0/'
        ]);
    }

    public function showThirtyDayForecast(string $city)
    {
        $result = $this->request('GET', 'forecast/daily', [
            'days' => 5,
            'city' => $city,
            'country' => 'AU'
        ]);

        $collection = new ForecastCollection($result->data);

        return $collection;
    }

    private function request(string $method, string $uri, array $params = [])
    {
        $queryParams = $this->mergeParams($params);

        $response = $this->client->request($method, $uri, [
            'query' => $queryParams
        ]);

        $result = json_decode($response->getBody());

        return $result;
    }

    private function mergeParams(array $params) : array
    {
        return array_merge($params, [
            'key' => env('WEATHERBIT_API_KEY'),
            'units' => env('WEATHERBIT_API_UNITS')
        ]);
    }
}
