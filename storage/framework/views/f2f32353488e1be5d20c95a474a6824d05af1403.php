<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/website_assets/css/tp_swiftype.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/website_assets/css/select2-alt.css')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/website_assets/css/home.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    
    <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section class="hero-sec">
        <div class="container text-center">
            <article>
                <h1>The smartest way to <br class="hidden-xs">Become an UI Developer</h1>
                <p class="p">Give yourself an excellent with our scalable/inspiring online courses and join a global community of web learners</p>
                <div class="mar-t-sm mar-b-xs hidden-xs hidden-sm">
                    <a href="trial-signup.html" class="btn btn-sec btn-primary btn-primary-sec btn-md btn-suffix" onclick="ga('send', 'event', 'website', 'signup-intent', 'button-signup');">
                        <img src="<?php echo e(url("/")); ?>/public/website_assets/img/ui-stacks.png" alt="UiStacks Logo Mark" style="width: 30px; margin-top: -7px; margin-right: 10px;"> Sign up for free
                    </a>
                </div>
            

            <!--Start Mobile-view Demo request -->
                <div class="mar-t-sm mar-b-xs visible-xs visible-sm">
                    <a href="trial-signup.html" class="btn btn-sec btn-primary btn-primary-sec btn-md btn-suffix" onclick="ga('send', 'event', 'website', 'signup-intent', 'button-signup');">
                        <img src="<?php echo e(url("/")); ?>/public/website_assets/img/ui-stacks.png" alt="UiStacks Logo Mark" style="width: 30px; margin-top: -7px; margin-right: 10px;"> Sign up for free
                    </a>
                </div>
            
            <!--Start Mobile-view Demo request -->
            </article>
        </div>
    </section>
    <section class="support-block">

        
        <div class="text-center">
            <div class="block-title">
                Resourses Lists
            </div>
        </div>
        <section class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="search-result-block">
                        <div class="search-result-loading" style = "display:none"><span>Loading search results...</span></div>
                        <div id="no-result" class="search-result-none block-space text-center" style="display:none">
                            <div class="h1 ProximaNova-Bold">Oops!</div>
                            <p class="text-18">We couldn't find the content you were looking for.</p>
                            <div class="text-18">Get in touch with us at <a href="mailto:support@uistacks.com">support@uistacks.com</a> for any queries</div>
                            <div class="block-top-space-sm">- Or -</div>
                            <div class="block-space-sm">
                                <a href="index.html" class="btn btn-default"><span class="fa fa-long-arrow-left"></span> Go back to help and support</a>
                            </div>
                        </div>
                        <div id="search-result-heading" class="search-result-heading" style="display:none;">
                            <!--Showing <span></span> results for <strong id="swift-searched-for"></strong>-->
                        </div>
                        <div id="swift-result-container"></div>
                    </div>
                </div>
            </div>

            <!--hide this block after search result-->
            <div id="general-topics">
                <div class="support-links-list">
                    <div class="support-link">
                        <a href="javascript:void(0);" target="_blank"><p><img src="<?php echo e(url("/")); ?>/public/website_assets/img/servicers/php.png" alt="PHP" width="48"></p>PHP Tutorials</a>
                    </div>
                     <div class="support-link">
                        <a href="javascript:void(0);" target="_blank"><p><img src="<?php echo e(url("/")); ?>/public/website_assets/img/servicers/node.png" alt="Node JS" width="48"></p>NodeJS Tutorials</a>
                    </div>
                     <div class="support-link">
                        <a href="javascript:void(0);" target="_blank"><p><img src="<?php echo e(url("/")); ?>/public/website_assets/img/servicers/ruby.png" alt="Ruby" width="48"></p>Ruby on Rails Tutorials</a>
                    </div>
                     <div class="support-link">
                        <a href="javascript:void(0);" target="_blank"><p><img src="<?php echo e(url("/")); ?>/public/website_assets/img/servicers/angularjs.png" alt="AngularJS" width="48"></p>AngularJS Tutorials</a>
                    </div>
                    <div class="support-link">
                        <a href="javascript:void(0);" target="_blank"><p><img src="<?php echo e(url("/")); ?>/public/website_assets/img/servicers/mongodb.png" alt="MongoDB" width="48"></p>MongoDB Tutorials</a>
                    </div>
                    
                        
                    
                     
                        
                    
                     
                        
                    
                     
                        
                    
                    
                        
                    
                </div>

                
                    
                        
                    
                
                
                    
                        
                            
                                
                                
                            
                            
                                
                                    
                                    
                                    
                                    
                                
                            
                        
                    
                    
                        
                            
                                
                                
                            
                            
                                
                                    
                                    
                                    
                                    
                                    
                                
                            
                        
                    
                    
                        
                            
                                
                                
                            
                            
                                
                                    
                                    
                                    
                                    
                                    
                                
                            
                        
                    
                

            </div>

            <div class="block-space-sm"></div>
        </section>
    </section>

    <div class="text-center">
        <div class="block-title">
            Our Services
        </div>
    </div>
    <section class="tpmain-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="<?php echo e(url("/")); ?>/public/website_assets/img/support.svg" alt="Support">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">IT Support & Services</h4>
                            <p class="tpmain-media__text">Eliminate Downtime & Maximize Benefits of Critical Applications.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            
                            <i class="fa fa-desktop fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Application Development and Maintenance</h4>
                            <p class="tpmain-media__text">We can handle everything about your website.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <i class="fa fa-lightbulb-o fa-2x" aria-hidden="true"></i>
                            
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Strategy & Consulting</h4>
                            <p class="tpmain-media__text">Different teams use Chargebee to accomplish different objectives. Onboard different roles, assign permissions, and collaborate better.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="<?php echo e(url("/")); ?>/public/website_assets/img/two-factor.svg" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">System Monitoring</h4>
                            <p class="tpmain-media__text">Enforce an additional layer of security with two-factor logins, for all your users. Because passwords aren’t enough.</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="<?php echo e(url("/")); ?>/public/website_assets/img/infrastructure-support.svg" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Infrastructure Support</h4>
                            <p class="tpmain-media__text">When special business needs arise, we ensure that our infrastructure responds, and is rendered, to fit your requirements.</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="media tpmain-media">
                        <div class="media-left tpmain-media__figure">
                            <img src="<?php echo e(url("/")); ?>/public/website_assets/img/migration.svg" alt="">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading tpmain-media__heading">Complete Migration Assistance</h4>
                            <p class="tpmain-media__text">Migrating your customer data (subscriptions and other details) from existing systems is simple, and in safe hands that have tended to hundreds of migrations.</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
    <?php echo $__env->make('website.regions.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('public/website_assets/js/tp_swiftype.js')); ?>"></script>
    <script src="<?php echo e(asset('public/website_assets/js/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>