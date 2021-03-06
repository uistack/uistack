@php
    $articleNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/articles', 'name' => trans('Articles::articles.articles')];
    $action = action('\UiStacks\Articles\Controllers\ArticlesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $articleNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Articles::articles.article')];
        $action = action('\UiStacks\Articles\Controllers\ArticlesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Articles::articles.article')];
    }
@endphp
@extends('admin.master')
@section('page_title')
    {{ trans('Articles::articles.articles') }}: {{ $articleNameMode }} {{ trans('Articles::articles.article') }}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css')}}" />
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <!-- Include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $articleNameMode }} {{ trans('Articles::articles.article') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ $action }}" method="POST" role="form">
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-9">
                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'name',
                                            'name' => trans('Articles::articles.name'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->name)) ? $item->trans->name : ""
                                        ]
                                    ],
                                    1 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'article_url',
                                            'name' => "Article URL",
                                            'placeholder' => '',
                                            'value' => (isset($item->article_url)) ? $item->article_url : ""
                                        ]
                                    ]
                                ]
                            ])
                            @include('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'textarea',
                                        'properties' => [
                                            'field_name' => 'description',
                                            'name' => trans('Articles::articles.description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->description)) ? $item->trans->description : ""
                                        ]
                                    ]
                                ]
                            ])

                            <!-- Media main image -->
                                <div class="form-group {{ $errors->has('main_image_id') ? 'has-error': '' }}" style="text-align: center;">
                                    <label style="display: block;">{{ trans('Users::users.avatar') }}</label>

                                    <a data-toggle="modal" data-target="#inno_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }}ر{{ trans('Users::users.avatar') }}" media-data-field-name="main_image_id" media-data-required>
                                        <div class="media-item">
                                            @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                                                <img src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                                <input type="hidden" name="main_image_id" value="{{$item->media->main_image->id}}">
                                            @else
                                                <img src="{{ asset('public/images/select_main_img.png') }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <!-- End Media main image -->
                        </div>
                        <div class="col-md-3">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--end Language -->
    <!--Media -->
    <script src="{{ asset('public/media-dev.js')}}"></script>
    <!--end media -->

    {{--added for ckeditor start here--}}
    {{--<script src="{{url('/')}}/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'description_ar' );
        CKEDITOR.replace( 'description_en' );
        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
    {{--added for ckeditor end here--}}
@endsection