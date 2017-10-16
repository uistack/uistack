@extends('website.master')
@section('page_title')
تسجيل الدخول
@endsection
@section('content')
<div class="well login-box ">
    <legend>تسجيل الدخول</legend>
    @include('website.blocks.message')
    <form action="{{ action('WebsiteController@postLogin') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group clearfix">
            <label for="username-email">الجوال أو البريد الالكترونى</label>
            <input type="text" id="username-email" name="username" class="form-control" value="{{ old('username') }}" />
            <p class="help-block">مثال: 966XXXXXXXXX ,05XXXXXXXX,5XXXXXXXX أو myemail@example.com</p>
        </div>
        <div class="form-group clearfix">
            <label for="password">كلمه المرور</label>
            <input type="password" id="password" name="password" class="form-control" />
        </div>
        <div class="form-group text-center">
            {{-- <a href="/{{ Lang::getLocale() }}/login" class="btn btn-success btn-login-submit" value="Login" > </a> --}}
            <button type="submit" class="btn btn-success btn-login-submit">دخول</button>
            <br>
            <a href="{{url('/')}}/{{ Lang::getLocale() }}/register" class="btn btn-danger btn-cancel-action">مستخدم جديد</a><br>
            <span><a href="{{url('/')}}/{{ Lang::getLocale() }}/forgot-password">نسيت كلمه المرور</a></span>
        </div>
    </form>
</div>
@endsection