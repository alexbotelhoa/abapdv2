<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>PDV</title>

    <style>
        body {
            padding: 20px;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>

    @component('navbar', ["current" => $current])
    @endcomponent

</head>
<body>

    <div class="container">
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>