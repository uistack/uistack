<div class="sidebar left sidebar-size-3 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse">
    <div data-scrollable>
        <div class="sidebar-block">
            <div class="profile">
                <a href="#">
                    @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                        <img src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" alt="people" class="img-circle width-80">
                    @else
                        <img src="{{ url('/') }}/public/website_assets/img/user.png" alt="people" class="img-circle width-80">
                    @endif
                </a>
                <h4 class="text-display-1 margin-none">{{ Auth::user()->name }}</h4>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active"><a href="app-student-dashboard.html"><i class="fa fa-bar-chart-o"></i><span>Dashboard</span></a></li>
            <li class="hasSubmenu">
                @php
                    $arrCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->get();
                @endphp
                <a href="#course-menu"><i class="fa fa-mortar-board"></i><span>Courses</span></a>
                <ul id="course-menu">
                    @if(isset($arrCourses))
                        @foreach($arrCourses as $course)
                            <li class="@if(\Request::segment(1)== $course->slug) active @endif">
                                <a href="{{ action('LearnController@index',$course->slug) }}">{{ $course->trans->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </li>
            <li class="hasSubmenu">
                <a href="#forum-menu"><i class="fa fa-file-text-o"></i><span>Forum</span></a>
                <ul id="forum-menu">
                    <li><a href="app-forum.html"><span>Forum Home</span></a></li>
                    <li><a href="app-forum-category.html"><span>Forum Category</span></a></li>
                    <li><a href="app-forum-thread.html"><span>Forum Thread</span></a></li>
                </ul>
            </li>
            <li class="hasSubmenu">
                <a href="#account-menu"><i class="fa fa-user"></i><span>Account</span></a>
                <ul id="account-menu">
                    <li><a href="app-student-profile.html"><span>Edit Profile</span></a></li>
                    <li><a href="app-student-{{ $item->name }}ing.html"><span>Edit {{ $item->name }}ing</span></a></li>
                </ul>
            </li>
            <li><a href="app-student-messages.html"><i class="fa fa-comments"></i><span>Messages</span></a></li>
            <li><a href="login.html"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
        </ul>
    </div>
</div>