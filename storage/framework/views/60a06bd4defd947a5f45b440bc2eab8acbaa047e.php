<!-- fullwidth modal-->
<div class="modal fade in" id="full-width" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"><i class="livicon" data-name="trash" data-size="18" data-c="#F89A14" data-hc="#5CB85C" data-loop="true"></i> <?php echo e(trans('admin.delete_confirmation')); ?></h4>
            </div>
            <form action="<?php echo e(action('\UiStacks\Core\Controllers\OperationsController@delete')); ?>" method="POST" role="form">
                <input type="hidden" id="confirm-id" name="id" value="">
                <input type="hidden" name="table" value="<?php echo e($dbTable); ?>">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="modal-body">
                    <p>
                        <?php echo e(trans('admin.confirm_delete_msg')); ?>: <b><span id="confirm-title"></span></b> 
                        <?php if(Lang::getlocale() == 'ar'): ?> ؟ <?php else: ?> ? <?php endif; ?>
                    </p> 
                      
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger"><?php echo e(trans('admin.delete')); ?></button>
                    <button type="button" data-dismiss="modal" class="btn btn-warning"><?php echo e(trans('admin.cancel')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END modal-->