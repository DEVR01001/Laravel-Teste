<h1>Nova dúvida</h1>

<x-alert/>


<form action="{{route('suporte.store')}}" method="POST">
    {{-- <input type="text" value="{{csrf_token()}}" name="_token"> --}}
   @include('admin.suporte.partials.form')
</form>

