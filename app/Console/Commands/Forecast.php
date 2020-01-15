<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Contracts\WeatherRepository;
use Carbon\Carbon;
use App\Exceptions\WeatherException;

class Forecast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forecast 
                            {cities : Comma delimited list of Cities. \'}
                            {days=5 : Number of days to retrieve for. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a report of the 5 day Forecast for a comma delimited list of cities.';

    protected $repository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(WeatherRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $headers = $this->getHeaders();
        $rows = $this->getRows();

        $this->table($headers, $rows);
    }

    private function getHeaders() : array
    {
        $days = $this->argument('days');

        $today = new Carbon();

        $headers = [
          'City'
        ];

        for($i = 1; $i <= $days; $i++)
        {
            $headers[] = $today->add(1, 'day')->format('l');
        }

        return $headers;
    }

    private function getRows() : array
    {
        $cities = explode(',', $this->argument('cities'));
        $days = $this->argument('days');

        $rows = [];

        foreach($cities as $city)
        {
            $city = trim($city);

            try
            {
                $forecast = $this->repository->showForecast($city, $days)->resolve();
            }
            catch (WeatherException $e)
            {
                $this->error($e->getMessage());
                die;
            }

            $rows[] = array_merge([$city], array_column($forecast, 'status'));
        }

        return $rows;
    }
}
