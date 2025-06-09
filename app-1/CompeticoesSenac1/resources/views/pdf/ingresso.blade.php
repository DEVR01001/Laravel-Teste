<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ingresso</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .qrcode { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Ingresso para o evento {{ $evento->name }}</h2>
    <p><strong>Nome:</strong> {{ $user->name }}</p>
    <p><strong>Cadeira:</strong> {{ $chair->name }}</p>
    <p><strong>Setor:</strong> {{ $setor->name }}</p>

    <div class="qrcode">
        <img src="{{ $qrcodeBase64 }}" alt="QR Code" width="200">
    </div>
</body>
</html>
