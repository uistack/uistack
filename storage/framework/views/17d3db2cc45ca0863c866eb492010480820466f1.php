<?php 
    $breadcrumbs = [
                        ['url' => '', 'name' => trans('Pages::pages.pages')]
    ];
    $dbTable = '';
    if($items->count()){
        $dbTable = $items[0]['table'];
    }
 ?>


<?php $__env->startSection('page_title'); ?>
<?php echo e(trans('Pages::pages.pages')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Include single delete confirmation model -->
<?php echo $__env->make('Core::modals.confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- Include bulk delete confirmation model -->
<?php echo $__env->make('Core::modals.bulk-confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="row">
    <div class="col-md-12">

        <div class="admin-top-operation">
            <a class="btn btn-default" href="<?php echo e(action('\UiStacks\Pages\Controllers\PagesController@create')); ?>"><?php echo e(trans('Pages::pages.create')); ?> <?php echo e(trans('Pages::pages.page')); ?></a>
        </div>

        <?php if($items->count()): ?>
            <form method="POST" action="<?php echo e(action('\UiStacks\Pages\Controllers\PagesController@bulkOperations')); ?>" id="bulk" class="form-inline">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                
                                    
                                
                                <th><?php echo e(trans('Core::operations.id')); ?></th>
                                <th><?php echo e(trans('Pages::pages.name')); ?></th>
                                <th><?php echo e(trans('Pages::pages.url')); ?></th>
                                <th><?php echo e(trans('Core::operations.status')); ?></th>
                                <th><?php echo e(trans('Core::operations.operations')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr <?php if($item->trans): ?> data-title="<?php echo e($item->trans->name); ?>" <?php endif; ?>>
                                    
                                        
                                    
                                    <td><?php echo e($item->id); ?></td>
                                    <td>
                                        <?php if($item->trans): ?>
                                            <?php echo e($item->trans->title); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->page_url): ?>
                                            <a href="javascript:void(0);" onclick='return window.open("<?php echo e(url('/')); ?>/<?php echo e(Lang::getLocale()); ?>/pages/<?php echo e($item->page_url); ?>" , "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=200,width=1024,height=600");' ><?php echo e(url('/')); ?>/<?php echo e(Lang::getLocale()); ?>/pages/<?php echo e($item->page_url); ?></a>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($item->published == 1): ?>
                                            <?php echo e(trans('Core::operations.active')); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('Core::operations.inactive')); ?>

                                        <?php endif; ?>
                                    <td>
                                       <a href="<?php echo e(action('\UiStacks\Pages\Controllers\PagesController@edit', $item->id)); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('Core::operations.edit')); ?></a>
                                       
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>

                
                    
                     
                        
                        
                        
                        
                    
                
                

                <div class="table-footer">
                    <div class="count"><i class="fa fa-folder-o"></i> <?php echo e($items->total()); ?> <?php echo e(trans('Core::operations.item')); ?></div>
                    <div class="pagination-area"> <?php echo $items->render(); ?> </div>
                </div>
            </form>
        <?php else: ?>
            <div class="text-center">
                <?php if($_GET): ?>
                    <h1><?php echo e(trans('admin.no_results_found')); ?> <a href="<?php echo e(action('\UiStacks\Pages\Controllers\PagesController@index')); ?>"><?php echo e(trans('admin.back')); ?></a></h1>
                <?php elseif(Request::is(''.Lang::getlocale().'/admin/ads')): ?>
                    <h1><?php echo e(trans('admin.no_data_added_before')); ?> <a href="<?php echo e(action('\UiStacks\Pages\Controllers\PagesController@create')); ?>"><?php echo e(trans('Ads::ads.create')); ?> <?php echo e(trans('Ads::ads.ad')); ?></a></h1>
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