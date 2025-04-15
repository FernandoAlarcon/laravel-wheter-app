<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Widget del Clima -->
                    <div class="weather-widget bg-blue-50 dark:bg-gray-700 p-4 rounded-lg mb-6">
                        @if(isset($weather) && isset($weather['weather']))
                            <h3 class="text-lg font-semibold mb-2">Clima en {{ $weather['name'] ?? 'Medellín' }}</h3>
                            <div class="flex items-center">
                                <div class="mr-4">
                                    <img src="https://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon'] }}@2x.png" 
                                         alt="{{ $weather['weather'][0]['description'] }}" 
                                         class="w-16 h-16">
                                </div>
                                <div>
                                    <p class="text-3xl font-bold">{{ round($weather['main']['temp']) }}°C</p>
                                    <p class="capitalize">{{ $weather['weather'][0]['description'] }}</p>
                                    <p class="text-sm mt-1">
                                        Sensación térmica: {{ round($weather['main']['feels_like']) }}°C | 
                                        Humedad: {{ $weather['main']['humidity'] }}%
                                    </p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mt-4 text-sm">
                                <div>
                                    <p><span class="font-medium">Mínima:</span> {{ round($weather['main']['temp_min']) }}°C</p>
                                    <p><span class="font-medium">Máxima:</span> {{ round($weather['main']['temp_max']) }}°C</p>
                                </div>
                                <div>
                                    <p><span class="font-medium">Viento:</span> {{ $weather['wind']['speed'] }} m/s</p>
                                    <p><span class="font-medium">Presión:</span> {{ $weather['main']['pressure'] }} hPa</p>
                                </div>
                            </div>
                        @else
                            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
                                <p class="font-medium">No se pudieron cargar los datos del clima</p>
                                @isset($error)
                                    <p class="text-sm mt-1">{{ $error }}</p>
                                @endisset
                                <p class="text-sm mt-2">Por favor verifica:</p>
                                <ul class="list-disc list-inside text-sm pl-2">
                                    <li>La conexión a internet</li>
                                    <li>La configuración de la API</li>
                                    <li>Los logs del servidor</li>
                                </ul>
                                <button onclick="window.location.reload()" class="mt-2 px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 text-sm">
                                    Reintentar
                                </button>
                            </div>
                        @endif
                    </div>

                    <!-- Resto de tu contenido -->
                    <div>
                        <!-- Tu contenido adicional aquí -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .weather-widget {
        border-left: 4px solid #3b82f6;
        transition: all 0.3s ease;
    }
    .weather-widget:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .dark .weather-widget {
        border-left-color: #1d4ed8;
    }
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Función para manejar errores persistentes
    const errorElement = document.querySelector('.weather-widget .bg-red-100');
    if (errorElement) {
        setTimeout(() => {
            errorElement.querySelector('button').classList.remove('hidden');
        }, 3000);
    }
});
</script>
@endpush