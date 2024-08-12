<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML Meta Tags -->
    <meta property="og:url" content="https://www.vulbunu.com">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="vulbunu.com">
    <meta property="twitter:url" content="https://www.vulbunu.com">

    <!-- Meta Tags Generated via https://www.opengraph.xyz -->

    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"
        data-sdk-integration-source="button-factory" data-namespace="paypal_sdk"></script>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8853719818662784"
        crossorigin="anonymous"></script>

    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-H2JLXWGRTH"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-H2JLXWGRTH');
</script>

<body class="text-gray-800 mb-0">
    @inertia
</body>

</html>
