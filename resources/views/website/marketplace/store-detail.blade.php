@extends('website.master')
@section('content')
    <div class="content">
        @include('website.home.blocks.top-head')
        @include('website.regions.header')
        <hr class="hredit">
        <div class="place-page">
            <div class="">
                <section style="background:#efefe9;">
                    <div class="container">
                        <div class="board">
                            <div class="board-inner">
                                <ul class="nav nav-tabs" id="myTab">
                                    <div class="liner"></div>
                                    <li class="active">
                                        <a href="#home" data-toggle="tab" title="info">
                                            <span class="round-tabs one"><i class="glyphicon glyphicon-home"></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#profile" data-toggle="tab" title="location">
                                            <span class="round-tabs two"><i class="fa fa-map-marker "></i></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#messages" data-toggle="tab" title="Gallery">
                                            <span class="round-tabs three"><i class="fa fa-picture-o"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="english-title relative">
                                        <h1>{{$item->trans->name}}</h1>
                                        <div class="rati-blk">
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star"></i></span>
                                            <span><i class="fa fa-star-half-o"></i></span>
                                            <span><i class="fa fa-star-o"></i></span>
                                        </div>
                                    </div>
                                    {{--{{ dd($item->trans) }}--}}
                                    <div class="place-data">
                                        <ul>
                                            <li> <i class="fa fa-globe" aria-hidden="true"></i>{{ $item->trans->location }}</li>
                                            <li> <i class="fa fa-eye" aria-hidden="true"></i>{{ $item->trans->view_count }} view(s)</li>
                                            <li> <i class="fa fa-search" aria-hidden="true"></i>{{ $item->trans->search_count }} search</li>
                                        </ul>
                                    </div>
                                    <div class="smicons">
                                        <ul class="clearfix">
                                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    {{--<iframe src="http://maps.google.com/maps?q=12.927923,77.627108&z=15&output=embed" width="100%" height="500"></iframe>--}}
                                    <iframe src="http://maps.google.com/maps?q={{ $item->trans->store_lat }},{{ $item->trans->store_lng }}&z=15&output=embed" width="100%" height="500"></iframe>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <div class="images-gallery">
                                        <h3>images gallery</h3>
                                        <hr>
                                        <div class="demo-gallery">
                                            <ul id="lightgallery" class="list-unstyled row">
                                                @if (isset($gallery_images) && count($gallery_images) > 0)
                                                    @foreach($gallery_images as $imgKey=>$images)
                                                        <li class="col-xs-6 col-sm-4 col-md-3 img-gallery" data-responsive="{{url('/')}}/{{ $images['file'] }} 375, {{url('/')}}/{{ $images['file'] }} 480, {{url('/')}}/{{ $images['file'] }} 800" data-src="{{url('/')}}/{{ $images['file'] }}" data-sub-html="<h4>Bowness Bay</h4><p>A beautiful Sunrise this morning taken En-route to Keswick not one as planned but I'm extremely happy I was passing the right place at the right time....</p>">
                                                            <a href="javascript:void(0);"> <img class="img-responsive" src="{{url('/')}}/{{ $images['file'] }}"> </a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="images-gallery">
                                        <h3>Vedio gallery</h3>
                                        <hr>
                                        <!-- Hidden video div -->
                                        <div style="display:none;" id="video1">
                                            <video class="lg-video-object lg-html5" controls preload="none">
                                                <source src="vedio/videoplayback (1) (online-video-cutter.com).mp4" type="video/mp4"> Your browser does not support HTML5 video. </video>
                                        </div>
                                        <div style="display:none;" id="video2">
                                            <video class="lg-video-object lg-html5" controls preload="none">
                                                <source src="vedio/videoplayback (1) (online-video-cutter.com).mp4" type="video/mp4"> Your browser does not support HTML5 video. </video>
                                        </div>
                                        <!-- data-src should not be provided when you use html5 videos -->
                                        <div class="html5-videos-blk">
                                            <ul id="html5-videos" class="clearfix">
                                                <li class="" data-poster="img/image-3.jpg" data-sub-html="video caption1" data-html="#video1"> <img src="img/image-3.jpg" width="100%" height="150" /> </li>
                                                <li data-poster="img/image-3.jpg" data-sub-html="video caption2" data-html="#video2" class=""> <img src="img/image-3.jpg" width="100%" height="150" /> </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection
@section('footer')

@stop