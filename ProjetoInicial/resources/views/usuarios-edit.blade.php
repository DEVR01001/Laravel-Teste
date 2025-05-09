<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')}}</title>
</head>
<body>


    <form method='POST' action="{{route('Usuario.Store', ['id' => $usuario->id])}}">

        @csrf 
        @method('PUT')

        
        <label for="">Nome</label>
        <input name='name' type="text" value="{{old('name', $usuario->name)}}">
        <label for="">Email</label>
        <input name='email' type="email" value="{{old('email', $usuario->email)}}">
        <label for="">Senha</label>
        <input name='password' type="password">

        <button type='submit'>Enviar</button>
    </form>

</body>
</html>