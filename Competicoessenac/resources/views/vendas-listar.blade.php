@extends('layouts.app')

@section('container')

<div class="conatiner_text">
    <h3 class="my-5">Mapa de Assentos: {{ $evento->name}}</h3>
 
</div>

<div class="container_mapa">
    <div class="map-header">
        Setores do Evento
    </div>
    <div class="conatiner_body_ingresso">
        <div class="map-body">

            <div class="palco">Palco</div>
            @foreach ($evento->setores as $setor)
                <div class="map-setor">
                    <h5>{{ $setor->name }}</h5>
    
                    <div class="setor-cadeiras">
                        {{-- Divide as cadeiras em blocos de 10 --}}
                        @php
                            $cadeiras = $setor->cadeiras->chunk($setor->quantidade_cadeiras);
                        @endphp
    
                        @foreach ($cadeiras as $fileira)
                            <div class="fileiras-cadeira">
                                @foreach ($fileira as $cadeira)
                                    <div class="map-cadeira">
                                        {{-- Status da cadeira --}}
                                        @if ($cadeira->status === 'D')
                                            <div class="map-cadeira-livre">
                                                <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
                                            </div>
                                        @else
                                            <div class="map-cadeira-ocupada">
                                                <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="checkout-lateral">
            <div class="checkout-lateral-header">
                <div class="res-venda">Resumo Venda</div>
                <a class="res-venda">+ Cadastrar Cliente</a>
            </div>
            <div class="checkout-lateral-body">
                <div class="ingreso-escolhido">
                    <div class="ingresso-left">

                        <div class="number-escolhido">Cadeira N° 1</div>

                    </div>
                    <div class="ingresso-right">
                        <div class="conatiner_search">
                            <input type="search" name="" id="" placeholder="Pesquisar usuarios...">
                            <button> <i class="fa-solid fa-magnifying-glass"></i>
                            
                            </button>
                        </div>

                        <select class="select-pessoas" name="state">
                            @foreach ($usuariosTotal as $usuarios)
                                <option value="">Usuarios</option>
                                <option value="{{$usuarios->id}}">{{$usuarios->name}} {{$usuarios->lastname}}</option>
                                
                            @endforeach
                          </select>


                    </div>
                </div>
                
            </div>
            <div class="checkout-lateral-footer">
                <div class="shape"></div>
                <div class="total-ingresos">
                    Total de Ingressos 
                    <span>5</span>
                </div>
            </div>
   
        </div>

    </div>
    <div class="container_ingresso">

        

    </div>
    

    

    <div class="map-footer">
        <p>Legenda: Livre / Ocupado</p>
    </div>
</div>

@endsection





{{-- 
@foreach ($setor->cadeiras as $cadeira)

@if ($cadeira->status  === 'D')
    <div class="map-cadeira-d">
        <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
    </div>  
    

@else
    <div class="map-cadeira-nd">
        <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
    </div>  
@endif


 @endforeach
 --}}


