<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <div id="app">
        @include('includes.components.header')

        @if(session()->has('message') || session()->has('error'))
        <div class="session-message m-4" id="flashMessage">
            <div class="alert alert-{{(session()->has('message')) ? 'success' : 'danger'}} d-flex justify-content-between" id="flashAlert">
                @if(session()->has('message'))
                <div class="message-text  w-100 text-center h3">
                    {{ session('message') }}
                </div>
                @elseif(session()->has('error'))
                <div class="message-text  w-100 text-center h3">
                    {{ session('error') }}
                </div>
                @endif
                <div class="cross-close " id="closeFlashMsg">
                    X
                </div>
            </div>
        </div>
        @endif
        <main class="main vh-100 py-4">
            <div class=" main-content h-100 row ">
                @include('includes.main-components.side_bar_links')
                <div class=" col-6 bg-danger">
                    <div class="main-content-container bg-light">
                        @yield('content')
                    </div>
                </div>
                @include('includes.main-components.side_bar_search')
            </div>
        </main>
    </div>
</body>

</html>