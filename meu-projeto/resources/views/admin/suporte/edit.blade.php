<h1>Dúvida {{$suporte->id}}</h1>


@if ($errors->any())

    @foreach ($errors->all() as $error)

        {{ $error }}
        
    @endforeach
    
@endif

<form action="{{route('suporte.update', $suporte->id)}}" method="POST">
    {{-- <input type="text" value="{{csrf_token()}}" name="_token"> --}}
    @csrf()
    @method('put')
    <input type="text" name="subject" value='{{$suporte->subject}}'>
    <textarea name="body" id="" cols="30" rows="5" placeholder="descricao"  >{{$suporte->body}}</textarea>
    <button type="submit">Enviar</button>
</form>