<!DOCTYPE html>
<html lang="en" data-language="en_in">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="google-site-verification" content="SFyYqjOTEsC0C7LQGvnfkkdZAIsifRNG6X1FEzrtcA0" />
    <title><?php echo e(\UiStacks\Settings\Models\Setting::find(1)->value); ?> - Web Transformation, Digital Consultant & IT infrastructure</title>
    <meta name="description" content="UiStacks a web design and development solution , at UiStacks our mission to help businesses throughout the world realize their potential.">
    <meta name="keywords" content="web development companies, node js web development in India, nodejs development company, nodejs development company in india, nodejs development company in patna, ROR website development company, web design & development company">
    <meta name="robots" content="index, follow"/>
    <meta name="author" Content="UiStacks Limited">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
<script type='application/ld+json'> 
{
  "@context": "http://www.schema.org",
  "@type": "Organization",
  "name": "UiStacks",
  "url": "https://www.uistacks.com/",
  "logo": "https://www.uistacks.com/public/website_assets/img/logo.png",
  "image": "https://www.uistacks.com/public/website_assets/img/logo.png",
  "description": "UiStacks a web design and development solution",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Pune",
    "addressLocality": "Pune",
    "addressRegion": "Maharashtra",
    "postalCode": "411014",
    "addressCountry": "India"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "18.5204",
    "longitude": "73.8567"
  },
  "openingHours": "Mo, Tu, We, Th, Fr 09:00-17:30",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+919403749126",
    "contactType": "Customer service"
  }
}
 </script>


    <!-- Facebook META -->
    <meta property="fb:app_id" content="112146496123745">
    <meta property="og:site_name" content="SyBace">
    <meta property="og:title" content="uistacks.com">
    <meta property="og:description" content="uistacks.com">
    <meta property="og:url" content="<?php echo e(url('/')); ?>">
    <meta property="og:image" content="<?php echo e(url('/')); ?>/public/website_assets/img/logo.png">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US" />

    
    <link rel="alternate" href="<?php echo e(url('/')); ?>/" hreflang="en" />
    <link rel="canonical" href="<?php echo e(url('/')); ?>/"/>
    <meta property="og:locale" content="en_US" />
    <meta name="language" content="english"/>

    <link rel="shortcut icon" href="<?php echo e(asset('public/website_assets/img/favicon.png?v=3')); ?>">
    <noscript id="deferred-styles">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="<?php echo e(asset('public/website_assets/css/preload.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/website_assets/css/plugins.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/website_assets/css/style.light-red-500.min.css')); ?>" />
    </noscript>
    <link rel="stylesheet" href="<?php echo e(asset('public/website_assets/css/main.css')); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo e(asset('public/website_assets/js/html5shiv.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/website_assets/js/respond.min.js')); ?>"></script>
    <![endif]-->

    <script type="text/javascript">
        var loadDeferredStyles = function() {
            var addStylesNode = document.getElementById("deferred-styles");
            var replacement = document.createElement("div");
            replacement.innerHTML = addStylesNode.textContent;
            document.body.appendChild(replacement)
            addStylesNode.parentElement.removeChild(addStylesNode);
        };
        var raf = requestAnimationFrame || mozRequestAnimationFrame ||
            webkitRequestAnimationFrame || msRequestAnimationFrame;
        if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
        else window.addEventListener('load', loadDeferredStyles);
    </script>

    
    
        
            
            
        
    
    <?php echo $__env->yieldContent('header'); ?>
</head>
<body>
<input type="hidden" id="base_path" value="<?php echo e(url('/')); ?>/" />
<!-- sb-site-container -->

<?php echo $__env->yieldContent('content'); ?>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    })(window,document,'script','<?php echo e(asset('public/ga.js')); ?>','ga');

    ga('create', 'UA-105177146-1', 'auto');
    ga('send', 'pageview');

</script>
<script src="<?php echo e(asset('public/website_assets/js/jquery-3.1.1.min.js')); ?>" type="text/javascript"></script>
<!---------------------------------- JS Files Link ---------------------------------->
<script defer src="<?php echo e(asset('public/website_assets/js/plugins.min.js')); ?>" type="text/javascript"></script>
<script defer src="<?php echo e(asset('public/website_assets/js/app.min.js')); ?>" type="text/javascript"></script>
<script defer src="<?php echo e(asset('public/website_assets/js/index.js')); ?>" type="text/javascript"></script>
<script defer src="<?php echo e(asset('public/website_assets/js/main.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
    var javascript_site_path = "<?php echo e(url('/')); ?>" + "/";
    // Load country areas
    $('#country1').on("change", function() {
        var selectedValues = $('#country1').val();
        $.ajax({
            type: "POST",
            url: javascript_site_path + "get-selected-cities",
            data: {
                selectedValues: selectedValues
            },
            success: function(data) {
                $("#area1").html(data);
                $('#area1').selectpicker('refresh');
            }
        });
    });
</script>
<script type="text/javascript">
    // Load country areas
    $('#country').on("change", function() {
        var selectedValues = $('#country').val();
        $.ajax({
            type: "POST",
            url: javascript_site_path + "get-selected-cities",
            data: {
                selectedValues: selectedValues
            },
            success: function(data) {
                $("#area").html(data);
                $('#area').selectpicker('refresh');


            }
        });
    });
</script>
<link rel="stylesheet" href="<?php echo e(asset('public/website_assets/intl-telephone/css/intlTelInput.css')); ?>">
<script defer src="<?php echo e(asset('public/website_assets/intl-telephone/js/intlTelInput.min.js')); ?>" type="text/javascript"></script>
<?php
$countries = UiStacks\Countries\Models\Country::where(array('active'=> 1))->get();
$all_iso = [];
if(count($countries)){
    foreach ($countries as $cntry => $country){
//            echo $country->trans['iso_code'];
        $all_iso[] = strtolower($country->trans['iso_code']);
    }
    $isoCodes = json_encode($all_iso);
}else{
    $isoCodes = [];
}
?>
<script type="text/javascript">
    $(function() {
        $('#frm_registration')
            .find('[name="phone"]')
            .intlTelInput({
                preferredCountries: ['in', 'us'],
                onlyCountries: <?php echo $isoCodes; ?>,
                utilsScript: '<?php echo e(asset('public/website_assets/intl-telephone/js/utils.js')); ?>',
//                autoPlaceholder: true
            });
//        $.fn.modal.Constructor.prototype.enforceFocus = enforceModalFocusFn;
    });
</script>

<script defer src="<?php echo e(asset('public/website_assets/js/jquery.validate.js')); ?>" type="text/javascript"></script>
<script defer src="<?php echo e(asset('public/website_assets/js/customize/user.js')); ?>" type="text/javascript"></script>
<?php echo $__env->make('website.blocks.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('footer'); ?>
</body>
</html>