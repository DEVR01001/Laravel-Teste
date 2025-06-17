@extends('layout.app_saller')





@include('saller.navbar-saller')




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
                                        <div class="map-chair vip btn-add-chair" data-chair="{{ $chair->id }}" data-numchair='{{ $chair->number_chair }}'>
                                            {{ $chair->number_chair }}
                                        </div>
                                        
                                    @else
                                        <div class="map-chair available btn-add-chair" data-chair="{{ $chair->id }}"data-numchair='{{ $chair->number_chair }}' >
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
                        <a class="btn-cadastrar-user-cart" href="#" >Cadastrar Usuario</a>
                    </div>
                    <div class="checkout_body" id='checkout_body'>
        



                    </div>
                    <div class="checkout_footer">
                        <div class="shape"></div>
                        <div class="container_dados_footer">
                            <p>  Total de Ingressos: </p>
                            <p id="totalIngressos"></p>
                        </div>
                        <div class="conatiner_cart_footer_btn">
                            <a href="#"  id="btn-finalizar">Finalizar</a>
                        </div>
                      
                    </div>
                </div>
                <a class="limpar-cart" href="#">Limpar</a>

            </div>

        </section>

        
    <dialog id='modal-1'>

        <div class="modal_header">
            <h6>Adicionar Usuarios</h6> 
        </div>
        <a class="btn-cadastrar-user-cart" href="#" >Cadastrar Usuario</a>
        <div id='container_modal' class="modal_body">

        </div>
        <div id='container_email_modal' class="container_email_modal"></div>
        <div class="conatiner_modal-btn" id='btn-fn-all'><button class="btn-fn2">Finalizar Venda</button></div>

        <img id="qrcodeImg" class="qrcode-img d-none" src="" alt="">





    </dialog>

    <div id="ticket-div" class="conatiner_modal_ticket">
        
    </div>

 


    </section>

    
    
@endsection









@section('container-modal')


<div id="myModaluser" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Usuario</p>
        <form class="form-modal"  method="post" action="{{route('userCart.CreateUserSaller')}}">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Nome</label>
                        <input name="first_name" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">CPF</label>
                        <input name="cpf" id="input-sm" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Sobrenome</label>
                        <input name="last_name" class="form-control" type="text">
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Email</label>
                        <input name="email" class="form-control" type="email">
                    </div>
                </div>
                <input type="hidden" value="client" name="profile">
            </div>
        
            <div class="container_btn_form">
              
                <button type="button">Cancelar</button>
                <button class="cadastrar-user" type="submit">Cadastrar</button>
            </div>
        </form>
        
        
    </div>
</div>

        
@endsection





@include('layout.modal-email')





@section('container-modal')


