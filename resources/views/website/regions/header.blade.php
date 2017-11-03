<div class="navbar navbar-default navbar-fixed-top navbar-size-large navbar-size-xlarge paper-shadow" data-z="0" data-animated role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand navbar-brand-logo">
                <a class="svg" href="{{ url("/") }}">
                    <img src="{{ url("/") }}/public/website_assets/img/logo.png" alt="UiStacks" />
                </a>
            </div>
        </div>
    @php
        $arrCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->take(4)->get();
    @endphp
    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav navbar-nav-margin-left">
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
                {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Instructor <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li><a href="website-instructor-dashboard.html">Dashboard</a></li>--}}
                {{--<li><a href="website-instructor-courses.html">My Courses</a></li>--}}
                {{--<li><a href="website-instructor-course-edit-course.html">Edit Course</a></li>--}}
                {{--<li><a href="website-instructor-earnings.html">Earnings</a></li>--}}
                {{--<li><a href="website-instructor-statement.html">Statement</a></li>--}}
                {{--<li><a href="website-instructor-messages.html">Messages</a></li>--}}
                {{--<li><a href="website-instructor-profile.html">Private Profile</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">UI <span class="caret"></span></a>--}}
                {{--<ul class="dropdown-menu">--}}
                {{--<li><a href="essential-buttons.html">Buttons</a></li>--}}
                {{--<li><a href="essential-icons.html">Icons</a></li>--}}
                {{--<li><a href="essential-progress.html">Progress</a></li>--}}
                {{--<li><a href="essential-grid.html">Grid</a></li>--}}
                {{--<li><a href="essential-forms.html">Forms</a></li>--}}
                {{--<li><a href="essential-tables.html">Tables</a></li>--}}
                {{--<li><a href="essential-tabs.html">Tabs</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}
            </ul>
            <div class="navbar-right">
                <ul class="nav navbar-nav navbar-nav-bordered navbar-nav-margin-right">
                    <!-- user -->
                    <li class="dropdown user">
                        <a @if(Auth::guest()) href="{{ action('WebsiteController@login') }}" @else href="#" class="dropdown-toggle" data-toggle="dropdown" @endif>
                            <img src="{{url('/')}}/public/website_assets/img/user.png" alt="" class="img-circle" />@if(!Auth::guest()) {{ Auth::user()->name }} @endif <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action('WebsiteController@dashboard') }}"><i class="fa fa-bar-chart-o"></i> Dashboard</a></li>
                            <li><a href="website-student-courses.html"><i class="fa fa-mortar-board"></i> My Courses</a></li>
                            <li><a href="website-student-profile.html"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{ action('WebsiteController@logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- // END user -->
                </ul>
                @if(Auth::guest())
                    <a href="{{ action('WebsiteController@login') }}" class="navbar-btn btn btn-primary">Log In</a>
                @endif
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</div>