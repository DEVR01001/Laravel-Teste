@component('mail::message')
# Olá {{ $user->first_name }}!

Seu ingresso para o evento **{{ $evento->name }}** está pronto.

- **Setor**: {{ $chair->sector->name }}
- **Cadeira**: {{ $chair->number_chair }}
- **Data do Evento**: {{ $evento->date_event }}
- **Horário do Evento**: {{ $evento->time_event }}

---

## QR Code do ingresso:
<img src="{{ asset('images/' . $qrcode->img_qrcode) }}" width="100%" height="300" alt="QR Code do ingresso" />

Você também receberá um PDF com todos os detalhes.

Obrigado por sua Reserva!  
@endcomponent
