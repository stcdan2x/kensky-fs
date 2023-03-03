<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kenzky Auctions</title>
        @routes
        @vite('resources/js/app.js')
        @inertiaHead

    </head>
    <body class="bg-gray-300 dark:bg-gray-800 text-black dark:text-white antialiased">
        @inertia
    </body>
</html>
