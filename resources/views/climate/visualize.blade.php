@extends('layouts.app')

@section('title', 'Visualizar Clima')

@section('content')
    
    <div class="py-6">
        <p class="h1" style="display: flex">
        {{ $climate['cidade'] }} &nbsp; <img id="img-climas" src="{{ asset('images/climas.png') }}">
        </p>
    </div>
    <div class="py-6">
        <div class="">
            <div class="row">
                <div class="col-md-2">
                <div class="card" id="card-temperatura">
                    <div class="card-body">
                        <div class="card-title">
                            <div><strong>Temperatura</strong></div>
                            <div><img id="img-temperatura" src="{{ asset('images/temperatura.png') }}"></div>
                        </div>
                        <p id="pTemperatura" class="card-text"><strong>{{ $climate['temperatura'] }}°C</strong></p>
                    </div>
                </div>
                </div>
                <div class="col-md-2">
                <div class="card" id="card-sensacao">
                    <div class="card-body">
                        <div class="card-title">
                            <div><strong>Sensação&nbsp;</strong></div>
                            <div><img id="img-sensacao" src="{{ asset('images/sensacao.png') }}"></div>
                        </div>
                        <p id="pSensacao" class="card-text"><strong>{{ $climate['sensacao'] }}°C</strong></p>
                    </div>
                </div>
                </div>
                <div class="col-md-2">
                <div class="card bg-info">
                    <div class="card-body">
                        <div class="card-title">
                            <div><strong>Vel. Vento&nbsp;</strong></div>
                            <div><img id="img-vel-vento" src="{{ asset('images/vento.png') }}"></div>
                        </div>
                        <p class="card-text"><strong>{{ $climate['velocidade_vento'] }} km/h</strong></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="card" style="width: 49%">
            <div class="card-body">
                <div class="card-title">
                    <div>Umidade&nbsp;</div>
                    <div><img id="img-umidade" src="{{ asset('images/umidade.png') }}"></div>
                </div>
                <div class="progress">
                    <div class="progress-bar"
                        role="progressbar"
                        style="width: {{ $climate['umidade'] }}%"
                        aria-valuenow="60"
                        aria-valuemin="0"
                        aria-valuemax="100">{{ $climate['umidade'] }}%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="card border-dark" style="width: 49%;">
            <div class="card-header border-dark" id="header-info">
                <div><img src="{{ asset('images/info.png') }}" alt=""></div>&nbsp;
                <div><strong>Informações Gerais</strong></div>
            </div>
            <div class="card-body">
                <h5 class="card-title" id="title-infos-gerais"><strong>{{ $climate['cidade'] }} - {{ $climate['temperatura'] }}°C</strong></h5>
                <p class="card-text">
                <strong>Sensação:</strong> {{ $climate['sensacao'] }}°C <br>
                <strong>Velocidade do Vento:</strong> {{ $climate['velocidade_vento'] }} km/h <br>
                <strong>Umidade:</strong> {{ $climate['umidade'] }}% <br>
                <strong>Visibilidade:</strong> {{ $climate['visibilidade'] }} <br>
                <strong>Cobertura das Nuvens:</strong> {{ $climate['cobertura_nuvens'] }} <br>
                <strong>Precipitação:</strong> {{ $climate['precipitacao'] }} <br>
                <strong>Pressão:</strong> {{ $climate['pressao'] }} <br>
                <strong>Data/Hora:</strong> {{ \Carbon\Carbon::parse($climate['data_hora_pesquisa'])->format('d/m/Y H:i') }}
                </p>
            </div>
        </div>
    </div>
    <div class="py-6">
        <button type="button" class="btn btn-primary btn-lg" id="salvar" onclick="getDadosSalvar()">Salvar Dados</button>
        <button type="button" class="btn btn-secondary btn-lg" onclick="redirecionarIndex()">Voltar</button>
    </div>
    <script src="{{ asset('js/visualize.js') }}"></script>
    <link rel="stylesheet" href=" {{ asset('css/visualize.css') }}">
    <script>
       function getDadosSalvar() {
            let climateData = @json($climate);
            let csrf = '{{ csrf_token() }}';
            saveClimate(climateData, csrf);
        }
    </script>
@endsection