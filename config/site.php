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

    // Cookiebanner van Cookiebot. Zonder ID in .env wordt er niets geladen.
    'cookiebot' => [
        'id' => env('COOKIEBOT_ID'),
    ],

    // Zoekmachines en delen op social media, per route. Titels tot ~60 tekens,
    // beschrijvingen tot ~155 tekens; afbeeldingen 1200×630 in public/images/og.
    'seo' => [
        'default_image' => 'images/og/home.jpg',
        'pages' => [
            'home' => [
                'title' => "Fenbump Renklup | Klassieke auto's in Winterswijk",
                'description' => "Onderhoud, reparatie en historisch correcte restauratie van klassieke auto's in onze werkplaats in Winterswijk. Met oog voor elk origineel detail.",
                'image' => 'images/og/home.jpg',
            ],
            'projecten' => [
                'title' => 'Projecten uit de werkplaats – Fenbump Renklup',
                'description' => "Een kijkje in de werkplaats van Fenbump Renklup in Winterswijk: restauraties, motorrevisies en onderhoud aan klassieke auto's.",
                'image' => 'images/og/projecten.jpg',
            ],
            'collectie' => [
                'title' => "Collectie klassieke auto's – Fenbump Renklup",
                'description' => "Klassiekers te koop bij Fenbump Renklup in Winterswijk: Jaguar E-Type V12, Ferrari 330 GT, Talbot 3-Litre, Citroën DS19 Cabriolet en Glas 1700 GT.",
                'image' => 'images/og/collectie.jpg',
            ],
            'wie-zijn-wij' => [
                'title' => 'Wie zijn wij – Fenbump Renklup',
                'description' => "Maak kennis met Fenbump Renklup: vakmensen in Winterswijk met een diepgewortelde liefde voor historische techniek en klassieke auto's.",
                'image' => 'images/og/wie-zijn-wij.jpg',
            ],
            'cookies' => [
                'title' => 'Cookieverklaring – Fenbump Renklup',
                'description' => 'Cookieverklaring van Fenbump Renklup: de website gebruikt alleen functionele cookies, zonder tracking, analyse of advertenties.',
            ],
            'privacy' => [
                'title' => 'Privacyverklaring – Fenbump Renklup',
                'description' => 'Hoe Fenbump Renklup omgaat met uw persoonsgegevens: welke gegevens wij verwerken, waarom, hoe lang wij ze bewaren en welke rechten u heeft.',
            ],
            'contact' => [
                'title' => 'Contact – Fenbump Renklup',
                'description' => 'Neem contact op met Fenbump Renklup in Winterswijk voor onderhoud, reparatie of restauratie van uw klassieke auto. Bezoek op afspraak.',
            ],
        ],
    ],

];
