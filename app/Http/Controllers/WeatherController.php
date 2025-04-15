<?php 

namespace App\Http\Controllers;

use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function show($city)
    {
        $weatherData = $this->weatherService->getCurrentWeather($city);
        return [
            "data" => $weatherData
        ];
        //return view('weather.show', compact('weatherData'));
    }

    // Por coordenadas
    public function showByCoords($lat, $lon)
    {   
        $lat = $lat?? "6.2442";
        $lon = $lon?? "75.5812";

        $weatherData = $this->weatherService->getWeatherByCoords($lat, $lon);
        
        return [
            "data" => $weatherData
        ];
        //return view('weather.show', compact('weatherData'));
    }
}