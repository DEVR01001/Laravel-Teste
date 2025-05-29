<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ingresso</title>
</head>
<body>
    <h1>Olá, {{ $usuario->name }}</h1>
    <p>Seu ingresso para o evento <strong>{{ $evento }}</strong> foi gerado com sucesso!</p>
    <p>Cadeira: <strong>{{ $cadeira }}</strong></p>
    <p>O QR Code está **anexado** neste e-mail.</p>
    <div class="qr-code" style="width: 200px; margin: auto;">
        <img src="{!! $qrcode !!}" alt="">
    </div>
</body>
</html>
