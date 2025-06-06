@extends('layout.app_saller')





@section('saller')

    <nav>
        <ul>
            <a href="/eventos-saller">Eventos</a>
            <a href="/usuarios-saller">Usuarios</a>
        </ul>
        <ul>
            <a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a>
        </ul>
    </nav>
    
@endsection






@section('container-user')

    <section>

        <div class="fs-5 m-5">Mapa de Assentos: {{$sector->name}}</div>
        <section class="conatiner_cart_list">
            <div class="conatiner_cart_list_left">
            <div class="coantiner_map">
                <div class="map_header">
                    Palco
                </div>
                <div class="map_body">
                    @php
                        $rows = $sector->chairs->chunk($sector->quantity_rows); 
                    @endphp
                
                    @foreach ($rows as $row)
                        <div class="fileiras-chair">
                            @foreach ($row as $chair)
                                @if ($chair->status_chair == 'occupied')
                                    <div class="map-chair occupied">
                                        {{ $chair->number_chair }}
                                    </div>
                                @else

                                    @if ($chair->level_chair == 'vip')
                                        <div class="map-chair vip btn-add-chair" data-chair="{{ $chair->id }}">
                                            {{ $chair->number_chair }}
                                        </div>
                                        
                                    @else
                                        <div class="map-chair available btn-add-chair" data-chair="{{ $chair->id }}">
                                            {{ $chair->number_chair }}
                                        </div>
                                        
                                    @endif
                                  
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
        
            </div>










            
            <div class="conatiner_description_map">
                <div class="item-descrition">
                    <div class="shape-ocupado"></div>
                    <p>Ocupado</p>
                </div>
                <div class="item-descrition">
                    <div class="shape-disponivel"></div>
                    <p>Disponivel</p>
                </div>
                <div class="item-descrition">
                    <div class="shape-vip"></div>
                    <p>Vip</p>
                </div>
            </div>
                
            </div>
            <div class="conatiner_cart_list_right">
            
                <div class="conatiner_checkout">
                    <div class="checkout_header">
                        <p>Resumo da venda</p>
                        <a class="openModalBtn" href="#" data-id="1" >Cadastrar Cliente</a>
                    </div>
                    <div class="checkout_body" id='checkout_body'>
        



                    </div>
                    <div class="checkout_footer">
                        <div class="shape"></div>
                        <div class="container_dados_footer">
                            <p>  Total de Ingressos: </p>
                            <p><script>totalGet()</script></p>
                        </div>
                        <div class="conatiner_cart_footer_btn">
                            <a href="">Finalizar</a>
                        </div>
                      
                    </div>
                </div>
                <a class="limpar-cart" href="#">Limpar</a>

            </div>

        </section>


    </section>
    
@endsection









@section('container-modal')


<div id="myModal" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Usuario</p>
        <form class="form-modal" action="">
            <div class="row">
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Nome</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">CPF</label>
                        <input id="input-sm" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Sobrenome</label>
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Email</label>
                        <input class="form-control" type="email">
                    </div>
                </div>
            </div>
        
            <div class="container_btn_form">
              
                <button type="button">Cancelar</button>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        
        
    </div>
</div>

        
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    
let ContainerCart = document.getElementById('checkout_body')



function addCart(id_chair){

    let cart = getCart();

    let exites = cart.some(element => element.id_chair ==  id_chair)

    if(exites){
        
        return
    }

    cart.push({
        'id_chair': id_chair,
        'id_user': ''

    })

    localStorage.setItem('cart', JSON.stringify(cart))

    showCart()


}


function getCart() {

      let cart = localStorage.getItem('cart');
      return cart ? JSON.parse(cart) : [];

    }




function totalGet(){

   
    let cart = getCart();

    let cont = 0

    cart.forEach(element => {

        cont +=1
        
    });

    return cont;

}





function showCart() {
    
    let cart = getCart();


    ContainerCart.innerHTML = "";

    cart.forEach(chairItem => {
        ContainerCart.innerHTML += `
            <div class="ticket_item">
                <div class="ticket">Cadeira N° ${chairItem.id_chair}</div>
                <i class="fa-solid fa-xmark delete-chair" data-chair="${chairItem.id_chair}"></i>
            </div>
        `;
    });
}





function deleteChair(idChair){

    let cart = getCart()

    cart = cart.filter(item=> item.id_chair !== idChair)

    localStorage.setItem('cart', JSON.stringify(cart))

    showCart()

}


function clearCart(){
    localStorage.clear('cart')

    showCart()
}






    $(document).on('click', '.btn-add-chair', function(){
        let id_chair = $(this).attr('data-chair');

        addCart(id_chair);

    })

    $(document).on('click', '.delete-chair', function(){
        let id_chair = $(this).attr('data-chair');

        deleteChair(id_chair);

    })


    $(document).on('click', '.limpar-cart', function(){
      
        clearCart()

    })







</script>