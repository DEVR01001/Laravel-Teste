@extends('layouts.app')



@section('body')


    <h1 class="m-4">Chairs</h1>
    <div  class=" my-5 container" id="container_chair">

    </div>

    <h1 class="m-4">Cart <div  class="limpar btn-limpar">Limpar</div></h1>

    <div  class=" my-5 container" id="container_cart">

    </div>


    <div class="conatiner-btn-fn container justify-content-end">
        <button data-modal='modal-1' class=" open-modal btn btn-info btn-lg btn-fn-1">
            Escolher Usuarios
        </button> 
        <button data-modal='modal-1' class=" open-modal btn btn-light btn-lg btn-fn-1">
            Finalizar
        </button> 

    </div>


    <dialog id='modal-1'>

        <div class="modal_header">
            <h6>Adicionar Usuarios</h6> 
            <button data-modal='modal-1' class="close-modal" >X</button>
        </div>
        <button class="btn-cad-user">Cadastrar Usuario</button>
        <div id='container_modal' class="modal_body">

        </div>


    </dialog>

 



    <script>

        let ContainerChairs = document.getElementById('container_chair')
        let ContainerCart = document.getElementById('container_cart')

        let ContainerModal = document.getElementById('container_modal')



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
                
                <div class='cart-chair' > Cadeira: ${cartItem.chair} <div class='delete'   data-delete='${cartItem.chair}' > X </div> </div>
                
                `
                
            });




        }


        function getCartUsers(cart){



            if(cart == null){

                ContainerModal.innerHTML = '';

            }else{
  
                ContainerModal.innerHTML = '';

                    cart.forEach(cartItem => {

                        ContainerModal.innerHTML += `
                        <div> </di>
                    <div class='cart-chair' > Cadeira: ${cartItem.chair} <div class='delete'   data-delete='${cartItem.chair}' > X </div> </div>
                        <select data-chair="${cartItem.chair}" class="js-example-basic-single search_users" name="state">

                        </select>


                    `;
                })


            }

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
                    getCartUsers(res.cart)


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
                    getCartUsers(null)
                   
    

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
        

        $(document).ready(function () {

        $('.open-modal').on('click', function () {
            const modalId = $(this).data('modal');
            const modal = document.getElementById(modalId);
            if (modal) {

                modal.showModal();

            $('.js-example-basic-single').select2({
                ajax: {
                    url: '{{route('users.search')}}',
                    dataType: 'json',
                },
                dropdownParent: $('#modal-1') 
            });

        


            }
    
        });


    $('.close-modal').on('click', function () {
            const modalId = $(this).data('modal');
            const modal = document.getElementById(modalId);
            if (modal){
                
                modal.close();
            
            } 

        


        });
    });


       

      


    




    










    </script>


    
@endsection