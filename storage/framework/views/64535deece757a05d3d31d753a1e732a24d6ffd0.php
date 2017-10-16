<?php 
    $breadcrumbs = [
    ['url' => '', 'name' => trans('Contactus::contactus.contactus')]
    ];

    $dbTable = '';
    if($items->count()){
    $dbTable = $items[0]['table'];
    }

 ?>


<?php $__env->startSection('page_title'); ?>
    <?php echo e(trans('Contactus::contactus.contactus')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Include single delete confirmation model -->
    <?php echo $__env->make('Core::modals.confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- Include bulk delete confirmation model -->
    <?php echo $__env->make('Core::modals.bulk-confirm-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="admin-top-operation">
            </div>
            <?php if($items->count() || $_GET): ?>
                <?php echo $__env->make('Contactus::contactus.filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
            <?php if($items->count()): ?>
                <form method="POST" action="<?php echo e(url('/')."/ar/admin/contactus/bulk-operations"); ?>" id="bulk" class="form-inline">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="check_all" id="checkall">
                                </th>
                                <th><?php echo e(trans('Core::operations.id')); ?></th>
                                <th><?php echo e(trans('Contactus::contactus.nameEmail')); ?></th>
                                <th> <?php echo e(trans('Contactus::contactus.section')); ?>

                                <th><?php echo e(trans('Contactus::contactus.date')); ?></th>
                                <th><?php echo e(trans('Contactus::contactus.replied')); ?></th>
                                <th><?php echo e(trans('Contactus::contactus.view')); ?></th>
                                <th> <?php echo e(trans('Contactus::contactus.status')); ?> </th>
                                <th><?php echo e(trans('Contactus::contactus.delete')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php if(isset($items)): ?>
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if(isset($item->trans)): ?>
                                        <tr <?php if($item->trans): ?> data-title="<?php echo e($item->trans->name); ?>" <?php endif; ?>>
                                            <td>
                                                <input type="checkbox" name="ids[]" class="check_list" value="<?php echo e($item->id); ?>">
                                            </td>
                                            <td><?php echo e($item->id); ?></td>
                                            <td>
                                                <?php if($item->trans): ?>
                                                    <?php echo e($item->trans->store_name); ?>/<?php echo e($item->trans->contact_email); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->trans->section_id): ?>
                                                    <?php
                                                    $sec = UiStacks\Contactus\Models\ContactusSectionTrans::where(array('section_id' => $item->trans->section_id,'lang' => Lang::getlocale()))->first();
                                                    if (isset($sec)) {
                                                        echo $sec->name;
                                                    }
                                                    ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->trans): ?>
                                                    <?php echo e($item->trans->created_at); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($item->trans): ?>
                                                    <?php if($item->trans->is_reply==1): ?>
                                                        <?php echo e(trans('Contactus::contactus.replied_status')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(trans('Contactus::contactus.not_replied_status')); ?>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('/')); ?>/<?php echo e(Lang::getLocale()); ?>/admin/contactus/<?php echo e($item->id); ?>"><i class="fa fa-eye"></i> <?php echo e(trans('Contactus::contactus.viewReply')); ?></a>
                                            </td>
                                            <td>
                                                <?php if($item->trans->is_read == true): ?>
                                                    <a href='<?php echo e(url('/')."/".Lang::getLocale()."/"."admin/contactus/change-status/".$item->id); ?>' class='label label-success'><?php echo e(trans('Contactus::contactus.read')); ?> </a>
                                                <?php else: ?>
                                                    <a href='<?php echo e(url('/')."/".Lang::getLocale()."/"."admin/contactus/change-status/".$item->id); ?>' class='label label-danger'> <?php echo e(trans('Contactus::contactus.unread')); ?></a>
                                                <?php endif; ?>
                                                
                                                    
                                                
                                                    
                                                
                                            </td>
                                            <td>
                                                <a onclick="confirmDelete(this)" data-toggle="modal" data-href="#full-width" data-id="<?php echo e($item->id); ?>" <?php if($item->trans): ?> data-title="<?php echo e($item->trans->contact_name); ?>/<?php echo e($item->trans->contact_email); ?>" <?php endif; ?> href="#full-width"><i class="fa fa-trash"></i> <?php echo e(trans('Core::operations.delete')); ?></a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php else: ?>
                                <?php echo e(trans('Contactus::contactus.no_message_found')); ?>

                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="operation"><?php echo e(trans('Core::operations.with_select')); ?></label>
                        <select name="operation" id="operation" class="form-control" required="required">
                            <option value="">- <?php echo e(trans('Core::operations.select')); ?> -</option>
                            
                            
                            <option value="read"><?php echo e(trans('Contactus::contactus.read')); ?></option>
                            <option value="unread"><?php echo e(trans('Contactus::contactus.unread')); ?></option>
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
                    <h1><?php echo e(trans('admin.no_results_found')); ?>

                        
                    </h1>
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