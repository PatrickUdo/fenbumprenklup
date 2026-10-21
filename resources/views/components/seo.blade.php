@props([
    // Paginatitel zonder sitenaam; alleen gebruikt als config/site.php geen titel voor deze route heeft.
    'title' => null,
    // Voor pagina's zonder vaste route in config/site.php, zoals een auto uit de collectie
    'description' => null,
    'image' => null,
    // Extra kruimelpad tussen Home en deze pagina: [['naam', 'url'], ...]
    'breadcrumbs' => null,
    // Extra structured data voor deze pagina (schema.org-object)
    'schema' => null,
])

@php
    $company = config('site.company');
    $routeName = request()->route()?->getName();
    $page = config("site.seo.pages.{$routeName}", []);

    // Altijd het hoofddomein uit APP_URL, zonder querystring (bijv. ?preview=...).
    $base = rtrim(config('app.url'), '/');
    $canonical = $base.(request()->path() === '/' ? '/' : '/'.request()->path());

    $fullTitle = $page['title'] ?? ($title ? "{$title} – {$company['name']}" : $company['name']);
    $description = $page['description'] ?? $description;
    $image = $base.'/'.($page['image'] ?? $image ?? config('site.seo.default_image'));

    $business = [
        '@type' => 'AutoRepair',
        '@id' => $base.'/#bedrijf',
        'name' => $company['name'],
        'legalName' => $company['legal_name'],
        'url' => $base.'/',
        'logo' => $base.'/images/logo.png',
        'image' => $base.'/'.config('site.seo.default_image'),
        'description' => config('site.seo.pages.home.description'),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $company['visit']['street'],
            'postalCode' => $company['visit']['postcode'],
            'addressLocality' => $company['visit']['city'],
            'addressCountry' => 'NL',
        ],
        'vatID' => $company['vat'],
        'identifier' => [
            '@type' => 'PropertyValue',
            'propertyID' => 'KvK',
            'value' => $company['kvk'],
        ],
        'areaServed' => 'NL',
    ];

    $graph = [
        [
            '@type' => 'WebSite',
            '@id' => $base.'/#website',
            'url' => $base.'/',
            'name' => $company['name'],
            'inLanguage' => 'nl-NL',
            'publisher' => ['@id' => $base.'/#bedrijf'],
        ],
        $business,
    ];

    // Kruimelpad voor subpagina's: Home › Pagina (of een meegegeven pad)
    $navItem = collect(config('site.navigation'))->firstWhere('route', $routeName);
    $trail = $breadcrumbs ?? ($navItem && $routeName !== 'home' ? [[$navItem['label'], $canonical]] : []);
    if ($trail) {
        $graph[] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => collect([['Home', $base.'/'], ...$trail])
                ->values()
                ->map(fn (array $crumb, int $i) => ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $crumb[0], 'item' => $crumb[1]])
                ->all(),
        ];
    }

    if ($schema) {
        $graph[] = $schema;
    }

    $jsonLd = json_encode(
        ['@context' => 'https://schema.org', '@graph' => $graph],
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_PRETTY_PRINT,
    );
@endphp

<title>{{ $fullTitle }}</title>
@if ($description)
    <meta name="description" content="{{ $description }}">
@endif
<link rel="canonical" href="{{ $canonical }}">

<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ $company['name'] }}">
<meta property="og:locale" content="nl_NL">
<meta property="og:title" content="{{ $fullTitle }}">
@if ($description)
    <meta property="og:description" content="{{ $description }}">
@endif
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">

<script type="application/ld+json">{!! $jsonLd !!}</script>
