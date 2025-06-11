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
            <h1 class="title-dashbord">{{$event->name}}</h1>
            <input type="hidden" id='eventId' value='{{$event->id}}'>
        </div>
        <a class="conatiner-btn-cad openModalBtn" href="#" data-id="sector">Cadastrar Setores</a>
    </div>

    <section class="conatiner-dados">
        <div class="card-dados">
            <p>Quantidade Setores </p>
            <span>{{$qtdSetores}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade de Assentos Disponiveis </p>
            <span id="quantEventoVisual">{{$qtdAssentosDisponiveis}}</span>
            <input type="hidden" id="quantEventoInput" value="{{$qtdAssentosDisponiveis}}">            
        </div>
        <div class="card-dados">
            <p>Quantidade de Assentos Indisponiveis</p>
            <span>{{$qtdAssentosIndisponiveis}}</span>
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
                    <th scope="col">Nome Setor</th>
                    <th scope="col">Quantidade Cadeiras</th>
                    <th scope="col">Quantidade Fileiras</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ver Cadeiras</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($sectors as $sector)
                    <tr>
                        <th scope="row">{{$sector->id}}</th>
                        <td>{{$sector->name}}</td>
                        <td>{{$sector->quantity_chairs}}</td>
                        <td>{{$sector->quantity_rows}}</td>
                        <td>{{$sector->status}}</td>
                        <td >
                            <a href="{{route('chair.show', $sector->id)}}" ><i class=" fa-solid fa-bookmark text-primary"></i></a>
                        </td>
                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a  class="openModalBtn" href="#" data-id="{{$sector->id}}" > <i class="fa-solid fa-gear text-secondary cursor-pointer"></i></a>
                                <form action="{{ route('sector.destroy', $sector->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
    
                                    <button type="submit" style="border: none; background: none; padding: 0;" onclick="return confirm('Tem certeza que deseja excluir este setor?')">
                                        <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    
                    <div id="myModal{{$sector->id}}" class="custom-modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p class="title-form">Editar Setor</p>
                            <form class="form-modal" method="post" action="{{route('sector.update', $sector->id)}}" >
                                
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6 my-4">
                                        <div class="flex-input">
                                            <label for="">Nome</label>
                                            <input name="name" class="form-control" type="text" value='{{$sector->name}}'>
                                        </div>
                                    </div>
                                    <div class="col-6 my-4">
                                        <div class="flex-input">
                                            <label for="">Nivel Setor</label>
                                            <div class="conatiner_select">
                                                <select  name="level" id="input-md" value='{{$sector->level}}'> 
                                                    <option value="vip">Vip</option>
                                                    <option value="common">Comum</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 my-4">
                                        <div class="flex-input">
                                            <label for="">Quantidade de Fileiras</label>
                                            <input name="quantity_rows" class="form-control" type="text" value='{{$sector->quantity_rows}}'>
                                        </div>
                                    </div>
                                    <div class="col-6 my-4">
                                        <div class="flex-input">
                                            <label for="">Status Setor</label>
                                            <div class="conatiner_select">
                                                <select  name="status" id="input-md" value='{{$sector->status}}'>
                                                    <option value="available">Disponivel</option>
                                                    <option value="unavailable">Não disponivel</option>
                                                    <option value="maintenance">Não disponivel</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 my-4">
                                        <div class="flex-input">
                                            <label for="">Quantidade de  Cadeiras por Fileiras</label>
                                            <input name="quantity_chairs" class="form-control" type="text" value='{{$sector->quantity_chairs}}'>
                                        </div>
                                    </div>
                                    <input name="event_id" class="form-control" type="hidden" value='{{$sector->event_id}}'>
                                </div>
                                <div class="container_btn_form">
                                    <button>Cadastrar</button>
                                    <button>Editar</button>
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


<div id="myModalsector" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Setor</p>
        <form class="form-modal" method="post" action="{{route('sector.store')}}">

            @csrf
            @method('POST')

            <div class="row">
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Nome</label>
                        <input name="name" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Nivel Setor</label>
                        <div class="conatiner_select">
                            <select  name="level" id="input-md">
                                <option value="vip">Vip</option>
                                <option value="common">Comum</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Quantidade de Fileiras</label>
                        <input name="quantity_rows" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Status Setor</label>
                        <div class="conatiner_select">
                            <select  name="status" id="input-md">
                                <option value="available">Disponivel</option>
                                <option value="unavailable">Não disponivel</option>
                                <option value="maintenance">Manutenção</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Quantidade de  Cadeiras por Fileiras</label>
                        <input name="quantity_chairs" class="form-control" type="text">
                    </div>
                </div>
                <input name="event_id" class="form-control" type="hidden" value="{{$event->id}}">
            </div>
            <div class="container_btn_form">
                <button>Cadastrar</button>
                <button>Cadastrar</button>
            </div>
        </form>
        
    </div>
</div>

        
@endsection



<script>



    window.onload = function(){

        $(document).on('change', '#serch-item', function () {

        let searchsector = $(this).val();

        $.ajax({
            url: `/api/sector/search?search=${searchsector}`,
            method: 'GET',
        }).done(function (res) {

            let tableBody = document.querySelector(".coantiner-table tbody");

            tableBody.innerHTML = "";

            res.sectors.forEach(sector => {
                tableBody.innerHTML += `
                    <tr>
                        <th scope="row">${sector.id}</th>
                        <td>${sector.name}</td>
                        <td>${sector.quantity_chairs}</td>
                        <td>${sector.quantity_rows}</td>
                        <td>${sector.status}</td>
                        <td>
                            <a href="/sector/${sector.id}"><i class="fa-solid fa-bookmark text-primary"></i></a>
                        </td>
                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a class="openModalBtn" href="#" data-id="${sector.id}">
                                    <i class="fa-solid fa-gear text-secondary cursor-pointer"></i>
                                </a>
                                <form action="/sector/${sector.id}" method="POST" style="display:inline;">
                                    <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este sectoro?')" style="border:none; background:none; padding:0;">
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




        let quantEventoInput = document.getElementById('quantEventoInput').value
        let eventId = document.getElementById('eventId').value


        console.log(eventId)
        console.log(quantEventoInput)

        $.ajax({
            url: `{{route('event.verify')}}`,
            method: 'GET',
            data: {
                'eventId': eventId,
                'quantEvent': quantEventoInput,
            }
        }).done(function(res){
            console.log(res);
        });




    };



</script>