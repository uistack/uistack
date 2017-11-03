@extends('website.master')
@section('header')

@endsection
@section('content')
    <div class="st-container">
        @include('website.regions.learn-header')
        @include('website.learn.blocks.left-menu')
        @include('website.learn.blocks.right-menu')
        {{--@include('website.regions.learn-header')--}}
        <div class="st-pusher" id="content">
            <!-- sidebar effects INSIDE of st-pusher: -->
            <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->
            <!-- this is the wrapper for the content -->
            <div class="st-content">
                <!-- extra div for emulating position:fixed of the menu -->
                <div class="st-content-inner padding-none">
                    <div class="container-fluid">
                        <div class="page-section">
                            <div class="media v-middle">
                                <div class="media-body">
                                    @if(isset($contents))
                                        <h1 class="text-display-1 margin-none">{{ $contents->trans->name }}</h1>
                                        {!! $contents->trans->body !!}
                                        <p class="text-subhead">{!! $contents->trans->body !!}</p>
                                    @else
                                        <h1 class="text-display-1 margin-none">{{ isset($item->trans->name) ? $item->trans->name :"" }}</h1>
                                        <p class="text-subhead">{!! isset($item->trans->description) ? $item->trans->description : "" !!}</p>
                                    @endif
                                </div>
                                {{--<div class="media-right">--}}
                                {{--<div class="width-100 text-right">--}}
                                {{--<div class="btn-group">--}}
                                {{--<a class="btn btn-white" href="app-directory-grid.html"><i class="fa fa-th"></i></a>--}}
                                {{--<a class="btn btn-grey-800" href="app-directory-list.html"><i class="fa fa-list"></i></a>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /st-content-inner -->
            </div>
            <!-- /st-content -->
        </div>
        @include('website.regions.footer-bottom')
    </div>
@endsection
@section('footer')
@stop