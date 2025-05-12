<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ URL::asset('css/style.css');}}">

    <title>{{config('app.name')}}</title>
</head>
<body class="editar">


    <main class="container ">

        <div class="conatiner_text">
            <h3 class="my-5">Editar Usuario</h3>
        </div>
      
      <form method='POST' class="row g-4" action="{{route('usuarios.update', ['usuario' => $usuario->id])}}">


        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nome</label>
            <input name="name" type="text" class="form-control" value="{{old('name', $usuario->name)}}">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Sobrenome</label>
            <input name="lastname" type="text" class="form-control" value="{{old('lastname', $usuario->lastname)}}">
        </div>
        <div class="col-md-12">
            <label class="form-label fs-5" for="">Email</label>
            <input name="email" type="email" class="form-control" value="{{old('email', $usuario->email)}}">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">CPF</label>
            <input name="CPF" type="text" class="form-control" value="{{old('CPF', $usuario->CPF)}}">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Tipo</label>
            <select class="form-control" name="type" id="">
                <option value="cliente">Cliente</option>
                <option value="adm">ADM</option>
                <option value="toten">Toten</option>
                <option value="vendedor">Vendedor</option>
            </select>
        </div>
        <div class="col-md-12">
            <label class="form-label fs-5" for="">Senha</label>
            <input name="senha" type="password" class="form-control" value="{{old('senha', $usuario->senha)}}">
        </div>

        <div class="conatiner_btn">
            <button>Cancelar</button>
            <button type="submit" >Salvar</button>
        </div>

      </form>
       

    </main>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>