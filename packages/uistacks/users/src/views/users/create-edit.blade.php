@php
    if(Request::is('*/admin/users/supervisors*')){
        $pageTitle = trans('Users::users.supervisors');
        $itemTitle = trans('Users::users.supervisor');
        $role = 'supervisors';
    }elseif(Request::is('*/admin/users/members*')){
        $pageTitle = trans('Users::users.members');
        $itemTitle = trans('Users::users.member');
        $role = 'members';
    }

    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/users/'.$role, 'name' => $pageTitle];
    $action = action('\UiStacks\Users\Controllers\UsersController@store', $role);
    $method = '';
    
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.$itemTitle];
        $action = action('\UiStacks\Users\Controllers\UsersController@update', [$role, $item->id]);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.$itemTitle];
    }
@endphp

@extends('admin.master')
@section('page_title')
    {{ $pageTitle }}: {{ $pageNameMode }} {{ $itemTitle }}
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/media-dev.css')}}" />
@endsection
@section('content')
    <!-- Include Media model -->
    @include('Media::modals.modal')
    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> {{ $pageNameMode }} {{ $itemTitle }}</h3>
                </div>
                <div class="panel-body">
                    <form id="frm_create_edit" action="{{ $action }}" method="POST" role="form">
                        @if($method === 'PATCH')
                            <input type="hidden" name="_method" value="PATCH">
                        @endif
                        {{ csrf_field() }}
                        <div class="col-md-9">

                            @include('Core::fields.input_text', [
                                'field_name' => 'name',
                                'name' => trans('Core::operations.name'),
                                'placeholder' => ''
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'email',
                                'name' => trans('Core::operations.email'),
                                'placeholder' => ''
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'phone',
                                'name' => trans('Core::operations.mobile'),
                                'placeholder' => ""
                            ])
                            @if(\Request::segment(4) == "supervisors")
                                <div class="form-group {{ $errors->has('role') ? 'has-error': '' }}">
                                    <label for="role">{{ trans("Roles::roles.role") }}</label>
                                    <select id="role" name="role" class="form-control">
                                        <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Roles::roles.role'))}} -</option>
                                        @if(count($roles))
                                            @foreach($roles as $role)
                                                <option @if(isset($item) && $item->userRole->role_id == $role->id) selected @endif value="{{ $role->id }}" >{{ $role->trans->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="role" value="5" />
                            @endif
                            @include('Core::fields.input_text', [
                                'field_name' => 'password',
                                'name' => trans('Core::operations.password'),
                                'placeholder' => '',
                                'type' => 'password'
                            ])

                            @include('Core::fields.input_text', [
                                'field_name' => 'password_confirmation',
                                'name' => trans('Core::operations.password_confirmation'),
                                'placeholder' => '',
                                'type' => 'password'
                            ])
                        </div>
                        <input type="hidden" name="iso2" id="phone_country_code" value="{{ old('iso2',isset($item) ? $item->iso2 : "")}}"/>
                        <div class="col-md-3 sidbare">
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

                            <hr/>

                            @php
                                $options = [];
                                $options[] = ['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'];
                                if(isset($countries) && $countries->count()){
                                    foreach ($countries as $country) {
                                        $countryName = '';
                                        if($country->trans){
                                            $countryName = ucwords(strtolower($country->trans->name));
                                        }
                                        $options[] = ['value' => $country->id, 'name' => $countryName];
                                    }
                                }
                               // dd($options);
                            @endphp

                            @include('Core::fields.select', [
                                'field_name' => 'country',
                                'name' => trans('Users::users.country'),
                                'options' => $options
                            ])
                            <div class="form-group clearfix">
                                <label for="area" > {{ucfirst(trans('Countries::countries.area'))}}</label>
                                <select id="area" name="area" class="form-control">
                                    <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.area'))}} -</option>
                                    @if(isset($areas) && $areas->count())
                                        @foreach($areas as $ar)
                                            @if(isset($item->area_id))
                                                <option value="{{ $ar->id }}" @if($ar->id == old('area',$item->area_id)) selected @endif>{{ $ar->trans->name }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                        <option value="">- {{ucfirst(trans('Countries::countries.area'))}} -</option>
                                    @endif
                                </select>
                            </div>

                            {{--@include('Core::fields.checkbox', [--}}
                            {{--'field_name' => 'phone_show',--}}
                            {{--'name' => trans('Users::users.phone_show'),--}}
                            {{--'placeholder' => ''--}}
                            {{--])--}}

                            {{--@include('Core::fields.checkbox', [--}}
                            {{--'field_name' => 'email_show',--}}
                            {{--'name' => trans('Users::users.email_show'),--}}
                            {{--'placeholder' => ''--}}
                            {{--])--}}

                            <hr/>

                            @include('Core::fields.checkbox', [
                                'field_name' => 'active',
                                'name' => trans('admin.active'),
                                'placeholder' => ''
                            ])

                            @if(Request::is('*/edit'))
                                <input type="hidden" name="old_user_email" value="{{ $item->email }}">
                                <input type="hidden" name="old_user_phone" value="{{ $item->phone }}">
                                <input type="hidden" name="old_user_name" value="{{ $item->name }}">
                            @endif
                            <div class="checkbox">
                                <label><input name="back" type="checkbox" value="1" class="minimal-blue" @if(old('back') == 1) checked @endif> {{$backFieldLabel}}</label>
                            </div>

                            <button type="submit" id="btn_create" class="btn btn-block btn-primary">{{ $submitButton }}</button>
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

    <script src="{{ asset('public/admin_assets/js/pages/add_user.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // Load country areas
        $('#country').off().on("change", function () {
            loadCountryAreas(this.value);
        });

        var oldcountry = "{{ old('country') }}";
        if(oldcountry != ''){
            loadCountryAreas(oldcountry);
        }

        function loadCountryAreas(countryId) {
            $("#area option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/"+countryId, function( data ) {

//                alert(data);

                $("#area").append($("<option></option>").attr("value", "").text("- اختر -"));
                for (var i = 0; i < data.areas.length; i++) {
                    $("#area").append($("<option></option>").attr("value",data.areas[i].id).text(data.areas[i].trans.name));
                    // Check if old data equal area
                    var oldArea = "{{ old('area') }}";
                    if(oldArea != ''){
                        $('#area').val(oldArea);
                    }
                }
            });
        }
    </script>
    <link rel="stylesheet" href="{{ asset('public/website_assets/intl-telephone/css/intlTelInput.css') }}">
    <script src="{{ asset('public/website_assets/intl-telephone/js/intlTelInput.js') }}" type="text/javascript"></script>
    <?php
    $countries = \UiStacks\Countries\Models\Country::where(array('active'=> 1))->get();
    $all_iso = [];
    if(count($countries)){
        foreach ($countries as $cntry => $country){
//            echo $country->trans['iso_code'];
            $all_iso[] = strtolower($country->trans['iso_code']);
        }
        $isoCodes = json_encode($all_iso);
    }else{
        $isoCodes = [];
    }

    if(isset($item)){
        $cntry = strtolower($item->iso2);
    }else{
        $cntry = "";
    }
    ?>
    <script>
        var selectedFlag = '{{$cntry}}'
        $("#phone").intlTelInput({
//        preferredCountries: ['in','ae', 'us'],
            preferredCountries: ['in','ae', 'us'],
            autoPlaceholder: true,
            onlyCountries: {!! $isoCodes !!},
            initialCountry: selectedFlag,
            utilsScript: '{{ asset('public/website_assets/intl-telephone/js/utils.js') }}'
        });
        $("#phone").on("countrychange", function (e, countryData) {
//        alert(countryData.iso2);
            $("#phone_country_code").val(countryData.iso2);
        });
    </script>
@endsection