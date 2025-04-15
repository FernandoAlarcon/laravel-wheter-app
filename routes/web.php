<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\DashboardController;

Route::view('/', 'welcome');

Route::get('dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard'); 
    
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/weather/{city}', [WeatherController::class, 'show']);
// Por coordenadas
Route::get('/weathers/coords/{lat}/{lon}', [WeatherController::class, 'showByCoords']); 

Route::get('/weather/coords/{lat}/{lon}', function ($lat, $lon) {
    try {
        $weatherData = app(\App\Services\WeatherService::class)->getWeatherByCoords($lat, $lon);
        
        return response()->json([
            'data' => $weatherData
        ]);
        
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}); 

require __DIR__.'/auth.php';
