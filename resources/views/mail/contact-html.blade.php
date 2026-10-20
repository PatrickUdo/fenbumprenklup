@php
    // Mailprogramma's ondersteunen geen gewone CSS: alles inline en in tabellen.
    $ink = '#1a1815';
    $card = '#22201c';
    $line = '#38332d';
    $ivory = '#f2ebdd';
    $muted = '#a39d92';
    $brass = '#c8a96a';
    $serif = "'Cormorant Garamond', Georgia, 'Times New Roman', serif";
    $sans = "Jost, 'Helvetica Neue', Helvetica, Arial, sans-serif";

    $replySubject = rawurlencode('Re: uw bericht aan '.config('app.name'));
    $phoneHref = preg_replace('/[^\d+]/', '', (string) $data['phone']);
    $site = parse_url(config('app.url'), PHP_URL_HOST);
@endphp
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="dark">
    <meta name="supported-color-schemes" content="dark">
    <title>Nieuw bericht van {{ $data['name'] }}</title>
    <style>
        a { color: {{ $brass }}; }
        @media (max-width: 620px) {
            .card { padding: 32px 22px !important; }
            .label { display: block !important; width: auto !important; padding-bottom: 2px !important; border-bottom: 0 !important; }
            .value { display: block !important; padding-top: 0 !important; }
        }
    </style>
</head>
<body style="margin:0; padding:0; background-color:{{ $ink }}; -webkit-text-size-adjust:100%;">
    {{-- Voorbeeldtekst in de inbox --}}
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">
        {{ \Illuminate\Support\Str::limit($data['message'], 110) }}
    </div>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:{{ $ink }};">
        <tr>
            <td align="center" style="padding:40px 16px 48px;">
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="width:100%; max-width:600px;">
                    <tr>
                        <td align="center" style="padding:0 0 32px;">
                            <img src="{{ asset('images/logo.png') }}" width="150" alt="{{ config('app.name') }}" style="display:block; width:150px; height:auto; border:0;">
                        </td>
                    </tr>

                    <tr>
                        <td class="card" style="background-color:{{ $card }}; padding:44px 40px; border-top:1px solid {{ $line }};">
                            <h1 style="margin:0; font-family:{{ $serif }}; font-size:32px; line-height:1.15; font-weight:500; color:{{ $ivory }};">
                                Nieuw bericht via de website
                            </h1>
                            <p style="margin:10px 0 0; font-family:{{ $sans }}; font-size:14px; line-height:1.5; color:{{ $muted }};">
                                Ontvangen op {{ $sentAt->locale('nl')->translatedFormat('j F Y') }} om {{ $sentAt->format('H:i') }}
                            </p>

                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-top:32px; border-top:1px solid {{ $line }};">
                                @foreach ([
                                    ['Naam', e($data['name'])],
                                    ['E-mail', '<a href="mailto:'.e($data['email']).'" style="color:'.$brass.'; text-decoration:underline;">'.e($data['email']).'</a>'],
                                    ['Telefoon', $data['phone']
                                        ? '<a href="tel:'.e($phoneHref).'" style="color:'.$brass.'; text-decoration:underline;">'.e($data['phone']).'</a>'
                                        : '<span style="color:'.$muted.';">Niet opgegeven</span>'],
                                ] as [$label, $value])
                                    <tr>
                                        <td class="label" width="120" valign="top" style="width:120px; padding:14px 0; border-bottom:1px solid {{ $line }}; font-family:{{ $sans }}; font-size:14px; line-height:1.5; color:{{ $muted }};">
                                            {{ $label }}
                                        </td>
                                        <td class="value" valign="top" style="padding:14px 0; border-bottom:1px solid {{ $line }}; font-family:{{ $sans }}; font-size:16px; line-height:1.5; color:{{ $ivory }};">
                                            {!! $value !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            <p style="margin:32px 0 10px; font-family:{{ $sans }}; font-size:14px; line-height:1.5; color:{{ $muted }};">Bericht</p>
                            <p style="margin:0; font-family:{{ $serif }}; font-size:20px; line-height:1.55; color:{{ $ivory }};">
                                {!! nl2br(e($data['message'])) !!}
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin-top:36px;">
                                <tr>
                                    <td style="border:1px solid {{ $brass }};">
                                        <a href="mailto:{{ $data['email'] }}?subject={{ $replySubject }}"
                                           style="display:inline-block; padding:13px 26px; font-family:{{ $sans }}; font-size:15px; line-height:1; color:{{ $ivory }}; text-decoration:none;">
                                            Beantwoorden&nbsp;&nbsp;&rarr;
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding:28px 12px 0; font-family:{{ $sans }}; font-size:12px; line-height:1.6; color:{{ $muted }};">
                            Verstuurd via het contactformulier op {{ $site }}.<br>
                            Beantwoorden gaat rechtstreeks naar {{ $data['name'] }}.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
