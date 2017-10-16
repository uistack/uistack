<?php if(Auth::user()->userRole->role_id == '1'): ?>
    <div class="page-sidebar sidebar-nav">
        <ul id="menu" class="page-sidebar-menu">

            <li class="<?php echo e(Request::is('admin') ? 'active' : ''); ?>

            <?php echo e(Request::is(''.Lang::getlocale().'/admin') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>/<?php echo e(Lang::getlocale()); ?>/admin">
                    <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title"><?php echo e(trans('admin.dashboard')); ?></span>
                </a>
            </li>

            <?php if(isset($adminMenu)): ?>
                <?php $__currentLoopData = $adminMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li class="<?php echo e(Request::is(ltrim($list['list_head']['link'], '/').'*') ? 'active' : ''); ?>">
                        <?php if($list['list_head'] && $list['list_head']['name'] && $list['list_head']['link']): ?>
                            <a href="<?php echo e(url('/')); ?><?php echo e($list['list_head']['link']); ?>">
                                <?php if(isset($list['icon'])): ?>
                                    <i class="livicon" data-name="<?php echo e($list['icon']); ?>" data-size="20" data-c="#ffffff" data-hc="#00bc8c" data-loop="true"></i>
                                <?php endif; ?>
                                <span class="title"><?php echo e($list['list_head']['name']); ?></span>
                                <?php if(isset($list['list_tree'])): ?>
                                    <span class="fa arrow"></span>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>

                        <?php if(isset($list['list_tree'])): ?>
                            <ul class="sub-menu">
                                <?php $__currentLoopData = $list['list_tree']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $li): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($li['name'] && $li['link']): ?>

                                        <li class="<?php echo e(Request::is(ltrim($li['link'], '/')) ? 'active' : ''); ?>">
                                            <a href="<?php echo e(url('/')); ?><?php echo e($li['link']); ?>">
                                                <?php if(Lang::getlocale() == 'en'): ?>
                                                    <i class="fa fa-angle-double-right"></i>
                                                <?php endif; ?>
                                                <?php echo e($li['name']); ?>

                                                <?php if(Lang::getlocale() == 'ar'): ?>
                                                    <i class="fa fa-angle-double-left"></i>
                                                <?php endif; ?>
                                                <?php if(isset($li['badge'])): ?>
                                                    <?php echo $li['badge']; ?>

                                                <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>

        </ul>
    </div>
<?php else: ?>
    <div class="page-sidebar sidebar-nav">
        <ul id="menu" class="page-sidebar-menu">

            <li class="<?php echo e(Request::is('admin') ? 'active' : ''); ?>

            <?php echo e(Request::is(''.Lang::getlocale().'/admin') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/')); ?>/<?php echo e(Lang::getlocale()); ?>/admin">
                    <i class="livicon" data-name="home" data-size="20" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                    <span class="title"><?php echo e(trans('admin.dashboard')); ?></span>
                </a>
            </li>


            <?php
            $all_permission = Auth::user()->hasPermission;
            if (isset($all_permission) && count($all_permission) > 0) {
            foreach ($all_permission as $key => $value) {
                $arr_user_permission[] = $all_permission{$key}->getPermission->model;
            }


            $temp_array = array(0 => "ads",1=>"ads-sections",2 => "ads-car-companies" , 3 => "ads-cars-types" , 4 => "ads-cars-models");
            if(isset($all_permission) && count($all_permission) > 0)
            {
                foreach($temp_array as $key=>$temp_value)
                {
                    if(in_array($temp_value, $arr_user_permission))
                    {
                        $arr_user_permission[] = "tale-list";
                        break;
                    }
                }
            }

            $list_link = array();
            $list_head_link = "";
            $list_tree_link = "";
            ?>
            <?php if(isset($adminMenu)): ?>
                <?php $__currentLoopData = $adminMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php
                    $list_head_link = explode("/", $list['list_head']['link']);
                    ?>

                    <?php
                    if (in_array($list_head_link[3], $arr_user_permission)) {
                    ?>
                    <li class="<?php echo e(Request::is(ltrim($list['list_head']['link'], '/').'*') ? 'active' : ''); ?>">
                        <?php if($list['list_head'] && $list['list_head']['name'] && $list['list_head']['link']): ?>
                            <a href="<?php echo e(url('/')); ?><?php echo e($list['list_head']['link']); ?>">
                                <?php if(isset($list['icon'])): ?>
                                    <i class="livicon" data-name="<?php echo e($list['icon']); ?>" data-size="20" data-c="#ffffff" data-hc="#00bc8c" data-loop="true"></i>
                                <?php endif; ?>
                                <span class="title"><?php echo e($list['list_head']['name']); ?></span>
                                <?php if(isset($list['list_tree'])): ?>
                                    <span class="fa arrow"></span>
                                <?php endif; ?>
                            </a>
                        <?php endif; ?>
                        <?php
                        }
                        ?>

                        <?php if(isset($list['list_tree'])): ?>
                            <ul class="sub-menu">
                                <?php $__currentLoopData = $list['list_tree']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $li): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php
                                    $list_tree_link = explode("/", $li['link']);
                                    if (in_array($list_tree_link[3], $arr_user_permission)) {
                                    ?>
                                    <?php if($li['name'] && $li['link']): ?>
                                        <li class="<?php echo e(Request::is(ltrim($li['link'], '/')) ? 'active' : ''); ?>">
                                            <a href="<?php echo e(url('/')); ?><?php echo e($li['link']); ?>">
                                                <?php if(Lang::getlocale() == 'en'): ?>
                                                    <i class="fa fa-angle-double-right"></i>
                                                <?php endif; ?>
                                                <?php echo e($li['name']); ?>

                                                <?php if(Lang::getlocale() == 'ar'): ?>
                                                    <i class="fa fa-angle-double-left"></i>
                                                <?php endif; ?>
                                                    <?php if(isset($li['badge'])): ?>
                                                        <?php echo $li['badge']; ?>

                                                    <?php endif; ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php
                                    }
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>

        </ul>

        <?php
        }
        ?>


    </div>




<?php endif; ?>