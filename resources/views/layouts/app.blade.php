<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Green Market') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    
    <body class="font-sans antialiased">

    <div class="min-h-screen" style="background-image: url('../images/background.png'); background-size: cover;">

        

    @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-green shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <div class="min-h-screen" style="background-image: url('../images/background.png'); background-size: cover; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <main>
            @yield('content')
            </main>
</div>

            
        </div>

    </body>
</html>
