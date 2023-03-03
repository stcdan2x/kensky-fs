<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kenzky Auctions</title>
        @routes
        @vite('resources/js/app.js')
        @inertiaHead

        <!-- Styles -->
        <style>body {background-color: gray;}</style>
    </head>
    <body class="antialiased">
        @inertia
    </body>
</html>
