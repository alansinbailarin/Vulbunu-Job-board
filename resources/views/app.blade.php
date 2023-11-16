<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML Meta Tags -->
    <title>Vulbunu - Find the best offers that fit your needs</title>
    <meta name="description"
        content="Search our vast list of jobs published daily and available talents, find the one that best suits you">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.vulbunu.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Vulbunu - Find the best offers that fit your needs">
    <meta property="og:description"
        content="Search our vast list of jobs published daily and available talents, find the one that best suits you">
    <meta property="og:image" content="https://i.postimg.cc/nrkkj9HX/imgprom.jpg">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="vulbunu.com">
    <meta property="twitter:url" content="https://www.vulbunu.com">
    <meta name="twitter:title" content="Vulbunu - Find the best offers that fit your needs">
    <meta name="twitter:description"
        content="Search our vast list of jobs published daily and available talents, find the one that best suits you">
    <meta name="twitter:image" content="https://i.postimg.cc/nrkkj9HX/imgprom.jpg">

    <!-- Meta Tags Generated via https://www.opengraph.xyz -->

    <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=USD"
        data-sdk-integration-source="button-factory" data-namespace="paypal_sdk"></script>

    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body class="text-gray-800 mb-0">
    @inertia
</body>

</html>
