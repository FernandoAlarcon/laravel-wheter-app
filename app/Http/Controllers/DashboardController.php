<?php

namespace App\Http\Controllers;

use App\Services\WeatherService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        try {
            $lat = $request->input('lat', 6.2442);
            $lon = $request->input('lon', -75.5812);
            
            $weatherData = $this->weatherService->getWeatherByCoords($lat, $lon);
            
            if (!isset($weatherData['weather'])) {
                throw new \Exception('La API devolvió datos incompletos');
            }
            
            return view('dashboard', ['weather' => $weatherData]);
            
        } catch (\Exception $e) { 
            return view('dashboard', [
                'weather' => null,
                'error' => 'Error al obtener datos del clima: '.$e->getMessage()
            ]);
        }
    }
    
    

    
}