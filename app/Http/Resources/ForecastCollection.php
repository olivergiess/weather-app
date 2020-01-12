<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ForecastCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\ForecastResource';
}
