<?php 
	$languageCode = '';
	$fieldName = $field_name;
	$fieldNameUnderscoreId = $fieldName.'_id';
	$name = $name;
	$options = $options;
    
	if(old($fieldName)){
		$value = old($fieldName);
	}elseif(isset($item) && isset($item->$fieldNameUnderscoreId)){
		$value = $item->$fieldNameUnderscoreId;
	}elseif(isset($item) && isset($item->$fieldName) && is_int($item->$fieldName)){
		$value = $item->$fieldName;
	}elseif(!isset($value)){
		$value = '';
	}

	$isMultiple = false;
	if(isset($multiple)){
		$isMultiple = true;
	}
	
	if(isset($lang["code"])){
		$languageCode = $lang["code"];
		$fieldName = $field_name.'_'.$lang["code"];

		if(old($fieldName)){
			$value = old($fieldName);
		}
		
		if(count($languages) > 1){
			$name = $name.' ('.$lang["name"].')';
		}

		if(isset($trans) && isset($trans[$languageCode]) && isset($trans[$languageCode][$field_name])){
			$value = $trans[$languageCode][$field_name];
		}

	}

 ?>

<div class="form-group <?php echo e($errors->has($fieldName) ? 'has-error': ''); ?>">
    <label for="<?php echo e($fieldName); ?>"><?php echo e($name); ?></label>
	<select id="<?php echo e($fieldName); ?>" name="<?php echo e($fieldName); ?>" class="form-control" <?php if(isset($dependOn)): ?> depend-on="<?php echo e($dependOn); ?>" <?php endif; ?> <?php if($isMultiple): ?> multiple <?php endif; ?>>
		 <?php if(count($options)): ?>
		    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		        <option <?php if($value == $option['value']): ?> selected <?php endif; ?> value="<?php echo e($option['value']); ?>" <?php if(isset($option['dependencyValue'])): ?> dependency-value="<?php echo e($option['dependencyValue']); ?>" <?php endif; ?>><?php echo e($option['name']); ?></option>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
	</select>
</div>