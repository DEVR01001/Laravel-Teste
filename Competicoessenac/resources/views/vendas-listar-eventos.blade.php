@extends('layouts.app')



@section('container')
    


    <div class="conatiner_text">
        <h3 class="my-5">Eventos</h3>
    </div>

    <div class="conatiner_eventos">
        
        @foreach ($eventosTotal as $evento)

        <div class="evento-item">
            <img src="" alt="">
            <span class="nome-evento">{{$evento->name}}</span>
            <span class="quant-evento">Capacidade Pessoas: {{$evento->capacidade_pessoas}}</span>
            <a href="{{route('vendas.ingresso', $evento->id)}}">Ingresso</a>
        </div>

            
        @endforeach

    
        
    </div>
    
      
    
   
@endsection