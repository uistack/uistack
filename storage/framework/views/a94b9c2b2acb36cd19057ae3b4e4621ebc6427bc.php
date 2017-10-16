<?php $__env->startSection('content'); ?>
    <div class="sb-site-container">
    <?php echo $__env->make('website.home.blocks.top-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.home.blocks.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ms-hero ms-hero-black -->
        <div class="container mt-4">
            <section class="mb-4">
                <h2 class="text-center no-mt mb-6 wow fadeInUp">Our Services</h2>
                <div class="row">
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="ms-icon-feature wow flipInX animation-delay-4">
                            <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse">
                    <i class="fa fa-cloud"></i>
                  </span>
                            </div>
                            <div class="ms-icon-feature-content">
                                <h4 class="color-primary">Cloud Computing</h4>
                                <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="ms-icon-feature wow flipInX animation-delay-4">
                            <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse">
                    <i class="fa fa-desktop"></i>
                  </span>
                            </div>
                            <div class="ms-icon-feature-content">
                                <h4 class="color-primary">Web Design and SEO</h4>
                                <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="ms-icon-feature wow flipInX animation-delay-4">
                            <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse">
                    <i class="fa fa-tablet"></i>
                  </span>
                            </div>
                            <div class="ms-icon-feature-content">
                                <h4 class="color-primary">Mobile and Tablet Apps</h4>
                                <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="ms-icon-feature wow flipInX animation-delay-4">
                            <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse">
                    <i class="fa fa-wordpress"></i>
                  </span>
                            </div>
                            <div class="ms-icon-feature-content">
                                <h4 class="color-primary">Wordpress Themes</h4>
                                <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="ms-icon-feature wow flipInX animation-delay-4">
                            <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse">
                    <i class="fa fa-graduation-cap"></i>
                  </span>
                            </div>
                            <div class="ms-icon-feature-content">
                                <h4 class="color-primary">Training and development</h4>
                                <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb-2">
                        <div class="ms-icon-feature wow flipInX animation-delay-4">
                            <div class="ms-icon-feature-icon">
                  <span class="ms-icon ms-icon-lg ms-icon-inverse">
                    <i class="fa fa-send"></i>
                  </span>
                            </div>
                            <div class="ms-icon-feature-content">
                                <h4 class="color-primary">Customer service</h4>
                                <p>Praesentium cumque voluptate harum quae doloribus, atque error debitis, amet velit in similique, necessitatibus odit vero sunt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--container -->
        <div class="wrap wrap-danger mt-6">
            <h2 class="text-center no-m">What our customers say</h2>
            <div id="carousel-example-generic" class="carousel carousel-cards carousel-fade slide" data-ride="carousel" data-interval="7000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-2">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-3">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-4">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-2">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-3">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-4">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-2">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-3">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card animated flipInX animation-delay-4">
                                            <blockquote class="blockquote-avatar withripple">
                                                <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/avatar.png" alt="" class="avatar hidden-xs">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante ultricies nisi vel augue quam semper libero.</p>
                                                <footer>Brian Krzanich, Intel CEO.</footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control btn btn-white btn-raised" href="#carousel-example-generic" role="button" data-slide="prev">
                    <i class="zmdi zmdi-arrow-left"></i>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control btn btn-white btn-raised" href="#carousel-example-generic" role="button" data-slide="next">
                    <i class="zmdi zmdi-arrow-right"></i>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container mt-6">
            <h2 class="text-center color-primary mb-4">Our Latest Works</h2>
            <div class="owl-dots"></div>
            <div class="owl-carousel owl-theme">
                <div class="card animation-delay-6">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port4.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="color-primary">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-primary btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card card-dark-inverse animation-delay-8">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port24.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-info btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card animation-delay-10">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port7.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="color-primary">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-primary btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card animation-delay-6">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port8.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="color-primary">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-primary btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card card-dark-inverse animation-delay-8">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port9.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-info btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card animation-delay-10">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port5.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="color-primary">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-primary btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card animation-delay-6">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port11.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="color-primary">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-primary btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card card-dark-inverse animation-delay-8">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port3.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-info btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
                <div class="card animation-delay-10">
                    <div class="withripple zoom-img">
                        <a href="javascript:void(0);">
                            <img src="<?php echo e(url('/')); ?>/public/website_assets/img/demo/port14.jpg" alt="..." class="img-responsive">
                        </a>
                    </div>
                    <div class="card-block">
                        <h3 class="color-primary">Thumbnail label</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, repellat, vitae porro ex expedita cumque nulla.</p>
                        <p class="text-right">
                            <a href="javascript:void(0);" class="btn btn-primary btn-raised text-right" role="button">
                                <i class="zmdi zmdi-collection-image-o"></i> View More</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('website.regions.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('website.regions.leftbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>