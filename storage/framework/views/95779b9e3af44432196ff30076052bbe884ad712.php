<?php $__env->startSection('content'); ?>
    <style type="text/css">
        .blog-items{
            padding-left: 2px !important;
        }
    </style>
    <div class="sb-site-container">
        <?php echo $__env->make('website.home.blocks.top-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <div class="text-center">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Deals Page -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-4141596849655811"
                     data-ad-slot="8098943268"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div class="container">
            <h1 class="right-line">Blog</h1>
            <div class="alert alert-light alert-info">
                <p><strong><i class="zmdi zmdi-info"></i></strong>Learn to code and take control of your future.</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if(isset($items)): ?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="col-md-12 blog-items">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo e($item->trans->name); ?></h3>
                                    </div>
                                    <div class="card-block">
                                        <?php echo $item->trans->body; ?>

                                        <div class="">
                                            
                                            
                                            
                                            <span class="ml-1-test hidden-xs">
                                                <i class="zmdi zmdi-time mr-05 color-info"></i>
                                                <span class="color-medium-dark"><?php echo e(date("l jS \of F Y h:i:s A",strtotime($item->trans->created_at))); ?></span>
                                            </span>
                                            <span class="ml-1"><i class="zmdi zmdi-comments color-royal mr-05"></i> 25</span>
                                            <a href="<?php echo e(action('BlogController@detail',$item->slug)); ?>" class="btn btn-primary btn-sm animate-icon pull-right">Read more
                                                <i class="ml-1 no-mr zmdi zmdi-long-arrow-right"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    <?php endif; ?>
                </div>
                <!--<div class="col-md-3">
                    <div class="card card-success">
                        <div class="card-header">
                            <i class="fa fa-list-alt" aria-hidden="true"></i> Summary</div>
                        <div class="card-block">
                            <ul class="list-unstyled">
                                <li>
                                    <strong>Price: </strong> $1984.26</li>
                                <li>
                                    <strong>Tax: </strong> $47.22</li>
                                <li>
                                    <strong>Tax: </strong> $47.22</li>
                                <li>
                                    <strong>Shipping costs: </strong>
                                    <span class="color-warning">$5.25</span>
                                </li>
                            </ul>
                            <h3>
                                <strong>Total:</strong>
                                <span class="color-success">$2456.45</span>
                            </h3>
                            <a href="javascript:void(0)" class="btn btn-raised btn-success btn-block btn-raised mt-2 no-mb">
                                <i class="zmdi zmdi-shopping-cart-plus"></i> Purchase</a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <!-- container -->
        <?php echo $__env->make('website.regions.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <!-- sb-site-container -->
    <?php echo $__env->make('website.regions.leftbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>