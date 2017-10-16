
<?php $__env->startSection('content'); ?>
    <input type="hidden" id="section_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.section_req_validation_msg')); ?>"/>
    <input type="hidden" id="store_name_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.store_name_req_validation_msg')); ?>"/>
    <input type="hidden" id="instagram_link_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.instagram_link_req_validation_msg')); ?>"/>
    <input type="hidden" id="instagram_link_valid_validation_msg" value="<?php echo e(trans('Contactus::contactus.instagram_link_valid_validation_msg')); ?>"/>
    <input type="hidden" id="type_of_request_detail_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.type_of_request_detail_req_validation_msg')); ?>"/>
    <input type="hidden" id="contact_phone_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_phone_req_validation_msg')); ?>"/>
    <input type="hidden" id="contact_phone_valid_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_phone_valid_validation_msg')); ?>"/>
    <input type="hidden" id="contact_email_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_email_req_validation_msg')); ?>"/>
    <input type="hidden" id="contact_email_valid_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_email_valid_validation_msg')); ?>"/>
    <input type="hidden" id="contact_message_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_message_req_validation_msg')); ?>"/>
    <div class="sb-site-container">
        <?php echo $__env->make('website.home.blocks.top-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="ms-bg-fixed mb-6 mt-4">
            <div class="container text-center">
                <script async defer src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Home Page -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-4141596849655811"
                     data-ad-slot="5097375401"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="card card-primary animated fadeInUp animation-delay-7">
                        <div class="ms-hero-bg-primary ms-hero-img-mountain">
                            <h2 class="text-center no-m pt-4 pb-4 color-white index-1"><?php echo e(trans('Contactus::contactus.page_title')); ?></h2>
                        </div>
                        <div class="card-block">
                            <?php echo $__env->make('website.blocks.page-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <form class="form-horizontal" id="contact_form" method="post">
                                <fieldset>
                                    
                                        
                                        
                                            
                                                
                                                
                                                    
                                                        
                                                            
                                                        
                                                    
                                                
                                            
                                        
                                    
                                    <div class="form-group">
                                        <label for="Name" class="col-md-2 control-label">Name </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="store_name" id="store_name" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="<?php echo e(trans('Contactus::contactus.email')); ?>"><?php echo e(trans('Contactus::contactus.email')); ?> </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="<?php echo e(trans('Contactus::contactus.email')); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Name" class="col-md-2 control-label">Phone </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSubject" class="col-md-2 control-label"><?php echo e(trans('Contactus::contactus.subject')); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="contact_subject" id="contact_subject" placeholder="<?php echo e(trans('Contactus::contactus.subject')); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="<?php echo e(trans('Contactus::contactus.message')); ?>"> Message</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="contact_message" name="contact_message" placeholder="<?php echo e(trans('Contactus::contactus.message')); ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-2">
                                            <button class="btn btn-warning btn-raised" type="submit"><i class="fa fa-send"></i> <?php echo e(trans('Contactus::contactus.send_btn')); ?></button>
                                            <button type="button" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="card card-primary animated fadeInUp animation-delay-7">
                        <div class="card-block">
                            <div class="text-center mb-2">
                                <span class="ms-logo ms-logo-sm mr-1">SB</span>
                                <h3 class="no-m ms-site-title">Sy
                                    <span>Bace</span>
                                </h3>
                            </div>
                            <address class="no-mb">
                                
                                    
                                
                                <p>
                                    <i class="color-warning-light zmdi zmdi-map mr-1"></i> <?php echo e(\UiStacks\Settings\Models\Setting::find(2)->value); ?>

                                </p>
                                <p>
                                    <i class="color-info-light zmdi zmdi-email mr-1"></i>
                                    <a href="mailto:<?php echo e(\UiStacks\Settings\Models\Setting::find(3)->value); ?>"><?php echo e(\UiStacks\Settings\Models\Setting::find(3)->value); ?></a>
                                </p>
                                <p>
                                    <i class="color-royal-light zmdi zmdi-phone mr-1"></i><?php echo e(\UiStacks\Settings\Models\Setting::find(4)->value); ?> </p>
                                <p>
                                    <i class="color-success-light fa fa-fax mr-1"></i><?php echo e(\UiStacks\Settings\Models\Setting::find(31)->value); ?> </p>
                            </address>
                        </div>
                    </div>
                    <div class="card card-primary animated fadeInUp animation-delay-7">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="zmdi zmdi-map"></i>Map</h3>
                        </div>
                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA75QloU3HhpSAadRbOqLwMnMGsrZw9t0U'></script><div style='overflow:hidden;height:350px;width:360px;'><div id='gmap_canvas' style='height:350px;width:360px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='http://maps-website.com/'>google map wordpress widget</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=0dbaad1270aed7c9a22b9416f4f74179fe92983c'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(25.5938179,85.16053319999992),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(25.5938179,85.16053319999992)});infowindow = new google.maps.InfoWindow({content:'<strong>SYBACE</strong><br>Kankarbagh<br>800026 Patna<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('website.regions.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('website.regions.leftbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/website_assets/intl-telephone/css/intlTelInput.css')); ?>">
    <script async defer src="<?php echo e(asset('public/website_assets/intl-telephone/js/intlTelInput.min.js')); ?>" type="text/javascript"></script>
    <?php
    $countries = \UiStacks\Countries\Models\Country::where(array('active'=> 1))->get();
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
    <script>
        $("#contact_phone").intlTelInput({
//             allowDropdown: false,
//             autoHideDialCode: false,
//             dropdownContainer: "body",
//             excludeCountries: ["us"],
//             formatOnDisplay: false,
//             geoIpLookup: function(callback) {
//               $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
//                 var countryCode = (resp && resp.country) ? resp.country : "";
//                 callback(countryCode);
//               });
//             },
//             initialCountry: "auto",
//             nationalMode: false,
//             onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
//             placeholderNumberType: "MOBILE",
//             preferredCountries: ['cn', 'jp'],
//             separateDialCode: true,
            preferredCountries: ['in', 'us'],
            autoPlaceholder: true,
            onlyCountries: <?php echo $isoCodes; ?>,
            utilsScript: '<?php echo e(asset('public/website_assets/intl-telephone/js/utils.js')); ?>'
        });
    </script>
    <script defer src="<?php echo e(asset('public/website_assets/js/customize/contact-us.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>