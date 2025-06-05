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
                <tr>
                    <th scope="row">1</th>
                    <td>Rafael Rodrigues</td>
                    <td>5000</td>
                    <td>343453</td>
                    <td>Cliente</td>
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

