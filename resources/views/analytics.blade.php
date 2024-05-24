<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="font-sans text-gray-900 antialiased">
<div style="background-image: url('../images/background.png'); background-size: cover;" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" class="w-40 h-40 fill-current">
        </a>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div style="background-color: white; padding: 30px;" class="analytics-container">
        <h1 class="analytics-heading">Analytics</h1>

        <div  style="background-color: white;" class="chart-container">
            <h2>Most Sold Items</h2>
            <canvas id="mostSoldItemsChart" width="700" height="350"></canvas>
        </div>

        <!-- Add more chart containers here -->
    </div>

    @section('scripts')
        <script>
            // Define a global variable to hold the JSON data
            window.mostSoldItemsData = <?= json_encode($mostSoldItems) ?>;
        </script>
        <script src="{{ asset('js/analytics.js') }}"></script> <!-- Include your analytics script -->
    @show

</div>
</body>
</html>
