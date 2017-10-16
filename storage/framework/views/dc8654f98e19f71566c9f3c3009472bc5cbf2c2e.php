<div class="panel panel-default panel-filter">
	<div class="panel-footer">

        <form action="" method="GET" class="form-inline">
        	
        	<?php 
		  		$nameValue = '';
		  		if(isset($_GET['name'])){
            		$nameValue = $_GET['name'];
            	}
		  	 ?>

		  	<?php echo $__env->make('Core::fields.input_text', [
                'field_name' => 'name',
                'name' => trans('Ads::ads.name'),
                'value' => $nameValue,
                'placeholder' => ''
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		  


            
            <?php 
            	$statusValue = '';
            	if(isset($_GET['status'])){
            		$statusValue = $_GET['status'];
            	}
             ?>

            <?php echo $__env->make('Core::fields.select', [
                'field_name' => 'status',
                'name' => trans('Core::operations.status'),
                'value' => $statusValue,
                'options' => [
                				['value' => '', 'name' => '-- '.trans('Core::operations.select').' --'],
                                ['value' => 1, 'name' => trans('Core::operations.active')],
                                ['value' => 2, 'name' => trans('Core::operations.inactive')]
                ]
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		  	<button type="submit" class="btn btn-default"><?php echo e(trans('Core::operations.filter')); ?></button>
		  	
		</form>

	</div>
</div>