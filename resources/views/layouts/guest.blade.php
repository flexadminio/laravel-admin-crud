<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ Vite::asset('resources/images/favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/sass/admin/app.scss'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-5 px-4">
                    <div class="text-center mb-4">
                        <a href="/">
                            <x-application-logo class="img-fluid" />
                        </a>
                    </div>

                    <div class="card shadow-sm rounded-0">
                        <div class="card-body p-4">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
