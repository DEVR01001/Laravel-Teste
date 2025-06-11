@extends('layout.app_saller')




@include('saller.navbar-saller')



@section('container-user')

    <section>

        <div class="fs-5 m-5">Eventos</div>
        <section class="conatiner-search">
            <input type="search" id="serch-item">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </section>
        

        <section class="event-cards">

            @foreach ($eventosSaller as $event)

        
                <div class="card-event">
                    <img src="{{ asset('images/' . $event->logo) }}" alt="">
                    <p>{{$event->name}}</p>
                    <p>Quantidade de pessoas: {{$event->capacidade_pessoas}}</p>
                    <a href="{{route('sectorSaller.chairsSector', ['id' => $event->id])}}">Ver Evento</a>
                </div>
                    
            @endforeach


        </section>


    </section>
    
@endsection


<script>



    window.onload = function(){

        $(document).on('change', '#serch-item', function () {

        let searchevent = $(this).val();

        $.ajax({
            url: `api/event/search?search=${searchevent}`,
            method: 'GET',
        }).done(function (res) {

            let tableBody = document.querySelector(".coantiner-table tbody");

            tableBody.innerHTML = "";

            res.events.forEach(event => {
                tableBody.innerHTML += `
                    <tr>
                        <th scope="row">${event.id}</th>
                        <td>${event.name}</td>
                        <td>${event.capacidade_pessoas}</td>
                        <td>${event.cep}</td>
                        <td>
                            <a href="/sector/${event.id}"><i class="fa-solid fa-bookmark text-primary"></i></a>
                        </td>
                        <td>
                            <div class="container-icon d-flex gap-2">
                                <a class="openModalBtn" href="#" data-id="${event.id}">
                                    <i class="fa-solid fa-gear text-secondary cursor-pointer"></i>
                                </a>
                                <form action="/event/${event.id}" method="POST" style="display:inline;">
                                    <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este evento?')" style="border:none; background:none; padding:0;">
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