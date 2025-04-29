@csrf()
<input type="text" name="subject" value="{{$suporte->subject ?? old('subject')}}">
<textarea name="body" id="" cols="30" rows="5" placeholder="descricao"> {{$suporte->body ?? old('body')}}</textarea>
<button type="submit">Enviar</button>