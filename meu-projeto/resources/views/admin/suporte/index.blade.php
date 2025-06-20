
@extends('admin.layouts.app')


@section('title', 'Suportes')
    

@section('header')
    <h1>Listagem dos suportes</h1>
@endsection

@section('content')
    
<a href="{{route('suporte.create')}}">criar dúvida</a>
<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>descrição</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        @foreach ($suportes->items() as $item) 
            <tr>
                <td>{{$item->subject}}</td>
                <td>{{ getStatusSuporte( $item->status)}}</td>
                <td>{{$item->body}}</td>
                <td>
                    <a href="{{route('suporte.show', $item->id)}}">ir</a>
                </td>
                <td>
                    <a href="{{route('suporte.edit',  $item->id)}}">editar</a>
                </td>
                <td>
                    <a href="{{route('suporte.destroy',  $item->id)}}">deletar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<x-pagination 
    :paginator="$suportes" 
    :appends="$filters" />



@endsection


@section('footer')
    