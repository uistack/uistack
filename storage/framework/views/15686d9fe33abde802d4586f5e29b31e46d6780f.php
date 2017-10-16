<?php 
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Contactus::contactus.contactus')]
    ];

    $dbTable = '';
 ?>


<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Contactus::contactus.contactus')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <!-- datetimepicker-->
    <link href="<?php echo e(asset('public/admin_assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" media="screen" />
    <!-- End datetimepicker -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light  bac-cust-tab">
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        
                    </div>
                    <div class="">
                        <ul class="nav nav-tabs">
                            <li class="<?php if(!($errors->has('email') || $errors->has('subject') || $errors->has('message'))): ?> active <?php endif; ?>">
                                <a href="#tab_1_1" data-toggle="tab"><?php echo e(trans('Contactus::contactus.request_details')); ?></a>
                            </li>
                            <li class="<?php if(($errors->has('email') || $errors->has('subject') || $errors->has('message'))): ?> active <?php endif; ?>">
                                <a href="#tab_1_3" data-toggle="tab"><?php echo e(trans('Contactus::contactus.post_reply')); ?></a>
                            </li>
                            <li class="">
                                <a href="#tab_1_2" data-toggle="tab"><?php echo e(trans('Contactus::contactus.your_replies')); ?></a>
                            </li>

                        </ul>
                    </div>
                </div>
                <?php if(session('profile-updated')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('profile-updated')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('password-update-fail')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('password-update-fail')); ?>

                    </div>
                <?php endif; ?>
                <div class="portlet-body">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane <?php if(!($errors->has('email') || $errors->has('subject') || $errors->has('message'))): ?> active <?php endif; ?>" id="tab_1_1">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.order_type')); ?>:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label">
                                            <?php if(isset($request) && $request->section_id): ?>
                                                <?php
                                                $sec = UiStacks\Contactus\Models\ContactusSectionTrans::where(array('section_id' => $request->section_id,'lang' => Lang::getlocale()))->first();
                                                if (isset($sec)) {
                                                    echo $sec->name;
                                                }
                                                ?>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.commercial_stores')); ?>:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label"><?php if(isset($request)): ?><?php echo e($request->store_name); ?><?php endif; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.commercial_stores_instagram_link')); ?>:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label"><?php if(isset($request)): ?><?php echo e($request->store_url); ?><?php endif; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.email')); ?>:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label"><?php if(isset($request)): ?><?php echo e($request->contact_email); ?><?php endif; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.mobile')); ?>:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label"><?php if(isset($request)): ?><?php echo e($request->contact_phone); ?><?php endif; ?></label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.date')); ?>:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label"><?php if(isset($request)): ?><?php echo e($request->created_at->format('d M, Y')); ?><?php endif; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.message')); ?>:</b></label>
                                    <div class="col-sm-5">
                                        <label class="control-label"><?php if(isset($request)): ?><?php echo $request->contact_message; ?><?php endif; ?></label>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="tab-pane <?php if(($errors->has('email') || $errors->has('subject') || $errors->has('message'))): ?> active <?php endif; ?>" id="tab_1_3">
                            <?php if(isset($request)): ?>
                                <form role="form" class="form-horizontal" method="post" action="<?php echo e(url('/')); ?>/<?php echo e(Lang::getLocale()); ?>/admin/contactus/request-reply/<?php echo e($request->contact_id); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <h4><?php echo e(trans('Contactus::contactus.fill_form')); ?></h4>
                                    <div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
                                        <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.email_from')); ?>:</b></label>
                                        <div class="col-sm-5">
                                            <input class="form-control" name="email" value="<?php echo e(old('email',$contact_email)); ?>" readonly=""/>
                                            <?php if($errors->has('email')): ?>
                                                <span class="help-block">
                                                    <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group <?php if($errors->has('message')): ?> has-error <?php endif; ?>">
                                        <label class="control-label col-sm-4"><b><?php echo e(trans('Contactus::contactus.message')); ?>:</b></label>
                                        <div class="col-sm-5">
                                            <textarea class="form-control" id="reply_message" name="message"><?php echo e(old('message')); ?></textarea>
                                            <?php if($errors->has('message')): ?>
                                                <span class="help-block">
                                                    <strong class="text-danger"><?php echo e($errors->first('message')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group <?php if($errors->has('message')): ?> has-error <?php endif; ?>">
                                        <label class="control-label col-sm-4"></label>
                                        <div class="col-sm-5">
                                            <button type="submit" class="btn btn-md btn-primary"><?php echo e(trans('Contactus::contactus.post_reply')); ?></button>

                                        </div>
                                    </div>
                                </form>
                            <?php else: ?>
                                <div class="text-center alert alert-danger">
                                    <?php echo e(trans('Core::operations.no_records')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- CHANGE PASSWORD TAB -->
                        <div class="tab-pane" id="tab_1_2">

                            <div class="chat-blok ">
                                <?php if(isset($request) && $request->is_reply== 1): ?>
                                    <ul>
                                        <?php $__currentLoopData = $request->replies()->orderBy('created_at','desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$reply): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <li>
                                                <div class="cht-msg " >
                                                    
                                                        
                                                    
                                                    <div class="media-body">
                                                        <div class="c-text"><?php echo $reply->reply_message; ?></div>
                                                        <div class="chat-info">
                                                            <ul>
                                                                <li>
                                                                    <span><i class="fa fa-calendar"></i><?php echo e($reply->created_at->format('d M, Y')); ?></span>
                                                                </li>
                                                                <li>
                                                                    <span><i class="fa fa-envelope "></i><?php echo e($reply->reply_email); ?></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </ul>
                                <?php else: ?>
                                    <br/>
                                    <div class="text-center alert alert-danger">
                                        <?php echo e(trans('Core::operations.no_records')); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                            
                                
                                    
                                        
                                            
                                                
                                                    
                                                
                                            

                                            
                                                
                                                    
                                                
                                            

                                            
                                                
                                                    
                                                
                                            
                                        
                                    
                                        
                                        
                                            
                                        
                                    
                                
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <!--Language -->
    <?php echo $__env->make('Core::language.scripts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--end Language -->

    <!--datetime picker for time filter-->
    <script type="text/javascript" src="<?php echo e(asset('public/admin_assets/vendors/datetimepicker/js/bootstrap-datetimepicker.js')); ?>" charset="UTF-8"></script>
    <script src="<?php echo e(asset('public/admin_assets/js/pages/pickers.js')); ?>"></script>
    <!--end datetime picker for time filter-->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('reply_message');
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>