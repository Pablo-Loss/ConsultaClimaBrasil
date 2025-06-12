<?php

namespace App\Http\Requests\Adapters;

use App\Http\Requests\DTOs\ClimateDTO;
use Illuminate\Http\Client\Response;
use Log;

final class WeatherToClimaAdapter {

    /**
     * @param mixed $weather
     * @return ClimateDTO
     */
    public static function Adapt(Response $climaResponse) {
        $weather = $climaResponse->object();
        $climate = new ClimateDTO;
        $climate->cidade = $weather->location->name;
        $climate->data_hora_pesquisa = $weather->location->localtime . ":00";
        $climate->temperatura = $weather->current->temperature;
        $climate->visibilidade = $weather->current->visibility;
        $iconeTempo = !empty($weather->current->iconeTempo->weather_icons) ? $weather->current->iconeTempo->weather_icons : "";
        $climate->iconeTempo = $iconeTempo;
        $climate->velocidade_vento = $weather->current->wind_speed;
        $climate->cobertura_nuvens = $weather->current->cloudcover;
        $climate->sensacao = $weather->current->feelslike;
        $climate->precipitacao = $weather->current->precip;
        $climate->pressao = $weather->current->pressure;
        $climate->umidade = $weather->current->humidity;
        return $climate;
    }

}
