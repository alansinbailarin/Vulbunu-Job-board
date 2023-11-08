<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
