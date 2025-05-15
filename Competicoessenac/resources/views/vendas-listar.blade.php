@extends('layouts.app')

@section('container')

    <div class="conatiner_text">
        <h3 class="my-5">Mapa de Assentos: {{ $evento->nome }}</h3>
        <a href="/UsuariosCadastrar">Cadastrar Cliente</a>
    </div>

    <div class="container_mapa">
        <div class="map-header">
            Setores do Evento
        </div>

        <div class="map-body">
            @foreach ($evento->setores as $setor)
                <div class="map-setor">
                    <h5>{{ $setor->nome }}</h5>
                    
                    <div class="setor-cadeiras">
                        @foreach ($setor->cadeiras as $cadeira)
                            <div class="map-cadeira">
                                <span class="number-cadeira">{{ $cadeira->numero }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="map-footer">
            <p>Legenda: Livre / Ocupado</p>
        </div>
    </div>

@endsection
