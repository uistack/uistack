<div class="parallax cover overlay cover-image-full home">
    <img class="parallax-layer" src="{{url('/')}}/public/website_assets/img/banner-1.jpg" alt="Learning Cover" />
    <div class="parallax-layer overlay overlay-full overlay-bg-white bg-transparent" data-speed="8" data-opacity="true">
        <div class="v-center">
            <div class="page-section overlay-bg-white-strong relative paper-shadow" data-z="1">
                <h1 class="text-display-2 margin-v-0-15 display-inline-block">Become an UI Developer</h1>
                <p class="text-subhead">Give yourself an excellent with our scalable/inspiring online courses and join a global community of web learners.</p>
                {{--<a class="btn btn-green-500 btn-lg paper-shadow" data-hover-z="2" data-animated data-toggle="modal" href="#modal-overlay-signup">Sign Up - Only &dollar;19.00/mo</a>--}}
                <a class="btn btn-green-500 btn-lg paper-shadow" data-hover-z="2" data-animated href="{{ action('WebsiteController@register') }}">Sign Up Here</a>
            </div>
        </div>
    </div>
</div>