<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Client\Response;
use App\Http\Requests\Arguments\GetCurrentWeather;

class WeatherController extends Controller
{
    
    const ACCESS_KEY = "8433524a922c9c56b121b463bdb55973";
    
    private string $baseURL = "http://api.weatherstack.com";
    
    /**
     * @param mixed $cidade
     * @return Response
     */
    public function getCurrentWeather($cidade) {
        $url = $this->baseURL . "/current?";
        $getCurrentWeatherArgs = new GetCurrentWeather($cidade, self::ACCESS_KEY);
        $this->AddRequestParameters($url, $getCurrentWeatherArgs);
        $response = Http::get($url);
        return $response;
    }

    private function AddRequestParameters(&$url, GetCurrentWeather $getCurrentWeatherArgs) {
        $parameters = [];
        foreach ($getCurrentWeatherArgs as $key => $value) {
            $parameters[] = "$key=$value";
        }
        $url .= implode("&", $parameters);
    }
}
