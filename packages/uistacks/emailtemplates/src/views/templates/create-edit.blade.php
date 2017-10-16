@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/emailtemplates', 'name' => trans('Emailtemplates::emailtemplate.emailtemplates')];
    $action = action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
    $pageNameMode = trans('Core::operations.edit');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Emailtemplates::emailtemplate.emailtemplate')];
    $action = action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@update', $item->id);
    $method = 'PATCH';
    $backFieldLabel = trans('admin.back_after_update');
    $submitButton = trans('admin.update');
    }else{
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Emailtemplates::emailtemplate.emailtemplate')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{trans('Emailtemplates::emailtemplate.emailtemplates')}}
@endsection
@section('content')

    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        {{trans('Emailtemplates::emailtemplate.emailtemplates')}}
                    </h3>
                </div>
                <div class="panel-body">
                    {{--<form class="form-horizontal" name="frm_emailtemplate_update" id="frm_emailtemplate_update" role="form"  method="post" >--}}
                    <form action="{{ $action }}" method="POST" role="form" >
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {!! csrf_field() !!}
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-9">
                                        @include('Core::groups.languages', [
                                            'fields' => [
                                                0 => [
                                                    'type' => 'input_text',
                                                    'properties' => [
                                                        'field_name' => 'subject',
                                                        'name' => trans('Core::operations.name'),
                                                        'placeholder' => ''
                                                    ]
                                                ],
                                                1 => [
                                                    'type' => 'textarea',
                                                    'properties' => [
                                                        'field_name' => 'html_content',
                                                        'name' => trans('Pages::pages.description'),
                                                        'placeholder' => ''
                                                    ]
                                                ]
                                            ]
                                        ])
                                    </div>
                                    <div class="col-md-3 sidbare">
                                        <!-- Language field -->
                                    @include('Core::fields.languages')
                                    <!-- End Language field -->
                                        @include('Core::fields.checkbox', [
                                            'field_name' => 'active',
                                            'name' => trans('admin.active'),
                                            'placeholder' => ''
                                        ])
                                        <div class="checkbox">
                                            <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{$backFieldLabel}}</label>
                                        </div>

                                        <button type="submit" class="btn btn-block btn-primary">{{ $submitButton }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('html_content_en');
        CKEDITOR.replace('html_content_ar');

        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
@endsection