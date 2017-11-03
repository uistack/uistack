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
    <style type="text/css">
        .view-user-img-blk img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            text-align: center;
        }
        .view-user-img-blk .media-item {
            left: 270px;
            padding: 17px;
            position: relative;
        }
    </style>
@endsection
@section('content')
    <div class='wrapper'>
        @include('website.regions.dash-header')
        <link rel="stylesheet" href="{{asset('media-dev.css')}}" />
        <!-- Include Media model -->
        @include('Media::modals.modal')
        <link rel="stylesheet" href="{{ asset('website_assets/css/autocomplete/chosen.css') }}">
        <div id="cb-main-content">
            <div class="cb-container">
                <div id="cb-settings-nav">
                    @include('website.regions.leftbar')
                </div>
                <div class="cb-detail-container">
                    <div  class="cb-form-container" >
                        <form id="frm_update_profile" method="post" action="{{ action('WebsiteController@updateProfile') }}" autocomplete="on">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                            <h2 class="cb-sub-title-text" >Profile Info</h2>
                            <div class="row">
                                {{--<div class="col-md-3 col-lg-3 " align="center">--}}
                                {{--<img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">--}}
                                {{--</div>--}}
                                <div class="view-user-img-blk">
                                    <a data-toggle="modal" data-target="#inno_media_modal" href="javascript:void(0)" media-data-button-name="{{ trans('Core::operations.select') }} {{ trans('Stores::stores.store_main_img') }}" media-data-field-name="main_image_id" media-data-required>
                                        <div class="media-item">
                                            @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                                                <img src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" >
                                                <input type="hidden" name="main_image_id" value="{{$item->media->main_image->id}}">
                                            @else
                                                <img src="{{ url('/') }}/public/website_assets/img/user.png" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <div class=" col-md-9 col-lg-9 ">
                                    <table class="table table-user-information">
                                        <tbody>
                                        <tr>
                                            <td>{{ trans('Core::operations.name') }}:</td>
                                            <td> <input type="text" class="cn-form__control" name="name" placeholder="Name" value="{{ $item->name }}"> </td>
                                        </tr>
                                        <tr>
                                            <td>Username:</td>
                                            <td>
                                                <input type="text" disabled class="cn-form__control" name="username" value="{{ $item->username }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('Core::operations.email') }}:</td>
                                            <td>
                                                <input type="text" disabled class="cn-form__control" name="email" value="{{ $item->email }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ trans('Core::operations.mobile') }}</td>
                                            <td>
                                                <input type="text" class="cn-form__control" id="user_phone" name="phone" placeholder="{{ trans('Core::operations.mobile') }}" value="{{ $item->phone }}">
                                            </td>
                                        </tr>
                                        <input type="hidden" name="iso2" id="phone_country_code" value="{{ isset($item) ? $item->iso2 : "" }}"/>
                                        <tr>
                                            <td>{{ ucfirst(trans('Countries::countries.country')) }}</td>
                                            <td>
                                                <?php
                                                if(\Request::segment(1) == 'en'){
                                                    $otherLang = "ar";
                                                }else{
                                                    $otherLang = "en";
                                                }
                                                ?>
                                                <select id="country" name="country" class="cn-form__control">
                                                    <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.country'))}} -</option>
                                                    @if(isset($countries) && $countries->count())
                                                        @foreach($countries as $country)
                                                            @if(isset($country->id))
                                                                @php
                                                                    $otherCountry = \UiStacks\Countries\Models\CountryTrans::where(array('country_id'=>$country->id,'lang'=>$otherLang))->first();
                                                                @endphp
                                                            @endif
                                                            @if(isset($item->country_id))
                                                                <option value="{{ $country->id }}" @if($country->id == old('country',$item->country_id)) selected @endif>{{ ucwords(strtolower($country->trans->name))." ( ".$otherCountry->name ." ) ". "+".$country->trans->phone_code }}</option>
                                                            @else
                                                                <option value="{{ $country->id }}" @if($country->id == old('country')) selected @endif>{{ ucwords(strtolower($country->trans->name))." ( ".$otherCountry->name ." ) ". "+".$country->trans->phone_code }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ ucfirst(trans('Countries::countries.area')) }}</td>
                                            <td>
                                                <select id="area" name="area" class="cn-form__control">
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
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    {{--<a href="#" class="btn btn-primary">My Sales Performance</a>--}}
                                    {{--<a href="#" class="btn btn-primary">Team Sales Performance</a>--}}
                                </div>
                            </div>
                            <div  class="cb-form-button cb-fix-footer cn-js--disable" >
                                <button type="submit" class="" >{{ trans('admin.update') }}</button>
                            </div>
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
    
    <script src="{{ asset('website_assets/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('website_assets/js/customize/user.js') }}" type="text/javascript"></script>
    <!--Language -->
    @include('Core::language.scripts.scripts')
    <!--Media -->
    @include('Media::scripts.scripts')
    <!--end media -->
    <script src="{{asset('media-dev.js')}}"></script>
    <script src="{{ asset('website_assets/js/autocomplete/chosen.jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#country").chosen({
                search_contains: true
            });
            $("#area").chosen({
                search_contains: true
            });
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
                $("#area").trigger("chosen:updated");
                $("#area").chosen({
                    search_contains: true
                });
            });
        }
    </script>
    <link rel="stylesheet" href="{{ asset('website_assets/intl-telephone/css/intlTelInput.css') }}">
    <script src="{{ asset('website_assets/intl-telephone/js/intlTelInput.js') }}" type="text/javascript"></script>
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
        $("#user_phone").intlTelInput({
//        preferredCountries: ['in','ae', 'us'],
            preferredCountries: ['in','ae', 'us'],
            autoPlaceholder: true,
            onlyCountries: {!! $isoCodes !!},
            initialCountry: selectedFlag,
            utilsScript: '{{ asset('website_assets/intl-telephone/js/utils.js') }}'
        });
        $("#user_phone").on("countrychange", function (e, countryData) {
            $("#phone_country_code").val(countryData.iso2);
        });
    </script>
@endsection