<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')

    <title>Stephan's DEV blog | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('stylesheets')
</head>
<body>
    <div id="app">
        <navbar></navbar>
        <main class="relative pt-24 container mx-auto p-4 max-w-4xl leading-normal">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @if(env('production'))
        <script async defer data-website-id="3df951b3-d405-4fb9-a4f6-bbdc60dadba0" src="https://umami.stephantromer.dev/umami.js"></script>
    @endif
    @stack('scripts')
</body>
</html>

