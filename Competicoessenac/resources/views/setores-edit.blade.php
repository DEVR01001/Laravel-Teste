@extends('layouts.app')



@section('container')
    

        <div class="conatiner_text">
            <h3 class="my-5">Editar Setor</h3>
        </div>
      
    

      <form method='POST' class="row g-4" action="{{route('setores.update', $setor->id)}}">


        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nome do Setor</label>
            <input name="name" type="text" class="form-control" value="{{old('name', $setor->name)}}">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Quantidade de Fileiras</label>
            <input name="quantidade_fileras" type="number" class="form-control"  value="{{old('quantidade_fileras', $setor->quantidade_fileras)}}">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Quantidade de Cadeiras Por Fileira</label>
            <input name="quantidade_cadeiras" type="number" class="form-control" value="{{old('quantidade_cadeiras', $setor->quantidade_cadeiras)}}">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nivel Setor</label>
            <select class="form-control" name="nivel_setor" id=""> value="{{old('nivel_setor', $setor->nivel_setor)}}"
                <option value="VP">Comum</option>
                <option value="CM">VIP</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nivel Setor</label>
            <select class="form-control" name="status_setor" id="" value="{{old('status_setor', $setor->status_setor)}}">
                <option value="D">Disponivel</option>
                <option value="ND">Não Disponivel</option>
            </select>
        </div>

        
        <div class="conatiner_btn">
            <button>Cancelar</button>
            <button type="submit" >Salvar</button>
        </div>

      </form>
       


@endsection