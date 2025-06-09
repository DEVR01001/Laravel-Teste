<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste Cam</title>
</head>
<body>

    <video id="video"></video>

    <canvas id='canvas'></canvas>
    <button id='capture'>Capturar</button>


    <script>

        navigator.mediaDevices.getUserMedia({video: true})
        .then(function (mediaStream) {

            const video = document.querySelector('#video');
            video.srcObject = mediaStream;
            video.play();


        })
        .catch(function (err) {
            console.log('Não há permissões para acessar a webcam')
        })

        document.querySelector('#capture').addEventListener('click', function (e) {
            var canvas = document.querySelector("#canvas");  
            canvas.height = video.videoHeight;
            canvas.width = video.videoWidth;
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0)
        })


    </script>
    
</body>
</html>