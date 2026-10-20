<?php

return [

    // Hoofdmenu, gebruikt door de navbar en de footer.
    'navigation' => [
        ['label' => 'Home', 'route' => 'home'],
        ['label' => 'Projecten', 'route' => 'projecten'],
        ['label' => 'Collectie', 'route' => 'collectie'],
        ['label' => 'Wie zijn wij', 'route' => 'wie-zijn-wij'],
        ['label' => 'Contact', 'route' => 'contact'],
    ],

    // "Hier komt wat moois"-pagina. Staat deze aan, dan ziet iedereen die pagina,
    // behalve ingelogde Twill-gebruikers en wie de previewlink heeft geopend
    // (/?preview=<COMING_SOON_SECRET>). Het beheer (/admin) blijft bereikbaar.
    'coming_soon' => [
        'enabled' => (bool) env('COMING_SOON', false),
        'secret' => env('COMING_SOON_SECRET'),
    ],

    // Bedrijfsgegevens voor de footer.
    'company' => [
        'name' => 'Fenbump Renklup',
        // Statutaire naam, voor de copyrightregel.
        'legal_name' => 'Fenbump Renklup B.V.',
        'visit' => [
            'street' => 'Ambachtsstraat 31',
            'postcode' => '7102 DW',
            'city' => 'Winterswijk',
        ],
        // Ontvanger van het contactformulier. Staat bewust alleen in .env:
        // de repository is openbaar en het adres mag nergens zichtbaar zijn.
        'contact_recipient' => env('CONTACT_RECIPIENT'),
        'kvk' => '99844214',
        'vat' => 'NL869156111B01',
        'hours' => 'Alleen op afspraak',
    ],

];
