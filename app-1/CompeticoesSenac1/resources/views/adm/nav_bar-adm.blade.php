
<div class="nav-container-mobile">
    <ul>
        <li><i class="fa-solid fa-users"></i><a href="{{ route('user.index') }}">Usuários</a></li>
        <li><i class="fa-solid fa-calendar-days"></i><a href="{{ route('event.index') }}">Eventos</a></li>
        <li><i class="fa-solid fa-ticket"></i><a href="{{ route('ticket.index') }}">Ingressos</a></li>
        <li class="btn-relatorio" ><i class="fa-solid fa-database"></i><a href="#">Relatórios</a></li>
        <li>
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <a href="/logout">Sair</a>
        </li>
    </ul>
</div>

<header class="header">
           

    <div class="conatiner_logo">
        <img src="{{ asset('images/Objeto Inteligente de Vetor.png') }}" alt="Logo da empresa">
    </div>

    <ul>
        <a href="{{route('user.index')}}">Usuários</a>
        <a href="{{ route('event.index') }}">Eventos</a>
        <a href="{{route('ticket.index')}}">Ingressos</a>
        <a href="#" class="openModalBtn" data-id='relatorio' >Relatórios</a>
    </ul>

    <div class="conatiner_logout">
        <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Sair</a>

    </div>

</header>



<div id="mydModalrelatorio" class="custom-modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="title-form">Gerar Relatórios</p>
        <form class="form-modal" method="post" action="{{route('chair.store')}}">

            @csrf
            @method('POST')

            <div class="row">
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">N° Cadeira</label>
                        <input  class="form-control" type="text" name='number_chair'>
                    </div>
                </div>
            
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Nivel Cadeira</label>
                        <select name='level_chair' >
                            <option value="vip">Vip</option>
                            <option value="common">Comum</option>
                        </select>
                    
                    </div>
                </div>
            
                <div class="col-6 coluna-form-modal">
                    <div class="flex-input">
                        <label for="">Perfil</label>
                        <select  name='status_chair' >
                            <option value="available">Disponivel</option>
                            <option value="occupied">Ocupada</option>
                            <option value="maintenance">Manutenção</option>
                        </select>
                    
                    </div>
                </div>


            </div>
            <div class="container_btn_form">
                <button>Cancelar</button>
                <button type="submit">Cadastrar</button>
            </div>
        </form>
        
    </div>
</div>