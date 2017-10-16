<?php 
    $languageCode = '';
    $fieldName = $field_name;
    $name = $name;
    $placeholder = $placeholder;

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

<div class="checkbox">
    <label>
        <input name="<?php echo e($fieldName); ?>" id="<?php echo e($fieldName); ?>" type="checkbox" value="1" class="minimal-blue" <?php if($value): ?> checked <?php endif; ?>> 
        <?php echo e($name); ?>

    </label>
</div>