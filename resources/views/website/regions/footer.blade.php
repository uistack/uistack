<footer class="l-footer-new">
    <!-- ================================================
    Signup Part Start
    ================================================= -->

    {{--<div class="l-footer__row">--}}
        {{--<div class="cf-afford">--}}
            {{--<div class="cf-container cf-container--afford">--}}
                {{--<div class="cf-afford__fluid">--}}
                    {{--<div class="cf-afford__title">Put an end to clunky billing solutions. Your first $50K free.</div>--}}
                {{--</div>--}}
                {{--<div class="cf-afford__actions">--}}
                    {{--<div class="cf-afford__action">--}}
                        {{--<a href="trial-signup.html" onclick="ga('send', 'event', 'website', 'signup-intent', 'button-signup');" class="cf-afford__btn">--}}
                            {{--Sign up for free--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="cf-afford__action">--}}
                        {{--<a href="schedule-a-demo/index.html" class="cf-afford__link">--}}
                            {{--Schedule a demo →--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- ================================================
    Signup Part End
    ================================================= -->
    <!-- ================================================
    Footer Nav Part Start
    ================================================= -->
    <div class="l-footer__row">
        <div class="cf-master">
            <!-- ================================================
            Footer Feature Start
            ================================================= -->

            {{--<div class="cf-features hidden-xs hidden-sm">--}}
                {{--<div class="cf-container cf-container--features">--}}
                    {{--<div class="cf-features__col">--}}
                        {{--<a class="cf-feature cf-feature--support" href="help/index.html">--}}
                            {{--Quick support, 24✕5 →--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="cf-features__col">--}}
                        {{--<a class="cf-feature cf-feature--uptime" href="http://status.uistacks.com/">--}}
                            {{--99.9% Uptime →--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="cf-features__col">--}}
                        {{--<a class="cf-feature cf-feature--secure" href="security/index.html">--}}
                            {{--Highly secure & PCI Compliant →--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <!-- ================================================
            Footer Feature End
            ================================================= -->
            <!-- ================================================
            Footer Nav Start
            ================================================= -->
            <div class="cf-nav">
                <div class="cf-container cf-container--nav">
                    <!-- ========================================
                    Footer Nav one Start
                    ========================================== -->
                    <div class="cf-nav__col hidden-xs">
                        <div class="cf-nav__title">Tutorials</div>
                        @php
                            $allCourses = \UiStacks\Tutorials\Models\Course::where('active', 1)->take(8)->get();
                        @endphp
                        <ul class="cf-nav__list">
                            @if(isset($allCourses))
                                @foreach($allCourses as $course)
                                    <li class="cf-nav__item">
                                        <a href="{{ action('LearnController@index',$course->slug) }}" style="color: #9f95fc;">{{ $course->trans->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <!-- ========================================
                    Footer Nav three Start
                    ========================================== -->
                    {{--<div class="cf-nav__col hidden-xs">--}}
                        {{--<div class="cf-nav__title">Do more with</div>--}}
                        {{--<ul class="cf-nav__list">--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="payment-gateways/stripe/index.html">Stripe</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="payment-gateways/braintree/index.html">Braintree</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="payment-gateways/paypal-recurring-payments/index.html">PayPal</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="payment-gateways/authorize-net/index.html">Authorize.Net</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="tools/payment-gateway-comparison/index.html">Find a Payment Gateway</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="payment-gateways/index.html">Supported Payment Gateways</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    <!-- ========================================
                    Footer Nav four Start
                    ========================================== -->
                    <div class="cf-nav__col">
                        <div class="cf-nav__title">Help & Support</div>
                        <ul class="cf-nav__list">
                            <li class="cf-nav__item">
                                <a href="{{ action("WebsiteController@createContact")}}">Help Center</a>
                            </li>
                            <li class="cf-nav__item">
                                <a href="{{ action("FaqController@faqs")}}">FAQs</a>
                            </li>
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="http://status.uistacks.com/">Status</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="resources/index.html">Resources</a>--}}
                            {{--</li>--}}
                            <li class="cf-nav__item">
                                <a href="javascript:void(0);">How UiStacks works?</a>
                            </li>
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="subscription-billing-and-management-guide/index.html">Subscription Billing Guide</a>--}}
                            {{--</li>--}}
                        </ul>
                    </div>

                    <!-- ========================================
                    Footer Nav Mobile
                    ========================================== -->
                    {{--<div class="cf-nav__col visible-xs">--}}
                        {{--<div class="cf-nav__title">Compare UiStacks with</div>--}}
                        {{--<ul class="cf-nav__list">--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="compare-competitors/zuora/index.html">Zuora</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="compare-competitors/recurly/index.html">Recurly</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="compare-competitors/chargify/index.html">Chargify</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                    <!-- ========================================
                    Footer Nav five Start
                    ========================================== -->
                    <div class="cf-nav__col hidden-xs">
                        <div class="cf-nav__title">Company</div>
                        <ul class="cf-nav__list">
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="customers.html">Customers</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="partners/index.html">Partners</a>--}}
                            {{--</li>--}}
                            {{--<li class="cf-nav__item">--}}
                                {{--<a href="careers/index.html">Careers</a>--}}
                            {{--</li>--}}
                            <li class="cf-nav__item">
                                <a href="{{ action('CmsController@showPage','about-us') }}">About</a>
                            </li>
                            <li class="cf-nav__item">
                                <a href="{{ action('CmsController@showPage','terms') }}">Terms & Conditions</a>
                            </li>
                            <li class="cf-nav__item">
                                <a href="{{ action('CmsController@showPage','privacy') }}">Privacy</a>
                            </li>
                            <li class="cf-nav__item">
                                <a href="{{ action('BlogController@index') }}">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- ================================================
            Footer Nav End
            ================================================= -->
            <!-- ================================================
            Footer Media Start
            ================================================= -->
            {{--<div class="cf-media">--}}
                {{--<div class="cf-container cf-container--media">--}}
                    {{--<div class="cf-media__fluid hidden-xs">--}}
                        {{--<div class="cf-media__pages">--}}
                            {{--Compare UiStacks with--}}
                            {{--<a href="compare-competitors/zuora/index.html" target="_blank" class="cf-media__link">Zuora</a>,--}}
                            {{--<a href="compare-competitors/recurly/index.html" target="_blank" class="cf-media__link">Recurly</a> and--}}
                            {{--<a href="compare-competitors/chargify/index.html" target="_blank" class="cf-media__link">Chargify</a>--}}
                        {{--</div>--}}
                        {{--<div class="cf-media__pages">--}}
                            {{--UiStacks for--}}
                            {{--<a href="for-product-managers/index.html" target="_blank" class="cf-media__link">Product Managers</a>,--}}
                            {{--<a href="for-developers/index.html" target="_blank" class="cf-media__link">Developers</a> and--}}
                            {{--<a href="for-finance-teams/index.html" target="_blank" class="cf-media__link">Finance Teams</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- =========================================--}}
                    {{--Footer Blog Start--}}
                    {{--========================================== -->--}}
                    {{--<div class="cf-media__action">--}}
                        {{--<div class="cf-blog">--}}
                            {{--<a href="#" class="cf-blog__container">--}}
                                {{--<img class="cf-blog__figure hidden-xs hidden-sm">--}}
                                {{--<div class="cf-blog__content">--}}
                                    {{--<div class="cf-blog__label">Featured Story</div>--}}
                                    {{--<div class="cf-blog__title">--}}
                                        {{--Making Product Discovery Work in Small Teams →--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <!-- ================================================
            Footer Media End
            ================================================= -->
        </div>
    </div>
    <!-- ================================================
    Footer Nav Part End
    ================================================= -->
    <!-- ================================================
    Footer Metadata Part Start
    ================================================= -->

    {{--@include('website.regions.footer-bottom')--}}
    <!-- ================================================
    Footer Metadata Part End
    ================================================= -->
</footer>