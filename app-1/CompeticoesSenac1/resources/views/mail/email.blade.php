@component('mail::message')
# Olá {{ $user->first_name }}!

Seu ingresso para o evento **{{ $evento->name }}** está pronto.

- **Setor**: {{ $chair->sector->name }}
- **Cadeira**: {{ $chair->number_chair }}
- **Data do Evento**: {{ $evento->date }}

---

## QR Code do ingresso:
<img src="{{ $qrcodeBase64 }}" width="200" height="200" alt="QR Code do ingresso" />

Você também receberá um PDF com todos os detalhes.

Obrigado por sua compra!  
@endcomponent
