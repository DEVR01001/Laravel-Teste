@extends('layouts.app')



@section('container')
    
        <div class="conatiner_text">
            <h3 class="my-5">Cadastrar Usuario</h3>
        </div>
      
      <form method='POST' class="row g-4" action="{{route('usuarios.create')}}">

        @csrf
        @method('GET')

        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nome</label>
            <input name="name" type="text" class="form-control" value='{{old('name')}}'>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Sobrenome</label>
            <input name="lastname" type="text" class="form-control" value='{{old('lastname')}}'>
        </div>
        <div class="col-md-12">
            <label class="form-label fs-5" for="">Email</label>
            <input name="email" type="text" class="form-control" value='{{old('email')}}'>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">CPF</label>
            <input name="CPF" type="text" class="form-control" value='{{old('CPF')}}'>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Tipo</label>
            <select class="form-control" name="type" id="" value='{{old('type')}}'>
                <option value="cliente">Cliente</option>
                <option value="adm">ADM</option>
                <option value="toten">Toten</option>
                <option value="vendedor">Vendedor</option>
            </select>
        </div>
        <div class="col-md-12">
            <label class="form-label fs-5" for="">Senha</label>
            <input name="senha" type="password" class="form-control" value='{{old('senha')}}'>
        </div>

        <div class="conatiner_btn">
            <button>Cancelar</button>
            <button type="submit" >Cadastrar</button>
        </div>

      </form>


      
@endsection