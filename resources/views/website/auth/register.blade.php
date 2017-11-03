@extends('website.master')
@section('page_title')
    Create Account
@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('public/website_assets/css/autocomplete/chosen.css') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="stylesheet" href="{{ asset('website_assets/intl-telephone/css/intlTelInput.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="jumbotron bg-transparent text-center margin-none">
            <h1>Create Your Account</h1>
            {{--<p>Learning includes all the form controls shipped with Bootstrap, as well as custom form components that cover various usage scenarios, all themed for modern websites.</p>--}}
        </div>
        <div class="page-section">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-md-offset-1 col-lg-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" name="frm_registration" id="frm_registration" action="{{ action('WebsiteController@postRegister') }}" method="post" >
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <div class="">
                                            <input required class="form-control" placeholder="{{ trans('Core::operations.name') }}" id="name" name="name" type="text" value="{{ old('name') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <div class="">
                                            <input required class="form-control" placeholder="{{ trans('Core::operations.email') }}" id="email" name="email" type="text" value="{{ old('email') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Username</label>
                                    <div class="col-sm-9">
                                        <div class="">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input id="username" name="username" type="text" class="form-control" placeholder="Username" value="{{ old('username') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <div class="">
                                            <input type="text" class="form-control" id="contact_phone" name="phone" value="{{ old('phone') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="iso2" id="phone_country_code" value=""/>
                                <?php
                                if(\Request::segment(1) == 'en'){
                                    $otherLang = "ar";
                                }else{
                                    $otherLang = "en";
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Country</label>
                                    <div class="col-sm-9">
                                        {{--<select id="reg_country" name="country" class="selectpicker" data-style="btn-white" data-live-search="true" data-size="">--}}
                                        <select id="reg_country" name="country" class="form-control">
                                            <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.country'))}} -</option>
                                            @if(isset($countries) && $countries->count())
                                                @foreach($countries as $country)
                                                    @if(isset($country->id))
                                                        @php
                                                            $otherCountry = \UiStacks\Countries\Models\CountryTrans::where(array('country_id'=>$country->id,'lang'=>$otherLang))->first();
                                                        @endphp
                                                    @endif
                                                    <option value="{{ $country->id }}" @if($country->id == old('country',$country->id)) selected @endif>{{ ucwords(strtolower($country->trans->name))." ( ".$otherCountry->name ." ) ". "+".$country->trans->phone_code }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Area</label>
                                    <div class="col-sm-9">
                                        {{--<select id="reg_country" name="country" class="selectpicker" data-style="btn-white" data-live-search="true" data-size="">--}}
                                        <select id="reg_area" name="area" class="form-control">
                                            <option value="">- {{trans('Core::operations.select').' '.ucfirst(trans('Countries::countries.area'))}} -</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">{{ trans('Core::operations.password') }}</label>
                                    <div class="col-sm-9">
                                        <div class="">
                                            <input type="password" class="form-control" placeholder="{{ trans('Core::operations.password') }}" id="password" name="password" value="{{ old('password') }}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">{{ trans('Core::operations.password_confirmation') }}</label>
                                    <div class="col-sm-9">
                                        <div class="">
                                            <input type="password" class="form-control" placeholder="{{ trans('Core::operations.password_confirmation') }}" id="password_confirmation" name="password_confirmation"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">&nbsp;</label>
                                    <div class="col-sm-9">
                                        <div class="g-recaptcha" data-sitekey="{{ env('NOCAPTCHA_SECRET') }}"></div>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block"><strong>{{ $errors->first('g-recaptcha-response') }}</strong></span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group margin-none">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('public/website_assets/js/jquery.validate.js') }}" type="text/javascript"></script>
    <script async defer src="{{ asset('public/website_assets/js/customize/user.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('public/website_assets/js/autocomplete/chosen.jquery.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#reg_country").chosen({
                search_contains: true
            });
            $("#reg_area").chosen({
                search_contains: true
            });
            // Load country areas
            $('#reg_country').off().on("change", function() {
                loadRegCountryAreas(this.value);
            });
        });
        function loadRegCountryAreas(countryId) {
            $("#reg_area option").remove();
            $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/" + countryId, function(data) {
                $("#reg_area").append($("<option></option>").attr("value", "").text("-- {{trans('Core::operations.select'). " ". ucfirst(trans('Countries::countries.area'))}} --"));
                for (var i = 0; i < data.areas.length; i++) {
                    $("#reg_area").append($("<option></option>").attr("value", data.areas[i].id).text(data.areas[i].trans.name));
                    var oldArea = "{{ old('area') }}";
                    if (oldArea != '') {
                        $('#reg_area').val(oldArea);
                    }
                }
                $("#reg_area").trigger("chosen:updated");
                $("#reg_area").chosen({
                    search_contains: true
                });
            });
        }
    </script>
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
    ?>
    <script>
        $("#contact_phone").intlTelInput({
//             allowDropdown: false,
//             autoHideDialCode: false,
//             dropdownContainer: "body",
//             excludeCountries: ["us"],
//             formatOnDisplay: false,
//             geoIpLookup: function(callback) {
//               $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
//                 var countryCode = (resp && resp.country) ? resp.country : "";
//                 callback(countryCode);
//               });
//             },
//             initialCountry: "auto",
//             nationalMode: false,
//             onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
//             placeholderNumberType: "MOBILE",
//             preferredCountries: ['cn', 'jp'],
//             separateDialCode: true,
            preferredCountries: ['ae', 'in', 'us'],
            autoPlaceholder: true,
            onlyCountries: {!! $isoCodes !!},
            utilsScript: '{{ asset('website_assets/intl-telephone/js/utils.js') }}'
        });
    </script>
@stop