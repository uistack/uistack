<?php $__env->startSection('content'); ?>
    <style>
        .services-bg {
            background-color: #009cde;
            background-image: radial-gradient(circle farthest-side at center bottom, #009cde, #003087 125%);
            color: #fff;
        }
        .service-images {
            border-radius: 50%;
            box-shadow: 0 5px 20px 0 rgba(0, 0, 0, 0.5);
            display: block;
            height: auto;
            margin: 15px auto;
            width: 150px;
            background-color:#6F4C90;
        }
    </style>
    <div class="sb-site-container">
    <?php echo $__env->make('website.home.blocks.top-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.home.blocks.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ms-hero ms-hero-black -->
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-6 text-justify">
                    <h2 class="color-primary right-line">Our Vision & Mission</h2>
                    
                    
                    
                    <p>
                        Our vision is to be a key player in Digital Transformation service, in order to provide more accessibility opportunities for our customers everywhere and every time.
                    </p>
                    <p>
                        Your success is our success is our commitment to our customers. We will be the number one in professional services for our customers’ minds, which provide a way in a profitable and sustainable growth.
                    </p>
                    <p>
                        Our mission for customers by our services as they are our first priority
                    </p>
                    <p>
                        Our mission for employees to be professional while ensuring them work life balance.
                    </p>
                    <p class="text-right">
                        <cite class="lead color primary-color">— From CEO, uistacks.com</cite>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2 class="color-primary right-line">Our Approach</h2>
                    <div class="panel-group ms-collapse" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a class="withripple" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-lightbulb-o"></i> Creativity & Talent </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <p>
                                        Our approach to enhance our management skills and ability to grow our business. We expect software activity to arise and concentrate in places with a broadly creative ecosystem that attracts an innovative, talented, and diverse population.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed withripple" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-desktop"></i> Design & Development </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <p>
                                        Our best approach to design and develop the thing in proper manner to suit the customer business, and fulfill their requirements.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed withripple" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-user"></i> Quality & Support </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <p>
                                        UiStacks Web techonoligy is a division of Web development Network, We are committed to providing quality service. Share Quility experiance with customers, to provide full time support, to grow our relation with customers.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ms-bg-fixed mb-6 mt-4">
            <div class="container text-center">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Home Page -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-4141596849655811"
                     data-ad-slot="5097375401"
                     data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        
        <div class="ms-bg-fixed mb-6 mt-4 services-bg">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-1">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/php.png" alt="PHP">
                            </div>
                            <!--<h4 class="text-center">PHP</h4>-->
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-2">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/mean.png" alt="MEAN">
                            </div>
                            <!--<h4 class="text-center">Frontend UI Development</h4>-->
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-3">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/ror.png" alt="ROR">
                            </div>
                            <!--<h4 class="text-center">Ruby Web Development</h4>-->
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-3">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/ang.png" alt="AngularJS">
                            </div>
                            <!--<h4 class="text-center">Ruby Web Development</h4>-->
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-3">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/sql.png" alt="MySQL">
                            </div>
                            <!--<h4 class="text-center">Ruby Web Development</h4>-->
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-3">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/node.png" alt="NodeJS">
                            </div>
                            <!--<h4 class="text-center">Ruby Web Development</h4>-->
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-3">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/wordpress.png" alt="WordPress">
                            </div>
                            <!--<h4 class="text-center">Ruby Web Development</h4>-->
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-center mt-4">
                            <div class="circle" id="circles-3">
                                <img class="service-images" src="<?php echo e(url('/')); ?>/public/website_assets/img/mongo.png" alt="MongoDB">
                            </div>
                            <!--<h4 class="text-center">Ruby Web Development</h4>-->
                            
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <a href="javascript:void(0)" class="btn btn-raised btn-info wow flipInX animation-delay-8">
                        <i class="fa fa-space-shuttle"></i> I have a project</a>
                    <a href="javascript:void(0)" class="btn btn-raised btn-warning wow flipInX animation-delay-9">
                        <i class="fa fa-info"></i> More Info</a>
                </div>
            </div>
        </div>
        <div class="container mt-4 wow fadeInUp">
            <div class="card-block card-block-big">
                <h3 class="text-center fw-500 mb-4">Testimonials</h3>
                <div class="mw-800 center-block">
                    <div id="carousel-example-generic" class="carousel-cards carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <blockquote class="ms-blockquote">
                                    <p class="lead">If you're passionate about a particular subject, and you have a lot of experience in that area, then you can offer your knowledge to both people who are new? Do you want to turn your challenges into something that will inspire others to overcome their problems.</p>
                                    <footer>
                                        <strong>CEO</strong>,
                                        <cite title="Source Title">UiStacks Inc.</cite>
                                    </footer>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote class="ms-blockquote">
                                    <p class="lead">
                                        Don't limit yourself. Many people limit themselves to what they think they can do. You can go as far as your mind lets you. What you believe, you can achieve.
                                    </p>
                                    <footer>
                                        <strong>CEO</strong>,
                                        <cite title="Source Title">UiStacks Inc.</cite>
                                    </footer>
                                </blockquote>
                            </div>
                            <div class="item">
                                <blockquote class="ms-blockquote">
                                    <p class="lead">If you’re passionate about a particular subject, and you have a lot's of experience in that specific area, then you can offer your knowledge/ideas to other people who are the new to that subject and others who are as experienced as you are.</p>
                                    <footer>
                                        <strong>CEO</strong>,
                                        <cite title="Source Title">UiStacks Inc.</cite>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                        <ol class="carousel-indicators carousel-indicators-primary">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--container -->
        <?php echo $__env->make('website.regions.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('website.regions.leftbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>