<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

   
    <title>{{config('app.name')}}</title>
</head>
<body >


    <main class="container ">

        
        <div class="conatiner_text">
            <h3 class="my-5">Listar Usuarios</h3>
            <a href="/UsuariosCadastrar" class="btn-cad">Cadastrar Usuarios</a>

        </div>
        <table class="table">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Perfil</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($usuarios as $usuario)

                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->name}} {{$usuario->lastname}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->perfil->type ?? ''}}</td>
                    <td>
                        <div class="conatiner_flex">
                            <a href="{{route('usuarios.edit', [$usuario->id])}}">Editar</a>
                            <a href="">Excluir</a>
                        </div>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>

        </table>
        

        {{$usuarios->links('Partials.pagination')}}

    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>