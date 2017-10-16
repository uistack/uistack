<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title><?php echo e(\UiStacks\Settings\Models\Setting::find(1)->value); ?> | <?php echo $__env->yieldContent('page_title'); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link rel="icon shortcut" href="<?php echo e(asset('public/images/fav.ico')); ?>">
        <!-- global css -->
        <link href="<?php echo e(asset('public/admin_assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo e(asset('public/admin_assets/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('public/admin_assets/css/styles/black.css')); ?>" rel="stylesheet" type="text/css" id="colorscheme" />
        <script>
            var javascript_site_path = "<?php echo e(url('/')); ?>" + "/";
        </script>
        <link rel="stylesheet" href="<?php echo e(asset('public/admin_assets/css/panel.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/admin_assets/css/metisMenu.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/admin_assets/css/jquery-ui.min.css')); ?>" />

        <!-- end of global css -->
        <!--page level css-->
        

        <link href="<?php echo e(asset('public/admin_assets/css/inno-custom.css')); ?>" rel="stylesheet" type="text/css" id="colorscheme" />
        <?php if(Lang::getLocale() == 'ar'): ?>
        <link href="<?php echo e(asset('public/admin_assets/css/custom-rtl.css')); ?>" rel="stylesheet" type="text/css" id="colorscheme" />
        <link href="<?php echo e(asset('public/admin_assets/css/pages/tables-rtl.css')); ?>" rel="stylesheet" />
        <?php endif; ?>
        <script src="<?php echo e(asset('public/website_assets/js/jquery-3.1.1.min.js')); ?>" type="text/javascript"></script>
        <?php echo $__env->yieldContent('header'); ?>
        <!--end of page level css-->
    </head>

    <body class="skin-josh">

        <?php echo $__env->make('admin.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <?php echo $__env->make('admin.regions.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </section>
            </aside>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Main content -->
                <section class="content-header">
                    <h1><?php echo $__env->yieldContent('page_title'); ?></h1>
                    <ol class="breadcrumb">
                        <li <?php if(Request::is('admin') || Request::is(App::getLocale().'/admin')): ?> class="active" <?php endif; ?>>
                             <?php if(Request::is('admin') || Request::is(App::getLocale().'/admin')): ?>
                             <i class="fa fa-tachometer"></i> <?php echo e(trans('admin.dashboard')); ?>

                            <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>/<?php echo e(App::getLocale()); ?>/admin"> <i class="fa fa-tachometer"></i> <?php echo e(trans('admin.dashboard')); ?></a>
                            <?php endif; ?>
                        </li>
                        <?php if(isset($breadcrumbs)): ?>
                        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <li <?php if(Request::is($breadcrumb['url']) || empty($breadcrumb['url'])): ?> class="active" <?php endif; ?>>
                             <?php if(!empty($breadcrumb['url'])): ?>
                             <a href="<?php echo e($breadcrumb['url']); ?>">  <?php echo e($breadcrumb['name']); ?></a>
                            <?php else: ?>
                            <?php echo e($breadcrumb['name']); ?>

                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                    </ol>   
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12" id="messages">
                            <?php echo $__env->make('admin.blocks.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                    <?php echo $__env->yieldContent('content'); ?>
                </section>
            </aside>
            <!-- right-side -->
        </div>
        <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
            <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
        </a>
        <!-- global js -->
        
        
        <script src="<?php echo e(asset('public/admin_assets/js/jquery-ui.js')); ?>"></script>

        <script src="<?php echo e(asset('public/admin_assets/js/jquery.validate.js')); ?>"></script>
         <!--<script src="<?php echo e(asset('public/admin_assets/vendors/form_builder1/js/jquery.ui.min.js')); ?>"></script>-->
        
    <script src="<?php echo e(asset('public/admin_assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?php echo e(asset('public/admin_assets/vendors/livicons/minified/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/livicons/minified/livicons-1.4.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/admin_assets/js/josh.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/admin_assets/js/metisMenu.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/holder-master/holder.js')); ?>"></script>
    <!--<script src="<?php echo e(asset('public/admin_assets/vendors/holder-master/holder.js')); ?>"></script>-->

    <style>
        .error{

            color:red;

        }


    </style>    
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- end of global js -->
    <!-- begin page level js -->
    <?php echo $__env->yieldContent('footer'); ?>
    <!-- end page level js -->

</body>
</html>