<?php 
	$languageCode = '';
	$fieldName = $field_name;
	$name = $name;
	$placeholder = $placeholder;
	
	// rows
	if(isset($rows)){
		$rows = $rows;
	}else{
		$rows = 10;
	}

	// Class
	if(isset($class)){
		$class = $class;
	}else{
		$class = '';
	}

	if(old($fieldName)){
		$value = old($fieldName);
	}elseif(isset($item) && isset($item->$fieldName)){
		$value = $item->$fieldName;
	}elseif(!isset($value)){
		$value = '';
	}

	if(isset($lang["code"])){
		$languageCode = $lang["code"];
		$fieldName = $field_name.'_'.$lang["code"];
		
		if(old($fieldName)){
			$value = old($fieldName);
		}

		if(count($languages) > 1){
			$name = $name.' ('.$lang["name"].')';
			$placeholder = $placeholder.' ('.$lang["name"].')';
		}

		if(isset($trans) && isset($trans[$languageCode]) && isset($trans[$languageCode][$field_name])){
			$value = $trans[$languageCode][$field_name];
		}
	}
 ?>

<div class="form-group <?php echo e($errors->has($fieldName) ? 'has-error': ''); ?>">
    <label for="<?php echo e($fieldName); ?>"><?php echo e($name); ?></label>
    <textarea id="<?php echo e($fieldName); ?>" name="<?php echo e($fieldName); ?>" class="form-control <?php echo e($class); ?>" placeholder="<?php echo e($placeholder); ?>" rows="<?php echo e($rows); ?>"><?php echo e($value); ?></textarea>
</div>