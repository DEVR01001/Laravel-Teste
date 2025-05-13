@extends('layouts.app')



@section('container')
    


    <div class="conatiner_text">
        <h3 class="my-5">Listar Usuarios</h3>
        <a href="/UsuariosCadastrar" >Cadastrar Usuarios</a>

    </div>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Perfil</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody> 
            
        

            @foreach ($usuarios as $usuario)

            <tr>
                <td>{{$usuario->id}}</td>
                <td>{{$usuario->name}} {{$usuario->lastname}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->perfil->type ?? ''}}</td>
                <td>
                    <div class="conatiner_flex">
                        <a href="{{route('usuarios.edit', [$usuario->id])}}">Editar</a>

                        <form method='post' action="{{route('usuarios.destroy', ['usuario' => $usuario->id])}}">
                            @method('DELETE')
                            @csrf

                                <button type="submit" >Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
                
            @endforeach
        </tbody>

    </table>
    

    {{$usuarios->links('Partials.pagination')}}

   
@endsection