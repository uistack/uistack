<header class="header">
        <a href="{{url('/')}}/{{Lang::getlocale()}}/admin" class="logo" style="color: #fff; font-weight: 800; font-size: 20px;">
            <img src="{{ asset('public/images/logo.png') }}" alt="Logo">
             {{ \UiStacks\Settings\Models\Setting::find(1)->value }}
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            {{--{{dd($languages)}}--}}
             <div class="navbar-right">
                <ul class="nav navbar-nav">
                    {{--<li>--}}
                        {{--<a href="{{url('/')}}/" style="padding: 9px 4px 11px 5px; font-size: 15px; font-weight: 800; color: #fff;"><i style="vertical-align: middle;" class="fa fa-level-up"></i>--}}
                        {{--<span style="line-height: 2;">{{ trans('admin.back_to_site') }}</span></a>--}}
                    {{--</li>--}}
                    @if(count($languages) && count($languages) > 1)
                    <li class="dropdown language">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 9px 4px 11px 5px; font-size: 15px; font-weight: 800; color: #fff; line-height: 2;">
                            @foreach($languages as $lang)
                                @if($lang['code'] == Lang::getLocale())
                                    {{ $lang['name'] }}
                                @endif
                            @endforeach 
                        </a>
                        <ul class="dropdown-menu">
                        @foreach($languages as $lang)
                            <?php
                                $url = Request::url();
                                //ramesh on 17-07-2017
                                if (strpos($url, "hi")!==false){
                                    $current_url = "hi";
                                }elseif (strpos($url, "ar")!==false){
                                    $current_url = "ar";
                                }
                                else {
                                    $current_url = "en";
                                }
                                $new_url = str_replace($current_url,$lang['code'],$url);
                            ?>
                            <li><a href="{{$new_url}}">{{ $lang['name'] }}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    @endif
                    {{-- @if(Auth::user()->isAdmin)
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                            <span class="label label-success">{{ $counter->NewMessages() }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages pull-right">
                            <li class="dropdown-title">{{ $counter->NewMessages() }} {{ trans('admin.new_messages') }}</li>
                            @foreach($counter->FourNewMessages() as $NewMessage)
                            
                            <li class="unread message">
                                <a href="/{{Lang::getlocale()}}/admin/contacts/{{$NewMessage->id}}" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i> 
                                    <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                    <div class="message-body">
                                        <strong>{{$NewMessage->name}}</strong>
                                        <br> {{ $NewMessage->subject }}
                                        <br>
                                        <small>
                                            {{\Carbon\Carbon::createFromTimeStamp(strtotime($NewMessage->created_at))->diffForHumans()}}
                                        </small>
                                    </div>
                                </a>
                            </li>
                          @endforeach
                            
                            <li class="footer">
                                <a href="/{{Lang::getlocale()}}/admin/contacts">{{ trans('admin.see_all') }}</a>
                            </li>
                        </ul>
                    </li>
                    @endif --}}
                {{--    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                            <span class="label label-warning">7</span>
                        </a>
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">You have 7 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">after a long time</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Just Now
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Jef's Birthday today</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Few seconds ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">out of space</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            8 minutes ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">New friend request</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            An hour ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">On sale 2 products</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            3 Hours ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Lee Shared your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Yesterday
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">David liked your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            2 July 2014
                                        </small>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>--}}
                    
                    @if(Auth::check())
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->image)
                            <img src="/{{ Auth::user()->image->thumbnail }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="{{ Auth::user()->name }}" style="background: #fff;">
                            @else
                            <img src="{{ asset('public/images/user.png') }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="{{ Auth::user()->name }}" style="background: #fff;">
                            @endif
                            <div class="riot">
                                <div>
                                    {{ Auth::user()->name }}
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                @if(Auth::user()->image)
                                <img src="/{{ Auth::user()->image->thumbnail }}" class="img-responsive img-circle" alt="{{ Auth::user()->name }}" style="background: #fff;">
                                @else
                                 <img src="{{ asset('public/images/user.png') }}" class="img-responsive img-circle" alt="{{ Auth::user()->name }}" style="background: #fff;">
                                @endif
                                <p class="topprofiletext">{{ Auth::user()->name }}</p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li>
                               <a href="#">
                                    <i class="livicon" data-name="user" data-s="18"></i>
                                    My Profile
                                </a>
                            </li>-->
                            <li role="presentation"></li>
                            {{-- <li>
                                <a href="{{ action('UsersController@edit_profile', Auth::user()->id) }}">
                                    <i class="livicon" data-name="gears" data-s="18"></i>
                                    {{ trans('admin.account_settings') }}
                                </a>
                            </li> --}}
                            <!-- Menu Footer-->
                           <li class="user-footer">
                                <!-- <div class="pull-right">
                                    <a href="lockscreen.html">
                                        <i class="livicon" data-name="lock" data-s="18"></i>
                                        Lock
                                    </a>
                                </div>-->
                                <div class="pull-left">
                                    <a href="{{ url(Lang::getlocale().'/admin/logout') }}">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        {{ trans('admin.logout') }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>