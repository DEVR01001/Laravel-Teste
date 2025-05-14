@extends('layouts.app')



@section('container')
    


    <div class="conatiner_text">
        <h3 class="my-5">Listar  Eventos</h3>
        <a href="/EventosCadastrar" >Cadastrar Eventos</a>

    </div>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome Evento</th>
                <th scope="col">Capacidade Pessoas</th>
                <th scope="col">Total de Pessoas</th>
                <th scope="col">Ver Evento</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody> 
            
        

            @foreach ($eventos as $evento)

            <tr>
                <td>{{$evento->id}}</td>
                <td>{{$evento->name}}</td>
                <td>{{$evento->capacidade_pessoas}}</td>
                <td>{{$evento->name}}</td>
                <td><a href="{{route('setores.index', ['id_evento' => $evento->id])}}">Ver</a></td>
                <td>
                    <div class="conatiner_flex">
                        <a href="{{route('eventos.edit', [$evento->id])}}">Editar</a>

                        <form method='post' action="{{route('eventos.destroy', [$evento->id])}}">
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
    

    {{$eventos->links('Partials.pagination')}}

   
@endsection