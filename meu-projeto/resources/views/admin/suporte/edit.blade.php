<h1>Dúvida {{$suporte->id}}</h1>


<x-alert/>

<form action="{{route('suporte.update', $suporte->id)}}" method="POST">
    {{-- <input type="text" value="{{csrf_token()}}" name="_token"> --}}
    @method('put')
    @include('admin.suporte.partials.form', [
        'suporte' => $suporte
    ])

</form>