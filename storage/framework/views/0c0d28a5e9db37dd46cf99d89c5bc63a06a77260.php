<!DOCTYPE html>
<html>

<head>
<title><?php echo e(trans('project.project_name')); ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon shortcut" href="<?php echo e(asset('public/assets/img/fav.png')); ?>">
    <!-- global level css -->
    <link href="<?php echo e(asset('public/admin_assets/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="<?php echo e(asset('public/admin_assets/css/pages/login2.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/admin_assets/vendors/iCheck/skins/minimal/blue.css')); ?>" rel="stylesheet" />
    <!-- styles of the page ends-->
        <?php if(Lang::getLocale() == 'ar'): ?> 
         <link href="<?php echo e(asset('public/admin_assets/css/custom-rtl.css')); ?>" rel="stylesheet" type="text/css" id="colorscheme" />
    <?php endif; ?>
</head>

<body>
    <div class="container">
        <?php if(Session::has('message')): ?>
    <div class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo e(Session::get('message')); ?>

    </div>
<?php endif; ?>
        <div class="row vertical-offset-100 login">
            <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center"><i class="livicon" data-name="unlock" data-size="20" data-c="#418BCA" data-hc="#01BC8C" data-loop="true"></i> <?php echo e(trans('admin.system_admin')); ?></h3>
                    </div>
                    <div class="panel-body">
                        <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> an error to access.<br><br>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <form method="post" action="<?php echo e(action('\UiStacks\Core\Controllers\AdminLoginController@postAdmin')); ?>">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <fieldset>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="at" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                                    </div>

                                    <input class="form-control" placeholder="<?php echo e(trans('admin.email')); ?>" name="email" value="<?php echo e(old('email')); ?>" type="text" />
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="18" data-c="#000" data-hc="#000" data-loop="true"></i>
                                    </div>
                                    <input class="form-control" placeholder="<?php echo e(trans('admin.password')); ?>" name="password" type="password" value="" />
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me" class="minimal-blue">
                                        <?php echo e(trans('admin.remember_me')); ?> 
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block"><?php echo e(trans('admin.login')); ?></button>
                            </fieldset>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="<?php echo e(asset('public/admin_assets/js/jquery-1.11.1.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/admin_assets/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?php echo e(asset('public/admin_assets/vendors/livicons/minified/raphael-min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/livicons/minified/livicons-1.4.min.js')); ?>" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="<?php echo e(asset('public/admin_assets/js/TweenLite.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin_assets/vendors/iCheck/icheck.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(document).mousemove(function(event) {
            TweenLite.to($('body'), .5, {css:{'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"}});
        });

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].minimal-blue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });
    });
    </script>
    <!-- end of page level js-->
</body>
</html>