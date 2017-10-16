<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>{{ \UiStacks\Settings\Models\Setting::find(1)->value }} | @yield('page_title')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" type="image/x-icon" href="{{ url("/") }}/public/website_assets/img/favicon.ico" />
        {{--<link rel="icon shortcut" href="{{ asset('public/images/fav.ico') }}">--}}
        <!-- global css -->
        <link href="{{ asset('public/admin_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset('public/admin_assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/admin_assets/css/styles/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
        <script>
            var javascript_site_path = "{{url('/')}}" + "/";
        </script>
        <link rel="stylesheet" href="{{ asset('public/admin_assets/css/panel.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/admin_assets/css/metisMenu.css') }}" />
        <link rel="stylesheet" href="{{ asset('public/admin_assets/css/jquery-ui.min.css') }}" />

        <!-- end of global css -->
        <!--page level css-->
        {{--     <link href="{{ asset('public/admin_assets/css/pages/tables.css') }}" rel="stylesheet" /> 
        <script src="{{ asset('public/admin_assets/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>--}}

        <link href="{{ asset('public/admin_assets/css/inno-custom.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
        @if(Lang::getLocale() == 'ar')
        <link href="{{ asset('public/admin_assets/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
        <link href="{{ asset('public/admin_assets/css/pages/tables-rtl.css') }}" rel="stylesheet" />
        @endif
        <script src="{{ asset('public/website_assets/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
        @yield('header')
        <!--end of page level css-->
    </head>

    <body class="skin-josh">

        @include('admin.regions.header')

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    @include('admin.regions.sidebar')
                </section>
            </aside>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Main content -->
                <section class="content-header">
                    <h1>@yield('page_title')</h1>
                    <ol class="breadcrumb">
                        <li @if(Request::is('admin') || Request::is(App::getLocale().'/admin')) class="active" @endif>
                             @if(Request::is('admin') || Request::is(App::getLocale().'/admin'))
                             <i class="fa fa-tachometer"></i> {{ trans('admin.dashboard') }}
                            @else
                            <a href="{{url('/')}}/{{ App::getLocale() }}/admin"> <i class="fa fa-tachometer"></i> {{ trans('admin.dashboard') }}</a>
                            @endif
                        </li>
                        @if(isset($breadcrumbs))
                        @foreach($breadcrumbs as $breadcrumb)
                        <li @if(Request::is($breadcrumb['url']) || empty($breadcrumb['url'])) class="active" @endif>
                             @if(!empty($breadcrumb['url']))
                             <a href="{{$breadcrumb['url']}}">  {{ $breadcrumb['name'] }}</a>
                            @else
                            {{ $breadcrumb['name'] }}
                            @endif
                        </li>
                        @endforeach
                        @endif
                    </ol>   
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12" id="messages">
                            @include('admin.blocks.message')
                        </div>
                    </div>
                    @yield('content')
                </section>
            </aside>
            <!-- right-side -->
        </div>
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
            <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
        </a>
        <!-- global js -->
        {{--<script src="{{ asset('public/admin_assets/js/jquery-1.11.1.min.js') }}"></script>--}}
        {{--<script src="{{ asset('public/website_assets/js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>--}}
        <script src="{{ asset('public/admin_assets/js/jquery-ui.js') }}"></script>

        <script src="{{ asset('public/admin_assets/js/jquery.validate.js') }}"></script>
         <!--<script src="{{ asset('public/admin_assets/vendors/form_builder1/js/jquery.ui.min.js') }}"></script>-->
        {{--@if (Request::is('admin_assets/form_builder2') || Request::is('admin_assets/gridmanager') || Request::is('admin_assets/portlet_draggable'))
        <script src="{{ asset('public/admin_assets/vendors/form_builder1/js/jquery.ui.min.js') }}"></script>
    @endif--}}
    <script src="{{ asset('public/admin_assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('public/admin_assets/vendors/livicons/minified/raphael-min.js') }}"></script>
    <script src="{{ asset('public/admin_assets/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>

    <script src="{{ asset('public/admin_assets/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin_assets/js/metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/admin_assets/vendors/holder-master/holder.js') }}"></script>
    <!--<script src="{{ asset('public/admin_assets/vendors/holder-master/holder.js') }}"></script>-->

    <style>
        .error{

            color:red;

        }


    </style>    
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer')
    <!-- end page level js -->

</body>
</html>