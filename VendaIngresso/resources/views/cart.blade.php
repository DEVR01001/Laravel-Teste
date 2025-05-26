@extends('layouts.app')



@section('body')
 
    <h1 class="my-5 bg-info p-1 rounded-3 fs-2" >Cadeiras</h1>

    <div class="container" id="container"></div>


    <h1>Cart <div id="clearCartBtn" class="limparCart" >limpar</div> </h1>

    <div class="container_cart" id="container_cart"></div>




    <script>


        let ContainerChair = document.getElementById('container')
        let ContainerCart = document.getElementById('container_cart')
      









        function getChair(id_setor){
            

            $.ajax({
                url: `/chair/${id_setor}/`
            }).done(function(chairs){

                console.log(chairs);

                chairs.forEach(chair => {

                    ContainerChair.innerHTML += `

                        <div class='btn' data-chair='${chair.id}' > ${chair.number_cadeira} </div>

                    `
                });
            })


        }


        function getCart(carts, users) {
            ContainerCart.innerHTML = ''; 

            let selectHTML = `<select>`;
        
            users.forEach(user => {
                selectHTML += `<option value="${user.id}">${user.name} ${user.lastname}</option>`;
            });

            selectHTML += `</select>`;


            carts.forEach(cart => {
                ContainerCart.innerHTML += `
                    <div class='cart'>Cadeira: ${cart.cadeira} = User: ${cart.user}  <div class='delete' data-chair='${cart.cadeira}'> X </div> </div>
                    <div class='select-container'> 
                           ${selectHTML}
                    </div>
                `;
            });
        }



        function addCart(id_chair,id_user){

            $.ajax({
                url:`/chair/${id_chair}/${id_user}`,
                method:'POST',
                data:{
                        _token: '{{ csrf_token() }}'
                }
            }).done(function(res){

                if(res.success == true){
                    getCart(res.carts, res.users)
                    

                }

                  
            });


        }




        function remove_chair(id){

            $.ajax({
                    url:`chair/${id}/remove-session`,
                    method: 'DELETE',
                    data:{
                        _token: '{{ csrf_token() }}'
                    }
                }).done(function(){
                    alert(`Cadeira ${id} removida do carinho` )
                })

        }   

        function checkChairs(id) {
            let route = '{{ route('check.chairs') }}/';

            $.ajax({
                url: route + id
            }).done(function(res) {
                if (res.status === 'D') {
                    addCart(id, 1); 
                } else {
                    alert(`Cadeira ${id} não está disponível.`);
                }
            }).fail(function() {
                alert('Cadeira não existe.');
            });
        }


        window.onload = function(){
            getChair(1);

            let carts = {{ Js::from($carts) }};
            getCart(carts); 
        };

        $(document).on('click', '.btn', function() {
            let id = $(this).attr('data-chair');
            checkChairs(id);
        });

        function LimparCart() {
            $.ajax({
                url: `/cart/clear`,
                method: 'DELETE', 
                data: {
                    _token: '{{ csrf_token() }}'
                }
            }).done(function(res) {
                if (res.success) {
                    getCart(res.carts, res.users)
                } else {
                }
            });
        }


        function deleteChair(id){

            $.ajax({
                url: `/cart/delete/${id}`,
                method: 'DELETE',
                data:{
                    _token: '{{csrf_token() }}'
                }
            }).done(function(res){

                if(res.success){
                    getCart(res.carts, res.users);

                }
            })

        }



        $(document).on('click', '#clearCartBtn', function() {
            LimparCart();
        });

        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-chair');
            deleteChair(id);
        });



     

    </script>

    
@endsection