@extends('website.master')
@section('content')
    <div class="sb-site-container">
        @include('website.home.blocks.top-head')
        @include('website.regions.header')
        <div class="ms-hero-page ms-hero-img-keyboard ms-hero-bg-primary mb-6">
            <div class="container">
                <div class="text-center">
                    <span class="ms-logo ms-logo-lg ms-logo-white center-block mb-2 mt-2 animated zoomInDown animation-delay-5">SB</span>
                    <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Blog</h1>
                    <p class="lead lead-lg color-white text-center center-block mt-2 mw-800 fw-300 animated fadeInUp animation-delay-7">
                        Teach something. If you’re passionate about a particular subject, and you have a lot of experience in that area, then you can offer your knowledge to both people who are new to the subject and others who are as experienced as you are.
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row masonry-container">
                @if(isset($items))
                    @foreach($items as $k=>$item)
                        <div class="col-md-4 col-sm-6 masonry-item wow fadeInUp animation-delay-2">
                            <article class="card card-info mb-4 wow materialUp animation-delay-5">
                                <figure class="ms-thumbnail ms-thumbnail-left">
                                    @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['medium']))
                                        <img src="{{url('/')}}/{{ $item->media->main_image->styles['medium'] }}" alt="Default Blog" >
                                    @else
                                        <img src="{{ asset('website_assets/img/default-blog.jpg') }}" alt="Default Blog">
                                    @endif
                                    <figcaption class="ms-thumbnail-caption text-center">
                                        <div class="ms-thumbnail-caption-content">
                                            <h3 class="ms-thumbnail-caption-title">{{ $item->trans->name }}</h3>
                                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>--}}
                                            <div class="mt-2">
                                                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-sm mr-1 btn-circle-white color-danger">
                                                    <i class="zmdi zmdi-favorite"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-sm ml-1 mr-1 btn-circle-white color-warning">
                                                    <i class="zmdi zmdi-star"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-circle-sm ml-1 btn-circle-white color-success">
                                                    <i class="zmdi zmdi-share"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="card-block">
                                    <p>{!! $item->trans->body !!}</p>
                                    <div class="">
                                        <span class="ml-1 hidden-xs"><i class="zmdi zmdi-time mr-05 color-info"></i><span class="color-medium-dark">April 15, 2015</span></span>
                                        <span class="ml-1"><i class="zmdi zmdi-comments color-royal mr-05"></i> 25</span>
                                        {{--<a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block animate-icon">Read more--}}
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm animate-icon">Read more<i class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
        <!-- container -->
        @include('website.regions.footer')
    </div>
    <!-- sb-site-container -->
    @include('website.regions.leftbar')
@endsection
@section('footer')

@stop