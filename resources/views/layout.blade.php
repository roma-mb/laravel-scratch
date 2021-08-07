<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{--second parameter is a default--}}
        <title>@yield('title', 'scratch project')</title>

        <!-- Scripts example compiling assets-->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div id='app' class="container">
            {{--can send an another parameter as a variable @include('nav',['value' => '1234'])--}}
            @include('nav')
            @if(session()->has('message'))
                <div class="alert alert-success mt-2" role="alert">
                    <strong>Success</strong> {{ session()->get('message') }}
                </div>
            @endif
            @yield('content')
        </div>
    </body>
</html>
