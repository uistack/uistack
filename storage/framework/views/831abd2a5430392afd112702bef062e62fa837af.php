<?php 
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Countries::countries.countries')]
    ];

    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }

 ?>


<?php $__env->startSection('page_title'); ?>
<?php echo e(trans('Countries::countries.areas')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Include single delete confirmation model -->
<?php echo $__env->make('Core::modals.confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Include bulk delete confirmation model -->
<?php echo $__env->make('Core::modals.bulk-confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-md-12">

        <div class="admin-top-operation">
            <a class="btn btn-default" href="<?php echo e(action('\UiStacks\Countries\Controllers\AreasController@create')); ?>"><?php echo e(trans('Core::operations.create')); ?> <?php echo e(trans('Countries::countries.area')); ?></a>
        </div>

        <?php if($items->count() || $_GET): ?>
            <?php echo $__env->make('Countries::areas.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <?php if($items->count()): ?>
            <form method="POST" action="<?php echo e(action('\UiStacks\Countries\Controllers\AreasController@bulkOperations')); ?>" id="bulk" class="form-inline">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall">
                                </th>
                                <th><?php echo e(trans('Core::operations.id')); ?></th>
                                <th><?php echo e(trans('Countries::countries.area')); ?></th>
                                <th><?php echo e(trans('Countries::countries.country')); ?></th>
                                <th><?php echo e(trans('Core::operations.author')); ?></th>
                                <th><?php echo e(trans('Core::operations.last_update_by')); ?></th>
                                <th><?php echo e(trans('Core::operations.created_at')); ?></th>
                                <th><?php echo e(trans('Core::operations.updated_at')); ?></th>
                                <th><?php echo e(trans('Core::operations.status')); ?></th>
                                <th><?php echo e(trans('Core::operations.operations')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr <?php if($item->trans): ?> data-title="<?php echo e($item->trans->name); ?>" <?php endif; ?>>
                                    <td>
                                        <input type="checkbox" name="ids[]" class="check_list" value="<?php echo e($item->id); ?>">
                                    </td>
                                    <td><?php echo e($item->id); ?></td>
                                    <td>
                                        <?php if($item->trans): ?>
                                            <?php echo e($item->trans->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td class="user_name_col_<?php echo e($item->id); ?>">
                                        <?php if($item->country && $item->country->trans): ?>
                                            <?php echo e($item->country->trans->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->author): ?>
                                            <?php echo e($item->author->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->lastUpdateBy): ?>
                                            <?php echo e($item->lastUpdateBy->name); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td><?php echo e($item->updated_at); ?></td>
                                    <td>
                                        <?php if($item->active == true): ?>
                                            <?php echo e(trans('Core::operations.active')); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('Core::operations.inactive')); ?>

                                        <?php endif; ?>
                                    <td>
                                       <a href="<?php echo e(action('\UiStacks\Countries\Controllers\AreasController@edit', $item->id)); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('Core::operations.edit')); ?></a>
                                       <a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="<?php echo e($item->id); ?>" <?php if($item->trans): ?> data-title="<?php echo e($item->trans->name); ?>" <?php endif; ?> href="#full-width"><i class="fa fa-trash"></i> <?php echo e(trans('Core::operations.delete')); ?></a>
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
                    <h1><?php echo e(trans('admin.no_results_found')); ?> <a href="<?php echo e(action('\UiStacks\Countries\Controllers\AreasController@index')); ?>"><?php echo e(trans('admin.back')); ?></a></h1>
                <?php elseif(Request::is(''.Lang::getlocale().'/admin/countries-areas')): ?>
                    <h1><?php echo e(trans('admin.no_data_added_before')); ?> <a href="<?php echo e(action('\UiStacks\Countries\Controllers\AreasController@create')); ?>"><?php echo e(trans('Core::operations.create')); ?> <?php echo e(trans('Countries::countries.area')); ?></a></h1>
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
    <script src="<?php echo e(asset('public/admin_assets/js/index-operations.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>