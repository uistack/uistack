@php
    $pageNameMode = trans('Settings::settings.main_information');
    $breadcrumbs[] = ['url' => '', 'name' => trans('Settings::settings.setting').' '.trans('Settings::settings.main_information')];
    $action = action('\UiStacks\Settings\Controllers\SettingsController@updateInformation');
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
                            'field_name' => 'name',
                            'name' => trans('Settings::settings.name'),
                            'value' => $name,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'address',
                            'name' => trans('Settings::settings.paddress'),
                            'value' => $address,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'email',
                            'name' => trans('Settings::settings.email'),
                            'value' => $email,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'phone',
                            'name' => trans('Settings::settings.phone'),
                            'value' => $phone,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'telephone',
                            'name' => trans('Settings::settings.telephone'),
                            'value' => $telephone,
                            'placeholder' => ''
                        ])
                        @include('Core::fields.input_text', [
                            'field_name' => 'zipcode',
                            'name' => trans('Settings::settings.zipcode'),
                            'value' => $zipcode,
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