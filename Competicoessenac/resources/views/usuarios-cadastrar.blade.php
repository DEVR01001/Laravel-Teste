<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ URL::asset('css/style.css');}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">


    
    <title>Document</title>
</head>
<body>

    <main class="container ">

        <div class="conatiner_text">
            <h3 class="my-5">Cadastrar Usuario</h3>
        </div>
      
      <form method='POST' class="row g-4" action="{{route('usuarios.create')}}">

        @csrf
        @method('GET')

        <div class="col-md-6">
            <label class="form-label fs-5" for="">Nome</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">Sobrenome</label>
            <input name="lastname" type="text" class="form-control" >
        </div>
        <div class="col-md-12">
            <label class="form-label fs-5" for="">Email</label>
            <input name="email" type="email" class="form-control" >
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5" for="">CPF</label>
            <input name="CPF" type="text" class="form-control" >
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
            <input name="senha" type="password" class="form-control">
        </div>

        <div class="conatiner_btn">
            <button>Cancelar</button>
            <button type="submit" >Cadastrar</button>
        </div>

      </form>
  
</body>
</html>