<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Snoepfabriek van Melle</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Tilt+Prism&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-poppins mx-auto max-w-[93%]">
        @include('partials.nav')
        <div class="min-h-screen">
            @yield('content')         
        </div>
        @include('partials.footer')

        <script>
    // Listen for changes to the select elements
    $('#status_niveau, #status_update, #medewerker').change(function() {
        // Submit the form
        $('#filter-form').submit();
    });
</script>
    </body>
</html>