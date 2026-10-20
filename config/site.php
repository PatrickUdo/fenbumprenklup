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
    // LET OP: placeholders, vervangen door de echte gegevens.
    'company' => [
        'name' => 'Fenbump Renklup',
        'visit' => [
            'street' => 'Straatnaam 1',
            'postcode' => '1234 AB',
            'city' => 'Winterswijk',
        ],
        // Ontvanger van het contactformulier (niet zichtbaar op de site).
        'contact_recipient' => env('CONTACT_RECIPIENT', 'info@example.nl'),
        'kvk' => '00000000',
        'vat' => 'NL000000000B01',
        'hours' => 'Alleen op afspraak',
    ],

];
