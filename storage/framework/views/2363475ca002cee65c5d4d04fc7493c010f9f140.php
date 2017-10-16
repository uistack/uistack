<?php 
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/emailtemplates', 'name' => trans('Emailtemplates::emailtemplate.emailtemplates')];
    $action = action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
    $pageNameMode = trans('Core::operations.edit');
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Emailtemplates::emailtemplate.emailtemplate')];
    $action = action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@update', $item->id);
    $method = 'PATCH';
    $backFieldLabel = trans('admin.back_after_update');
    $submitButton = trans('admin.update');
    }else{
    $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Emailtemplates::emailtemplate.emailtemplate')];
    }
 ?>


<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Emailtemplates::emailtemplate.emailtemplates')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        <?php echo e(trans('Emailtemplates::emailtemplate.emailtemplates')); ?>

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
                                        <?php echo $__env->make('Core::groups.languages', [
                                            'fields' => [
                                                0 => [
                                                    'type' => 'input_text',
                                                    'properties' => [
                                                        'field_name' => 'subject',
                                                        'name' => trans('Core::operations.name'),
                                                        'placeholder' => ''
                                                    ]
                                                ],
                                                1 => [
                                                    'type' => 'textarea',
                                                    'properties' => [
                                                        'field_name' => 'html_content',
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
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('html_content_en');
        CKEDITOR.replace('html_content_ar');

        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>