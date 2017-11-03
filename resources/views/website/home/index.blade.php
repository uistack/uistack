@extends('website.master')
@section('header')

@endsection
@section('content')
    {{--    @include('website.home.blocks.top-head')--}}
    @include('website.home.blocks.banner')
    @include('website.regions.header')

    <div class="container">
        <div class="page-section-heading">
            <h2 class="text-display-1">Courses</h2>
            <p class="lead text-muted">Learn about all of the features we offer.</p>
        </div>
        @php
            $arrCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->take(3)->get();
        @endphp
        <div class="row" data-toggle="gridalicious">
            @if(isset($arrCourses))
                @foreach($arrCourses as $course)
                    <div class="media">
                        <div class="media-left padding-none">
                            <div class="bg-green-300 text-white">
                                <div class="panel-body">
                                    <i class="cbp-ig-icon devicon-{{ $course->slug }}-plain colored"></i>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="text-headline">{{ $course->trans->name }}</div>
                                    <p>{!! $course->trans->description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            {{--<div class="media">--}}
            {{--<div class="media-left padding-none">--}}
            {{--<div class="bg-green-300 text-white">--}}
            {{--<div class="panel-body">--}}
            {{--<i class="fa fa-film fa-2x fa-fw"></i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
            {{--<div class="text-headline">Watch Courses Offline</div>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut culpa fugiat iusto, molestias nemo nostrum quia rerum temporibus voluptatum.</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media">--}}
            {{--<div class="media-left padding-none">--}}
            {{--<div class="bg-purple-300 text-white">--}}
            {{--<div class="panel-body">--}}
            {{--<i class="fa fa-life-bouy fa-2x fa-fw"></i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
            {{--<div class="text-headline">Premium Support</div>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut culpa fugiat iusto, molestias nemo nostrum quia rerum temporibus voluptatum.</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media">--}}
            {{--<div class="media-left padding-none">--}}
            {{--<div class="bg-orange-400 text-white">--}}
            {{--<div class="panel-body">--}}
            {{--<i class="fa fa-user fa-2x fa-fw"></i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
            {{--<div class="text-headline">Learn from Top Tutors</div>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut culpa fugiat iusto, molestias nemo nostrum quia rerum temporibus voluptatum.</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media">--}}
            {{--<div class="media-left padding-none">--}}
            {{--<div class="bg-cyan-400 text-white">--}}
            {{--<div class="panel-body">--}}
            {{--<i class="fa fa-code fa-2x fa-fw"></i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
            {{--<div class="text-headline">Lesson Source Files</div>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut culpa fugiat iusto, molestias nemo nostrum quia rerum temporibus voluptatum.</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media">--}}
            {{--<div class="media-left padding-none">--}}
            {{--<div class="bg-pink-400 text-white">--}}
            {{--<div class="panel-body">--}}
            {{--<i class="fa fa-print fa-2x fa-fw"></i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
            {{--<div class="text-headline">Printed Diploma</div>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut culpa fugiat iusto, molestias nemo nostrum quia rerum temporibus voluptatum.</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media">--}}
            {{--<div class="media-left padding-none">--}}
            {{--<div class="bg-red-400 text-white">--}}
            {{--<div class="panel-body">--}}
            {{--<i class="fa fa-tasks fa-2x fa-fw"></i>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="media-body">--}}
            {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body">--}}
            {{--<div class="text-headline">New Lessons Every Day</div>--}}
            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut culpa fugiat iusto, molestias nemo nostrum quia rerum temporibus voluptatum.</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    <br/>
    <div class="page-section bg-white">
        <div class="container">
            <div class="text-center">
                <h3 class="text-display-1">Featured Courses</h3>
                <p class="lead text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
            <br/>
            <div class="slick-basic slick-slider" data-items="4" data-items-lg="3" data-items-md="2" data-items-sm="1" data-items-xs="1">
                <div class="item">
                    <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                        <div class="panel-body">
                            <div class="media media-clearfix-xs">
                                <div class="media-left">
                                    <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                        <span class="img icon-block s90 bg-default"></span>
                                        <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                        <span class="v-center">
                            <i class="fa fa-github"></i>
                        </span>
                                        </span>
                                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                            <span class="v-center">
                            <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Github Webhooks for Beginners</a></h4>
                                    <p class="small margin-none">
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                        <div class="panel-body">
                            <div class="media media-clearfix-xs">
                                <div class="media-left">
                                    <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                        <span class="img icon-block s90 bg-primary"></span>
                                        <span class="overlay overlay-full padding-none icon-block s90 bg-primary">
                        <span class="v-center">
                            <i class="fa fa-css3"></i>
                        </span>
                                        </span>
                                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                            <span class="v-center">
                            <span class="btn btn-circle btn-primary btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Awesome CSS with LESS Processing</a></h4>
                                    <p class="small margin-none">
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                        <div class="panel-body">
                            <div class="media media-clearfix-xs">
                                <div class="media-left">
                                    <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                        <span class="img icon-block s90 bg-lightred"></span>
                                        <span class="overlay overlay-full padding-none icon-block s90 bg-lightred">
                        <span class="v-center">
                            <i class="fa fa-windows"></i>
                        </span>
                                        </span>
                                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                            <span class="v-center">
                            <span class="btn btn-circle btn-red-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Portable Environments with Vagrant</a></h4>
                                    <p class="small margin-none">
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                        <div class="panel-body">
                            <div class="media media-clearfix-xs">
                                <div class="media-left">
                                    <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                        <span class="img icon-block s90 bg-brown"></span>
                                        <span class="overlay overlay-full padding-none icon-block s90 bg-brown">
                        <span class="v-center">
                            <i class="fa fa-wordpress"></i>
                        </span>
                                        </span>
                                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                            <span class="v-center">
                            <span class="btn btn-circle btn-orange-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading margin-v-5-3"><a href="website-course.html">WordPress Theme Development</a></h4>
                                    <p class="small margin-none">
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                        <div class="panel-body">
                            <div class="media media-clearfix-xs">
                                <div class="media-left">
                                    <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                        <span class="img icon-block s90 bg-purple"></span>
                                        <span class="overlay overlay-full padding-none icon-block s90 bg-purple">
                        <span class="v-center">
                            <i class="fa fa-jsfiddle"></i>
                        </span>
                                        </span>
                                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                            <span class="v-center">
                            <span class="btn btn-circle btn-purple-500 btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Modular JavaScript with Browserify</a></h4>
                                    <p class="small margin-none">
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                        <div class="panel-body">
                            <div class="media media-clearfix-xs">
                                <div class="media-left">
                                    <div class="cover width-90 width-100pc-xs overlay cover-image-full hover">
                                        <span class="img icon-block s90 bg-default"></span>
                                        <span class="overlay overlay-full padding-none icon-block s90 bg-default">
                        <span class="v-center">
                            <i class="fa fa-cc-visa"></i>
                        </span>
                                        </span>
                                        <a href="website-course.html" class="overlay overlay-full overlay-hover overlay-bg-white">
                                            <span class="v-center">
                            <span class="btn btn-circle btn-white btn-lg"><i class="fa fa-graduation-cap"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading margin-v-5-3"><a href="website-course.html">Easy Online Payments with Stripe</a></h4>
                                    <p class="small margin-none">
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                        <span class="fa fa-fw fa-star-o text-yellow-800"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <br/>
                <a class="btn btn-lg btn-primary" href="website-directory-grid.html">Browse Courses</a>
            </div>
        </div>
    </div>

    {{--<div class="parallax cover overlay height-300 margin-none">--}}
    {{--<img class="parallax-layer" data-auto-offset="true" data-auto-size="false" src="{{url('/')}}/public/website_assets/img/photodune-6745579-modern-creative-man-relaxing-on-workspace-m.jpg" alt="Learning Cover" />--}}
    {{--<div class="parallax-layer overlay overlay-full overlay-bg-white bg-transparent" data-opacity="true" data-speed="8">--}}
    {{--<div class="v-center">--}}
    {{--<div class="page-section">--}}
    {{--<h1 class="text-display-2 overlay-bg-white margin-v-0-15 inline-block">Feedback</h1>--}}
    {{--<br/>--}}
    {{--<p class="lead text-overlay overlay-bg-white-strong inline-block">How others use E-learning to improve their skills</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="container">--}}
    {{--<div class="page-section">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="testimonial">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-body">--}}
    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet doloremque enim error id, inventore magni odio odit quo tenetur.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="media v-middle">--}}
    {{--<div class="media-left">--}}
    {{--<img src="{{url('/')}}/public/website_assets/img/people/50/guy-1.jpg" alt="People" class="img-circle width-40" />--}}
    {{--</div>--}}
    {{--<div class="media-body">--}}
    {{--<p class="text-subhead margin-v-5-0">--}}
    {{--<strong>Adrian D. <span class="text-muted">@ Mosaicpro Inc.</span></strong>--}}
    {{--</p>--}}
    {{--<p class="small">--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star-o text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star-o text-yellow-800"></span>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="testimonial">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-body">--}}
    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet doloremque enim error id, inventore magni odio odit quo tenetur.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="media v-middle">--}}
    {{--<div class="media-left">--}}
    {{--<img src="{{url('/')}}/public/website_assets/img/people/50/guy-8.jpg" alt="People" class="img-circle width-40" />--}}
    {{--</div>--}}
    {{--<div class="media-body">--}}
    {{--<p class="text-subhead margin-v-5-0">--}}
    {{--<strong>Adrian D. <span class="text-muted">@ Mosaicpro Inc.</span></strong>--}}
    {{--</p>--}}
    {{--<p class="small">--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star-o text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star-o text-yellow-800"></span>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="testimonial">--}}
    {{--<div class="panel panel-default">--}}
    {{--<div class="panel-body">--}}
    {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet doloremque enim error id, inventore magni odio odit quo tenetur.</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="media v-middle">--}}
    {{--<div class="media-left">--}}
    {{--<img src="{{url('/')}}/public/website_assets/img/people/50/guy-4.jpg" alt="People" class="img-circle width-40" />--}}
    {{--</div>--}}
    {{--<div class="media-body">--}}
    {{--<p class="text-subhead margin-v-5-0">--}}
    {{--<strong>Adrian D. <span class="text-muted">@ Mosaicpro Inc.</span></strong>--}}
    {{--</p>--}}
    {{--<p class="small">--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star-o text-yellow-800"></span>--}}
    {{--<span class="fa fa-fw fa-star-o text-yellow-800"></span>--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<br/>--}}
    {{--</div>--}}

    @include('website.regions.modal')
    @include('website.regions.footer')
    @include('website.regions.footer-bottom')
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/tp_swiftype.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/select2.min.js') }}"></script>
@endsection