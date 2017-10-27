<!doctype html>
<html>
<head>
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

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/burger-menu.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/new.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/header.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/footer.css') }}" />
    <meta name="msvalidate.01" content="2541484BA40CEA7D4C741B000D54FFA3" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{--<script src="{{ asset('public/website_assets/js/vwo.js') }}"></script>--}}
    @yield('header')
</head>

<body class="body">
@include('website.blocks.message')
<!-- =====================================================================================
Header Part start
====================================================================================== -->


<!-- =====================================================================================
Mobile Header start
====================================================================================== -->

<!-- =====================================================================================
Mobile Header end
====================================================================================== -->
<!-- =====================================================================================
Header Part end
====================================================================================== -->
<!-- Start Main Body Content -->
@yield('content')


<!-- End Main Body Content -->

<!-- =====================================================================================
Footer Part start
====================================================================================== -->

<!-- =====================================================================================
Footer Part end
====================================================================================== -->
<!-- =====================================================================================
Logo asset download start
====================================================================================== -->

<!-- =====================================================================================
Logo asset download End
====================================================================================== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="{{ asset('public/website_assets/js/mustache.js') }}"></script>
{{--<script src="{{ asset('public/website_assets/js/tp_snippets.js') }}"></script>--}}
{{--<script>--}}
    {{--TpJsSnippet.init("website");--}}
{{--</script>--}}
<script src="{{ asset('public/website_assets/js/application.js') }}"></script>
<!-- Hover trigger security popover -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#popoverData').popover({
            placement: 'top',
            trigger: 'hover',
            html: true,
            content: '<div class="blk-security-pop"><div class="blk-security-text">UiStacks is compliant with PCI-DSS and the EU-U.S. Privacy Shield Framework. Your data is safe with us.</div><div class="blk-security-images"><div class="blk-security-image"><img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/privacy/control-case-logo.png" alt="" height="30"></div><div class="blk-security-image"><img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/privacy/pci-logo.png" alt="" height="30"></div><div class="blk-security-image"><img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/privacy/truste-logo.png" alt="" height="40"></div></div></div>'
        });
    });
</script>
<!--typekit async-->
{{--<script type="text/javascript" src="{{ asset('public/website_assets/js/typekit-dyq8zgf.js') }}"></script>--}}
<!--begin Control Case ASV PCI code-->
{{--<script language='javascript'>--}}
    {{--function CCPopUp(SEALURL, cId) {--}}
        {{--window.open("" + SEALURL + "index.php?page=showCert&cId=" + cId + "", "win", 'toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=700,height=585');--}}
        {{--self.name = "mainWin";--}}
    {{--}--}}
{{--</script>--}}
<!--end Control Case ASV PCI code-->
@yield('footer')
</body>
</html>