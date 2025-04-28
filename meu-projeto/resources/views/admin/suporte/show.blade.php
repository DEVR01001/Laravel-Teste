<h1>Detalhes da dúvida {{$suporte->id}}</h1>


<ul>
    <li>Assunto: {{$suporte->subject}}</li>
    <li>Descrição: {{$suporte->body}}</li>
    <li>Status: {{$suporte->status}}</li>
</ul>


<form method="post" action="{{route('suporte.destroy', $suporte->id)}}">
    @csrf()
    @method('DELETE')
    <button type="submit" >Deletar</button>
</form>