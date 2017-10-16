<?php if(isset($errors) && $errors->count() > 0): ?>
    <div class="alert alert-danger" style="margin-top: 10px;">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </div>
<?php endif; ?>