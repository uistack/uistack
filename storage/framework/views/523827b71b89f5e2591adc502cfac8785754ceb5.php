<?php $__env->startSection('content'); ?>
    <div class="sb-site-container">
    <?php echo $__env->make('website.home.blocks.top-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('website.marketplace.blocks.banner', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="ms-bg-fixed mb-6 mt-4">
            <div class="container text-center">
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
    <!-- ms-hero ms-hero-black -->
        <div class="wrap bg-warning">
            <div class="container">
                
                    
                
                <h1 class="color-white text-center mb-4">Latest Offers</h1>
                <div class="row masonry-container">
                    <?php
                    $count = 0;
                    $end = 1;
                    if(isset($list)){
                        foreach ($list as $key => $data) {
                            $count++;
                            $end = 0;
?>

                        <div class="col-md-3 col-sm-6 masonry-item wow fadeInUp animation-delay-2">
                            <div class="card">
                                <div class="card-block text-center">
                                    <a href="<?php echo e($data['url']); ?>">
                                        <img src="<?php echo e($data['imageUrls'][0]['url']); ?>" alt="" class="img-responsive center-block">
                                    </a>
                                    <h4 class="text-normal text-center"><?php echo e($data['title']); ?></h4>
                                    <p><?php echo e($data['description']); ?></p>
                                    
                                        
                                            
                                        
                                        
                                    
                                    <a href="<?php echo e($data['url']); ?>" class="btn btn-primary btn-sm btn-block btn-raised mt-2 no-mb">
                                        <i class="zmdi zmdi-shopping-cart-plus"></i> By Now</a>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- container -->
        </div>
        <div class="container mt-6">
            <h1 class="text-center mb-4">Products</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Filter List</h3>
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-8">
                                    <form class="form-horizontal" id="Filters">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <h4 class="mb-1 no-mt">Devices</h4>
                                                    <div class="form-group no-mt">
                                                        <div class="checkbox ml-2">
                                                            <label>
                                                                <input type="checkbox" value=".smartphone"> Smartphones </label>
                                                        </div>
                                                        <div class="checkbox  ml-2">
                                                            <label>
                                                                <input type="checkbox" value=".tablet"> Tablets </label>
                                                        </div>
                                                        <div class="checkbox  ml-2">
                                                            <label>
                                                                <input type="checkbox" value=".laptop"> Laptops </label>
                                                        </div>
                                                        <div class="checkbox  ml-2">
                                                            <label>
                                                                <input type="checkbox" value=".accessory"> Accesories </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <h4 class="mb-1">Brand</h4>
                                                    <div class="form-group no-mt">
                                                        <div class="checkbox  ml-2">
                                                            <label>
                                                                <input type="checkbox" value=".apple"> Apple </label>
                                                        </div>
                                                        <div class="checkbox  ml-2">
                                                            <label>
                                                                <input type="checkbox" value=".microsoft"> Microsoft </label>
                                                        </div>
                                                        <div class="checkbox  ml-2">
                                                            <label>
                                                                <input type="checkbox" value=".samsung"> Samsung </label>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form class="form-horizontal">
                                        <h4>Sort by</h4>
                                        <select id="SortSelect" class="form-control selectpicker">
                                            <option value="random">Popular</option>
                                            <option value="price:asc">Price ASC</option>
                                            <option value="price:desc">Price DESC</option>
                                            <option value="date:asc">Release ASC</option>
                                            <option value="date:desc">Release DESC</option>
                                        </select>
                                    </form>
                                    <button class="btn btn-danger btn-block no-mb mt-2" id="Reset">
                                        <i class="zmdi zmdi-delete"></i> Clear Filters</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row" id="Container">
                        <?php
                        $count = 0;
	$end = 1;
	//Make sure there are products in the list.
	if(isset($products) && count($products) > 0){
		foreach ($products as $product) {
			//Hide out-of-stock items unless requested.
			$inStock = $product['productBaseInfo']['productAttributes']['inStock'];
			if(!$inStock && $hidden)
				continue;
			
			//Keep count.
			$count++;
			//The API returns these values nested inside the array.
			//Only image, price, url and title are used in this demo
			$productId = $product['productBaseInfo']['productIdentifier']['productId'];
			$title = $product['productBaseInfo']['productAttributes']['title'];
			$productDescription = $product['productBaseInfo']['productAttributes']['productDescription'];
			//We take the 200x200 image, there are other sizes too.
			$productImage = array_key_exists('200x200', $product['productBaseInfo']['productAttributes']['imageUrls'])?$product['productBaseInfo']['productAttributes']['imageUrls']['200x200']: url('/').'/public/website_assets/img/deafult-product.png';
			$sellingPrice = $product['productBaseInfo']['productAttributes']['sellingPrice']['amount'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];
			$productBrand = $product['productBaseInfo']['productAttributes']['productBrand'];
			$color = $product['productBaseInfo']['productAttributes']['color'];
			$productUrl = $product['productBaseInfo']['productAttributes']['productUrl'];
			//Setting up the table rows/columns for a 3x3 view.
			$end = 0;
			
                        ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 masonry-item wow fadeInUp animation-delay-2">
                            <div class="card">
                                <div class="card-block text-center">
                                    <a target="_blank" href="<?php echo e($productUrl); ?>">
                                        <img src="<?php echo e($productImage); ?>" alt="" class="img-responsive center-block">
                                    </a>
                                    <h4 class="text-normal text-center"><?php echo e($title); ?></h4>
                                    <!--<p>Quibusdam aperiam tempora ut blanditiis cumque ab pariatur.</p>-->
                      <!--              <div class="mt-2">-->
                      <!--<span class="mr-2">-->
                      <!--  <i class="zmdi zmdi-star color-warning"></i>-->
                      <!--  <i class="zmdi zmdi-star color-warning"></i>-->
                      <!--  <i class="zmdi zmdi-star color-warning"></i>-->
                      <!--  <i class="zmdi zmdi-star color-warning"></i>-->
                      <!--  <i class="zmdi zmdi-star"></i>-->
                      <!--</span>-->
                      <!--                  <span class="ms-tag ms-tag-success">$ 1999.99</span>-->
                      <!--              </div>-->
                                    <a target="_blank" href="<?php echo e($productUrl); ?>" class="btn btn-primary btn-sm btn-block btn-raised mt-2 no-mb">
                                        <i class="zmdi zmdi-shopping-cart-plus"></i> Buy it Now</a>
                                </div>
                            </div>
                        </div>
                        <?php
		}
	}
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!--container -->
        <?php echo $__env->make('website.regions.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <script defer src="<?php echo e(asset('public/website_assets/js/ecommerce.js')); ?>" type="text/javascript"></script>
    </div>
    <?php echo $__env->make('website.regions.leftbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>