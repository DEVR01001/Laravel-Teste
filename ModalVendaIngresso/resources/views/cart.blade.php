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
        <div class="conatiner_modal-btn" id='btn-fn-all'><button class="btn-fn2">Finalizar Venda</button></div>


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

                }
            })





        }

        
       function getCartAll(){

        return new Promise((resolver, reject) => {
            $.ajax({
                url: "/cart/all",
                method: "GET",
                success: function(response){
                    resolver(response)
                },
                reject: function(error){
                    reject(error)
                }
            });
        });

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


        function addCartUser(user,chair){

            console.log(user,chair)

            $.ajax(({
                url: `cart/add/user/${user.id}/${chair}`,
                method: 'POST',
                data:{
                      _token: '{{ csrf_token() }}'
                }
            })).done(function(res){

                console.log('Atualizou o cart')
            })



            
        }


    









        window.onload = function(){
            getChair(1);

            let carts = {{ Js::from($carts) }};

            getCart(carts);

            console.log(carts)
         
        

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

        $('.open-modal').on('click', async function () {

            var cart = await getCartAll()


            const modalId = $(this).data('modal');
            const modal = document.getElementById(modalId);
            if (modal) {

                modal.showModal();

                ContainerModal.innerHTML = '';

                cart.forEach(cartItem => {

                    ContainerModal.innerHTML += `
                    <div> </di>
                <div class='cart-chair' > Cadeira: ${cartItem.chair} <div class='delete'   data-delete='${cartItem.chair}' > X </div> </div>
                    <select data-chair="${cartItem.chair}" id='select-${cartItem.chair}' class="js-example-basic-single search_users" name="state">

                    </select>

                `;
                })

                            

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


    $(document).on('change', '.search_users', function(e){

        let chair = $(this).data('chair')

        $(`#select-${chair}`).on('select2:select', function (e){
            var data = e.params.data;

            addCartUser(data,chair)
         
        })

    })


    $(document).on('click', '#btn-fn-all', function(){

        $.ajax(({
            url: 'venda/insert',
            method: 'POST',
            data:{
                _token: '{{ csrf_token() }}'
            }
        })).done(function(res){

            if(res.success == true){

                alert('Venda realizada com sucesso!')

                window.location.reload();
            }

        })
    })


       

      


    




    










    </script>


    
@endsection