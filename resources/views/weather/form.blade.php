<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="min-h-screen">
            <div class="flex content-center justify-center">
                <div id="wrapper"></div>
            </div>

            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        </div>
    </body>
</html>
