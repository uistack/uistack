@extends('website.master')
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/tp_swiftype.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/select2-alt.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/home.css') }}" />
@endsection
@section('content')
    {{--    @include('website.home.blocks.top-head')--}}
    @include('website.regions.header')

    <section class="hero-sec">
        <div class="container text-center">
            <article>
                <h1>The smartest way to <br class="hidden-xs">Become an UI Developer</h1>
                <p class="p">Give yourself an excellent with our scalable/inspiring online courses and join a global community of web learners</p>
                <div class="mar-t-sm mar-b-xs hidden-xs hidden-sm">
                    <a href="trial-signup.html" class="btn btn-sec btn-primary btn-primary-sec btn-md btn-suffix" onclick="ga('send', 'event', 'website', 'signup-intent', 'button-signup');">
                        <img src="{{ url("/") }}/public/website_assets/img/ui-stacks.png" alt="UiStacks Logo Mark" style="width: 30px; margin-top: -7px; margin-right: 10px;"> Sign up for free
                    </a>
                </div>
            {{--<div class="hidden-xs hidden-sm"><a class="btn-flat" href="schedule-a-demo/index.html" title="schedule-a-demo">Schedule a Demo</a></div>--}}

            <!--Start Mobile-view Demo request -->
                <div class="mar-t-sm mar-b-xs visible-xs visible-sm">
                    <a href="trial-signup.html" class="btn btn-sec btn-primary btn-primary-sec btn-md btn-suffix" onclick="ga('send', 'event', 'website', 'signup-intent', 'button-signup');">
                        <img src="{{ url("/") }}/public/website_assets/img/ui-stacks.png" alt="UiStacks Logo Mark" style="width: 30px; margin-top: -7px; margin-right: 10px;"> Sign up for free
                    </a>
                </div>
            {{--<div class="visible-xs visible-sm"><a href="schedule-a-demo/index.html" class="btn-flat">Schedule a Demo</a></div>--}}
            <!--Start Mobile-view Demo request -->
            </article>
        </div>
    </section>
    <section class="support-block">
        {{--<hr class="no-mar">--}}
        <div class="text-center">
            <div class="block-title">
                Resourses Lists
            </div>
        </div>
        <section class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="search-result-block">
                        <div class="search-result-loading" style = "display:none"><span>Loading search results...</span></div>
                        <div id="no-result" class="search-result-none block-space text-center" style="display:none">
                            <div class="h1 ProximaNova-Bold">Oops!</div>
                            <p class="text-18">We couldn't find the content you were looking for.</p>
                            <div class="text-18">Get in touch with us at <a href="mailto:support@uistacks.com">support@uistacks.com</a> for any queries</div>
                            <div class="block-top-space-sm">- Or -</div>
                            <div class="block-space-sm">
                                <a href="index.html" class="btn btn-default"><span class="fa fa-long-arrow-left"></span> Go back to help and support</a>
                            </div>
                        </div>
                        <div id="search-result-heading" class="search-result-heading" style="display:none;">
                            <!--Showing <span></span> results for <strong id="swift-searched-for"></strong>-->
                        </div>
                        <div id="swift-result-container"></div>
                    </div>
                </div>
            </div>
            <!--hide this block after search result-->
            <div id="general-topics">
                <div class="support-links-list">
                    @php
                        $arrCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->take(4)->get();
                    @endphp
                    @if(isset($arrCourses))
                        @foreach($arrCourses as $course)
                            <div class="support-link">
                                <a href="{{ action('LearnController@index',$course->slug) }}">
                                    <p>
                                        @if(isset($course->media) && isset($course->media->main_image) && isset($course->media->main_image->styles['thumbnail']))
                                            <img src="{{url('/')}}/{{ $course->media->main_image->styles['thumbnail'] }}" alt="" width="40" >
                                        @else
                                            <img src="{{ asset('/public/website_assets/img/no-img.png') }}" alt="" width="40">
                                        @endif
                                    </p><i class="tuts-name">{{ $course->trans->name }}</i></a>
                            </div>
                        @endforeach
                    @endif
                    {{--<div class="support-link">--}}
                    {{--<a href="javascript:void(0);" target="_blank"><p><img src="{{ url("/") }}/public/website_assets/img/servicers/php.png" alt="PHP" width="48"></p>PHP Tutorials</a>--}}
                    {{--</div>--}}
                    {{--<div class="support-link">--}}
                    {{--<a href="javascript:void(0);" target="_blank"><p><img src="{{ url("/") }}/public/website_assets/img/servicers/node.png" alt="Node JS" width="48"></p>NodeJS Tutorials</a>--}}
                    {{--</div>--}}
                    {{--<div class="support-link">--}}
                    {{--<a href="javascript:void(0);" target="_blank"><p><img src="{{ url("/") }}/public/website_assets/img/servicers/ruby.png" alt="Ruby" width="48"></p>Ruby on Rails Tutorials</a>--}}
                    {{--</div>--}}
                    {{--<div class="support-link">--}}
                    {{--<a href="javascript:void(0);" target="_blank"><p><img src="{{ url("/") }}/public/website_assets/img/servicers/angularjs.png" alt="AngularJS" width="48"></p>AngularJS Tutorials</a>--}}
                    {{--</div>--}}
                    {{--<div class="support-link">--}}
                    {{--<a href="javascript:void(0);" target="_blank"><p><img src="{{ url("/") }}/public/website_assets/img/servicers/mongodb.png" alt="MongoDB" width="48"></p>MongoDB Tutorials</a>--}}
                    {{--</div>--}}
                    {{--<div class="support-link">--}}
                    {{--<a href="../docs/index.html" target="_blank"><span class="fa fa-file-text-o"></span>Help documentation</a>--}}
                    {{--</div><!----}}
                    {{----><div class="support-link">--}}
                    {{--<a href="https://apidocs.uistacks.com/" target="_blank"><span class="fa fa-file-code-o"></span>API reference</a>--}}
                    {{--</div><!----}}
                    {{----><div class="support-link">--}}
                    {{--<a href="../tutorials/index.html" target="_blank"><span class="fa fa-users"></span>API integration tutorials</a>--}}
                    {{--</div><!----}}
                    {{----><div class="support-link">--}}
                    {{--<a href="updates/index.html" target="_blank"><span class="fa fa-rotate-left"></span>What's New?</a>--}}
                    {{--</div>--}}
                    {{--<div class="support-link">--}}
                    {{--<a href="https://support.uistacks.com/support/solutions" target="_blank"><span class="fa fa-book"></span>Knowledge Base</a>--}}
                    {{--</div>--}}
                </div>

                {{--<div class="text-center">--}}
                {{--<div class="block-title">--}}
                {{--LEARN WEB DEVELOPMENT--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                {{--<div class="col-sm-4">--}}
                {{--<div class="support-brick" style="border-color:#AF9BF7;">--}}
                {{--<div class="support-brick-header" style="background-image: linear-gradient(45deg, rgba(155, 131, 245, 0.8) 0%, rgba(104, 104, 227, 0.8) 100%);">--}}
                {{--<span class="fa fa-file-text"></span>--}}
                {{--The Basics--}}
                {{--</div>--}}
                {{--<div class="support-brick-body">--}}
                {{--<ul class="list-arrow">--}}
                {{--<li><a target="_blank" href="../docs/cards.html#what-is-a-payment-gateway">Understanding merchant account and payment gateways</a></li>--}}
                {{--<li><a target="_blank" href="../docs/building-blocks-overview.html">An overview of Chargebee's building blocks</a></li>--}}
                {{--<li><a target="_blank" href="../docs/plans.html">Configuring plans, addons and more</a></li>--}}
                {{--<li><a target="_blank" href="../docs/hp_overview.html">Using hosted pages</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                {{--<div class="support-brick" style="border-color:#F18F93;">--}}
                {{--<div class="support-brick-header" style="background-image: linear-gradient(-134deg, rgba(245, 145, 90, 0.8) 33%, rgba(241, 131, 103, 0.8) 58%, rgba(236, 110, 125, 0.8) 100%);">--}}
                {{--<span class="fa fa-money"></span>--}}
                {{--Collecting Payments--}}
                {{--</div>--}}
                {{--<div class="support-brick-body">--}}
                {{--<ul class="list-arrow">--}}
                {{--<li><a target="_blank" href="../docs/cards.html">Card Payments</a></li>--}}
                {{--<li><a target="_blank" href="../docs/paypal_express_checkout.html">PayPal Express Checkout</a></li>--}}
                {{--<li><a target="_blank" href="../docs/amazon_payments.html">Amazon Payments</a></li>--}}
                {{--<li><a target="_blank" href="../docs/direct-debit-payments.html">Direct Debit</a></li>--}}
                {{--<li><a target="_blank" href="../docs/offline_payments.html">Offline Payments (Cash and Checks)</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4">--}}
                {{--<div class="support-brick" style="border-color:#C78BE9;">--}}
                {{--<div class="support-brick-header" style="background-image: linear-gradient(-134deg, rgba(229, 119, 172, 0.8) 33%, rgba(180, 109, 234, 0.8) 100%);">--}}
                {{--<span class="fa fa-wrench"></span>--}}
                {{--Using our APIs--}}
                {{--</div>--}}
                {{--<div class="support-brick-body">--}}
                {{--<ul class="list-arrow">--}}
                {{--<li><a target="_blank" href="https://apidocs.uistacks.com/docs/api">An overview of Chargebee's APIs</a></li>--}}
                {{--<li><a target="_blank" href="../docs/api_keys.html">API Keys</a></li>--}}
                {{--<li><a target="_blank" href="../docs/webhook_settings.html">Webhooks</a></li>--}}
                {{--<li><a target="_blank" href="https://github.com/uistacks/uistacks-samples">Code samples</a></li>--}}
                {{--<li><a target="_blank" href="https://github.com/uistacks?utf8=%E2%9C%93&amp;query=uistacks">Chargebee's client libraries</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}

            </div>

            <div class="block-space-sm"></div>
        </section>
    </section>

    <div class="text-center">
        <div class="block-title">
            Our Services
        </div>
    </div>
    <section class="tpmain-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="{{ url("/") }}/public/website_assets/img/support.svg" alt="Support">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">IT Support & Services</h4>
                            <p class="tpmain-media__text">Eliminate Downtime & Maximize Benefits of Critical Applications.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            {{--<img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/enterprise/security.svg" alt="">--}}
                            <i class="fa fa-desktop fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Application Development and Maintenance</h4>
                            <p class="tpmain-media__text">We can handle everything about your website.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <i class="fa fa-lightbulb-o fa-2x" aria-hidden="true"></i>
                            {{--<img src="https://d2jxbtsa1l6d79.cloudfront.net/assets/web/9.4.0/images/enterprise/role.svg" alt="">--}}
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Strategy & Consulting</h4>
                            <p class="tpmain-media__text">Different teams use Chargebee to accomplish different objectives. Onboard different roles, assign permissions, and collaborate better.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="{{ url("/") }}/public/website_assets/img/two-factor.svg" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">System Monitoring</h4>
                            <p class="tpmain-media__text">Enforce an additional layer of security with two-factor logins, for all your users. Because passwords aren’t enough.</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="{{ url("/") }}/public/website_assets/img/infrastructure-support.svg" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Infrastructure Support</h4>
                            <p class="tpmain-media__text">When special business needs arise, we ensure that our infrastructure responds, and is rendered, to fit your requirements.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="{{ url("/") }}/public/website_assets/img/migration.svg" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Complete Migration Assistance</h4>
                            <p class="tpmain-media__text">Migrating your customer data (subscriptions and other details) from existing systems is simple, and in safe hands that have tended to hundreds of migrations.</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
    @include('website.regions.footer')
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/tp_swiftype.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/select2.min.js') }}"></script>
@endsection