@extends('website.master')
@section('page_title')
    Dashboard
@endsection
@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/jquery-linedtextarea.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/website_assets/css/user/dashboard.css') }}" />
<style type="text/css">
    .table-user-information > tbody > tr:first-child {
        border-top: 0;
    }
</style>
@endsection
@section('content')
    <div class='wrapper'>
        @include('website.regions.dash-header')
        <div id="cb-main-content">
            <div class="cb-container">
                <div id="cb-settings-nav">
                    <nav class="cb-left-nav">
                        <div class="title"><span></span>
                            SITE SETTINGS
                        </div>
                        <ul class="settings-list">
                            <li class="settings-item active">
                                <a href="/sites/edit"><span class="first">Site Info & Billing Rules</span></a>
                            </li>
                            <li class="settings-item inactive">
                                <a href="/site_locales/edit"><span class="">Languages</span>
                                </a>
                            </li>
                            <li class="settings-item inactive">
                                <a href="/currency_config"><span class="">Currencies</span>
                                </a>
                            </li>
                            <li class="settings-item inactive">
                                <a href="/payment_gateways"><span class="">Payment Gateways</span>
                                </a>
                            </li>
                            <li class="settings-item inactive">
                                <a href="/reports/edit_settings"><span class="">Report Settings</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="cb-detail-container">
                    <div  class="cb-form-container" >
                        <form id="frm_update_profile" method="post" action="{{ action('WebsiteController@updateProfile') }}" autocomplete="on">
                            {{ csrf_field() }}
                            <div class="title"><span></span><strong>PROFILE INFORMATION</strong></div>
                            <div class="row">
                                {{--<div class="col-md-3 col-lg-3 " align="center">--}}
                                    {{--<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">--}}
                                {{--</div>--}}
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>{{ trans('Core::operations.name') }}:</td>
                                            <td>{{ $item->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('Core::operations.email') }}:</td>
                                            <td>{{ $item->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>01/24/1988</td>
                                        </tr>

                                        <tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>Male</td>
                                        </tr>
                                        <tr>
                                            <td>Home Address</td>
                                            <td>Pune, MH</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:info@support.com">info@support.com</a></td>
                                        </tr>
                                        <td>Phone Number</td>
                                        <td>123-4567-890(Landline)<br><br>+91-9403-743-126(Mobile)
                                        </td>

                                        </tr>

                                        </tbody>
                                    </table>
                                    {{--<a href="#" class="btn btn-primary">My Sales Performance</a>--}}
                                    {{--<a href="#" class="btn btn-primary">Team Sales Performance</a>--}}
                                </div>
                            </div>
                            <div  class="cb-form-button cb-fix-footer cn-js--disable" >
                                <a href="{{ action('WebsiteController@editProfile') }}">Edit Profile </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('website.regions.dash-footer')
    </div>

@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/user/modernizr-2.5.3.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/user/ajaxhandler.js') }}"></script>
    <script src="{{ asset('public/website_assets/js/user/collapse.js') }}"></script>
@stop