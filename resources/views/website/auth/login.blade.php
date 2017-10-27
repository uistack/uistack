@extends('website.master')
@section('page_title')
Login
@endsection
@section('header')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/bootstrap.css') }}" />--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/new_app.css') }}" />
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/main.css') }}" />--}}
@endsection
@section('content')
    <script type='text/javascript' src='{{ asset('public/website_assets/js/user/error_highlight.js') }}'></script>
    <noscript>
        <style>
            body {
                margin: 30px 0 0;
            }
            #_no_script_ {
                position:fixed;
                top:0;
                left:0;
                width: 100%;
                padding: 7px;
                background-color: #DD0E0E;
                color: #FFFFFF;
                line-height:1.4;
                text-align: center;
                z-index: 9999;
                opacity: 0.8;
                filter:alpha(opacity=80);
                font-size: 12px;
            }
        </style>
        <div id="_no_script_">
            Javascript has been disabled on your browser. Please enable it and refresh the page.
        </div>
    </noscript>
    <div class="cb-status-flash cb-main-status">
        <p></p>

    </div>
    <div class="cn-login">
        <div class="cn-login__header">
            <div class="cn-login__nav">
                <div class="cn-login__brand">
                    <a href="{{ url('/') }}/" class="cn-login__logo" tabindex="-1">
                        <img src="{{ url('/') }}/public/website_assets/img/uistacks.png" height="30">
                    </a>
                </div>
                <div class="cn-login__signup">
                    <span class="cn-login__signup-text">Don't have an account?</span>
                    <a href="{{ action('WebsiteController@register') }}" class="cn-login__signup-btn" tabindex="-1">
                        Sign up &rarr;
                    </a>
                </div>
            </div>
        </div>
        <div class="cn-login__block">
            {{--<div class="cn-login__left">--}}

                {{--<div class="cn-login__media">--}}
                    {{--<div class="cn-login__media-brand">--}}
                        {{--<img src="{{ url('/') }}/public/website_assets/img/ui-stacks.png" height="36">--}}
                    {{--</div>--}}
                    {{--<div class="cn-login__media-label">What's new</div>--}}
                    {{--<div class="cn-login__media-heading">--}}
                        {{--<a href="https://www.chargebee.com/new-user_email-notifications/?utm_source=login_banner" target="_blank">--}}
                            {{--All-new Email Notifications!--}}
                        {{--</a>--}}
                    {{--</div>--}}
                    {{--<div class="cn-login__media-body">--}}

                        {{--<a href="https://www.chargebee.com/new-user_email-notifications/?utm_source=login_banner" target="_blank">--}}
                            {{--<div class="cn-login__media-thumb" style="background-image:url('https://d190vb4jo83j4z.cloudfront.net/user_email_send.png'); background-size:120px 120px"></div>--}}
                        {{--</a>--}}

                        {{--<div class="cn-login__media-text">--}}
                            {{--<div>--}}
                                {{--Send transactional user_emails that delight and inform. Easy customer targeting and so much more.--}}
                            {{--</div>--}}
                            {{--<div>--}}
                                {{--<a href="https://www.chargebee.com/new-user_email-notifications/?utm_source=login_banner" class="cn-login__media-link" target="_blank">--}}
                                    {{--Learn more--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

            <div class="cn-login__right cn-modules">
                <div id="cb-user-login" class="clearfix">
                    <div class="cb-form-container cn-login__form cn-form" >
                        @include('website.blocks.page-message')
                        <form id="users_login_submit" name="users_login_submit" method="post" action="{{ action('WebsiteController@postLogin') }}" autocomplete="on" data-loading-text="Loading..." validate="true" >
                            <div class="cn-login__form-title">Sign into UiStacks</div>
                            <div class="cn-form__field">
                                <input type="text" autofocus="true" name="user_email" id="user_email" value="" class="cn-form__control" placeholder="name@uistacks.com" validate="true">
                                <span id="user_email.err" name="user_email.err" class="cn-form__error"></span>
                            </div>
                            <div id="cb-alert-registration-fields">
                                <div class="cn-form__field">
                                    <div class="cn-form__password cn-form__group">
                                        <input id="password" type="password" autocomplete="off" name="user_password" value="" class="cn-form__control" placeholder="password" validate="true">
                                        <span id="cb-show-hide-pwd-link" class="cn-form__password-toggle">Show</span>
                                    </div>
                                    <span id="user_password.err" name="user_password.err" class="cn-form__error"></span>
                                </div>
                                <div class="cn-login__form-actions">
                                    <input type="submit" class="cn-btn cn-btn--raised cn-btn--brand" value="Sign in">
                                    <a class="cn-login__anchor" id="cb-forgot-pwd-link" tabindex="-1">Forgot password?</a>
                                </div>
                            </div>
                            <input type ='hidden'  name="login_token"  value="ikp5A5KjvYdkq7d0jC8IIsopdRI9Ia8Q" />
                        </form>
                    </div>
                    <script>
                        var users_login_submit = {"validators":{"user_email":{"presence":{"message":"cannot be blank"},"user_email":{"message":" should be a valid user_email"},"is_account_registered":{"message":"account not yet registered"}},"user_password":{"presence":{"message":"cannot be blank"},"length":{"message":" should be between 8 and 56 characters","minimum":8,"maximum":56}},"login_token":{"presence":{"message":"cannot be blank"},"length":{"message":" should not have more than 70 characters","maximum":70}},"forward":{"allow_blank":true}},"strategy":"onsubmit","stripEmptyParams":false};
                    </script>
                    <div class="cn-login__mail clearfix" id="cb-alert-registration" style="display:none">
                        <div class="cn-login__mail-thumb">
                            <span class="cn-login__mail-verify"></span>
                        </div>
                        <div class="cn-login__mail-content">
                            Hey! Looks like you haven't completed your account setup. We have sent you an user_email with instructions.
                            <div>
                                <div  class="cb-form-container"  style="display:inline-block;" >
                                    <form  id="users_resend_registration_unauth"  name="users_resend_registration_unauth"  method="post"  action="/users/resend_registration_unauth"  ajax="true"  ajaxEvent="formhandler"  autocomplete="on"  data-loading-text="Loading..."  validate="true" >
                                        <input type ='hidden'  name="user_email"  value="" />
                                        <a id="cb-alert-resend-mail" tabindex="-1">Resend Email</a>
                                    </form>
                                </div>
                                <script>
                                    var users_resend_registration_unauth = {"validators":{"user_email":{"presence":{"message":"cannot be blank"},"user_email":{"message":" should be a valid user_email"}}},"strategy":"onsubmit","stripEmptyParams":false};
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="cn-login__oauth">
                        <div class="cn-login__divider">
                            <span class="cn-login__divider-text">or</span>
                        </div>
                        <div  class="cb-form-container" ><form  id="users_google_sign_in"  name="users_google_sign_in"  method="post"  action="/users/google_sign_in"  ajax="true"  ajaxEvent="frwdHandle"  autocomplete="on"  data-loading-text="Loading..."  validate="true" >

                                <div class="g-signin2" id="google-signin" data-onsuccess="onSignIn"></div>

                                <input type="hidden" name="id_token" value=""/>
                                <input type ='hidden'  name="login_token"  value="ikp5A5KjvYdkq7d0jC8IIsopdRI9Ia8Q" />


                            </form> </div><script>var users_google_sign_in = {"validators":{"id_token":{"presence":{"message":"cannot be blank"},"length":{"message":" should not have more than 2000 characters","maximum":2000}},"login_token":{"presence":{"message":"cannot be blank"},"length":{"message":" should not have more than 70 characters","maximum":70}},"forward":{"allow_blank":true,"length":{"message":" should not have more than 500 characters","maximum":500}}},"strategy":"onsubmit","stripEmptyParams":false};</script>
                        <input type="hidden" name="google_user_email" id="google_user_email"/>
                        <div id="google_user_email.err" name="google_user_email.err" class="cn-form__error" style="max-width:200px;"></div>
                    </div>
                </div>
                <div id="cb-forgot-password" style="display:none;">
                    <div  class="cb-form-container cn-form" >
                        <form  id="forgot_passwords_user_email_submit"  name="forgot_passwords_user_email_submit"  method="post"  action="/forgot_passwords/user_email_submit"  ajax="true"  ajaxEvent="forgotPwdHandler"  autocomplete="on"  data-loading-text="Loading..."  validate="true" >
                            <div class="cn-form__field">
                                <label  class="cn-form__label">Your registered user_email address</label>
                                <input type="text" name="user_email" id="user_email" value="" class="cn-form__control" placeholder="name@company.com" validate="true" value="" autofocus="true">
                                <span id="user_email.err" name="user_email.err" class="cn-form__error"></span>
                            </div>
                            <div class="cn-form__field">
                                <input type="submit" class="cn-btn cn-btn--lg cn-btn--raised cn-btn--primary" value="Send reset link" id="cb-forgot-pwd-link-submit">
                            </div>
                            <div class="cn-form__field cn-ta--center"><a id="back-from-forgot-pwd" class="cn-login__anchor">Back to login</a></div>
                        </form>
                    </div>
                    <script>
                        var forgot_passwords_user_email_submit = {"validators":{"user_email":{"presence":{"message":"cannot be blank"},"user_email":{"message":" should be a valid user_email"}}},"strategy":"onsubmit","stripEmptyParams":false};
                    </script>
                </div>
                <div style="display: none">
                    <form action="" method="post" id="forward_form" >
                        <input type="hidden" name="csrf_token" value=""/>
                        <input type="hidden" name="domain" value=""/>
                        <input type="hidden" name="session_id" value=""/>
                        <input type="hidden" name="fwd_url" value=""/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src='https://apis.google.com/js/platform.js?onload=renderButton' async defer></script>
    <meta name="google-signin-client_id" content="1026171866281-i02klruckr6inbgfe01432nvg5eov7up.apps.googleusercontent.com">
  @endsection
@section('footer')
{{--    <script src="{{ asset('public/website_assets/js/user/modernizr-2.5.3.js') }}"></script>--}}
    <script src="{{ asset('public/website_assets/js/user/ajaxhandler.js') }}"></script>
{{--    <script src="{{ asset('public/website_assets/js/user/collapse.js') }}"></script>--}}
    <script src="{{ asset('public/website_assets/js/user/users.js') }}"></script>
@stop