@extends('layout.app_saller')



@section('saller')

    <nav>
        <ul>
            <a href="/eventos-saller">Eventos</a>
            <a href="/usuarios-saller">Usuarios</a>
        </ul>
        <ul>
            <a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a>
        </ul>
    </nav>
    
@endsection




@section('container-user')



    <section class="conatiner-search">
       
        <input type="text">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>

    </section>

    <section class="container my-5">

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

                @foreach ($usersSaller as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->cpf}}</td>
                        <td>{{$user->profile}}</td>
                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a  class="openModalBtn" href="#" data-id="{{$user->id}}" > <i class="fa-solid fa-gear text-secondary cursor-pointer"></i></a>
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
                                            <input name='cpf' id="input-sm" class="form-control" type="text" value="{{$user->cpf}}">
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
    
                                            <input name='password'  class="form-control" type="hidden" value="{{$user->password}}" >
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
                                            <input type="hidden" name="profile" value="{{$user->profile}}">
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


<div id="myModal" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Usuario</p>
        <form class="form-modal" action="">
            <div class="row">
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Nome</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">CPF</label>
                        <input id="input-sm" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Sobrenome</label>
                        <input class="form-control" type="number">
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Senha</label>
                        <input class="form-control" type="password">
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Email</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 my-4">
                    <div class="flex-input">
                        <label for="">Perfil</label>
                        <select  name="" >
                            <option value="">Todos</option>
                            <option value="">Administradores</option>
                            <option value="">Clientes</option>
                            <option value="">Vendedores</option>
                            <option value="">Totems</option>
                        </select>
                    
                    </div>
                </div>

            </div>
            <div class="container_btn_form">
                <button>Cadastrar</button>
                <button>Cadastrar</button>
            </div>
        </form>
        
    </div>
</div>

        
@endsection

