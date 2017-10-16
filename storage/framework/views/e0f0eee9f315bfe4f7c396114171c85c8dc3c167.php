<?php $__env->startSection('content'); ?>
<div class="sb-site-container">
    <?php echo $__env->make('website.home.blocks.top-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="ms-hero-page-override ms-hero-img-city ms-hero-bg-primary">
        <div class="container">
            <div class="text-center">
                <span class="ms-logo ms-logo-lg ms-logo-white center-block mb-2 mt-2 animated zoomInDown animation-delay-5">SB</span>
                <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">
                    <?php echo e($item->trans->title); ?>

                </h1>
                
                    
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card card-hero animated slideInUp animation-delay-8 mb-6">
            <div class="card-block">
                
                <div class="row">
                    <?php echo $item->trans->body; ?>

                    
                        
                            
                        
                            
                    
                    
                        
                            
                        
                            
                    
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    <?php echo $__env->make('website.regions.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php echo $__env->make('website.regions.leftbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>