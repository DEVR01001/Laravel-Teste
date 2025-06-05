@extends('layout.app_saller')






@section('saller')

    <nav>
        <ul>
            <a href="eventos-saller">Eventos</a>
            <a href="usuarios-saller">Usuarios</a>
        </ul>
        <ul>
            <a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a>
        </ul>
    </nav>
    
@endsection



@section('container-user')

    <section>

        <div class="fs-5 m-5">Eventos</div>
        <section class="conatiner-search">
            <input type="text">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </section>
        

        <section class="event-cards">

            <div class="card-event">
                <img src="{{asset('images/3.png')}}" alt="">
                <p>Senac Music</p>
                <p>Qut. Assetos Disponiveis: 5000</p>
                <a href="">Ver Evento</a>
            </div>

        </section>


    </section>
    
@endsection