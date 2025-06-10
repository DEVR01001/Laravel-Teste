<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <title>Document</title>
</head>
<body>

    <div class="conatiner_login">
        <div class="container_left_login">
            <img src="{{asset('images/3.png')}}" alt="">

        </div>
        <div class="container_right_login">
            <form method="POST" action="{{route('login.store')}}">
                @csrf
                @method('POST')
                <div class="title-login">Login</div>
                <div class="conatiner_body_login">
                    <div class="item-login">
                        <label for="">Email ou Cpf</label>
                        <input type="text"  name='email'>
                    </div>
                    <div class="item-login">
                        <label for="">Senha</label>
                        <input type="password" name='password'>
                    </div>
                    <div class="container_login-btn">
                        <button type="submit">Login</button>
                    </div>
                
                </div>
            
            </form>
        </div>
    </div>
    
</body>
</html>