<?php 
    $articleNameMode = trans('Core::operations.create');
    $breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/articles', 'name' => trans('Articles::articles.articles')];
    $action = action('\UiStacks\Articles\Controllers\ArticlesController@store');
    $method = '';
    $backFieldLabel = trans('admin.add_new_after_save');
    $submitButton = trans('admin.save');
    if(Request::is('*/edit')){
        $articleNameMode = trans('Core::operations.edit');
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Articles::articles.article')];
        $action = action('\UiStacks\Articles\Controllers\ArticlesController@update', $item->id);
        $method = 'PATCH';
        $backFieldLabel = trans('admin.back_after_update');
        $submitButton = trans('admin.update');
    }else{
        $breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Articles::articles.article')];
    }
 ?>

<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Articles::articles.articles')); ?>: <?php echo e($articleNameMode); ?> <?php echo e(trans('Articles::articles.article')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/media-dev.css')); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Include Media model -->
    <?php echo $__env->make('Media::modals.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- end include Media model -->
    <!-- Include Media model -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> <?php echo e($articleNameMode); ?> <?php echo e(trans('Articles::articles.article')); ?></h3>
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
                                            'name' => trans('Articles::articles.name'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->name)) ? $item->trans->name : ""
                                        ]
                                    ],
                                    1 => [
                                        'type' => 'input_text',
                                        'properties' => [
                                            'field_name' => 'article_url',
                                            'name' => "Article URL",
                                            'placeholder' => '',
                                            'value' => (isset($item->article_url)) ? $item->article_url : ""
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
                                            'name' => trans('Articles::articles.description'),
                                            'placeholder' => '',
                                            'value' => (isset($item->trans->description)) ? $item->trans->description : ""
                                        ]
                                    ]
                                ]
                            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <!-- Media main image -->
                                <div class="form-group <?php echo e($errors->has('main_image_id') ? 'has-error': ''); ?>" style="text-align: center;">
                                    <label style="display: block;"><?php echo e(trans('Users::users.avatar')); ?></label>

                                    <a data-toggle="modal" data-target="#inno_media_modal" href="javascript:void(0)" media-data-button-name="<?php echo e(trans('Core::operations.select')); ?>ر<?php echo e(trans('Users::users.avatar')); ?>" media-data-field-name="main_image_id" media-data-required>
                                        <div class="media-item">
                                            <?php if(isset($item->media) && isset($item->media->main_image) && isset($item->media->main_image->styles['thumbnail'])): ?>
                                                <img src="<?php echo e(url('/')); ?>/<?php echo e($item->media->main_image->styles['thumbnail']); ?>" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                                <input type="hidden" name="main_image_id" value="<?php echo e($item->media->main_image->id); ?>">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/images/select_main_img.png')); ?>" style="max-width: 100%; border: 2px solid rgb(204, 204, 204);">
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Media main image -->
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
    <script src="<?php echo e(asset('public/media-dev.js')); ?>"></script>
    <!--end media -->

    
    
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