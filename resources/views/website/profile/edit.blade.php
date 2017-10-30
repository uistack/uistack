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
                    @include('website.regions.leftbar')
                </div>
                <div class="cb-detail-container">
                    <div  class="cb-form-container" >
                        <form id="frm_update_profile" method="post" action="{{ action('WebsiteController@updateProfile') }}" autocomplete="on">
                            {{ csrf_field() }}
                            <h2 class="cb-sub-title-text" >Profile Info</h2>
                            <div class="row">
                                {{--<div class="col-md-3 col-lg-3 " align="center">--}}
                                    {{--<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">--}}
                                {{--</div>--}}
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>Department:</td>
                                            <td>Programming</td>
                                        </tr>
                                        <tr>
                                            <td>Hire date:</td>
                                            <td>06/23/2013</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>01/24/1988</td>
                                        </tr>

                                        <tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>Female</td>
                                        </tr>
                                        <tr>
                                            <td>Home Address</td>
                                            <td>Kathmandu,Nepal</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:info@support.com">info@support.com</a></td>
                                        </tr>
                                        <td>Phone Number</td>
                                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                        </td>

                                        </tr>

                                        </tbody>
                                    </table>
                                    {{--<a href="#" class="btn btn-primary">My Sales Performance</a>--}}
                                    {{--<a href="#" class="btn btn-primary">Team Sales Performance</a>--}}
                                </div>
                            </div>
                            <div  class="cb-form-button cb-fix-footer cn-js--disable" >
                                <input  type="submit"  value="Update Site Info &amp; Billing Rules" />
                            </div>
                            <input type='hidden' name='_csrf_token'  value="myOjV3CdrVcuAnJllv2EvuUxxpLakHHL8" />
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