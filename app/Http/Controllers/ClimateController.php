<?php

namespace App\Http\Controllers;

use App\Http\Requests\Adapters\WeatherToClimaAdapter;
use App\Models\Climate;
use Illuminate\Http\Request;
use Log;

class ClimateController extends Controller
{
    public function index() {
        return view('climate.index');
    }

    public function visualize(Request $request) {
        $cidade = $request->input('cidade');
        $weatherController = new WeatherController();
        $response = $weatherController->getCurrentWeather($cidade);

        if ($response->successful()) {
            $climateDTO = WeatherToClimaAdapter::Adapt($response);
            $climate = new Climate();
            $climate->fill((array) $climateDTO);
            return view('climate.visualize')
                ->with('climate', $climate);
        } else {
            return back()
                ->withInput()
                ->with('mensagemErro', "Erro ao consultar o clima de $cidade");
        }
    }

    public function create(Request $request) {
        $climate = $request->input('climate');
        Climate::create($climate);
        return response()->json(["msgResult" => "Dados salvos com sucesso!"]);
    }
}
