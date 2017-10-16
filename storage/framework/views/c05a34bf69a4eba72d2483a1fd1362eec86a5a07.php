<?php if(count($languages)): ?>
<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
<script>
  field_<?php echo e($lang['code']); ?> = document.getElementById('lang-<?php echo e($lang['code']); ?>');
  if (field_<?php echo e($lang['code']); ?>) {
   target_<?php echo e($lang['code']); ?> = document.getElementById('group-<?php echo e($lang['code']); ?>');
   // Hide the target field if field isn't "Yes"
   if (!field_<?php echo e($lang['code']); ?>.checked) target_<?php echo e($lang['code']); ?>.style.display='none';

   field_<?php echo e($lang['code']); ?>.onchange=function() {
    if (this.checked) {
                     target_<?php echo e($lang['code']); ?>.style.display = '';
                  } else {
              target_<?php echo e($lang['code']); ?>.style.display='none';
    }
   }
  }
  </script>
 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
 <?php endif; ?>