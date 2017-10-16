<?php if(count($languages) && count($languages) > 1): ?>
    <div class="form-group">
        <label  style="text-align: center; width:100%;"><?php echo e(trans('admin.languages')); ?></label>
        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="checkbox">
                <label for="lang-<?php echo e($lang["code"]); ?>">
                  <input type="checkbox" name="language[<?php echo e($lang["code"]); ?>]" id="lang-<?php echo e($lang["code"]); ?>" value="<?php echo e($lang["code"]); ?>"
                    <?php if($lang["content_default"] === true && empty(old('language.'.$lang["code"])) || old('language.'.$lang["code"].'') == $lang["code"]): ?> checked <?php endif; ?>


                    > <?php echo e($lang["name"]); ?>

                </label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>
    <hr>
<?php elseif(count($languages) == 1): ?>
    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <input type="checkbox" name="language[<?php echo e($lang["code"]); ?>]" id="lang-<?php echo e($lang["code"]); ?>" value="<?php echo e($lang["code"]); ?>" checked style="display: none;">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>