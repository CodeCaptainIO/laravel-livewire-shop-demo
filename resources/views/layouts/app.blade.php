<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Snackbar</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>

        @yield('content')

        <div class="text-center mt-5">
            <a href="https://www.codecaptain.io/?utm_source=livewire_shop_demo" target="_blank">
                <img src="/cc_logo_transp_med.png" alt="CodeCaptain" width="100" style="opacity: 0.25" />
            </a>
        </div>

        <script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>
