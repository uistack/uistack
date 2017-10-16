<?php 
$pageNameMode = trans('Core::operations.create');
$breadcrumbs[] =  ['url' => url('/').'/'.Lang::getLocale().'/admin/banners', 'name' => trans('Banners::banners.banners')];
$action = action('\UiStacks\Banners\Controllers\BannersController@store');
$method = '';
$backFieldLabel = trans('admin.add_new_after_save');
$submitButton = trans('admin.save');
if(Request::is('*/edit')){
$pageNameMode = trans('Core::operations.edit');
$breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.edit').' '.trans('Banners::banners.banner')];
$action = action('\UiStacks\Banners\Controllers\BannersController@update', $item->id);
$method = 'PATCH';
$backFieldLabel = trans('admin.back_after_update');
$submitButton = trans('admin.update');
}else{
$breadcrumbs[] =  ['url' => '', 'name' => trans('Core::operations.create').' '.trans('Banners::banners.banner')];
}
 ?>


<?php $__env->startSection('page_title'); ?>
<?php echo e(trans('Banners::banners.banner')); ?>: <?php echo e($pageNameMode); ?> <?php echo e(trans('Banners::banners.banner')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Include Media model -->
<?php echo $__env->make('Media::modals.modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- end include Media model -->
<!-- Include Media model -->
<?php echo $__env->make('Media::modals.gallery-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <!--<link href="<?php echo e(asset('admin_assets/css/pages/tables-rtl.css')); ?>" rel="stylesheet" />-->

  <link href="<?php echo e(asset('media-dev.css')); ?>" rel="stylesheet" />
<!-- end include Media model -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="livicon" data-name="list" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true"></i> <?php echo e($pageNameMode); ?> <?php echo e(trans('Pages::pages.page')); ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo e($action); ?>" method="POST" role="form" enctype="multipart/form-data" >
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
                                        'name' => trans('Core::operations.name'),
                                        'placeholder' => ''
                                    ]
                                ]
                            ]
                        ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="form-group ">
                            <label for="section"><?php echo e(trans('Banners::banners.image')); ?></label>
                            <?php if(Request::is('*/edit')): ?>
                                <input type="file" name="banner_img" id="banner_img"  />
                            <?php else: ?>
                                <input type="file" name="banner_img" id="banner_img"   />
                            <?php endif; ?>
                            <input type="hidden" name="banner_img_old" id="banner_img_old" <?php if(isset($item)): ?> value="<?php echo e($item->trans->banner_img); ?>" <?php endif; ?> />
                        </div>
                        <?php if(isset($item) && file_exists(public_path('/uploads/banners').'/'.$item->trans->banner_img)): ?>
                            <img width="60" height="60" src="<?php echo e(url('/uploads/banners')); ?>/<?php echo e($item->trans->banner_img); ?>" alt="">
                        <?php else: ?>
                            <img src="<?php echo e(asset('images/select_main_img.png')); ?>" width="60">
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="URL">URL</label>
                            <input <?php if(isset($item->trans->url)): ?> value="<?php echo e($item->trans->url); ?>" <?php endif; ?> type="text" value="" id="banner_object_url" name="banner_object_url" class="form-control" >
                            For Example:- http:// |your domain|.com
                        </div>

                        <?php echo $__env->make('Core::fields.input_text', [
                                'field_name' => 'start_date',
                                'name' => trans('Banners::banners.start_at'),
                                'placeholder' => trans('Banners::banners.start_at'),
                                'value' => isset($item) ? old('start_date',$item->start_date) : ""
                            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('Core::fields.input_text', [
                                'field_name' => 'end_date',
                                'name' => trans('Banners::banners.end_at'),
                                'placeholder' => trans('Banners::banners.end_at'),
                                'value' => isset($item) ? old('end_date',$item->end_date) : ""
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
<script>
    $('#banner_img').change(function() {
        var ext = this.value.match(/\.(.+)$/)[1];
        switch (ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
            case 'JPG':
            case 'JPEG':
            case 'PNG':
            case 'GIF':
                break;
            default:
                alert('الرجاء تحميل ملف فقط من النوع جبغ، ينغ، جيف، جبغ.');
                this.value = '';
        }
    });
</script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo e(asset('jquery-timepicker-addon-master/jquery-ui-timepicker-addon.css')); ?>">
<script src="<?php echo e(asset('jquery-timepicker-addon-master/jquery-ui-timepicker-addon.js')); ?>"></script>
<script src="<?php echo e(asset('jquery-timepicker-addon-master/jquery-ui-sliderAccess.js')); ?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var startDateTextBox = $('#start_date');
        var endDateTextBox = $('#end_date');
        startDateTextBox.datetimepicker({
            minDate: '+0d',
            dateFormat: 'yy-mm-dd',
            timeFormat: 'HH:mm:ss',
//                minInterval: (1000*60*60), // 1hr
            onClose: function(dateText, inst) {
                if (endDateTextBox.val() != '') {
                    var testStartDate = startDateTextBox.datetimepicker('getDate');
                    var testEndDate = endDateTextBox.datetimepicker('getDate');
                    if (testStartDate > testEndDate) {
                        endDateTextBox.datetimepicker('setDate', testStartDate);
//                            endDateTextBox.datetimepicker({
//                                minInterval: (1000 * 60 * 60), // 1hr
//                            });
                    }
                }
                else {
                    endDateTextBox.val(dateText);
                }
            },
            onSelect: function (selectedDateTime){
                endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
            }
        });
        endDateTextBox.datetimepicker({
            minDate: '+0d',
            dateFormat: 'yy-mm-dd',
            timeFormat: 'HH:mm:ss',
//                minInterval: (1000*60*60), // 1hr
            onClose: function(dateText, inst) {
                if (startDateTextBox.val() != '') {
                    var testStartDate = startDateTextBox.datetimepicker('getDate');
                    var testEndDate = endDateTextBox.datetimepicker('getDate');
                    if (testStartDate > testEndDate)
                        startDateTextBox.datetimepicker('setDate', testEndDate);
                }
                else {
                    startDateTextBox.val(dateText);
                }
            },
            onSelect: function (selectedDateTime){
                startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
            }
        });

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>