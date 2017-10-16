<?php $__env->startSection('content'); ?>
    <input type="hidden" id="section_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.section_req_validation_msg')); ?>"/>
    <input type="hidden" id="contact_phone_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_phone_req_validation_msg')); ?>"/>
    <input type="hidden" id="contact_phone_valid_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_phone_valid_validation_msg')); ?>"/>
    <input type="hidden" id="contact_email_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_email_req_validation_msg')); ?>"/>
    <input type="hidden" id="contact_email_valid_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_email_valid_validation_msg')); ?>"/>
    <input type="hidden" id="contact_message_req_validation_msg" value="<?php echo e(trans('Contactus::contactus.contact_message_req_validation_msg')); ?>"/>

    <div class="sb-site-container">
        <?php echo $__env->make('website.home.blocks.top-head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('website.regions.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="ms-hero-bg-primary ms-hero-img-mountain">
                            <h3 class="color-white index-1 text-center pb-4 pt-4 no-mb">Frequently Asked Questions</h3>
                        </div>
                        <div class="panel-group ms-collapse no-margin" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php if(isset($item)): ?>
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $faq): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="panel panel-primary">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title ms-rotate-icon">
                                                <a class="withripple" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-<?php echo e($k); ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="zmdi zmdi-attachment-alt"></i> <?php echo e(ucfirst(strtolower($faq->trans->name))); ?> </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne-<?php echo e($k); ?>" class="panel-collapse collapse <?php if($k == "0"): ?> in <?php endif; ?>" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p><?php echo $faq->trans->description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                        <div class="ms-hero-bg-primary ms-hero-img-mountain">
                            <h3 class="color-white index-1 text-center pb-4 pt-4 no-mb">Contact Us</h3>
                        </div>
                        <div class="card-block">
                            <h3 class="color-primary">You have more questions?</h3>
                            <?php echo $__env->make('website.blocks.page-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <form class="" id="contact_form" method="post" action="<?php echo e(action('FaqController@faqContact')); ?>">
                                <div class="form-group label-floating">
                                    <label for="inputName" class="control-label">Name</label>
                                    <input type="text" class="form-control" name="store_name" id="store_name" placeholder="">
                                </div>
                                <div class="form-group label-floating">
                                    <label for="inputEmail" class="control-label">Email</label>
                                    <input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="">
                                </div>
                                <div class="form-group label-floating">
                                    
                                    <input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Phone">
                                </div>
                                <div class="form-group label-floating">
                                    <label for="inputSubject" class="control-label">Subject</label>
                                    <input type="text" class="form-control" name="contact_subject" id="contact_subject" placeholder="">
                                </div>
                                <div class="form-group label-floating">
                                    <label for="textArea" class="control-label">Message</label>
                                    
                                    <textarea class="form-control" id="contact_message" name="contact_message" placeholder=""></textarea>
                                </div>
                                <div class="form-group text-right">
                                    <button type="button" class="btn btn-danger">Cancel</button>
                                    <button type="submit" class="btn btn-raised btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
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
    <script src="<?php echo e(asset('public/website_assets/intl-telephone/js/intlTelInput.min.js')); ?>" type="text/javascript"></script>
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
            allowDropdown: true,
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
    <script src="<?php echo e(asset('public/website_assets/js/customize/contact-us.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>