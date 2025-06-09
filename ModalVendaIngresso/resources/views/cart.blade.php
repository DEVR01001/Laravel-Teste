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

        </div>
        <a href="/user/cadastro" class="btn-cad-user">Cadastrar Usuario</a>
        <div id='container_modal' class="modal_body">

        </div>
        <div id='container_email_modal' class="container_email_modal"></div>
        <div class="conatiner_modal-btn" id='btn-fn-all'><button class="btn-fn2">Finalizar Venda</button></div>

        <img id="qrcodeImg" src="" alt="" hidden>


    </dialog>

 



    <script>

        let ContainerChairs = document.getElementById('container_chair')
        let ContainerCart = document.getElementById('container_cart')
        let ContainerEmailModal = document.getElementById('container_email_modal')
        let imgQrcode = document.getElementById("qrcodeImg")
        let ContainerModal = document.getElementById('container_modal')



        function getChair(id_setor){
            
            $.ajax({
                url: `/chair/${id_setor}/`
            }).done(function(chairs){


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


        

        };





        // Evento Jquery para pegar cadeira selecionada para checagem de ststus de DP

        $(document).on('click', '.btn-chair', function(){
            let id_chair = $(this).attr('data-chair');

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

     // Evento para adicionar/update no carrinho no paramentro 'user' apartir da mudança d eestado do input select
        

    $(document).on('change', '.search_users', function(e){

        let chair = $(this).data('chair')

        $(`#select-${chair}`).on('select2:select', function (e){
            var data = e.params.data;

            addCartUser(data,chair)
         
        })

    })



    $(document).on('click', '.delete',  function(){

        let chair = $(this).data('delete')
      

        $.ajax(({
            url: `cart/delete/${chair}`,
            method: 'DELETE',
            data:{
                _token: '{{ csrf_token() }}'
            }
        })).done( async function(res){

            var cart = await getCartAll()

            getCart(cart)
        })

    })








    async  function gerarQrcode(url){

        // let newQrcode = new QRCode()

        // let qrcode = await QRCode().toDataURL(url)
        await QRCode.toDataURL(url, function(err,caminho){
            imgQrcode.src = caminho
        })


        // return qrcode

    }




     
//     function getCartAll(){

//     return new Promise((resolver, reject) => {
//         $.ajax({
//             url: "/cart/all",
//             method: "GET",
//             success: function(response){
//                 resolver(response)
//             },
//             reject: function(error){
//                 reject(error)
//             }
//         });
//     });

// }





    $(document).on('click', '#btn-fn-all', async function(){

        
        $.ajax(({
            url: 'venda/insert',
            method: 'POST',
            data:{
                _token: '{{ csrf_token() }}'
            }
        })).done(function(res){

            if(res.success == true){


                console.log(res.ingresso_id)

                res.ingresso_id.forEach(ingressoId => {



                    $.ajax(({
                        url: `/qrcode/save/${ingressoId}`,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        }
                    })).done(function(res){

                        console.log(res.qrcode)

                        gerarQrcode(res.qrcode)

                        console.log(imgQrcode.src)

               
                        let IngressoId = res.ingresso_id

                        $.ajax(({
                            url: `/ingresso/mail/${IngressoId}`,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                srcEmail: `${imgQrcode.src}`
                            }
                            
                        })).done(function(res){

                            console.log(res)

                        })


                    })
                    
                });


            }

        })

        
    })


       

      


    




    










    </script>


    
@endsection