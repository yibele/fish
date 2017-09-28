
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bulma.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/override.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/start.css')}}">
    <script type="text/javascript" src="http://cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js?"></script>
    <script type="text/javascript" src="http://cdn.webfont.youziku.com/youziku.justtime.js"></script>
    <title></title>
    @stack('style')
</head>
<body>

    @include("_includes.stars")

    <div id="app">

        <transition name="slide-fade">
        <span v-show="message" class="messages notification is-danger is-pulled-right" style="position:absolute;right:0px;">
            ${message}
        </span>
        </transition>
        @include('_includes.nav')
        @yield('content')
    </div>

    @stack('javascript')
        <!-- Scripts -->
    @include('_includes.footer')
<script type="text/javascript" src='{{asset('js/app.js')}}'></script>
</body>
</html>




