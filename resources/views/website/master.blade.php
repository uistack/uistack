<!DOCTYPE html>
<html class="@if(\Request::segment(2) =="login" || \Request::segment(2) =='register') hide-sidebar ls-bottom-footer @elseif(\Request::segment(2) == "user") st-layout ls-top-navbar-large ls-bottom-footer show-sidebar sidebar-l3 @elseif(\Request::segment(1) !="") st-layout ls-top-navbar-large ls-bottom-footer show-sidebar sidebar-l1 sidebar-r3 @else transition-navbar-scroll top-navbar-xlarge bottom-footer @endif" lang="en">
<head>
    {{--<meta charset="utf-8">--}}
    {{--<meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<meta name="description" content="">--}}
    {{--<meta name="author" content="">--}}
    {{--<title>Learning</title>--}}
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>{{ \UiStacks\Settings\Models\Setting::find(1)->value }} - Web Design & Developer Console</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url("/") }}/public/website_assets/img/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="{{ url("/") }}/public/website_assets/img/ui-stacks.png">
    <link rel="canonical" href="https://www.uistacks.com/">
    <meta name="description" content="UiStacks is a custom web design & development company that offers IT consulting service to it's customers, Web development service with Best quality.">
    <!-- Facebook META -->
    <meta property="fb:app_id" content="112146496123745">
    <meta property="og:url" content="https://www.uistacks.com/">
    <meta property="og:title" content="uistacks.com">
    <meta property="og:description" content="UiStacks a web design and development solution , at UiStacks our mission to help businesses throughout the world realize their potential , UiStacks , UiStacksindia , UiStacks india">

    <meta name="twitter:url" content="https://www.uistacks.com/">
    <meta name="twitter:title" content="UiStacks: Subscription Billing & Recurring Payments Software">
    <meta name="twitter:description" content="UiStacks lets you automate your recurring billing, manage subscriptions at scale and access metrics that matter.">
    <meta property="og:image" content="https://www.UiStacks.com/public/website_assets/img/logo-200x200.png">
    <meta property="og:site_name" content="UiStacks">
    <meta property="og:type" content="website">
    {{--<meta name="twitter:account_id" content="321192908">--}}
    {{--<meta name="twitter:card" content="summary">--}}
    {{--<meta name="twitter:site" content="@uistacks">--}}
    {{--<meta name="twitter:creator" content="@uistacks">--}}
    {{--<meta name="twitter:image:src" content="static/resources/og-image.png">--}}
    <meta name="twitter:domain" content="https://www.uistacks.com/">


    <!-- Compressed Vendor BUNDLE
    Includes vendor (3rd party) styling such as the customized Bootstrap and other 3rd party libraries used for the current theme/module -->
    <link href="{{ asset('public/website_assets/css/vendor.min.css') }}" rel="stylesheet">
    <!-- Compressed Theme BUNDLE
Note: The bundle includes all the custom styling required for the current theme, however
it was tweaked for the current theme/module and does NOT include ALL of the standalone modules;
The bundle was generated using modern frontend development tools that are provided with the package
To learn more about the development process, please refer to the documentation. -->
    <!-- <link href="css/theme.bundle.min.css" rel="stylesheet"> -->
    <!-- Compressed Theme CORE
This variant is to be used when loading the separate styling modules -->
    <link href="{{ asset('public/website_assets/css/theme-core.min.css') }}" rel="stylesheet">
    <!-- Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->
    <link href="{{ asset('public/website_assets/css/module-essentials.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-material.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-layout.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-sidebar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-sidebar-skins.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-navbar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-messages.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-carousel-slick.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-charts.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-maps.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-colors-alerts.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-colors-background.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-colors-buttons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/website_assets/css/module-colors-text.min.css') }}" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- in your header -->
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/devicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/devicon-colors.css') }}">
    <script src="{{ asset('public/website_assets/js/jquery-3.1.1.min.js') }}" type="text/javascript" ></script>
    @yield('header')
</head>
{{--<body class="@if(\Request::segment(2) =="login" || \Request::segment(2) =='register') login @endif">--}}
<body>
<!-- Fixed navbar -->

@include('website.blocks.message')
<!-- Start Main Body Content -->
@yield('content')
<!-- Inline Script for colors and config objects; used by various external scripts; -->
<script>
    var colors = {
        "danger-color": "#e74c3c",
        "success-color": "#81b53e",
        "warning-color": "#f0ad4e",
        "inverse-color": "#2c3e50",
        "info-color": "#2d7cb5",
        "default-color": "#6e7882",
        "default-light-color": "#cfd9db",
        "purple-color": "#9D8AC7",
        "mustard-color": "#d4d171",
        "lightred-color": "#e15258",
        "body-bg": "#f6f6f6"
    };
    var config = {
        theme: "html",
        skins: {
            "default": {
                "primary-color": "#42a5f5"
            }
        }
    };
</script>
<!-- Separate Vendor Script Bundles -->
<script src="{{ asset('public/website_assets/js/vendor-core.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/vendor-countdown.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/vendor-tables.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/vendor-forms.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/vendor-carousel-slick.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/vendor-player.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/vendor-charts-flot.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/vendor-nestable.min.js') }}"></script>
<!-- <script src="js/vendor-angular.min.js"></script> -->
<!-- Compressed Vendor Scripts Bundle
Includes all of the 3rd party JavaScript libraries above.
The bundle was generated using modern frontend development tools that are provided with the package
To learn more about the development process, please refer to the documentation.
Do not use it simultaneously with the separate bundles above. -->
<!-- <script src="js/vendor-bundle-all.min.js"></script> -->
<!-- Compressed App Scripts Bundle
Includes Custom Application JavaScript used for the current theme/module;
Do not use it simultaneously with the standalone modules below. -->
<!-- <script src="js/module-bundle-main.min.js"></script> -->
<!-- Standalone Modules
As a convenience, we provide the entire UI framework broke down in separate modules
Some of the standalone modules may have not been used with the current theme/module
but ALL the modules are 100% compatible -->
<script src="{{ asset('public/website_assets/js/module-essentials.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-material.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-layout.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-sidebar.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-carousel-slick.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-player.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-messages.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-maps-google.min.js') }}"></script>
<script src="{{ asset('public/website_assets/js/module-charts-flot.min.js') }}"></script>
<!-- [html] Core Theme Script:
    Includes the custom JavaScript for this theme/module;
    The file has to be loaded in addition to the UI modules above;
    module-bundle-main.js already includes theme-core.js so this should be loaded
    ONLY when using the standalone modules; -->
<script src="{{ asset('public/website_assets/js/theme-core.min.js') }}"></script>
@yield('footer')
</body>
</html>