<div class="navbar navbar-size-large navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#sidebar-menu" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand navbar-brand-logo navbar-nav-padding-left">
                <a class="svg" href="{{ url("/") }}">
                    <img src="{{ url("/") }}/public/website_assets/img/logo.png" alt="UiStacks" />
                </a>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav">
                <li class="dropdown active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="{{ url("/") }}">Home page</a></li>
                        <li><a href="{{ action('CmsController@showPage','about-us') }}">About Us</a></li>
                        <li><a href="{{ action("WebsiteController@createContact")}}">Contact</a></li>
                        <li><a href="{{ action('BlogController@index') }}">Blog</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tutorials <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @php
                            $arrCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->take(4)->get();
                        @endphp
                        @if(isset($arrCourses))
                            @foreach($arrCourses as $course)
                                <li>
                                    <a href="{{ action('LearnController@index',$course->slug) }}">{{ $course->trans->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                @php
                    $arrTopics = \UiStacks\Uiquiz\Models\Topic::where('active', 1)->take(4)->get();
                @endphp
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Quiz <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(isset($arrTopics))
                            @foreach($arrTopics as $topic)
                                <li class="">
                                    <a href="{{ action('QuizController@index',$topic->slug) }}">{{ $topic->trans->title }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-nav-bordered navbar-right">
                <!-- notifications -->
                <li class="dropdown notifications updates">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-primary">4</span>
                    </a>
                    <ul class="dropdown-menu" role="notification">
                        <li class="dropdown-header">Notifications</li>
                        <li class="media">
                            <div class="pull-right">
                                <span class="label label-success">New</span>
                            </div>
                            <div class="media-left">
                                <img src="images/people/50/guy-2.jpg" alt="people" class="img-circle" width="30">
                            </div>
                            <div class="media-body">
                                <a href="#">Adrian D.</a> posted <a href="#">a photo</a> on his timeline.
                                <br/>
                                <span class="text-caption text-muted">5 mins ago</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="pull-right">
                                <span class="label label-success">New</span>
                            </div>
                            <div class="media-left">
                                <img src="images/people/50/guy-6.jpg" alt="people" class="img-circle" width="30">
                            </div>
                            <div class="media-body">
                                <a href="#">{{ Auth::user()->name }}</a> posted <a href="#">a comment</a> on Adrian's recent <a href="#">post</a>.
                                <br/>
                                <span class="text-caption text-muted">3 hrs ago</span>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <span class="icon-block s30 bg-grey-200"><i class="fa fa-plus"></i></span>
                            </div>
                            <div class="media-body">
                                <a href="#">Mary D.</a> and <a href="#">Michelle</a> are now friends.
                                <p>
                                    <span class="text-caption text-muted">1 day ago</span>
                                </p>
                                <a href="">
                                    <img class="width-30 img-circle" src="images/people/50/woman-6.jpg" alt="people">
                                </a>
                                <a href="">
                                    <img class="width-30 img-circle" src="images/people/50/woman-3.jpg" alt="people">
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- // END notifications -->
                <!-- User -->
                <li class="dropdown">
                    <a @if(Auth::guest()) href="{{ action('WebsiteController@login') }}" @else href="#" class="dropdown-toggle" data-toggle="dropdown" @endif>
                        <img src="{{url('/')}}/public/website_assets/img/user.png" alt="" class="img-circle" />@if(!Auth::guest()) {{ $item->name }} @endif <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ action('WebsiteController@dashboard') }}"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                        {{--<li><a href="website-student-courses.html"><i class="fa fa-mortar-board"></i> My Courses</a></li>--}}
                        <li><a href="{{ action('WebsiteController@profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="{{ action('WebsiteController@logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</div>