@extends('layouts.app')



@section('container')
    
        <div class="conatiner_text">
            <h3 class="my-5">Cadastrar Setor</h3>
        </div>
      
      <form method='POST' class="row g-4" action="{{route('setores.create')}}">

        @csrf
        @method('GET')
        <input type="hidden" name="eventos_id" class="form-control" value="{{$id_evento}}">
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nome do Setor</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Capacidade de Cadeiras</label>
            <input name="quantidade_cadeiras" type="number" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Comprimento</label>
            <input name="comprimento" type="number" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Largura</label>
            <input name="largura" type="text" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Largura</label>
            <input name="largura" type="text" class="form-control" value='{{$evento->id}}' >
        </div>
        <div class="conatiner_btn">
            <button>Cancelar</button>
            <button type="submit" >Cadastrar</button>
        </div>

      </form>


      
@endsection