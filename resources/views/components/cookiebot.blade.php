{{-- Cookiebanner. Synchroon en als eerste script, zodat Cookiebot scripts kan tegenhouden tot er toestemming is. --}}
@if ($id = config('site.cookiebot.id'))
    <script id="Cookiebot"
            src="https://consent.cookiebot.com/uc.js"
            data-cbid="{{ $id }}"
            data-culture="NL"
            data-blockingmode="auto"
            type="text/javascript"></script>
@endif
