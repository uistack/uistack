<?php 
	$languageCode = '';
	$fieldName = $field_name;
	$name = $name;
	$placeholder = $placeholder;
	
	if(isset($type)){
		$type = $type;
	}else{
		$type = "text";
	}

	if(old($fieldName)){
		$value = old($fieldName);
	}elseif(isset($item) && isset($item->$fieldName) && $type !== 'password'){
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
    <input type="<?php echo e($type); ?>" class="form-control" id="<?php echo e($fieldName); ?>" name="<?php echo e($fieldName); ?>" value="<?php echo e($value); ?>" placeholder="<?php echo e($placeholder); ?>">
    <?php if(isset($help)): ?>
    	<p class="help-block"><?php echo $help; ?></p>
    <?php endif; ?>
</div>