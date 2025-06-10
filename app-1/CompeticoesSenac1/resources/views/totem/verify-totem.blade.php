<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
    <link rel="stylesheet" href="{{ asset('css/totem.css') }}">


    <title>Document</title>
</head>
<body>

    <div class="container_totem">
        <div class="conatiner_header_totem">
        <a href="">Totem N° 1</a>
        <a href=""><i class="fa-solid fa-arrow-right-from-bracket"></i>Sair</a>
    </div>
    
    <div class="conatiner_header_body">

        <div class="conatiner_camera">
            <video id="video"></video>
        </div>

        <div class="contairner_text_totem">
            <p>Acesse a câmera para escanear o qrcode</p>
            <span>Ou</span>
            <p>Digite o código do qrcode</p>
        </div>

        <div class="container_search_totem">

            <div class="item-totem">
                <label for="">Código qrcode</label>
                <select class="js-example-basic-single search_users" style="width: 100%"></select>
            </div>

            <div class="container_btn_totem">
                <button id="btnValidar">Validar</button>

            </div>



        </div>

    </div>

    <dialog id='modalValid'>

    
    
    </dialog>
    

    </div>
    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/qrcode/build/qrcode.min.js"></script>






<script>
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function (mediaStream) {
            const video = document.querySelector('#video');
            video.srcObject = mediaStream;
            video.play();
        })
        .catch(function () {
            console.log('Não há permissões para acessar a webcam');
        });

    $('.js-example-basic-single').select2({
        ajax: {
            url: '{{ route('qrcode.getCodQrcode') }}',
            dataType: 'json'
        }
    });

    document.querySelector('#btnValidar').addEventListener('click', function () {
        const codigo = $('.js-example-basic-single').val();

        if (!codigo) {
            alert('Selecione ou digite o código QR');
            return;
        }

        $.ajax({
            url: `api/qrcode/valid/${codigo}`, 
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
            }
        }).done(function (res) {
            const modalValid = document.getElementById('modalValid');

            let htmlContent = `
                <div class="modal_header">
                      <i class="fa-solid ${res.success ? 'fa-check' : 'fa-xmark'}"></i>
                    <h6>
                        ${res.msg}!
                    </h6> 
                </div>
                <div class="conatiner_modal-btn">
                    <button id='bnt-fn-totem' class="btn-fn-venda">Salvar</button>
                </div>
            `;

            modalValid.innerHTML = htmlContent;
            modalValid.showModal();

            $(document).on('click', '#bnt-fn-totem', function () {
                window.location.reload();
            });

        }).fail(function (err) {
            alert('Erro ao validar o código. Verifique o console.');
            console.error(err);
        });
    });
</script>






</body>
</html>