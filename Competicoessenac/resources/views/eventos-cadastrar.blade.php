@extends('layouts.app')



@section('container')
    
        <div class="conatiner_text">
            <h3 class="my-5">Cadastrar Eventos</h3>
        </div>
      
      <form method='POST' class="row g-4" action="{{route('eventos.create')}}">

        @csrf
        @method('GET')

        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nome do Evento</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Capacidade de Pessoas</label>
            <input name="capacidade_pessoas" type="number" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Cep</label>
            <input name="cep" type="number" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Rua</label>
            <input name="rua" type="text" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Bairro</label>
            <input name="bairro" type="text" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">N°</label>
            <input name="numero" type="number" class="form-control" >
        </div>
        <div class="col-md-12">
            <label class="form-label fs-5" for="">Logo do Evento</label>
            <input name="logo" type="file" class="form-control" >
        </div>
        <div class="conatiner_btn">
            <button>Cancelar</button>
            <button type="submit" >Cadastrar</button>
        </div>

      </form>


      
@endsection