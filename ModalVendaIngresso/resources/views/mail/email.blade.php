<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ingresso Confirmado</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #2c3e50;
        }
        p {
            font-size: 16px;
            margin: 12px 0;
        }
        .highlight {
            font-weight: bold;
            color: #2980b9;
        }
        .qr-code {
            margin-top: 25px;
        }
        .qr-code img {
            width: 180px;
            height: auto;
            border: 4px solid #2980b9;
            border-radius: 10px;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Olá, {{ $user->name }} 👋</h1>
        <p>Seu ingresso para o evento <span class="highlight">{{ $evento }}</span> foi gerado com sucesso!</p>
        <p>Sua cadeira: <span class="highlight">{{ $chair->number_cadeira }}</span></p>
        <p>O QR Code está <strong>anexado neste e-mail</strong>.</p>

        <div class="qr-code">
            <img src="{{ $qrcode }}" alt="QR Code do Ingresso">
        </div>

        <div class="footer">
            Apresente este ingresso na entrada do evento.<br>
            Obrigado por participar!
        </div>
    </div>
</body>
</html>
