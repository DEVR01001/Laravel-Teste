@extends('layouts.app')

@section('container')

<div class="conatiner_text">
    <h3 class="my-5">Mapa de Assentos: {{ $evento->name}}</h3>
 
</div>

<div class="container_mapa">
    <div class="map-header">
        Setores do Evento
    </div>
    <div class="conatiner_body_ingresso">
        <div class="map-body">
            

            <div class="palco">Palco</div>
            @foreach ($evento->setores as $setor)
                <div class="map-setor">
                    <h5>{{ $setor->name }}</h5>

                    
                    

                    <div class="setor-cadeiras">
                        {{-- Divide as cadeiras em blocos de 10 --}}
                        @php
                            $cadeiras = $setor->cadeiras->chunk($setor->quantidade_cadeiras);
                        @endphp
    
                        @foreach ($cadeiras as $fileira)
                            <div class="fileiras-cadeira">
                                @foreach ($fileira as $cadeira)
                                    <div class="map-cadeira">
                                        @php
                                        $selecionadas = array_column((array) session('cart'), 'id_cadeira');
                                    @endphp
                                    
                                    @if ($cadeira->status === 'D')
                                        <a href="{{ route('carts.create', ['id' => $cadeira->id]) }}"
                                           class="map-cadeira-livre item-selecionado {{ in_array($cadeira->id, $selecionadas) ? 'selecionada' : '' }}">
                                            <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
                                        </a>
                                    @else
                                        <a class="map-cadeira-ocupada">
                                            <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
                                        </a>
                                    @endif
                                    
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <form class="form-cart" action="{{ route('vendas.store') }}" method="POST">
            @csrf
        
            <div class="checkout-lateral">
                <div class="checkout-lateral-header">
                    <div class="res-venda">Resumo Venda</div>
                    <a href="{{ route('carts.index') }}" class="res-venda">+ Cadastrar Cliente</a>
                </div>
        
                <div class="checkout-lateral-body">
        
                    @foreach ((array) session('cart') as $index => $item)
                        <div class="ingreso-escolhido">
                            <div class="ingresso-left">
                                <div class="number-escolhido">N° {{ $item['numero_cadeira'] }}</div>
                            </div>
        
                            <div class="ingresso-right">
                                <div class="conatiner_search">
                                    <input type="search" placeholder="Pesquisar usuarios...">
                                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
        
                                <!-- Select para escolher o usuário -->
                                <select class="select-pessoas" name="usuarios[{{ $index }}][usuario_id]" required>
                                    <option value="">Selecione um usuário</option>
                                    @foreach ($usuariosTotal as $usuarios)
                                        <option value="{{ $usuarios->id }}">
                                            {{ $usuarios->name }} {{ $usuarios->lastname }}
                                        </option>
                                    @endforeach
                                </select>
        
                                <!-- Campo oculto com ID da cadeira -->
                                <input type="hidden" name="usuarios[{{ $index }}][cadeira_id]" value="{{ $item['id_cadeira'] }}">

                            </div>
        
                            <div class="ingresso_delete">
                                    <a href="{{route('cart.delete', $item['id_cadeira'])}}" form="form-delete" type="submit">
                                        <i class="fa-solid fa-xmark"></i>
                                    </a>
                            </div>
                        </div>
                    @endforeach
        
                </div>
        
                <div class="checkout-lateral-footer">
                    <div class="shape"></div>
                    <div class="total-ingresos">
                        Total de Ingressos 
                        <span>{{ session('totalCart') ?? 0 }}</span>
                    </div>
                </div>

                <div class="conatiner_btn_finazliar">
                    <button type="submit"> Finalizar </button>
                </div>
    
            </div>
        </form>
        

    </div>
    <div class="container_ingresso">

        
    </div>
    

    

    <div class="map-footer">
        <p>Legenda: Livre / Ocupado</p>
    </div>
</div>

@endsection


<script>


const Cadeiras = document.querySelectorAll('.map-cadeira-livre');

Cadeiras.forEach(cadeira => {
    cadeira.addEventListener('click', () => {
        cadeira.classList.toggle('selecionada');
    });
});

</script>







{{-- 
@foreach ($setor->cadeiras as $cadeira)

@if ($cadeira->status  === 'D')
    <div class="map-cadeira-d">
        <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
    </div>  
    

@else
    <div class="map-cadeira-nd">
        <span class="number-cadeira">{{ $cadeira->number_cadeira }}</span>
    </div>  
@endif


 @endforeach
 --}}


