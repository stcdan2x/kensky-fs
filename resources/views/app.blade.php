<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kenzky Auctions</title>
        @vite('resources/js/app.js')
        @inertiaHead

        <!-- Styles -->
        <style>body {background-color: gray;}</style>
    </head>
    <body class="antialiased">
        <h1>Laravel Server test</h1>
        @inertia
    </body>
</html>
