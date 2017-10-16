@php
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/stores', 'name' => trans('Stores::stores.stores')];
    $action = action('\UiStacks\Stores\Controllers\StoresController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Stores::stores.store')];
        $action = action('\UiStacks\Stores\Controllers\StoresController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Stores::stores.store')];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{ trans('Stores::stores.stores') }}: {{ $pageNameMode }} {{ trans('Stores::stores.store') }}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css')}}" />
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/jquery-ui/jquery-ui-1.8.16.custom.css') }}" />
    <style type="text/css">
        #gmaps-canvas {
            height: 400px;

            border: 1px solid #999;
            -moz-box-shadow:    0px 0px 5px #ccc;
            -webkit-box-shadow: 0px 0px 5px #ccc;
            box-shadow:         0px 0px 5px #ccc;
        }

        #gmaps-error {
            color: #cc0000;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} {{ trans('Stores::stores.store') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ $action }}" method="POST" role="form" >
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
                                            'name' => trans('Core::operations.name'),
                                            'placeholder' => ''
                                        ]
                                    ]
                                ]
                            ])

                            <div class="form-group clearfix">
                                <label for="country">{{ucfirst(trans('Activities::activities.activity'))}}</label>
                                <select id="activity_id" name="activity_id" class="form-control">
                                    <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Activities::activities.activity'))}} -</option>
                                    @if(isset($activities) && $activities->count())
                                        @foreach($activities as $activity)
                                            @if(isset($item->activity_id))
                                                <option value="{{ $activity->id }}" @if($activity->id == old('activity_id',$item->activity_id)) selected @endif>{{ $activity->trans->name }}</option>
                                            @else
                                                <option value="{{ $activity->id }}" @if($activity->id == old('activity_id')) selected @endif>{{ $activity->trans->name }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group clearfix">
                                <label for="country">{{ucfirst(trans('Countries::countries.country'))}}</label>
                                <select id="country" name="country" class="form-control">
                                    <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.country'))}} -</option>
                                    @if(isset($countries) && $countries->count())
                                        @foreach($countries as $country)
                                            @if(isset($item->trans->country))
                                                <option value="{{ $country->id }}" @if($country->id == old('country',$item->trans->country)) selected @endif>{{ ucwords(strtolower($country->trans->name)) }}</option>
                                            @else
                                                <option value="{{ $country->id }}" @if($country->id == old('country')) selected @endif>{{ ucwords(strtolower($country->trans->name)) }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group clearfix">
                                <label for="area" > {{ucfirst(trans('Countries::countries.area'))}}</label>
                                <select id="area" name="area" class="form-control">
                                    <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.area'))}} -</option>
                                    @if(isset($areas) && $areas->count())
                                        @foreach($areas as $ar)
                                            @if(isset($item->trans->area))
                                                <option value="{{ $ar->id }}" @if($ar->id == old('area',$item->trans->area)) selected @endif>{{ $ar->trans->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">- {{ucfirst(trans('Countries::countries.area'))}} -</option>
                                    @endif
                                </select>
                            </div>

                            @include('Core::fields.input_text', [
                                'field_name' => 'location',
                                'name' => trans('Stores::stores.location'),
                                'placeholder' => trans('Stores::stores.location'),
                                'value' => isset($item) ? old('location',$item->trans->location) : ""
                            ])
                            <input type="hidden" name="store_lat" id="store_lat" value="{!! isset($item) ? $item->trans->store_lat : "" !!}"/>
                            <input type="hidden" name="store_lng" id="store_lng" value="{!! isset($item) ? $item->trans->store_lng : "" !!}"/>
                            <hr/>
                            <div id='gmaps-canvas'></div>
                            <hr/>

                            <div class="form-group cust-img-thumb {{ $errors->has('main_image_id') ? 'has-error': '' }}" >
                                <label style="display: block;">{{ trans('Stores::stores.store_main_img') }}</label>
                                <a data-toggle="modal" data-target="#inno_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} {{ trans('Stores::stores.store_main_img') }}" media-data-field-name="main_image_id" media-data-required>
                                    <div class="media-item">
                                        @if(isset($item->trans->media) && isset($item->trans->media->main_image) && isset($item->trans->media->main_image->styles['thumbnail']))
                                            <img src="{{url('/')}}/{{ $item->trans->media->main_image->styles['thumbnail'] }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                            <input type="hidden" name="main_image_id" value="{{$item->trans->media->main_image->id}}">
                                        @else
                                            <img src="{{ asset('public/images/select_main_img.png') }}" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                        @endif
                                    </div>
                                </a>
                            </div>

                            <!-- End Media main image -->

                            <div class="form-group">
                                <div class="radio">
                                    <label><input type="radio" name="is_instagram" id="is_instagram" value="1" {!! isset($item) && $item->trans->is_instagram=="1" ? "checked='checked'" : "" !!}>{{trans('Stores::stores.instagram_facebook_media')}}</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="is_instagram" id="is_other" value="0" {!! isset($item) && $item->trans->is_instagram=="0" ? "checked='checked'" : "" !!}>{{trans('Stores::stores.additional_media')}}</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="{{trans('Stores::stores.images')}}">{{trans('Stores::stores.images')}}</label>
                                @include('Media::fields.gallery-field')
                            </div>

                            {{--{{dd($item->trans->media->gallery)}}--}}
                            {{--@include('Core::fields.checkbox', [--}}
                            {{--'field_name' => 'is_featured',--}}
                            {{--'name' => trans('Stores::stores.is_featured'),--}}
                            {{--'placeholder' => '',--}}
                            {{--'value' => isset($trans['en']['is_featured']) ? $trans['en']['is_featured'] : ""--}}
                            {{--])--}}

                            @include('Core::fields.input_text', [
                                'field_name' => 'instagram_media',
                                'name' => trans('Stores::stores.instagram'),
                                'placeholder' => trans('Stores::stores.instagram'),
                                'value' => isset($item) ? old('instagram_media',$item->trans->instagram_media) : ""
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'facebook_media',
                                'name' => trans('Stores::stores.facebook'),
                                'placeholder' => trans('Stores::stores.facebook'),
                                'value' => isset($item) ? old('facebook_media',$item->trans->facebook_media) : ""
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'youtube_media',
                                'name' => trans('Stores::stores.youtube'),
                                'placeholder' => trans('Stores::stores.youtube'),
                                'value' => isset($item) ? old('youtube_media',$item->trans->youtube_media) : ""
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'twitter_media',
                                'name' => trans('Stores::stores.twitter'),
                                'placeholder' => trans('Stores::stores.twitter'),
                                'value' => isset($item) ? old('twitter_media',$item->trans->twitter_media) : ""
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'googleplus_media',
                                'name' => trans('Stores::stores.googleplus'),
                                'placeholder' => trans('Stores::stores.googleplus'),
                                'value' => isset($item) ? old('googleplus_media',$item->trans->googleplus_media) : ""
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'snapchat_media',
                                'name' => trans('Stores::stores.snapchat'),
                                'placeholder' => trans('Stores::stores.snapchat'),
                                'value' => isset($item) ? old('snapchat_media',$item->trans->snapchat_media) : ""
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'website_url',
                                'name' => trans('Stores::stores.website'),
                                'placeholder' => trans('Stores::stores.website'),
                                'value' => isset($item) ? old('website_url',$item->trans->website_url) : ""
                            ])
                            @include('Core::fields.input_text', [
                                'field_name' => 'email',
                                'name' => trans('Stores::stores.email'),
                                'placeholder' => trans('Stores::stores.email'),
                                'value' => isset($item) ? old('email',$item->trans->email) : ""
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
    @include('Media::scripts.scripts')
    <!--end media -->
    <script src="{{ asset('public/media-dev.js')}}"></script>
    <!-- google maps -->
    {{--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>--}}
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD0gUQegenKzw8UN5_wPpdYjItj_RTNpfE&language={{Lang::getLocale()}}"></script>
    <!-- jquery UI -->
    {{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>--}}
    <!-- our javascript -->
    <script src="{{ asset('public/website_assets/js/customize/gmaps.js') }}" type="text/javascript"></script>
    <!--end jquery-dependency-fields -->
    <script type="text/javascript">
        $(document).ready(function () {
            //add marker for edit page
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
            // Load country areas
            $('#country').off().on("change", function() {
                loadCountryAreas(this.value);
            });
            var oldcountry = "{{ old('country') }}";
            if (oldcountry != '') {
                loadCountryAreas(oldcountry);
            }
        });
        function loadCountryAreas(countryId) {
            $("#area option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/" + countryId, function(data) {
                $("#area").append($("<option></option>").attr("value", "").text("-- {{trans('Core::operations.select'). " ". ucfirst(trans('Countries::countries.area'))}} --"));
                for (var i = 0; i < data.areas.length; i++) {
                    $("#area").append($("<option></option>").attr("value", data.areas[i].id).text(data.areas[i].trans.name));
                    // Check if old data equal area
                    var oldArea = "{{ old('area') }}";
                    if (oldArea != '') {
                        $('#area').val(oldArea);
                    }
                }
            });
        }
    </script>
    <script type="text/javascript">
        function deleteMyImages(id)
        {
            //            alert('hi');
            var galleryId = "#deleteImage_" + id;
            var buttonId = "#deleteImageB_" + id;
            if (confirm('{{ trans('Core::operations.delete_confirm') }}'))
            {
                $.ajax({
                    url: '{{ action('\UiStacks\Stores\Controllers\StoresController@deleteStoreGalleryImages') }}', //The url where the server req would we made.
                    type: "POST", //The type which you want to use: GET/POST
                    data: {
                        id: id,
                    }, //The variable{"label":"' . $arr_cities[$i]['city_name'] . '", "value":"' . $arr_cities[$i]['city_name'] . '","id":"' . $arr_cities[$i]['city_id'] . '"},'s which are going. //Return data type (what we expect).
                    //This is the function which will be called if ajax call is successful.
                    success: function(data) {
                        //data is the html of the page where the request is made.
                        if (data == 1)
                        {
                            $(galleryId).hide();
                            $(buttonId).hide();
                        }
                    }
                });
            }
        }
    </script>
@endsection