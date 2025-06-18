<div>
 
    <h1>Produtos</h1>
    {{-- <input type="search" wire:model.live='search'>
    <button type="button" wire:click='searchTerm'>Pesquisar</button> --}}
 
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button> --}}




    @foreach ($products as $item)
    <div class="product">
        <p>{{$item['title']}}</p>
        <p>{{$item['price']}}</p>
        <button wire:click="getProductItem('{{$item['id']}}')" >ver produto</button>
    </div>
 
        
    @endforeach

    

  
  <!-- Modal -->

 

  <!-- 
  <div wire:show='showModal' class="modal fade show" tabindex="-1" aria-modal="true" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            {{-- <input type="text" wire:model='product.title'> --}}
            <p>{{$product['title'] ?? ''}}</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
-->

<button type="button" class="hidden" id='btn-modal' data-bs-toggle="modal" data-bs-target="#modalEdit">
    Launch demo modal
  </button>
<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>{{$product['title'] ?? '-'}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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