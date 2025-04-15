<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('weather.api_key');
        $this->baseUrl = config('weather.base_url');
    }

    public function getCurrentWeather($city, $country = null, $units = 'metric')
    {
        $query = $city;
        if ($country) {
            $query .= ',' . $country;
        }

        $response = Http::get($this->baseUrl . 'weather', [
            'q' => $query,
            'appid' => $this->apiKey,
            'units' => $units,
            'lang' => 'es' // Para obtener respuestas en español
        ]);

        return $response->json();
    }

    public function getWeatherByCoords(float $lat, float $lon, $units = 'metric')
    {
        $response = Http::get($this->baseUrl . 'weather', [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $this->apiKey,
            'units' => $units,
            'lang' => 'es'
        ]);

        return $response->json();
    }

    // Puedes añadir más métodos para otras funcionalidades de la API
}