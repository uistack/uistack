<section class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <h4 class="text-headline text-light">Corporate</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ action('CmsController@showPage','about-us') }}">About the company</a></li>
                    {{--<li><a href="#">Company offices</a></li>--}}
                    {{--<li><a href="#">Partners</a></li>--}}
                    <li><a href="{{ action('CmsController@showPage','terms') }}">Terms of use</a></li>
                    <li><a href="{{ action('CmsController@showPage','privacy') }}">Privacy</a></li>
                    <li><a href="{{ action("WebsiteController@createContact")}}">Contact us</a></li>
                    <li><a href="{{ action('BlogController@index') }}">Blog</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <h4 class="text-headline text-light">Explore</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ action('LearnController@learn') }}">Courses</a></li>
                    {{--<li><a href="{{ action('LearnController@learn') }}">Tutors</a></li>--}}
                    <li><a href="{{ action('QuizController@quiz') }}">Quiz</a></li>
                    {{--<li><a href="">Become Tutor</a></li>--}}
                    <li><a href="{{ action('WebsiteController@register') }}">Sign Up</a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <h4 class="text-headline text-light">Newsletter</h4>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter email here...">
                        <span class="input-group-btn">
								<button class="btn btn-grey-800" type="button">Subscribe</button>
							  </span>
                    </div>
                </div>
                <br/>
                <p>
                    <a href="#" class="btn btn-indigo-500 btn-circle"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn btn-pink-500 btn-circle"><i class="fa fa-dribbble"></i></a>
                    <a href="#" class="btn btn-blue-500 btn-circle"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="btn btn-danger btn-circle"><i class="fa fa-google-plus"></i></a>
                </p>
                <p class="text-subhead">
                    &copy; {{ date("Y") }} {{ \UiStacks\Settings\Models\Setting::find(1)->value }}.
                </p>
            </div>
        </div>
    </div>
    </div>
</section>