<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use Carbon\Carbon;

class ForecastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'day' => $this->getDay(),
            'avg' => $this->temp,
            'low' => $this->low_temp,
            'high' => $this->high_temp,
            'weather' => $this->getWeather()
        ];
    }

    private function getDay()
    {
        $date = new Carbon($this->datetime);

        return $date->format('l');
    }

    private function getWeather()
    {
        return ucwords($this->weather->description)
    }
}