<div id="myModalteste" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Cadastrar Usuario</p>
        <form class="form-modal"  method='post'  action="{{route('user.store')}}">
            @csrf
            @method('POST')
            <div class="row">
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Nome</label>
                        <input name='first_name' class="form-control" type="text" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">CPF</label>
                        <input name='cpf' id="input-sm" class="form-control" type="text" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Sobrenome</label>
                        <input name='last_name'  class="form-control" type="text" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Senha</label>
                        <input name='password'  class="form-control" type="password"  >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Email</label>
                        <input name='email'  class="form-control" type="email" >
                    </div>
                </div>
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Perfil</label>
                        <select name='profile'>
                            <option value="admin">Administradores</option>
                            <option value="client">Clientes</option>
                            <option value="saller">Vendedores</option>
                            <option value="totem">Totems</option>
                        </select>
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
document.addEventListener("DOMContentLoaded", function () {


    let ContainerModal = document.getElementById('container_modal')
    let imgQrcode = document.getElementById("qrcodeImg")




    let ContainerCart = document.getElementById('checkout_body');

    
    if (!ContainerCart) return; 

    function addCart(id_chair, num_chair) {
        let cart = getCart();
        let exists = cart.some(element => element.id_chair == id_chair);

        if (exists) return;

        cart.push({
            'id_chair': id_chair,
            'id_user': '',
            'num_chair': num_chair
        });

        localStorage.setItem('cart', JSON.stringify(cart));
        showCart();
    }

    function getCart() {
        let cart = localStorage.getItem('cart');
        return cart ? JSON.parse(cart) : [];
    }


    
 function totalGet() {
    const containerCartTotal = document.getElementById('totalIngressos');
    
    if (!containerCartTotal) {
        console.warn("Elemento #totalIngressos não encontrado.");
        return;
    }

    const total = getCart().length;
    console.log("Total de ingressos:", total);


    containerCartTotal.innerText = total;
}

    function showCart() {

        totalGet()
        let cart = getCart();
        ContainerCart.innerHTML = "";
        cart.forEach(chairItem => {
            ContainerCart.innerHTML += `
                <div class="ticket_item">
                    <div class="ticket">Cadeira N° ${chairItem.num_chair}</div>
                    <i class="fa-solid fa-xmark delete-chair" data-chair="${chairItem.id_chair}"></i>
                </div>
            `;
        });
    }

    function deleteChair(idChair) {
        let cart = getCart();
        cart = cart.filter(item => item.id_chair !== idChair);
        localStorage.setItem('cart', JSON.stringify(cart));
        showCart();
    }

    function clearCart() {
        localStorage.removeItem('cart'); 
        showCart();
    }

    function addCartUser(user, chair) {
        let cart = getCart(); 

        cart.forEach(itemCart => {
            if (itemCart.id_chair == chair) {
                itemCart.id_user = user;
            }
        });


        localStorage.setItem('cart', JSON.stringify(cart));
    }

  
  
    $(document).on('click', '.btn-add-chair', function (e) {


        let id_chair = $(this).attr('data-chair');
        let number_chair = $(this).attr('data-numchair');



        addCart(id_chair, number_chair);
    });

    $(document).on('click', '.delete-chair', function () {



        let id_chair = $(this).attr('data-chair');
        deleteChair(id_chair);
    });

    $(document).on('click', '.limpar-cart', function () {
        clearCart();
    });


    async function gerarQrcode(idQrcode) {
        return new Promise((resolve, reject) => {
            QRCode.toDataURL(idQrcode, function(err, caminho) {
                if (err) return reject(err);
                imgQrcode.src = caminho;
                imgQrcode.removeAttribute('hidden');
                resolve(caminho); 
            });
        });
    }

 

  $(document).on('click', '#btn-finalizar', function () {
    $.ajax({
        url: "{{ route('sale.store') }}",
        method: "POST",
        data: {
            cart: getCart(),
            _token: '{{ csrf_token() }}'
        }
    }).done(function (res) {
        if (res.success) {
            const modal = document.getElementById('modal-1');

            let Idsale = res.id_sale

            if (!modal) return;

            modal.showModal(); 

            let cart = getCart();
            let html = "";

            cart.forEach(itemCart => {
                html += `
                    <div class='container-flex-search'>
                        <div class='cart-chair'>Cadeira: ${itemCart.id_chair}</div>
                      <select data-chair="${itemCart.id_chair}" id='select-${itemCart.id_chair}' class="search_users js-example-responsive" style="width: 100%" name="state"></select>

                    </div>
                `;
            });

            ContainerModal.innerHTML = html;


            $(document).on('click', '.btn-cadastrar-user-cart', function () {
                modal.close()
                $('#myModaluser').fadeIn(); 

                
            });

          
            $(document).on('click', '.close, .btn-fechar-modal, .cadastrar-user', function () {
                   modal.showModal()
                $('#myModaluser').fadeOut(); 
            });

            $(document).on('submit', '.form-modal', function(e) {
                e.preventDefault(); 

                let form = $(this);
                let url = form.attr('action');
                let data = form.serialize();

                form.find('.alert').remove();

                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    success: function(res) {

                        form.append(`<div class="alert alert-success" style="margin-top:10px;">${res.msg}</div>`);

                        form[0].reset();

                    },
                });
            });


            $(document).on('select2:select', '.search_users', function (e) {
                var data = e.params.data;
                let chair = $(this).data('chair');
                addCartUser(data.id, chair);
            });
            



            $(document).on('click', '#btn-fn-all', function () {

                $.ajax({
                    url: '{{ route('ticket.store') }}',
                    method: 'POST',
                    data: {
                        cart: getCart(),
                        _token: '{{ csrf_token() }}',
                        id_sale: Idsale
                    }
                }).done(function (res) {

                    if (res.sucess === true) {
                        res.id_ticket.forEach(async (IdIngresso, index) => {

                            const resQrcode = await $.ajax({
                                url: `/qrcode/store/${IdIngresso}`,
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                }
                            });

                            const IngressoId = resQrcode.ingresso_id;
                            const qrcodeBase64 = await gerarQrcode(IngressoId);

                            const evento = resQrcode.evento;
                            const setor = resQrcode.setor;
                            const chair = resQrcode.chair;
                            const codigo = resQrcode.codigo;

                            const captureId = `capture-${IngressoId}`;
                            const containerId = `ticket-div-${IngressoId}`;

                            const htmlImgCaminho = `
                                <div id="${containerId}" style="position:absolute;left:-9999px;">
                                    <div id="${captureId}" class="container_ticket">
                                        <div class="container_left_ticket">
                                            <div class="conatiner_text_ticket">
                                                <div class="text-ticket-1">Evento</div>
                                                <div class="text-ticket-2">${evento.name}</div>
                                                <div class="text-ticket-3">
                                                    Local do evento: Rua ${evento.street}, ${evento.neighborhood}, ${evento.number}.
                                                </div>
                                                <div class="container_item_ticket">
                                                    <div class="flex-ticket">
                                                        <p>Setor</p>
                                                        <span>${setor.name}</span>
                                                    </div>
                                                    <div class="flex-ticket">
                                                        <p>Assento</p>
                                                        <span>${chair.number_chair}</span>
                                                    </div>
                                                    <div class="flex-ticket">
                                                        <p>Data</p>
                                                        <span>${evento.date_event}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <img src="./Captura_de_tela_2025-06-16_132104-removebg-preview.png" alt="">
                                        </div>
                                        <div class="container_right_ticket">
                                            <img src="${qrcodeBase64}" alt="" width="200" height="200">
                                            <p>Qrcode: ${codigo}</p>
                                        </div>
                                    </div>
                                </div>
                            `;

                            const tempWrapper = document.createElement('div');
                            tempWrapper.innerHTML = htmlImgCaminho;
                            document.body.appendChild(tempWrapper);

                            const captureElement = document.getElementById(captureId);

                            html2canvas(captureElement).then(canvas => {
                                const imageBase64 = canvas.toDataURL('image/png');
                        
                                $.ajax({
                                    url: `/ingresso/mail/${IngressoId}`,
                                    method: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        srcEmail: qrcodeBase64,
                                        data_url: imageBase64 
                                    }
                                }).done(function (res) {
                                    if (res.success) {
                                        clearCart();

                                        const modalEmail = document.getElementById('modal-email');
                                        modalEmail.showModal();

                                        $(document).on('click', '#btn-fn-venda', function () {
                                            window.location.reload();
                                        });
                                    }
                                });

                            
                                tempWrapper.remove();
                            });
                        });
                    }

                });

                });

                                


                            

         
            cart.forEach(itemCart => {
                $(`#select-${itemCart.id_chair}`).select2({
                    ajax: {
                        url: '{{ route('userCart.getUser') }}',
                        dataType: 'json',
                    },
                    dropdownParent: $('#modal-1')
                });
            });
        } else {
            console.error('Erro na resposta:', res);
        }
    }).fail(function (err) {
        console.error("Erro no AJAX:", err);
    });
});


    showCart();
})
















</script>
