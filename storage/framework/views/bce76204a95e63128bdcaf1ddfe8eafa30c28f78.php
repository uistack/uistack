<header class="header">
        <a href="<?php echo e(url('/')); ?>/<?php echo e(Lang::getlocale()); ?>/admin" class="logo" style="color: #fff; font-weight: 800; font-size: 20px;">
            <img src="<?php echo e(asset('public/images/logo.png')); ?>" alt="Logo">
             <?php echo e(\UiStacks\Settings\Models\Setting::find(1)->value); ?>

        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            
             <div class="navbar-right">
                <ul class="nav navbar-nav">
                    
                        
                        
                    
                    <?php if(count($languages) && count($languages) > 1): ?>
                    <li class="dropdown language">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 9px 4px 11px 5px; font-size: 15px; font-weight: 800; color: #fff; line-height: 2;">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($lang['code'] == Lang::getLocale()): ?>
                                    <?php echo e($lang['name']); ?>

                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?> 
                        </a>
                        <ul class="dropdown-menu">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php
                                $url = Request::url();
                                //ramesh on 17-07-2017
                                if (strpos($url, "hi")!==false){
                                    $current_url = "hi";
                                }elseif (strpos($url, "ar")!==false){
                                    $current_url = "ar";
                                }
                                else {
                                    $current_url = "en";
                                }
                                $new_url = str_replace($current_url,$lang['code'],$url);
                            ?>
                            <li><a href="<?php echo e($new_url); ?>"><?php echo e($lang['name']); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                
                    
                    <?php if(Auth::check()): ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php if(Auth::user()->image): ?>
                            <img src="/<?php echo e(Auth::user()->image->thumbnail); ?>" width="35" class="img-circle img-responsive pull-left" height="35" alt="<?php echo e(Auth::user()->name); ?>" style="background: #fff;">
                            <?php else: ?>
                            <img src="<?php echo e(asset('public/images/user.png')); ?>" width="35" class="img-circle img-responsive pull-left" height="35" alt="<?php echo e(Auth::user()->name); ?>" style="background: #fff;">
                            <?php endif; ?>
                            <div class="riot">
                                <div>
                                    <?php echo e(Auth::user()->name); ?>

                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <?php if(Auth::user()->image): ?>
                                <img src="/<?php echo e(Auth::user()->image->thumbnail); ?>" class="img-responsive img-circle" alt="<?php echo e(Auth::user()->name); ?>" style="background: #fff;">
                                <?php else: ?>
                                 <img src="<?php echo e(asset('public/images/user.png')); ?>" class="img-responsive img-circle" alt="<?php echo e(Auth::user()->name); ?>" style="background: #fff;">
                                <?php endif; ?>
                                <p class="topprofiletext"><?php echo e(Auth::user()->name); ?></p>
                            </li>
                            <!-- Menu Body -->
                            <!-- <li>
                               <a href="#">
                                    <i class="livicon" data-name="user" data-s="18"></i>
                                    My Profile
                                </a>
                            </li>-->
                            <li role="presentation"></li>
                            
                            <!-- Menu Footer-->
                           <li class="user-footer">
                                <!-- <div class="pull-right">
                                    <a href="lockscreen.html">
                                        <i class="livicon" data-name="lock" data-s="18"></i>
                                        Lock
                                    </a>
                                </div>-->
                                <div class="pull-left">
                                    <a href="<?php echo e(url(Lang::getlocale().'/admin/logout')); ?>">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        <?php echo e(trans('admin.logout')); ?>

                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>