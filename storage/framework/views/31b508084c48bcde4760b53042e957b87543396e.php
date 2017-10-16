<?php 
    $breadcrumbs = [
    ['url' => '', 'name' => trans('Emailtemplates::emailtemplate.emailtemplates')]
    ];

    $dbTable = '';
    if($items->count()){
    $dbTable = $items[0]['table'];
    }

 ?>


<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Emailtemplates::emailtemplate.emailtemplates')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            
                
            
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(trans('Core::operations.id')); ?></th>
                        <th><?php echo e(trans('Emailtemplates::emailtemplate.subject')); ?></th>
                        <th><?php echo e(trans('Emailtemplates::emailtemplate.action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td>
                                <?php if(isset($item->trans->subject)): ?>
                                    <?php echo e(trim($item->trans->subject)); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(action('\UiStacks\Emailtemplates\Controllers\EmailTemplatesController@edit', $item->id)); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('Core::operations.edit')); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>