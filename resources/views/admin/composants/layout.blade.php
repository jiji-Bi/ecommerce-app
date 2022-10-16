<!doctype html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin </title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/manifest.json">
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png"> --}}
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('/Admin-assets/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('/Admin-assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <link rel="icon" href="{{ asset('/img/onlineshop.png') }}">
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png"> --}}

    <style>
        body {
            opacity: 0;
        }
    </style>
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0">
            @include('admin.composants.sidebar')
            @yield('sidebar')
            @include('admin.composants.navbar')
            @yield('navbar')

            @yield('content')
        </div>
    </main>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

    @yield('javascript')
    </body>
    </html>
    <script src="{{ asset('Admin-assets/js/phoenix.js') }}"></script>
    <script src="{{ asset('Admin-assets/js/ecommerce-dashboard.js') }}"></script>
    </body>
    </html>

</body>

</html>
