@extends('layout.app_saller')




@include('saller.navbar-saller')



@section('container-user')

    <section>

        <div class="fs-5 m-5">Eventos</div>
        <section class="conatiner-search">
            <input type="text">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </section>
        

        <section class="event-cards">

            @foreach ($eventosSaller as $event)

        
                <div class="card-event">
                    <img src="{{ asset('images/' . $event->logo) }}" alt="">
                    <p>{{$event->name}}</p>
                    <p>{{$event->capacidade_pessoas}}</p>
                    <a href="{{route('sectorSaller.chairsSector', ['id' => $event->id])}}">Ver Evento</a>
                </div>
                    
            @endforeach


        </section>


    </section>
    
@endsection