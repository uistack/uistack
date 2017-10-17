@extends('website.master')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/tp_swiftype.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/learn.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/main.css') }}" />
@endsection
@section('content')
    <div id="cb-wrapper-api-docs" class="">
        @include('website.regions.learn-header')
        <div id="cb-container" class="container">

            @include('website.learn.blocks.left-menu')

            <div id="cb-content" class="cb-content">
                <div class="cb-content__wrapper">
                    <script type="text/javascript">
                        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

                        ga('create', 'UA-27953252-1', 'chargebee.com');
                        ga('send', 'pageview');
                    </script>
                    <style>
                        .lang-sh-content {
                            display:none;
                        }

                        .lang-rb-content {
                            display:none;
                        }

                        .lang-py-content {
                            display:none;
                        }

                        .lang-java-content {
                            display:none;
                        }

                        .lang-cs-content {
                            display:none;
                        }

                        .lang-js-content {
                            display:none;
                        }

                    </style>
                    @if(isset($contents))
                    <div class="page-header">
                        <h1>{{ $contents->trans->name }}</h1>
                    </div>
                    {!! $contents->trans->body !!}
                    @else
                        <h1>{{ $item->trans->name }} Tutorial</h1>
                        {!! $item->trans->description !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/tp_apidocs.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/tp_swiftype.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/learn.js') }}"></script>

@stop