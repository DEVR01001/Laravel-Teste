@extends('layouts.app')



@section('container')
    


    <div class="conatiner_text">
        <h3 class="my-5">Listar Cadeiras</h3>

    </div>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">N° Cadeira</th>
                <th scope="col">Status</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody> 
            
        

            @foreach ($cadeiras as $cadeira)

            <tr>
                <td>{{$cadeira->id}}</td>
                <td>{{$cadeira->number_cadeira}}</td>
                <td>{{$cadeira->status}}</td>
                <td>{{$cadeira->nivel_cadeira}}</td>
                <td>
                    <div class="conatiner_flex">
                        <a href="{{route('cadeiras.edit', [$cadeira->id])}}">Editar</a>

                        <form method='post' action="{{route('cadeiras.destroy', [ $cadeira->id])}}">
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
    

    {{$cadeiras->withQueryString()->links('Partials.pagination')}}

   
@endsection





{{-- 




@extends('layouts.app')



@section('container')
    


    <div class="conatiner_text">
        <h3 class="my-5">Listar Cadeiras</h3>

    </div>
    <table class="table">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">N° Cadeira</th>
                <th scope="col">Status</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody> 
            
        

            @foreach ($cadeiras as $cadeira)

            <tr>
                <td>{{$cadeira->id}}</td>
                <td>{{$cadeira->number_cadeira}}</td>
                <td>{{$cadeira->status}}</td>
                <td>{{$cadeira->nivel_cadeira}}</td>
                <td>
                    <div class="conatiner_flex">
                        <a href="{{route('cadeiras.edit', [$cadeira->id])}}">Editar</a>

                        <form method='post' action="{{route('cadeiras.destroy', [ $cadeira->id])}}">
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
    

    {{$cadeiras->withQueryString()->links('Partials.pagination')}}

   
@endsection --}}