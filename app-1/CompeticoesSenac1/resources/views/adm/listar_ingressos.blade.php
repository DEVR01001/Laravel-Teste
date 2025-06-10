@extends('layout.app')



@section('navbar')

<div class="nav-container-mobile">
    <ul>
        <li><i class="fa-solid fa-users"></i><a href="{{ route('user.index') }}">Usuários</a></li>
        <li><i class="fa-solid fa-calendar-days"></i><a href="{{ route('event.index') }}">Eventos</a></li>
        <li><i class="fa-solid fa-ticket"></i><a href="{{ route('ticket.index') }}">Ingressos</a></li>
        <li><i class="fa-solid fa-database"></i><a href="#">Relatórios</a></li>
    </ul>
</div>

<header class="header">
           

    <div class="conatiner_logo">
        <img src="{{ asset('images/Objeto Inteligente de Vetor.png') }}" alt="Logo da empresa">
    </div>

    <ul>
        <a href="{{route('user.index')}}">Usuários</a>
        <a href="{{ route('event.index') }}">Eventos</a>
        <a href="{{route('ticket.index')}}">Ingressos</a>
        <a href="">Relatórios</a>
    </ul>

    <div class="conatiner_logout">
        <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sair</a>

    </div>

</header>

@endsection



@section('container')


    <div class="container_title">
        <div class="conatiner_text">
            <i class="fa-solid fa-chevron-left "></i>
            <h1 class="title-dashbord">Ingressos</h1>
        </div>
    </div>

    <section class="conatiner-dados">
        <div class="card-dados">
            <p>Quantidade de Ingressos</p>
            <span>30</span>
        </div>
        <div class="card-dados">
            <p>Quantidade de Ingressos Disponiveis</p>
            <span>30</span>
        </div>
        <div class="card-dados">
            <p>Quantidade de Ingressos Usados</p>
            <span>30</span>
        </div>
        

    </section>

    <section class="conatiner-search">
        <input type="search" id='serch-item'>
        <button><i class="fa-solid fa-magnifying-glass"></i></button>

    </section>

    <section class="container my-5">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">N° Ingresso</th>
                    <th scope="col">Nome Cliente</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Status Ingresso</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>34</td>
                    <td>Rafael Rodrigues</td>
                    <td>343453</td>
                    <td>Usado</td>
                    <td>
                        <div class="container-icon d-flex gap-2">
                            <i class="fa-solid fa-gear text-secondary cursor-pointer"></i>
                            <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                        </div>
                    </td>
                </tr>
                

            </tbody>
        </table>
    </section>
    
@endsection





