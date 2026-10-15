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

    // Bedrijfsgegevens voor de footer.
    // LET OP: placeholders, vervangen door de echte gegevens.
    'company' => [
        'name' => 'Fenbump Renklup',
        'visit' => [
            'street' => 'Straatnaam 1',
            'postcode' => '1234 AB',
            'city' => 'Fenbump',
        ],
        // Ontvanger van het contactformulier (niet zichtbaar op de site).
        'contact_recipient' => env('CONTACT_RECIPIENT', 'info@example.nl'),
        'kvk' => '00000000',
        'vat' => 'NL000000000B01',
        'hours' => 'Alleen op afspraak',
    ],

];
