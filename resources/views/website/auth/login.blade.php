@extends('website.master')
@section('page_title')
    Login
@endsection
@section('header')

@endsection
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="lock-container">
                @include('website.blocks.page-message')
                <form action="{{ action('WebsiteController@postLogin') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="panel panel-default text-center paper-shadow" data-z="0.5">
                        <h1 class="text-display-1 text-center margin-bottom-none">Sign In</h1>
                        <img src="{{ url('/') }}/public/website_assets/img/user.png" class="img-circle width-80">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="form-control-material">
                                    <input required class="form-control" placeholder="{{ trans('Core::operations.email') }}" id="user_email" name="user_email" type="text">
                                    <label for="username">{{ trans('Core::operations.email') }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control-material">
                                    <input class="form-control" placeholder="{{ trans('Core::operations.password') }}" name="user_password" id="user_password" type="password">
                                    <label for="password">{{ trans('Core::operations.password') }}</label>
                                </div>
                            </div>
                            {{--<a href="website-student-dashboard.html" class="btn btn-primary">Login <i class="fa fa-fw fa-unlock-alt"></i></a>--}}
                            <button class="btn btn-primary" type="submit">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
                            <a href="{{ action('WebsiteController@forgotPassword') }}" class="forgot-password">Forgot password?</a>
                            <a href="{{ action('WebsiteController@register') }}" class="link-text-color">Create account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
        <script async defer src="{{ asset('public/website_assets/js/customize/user.js') }}" type="text/javascript" ></script>
@stop