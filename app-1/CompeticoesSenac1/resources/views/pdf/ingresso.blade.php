<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ingresso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .ingresso-container {
            width: 700px;
            margin: 20px auto;
            border: 2px solid #FF9A0D;
            border-radius: 10px;
            padding: 20px;
        }

        .header, .footer {
            background-color: #FF9A0D;
            height: 20px;
            border-radius: 10px;
        }

        .logo {
            text-align: center;
            margin: 20px 0;
        }

        .logo img {
            height: 100px;
        }

        .qrcode {
            text-align: center;
            margin: 20px 0;
        }

        .qrcode img {
            width: 200px;
            height: 200px;
        }

        .text {
            margin: 20px 0;
            text-align: justify;
            line-height: 1.6;
        }

        .info-box {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        .info-item {
            margin-bottom: 10px;
        }

        .info-label {
            font-weight: bold;
            color: #555;
        }

        .info-value {
            margin-left: 5px;
            color: #000;
        }
    </style>
</head>
<body>

    <div class="ingresso-container">

        <div class="header"></div>

        <div class="logo">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo do Evento">
        </div>

        <div class="qrcode">
            <p><strong>Código QRCode:</strong> 343434343</p>
            <img src="{{ $qrcodeBase64 }}" alt="QR Code">
        </div>

        <div class="text">
            <p>Olá, <strong>{{ $user->first_name }}</strong>!</p>
            <p>
                Sua inscrição para o evento “<strong>{{ $evento->name }}</strong>” foi confirmada com sucesso.
                Segue o seu ingresso para apresentação no dia do evento. 
                Fique atento(a) ao horário e local! Esperamos você lá!
            </p>
        </div>

        <div class="info-box">
            <div class="info-item">
                <span class="info-label">Local:</span>
                <span class="info-value">{{ $evento->street }}, {{ $evento->number }} - {{ $evento->neighborhood }}, {{ $evento->city }}</span>
            </div>

            <div class="info-item">
                <span class="info-label">Data e Hora:</span>
                <span class="info-value">{{ $evento->date_event }} - {{ $evento->time_event }}</span>
            </div>

            <div class="info-item">
                <span class="info-label">Assento:</span>
                <span class="info-value">{{ $setor->name }} - Cadeira {{ $chair->name }}°</span>
            </div>
        </div>

        <div class="footer"></div>

    </div>

</body>
</html>
