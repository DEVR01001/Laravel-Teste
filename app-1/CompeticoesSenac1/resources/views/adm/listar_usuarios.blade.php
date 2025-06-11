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
            <h1 class="title-dashbord">Usuarios</h1>
        </div>
        <a class="conatiner-btn-cad openModalBtn" href="#" data-id="user" >Cadastrar Usuarios</a>
    </div>

    <section class="conatiner-dados">
        <div class="card-dados">
            <p>Quantidade Usuarios</p>
            <span>{{$quantUsuarios}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade Adms</p>
            <span>{{$quantUsuariosAdm}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade Vendedor</p>
            <span>{{$quantUsuariosSaller}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade Clientes</p>
            <span>{{$quantUsuariosClient}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade Totem</p>
            <span>{{$quantUsuariosTotem}}</span>
        </div>
  

    </section>

    <section class="conatiner-search">
        <div class="conatiner_select">
            <select name="" id="select-user">
                <option value="todos">Todos</option>
                <option value="admin">Administradores</option>
                <option value="client">Clientes</option>
                <option value="saller">Vendedores</option>
                <option value="totem">Totems</option>
            </select>
        </div>
        <input type="search" id='serch-item'>
        <button><i class="fa-solid fa-magnifying-glass"></i></button>

    </section>

    <section class="container my-5 coantiner-table">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->cpf}}</td>
                        <td>{{$user->profile}}</td>
                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a  class="openModalBtn" href="#" data-id="{{$user->id}}" > <i class="fa-solid fa-gear text-secondary cursor-pointer"></i></a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: none; padding: 0;" onclick="return confirm('Tem certeza que deseja excluir este usuario?')">
                                        <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

            
                    <div id="myModal{{$user->id}}" class="custom-modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p class="title-form">Editar Usuario</p>
                            <form class="form-modal"  method='post'  action="{{route('user.update', $user->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">Nome</label>
                                            <input name='first_name' class="form-control" type="text" value="{{$user->first_name}}">
                                        </div>
                                    </div>
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">CPF</label>
                                            <input name='cpf' class="input-sm form-control" type="text" value="{{$user->cpf}}">
                                        </div>
                                    </div>
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">Sobrenome</label>
                                            <input name='last_name'  class="form-control" type="text" value="{{$user->last_name}}">
                                        </div>
                                    </div>
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">Senha</label>
                                            <input name='password'  class="form-control" type="password" value="{{$user->password}}" >
                                        </div>
                                    </div>
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">Email</label>
                                            <input name='email'  class="form-control" type="email" value="{{$user->email}}">
                                        </div>
                                    </div>
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">Perfil</label>
                                            <select name='profile' value="{{$user->profile}}">
                                                <option value="admin">Administradores</option>
                                                <option value="client">Clientes</option>
                                                <option value="saller">Vendedores</option>
                                                <option value="totem">Totems</option>
                                            </select>
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


<div id="myModaluser" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Usuario</p>
        <form class="form-modal"  method='post'  action="{{route('user.store')}}">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Nome</label>
                        <input name='first_name' class="form-control" type="text" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">CPF</label>
                        <input name='cpf' class=" input-sm form-control" type="text" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Sobrenome</label>
                        <input name='last_name'  class="form-control" type="text" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Senha</label>
                        <input name='password'  class="form-control" type="password"  >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Email</label>
                        <input name='email'  class="form-control" type="email" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Perfil</label>
                        <select name='profile'>
                            <option value="admin">Administradores</option>
                            <option value="client">Clientes</option>
                            <option value="saller">Vendedores</option>
                            <option value="totem">Totems</option>
                        </select>
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
            
            let searchUser = $(this).val();

            $.ajax({
                url: `api/user/search?search=${searchUser}`,
                method: 'GET',
            }).done(function (res) {
                let tableBody = document.querySelector(".coantiner-table tbody");
                tableBody.innerHTML = "";

                res.users.forEach(user => {
                    tableBody.innerHTML += `
                        <tr>
                            <th scope="row">${user.id}</th>
                            <td>${user.first_name}</td>
                            <td>${user.email}</td>
                            <td>${user.cpf}</td>
                            <td>${user.profile}</td>
                            <td>
                                <div class="container-icon d-flex gap-2">
                                    <a class="openModalBtn" href="#" data-id="${user.id}"><i class="fa-solid fa-gear text-secondary cursor-pointer"></i></a>
                                    <form action="/user/${user.id}" method="POST" style="display:inline;">
                                        <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuario?')" style="border:none; background:none; padding:0;">
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





        $(document).on('change', '#select-user', function() {
            let typeUser = $(this).val();

            $.ajax({
                url: `api/user/type/${typeUser}`,
            }).done(function(res){

                let tableBody = document.querySelector(".coantiner-table tbody");
                tableBody.innerHTML = ""; 

        

                res.users.forEach(user => {
                    tableBody.innerHTML += `
                        <tr>
                            <th scope="row">${user.id}</th>
                            <td>${user.first_name}</td>
                            <td>${user.email}</td>
                            <td>${user.cpf}</td>
                            <td>${user.profile}</td>
                            <td>
                                <div class="container-icon d-flex gap-2">
                                    <a class="openModalBtn" href="#" data-id="${user.id}"><i class="fa-solid fa-gear text-secondary cursor-pointer"></i></a>
                                    <form action="/user/${user.id}" method="POST" style="display:inline;">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este usuario?')" style="border:none; background:none; padding:0;">
                                            <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    `;
                });
                                


                


            })
        
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