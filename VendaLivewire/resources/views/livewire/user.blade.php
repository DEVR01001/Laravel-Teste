<div>
    <h1>Usuarios</h1>
    <button wire:click='addUser' >Adicionar Usuario</button>
    <span> {{$isEdit}} </span>

    @forelse ($users as $item)

        <p>{{$item->name}}</p>
        
    @empty
        
    @endforelse

        
    <button type="button" class="hidden" id='btn-modal' data-bs-toggle="modal" data-bs-target="#modalEdit">
        Launch demo modal
    </button>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Modal {{ $isEdit ? "Edit": "Register" }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  id='form-user' wire:submit='save' class="form">
                    <input wire:model='user.name' type="text" placeholder="nome" >
                    <input wire:model='user.email' type="text" placeholder="email" >
                    <input wire:model='user.password' type="password" placeholder="password" >
                    

                </form>
           
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" form='form-user' class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>




    <style>
        span{
            background-color: aqua;
        }

        .hidden{
            display: none;
        }

        .mostrar{
            display: block !important;
        }

        .product{
            background-color: rgb(231, 231, 231);
            margin: 1rem
        }
    </style>


    
</div>


@script
<script>
    $wire.on('openModal', () => {
        
        document.getElementById("btn-modal").click();
    })
  </script>

@endscript