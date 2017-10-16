<?php 
    $pageNameMode = trans('Settings::settings.accounts');
    $breadcrumbs[] = ['url' => '', 'name' => trans('Settings::settings.setting').' '.trans('Settings::settings.accounts')];
    $action = action('\UiStacks\Settings\Controllers\SettingsController@updateSocialAccounts');
    $submitButton = trans('admin.update');
 ?>


<?php $__env->startSection('page_title'); ?>
<?php echo e(trans('Settings::settings.settings')); ?>: <?php echo e($pageNameMode); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                    <?php echo e(trans('Settings::settings.setting')); ?> 
                    <?php echo e($pageNameMode); ?>

                </h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo e($action); ?>" method="POST" role="form">
                    <?php echo e(csrf_field()); ?>

                    <div class="col-md-9">
                        <?php echo $__env->make('Core::fields.input_text', [
                            'field_name' => 'facebook',
                            'name' => trans('Settings::settings.facebook'),
                            'value' => $facebook,
                            'placeholder' => ''
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('Core::fields.input_text', [
                            'field_name' => 'twitter',
                            'name' => trans('Settings::settings.twitter'),
                            'value' => $twitter,
                            'placeholder' => ''
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('Core::fields.input_text', [
                            'field_name' => 'gplus',
                            'name' => trans('Settings::settings.gplus'),
                            'value' => $gplus,
                            'placeholder' => ''
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('Core::fields.input_text', [
                            'field_name' => 'instagram',
                            'name' => trans('Settings::settings.instagram'),
                            'value' => $instagram,
                            'placeholder' => ''
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('Core::fields.input_text', [
                            'field_name' => 'youtube',
                            'name' => trans('Settings::settings.youtube'),
                            'value' => $youtube,
                            'placeholder' => ''
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <div class="col-md-3 sidbare">
                        <button type="submit" class="btn btn-block btn-primary"><?php echo e($submitButton); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>