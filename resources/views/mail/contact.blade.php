Nieuw bericht via het contactformulier van {!! config('app.name') !!}

Naam: {!! $data['name'] !!}
E-mail: {!! $data['email'] !!}
Telefoon: {!! $data['phone'] ?: 'niet opgegeven' !!}
Ontvangen: {{ $sentAt->locale('nl')->translatedFormat('j F Y \o\m H:i') }}

Bericht:
{!! $data['message'] !!}

--
Beantwoorden gaat rechtstreeks naar {!! $data['name'] !!}.
