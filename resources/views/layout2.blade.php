<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="">image
            <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

            <title>Laravel CRUD</title>

            <!-- Custom styles for this template -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" type="text/css" />
            <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
            <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
            <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
            <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
            <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
            <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
            <meta name="theme-color" content="#7952b3">

            <style>
                .bd-placeholder-img
                {
                    font-size: 1.125rem;
                    text-anchor: middle;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    user-select: none;
                }

                @media (min-width: 768px)
                {
                    .bd-placeholder-img-lg
                    {
                        font-size: 3.5rem;
                    }
                }
            </style>
        </head>
        <body data-dashlane-rid="480cb2c1aaceacbc" data-form-type="">
            <div class="container">
                @yield('content2')
            </div>
            <script src="{{ asset('js/app.js') }}" type="text/js"></script>
            <script src="{{ asset('js/dashboard.js') }}" type="text/js"></script>
        </body>
    </html>