<style type="text/css">
    .profile-userpic img {
        float: none;
        margin: 0 auto;
        width: 50%;
        height: 50%;
        -webkit-border-radius: 50% !important;
        -moz-border-radius: 50% !important;
        border-radius: 50% !important;
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<nav class="cb-left-nav">
    <div class="title">
    {{--<span></span>--}}
    {{--SITE SETTINGS--}}
    <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            @if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail']))
                <img src="{{url('/')}}/{{ $item->media->main_image->styles['thumbnail'] }}" >
            @else
                <img src="{{ url('/') }}/public/website_assets/img/user.png" class="img-responsive" alt="">
            @endif
        </div>
        <!-- END SIDEBAR USERPIC -->
    </div>
    <ul class="settings-list">
        <li class="settings-item active">
            <a href="/sites/edit"><span class="first">Site Info & Billing Rules</span></a>
        </li>
        <li class="settings-item inactive">
            <a href="/site_locales/edit"><span class="">Languages</span>
            </a>
        </li>
        <li class="settings-item inactive">
            <a href="/currency_config"><span class="">Currencies</span>
            </a>
        </li>
        <li class="settings-item inactive">
            <a href="/payment_gateways"><span class="">Payment Gateways</span>
            </a>
        </li>
        <li class="settings-item inactive">
            <a href="/reports/edit_settings"><span class="">Report Settings</span>
            </a>
        </li>
    </ul>
</nav>