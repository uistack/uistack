<?php 
$breadcrumbs = [
['url' => '', 'name' => trans('Banners::banners.banners')]
];
$dbTable = '';
if($items->count()){
$dbTable = $items[0]['table'];
}
 ?>

<?php $__env->startSection('page_title'); ?>
<?php echo e(trans('Banners::banners.banners')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Include single delete confirmation model -->
<?php echo $__env->make('Core::modals.confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Include bulk delete confirmation model -->
<?php echo $__env->make('Core::modals.bulk-confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="admin-top-operation">
            <a class="btn btn-default" href="<?php echo e(action('\UiStacks\Banners\Controllers\BannersController@create')); ?>"><?php echo e(trans('Banners::banners.create')); ?> <?php echo e(trans('Banners::banners.banner')); ?></a>
        </div>
         <?php if($items->count() || $_GET): ?>
            <?php echo $__env->make('Banners::filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <?php if($items->count()): ?>
        <form method="POST" action="<?php echo e(action('\UiStacks\Banners\Controllers\BannersController@bulkOperations')); ?>" id="bulk" class="form-inline">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="check_all" id="checkall">
                            </th>
                            <th><?php echo e(trans('Core::operations.id')); ?></th>
                            <th><?php echo e(trans('Banners::banners.image')); ?></th>
                            <th><?php echo e(trans('Banners::banners.start_at')); ?></th>
                            <th><?php echo e(trans('Banners::banners.end_at')); ?></th>
                            <th><?php echo e(trans('Banners::banners.name')); ?></th>
                            <th><?php echo e(trans('Core::operations.status')); ?></th>
                            <th><?php echo e(trans('Core::operations.operations')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="ids[]" class="check_list" value="<?php echo e($item->id); ?>">
                            </td>
                            <td><?php echo e($item->id); ?></td>
                            <td>
                                <?php if(isset($item->trans->banner_img) && file_exists(public_path('/uploads/banners').'/'.$item->trans->banner_img)): ?>
                                <img width="60" height="60" src="<?php echo e(url('/uploads/banners')); ?>/<?php echo e($item->trans->banner_img); ?>" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(asset('images/select_main_img.png')); ?>" width="60">
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e(date('Y-m-d',strtotime($item->start_date))); ?>                                
                            </td>
                            <td>
                               <?php echo e(date('Y-m-d',strtotime($item->end_date))); ?> 
                            </td>
                            <td><?php echo e($item->trans->name); ?></td>
                            <td>
                                <?php if($item->active == true): ?>
                                <?php echo e(trans('Core::operations.active')); ?>

                                <?php else: ?>
                                <?php echo e(trans('Core::operations.inactive')); ?>

                                <?php endif; ?>
                            <td>
                                <a href="<?php echo e(action('\UiStacks\Banners\Controllers\BannersController@edit', $item->id)); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('Core::operations.edit')); ?></a>
                                <a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="<?php echo e($item->id); ?>" href="#full-width"><i class="fa fa-trash"></i> <?php echo e(trans('Core::operations.delete')); ?></a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="operation"><?php echo e(trans('Core::operations.with_select')); ?></label>
                <select name="operation" id="operation" class="form-control" required="required">
                    <option value="">- <?php echo e(trans('Core::operations.select')); ?> -</option>
                    <option value="activate"><?php echo e(trans('Core::operations.activate')); ?></option>
                    <option value="deactivate"><?php echo e(trans('Core::operations.deactivate')); ?></option>
                    <option value="delete"><?php echo e(trans('Core::operations.delete')); ?></option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo e(trans('Core::operations.go')); ?></button>
            <div class="table-footer">
                <div class="count"><i class="fa fa-folder-o"></i> <?php echo e($items->total()); ?> <?php echo e(trans('Core::operations.item')); ?></div>
                <div class="pagination-area"> <?php echo $items->render(); ?> </div>
            </div>
        </form>
        <?php else: ?>
        <div class="text-center">
            <?php if($_GET): ?>
            <h1><?php echo e(trans('admin.no_results_found')); ?> <a href="<?php echo e(action('\UiStacks\Banners\Controllers\BannersController@index')); ?>"><?php echo e(trans('admin.back')); ?></a></h1>
            <?php elseif(Request::is(''.Lang::getlocale().'/admin/ads')): ?>
            <h1><?php echo e(trans('admin.no_data_added_before')); ?> <a href="<?php echo e(action('\UiStacks\Banners\Controllers\BannersController@create')); ?>"><?php echo e(trans('Ads::ads.create')); ?> <?php echo e(trans('Ads::ads.ad')); ?></a></h1>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<!--jquery-dependency-fields -->
<script src="/vendor/core/js/jquery-dependency-fields/scripts.js"></script>
<!--end jquery-dependency-fields -->
<script src="<?php echo e(asset('admin_assets/js/index-operations.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>