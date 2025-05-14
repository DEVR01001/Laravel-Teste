@extends('layouts.app')



@section('container')
    


    <div class="conatiner_text">
        <h3 class="my-5">Mapa Assentos</h3>
        <a href="/UsuariosCadastrar" >Cadastrar Cliente</a>

    </div>

    <div class="container_mapa">
        <div class="map-header">
            Nome Evento
        </div>
        <div class="map-body">

            {{dd($setores)}}

            @foreach ($setores as $setor) 

                <div class="map-setor">{{}}</div>

            @endforeach

        </div>
        
        <div class="map-footer">

        </div>

    </div>


 
@endsection

    {{-- @foreach ($cadeiras as $cadeira)
                        <div class="map-cadeira">
                            <span class="number-cadeira">{{$cadeira->number_cadeira}}</span>
                        </div>
                @endforeach --}}
            