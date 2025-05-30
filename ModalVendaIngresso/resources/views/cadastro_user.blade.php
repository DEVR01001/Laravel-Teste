@extends('layouts.app')



@section('body')


    <form method="POST" action="{{route('user.create')}}">

        @method('POST')
        @csrf
        <h1 class="text-title">Cadastro Usuario</h1>
        <div class="form-Flex">
            <label for="">Nome</label>
            <input type="text" name="name"  value="{{old('name')}}">
        </div>
        <div class="form-Flex">
            <label for="">Sobrenome</label>
            <input type="text" name="lastname"  value="{{old('lastname')}}"> 
        </div>
        <div class="form-Flex">
            <label for="">Email </label>
            <input type="text" name="email"  value="{{old('email')}}">
        </div>
        <div class="form-Flex">
            <label for="">Senha</label>
            <input type="text" name="senha" value="{{old('senha')}}">
        </div>
        <div class="form-Flex">
            <label for="">CPF</label>
            <input type="text" name="CPF" value="{{old('cpf')}}">
        </div>
            
        </div>

        <div class="conatiner-btn">
            <button type="submit">Cadastrar</button>
        </div>


    </form>



@endsection