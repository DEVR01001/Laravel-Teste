@extends('layout.app')



@section('navbar')

@include('adm.nav_bar-adm')

@endsection




@section('container')


    <div class="container_title">
        <div class="conatiner_text">
            <i class="fa-solid fa-chevron-left "></i>
            <h1 class="title-dashbord">{{$sector->name}}</h1>
        </div>
        <a class="conatiner-btn-cad openModalBtn" href="#" data-id="chair">Cadastrar Cadeiras</a>
    </div>

    <section class="conatiner-dados">
        <div class="card-dados">
            <p>Quantidade de Assentos  Disponiveis </p>
            <span>{{$quantChairsDisponiveis}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade de Assentos Não Disponieis</p>
            <span>{{$quantChairsNãoDisponiveis}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade de Assentos Vips</p>
            <span>{{$quantChairsNãoVips}}</span>
        </div>
        <div class="card-dados">
            <p>Quantidade de Assentos Comuns</p>
            <span>{{$quantChairsNãoComum}}</span>
        </div>
   
  

    </section>

    <section class="conatiner-search">
     
        <input type="search" id='serch-item'>
        <button><i class="fa-solid fa-magnifying-glass"></i></button>

    </section>

    <section class="container my-5">

        <table class="table  coantiner-table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numero Cadeira</th>
                    <th scope="col">Status Cadeira</th>
                    <th scope="col">Nivel Cadeira</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chairs as $chair)
                    <tr>
                        <th scope="row">{{$chair->id}}</th>
                        <td>{{$chair->number_chair}}</td>
                        <td>{{$chair->status_chair}}</td>
                        <td>{{$chair->level_chair}}</td>
                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a  class="openModalBtn" href="#" data-id="{{$chair->id}}" > <i class="fa-solid fa-gear text-secondary cursor-pointer"></i></a>
                                <form action="{{ route('chair.destroy', $chair->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" style="border: none; background: none; padding: 0;" onclick="return confirm('Tem certeza que deseja excluir este chair?')">
                                        <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    
                    <div id="myModal{{$chair->id}}" class="custom-modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p class="title-form">Editar Cadeira</p>
                            <form class="form-modal" method="post" action="{{route('chair.update', $chair->id)}}">

                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">N° Cadeira</label>
                                            <input  class="form-control" type="text" name='number_chair' value="{{$chair->number_chair}}">
                                        </div>
                                    </div>
                                
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">Nivel Cadeira</label>
                                            <select name='level_chair'  value="{{$chair->level_chair}}">
                                                <option value="vip">Vip</option>
                                                <option value="common">Comum</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                
                                    <div class="col-6 coluna-form-modal">
                                        <div class="flex-input">
                                            <label for="">Perfil</label>
                                            <select  name='status_chair' value="{{$chair->status_chair}}">
                                                <option value="available">Disponivel</option>
                                                <option value="occupied">Ocupada</option>
                                                <option value="maintenance">Manutenção</option>
                                            </select>
                                        
                                        </div>
                                    </div>
                                    <input type="hidden" name='sector_id' value="{{$chair->sector_id}}">

                                </div>
                                <div class="container_btn_form">
                                    <button>Cancelar</button>
                                    <button type="submit">Editar</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>



                @endforeach
                

            </tbody>
        </table>
    </section>
    
@endsection









@section('container-modal')


<div id="myModalchair" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Cadeira</p>
        <form class="form-modal" method="post" action="{{route('chair.store')}}">

            @csrf
            @method('POST')

            <div class="row">
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">N° Cadeira</label>
                        <input  class="form-control" type="text" name='number_chair'>
                    </div>
                </div>
            
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Nivel Cadeira</label>
                        <select name='level_chair' >
                            <option value="vip">Vip</option>
                            <option value="common">Comum</option>
                        </select>
                    
                    </div>
                </div>
            
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Perfil</label>
                        <select  name='status_chair' >
                            <option value="available">Disponivel</option>
                            <option value="occupied">Ocupada</option>
                            <option value="maintenance">Manutenção</option>
                        </select>
                    
                    </div>
                </div>
                <input type="hidden" name='sector_id' value="{{$sector->id}}">

            </div>
            <div class="container_btn_form">
                <button>Cancelar</button>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        
    </div>
</div>
        
@endsection







<script>



    window.onload = function(){

        $(document).on('change', '#serch-item', function () {

        let searchchair = $(this).val();

        $.ajax({
            url: `/api/chair/search?search=${searchchair}`,
            method: 'GET',
        }).done(function (res) {

            let tableBody = document.querySelector(".coantiner-table tbody");

            tableBody.innerHTML = "";

            res.chairs.forEach(chair => {
                tableBody.innerHTML += `
                    <tr>
                        <th scope="row">${chair.id}</th>
                        <td>${chair.number_chair}</td>
                        <td>${chair.status_chair}</td>
                        <td>${chair.level_chair}</td>

                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a class="openModalBtn" href="#" data-id="${chair.id}">
                                    <i class="fa-solid fa-gear text-secondary cursor-pointer"></i>
                                </a>
                                <form action="/chair/${chair.id}" method="POST" style="display:inline;">
                                    <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este chairo?')" style="border:none; background:none; padding:0;">
                                        <i class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                `;
            });

        });
        });



        $(document).on('click', '.openModalBtn', function(e) {
            e.preventDefault();
            
            const userId = $(this).data('id');
            const modal = document.getElementById(`myModal${userId}`);
            
            if(modal) {
                modal.style.display = 'block';
            }
        });




    };



</script>




