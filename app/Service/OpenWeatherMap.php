<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class OpenWeatherMap
{
    protected $key ;
    protected $baseUrl = 'http://api.openweathermap.org/data/2.5';

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function currentWeather($city)
    {
        $response =  Http::baseUrl($this->baseUrl)
            ->get('weather', [
                'q' => $city,
                'appid' => $this->key,
                'units' => 'metric' ,
                'lang' =>'ar',

            ])->json(); //return array

        return $response ;
    }
}
