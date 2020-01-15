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
        try
        {
            $result = $this->request('GET', 'forecast/daily', [
                'days' => $days,
                'city' => $city,
                'country' => 'AU'
            ]);
        }
        catch (\Exception $e)
        {
            throw new WeatherException($city);
        }

        if(is_null($result))
        {
            throw new WeatherException($city);
        }

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
