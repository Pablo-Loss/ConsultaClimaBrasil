@extends('layouts.app')

@section('title', 'Consultar Clima')

@section('content')
    <div class="py-6">
        <p class="h1">Consulte a Cidade Desejada</p>
    </div>
    <form action="{{ route('climate.visualize.result') }}" method="post" class="py-6">
        @csrf
        <div class="form-floating mb-3">
            <input type="text"
                class="form-control"
                id="cep"
                name="cep"
                placeholder="99.999-999"
                value="{{ old('cep') }}"
            >
            <label for="floatingInput">CEP</label>
        </div>
        <div class="form-floating">
            <input type="text" 
                class="form-control"
                id="cidade"
                name="cidade"
                placeholder="São Paulo"
                readonly="readonly"
                value="{{ old('cidade') }}"
            >
            <label for="floatingPassword">Cidade</label>
        </div>
        <button type="submit" class="btn btn-primary btn-lg" id="consultar">Consultar</button>
    </form>
    <script src="{{ asset('js/index.js') }}"></script>
    <link rel="stylesheet" href=" {{ asset('css/index.css') }}">

    @if(session('mensagemErro'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                mostrarErro(@json(session('mensagemErro')))
            })
        </script>
    @else
        <script>
            clearFields()
        </script>
    @endif
@endsection