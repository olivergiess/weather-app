<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class WeatherController extends BaseController
{
    public function showForm()
    {
        return view('weather.form');
    }
}
