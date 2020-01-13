<?php

namespace App\Repositories;

use App\Contracts\WeatherRepository;
use App\Exceptions\WeatherException;
use App\Http\Resources\ForecastCollection;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class WeatherBitRepository implements WeatherRepository
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.weatherbit.io/v2.0/'
        ]);
    }

    public function showForecast(string $city, int $days = 5)
    {
        $result = $this->request('GET', 'forecast/daily', [
            'days' => $days,
            'city' => $city,
            'country' => 'AU'
        ]);

        $collection = new ForecastCollection($result->data);

        return $collection;
    }

    private function request(string $method, string $uri, array $params = []) : object
    {
        $queryParams = $this->mergeParams($params);

        $response = $this->client->request($method, $uri, [
            'query' => $queryParams
        ]);

        $this->handleErrors($response);

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

    private function handleErrors(Response $response) : void
    {
        $allowedStatuses = [
            200
        ];

        $statusCode = $response->getStatusCode();

        if(!in_array($statusCode, $allowedStatuses))
        {
            throw new WeatherException();
        }
    }
}
