@php
    $pageNameMode = trans('Settings::settings.smtp');
    $breadcrumbs[] = ['url' => '', 'name' => trans('Settings::settings.setting').' '.trans('Settings::settings.smtp')];
    $action = action('\UiStacks\Settings\Controllers\SettingsController@updateSmtp');
    $submitButton = trans('admin.update');
@endphp

@extends('admin.master')
@section('page_title')
{{ trans('Settings::settings.settings') }}: {{ $pageNameMode }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                    {{ trans('Settings::settings.setting') }} 
                    {{ $pageNameMode }}
                </h3>
            </div>
            <div class="panel-body">
                <form action="{{ $action }}" method="POST" role="form">
                    {{ csrf_field() }}
                    <div class="col-md-9">
                        @include('Core::fields.input_text', [
                            'field_name' => 'driver',
                            'name' => trans('Settings::settings.driver'),
                            'value' => $driver,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'host',
                            'name' => trans('Settings::settings.host'),
                            'value' => $host,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'port',
                            'name' => trans('Settings::settings.port'),
                            'value' => $port,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'username',
                            'name' => trans('Settings::settings.username'),
                            'value' => $username,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'password',
                            'name' => trans('Settings::settings.password'),
                            'value' => $password,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'address',
                            'name' => trans('Settings::settings.address'),
                            'value' => $address,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'name',
                            'name' => trans('Settings::settings.name'),
                            'value' => $name,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'encryption',
                            'name' => trans('Settings::settings.encryption'),
                            'value' => $encryption,
                            'placeholder' => ''
                        ])
                    </div>
                    <div class="col-md-3 sidbare">
                        <button type="submit" class="btn btn-block btn-primary">{{ $submitButton }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection