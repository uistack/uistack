<header class="l-header hidden-xs hidden-sm" id="ch-js-header">
    <div class="l-header__container">
        <div class="l-header__row">
            <!-- =========================================
            Header menu left start
            ========================================== -->
            <div class="l-header__col">
                <nav class="ch-nav">
                    <ul class="ch-nav__list">
                        <li class="ch-nav__item" style="margin-bottom: -5px;">

                            <a href="{{ url("/") }}" class="ch-nav__logo" id="ch-js-asset" data-ch-js-asset>
                                <img src="{{ url("/") }}/public/website_assets/img/uistacks.png" alt="UiStacks Logo" width="150">
                            </a>

                            {{--<div id="ch-hiring-badge" class="ch-hiring">--}}
                            {{--<a href="careers/index.html" target="_blank" class="ch-hiring__label">We're Hiring!</a>--}}
                            {{--</div>--}}

                            <a href="{{ url("/") }}" class="ch-nav__logo-icon">
                                <img src="{{ url("/") }}/public/website_assets/img/ui-stacks.png" alt="UiStacks Logo" width="30">
                            </a>
                        </li>
                        <!-- ======================================================================
                        Dropdown for Product section start
                        ======================================================================= -->
                        <li class="ch-nav__item" data-ch-dd="true" data-ch-product="true" id="ch-js-product" style="position: static;">
                            <div class="ch-nav__dropdown">Tutorials</div>
                            <div class="ch-dropdown ch-dropdown--fluid">
                                <div class="ch-dropdown__container">
                                    <div class="ch-dropdown__list">
                                        <!-- =========================================
                                        Tutorial Management start
                                        ========================================== -->
                                        @php
                                            $arrCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->take(4)->get();
                                        @endphp
                                        {{--{{ dd($arrCourses) }}--}}
                                        @if(isset($arrCourses))
                                            @foreach($arrCourses as $course)
                                                <div class="ch-dropdown__item">
                                                    <a href="{{ action('LearnController@index',$course->slug) }}" class="ch-dropdown__link">
                                                        <!-- animation part start-->
                                                        <div class="ch-dropdown__bg"></div>
                                                        <div class="ch-dropdown__arrow"></div>
                                                        <!-- animation part end-->
                                                        <div class="ch-dropdown__content">
                                                            <div class="ch-dropdown__header">
                                                                <div class="ch-dropdown__figure">
                                                                    {{--<img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/header/cb-subscription.svg" alt="" width="34">--}}
                                                                    @if(isset($course->media) && isset($course->media->main_image) && isset($course->media->main_image->styles['thumbnail']))
                                                                        <img src="{{url('/')}}/{{ $course->media->main_image->styles['thumbnail'] }}" alt="" width="34" >
                                                                    @else
                                                                        <img src="{{ asset('/public/website_assets/img/no-img.png') }}" alt="" width="34">
                                                                    @endif
                                                                </div>
                                                                <div class="ch-dropdown__title">{{ $course->trans->name }}</div>
                                                            </div>
                                                            <div class="ch-dropdown__desc">
                                                                {!! $course->trans->description !!}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                        @endforeach
                                    @endif
                                    <!-- =========================================
                                        UiStacks updates start
                                        ========================================== -->
                                    {{--<div class="ch-dropdown__item">--}}
                                    {{--<a href="recurring-billing-invoicing/new-email-notifications/index.html" class="ch-media">--}}
                                    {{--<div class="ch-media__figure">--}}
                                    {{--<img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/header/announcement/engage.png" alt="" class="img-responsive">--}}
                                    {{--</div>--}}
                                    {{--<div class="ch-media__content">--}}
                                    {{--<div class="ch-media__label">--}}
                                    {{--Feature--}}
                                    {{--</div>--}}
                                    {{--<div class="ch-media__action">--}}
                                    {{--Enhanced Email Notifications &rarr;--}}
                                    {{--</div>--}}
                                    {{--<div class="ch-media__desc">--}}
                                    {{--Send contextual and personalized emails to your customers.--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</a>--}}
                                    {{--</div>--}}
                                    <!-- =========================================
                                        UiStacks updates end
                                        ========================================== -->
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="ch-nav__item" data-ch-dd="true" data-ch-product="true" id="ch-js-product" style="position: static;">
                            <div class="ch-nav__dropdown">Quiz</div>
                            <div class="ch-dropdown ch-dropdown--fluid">
                                <div class="ch-dropdown__container">
                                    <div class="ch-dropdown__list">
                                        <!-- =========================================
                                        Tutorial Management start
                                        ========================================== -->
                                        @php
                                            $arrTopics = \UiStacks\Uiquiz\Models\Topic::where('active', 1)->take(4)->get();
                                        //dd($arrTopics);
                                        @endphp
                                        {{--{{ dd($arrCourses) }}--}}
                                        @if(isset($arrTopics))
                                            @foreach($arrTopics as $topic)
                                                <div class="ch-dropdown__item">
                                                    <a href="{{ action('QuizController@index',$topic->slug) }}" class="ch-dropdown__link">
                                                        <!-- animation part start-->
                                                        <div class="ch-dropdown__bg"></div>
                                                        <div class="ch-dropdown__arrow"></div>
                                                        <!-- animation part end-->
                                                        <div class="ch-dropdown__content">
                                                            <div class="ch-dropdown__header">
                                                                <div class="ch-dropdown__figure">
                                                                    {{--<img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/header/cb-subscription.svg" alt="" width="34">--}}
                                                                    @if(isset($topic->media) && isset($topic->media->main_image) && isset($topic->media->main_image->styles['thumbnail']))
                                                                        <img src="{{url('/')}}/{{ $topic->media->main_image->styles['thumbnail'] }}" alt="" width="34" >
                                                                    @else
                                                                        <img src="{{ asset('/public/website_assets/img/no-img.png') }}" alt="" width="34">
                                                                    @endif
                                                                </div>
                                                                <div class="ch-dropdown__title">{{ $topic->trans->title }}</div>
                                                            </div>
                                                            <div class="ch-dropdown__desc">
                                                                {!! $topic->trans->description !!}
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                        @endforeach
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- ======================================================================
                        Dropdown for Product section end
                        ======================================================================= -->
                        {{--<li class="ch-nav__item">--}}
                            {{--<a href="{{ action('QuizController@index') }}" hreflang="en">Quiz</a>--}}
                        {{--</li>--}}
                        {{--<li class="ch-nav__item">--}}
                            {{--<a href="pricing/index.html">Q&A Forum</a>--}}
                        {{--</li>--}}
                        <!-- ======================================================================
                        Dropdown for developer section start
                        ======================================================================= -->
                    {{--<li class="ch-nav__item" data-ch-dd="true">--}}
                    {{--<div class="ch-nav__dropdown">Developers</div>--}}
                    {{--<div class="ch-dropdown">--}}
                    {{--<ul class="ch-dropdown__list">--}}
                    {{--<li class="ch-dropdown__item">--}}
                    {{--<a href="https://apidocs.uistacks.com/docs/" class="ch-dropdown__link">API Documentation</a>--}}
                    {{--</li>--}}
                    {{--<li class="ch-dropdown__item">--}}
                    {{--<a href="tutorials/index.html" class="ch-dropdown__link">API Integration Tutorials</a>--}}
                    {{--</li>--}}
                    {{--<li class="ch-dropdown__item">--}}
                    {{--<a href="http://status.uistacks.com/" class="ch-dropdown__link">API Status</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</li>--}}
                    <!-- ======================================================================
                        Dropdown for developer section end
                        ======================================================================= -->
                        <!-- ======================================================================
                        Dropdown for more section start
                        ======================================================================= -->
                        <li class="ch-nav__item" data-ch-dd="true">
                            <div class="ch-nav__more"><span></span></div>

                            <div class="ch-dropdown">
                                <ul class="ch-dropdown__list">
                                    <li class="ch-dropdown__item">
                                        <a href="{{ action('CmsController@showPage','about-us') }}" class="ch-dropdown__link">About Us</a>
                                    </li>
                                    <li class="ch-dropdown__item">
                                        <a href="{{ action('CmsController@showPage','privacy') }}" class="ch-dropdown__link">Privacy Policy</a>
                                    </li>
                                    <li class="ch-dropdown__item">
                                        <a href="{{ action('BlogController@index') }}" class="ch-dropdown__link">Blog</a>
                                    </li>
                                    {{--<li class="ch-dropdown__item">--}}
                                    {{--<a href="resources/index.html" class="ch-dropdown__link">Resources</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="ch-dropdown__item">--}}
                                    {{--<a href="integrations/index.html" class="ch-dropdown__link">Integrations</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="ch-dropdown__item">--}}
                                    {{--<a href="help/updates/index.html" class="ch-dropdown__link">What's New?</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </li>
                        <!-- ======================================================================
                        Dropdown for more section end
                        ======================================================================= -->
                    </ul>
                </nav>
            </div>
            <!-- =========================================
            Header menu left end
            ========================================== -->
            <!-- =========================================
            Header menu right start
            ========================================== -->
            <div class="l-header__col">
                <nav class="ch-nav">
                    <ul class="ch-nav__list">
                        <li class="ch-nav__item">
                            <a href="tel:919403743126" style="color: #ff6c36">Support: +91 (940) 374 3126</a>
                        </li>
                        <!-- ======================================================================
                       Dropdown for resource section start
                       ======================================================================= -->
                        <li class="ch-nav__item" data-ch-dd="true">
                            <div class="ch-nav__dropdown">Help</div>

                            <div class="ch-dropdown ch-dropdown--right">
                                <ul class="ch-dropdown__list">
                                    <li class="ch-dropdown__item">
                                        <a href="javascript:void(0);" class="ch-dropdown__link">How UiStacks Works</a>
                                    </li>
                                    <li class="ch-dropdown__item">
                                        <a href="{{ action("WebsiteController@createContact")}}" class="ch-dropdown__link">Help Center</a>
                                    </li>
                                    <li class="ch-dropdown__item">
                                        <a href="{{ action("FaqController@faqs")}}" class="ch-dropdown__link">FAQs</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ======================================================================
                       Dropdown for resource section start
                       ======================================================================= -->
                        <li class="ch-nav__item">
                            <a href="{{ action('WebsiteController@login') }}">Sign in</a>
                        </li>
                        <li class="ch-nav__item">
                            <a href="{{ action('WebsiteController@register') }}" class="ch-nav__btn">Sign Up</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- =========================================
            Header menu right end
            ========================================== -->
        </div>
    </div>
</header>

<header class="l-header visible-xs visible-sm">
    <div class="l-header__container">
        <!-- =========================================
        Header Part start
        ========================================== -->
        <div class="l-header__row">
            <div class="ch-mheader">
                <a href="{{ url("/") }}" class="ch-logo">
                    <img src="{{ url("/") }}/public/website_assets/img/uistacks.png" alt="UiStacks Logo" width="100">
                </a>

                <div class="ch-burger" data-ch-mnav="true" id="ch-js-burger">
                    <span  class="ch-burger__icon"></span>
                </div>
            </div>
        </div>
        <!-- =========================================
        Header Part end
        ========================================== -->
        <!-- =========================================
        Slider menu Part end
        ========================================== -->
        <div class="l-header__row">
            <!-- =================================
            Mobile nav overlay start
            ================================== -->
            <div class="ch-mnav-overlay ch-mnav-overlay--hide" data-ch-mnav="true" id="ch-js-overlay"></div>
            <!-- =================================
            Mobile nav overlay end
            ================================== -->
            <div class="ch-mnav ch-mnav--hide" id="ch-js-nav">
                <!-- =================================
                Mobile nav header start
                ================================== -->
                <div class="ch-mnav__header">
                    <div class="ch-mnav__close" data-ch-mnav ="true" id="ch-js-close"></div>
                    <div class="ch-mnav__action">
                        <a href="{{ action('WebsiteController@login') }}" class="ch-mnav__link">Sign in →</a>
                    </div>
                </div>
                <!-- =================================
                Mobile nav Content start
                ================================== -->
                <div class="ch-mnav__content">
                    <div class="ch-mnav__actions">
                        <div class="ch-mnav__action">
                            <a href="{{ action('WebsiteController@register') }}" class="ch-mnav__btn">Getting Started →</a>
                        </div>
                        <div class="ch-mnav__action text-center">
                            <a href="tel:919403743126" class="ch-mnav__btn">
                                <span class="ch-mnav__call">Call Support</span>
                            </a>
                        </div>
                    </div>
                    <!-- =================================
                    Mobile nav part start
                    ================================== -->
                    <div class="ch-mnav__lists">
                        <!-- =================================
                        Mobile list start
                        ================================== -->
                        <div class="ch-mnav__blk">
                            <h4 class="ch-mnav__title">Tutorials</h4>
                            <ul class="ch-mnav__list">
                                @if(isset($arrCourses))
                                    @foreach($arrCourses as $course)
                                        <li class="ch-mnav__item">
                                            <a href="{{ action('LearnController@index',$course->slug) }}">{{ $course->trans->name }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <!-- =================================
                        Mobile list end
                        ================================== -->
                        <!-- =================================
                        Mobile list start
                        ================================== -->
                        <div class="ch-mnav__blk">
                            <h4 class="ch-mnav__title">Quiz</h4>
                            <ul class="ch-mnav__list">
                                @if(isset($arrTopics))
                                    @foreach($arrTopics as $topic)
                                        <li class="ch-mnav__item">
                                            <a href="{{ action('QuizController@index',$topic->slug) }}">{{ $course->trans->title }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <!-- =================================
                        Mobile list end
                        ================================== -->
                        <!-- =================================
                        Mobile list start
                        ================================== -->
                        {{--<div class="ch-mnav__blk">--}}
                            {{--<ul class="ch-mnav__list">--}}
                                {{--<li class="ch-mnav__item">--}}
                                    {{--<a href="customers/index.html">Q&A Forum</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        <!-- =================================
                        Mobile list end
                        ================================== -->
                        <!-- =================================
                        Mobile list start
                        ================================== -->
                        <div class="ch-mnav__blk">
                            <ul class="ch-mnav__list">
                                <li class="ch-mnav__item">
                                    <a href="{{ action("WebsiteController@createContact")}}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- =================================
                        Mobile list end
                        ================================== -->
                        <!-- =================================
                        Mobile list start
                        ================================== -->
                        <div class="ch-mnav__blk">
                            <ul class="ch-mnav__list">
                                <li class="ch-mnav__item">
                                    <a href="{{ action('CmsController@showPage','about-us') }}" >About Us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- =================================
                        Mobile list end
                        ================================== -->
                        <!-- =================================
                        Mobile list start
                        ================================== -->
                        <div class="ch-mnav__blk">
                            <ul class="ch-mnav__list">
                                <li class="ch-mnav__item">
                                    <a href="{{ action('CmsController@showPage','privacy') }}" >Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <!-- =================================
                        Mobile list end
                        ================================== -->

                        <!-- =================================
                       Mobile list start
                       ================================== -->
                        <div class="ch-mnav__blk">
                            <ul class="ch-mnav__list">
                                <li class="ch-mnav__item">
                                    <a href="{{ action('BlogController@index') }}">Blog</a>
                                </li>
                            </ul>
                        </div>
                        <!-- =================================
                        Mobile list end
                        ================================== -->
                    </div>
                    <!-- =================================
                    Mobile nav part edn
                    ================================== -->
                </div>
            </div>
        </div>
        <!-- =========================================
        Slider menu Part end
        ========================================== -->
    </div>
</header>