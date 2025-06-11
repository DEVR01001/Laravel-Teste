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
            <h1 class="title-dashbord">Eventos</h1>
        </div>
        <a class="conatiner-btn-cad openModalBtn" href="#" data-id="event" >Cadastrar Eventos</a>
    </div>

    <section class="conatiner-dados">
        <div class="card-dados">
            <p>Quantidade de Eventos</p>
            <span>{{$quantEventos }}</span>
        </div>
        

    </section>

    <section class="conatiner-search">
        <input type="search" id='serch-item'>
        <button><i class="fa-solid fa-magnifying-glass"></i></button>

    </section>

    <section class="container my-5">

        <table class="table coantiner-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Evento</th>
                    <th scope="col">Capacidade Pessoas</th>
                    <th scope="col">Cep</th>
                    <th scope="col">Ver Setores</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($events as $event)
                <tr>
                    <th scope="row">{{$event->id}}</th>
                    <td>{{$event->name}}</td>
                    <td>{{$event->capacidade_pessoas}}</td>
                    <td>{{$event->cep}}</td>
                    <td >
                        <a href="{{route('sector.show', $event->id)}}" ><i class=" fa-solid fa-bookmark text-primary"></i></a>
                    </td>
                    <td>
                        <div class="container-icon d-flex gap-2">
                            <a  class="openModalBtn" href="#" data-id="{{$event->id}}" > <i class="fa-solid fa-gear text-secondary cursor-pointer"></i></a>
                            <form action="{{ route('event.destroy', $event->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" style="border: none; background: none; padding: 0;" onclick="return confirm('Tem certeza que deseja excluir este evento?')">
                                    <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                </button>
                            </form>
                            
                        </div>
                    </td>
                </tr>

                
          
                <div id="myModal{{$event->id}}" class="custom-modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p class="title-form">Editar Evento</p>
                        <form enctype="multipart/form-data"
                         class="form-modal" method="post" action="{{route('event.update', $event->id)}}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Nome</label>
                                        <input name="name" class="form-control" type="text" value="{{$event->name}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Data</label>
                                        <input name="date_event" class="form-control" type="date" value="{{$event->date_event}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Bairro</label>
                                        <input name="neighborhood"  class="form-control" type="text" value="{{$event->neighborhood}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Hora</label>
                                        <input name="time_event"  class="form-control" type="time" value="{{$event->time_event}}">
                                    </div>
                                </div>
                                
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Capacidade de Pessoas</label>
                                        <input name="capacidade_pessoas"  id="input-md" class="form-control" type="number" value="{{$event->capacidade_pessoas}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Cidade</label>
                                        <input name="city"  class="form-control" type="text" value="{{$event->city}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Cep</label>
                                        <input id='input-sm' name="cep" class="form-control" type="text" value="{{$event->cep}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">N°</label>
                                        <input id='input-sm' name="number"  class="form-control" type="text" value="{{$event->number}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Rua</label>
                                        <input name="street" class="form-control" type="text" value="{{$event->street}}">
                                    </div>
                                </div>
                                <div class="col-6 coluna-form-modal">
                                    <div class="flex-input">
                                        <label for="">Logo</label>
                                        <input class="form-control" name="logo" type="file" value="{{$event->logo}}">
                                    </div>
                                </div>
                            </div>
                            <div class="container_btn_form">
                            
                                <button type="button">Cancelar</button>
                                <button type="submit">Editar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>

                    
                    
                @endforeach
              

            </tbody>
        </table>
    </section>
    
@endsection








@section('container-modal')


<div id="myModalevent" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Evento</p>
        <form enctype="multipart/form-data"
         class="form-modal" method="post" action="{{route('event.store')}}">
            @csrf
            @method('POST')

            <div class="row">
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Nome</label>
                        <input name="name" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Data</label>
                        <input name="date_event" class="form-control" type="date">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Bairro</label>
                        <input name="neighborhood"  class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Hora</label>
                        <input name="time_event"  class="form-control" type="time">
                    </div>
                </div>
                
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Capacidade de Pessoas</label>
                        <input name="capacidade_pessoas"  id="input-md" class="form-control" type="number">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Cidade</label>
                        <input name="city"  class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Cep</label>
                        <input id='input-sm' name="cep" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">N°</label>
                        <input id='input-sm' name="number"  class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Rua</label>
                        <input name="street" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Logo</label>
                        <input class="form-control" name="logo" type="file" >
                    </div>
                </div>
            </div>
            <div class="container_btn_form">
              
                <button type="button">Cancelar</button>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        
    </div>
</div>

        
@endsection



<script>



    window.onload = function(){

        $(document).on('change', '#serch-item', function () {

        let searchevent = $(this).val();

        $.ajax({
            url: `api/event/search?search=${searchevent}`,
            method: 'GET',
        }).done(function (res) {

            let tableBody = document.querySelector(".coantiner-table tbody");

            tableBody.innerHTML = "";

            res.events.forEach(event => {
                tableBody.innerHTML += `
                    <tr>
                        <th scope="row">${event.id}</th>
                        <td>${event.name}</td>
                        <td>${event.capacidade_pessoas}</td>
                        <td>${event.cep}</td>
                        <td>
                            <a href="/sector/${event.id}"><i class="fa-solid fa-bookmark text-primary"></i></a>
                        </td>
                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a class="openModalBtn" href="#" data-id="${event.id}">
                                    <i class="fa-solid fa-gear text-secondary cursor-pointer"></i>
                                </a>
                                <form action="/event/${event.id}" method="POST" style="display:inline;">
                                    <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este evento?')" style="border:none; background:none; padding:0;">
                                        <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                `;
            });

        });
        });



        $(document).on('click', '.openModalBtn', function(e) {
            e.preventDefault();
            
            const userId = $(this).data('id');
            const modal = document.getElementById(`myModal${userId}`);
            
            if(modal) {
                modal.style.display = 'block';
            }
        });




    };



</script>