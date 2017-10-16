<?php 
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Faqs::faqs.faqs')]
    ];
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
 ?>


<?php $__env->startSection('page_title'); ?>
<?php echo e(trans('Faqs::faqs.faqs')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Include single delete confirmation model -->
<?php echo $__env->make('Core::modals.confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Include bulk delete confirmation model -->
<?php echo $__env->make('Core::modals.bulk-confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-md-12">

        <div class="admin-top-operation">
            <a class="btn btn-default" href="<?php echo e(action('\UiStacks\Faqs\Controllers\FaqsController@create')); ?>"><?php echo e(trans('Faqs::faqs.create')); ?> <?php echo e(trans('Faqs::faqs.faq')); ?></a>
        </div>

        <?php if($items->count()): ?>
            <form method="POST" action="<?php echo e(action('\UiStacks\Faqs\Controllers\FaqsController@bulkOperations')); ?>" id="bulk" class="form-inline">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall">
                                </th>
                                <th><?php echo e(trans('Core::operations.id')); ?></th>
                                <th><?php echo e(trans('Faqs::faqs.name')); ?></th>
                                <th><?php echo e(trans('Faqs::faqs.description')); ?></th>
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
                                    <td>
                                        <?php if($item->trans): ?>
                                            <?php echo $item->trans->description; ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->active == 1): ?>
                                            <?php echo e(trans('Core::operations.active')); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('Core::operations.inactive')); ?>

                                        <?php endif; ?>
                                    <td>
                                       <a href="<?php echo e(action('\UiStacks\Faqs\Controllers\FaqsController@edit', $item->id)); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('Core::operations.edit')); ?></a>
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
                    <h1><?php echo e(trans('admin.no_results_found')); ?> <a href="<?php echo e(action('\UiStacks\Faqs\Controllers\FaqsController@index')); ?>"><?php echo e(trans('admin.back')); ?></a></h1>
                <?php elseif(Request::is(''.Lang::getlocale().'/admin/ads')): ?>
                    <h1><?php echo e(trans('admin.no_data_added_before')); ?> <a href="<?php echo e(action('\UiStacks\Faqs\Controllers\FaqsController@create')); ?>"><?php echo e(trans('Ads::ads.create')); ?> <?php echo e(trans('Ads::ads.ad')); ?></a></h1>
                <?php endif; ?>
             </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="<?php echo e(asset('admin_assets/js/index-operations.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>