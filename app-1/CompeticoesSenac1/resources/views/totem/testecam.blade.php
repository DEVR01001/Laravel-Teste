<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Scanner QR Code</title>
  <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
  <style>
    #reader { width: 320px; margin: 20px auto; }
    #result { text-align: center; font-size: 1.2rem; }
  </style>
</head>
<body>

  <div id="reader"></div>
  <div id="result">Escaneie um QR Code...</div>

  <script>
    const html5QrCode = new Html5Qrcode("reader");

    Html5Qrcode.getCameras().then(devices => {
      if (devices && devices.length) {
        const cameraId = devices[0].id;

        html5QrCode.start(
          cameraId,
          { fps: 10, qrbox: 250 },
          qrCodeMessage => {
            html5QrCode.stop(); 

            fetch('/check-qrcode', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
              },
              body: JSON.stringify({ qrcode: qrCodeMessage })
            })
            .then(response => response.json())
            .then(data => {
              document.getElementById('result').innerHTML = `
                ✅ ${data.message}<br>
                <strong>${data.conteudo}</strong>
              `;
            });
          },
          error => {
        
          }
        );
      }
    }).catch(err => {
      document.getElementById('result').innerText = "Erro ao acessar câmera: " + err;
    });
  </script>
</body>
</html>
