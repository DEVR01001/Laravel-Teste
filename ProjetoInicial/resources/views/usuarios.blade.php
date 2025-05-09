<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')}}</title>
</head>
<body>

    <ul>
        @foreach ($usuarios as $usuario)

            <li>
                <a href="{{route('Usuario.Visualizar', ['usuario' => $usuario->id])}}">Editar: {{$usuario->name}} - {{$usuario->email}}</a>
                <br>
                <form action="{{route('Usuario.Delete', ['usuario' => $usuario->id])}}" method="POST">

                    @cr
                    @method('DELETE')
                    <button type="submit" > Deletar: {{$usuario->name}} - {{$usuario->email}}</button>

                </form>

            </li>

        @endforeach

    </ul>
    <hr>


    <form method='POST' action="">

        @csrf 
        
        <label for="">Nome</label>
        <input name='name' type="text">
        <label for="">Email</label>
        <input name='email' type="email">
        <label for="">Senha</label>
        <input name='password' type="password">

        <button type='submit'>Enviar</button>
    </form>

</body>
</html>