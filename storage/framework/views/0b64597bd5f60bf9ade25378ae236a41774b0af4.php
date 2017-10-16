<?php 
    $pageNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/pages', 'name' => trans('Pages::pages.pages')];
    $action = action('\UiStacks\Pages\Controllers\PagesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $pageNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Pages::pages.page')];
        $action = action('\UiStacks\Pages\Controllers\PagesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Pages::pages.page')];
    }
 ?>


<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Pages::pages.pages')); ?>: <?php echo e($pageNameMode); ?> <?php echo e(trans('Pages::pages.page')); ?>

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
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> <?php echo e($pageNameMode); ?> <?php echo e(trans('Pages::pages.page')); ?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo e($action); ?>" method="POST" role="form">
                        <?php if($method === 'PATCH'): ?>
                            <input type="hidden" name="_method" value="PATCH">
                        <?php endif; ?>
                        <?php echo e(csrf_field()); ?>

                        <!-- Language field -->
                            <?php echo $__env->make('Core::fields.languages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="col-md-12">
                            <?php echo $__env->make('Core::groups.languages', [
                                'fields' => [
                                    0 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'name',
                                            'name' => trans('Core::operations.name'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->title)) ? $item->trans->title : ""
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
                                            'name' => trans('Pages::pages.description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->body)) ? $item->trans->body : ""
                                        ]
                                    ],
                                    1 =>[
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'page_seo_title',
                                            'name' => trans('Pages::pages.page_seo_title'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_seo_title)) ? $item->trans->page_seo_title : ""
                                        ]

                                    ],
                                    2 =>[
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'page_meta_keywords',
                                            'name' => trans('Pages::pages.page_meta_keywords'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_meta_keywords)) ? $item->trans->page_meta_keywords : ""
                                        ]

                                    ],
                                    3 => [
                                        'type' => 'textarea',
                                        'properties' => [
                                            'field_name' => 'page_meta_description',
                                            'name' => trans('Pages::pages.page_meta_description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->page_meta_descriptions)) ? $item->trans->page_meta_descriptions : ""
                                        ]
                                    ]
                                ]
                            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label for="section"><?php echo e(trans('Pages::pages.page_status')); ?></label>
                                <select id="page_status" class="form-control" name="page_status_ar">
                                    <option value=""><?php echo e(trans('Pages::pages.select')); ?></option>
                                    <option value="1" <?php if(isset($item->published) && $item->published =="1"): ?> selected="selected" <?php endif; ?> ><?php echo e(trans('Pages::pages.publish')); ?></option>
                                    <option value="2" <?php if(isset($item->published) && $item->published =="2"): ?> selected="selected" <?php endif; ?> ><?php echo e(trans('Pages::pages.unpublish')); ?></option>
                                </select>
                            </div>
                            <div class="checkbox">
                                <label><input name="back" type="checkbox" value="1" class="minimal-blue" <?php if(old('back') == 1): ?> checked <?php endif; ?>> <?php echo e($backFieldLabel); ?></label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary"><?php echo e($submitButton); ?></button>
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
    <script>
        CKEDITOR.replace( 'description_en' );
    </script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>