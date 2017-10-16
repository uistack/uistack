<div class="navbar navbar-fixed-top" data-swiftype-index='false'>
    <div class="container">
        <div class="cb-nav-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-left" id="cb-sidebar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url("/") }}" class="hidden-md hidden-lg">
                    <div class="navbar-brand">
                        <img src="{{ url("/") }}/public/website_assets/img/ui-stacks.png" alt="ChargeBee API Documentation" class="img-responsive" width="28">
                    </div>
                    <div class="navbar-brand-title">API</div>
                </a>
                <button type="button" class="navbar-toggle" id="cb-override" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <div class="vspace-xs">
                    <ul class="nav navbar-nav navbar-left">
                        @php
                            $arrCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->take(4)->get();
                        @endphp
                        @if(isset($arrCourses))
                            @foreach($arrCourses as $course)
                                <li class="@if($course->slug == \Request::segment(1)) active @endif">
                                    <a data-lang="lang" rel="nofollow" href="{{ action('LearnController@index',$course->slug) }}" title="">
                                        {{ $course->trans->name }}
                                    </a>
                                </li>
                                {{--<li class=""><a data-lang="lang" rel="nofollow" href="?lang=curl" title="">--}}
                                {{--CURL--}}
                                {{--</a>--}}
                                {{--</li>--}}
                                {{--<li class=" active"><a data-lang="lang" rel="nofollow" href="?lang=php" title="">--}}
                                {{--PHP--}}
                                {{--</a>--}}
                                {{--</li>--}}

                                {{--<li class=""><a data-lang="lang" rel="nofollow" href="?lang=ruby" title="">--}}
                                {{--RUBY--}}
                                {{--</a>--}}
                                {{--</li>--}}

                                {{--<li class=""><a data-lang="lang" rel="nofollow" href="?lang=python" title="">--}}
                                {{--PYTHON--}}
                                {{--</a>--}}
                                {{--</li>--}}

                                {{--<li class=""><a data-lang="lang" rel="nofollow" href="?lang=java" title="">--}}
                                {{--JAVA--}}
                                {{--</a>--}}
                                {{--</li>--}}

                                {{--<li class=""><a data-lang="lang" rel="nofollow" href="?lang=dotnet" title="">--}}
                                {{--.NET--}}
                                {{--</a>--}}
                                {{--</li>--}}

                                {{--<li class=""><a data-lang="lang" rel="nofollow" href="?lang=node" title="">--}}
                                {{--NODE--}}
                                {{--</a>--}}
                                {{--</li>--}}
                            @endforeach
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">

                        <li>
                            <a href="https://app.chargebee.com/login">Sign in</a>
                        </li>
                        <li>
                            <a href="https://www.chargebee.com/trial-signup.html" class="btn-flat">Sign up</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="cb-scrollmenu-container hidden-sm hidden-xs" id="cb-scroll-menu">
            <div class="cb-scrollmenu__title">Orders</div>
            <div class="cb-scrollmenu__nav">
                <div class="cb-scrollmenu__current">Introduction</div>
                <ul class="nav" id="cb-nav-group">
                    <li>
                        <a href="#order_attributes" class="list-group-item">
                            Order attributes
                        </a>
                    </li>
                    <li>
                        <a href="#retrieve_an_order" class="list-group-item">
                            Retrieve an order
                        </a>
                    </li>
                    <li>
                        <a href="#create_an_order" class="list-group-item">
                            Create an order
                        </a>
                    </li>
                    <li>
                        <a href="#list_orders" class="list-group-item">
                            List orders
                        </a>
                    </li>
                    <li>
                        <a href="#update_an_order" class="list-group-item">
                            Update an order
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="cb-notify hidden-md hidden-lg cb-notify--light"><b>You are viewing the documentation for Chargebee API V2</b>. If you're using the older version (V1), click <a href="https://apidocs.chargebee.com/docs/api/v1">here</a>.</div>