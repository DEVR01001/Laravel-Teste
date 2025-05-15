@extends('layouts.app')

@section('container')

<div class="conatiner_text">
    <h3 class="my-5">Mapa de Assentos: {{ $evento->name }}</h3>
    <a href="/UsuariosCadastrar">Cadastrar Cliente</a>
</div>

<div class="container_mapa">
    <div class="map-header">
        Setores do Evento
    </div>

    <div class="map-body">
        @foreach ($evento->setores as $setor)
            <div class="map-setor">
                <h5>{{ $setor->name }}</h5>

                <div class="setor-cadeiras">
                    @for ($i = 0; $i < $setor->quantidade_fileiras; $i++)
                        <div class="fileiras-cadeira">
                            
                            @for ($j = 0; $j < $setor->quantidade_cadeiras; $j++)
                                <div class="map">

                                    {{-- Exibindo cadeiras baseado no status --}}
                                    @foreach ($setor->cadeiras as $cadeira)
                                        @if ($cadeira->status === 'D')
                                            <div class="map-cadeira-d">
                                                <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
                                            </div>  
                                        @else
                                            <div class="map-cadeira-nd">
                                                <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
                                            </div>  
                                        @endif
                                    @endforeach

                                </div>
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>
        @endforeach
    </div>

    <div class="map-footer">
        <p>Legenda: Livre / Ocupado</p>
    </div>
</div>

@endsection
