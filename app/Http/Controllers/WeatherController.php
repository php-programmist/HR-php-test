<?php

namespace App\Http\Controllers;

use App\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends SiteController
{
    public function index()
    {
        
        $this->vars['weather'] = WeatherService::getWeather();
        $this->vars['title'] = __('system.weather');
        $this->template      = 'weather';
        
        return $this->renderOutput();
    }
}
