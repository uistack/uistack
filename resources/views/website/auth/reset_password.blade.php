@extends('website.master')
@section('page_title')
تحديث كلمة المرور
@endsection
@section('content')
<div class="well login-box">
    <form action="{{ action('WebsiteController@postResetPassword', [$userId, $method]) }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <legend>تحديث كلمة المرور</legend>
        @include('website.blocks.message')
        <div class="form-group label-floating">
            <label for="password" class="control-label">كلمة المرور الجديدة</label>
            <input id="password" name="password" type="password" class="form-control" />
        </div>
        <div class="form-group  label-floating">
            <label for="password_confirmation" class="control-label"> تأكيد كلمة المرور الجديدة</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" />
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-login-submit">تسجيل</button>
        </div>
    </form>
</div>
@endsection
