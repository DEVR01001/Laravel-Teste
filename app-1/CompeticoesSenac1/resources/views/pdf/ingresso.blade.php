{{-- <!DOCTYPE html>
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
</html> --}}





<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Ingresso</title>
</head>
<body>

    <style>
        

@import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');



*{
    font-family: "Inter", sans-serif;
}





.container_ingresso{
    width: 100%;
    justify-self: center;
    align-self: center;
    flex-direction: column;
 
}



.container_ingresso_header{
    display: flex;
    justify-content: space-between;
 
}

.container_ingresso_footer{
    display: flex;
    justify-content: space-between;

}




.shape-ingresso-2{
    display: flex;
    width: 25%;
    height: 120px;
    background-color: #FF9A0D;
    border-radius: 0px 0px 10px 10px;

}
.shape-ingresso{
    display: flex;
    width: 25%;
    height: 120px;
    background-color: #FF9A0D;
    border-radius: 10px 10px 0px 0px;
}


.container_ingresso_body{
    background-color: #FF9A0D;
    padding: 1rem;
}



.container_border_ingresso{
    display: flex;
    border: 1px solid #8f530036;
    padding: 1rem;
    border-radius: 5px;
}

.container_primary_ingresso{
    background-color: white;
    display: flex;
    padding: 2rem;
    flex-direction: column;
    border-radius: 10px;
    gap: 2rem;
}

.logo-ingresso{
    display: flex;
    width: 100%;
    justify-content: center;
    
}


.logo-ingresso img{
    display: flex;
    width: 40%;
    height: 150px;
    object-fit: cover;
}





.container_qrcode{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 10px;
    color: #7D7D7D;
}




.conatiner_text_ingresso{
    display: flex;
    color: #525252;

    text-align: justify;
    line-height: 22px;

}



.container_local_data_chair_ingresso{
    display: flex;
    flex-direction: column;
    gap: 1rem;
    align-items: center;
    justify-content: center;

}



.item-ingresso{
    display: flex;
    width: 60%;
    gap: 1rem;
  

}

.item-ingresso i{
    color: #7D7D7D
;
    font-size: 1.5rem;
    padding-top: 1rem;
}


.conatiner-text-item-ingresso{
    display: flex;
    flex-direction: column;
}
.conatiner-text-item-ingresso p{
    font-size: 1rem;
    color: #525252;
    font-weight: 600;
}

.conatiner-text-item-ingresso span{
    font-size: 0.9rem;
    color: #7D7D7D;
    font-weight: 500;
}

.shape-linha{
    width: 60%;
    height: 1px;
    background-color: #ececec;
}
    </style>



    <div class="container_ingresso">


        <div class="container_ingresso_header">
            <div class="shape-ingresso"></div>
            <div class="shape-ingresso"></div>
        </div>
        <div class="container_ingresso_body">
            <div class="container_border_ingresso">
                <div class="container_primary_ingresso">

                    <div class="logo-ingresso"><img src="" alt=""></div>

                    <div class="container_qrcode">
                        <p>Código Qrcode: 343434343</p>
                        <img src="{{ $qrcodeBase64 }}" alt="QR Code" width="300" height="300px">
                    </div>

                    <div class="conatiner_text_ingresso">

                        Olá, {{$user->first_name}} !

                        Sua inscrição para o evento “{{$evento->name}}” foi confirmada com sucesso.
                        Segue o seu ingresso para apresentação no dia do evento.
                        
                        Fique atento(a) ao horário e local!Esperamos você lá!

                    </div>

                    <div class="container_local_data_chair_ingresso">
                        <div class="item-ingresso">
                            <i class="fa-solid fa-location-dot"></i>
                            <div class="conatiner-text-item-ingresso">
                                <p>Local do seu evento:</p>
                                <span> {{$evento->street}}, {{$evento->number}} {{$evento->neighborhood}},{{$evento->city}}, </span>
                            </div>
                        </div>
                        <div class="shape-linha"></div>
                        <div class="item-ingresso">
                            <i class="fa-solid fa-calendar"></i>
                            <div class="conatiner-text-item-ingresso">
                                <p>Data e Hora:</p>
                                <span>{{$evento->date_event}}  -  {{$evento->time_event}} </span>
                            </div>
                        </div>
                        <div class="shape-linha"></div>
                        <div class="item-ingresso">
                            <i class="fa-solid fa-bookmark"></i>
                            <div class="conatiner-text-item-ingresso">
                                <p>Assento:</p>
                                <span>{{$setor->name}} - Cadeira {{$chair->name}}°</span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container_ingresso_footer">
                <div class="shape-ingresso-2"></div>
                <div class="shape-ingresso-2"></div>
            </div>
        </div>
    
    

    </div>
    
</body>
</html>