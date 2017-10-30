<div class="cb-toasts">
    <!--LOOP - more than one toast-->
</div>
<div class="cn-header" style="border-top-color:#503CC8;">
    <div class="cn-container">
        <div class="cn-header__container">
            <div class="cn-header__brand">
                <a href="{{ url("/") }}" tabindex="-1" class="cn-header__logo"><img src="{{ url("/") }}/public/website_assets/img/ui-stacks.png" width="30" hight="30"/>UiStacks</a>
            </div>
            <div class="cn-header__nav">
                <div  id="cb-main-tab"  class="cn-nav" >
                    <div  class="cn-nav__list" >
                        <a class="cn-nav__item" href="{{ url("/") }}" >Home</a>
                        <a class="cn-nav__item" href="{{ action('LearnController@learn') }}" >Tutorials</a>
                        <a class="cn-nav__item" href="{{ action('QuizController@quiz') }}" >Quiz</a>
                        {{--<a class="cn-nav__item cn-nav__item--active " href="/settings" >Settings</a>--}}
                    </div>
                </div>
            </div>
            <div class="cn-header__actions cn-header__optional">
                {{--<div class="cn-header__action">--}}
                    {{--<span class="cn-header__featured" id="new_feature_notification" style="color:#FFB16B">What's New?</span>--}}
                {{--</div>--}}
                <div class="cn-header__action">
                    <a href="{{ action("WebsiteController@createContact")}}" target="_blank" class="cn-header__help">Help Center</a>
                </div>
            </div>
            <div class="cn-header__actions">
                <div class="cn-header__action" >
                    <div class="cn-account" data-cb-account-nav="true">
                        <div class="cn-account__profile" style="color:#FFB16B">
                            <div class="cn-account__name">{{Auth::user()->name}}</div>
                            <div class="cn-account__arrow">
                                <svg width="12px" height="9px" viewBox="0 0 12 9" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                    <defs>
                                        <path d="M0,0 L12,0 L12,9 L0,9 L0,0 Z">
                                        </path>
                                    </defs>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                        <g sketch:type="MSLayerGroup">
                                            <mask sketch:name="Clip 2" fill="white">
                                                <use xlink:href="#path-1">
                                                </use>
                                            </mask>
                                            <g>
                                            </g>
                                            <path d="M12.0003,1.9997 C12.0003,0.8957 11.1043,-0.0003 10.0003,-0.0003 L2.0003,-0.0003 C0.8953,-0.0003 0.0003,0.8957 0.0003,1.9997 L0.0003,6.9997 C0.0003,8.1047 0.8953,8.9997 2.0003,8.9997 L10.0003,8.9997 C11.1043,8.9997 12.0003,8.1047 12.0003,6.9997 L12.0003,1.9997 Z M9.4173,3.6427 L6.1953,6.7217 C6.1403,6.7737 6.0753,6.7997 6.0003,6.7997 C5.9253,6.7997 5.8603,6.7737 5.8053,6.7217 L2.5823,3.6427 C2.5273,3.5897 2.5003,3.5267 2.5003,3.4537 C2.5003,3.3797 2.5273,3.3167 2.5823,3.2647 L3.3033,2.5797 C3.3583,2.5267 3.4243,2.4997 3.4993,2.4997 C3.5743,2.4997 3.6393,2.5267 3.6943,2.5797 L6.0003,4.7857 L8.3063,2.5797 C8.3613,2.5267 8.4263,2.4997 8.5013,2.4997 C8.5763,2.4997 8.6423,2.5267 8.6973,2.5797 L9.4173,3.2647 C9.4733,3.3167 9.5003,3.3797 9.5003,3.4537 C9.5003,3.5267 9.4733,3.5897 9.4173,3.6427 L9.4173,3.6427 Z" id="Fill-1" fill="currentColor" sketch:type="MSShapeGroup" mask="url(#mask-2)">
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="cn-account__container" data-cb-account-content="true">
                            <div class="cn-account__content">
                                <div class="cn-account__site test">
                                    <div class="cn-account__site-header">
                                        <div class="cn-account__site-title">{{Auth::user()->name}}</div>
                                        <div class="cn-account__site-label test">{{Auth::user()->email}}</div>
                                    </div>
                                    <div class="cn-account__site-list">
                                        <div class="cn-account__site-item">
                                            <a id ="acc_enable_live" href="{{ action('WebsiteController@dashboard') }}" style="text-decoration: none">Dashboard</a>
                                        </div>
                                        <div class="cn-account__site-item">
                                            <a href="{{ action('LearnController@learn') }}"> Tutorials</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="cn-account__list">
                                    <div class="cn-account__item">
                                        <div class="cn-account__item-title">{{Auth::user()->name}}</div>
                                        <div class="cn-account__item-text">{{Auth::user()->email}}</div>
                                        <div class="cn-account__item-action">
                                            <a class="cn-account__anchor" href="{{ action('WebsiteController@editProfile') }}">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <a class="cn-account__logout cn-js--disable"  href="{{ action('WebsiteController@logout') }}"  class=" cn-account__logout cn-js--disable"  id="users.logout" >
                                    Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cn-header__action">
                    <!--don't remove the <span>-->
                    {{--<a id="acc_enable_live" href="/sites/enable_live" class="cn-site-label cn-site-label--go-live" style="text-decoration: none">Go Live!</a>--}}
                    <span id="site_help" data-modal="#modal" class="modal__trigger cb-mdl-mig_trigger" style="display: inline-block;"><span class="cn-site--help"></span></span>
                </div>
                <div id="cb-alert-claim" style="display:none;">
                    <div class="cn-modal cn-modal-verify cn-modules">
                        <div class="cn-modal__wrap">
                            <div class="cn-modal__container cn-modal-verify__container">
                                <div class="cn-modal-verify__main">
                                    <div class="cn-modal-verify__aside">
                                        <div class="cn-modal-verify__icon">
                                        </div>
                                    </div>
                                    <div class="cn-modal-verify__content">
                                        <div class="cn-modal-verify__title">Hello there!
                                        </div>
                                        <div class="cn-modal-verify__desc">
                                            Looks like you haven't completed your account setup. Why don't you check your inbox for our email?
                                        </div>
                                        <div class="cn-modal-verify__text">
                                            Can't find it?
                                            <div  class="cb-form-container" >
                                                <form  id="users_resend_registration_auth"  name="users_resend_registration_auth"  method="post"  action="/users/resend_registration_auth"  ajax="true"  ajaxEvent="formhandler"  autocomplete="on"  data-loading-text="Loading..."  validate="true" >
                                                    <a id="cb-alert-resend-mail">Resend email
                                                    </a>
                                                    <input type='hidden' name='_csrf_token'  value="myOjV3CdrVcuAnJllv2EvuUxxpLakHHL8" />
                                                </form>
                                            </div>
                                            <script>var users_resend_registration_auth = {
                                                    "validators":{
                                                    }
                                                    ,"strategy":"onsubmit","stripEmptyParams":false};
                                            </script>
                                        </div>
                                        <div class="cn-modal-verify__action">
                                            <span id="cb-alert-claim-close" class="cn-btn cn-btn--raised cn-btn--primary">Okay, got it</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cn-modal-overlay">
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="cn-header-sub">
    <div class="cn-container">
        <div class="cn-header-sub__nav">
            <a class="cn-header-sub__nav-item active" href="{{ action('WebsiteController@dashboard') }}">Dashboard</a>
            <a class="cn-header-sub__nav-item" href="{{ action('WebsiteController@profile') }}">Profile</a>
            <a class="cn-header-sub__nav-item" href="{{ action('WebsiteController@accountSetting') }}">Settings</a>
        </div>
    </div>
</div>
<div class="cb-scroll-fix">
</div>
<div class="cb-loading">Processing...
</div>
<div class="cb-status-flash cb-main-status">
    <p>
    </p>
</div>
<script>
    $('.cb-apiLink').click(function(){
            $('#cb-apiLink').submit();
        }
    );
    $('.cb-importdocLink').click(function(){
            $('#cb-importdocLink').submit();
        }
    );
</script>