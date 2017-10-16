<div class="panel panel-default panel-filter">
	<div class="panel-footer">

        <form action="" method="GET" class="form-inline">
               
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
                                ['value' => 1, 'name' => trans('Contactus::contactus.new') ],
                                ['value' => 2, 'name' => trans('Contactus::contactus.read') ],
                                ['value' => 3, 'name' => trans('Contactus::contactus.replied') ]
                ]
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		  	<button type="submit" class="btn btn-default"><?php echo e(trans('Core::operations.filter')); ?></button>
		  	<a href="<?php echo e(action('\UiStacks\Contactus\Controllers\ContactusController@index')); ?>" class="btn btn-default"><?php echo e(trans('Core::operations.reset')); ?></a>
		</form>

	</div>
</div>