<?php 
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/courses/', 'name' => trans('Tutorials::tutorials.courses')];
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/courses/sections/'.$id, 'name' => trans('Tutorials::tutorials.sections')];
    $action = action('\UiStacks\Tutorials\Controllers\SectionsController@store',$id);
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
    $pageNameMode = trans('Core::operations.edit');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Tutorials::tutorials.sections')];
    $action = action('\UiStacks\Tutorials\Controllers\SectionsController@update', $item->id);
    //$action = action('\UiStacks\Tutorials\Controllers\SectionsController@update');
    $method = 'PATCH';
    $backFieldLabel = trans('admin.back_after_update');
    $submitButton = trans('admin.update');
    }else{
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Tutorials::tutorials.section')];
    }
 ?>


<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Tutorials::tutorials.sections')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/media-dev.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Include Media model -->
    <?php echo $__env->make('Media::modals.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        <?php echo e(trans('Tutorials::tutorials.section')); ?>

                    </h3>
                </div>
                <div class="panel-body">
                    
                    <form action="<?php echo e($action); ?>" method="POST" role="form" >
                        <?php if($method === 'PATCH'): ?>
                            <input type="hidden" name="_method" value="PATCH">
                        <?php endif; ?>
                        <?php echo csrf_field(); ?>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-9">
                                        <div class="form-group clearfix">
                                            <label for="country"><?php echo e(ucfirst(trans('Tutorials::tutorials.course'))); ?></label>
                                            <div>
                                                <?php echo e($course->trans->name); ?>

                                            </div>
                                        </div>
<input type="hidden" name="course" value="<?php echo e($id); ?>"/>
                                        <?php echo $__env->make('Core::groups.languages', [
                                            'fields' => [
                                                0 => [
                                                    'type' => 'input_text',
                                                    'properties' => [
                                                        'field_name' => 'title',
                                                        'name' => trans('Core::operations.name'),
                                                        'placeholder' => ''
                                                    ]
                                                ],
                                                1 => [
                                                    'type' => 'textarea',
                                                    'properties' => [
                                                        'field_name' => 'description',
                                                        'name' => trans('Pages::pages.description'),
                                                        'placeholder' => ''
                                                    ]
                                                ]
                                            ]
                                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                    <div class="col-md-3 sidbare">
                                        <!-- Language field -->
                                    <?php echo $__env->make('Core::fields.languages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <!-- End Language field -->
                                        <?php echo $__env->make('Core::fields.checkbox', [
                                            'field_name' => 'active',
                                            'name' => trans('admin.active'),
                                            'placeholder' => ''
                                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <div class="checkbox">
                                            <label><input name="back" type="checkbox" value="1" class="minimal-blue" <?php if(old('back') == 1): ?> checked <?php endif; ?>> <?php echo e($backFieldLabel); ?></label>
                                        </div>

                                        <button type="submit" class="btn btn-block btn-primary"><?php echo e($submitButton); ?></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <!--Language -->
    <?php echo $__env->make('Core::language.scripts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--end Language -->
    <!--Media -->
    <script src="<?php echo e(asset('public/media-dev.js')); ?>"></script>
    <!--end media -->
    <script type="text/javascript">

        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>