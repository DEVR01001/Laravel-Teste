<h1>Nova dúvida</h1>


@if ($errors->any())

    @foreach ($errors->all() as $error)

        {{ $error }}
        
    @endforeach
    
@endif

<form action="{{route('suporte.store')}}" method="POST">
    {{-- <input type="text" value="{{csrf_token()}}" name="_token"> --}}
    @csrf()
    <input type="text" name="subject" value="{{old('subject')}}">
    <textarea name="body" id="" cols="30" rows="5" placeholder="descricao"> {{old('body')}}</textarea>
    <button type="submit">Enviar</button>
</form>

