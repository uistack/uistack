





<link href="<?php echo e(asset('public/website_assets/css/toastr.min.css')); ?>" rel="stylesheet">
<script type="text/javascript">
    $(document).ready(function() {
        // Override global options
        <?php if(Session::get('alert-class') == "alert-success"): ?>
        toastr.success('<?php echo e(Session::get('message')); ?>', '<?php echo e(trans("Core::operations.success")); ?>', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        <?php elseif(Session::get('alert-class') == "alert-danger"): ?>
        toastr.error('<?php echo e(Session::get('message')); ?>', '<?php echo e(trans("Core::operations.error")); ?>', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        <?php elseif(Session::get('alert-class') == "alert-warning"): ?>
        toastr.warning('<?php echo e(Session::get('message')); ?>', '<?php echo e(trans("Core::operations.warning")); ?>', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        <?php elseif(Session::get('alert-class') == "alert-info"): ?>
        toastr.info('<?php echo e(Session::get('message')); ?>', '<?php echo e(trans("Core::operations.warning")); ?>', {timeOut: 0,extendedTimeOut: 60000, closeButton: true,"positionClass": "toast-bottom-right"})
        <?php endif; ?>
    });
</script>
<script src="<?php echo e(asset('public/website_assets/js/toastr.min.js')); ?>" type="text/javascript"></script>

<?php if(isset($errors) && $errors->count() > 0): ?>
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
