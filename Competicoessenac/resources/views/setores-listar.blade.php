@extends('layouts.app')



@section('container')
    


    <div class="conatiner_text">
        <h3 class="my-5">Listar Setores</h3>
        <a href="{{}}" >Cadastrar Setores</a>


    </div>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome Setor</th>

                <th scope="col">Quantidade de Cadeiras</th>
                <th scope="col">Ver Cadeiras</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody> 
            
        

            @foreach ($setores as $setor)

     
            <tr>
                <td>{{$setor->id}}</td>
                <td>{{$setor->name}}</td>
                <td>{{$setor->quantidade_cadeiras}}</td>
                <td><a href="{{route('setores.index', ['id_evento' => $setor->id])}}">Ver</a></td>
                <td>
                    <div class="conatiner_flex">
                        <a href="{{route('setores.edit', [$setor->id])}}">Editar</a>

                        <form method='post' action="{{route('setores.destroy', [$setor->id])}}">
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
    

    {{$setores->links('Partials.pagination')}}

   
@endsection