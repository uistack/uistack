<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>{{ \UiStacks\Settings\Models\Setting::find(1)->value }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('public/website_assets/images/fav.png') }}">
    <meta name="description" content="Material Style Theme">
    <link rel="shortcut icon" href="{{ asset('public/website_assets/img/favicon30f4.png?v=3') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/preload.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/style.light-blue-500.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/width-boxed.min.css') }}" id="ms-boxed" disabled="">
    <!--[if lt IE 9]>
    <script src="{{ asset('public/website_assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<div id="ms-preload" class="ms-preload">
    <div id="status">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
</div>
<div class="bg-full-page bg-primary back-fixed">
    <div class="mw-500 absolute-center">
        <div class="card animated zoomInUp animation-delay-7 color-primary withripple">
            <div class="card-block">
                <div class="text-center color-dark">
                    <h1 class="color-primary text-big">Error 404</h1>
                    <h2>Page Not Found</h2>
                    <p class="lead lead-sm">We have not found what you are looking for.
                        <br>We have put our robots to search.</p>
                    <a href="{{url('/')}}" class="btn btn-primary btn-raised">
                        <i class="zmdi zmdi-home"></i> Go Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/website_assets/js/plugins.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/website_assets/js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/website_assets/js/configurator.min.js') }}" type="text/javascript"></script>
<script>
    (function(i, s, o, g, r, a, m)
    {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function()
        {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-90917746-1', 'auto');
    ga('send', 'pageview');
</script>
<script src="{{ asset('public/website_assets/js/index.js') }}" type="text/javascript"></script>
</body>
</html>