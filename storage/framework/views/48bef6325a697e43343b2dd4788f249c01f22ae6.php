<?php 
    $faqNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/faqs', 'name' => trans('Faqs::faqs.faqs')];
    $action = action('\UiStacks\Faqs\Controllers\FaqsController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $faqNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Faqs::faqs.faq')];
        $action = action('\UiStacks\Faqs\Controllers\FaqsController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Faqs::faqs.faq')];
    }
 ?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Faqs::faqs.faqs')); ?>: <?php echo e($faqNameMode); ?> <?php echo e(trans('Faqs::faqs.faq')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Include Media model -->
    <?php echo $__env->make('Media::modals.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end include Media model -->
    <!-- Include Media model -->
    <?php echo $__env->make('Media::modals.gallery-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> <?php echo e($faqNameMode); ?> <?php echo e(trans('Faqs::faqs.faq')); ?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo e($action); ?>" method="POST" role="form">
                        <?php if($method === 'PATCH'): ?>
                            <input type="hidden" name="_method" value="PATCH">
                        <?php endif; ?>
                        <?php echo e(csrf_field()); ?>

                        <div class="col-md-9">
                            <?php echo $__env->make('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'name',
                                            'name' => trans('Faqs::faqs.name'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->name)) ? $item->trans->name : ""
                                        ]
                                    ]
                                ]
                            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'textarea',
                                        'properties' => [
                                            'field_name' => 'description',
                                            'name' => trans('Faqs::faqs.description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->description)) ? $item->trans->description : ""
                                        ]
                                    ]
                                ]
                            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="col-md-3">
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
    <?php echo $__env->make('Media::scripts.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!--end media -->
    <!--jquery-dependency-fields -->
    <script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
    <!--end jquery-dependency-fields -->
    
    
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'description_ar' );
        CKEDITOR.replace( 'description_en' );
        $(document).ready(function () {
            $('#lang-en').attr('onClick','return false');
            $('#lang-ar').attr('onClick','return false');
        });
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>