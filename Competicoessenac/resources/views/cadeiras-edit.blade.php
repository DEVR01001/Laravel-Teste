@extends('layouts.app')



@section('container')
    

        <div class="conatiner_text">
            <h3 class="my-5">Editar Cadeira</h3>
        </div>
      
      <form method='POST' class="row g-4" action="{{route('cadeiras.update', [$cadeira->id])}}">


        @csrf
        @method('PUT')
        <input name="setores_id" type="hidden" class="form-control" value="{{$cadeira->setores_id}}">

        <div class="col-md-6">
            <label class="form-label fs-5" for="">N° Cadeira</label>
            <input name="number_cadeira" type="text" class="form-control" value="{{old('number_cadeiras', $cadeira->number_cadeira)}}">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Status Cadeira</label>
            <select class="form-control" name="status" id="" value='{{old('status', $cadeira->status)}}'>
                <option value="D">Disponivel</option>
                <option value="ND">Não Disponivel</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nivel de Cadeira</label>
            <select class="form-control" name="nivel_cadeira" id="" value='{{old('status', $cadeira->nivel_cadeira)}}'>
                <option value="CM">Comum</option>
                <option value="VP">VIP</option>
            </select>
        </div>

        <div class="conatiner_btn">
            <button>Cancelar</button>
            <button type="submit" >Salvar</button>
        </div>

      </form>
       


@endsection