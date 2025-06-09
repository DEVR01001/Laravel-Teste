@extends('layout.app_saller')





@include('saller.navbar-saller')




@section('container-user')

    <section>

        <div class="fs-5 m-5">{{$event->name}}</div>

        <section class="mapa-setores">
            <div class="palco-map">Palco</div>

            <div class="grid grid-templete-area-1">

                @foreach ($event->sectors as $sector)

                    @if ($sector->level == 'vip')

                        <div class="event-setor vip">
                            <p>{{$sector->name}}</p>
                        </div>

                        
                    @else

                        <div class="event-setor common">
                            <p>{{$sector->name}}</p>
                        </div>
                        
                    @endif

                @endforeach

            </div>
    

        </section>
       

        <section class="event-cards">

            @foreach ($event->sectors as $sector)

                <div class="card-event">
                    <img src="{{asset('images/3.png')}}" alt="">
                    <p>{{$sector->name}}</p>
                    <p>{{$sector->capacidade_pessoas}}</p>
                    <a href="{{route('map.show', $sector->id)}}">Ver Evento</a>
                </div>
                    
            @endforeach


        </section>


    </section>
    
@endsection