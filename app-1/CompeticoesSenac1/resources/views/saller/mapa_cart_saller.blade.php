@extends('layout.app_saller')





@section('saller')

    <nav>
        <ul>
            <a href="eventos-saller">Eventos</a>
            <a href="usuarios-saller">Usuarios</a>
        </ul>
        <ul>
            <a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a>
        </ul>
    </nav>
    
@endsection






@section('container-user')

    <section>

        <div class="fs-5 m-5">Mapa de Assentos: Senac Music</div>
        <section class="conatiner_cart_list">
            <div class="conatiner_cart_list_left">
            <div class="coantiner_map">
                <div class="map_header">
                    Palco
                </div>
                <div class="map_body">
                    <div class="sections_map">
                        <div class="map_chair">
                            1
                        </div>
                        <div class="map_chair">
                            1
                        </div>
                        <div class="map_chair">
                            1
                        </div>
                    </div>
                    <div class="sections_map">
                        <div class="map_chair">
                            1
                        </div>
                        <div class="map_chair">
                            1
                        </div>
                        <div class="map_chair">
                            1
                        </div>
                    </div>

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
                    <div class="checkout_body">
                        <div class="ticket_item">
                            <div class="ticket">Cadeira N° 1</div>
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <div class="ticket_item">
                            <div class="ticket">Cadeira N° 1</div>
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                    <div class="checkout_footer">
                        <div class="shape"></div>
                        <div class="container_dados_footer">
                            <p>  Total de Ingressos: </p>
                            <p> 2 </p>
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

