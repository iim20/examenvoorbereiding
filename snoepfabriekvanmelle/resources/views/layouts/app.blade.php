<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Snoepfabriek van Melle</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Tilt+Prism&display=swap" rel="stylesheet">

        @vite('resources/css/app.css', 'resources/js/app.js')
    </head>
    <body class="font-poppins mx-auto max-w-[93%]">
        @include('partials.nav')
        <div class="min-h-screen">
            @yield('content')
        </div>
        @include('partials.footer')
    </body>
</html>
 