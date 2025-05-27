@extends('layouts.app')



@section('body')


    <h1 class="m-4">Chairs</h1>
    <div  class=" my-5 container" id="container_chair">

    </div>

    <h1 class="m-4">Cart <div  class="limpar btn-limpar">Limpar</div></h1>

    <div  class=" my-5 container" id="container_cart">

    </div>


    <div class="conatiner-btn-fn container justify-content-end">
        <button id="btn-fn-1"  class="btn btn-info btn-lg">
            Escolher Usuarios
        </button>
    </div>


    <script>

        let ContainerChairs = document.getElementById('container_chair')
        let ContainerCart = document.getElementById('container_cart')






        function getChair(id_setor){
            
            $.ajax({
                url: `/chair/${id_setor}/`
            }).done(function(chairs){

                console.log(chairs);

                chairs.forEach(chair => {

                    ContainerChairs.innerHTML += `

                        <div class='btn-chair' data-chair='${chair.id}' > ${chair.number_cadeira} </div>

                    `
                });
            })


        }


        function getCart(cart){

            ContainerCart.innerHTML = '';


            cart.forEach(cartItem => {

                ContainerCart.innerHTML += `
                
                <div class='cart-chair' > Cadeira: ${cartItem.chair} <div class='delete'   data-delete='${cartItem.cadeira}' > X </div> </div>
                
                `
                
            });




        }




        function addCartChair(id_chair){

            $.ajax({
                url:`/cart/add/${id_chair}`,
                method:'POST',
                data:{
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(res){

                if(res.sucess == true){
                    getCart(res.cart)

                    console.log('ENTROU AQUI E ADD A CHAIR NO CART')
                }
            })





        }




        function checkChair(id_chair){

            let route = '{{route('check.chairs')}}/'

            $.ajax({
                url: route + id_chair
            }).done(function(res){
                if(res.status === 'D'){

                    addCartChair(id_chair)


                }else{
                    alert(`Cadeira ${id_chair} não está disponivel!`);
                }
            }).fail(function(){
                alert(`0A cadeira ${id_chair} não existe.`);
            });
        }




        function cartClear(){

            $.ajax({

                url: `/cart/clear`,
                method: 'DELETE',
                data:{
                      _token: '{{ csrf_token() }}'
                }
            }).done(function(res){

                if(res.sucess == true){

                    getCart(res.cart)

                }


                
            })

        }


        function checkVenda(){

            $.ajax({
                url: '/cart/venda/cadeiras',
                method: 'POST',
                data:{
                    _token: '{{ csrf_token() }}'
                }
            })


        }


















        window.onload = function(){
            getChair(1);

            let carts = {{ Js::from($carts) }};

            getCart(carts); 
        };





        // Evento Jquery para pegar cadeira selecionada para checagem de ststus de DP

        $(document).on('click', '.btn-chair', function(){
            let id_chair = $(this).attr('data-chair');

            console.log(id_chair)
            
            checkChair(id_chair)


        })
        


        // Evento Jquery para  limpar o carrinho


        $(document).on('click', '.btn-limpar', function(){

            cartClear();

        })



        // Evento de quando clicar no btn "Escolher Usuario" abrir modal para selecionar  Usuarios para cada cadeira

        $(document).on('click', '.btn-fn-1', function(){
            checkVenda();


        })










    </script>


    
@endsection