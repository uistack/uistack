@extends('website.master')
@section('page_title')
مستخدم جديد
@endsection
@section('content')
<div class="well login-box">
    <form action="{{ action('WebsiteController@postRegister') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <legend>مستخدم جديد</legend>
        @include('website.blocks.message')
        <div class="form-group clearfix">
            <label for="name"> الإسم </label>
            <input id="name" name="name" value="{{ old('name') }}" type="text" class="form-control" />
        </div>

        <div class="form-group">
            <label for="country" class="col-md-2 control-label"> الدولة</label>
            <div class="col-md-10">
                <select id="country" name="country" class="form-control">
                    <option value="">- اختر -</option>
                    @if(isset($countries) && $countries->count())
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" @if($country->id == old('country')) selected @endif>{{ $country->trans->name }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group">
            <label for="area" class="col-md-2 control-label"> المنطقة</label>
            <div class="col-md-10">
                <select id="area" name="area" class="form-control">
                    <option value="">- اختر -</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="email"> البريد الالكترونى</label>
            <input id="email" name="email" value="{{ old('email') }}" type="mail" class="form-control" />
        </div>
        <div class="form-group label-floating">
            <label class="control-label" for="phone">رقم الجوال</label>
            <input class="form-control" id="phone" name="phone" value="{{ old('phone') }}" type="text">
            <p class="help-block">مثال: 9665XXXXXXXX ، 05XXXXXXXX، 5XXXXXXXX  يرجى التأكد من كتابة رقم الهاتف المحمول الصحيح حتى تتلقى رمز التنشيط.</p>
        </div>

        <div class="form-group label-floating" style="margin-top: 50px">
            <label for="password" class="control-label">كلمة المرور </label> 
            <input id="password" name="password" type="password" class="form-control" />
        </div>

        <div class="form-group  label-floating">
            <label for="password_confirmation" class="control-label"> تأكيد كلمة المرور </label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" />
        </div>

        <div class="clearfix"></div>
        <div class="form-group">
            <input type="file" id="avatar" name="avatar">
            <div class="input-group">
                <input type="text" readonly="" class="form-control" placeholder="اضافه صوره شخصية">
                <span class="input-group-btn input-group-sm">
                    <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="fa fa-picture-o" aria-hidden="true"></i>

                    </button>
                </span>
            </div>
        </div>
        <?php
        $cms_header = uistacks\Pages\Models\Page::all();
        ?>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="phone_show" value="1" @if(old('phone_show') == 1) checked @endif> لا مانع من ظهور رقم هاتفي في الاعلان </label>
            <br>
            <label>
                <input type="checkbox" name="email_show" value="1" @if(old('email_show') == 1) checked @endif> لامانع من ظهور البريد الالكتروني في الاعلان </label>
            <br>
            <label>
                <input type="checkbox" name="accept_roles" value="1" @if(old('accept_roles') == 1) checked @endif> لقد قرأت <a href="{{url('/')}}/{{ Lang::getLocale() }}/pages/{{  $cms_header{0}->page_url  }}" target="_blank">الأحكام والشروط</a> وتتعهد بالالتزام بها</label>
            <br>
        </div>
        <div class="form-group text-center">
            {{-- <input class="btn btn-success btn-login-submit" value="تسجيل" data-toggle="modal" data-target="#myModal" /> </div> --}}
            <button type="submit" class="btn btn-success btn-login-submit">تسجيل</button>
            <br>
            </form>
        </div>

        @endsection
        @section('footer')
        <script type="text/javascript">
            // Load country areas
            $('#country').off().on("change", function() {
                loadCountryAreas(this.value);
            });

            var oldcountry = "{{ old('country') }}";
            if (oldcountry != '') {
                loadCountryAreas(oldcountry);
            }

            function loadCountryAreas(countryId) {
                $("#area option").remove();
                $.get("{{url('/')}}/{{ Lang::getLocale() }}/country-areas/" + countryId, function(data) {

    //                alert(data.attr);

                    $("#area").append($("<option></option>").attr("value", "").text("- اختر -"));
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
        @endsection