 
##  Weather Dashboard - Laravel App
 
This is a simple Laravel-based application built for testing purposes. It demonstrates how to consume external APIs in real-time—in this case, the OpenWeatherMap API—to retrieve and display live weather data based on geographic coordinates.

##  Features

Retrieves real-time weather data using latitude and longitude

Uses OpenWeatherMap API with configurable units and language (Spanish)

Responsive and modern UI built with Laravel Blade components and Tailwind CSS

Displays temperature, weather conditions, humidity, pressure, and wind speed

Graceful error handling and retry mechanism if the API fails

## Tech Stack


Laravel 10+

PHP 8.1+

Tailwind CSS

OpenWeatherMap API

Laravel HTTP Client (Http::get())

## How to Run
Clone the repository:

<pre> bash git clone https://github.com/yourusername/weather-dashboard.git ---
 cd weather-dashboard
  </pre>

## Install dependencies:
<pre> bash
    
composer install
npm install && npm run dev
    
     </pre>

## Copy .env and add your OpenWeatherMap API key:
cp .env.example .env
OPENWEATHER_API_KEY=your_api_key_here

## Run the app:

<pre> bash
php artisan serve
    </pre>

Visit: http://localhost:8000/dashboard

![image](https://github.com/user-attachments/assets/7bb81439-7ec7-45e4-b984-4046abf023ab)

