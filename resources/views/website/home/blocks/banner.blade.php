<div class="ms-hero ms-hero-img-wall ms-bg-fixed pb-4">
    <div id="carousel-shop" class="ms-carousel-shop carousel carousel-fade slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-shop" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-shop" data-slide-to="1"></li>
            <li data-target="#carousel-shop" data-slide-to="2"></li>
        </ol>
        <div class="container">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="carousel-caption">
                                <h1>Develop your possibilities</h1>
                                <p class="lead">Explore your technical ideas, develop website/software and join the community</p>
                                <ul class="list-unstyled">
                                    <li>Website expertise help you to re-imagine your business ideas</li>
                                    <li>Create your website in most rated latest technologies</li>
                                    <li>We are here to provide you best solutions from our expertise</li>
                                    <li>Develop your website in PHP, ROR or NodeJS.</li>
                                </ul>
                                <a href="{{ action("WebsiteController@createContact")}}" class="btn btn-success btn-raised">Need Help <i class="fa fa-question-circle"></i></a>
                                {{--<a href="javascript:void(0)" class="btn btn-primary btn-raised">Buy Now</a>--}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{url('/')}}/public/website_assets/img/banner/1.png" class="img-responsive" alt="Banner1"> </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6">
                            <div class="carousel-caption">
                                <h1>Systems development life cycle</h1>
                                <p class="lead">Agile method provide a methodology for improving the quality of software and the overall development process.</p>
                                <ul class="list-unstyled">
                                    <li>SDLC adheres to important phases that are essential for a project</li>
                                    <li>Optimizing IT performance to improve your business outcomes</li>
                                    <li>Create, manage & deliver relevant experiences.</li>
                                    {{--<li>Engage the power of SDLC Development.</li>--}}
                                </ul>
                                <a href="{{ action("WebsiteController@createContact")}}" class="btn btn-success btn-raised">Need Help <i class="fa fa-question-circle"></i></a>
                                {{--<a href="javascript:void(0)" class="btn btn-primary btn-raised">Buy Now</a>--}}
                            </div>
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <img src="{{url('/')}}/public/website_assets/img/banner/2.png" class="img-responsive" alt="Banner2"> </div>
                    </div>
                </div>

                <div class="item">
                    <div class="row">
                        <div class="col-md-6 col-md-push-6">
                            <div class="carousel-caption">
                                <h1>Everything is designed</h1>
                                <p class="lead">Perfection is achieved not when there is nothing more to add, but when there is nothing left to take away.</p>
                                <ul class="list-unstyled">
                                    <li>Great design is a multi-layered relationship</li>
                                    <li> between human life and its environment.</li>
                                    <li>Creativity is only as obscure as your reference.</li>
                                    <li>Engage the power of Innovative Ideas.</li>
                                </ul>
                                <a href="{{ action("WebsiteController@createContact")}}" class="btn btn-success btn-raised">Need Help <i class="fa fa-question-circle"></i></a>
                                {{--<a href="javascript:void(0)" class="btn btn-primary btn-raised">Buy Now</a>--}}
                            </div>
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <img src="{{url('/')}}/public/website_assets/img/banner/3.png" class="img-responsive" alt="Banner3"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a href="#carousel-shop" class="btn-circle btn-circle-sm btn-circle-raised btn-circle-primary left carousel-control" role="button" data-slide="prev">
            <i class="zmdi zmdi-chevron-left"></i>
        </a>
        <a href="#carousel-shop" class="btn-circle btn-circle-sm btn-circle-raised btn-circle-primary right carousel-control" role="button" data-slide="next">
            <i class="zmdi zmdi-chevron-right"></i>
        </a>
    </div>
</div>