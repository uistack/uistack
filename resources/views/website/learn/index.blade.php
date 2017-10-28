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