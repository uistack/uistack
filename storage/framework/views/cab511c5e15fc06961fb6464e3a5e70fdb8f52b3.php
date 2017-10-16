<?php 
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
 ?>

<?php $__env->startSection('page_title'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Include single delete confirmation model -->
    <?php echo $__env->make('Core::modals.confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Include bulk delete confirmation model -->
    <?php echo $__env->make('Core::modals.bulk-confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="db-main-blk">
        <div class="container">
            <div class="db-main-menu">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation">
                        <a href="<?php echo e(action('WebsiteController@dashboard')); ?>" >My Account</a>
                    </li>
                    <li role="presentation" class="active">
                        <a href="<?php echo e(action('StoreController@index')); ?>" >My Shops</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="db-mysho-set">
                        <form method="POST" action="<?php echo e(action('\UiStacks\Stores\Controllers\StoresController@bulkOperations')); ?>" id="bulk" class="form-inline">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="table-responsive cust-table">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" name="check_all" id="checkall">
                                        </th>
                                        <th>
                                            <?php echo e(trans('Stores::stores.store')); ?>

                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th><?php echo e(trans('Core::operations.status')); ?></th>
                                        <th><?php echo e(trans('Core::operations.created_at')); ?></th>
                                        <th><?php echo e(trans('Core::operations.operations')); ?></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr <?php if($item->trans): ?> data-title="<?php echo e($item->trans->name); ?>" <?php endif; ?>>
                                            <td>
                                                <input type="checkbox" name="ids[]" class="check_list" value="<?php echo e($item->id); ?>">
                                            </td>
                                            <td class="user_name_col_<?php echo e($item->id); ?>">
                                                <?php if($item->trans): ?>
                                                    <?php echo e($item->trans->name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if(isset($item->trans)): ?>
                                                    <?php echo e($item->trans->location); ?>

                                                <?php else: ?>
                                                    <?php echo e('N/A'); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->active == true): ?>
                                                    <?php echo e(trans('Core::operations.active')); ?>

                                                <?php else: ?>
                                                    <?php echo e(trans('Core::operations.inactive')); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($item->created_at); ?></td>
                                            <td>
                                                <a class="colo-app" href="<?php echo e(action('StoreController@edit', $item->id)); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('Core::operations.edit')); ?></a>
                                                <a class="colo-rej" onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="<?php echo e($item->id); ?>" <?php if($item->trans): ?> data-title="<?php echo e($item->trans->name); ?>" <?php endif; ?> href="#full-width"><i class="fa fa-trash"></i> <?php echo e(trans('Core::operations.delete')); ?></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('public/admin_assets/js/index-operations.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>