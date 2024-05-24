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
    <style>
        .statistics-container {
            padding: 2rem;
            background-color: #f7f7f7; /* Light gray background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .row {
            display: flex;
            margin-bottom: 1rem; /* Add margin between rows */
        }

        .box {
            flex: 1;
            margin-right: 1rem;
            padding: 1.5rem; /* Increase padding */
            background-color: #ffffff; /* White background */
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .box h2 {
            display: flex;
            align-items: right;
            justify-content: space-between;
            font-size: 1.25rem;
            font-weight: normal;
            padding: 1rem; /* Adjust padding */
        }

        .box h2 i {
            margin-left: 0.5rem;
        }

        .box p {
           
            font-size: 1.5rem; /* Increase font size */
            font-weight: bold; /* Bold font */
            margin: 0; /* Remove default margin */
        }

        .box h2 i {
            margin-left: 0.5rem;
        }

        .heading-container {
            background-color: #ffffff; /* White background */
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin-bottom: 2rem;
            width: 760px;
        }

        .heading-container h1 {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }






    </style>
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
    <div class="heading-container">
        <h1>Analytics</h1>
    </div>
    <div class="statistics-container">
    <div class="row">
            <div class="box">
                <h2>Total Users</h2>
                <p>{{ $totalUsers }}</p>
            </div>
            <div class="box">
                <h2>Total Products</h2>
                <p>{{ $totalProducts }}</p>
            </div>
            <div class="box">
                <h2>Total Orders</h2>
                <p>{{ $totalOrders }}</p>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <h2>Total Revenue</h2>
                <p>LKR {{ $totalRevenue }}</p>
            </div>
            <div class="box">
                <h2>Total Cost</h2>
                <p>LKR {{ $totalCost }}</p>
            </div>
            <div class="box">
                <h2>Average Order Value</h2>
                <p>{{ $averageOrderValue }}</p>
            </div>
        </div>

        <div class="empty-container">
              </div>




        </div>
    </div>
</div>
</body>
</html>
