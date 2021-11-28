<?php

namespace App\View\Components;

use App\Service\OpenWeatherMap;
use Illuminate\View\Component;

class Weather extends Component
{
    public $weather ;
    public $city;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->city = 'GAZA';
        $weatherApi = new OpenWeatherMap(config('services.OpenWeatherMap.key'));
        $this->weather = $weatherApi->currentWeather($this->city);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.weather');
    }
}
