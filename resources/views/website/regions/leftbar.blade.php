<div class="ms-slidebar sb-slidebar sb-left sb-style-overlay" id="ms-slidebar">
    <div class="sb-slidebar-container">
        <header class="ms-slidebar-header">
            <div class="ms-slidebar-login">
                <a href="javascript:void(0)" class="withripple" data-toggle="modal" data-target="#ms-account-modal">
                    <i class="zmdi zmdi-account"></i> Login</a>
                <a href="javascript:void(0)" class="withripple" data-toggle="modal" data-target="#ms-account-modal">
                    <i class="zmdi zmdi-account-add"></i> Register</a>
            </div>
            <div class="ms-slidebar-title">
                <form class="search-form">
                    <input id="search-box-slidebar" type="text" class="search-input" placeholder="Search..." name="q" />
                    <label for="search-box-slidebar">
                        <i class="zmdi zmdi-search"></i>
                    </label>
                </form>
                <div class="ms-slidebar-t">
                    <span class="ms-logo ms-logo-sm">SB</span>
                    <h3>Hello
                        <span>User</span>
                    </h3>
                </div>
            </div>
        </header>
        <ul class="ms-slidebar-menu" id="slidebar-menu" role="tablist" aria-multiselectable="true">
            <li class="@if(\Request::segment(3) == "") active @endif">
                <a class="link" href="{{url('/')}}/">
                    <i class="zmdi zmdi-view-compact"></i> Home</a>
            </li>
            @if(\Request::segment(2) == "marketplace")
                <li class="panel" role="tab" id="sch2">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc2" aria-expanded="false" aria-controls="sc2">
                        <i class="zmdi zmdi-desktop-mac"></i> Deals </a>
                    <ul id="sc2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sch2">
                        <?php
                        if(isset($categories)){
                        $count = 0;
                        $end = 1;
                        foreach ($categories as $key => $data) {
                        $count++;
                        $end = 0;
                        ?>
                        <li>
                            <a class="withripple" href="{{ '?url='.base64_encode($data['availableVariants']['v0.1.0']['get']) }} "><i class="fa fa-arrow-circle-right"></i> {{ ucwords(str_replace("_"," ",$key)) }}</a>
                        </li>
                        <?php
                        }
                        }
                        ?>
                    </ul>
                </li>
            @else
                <li class="@if(\Request::segment(3) == "marketplace") active @endif">
                    <a class="link" href="{{ url('/').'/'.Lang::getlocale().'/marketplace' }}">
                        <i class="zmdi zmdi-view-compact"></i> Deals</a>
                </li>
            @endif
            <li class="@if(\Request::segment(2) == "blog") active @endif">
                <a class="link" href="{{ action('BlogController@index') }}">
                    <i class="zmdi zmdi-view-compact"></i> Blog</a>
            </li>
            <li class="panel" role="tab" id="sch2">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#slidebar-menu" href="#sc2" aria-expanded="false" aria-controls="sc2">
                    <i class="zmdi zmdi-desktop-mac"></i> Pages </a>
                <ul id="sc2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sch2">
                    <li>
                        <a href="{{ action('CmsController@showPage','about-us') }}">About US</a>
                    </li>
                    <li>
                        <a href="{{ action('CmsController@showPage','disclaimer') }}">Disclaimer</a>
                    </li>
                    <li>
                        <a href="{{ action('FaqController@faqs') }}">FAQ's</a>
                    </li>
                    <li>
                        <a href="{{ action("WebsiteController@createContact")}}">Contact</a>
                    </li>
                </ul>
            </li>
        </ul>
        {{--<div class="ms-slidebar-social ms-slidebar-block">--}}
        {{--<h4 class="ms-slidebar-block-title">Social Links</h4>--}}
        {{--<div class="ms-slidebar-social">--}}
        {{--<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59b4bf61d74632aa"></script>--}}

        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-facebook">--}}
        {{--<i class="zmdi zmdi-facebook"></i>--}}
        {{--<span class="badge badge-pink">12</span>--}}
        {{--<div class="ripple-container"></div>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-twitter">--}}
        {{--<i class="zmdi zmdi-twitter"></i>--}}
        {{--<span class="badge badge-pink">4</span>--}}
        {{--<div class="ripple-container"></div>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-google">--}}
        {{--<i class="zmdi zmdi-google"></i>--}}
        {{--<div class="ripple-container"></div>--}}
        {{--</a>--}}
        {{--<a href="javascript:void(0)" class="btn-circle btn-circle-raised btn-instagram">--}}
        {{--<i class="zmdi zmdi-instagram"></i>--}}
        {{--<div class="ripple-container"></div>--}}
        {{--</a>--}}

        {{--</div>--}}
        {{--</div>--}}

    </div>
</div>