$(document).ready(function() {

    // 
    // Header Onhover fade effect
    //
    $('.ch-nav__item > a, .ch-nav__dropdown, .ch-nav__more').hover(function(){
        $('.ch-nav__item > a, .ch-nav__dropdown, .ch-nav__more').not(this).addClass('ch-nav__hovered');
    },function(){
        $('.ch-nav__item > a, .ch-nav__dropdown, .ch-nav__more').removeClass('ch-nav__hovered');
    });


    // 
    // Header Onhover Product dropdown fade effect
    //
    $('.ch-dropdown__item').hover(function(){
        $('.ch-dropdown__item').not(this).addClass('ch-dropdown__item--hovered');
    },function(){
        $('.ch-dropdown__item').removeClass('ch-dropdown__item--hovered');
    });



    // 
    // Header Onclick to open navigation
    //
    $("[data-ch-dd]").click(function() {
      $(this).toggleClass("ch-nav__item--active");

    // 
    // Addclass for animation trigger delay
    //
      $("[data-ch-product]").addClass("ch-nav__item--animate");
      setTimeout(function () { 
            $('[data-ch-product]').removeClass('ch-nav__item--animate');
        }, 2000);

    });

    
    // 
    // Onclick body click to close navigation
    //
    $('body').click(function(e){
        $('[data-ch-dd]').each(function(){
            if(!$(e.target).attr('data-ch-dd') && $(this).has(e.target).length ===0 && $(this).hasClass('ch-nav__item--active')){
                $(this).removeClass("ch-nav__item--active");
            }
        })
       
    });


    // 
    // Onclick mobile nav toggle
    //
    $("[data-ch-mnav]").click(function() {
      $("#ch-js-overlay").toggleClass("ch-mnav-overlay--hide");
      $("#ch-js-nav").toggleClass("ch-mnav--hide");
    });


    // 
    // Mobile nav list animation duration added.  Add = ch-mnav__animate
    //
    function domino(selector, add, dur) {
      selector = $(String(selector));
      selector.each(function() {
        var index = $(this).index();
        var that = $(this);
        dur = dur || 100;
        index = index * dur;
        setTimeout(function() {
          if (add == "add") {
            that.addClass("ch-mnav__animate");
          } else {
            that.removeClass("ch-mnav__animate");
          }
        }, index);
      });
    }


    // 
    // Animation class added based on the 'Add' Class refer above
    //
    $("[data-ch-mnav]").click(function() {
        if($(this).is($("#ch-js-burger"))){
            $('body').css("overflow","hidden");
            domino(".ch-mnav__item", "add");
            domino(".ch-mnav__title", "add");
        }else{
            $('body').css("overflow","visible");
            domino(".ch-mnav__item", "remove");
            domino(".ch-mnav__title", "remove");
        }
    });


    

    lastScroll = 0;
    $(window).on('scroll',function() {    
        var scroll = $(window).scrollTop();
        if(lastScroll > scroll && scroll > 250) {
            $(".header-fixed").addClass("headsup");
        } else {
            $(".header-fixed").removeClass("headsup");
    		$(".header-fixed .dropdown").removeClass("open");	
        }
        lastScroll = scroll;
    });

    //On scroll fix the header.
    lastScrolledVal = 0
    headerFixed = false;
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        if(scroll > lastScrolledVal && scroll >= 300 && !headerFixed){
            var cloned = $('#ch-js-header').clone(true);
            $(cloned).attr('id', 'ch-js-header-cloned');
            $(cloned).addClass('l-header--fixed');
            $('body').append(cloned);
            headerFixed = true;
        }else if(scroll < lastScrolledVal && scroll < 300 && headerFixed){
            $('#ch-js-header-cloned').remove();
            headerFixed = false;
        }
        lastScrolledVal = scroll;
    });


    // fixed header links hover effect 
    $('.header-fixed a,.header-alt a, .header-top a,.nav-main a').hover(function(){
        $('.header-fixed a,.header-alt a,.nav-more, .header-top a,.nav-main a').not(this).addClass('hover-effect');
    },function(){
        $('.header-fixed a,.header-alt a,.nav-more, .header-top a,.nav-main a').removeClass('hover-effect');
    })

    //trigger menu icon on mobile
    var trigger = $('#hamburger'),
        isClosed = false;

    trigger.click(function () {
      burgerTime();
    });

    function burgerTime() {
      if (isClosed == true) {
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        $('body').removeClass('nav-active-mobile');
        isClosed = false;
      } else {
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        $('body').addClass('nav-active-mobile');
        isClosed = true;
      }
    }

    // Autofocus for modal input
    $('.modal').on('shown.bs.modal', function() {
      $(this).find('[autofocus]').focus();
    });

    // Latest Blog Post in the footer
    var recentBlog = "/blog/recent.json";

    $.getJSON(recentBlog, function (json) {
        $('.cf-blog__title').text(json.title);
        $('.cf-blog__figure').attr("src", json.image_thumbnail);

        // Caching the link jquery object
        var $recentBloglink = $('a.cf-blog__container');

        // Set the links properties
        $recentBloglink.prop({
            href: json.url,
            title: 'Click to open in a new tab'
        }).click(function (e) {
            e.preventDefault();
            window.open(this.href, '_blank');
        });
    });

    $( ".sign-in" ).click(function() {
        ga('send', 'event', 'website', 'click', 'app-sign-in');
    });

    $( ".button-signup" ).click(function() {
        ga('send', 'event', 'website', 'signup-intent', 'button-signup');
    });

    $( ".footer-button-signup" ).click(function() {
        ga('send', 'event', 'website', 'signup-intent', 'footer-button-signup');
    });

    $( "#ch-js-product" ).click(function() {
        ga('send', 'event', 'website', 'explore-intent', 'product-dropdown');
    });

    $( ".nav-customers" ).click(function() {
        ga('send', 'event', 'website', 'explore-intent', 'nav-customers');
    });

    $( ".l-footer a" ).click(function() {
        var flink = $(this).attr('href').replace(/\//g,"");
        ga('send', 'event', 'website', 'footer-links', flink);
    });

    $( ".l-header a" ).click(function() {
        var nlink = $(this).attr('href').replace(/\//g,"");
        ga('send', 'event', 'website', 'nav-links', nlink);
    });



    var uri = $(location).attr("pathname");

    if (typeof(Storage) !== "undefined") {
        function checkParams(){
            return /[?&]/g.test(location.search);
        }

        if (checkParams()) {
            function getParameterByName(name) {
                name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                    results = regex.exec(location.search);
                return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            // Give the URL parameters variable names
            var source = getParameterByName('utm_source');
            var medium = getParameterByName('utm_medium');
            var campaign = getParameterByName('utm_campaign');
            var adgroupid = getParameterByName('adgroupid');
            if (source) {
                localStorage.setItem('source', source);
            }
            if (medium) {
                localStorage.setItem('medium', medium);
            }
            if (campaign) {
                localStorage.setItem('campaign', campaign);
            }
            if (adgroupid) {
                localStorage.setItem('adgroupid', adgroupid);
            }
        }
    }

    if (uri == '/') {
        if (source == "rocketship"){
            var fmText = "Knowledge. It feeds our curiosity. It gears us up for growth. It liberates. But putting that knowledge to work with undeterred focus is what makes great things happen. Weâ€™ve gotten together with Rocketship.fm, to spread the word on focus. To ensure that you arenâ€™t bothered by billing troubles as you go about building your dream SaaS startup. And your first $50K is on us!";
            var modalImage = "/static/resources/tp/podcasts/logo-rocketship.png";
            $('#cbFmModal').modal();
        }

        else if (source == "drt"){
            var fmText = "Podcasts are abundant with insights. Once tuned in, an earth-changing spark is a moment away, while one is walking the dog or doing the dishes. But we need a net to catch these insights and make them work, we need focus. With Chargebee, you can focus on building your SaaS startup, without worrying about billing troubles. Your first $50K is on us.";
            var modalImage = "/static/resources/tp/podcasts/logo-drt.png";
            $('#cbFmModal').modal();
        }
        $(".fmWelcomeMsg").text(fmText);
        $("#fmModalImage").attr('src', modalImage);
    }

    // if(uri=='/pricing/'){
    //     var InputData = function(customersId, arpuId) {
    //         this.customers = {
    //             min: $(customersId).data('sliderMin'),
    //             max: $(customersId).data('sliderMax'),
    //             val: $(customersId).data('sliderValue')
    //         }

    //         this.arpu = {
    //             min: $(arpuId).data('sliderMin'),
    //             max: $(arpuId).data('sliderMax'),
    //             val: $(arpuId).data('sliderValue')
    //         }

    //         $(customersId).slider();
    //         $(arpuId).slider();

    //         var cusVal = $(customersId).slider("getValue");
    //         var arpuVal = $(arpuId).slider("getValue");
    //         $(".cusVal").text(cusVal);
    //         $(".arpuVal").text(arpuVal);

    //         $(customersId).on("slide", function(slideEvt) {
    //             if (slideEvt.value < 4000) {
    //                 $(".cusVal").text(slideEvt.value);
    //             }
    //             else{
    //                 $(".cusVal").text("4000+");
    //             }
    //         });

    //         $(arpuId).on("slide", function(slideEvt) {
    //             if (slideEvt.value < 200) {
    //                 $(".arpuVal").text(slideEvt.value);
    //             }
    //             else{
    //                 $(".arpuVal").text("200+");
    //             }
    //         });
            
    //         caluclatePricing(cusVal, arpuVal);

    //         $(customersId).on("slide", function(slideEvt) {
    //             this.customers.val = slideEvt.value
    //             caluclatePricing(this.customers.val, this.arpu.val);
    //         }.bind(this));

    //         $(arpuId).on("slide", function(slideEvt) {
    //             this.arpu.val = slideEvt.value
    //             caluclatePricing(this.customers.val, this.arpu.val);
    //         }.bind(this));
    //     }

    //     var caluclatePricing = function(customers, arpu, selectedplan) {
    //         var revenue = customers * arpu;
    //         var launchPlanBuffer = 50000;
    //         var standardPrice = 99;
    //         var proPrice = 199;
    //         var enterprisePrice = 599;
    //         var includedInvoices = 200;
    //         var overageInvoiceCost = 0.50;
    //         if (customers < includedInvoices) {
    //             var finalCostA = standardPrice;
    //             var finalCostB = proPrice;
    //             var finalCostC = enterprisePrice;
    //         }
    //         else {
    //             var overagePrice = overageInvoiceCost * (customers - includedInvoices);
    //             var finalCostA = overagePrice + standardPrice;
    //             var finalCostB = overagePrice + proPrice;
    //             var finalCostC = overagePrice + enterprisePrice;
    //         }

    //         if(typeof selectedplan === 'undefined'){
    //             if(arpu < 20 || arpu > 180 || customers >= 4000){
    //                 selectedplan = 'custom';
    //             }
    //             else if (customers <= 300) {
    //                 selectedplan = 'standard';
    //             }
    //             else if (customers >= 400 && customers <= 900){
    //                 selectedplan = 'pro';
    //             }
    //             else if (customers >= 1000 ){
    //                 selectedplan = 'enterprise';
    //             }
    //         }
    //         // console.log(selectedplan);
    //         switch(selectedplan) {
    //             case 'launch':
    //                 $('#cb-plan-title').text("Launch");
    //                 $('#cb-plan-desc').text("Starting out? Your first $50K revenue is on us! All the features in Standard except Phone Support.");
    //                 $('#choose-plan').text("Get Started").attr("href", "/trial-signup.html?plan=launch");
    //                 $('#base-price').text("0");
    //                 $('#overage-cost').text("0");
    //                 $('#monthly-estimate').html("0");
    //                 $('#choose-plan').attr('plan-reco', 'launch');
    //                 break;
    //             case 'standard':
    //                 $('#cb-plan-title').text("Standard");
    //                 $('#cb-plan-desc').text("For early stage businesses that are looking for billing essentials to deliver an exceptional customer experience.");
    //                 $('#choose-plan').text("Get Started").attr("href", "/trial-signup.html?plan=standard");
    //                 $('#base-price').text(standardPrice);
    //                 $('#overage-cost').text(overagePrice);
    //                 $('#monthly-estimate').html("$"+finalCostA.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"/mo");
    //                 $('#choose-plan').attr('plan-reco', 'standard');
    //                 break;
    //             case 'pro':
    //                 $('#cb-plan-title').text("Pro");
    //                 $('#cb-plan-desc').text("For growing businesses that are looking to scale with more users, more payment gateways and deeper analytics.");
    //                 $('#choose-plan').text("Get Started").attr("href", "/trial-signup.html?plan=pro");
    //                 $('#base-price').text(proPrice);
    //                 $('#overage-cost').text(overagePrice);
    //                 $('#monthly-estimate').html("$"+finalCostB.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"/mo");
    //                 $('#choose-plan').attr('plan-reco', 'pro');
    //                 break;
    //             case 'enterprise':
    //                 $('#cb-plan-title').text("Enterprise");
    //                 $('#cb-plan-desc').text("For businesses that are seeking world domination and need a partner to closely work with them, at various levels.");
    //                 $('#choose-plan').text("Talk to Us").attr("href", "/enterprise/");
    //                 $('#base-price').text(enterprisePrice);
    //                 $('#overage-cost').text(overagePrice);
    //                 $('#monthly-estimate').html("$"+finalCostC.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"/mo");
    //                 $('#choose-plan').attr('plan-reco', 'enterprise');
    //                 break;
    //             case 'custom':
    //                 $('#cb-plan-title').text("Custom");
    //                 $('#cb-plan-desc').text("Custom");
    //                 $('#choose-plan').text("Talk to Us").attr("href", "/enterprise/");
    //                 $('#base-price').text("Custom");
    //                 $('#overage-cost').text("Custom");
    //                 $('#monthly-estimate').html("Custom");
    //                 $('#choose-plan').attr('plan-reco', 'custom');
    //                 break;
    //             default:
    //                 console.log(selectedplan);
    //         }
    //         $(".revenueVal").html(revenue.toString().replace(/,/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    //     }

    //     var inputData = new InputData('#customers', '#arpu');

    //     $( "#choose-plan" ).click(function(e) {
    //         var recommendedPlan = $(this).attr('plan-reco');
    //         ga('send', 'event', 'website', 'price-slider', recommendedPlan);
    //     });
    // }

    if (uri == '/press/' || uri == '/security/' || uri == '/about/' || uri == '/terms.html' || uri == '/privacy.html' || uri == '/careers/' || uri == '/sitemap/' || uri == '/affiliate-assets.html' || uri == '/affiliates.html' || uri == '/resources/'){
        function fd_checker(){
            if ( $('#fc_chat_layout, #lc_chat_layout').length == 0) { 
                setTimeout(fd_checker, 10);
            }
        else {
                $( "#fc_chat_layout, #lc_chat_layout" ).hide();
            }
        }
        setTimeout(fd_checker, 10);
        $( "#fc_chat_layout, #lc_chat_layout" ).hide();
    }

    if (uri == '/trial-signup.html') {
    }

    if (typeof(Storage) !== "undefined") {
        // Code for localStorage/sessionStorage.
        
        var ip_address = sessionStorage.getItem("ip_add");
        if (ip_address) {
            var country = localStorage.getItem('country');
            if (!country) {
                getCountry(ip_address);
            }
        } else {
            $.getJSON("https://api.ipify.org?format=json", function (data) {
                sessionStorage.setItem("ip_add", data.ip);
                getCountry(data.ip);
            });
        }
        function getCountry(ip_address){
            $.getJSON("https://freegeoip.net/json/"+ip_address, function (data) {
                localStorage.setItem('country', data.country_code.toLowerCase());
                if(data.country_code.toLowerCase() == "in"){
                  $("#ch-hiring-badge").css("display","block");//show we are hiring badge
                }
                else{
                  $("#ch-hiring-badge").css("display","none");
                }
            });
        }
        // 
        // We are hiring label in header (India only label)
        //
        if(window.localStorage && window.localStorage.country == "in"){
          $("#ch-hiring-badge").css("display","block");
        }
        else{
          $("#ch-hiring-badge").css("display","none");
        }
        // if (uri == '/uk/') {
        //     localStorage.setItem('country', 'uk');
        // }
        // if (uri == '/ca/') {
        //     localStorage.setItem('country', 'ca');
        // }
        // if (uri == '/de/') {
        //     localStorage.setItem('country', 'de');
        // }
        // if (uri == '/fr/') {
        //     localStorage.setItem('country', 'fr');
        // }
        // if (uri == '/sg/') {
        //     localStorage.setItem('country', 'sg');
        // }


        

        // if (country) {
        //     //footer images
        //     $.getJSON("/countries.json", function(data) {
        //         var countryData = data[country];
        //         if(countryData) {
        //             var logos = countryData["feat_cust_logos"];
        //             var logoContainer = $("div.client-logos > ul.thumb-list")[0];
        //             while(logoContainer.firstChild) {
        //                 logoContainer.removeChild(logoContainer.firstChild);
        //             }
        //             logos.forEach(function(logo) {
        //                 var li = document.createElement("li");
        //                 var image = document.createElement("img");
        //                 image.src = logo.url;
        //                 image.style.width= logo.width;
        //                 li.append(image);
        //                 logoContainer.append(li);
        //             });
        //         }
        //     });
        // }
        // else{
        //     console.log('row');
        // }

        if (localStorage.getItem('adgroupid', adgroupid)) {
            sessionStorage.setItem('tysource', 'google');
            sessionStorage.setItem('tymedium', 'adwords');
        }

        var tysource = sessionStorage.getItem("tysource");
        var tymedium = sessionStorage.getItem("tymedium");

        if (!tysource && !tymedium) {
            // source & medium doesn't exist
            function parseUtmz() {
                var utmz = $.cookie('__utmz');
                if (utmz == null) {
                    // return null;
                    window._gaq = window._gaq || [];
                    // DON'T UPDATE THE GA ACCOUNT ID. DUMMY ID
                    _gaq.push(['sfga._setAccount', 'UA-XYZABCDEF-1']);
                    _gaq.push(['sfga._setDomainName', 'uistacks.com']);
                    _gaq.push(['sfga._setAllowLinker', true]);
                    _gaq.push(['sfga._trackPageview']);
                    _gaq.push(function() {
                        get_campaign_info();
                    });

                    (function() {
                        var ga = document.createElement('script');
                        ga.type = 'text/javascript';
                        ga.async = true;
                        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(ga, s);
                    })();
                }
                var pairs = utmz ? utmz.split('.').slice(4).join('.').split('|') : "";

                var gaParams = {};
                for (var i = 0; i < pairs.length; i++) {
                    var temp = pairs[i].split('=');
                    gaParams[temp[0]] = temp[1];
                }
                return gaParams;
            };

            var gaParams = parseUtmz();
            if (gaParams == null) {
                return;
            }

            function gaParamsval(source){
                return gaParams[source];
            }

            var tysourceval = gaParamsval('utmcsr');
            var tymediumval = gaParamsval('utmcmd');

            if (tysourceval && tymediumval) { 
                sessionStorage.setItem('tysource', tysourceval);
                sessionStorage.setItem('tymedium', tymediumval);
            }
        }

        if(uri == '/enterprise/'){
            var finent = 'https://uistacks.typeform.com/to/wEJipg';
            if (ip_address || tysource || tymedium) {
                finent = finent + '?';
                if(ip_address!= null){
                    finent += 'ip_address=' + ip_address;
                }
                if(tysource&&tymedium){
                    finent += '&source=' + tysource + '&medium=' + tymedium ;
                }
                $("div.typeform-widget").attr("data-url", finent);
            }
        }
        if (uri == '/schedule-a-demo/') {
            var finent = 'https://uistacks.typeform.com/to/PWNukp';
            if (ip_address || tysource || tymedium) {
                finent = finent + '?';
                if(ip_address!= null){
                    finent += 'ip_address=' + ip_address;
                }
                if(tysource&&tymedium){
                    finent += '&source=' + tysource + '&medium=' + tymedium ;
                }
                $("div.typeform-widget").attr("data-url", finent);
            }
        }
        if (uri == '/nonprofit/') {
            var finent = 'https://uistacks.typeform.com/to/Yj7gVP';
            if (ip_address || tysource || tymedium) {
                finent = finent + '?';
                if(ip_address!= null){
                    finent += 'ip_address=' + ip_address;
                }
                if(tysource&&tymedium){
                    finent += '&source=' + tysource + '&medium=' + tymedium ;
                }
                $("div.typeform-widget").attr("data-url", finent);
            }
        }

    }
    
    
    //Features Page click to scroll
    $('#cb-feat-learnmore').click(function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 500);
        return false;
    });


    var initAfterPjax = function() {    
        blueBox = $(".blue-msg-box");
        blueBoxOffset = $(".blue-msg-box").offset().top;
        BlueBoxCssTop = parseInt($(".blue-msg-box").css("top"));
        //load ga script based on the page
        ga('send', 'pageview', window.location.pathname);
    }

    var hightLightTabSection = function(index) {
        var tabList = $(".p-menu__tab");
        var selectedTab = $($(".p-menu__tab")[index]);
        $(".p-menu__tab--active").removeClass("p-menu__tab--active");
        $(selectedTab).addClass("p-menu__tab--active");
    }

    var parseContentsAndReplace = function(content) {
        var $html = $($.parseHTML(content));
        var $carousel = $html.find(".pWrap__greybox");
        var $mainContent = $html.find("#main-container");
        $(".pWrap__greybox").html($carousel.html());
        $("#main-container").html($mainContent.html());
        hightLightTabSection($html.find(".p-menu__tab--active").index());
        $('title').text($html.filter('title').text());
        history.replaceState({tabPjax: true}, $html.filter('title').text(), window.location.href);
        if($('.p-menu--fixed').size() > 0) {
            $('html, body').animate({
                scrollTop: $("#main-container").offset().top
            }, 500);    
        }
    }

    var loadPjaxPage = function(url) {
        $.get(url, function(content) {
            parseContentsAndReplace(content);
            history.pushState({tabPjax: true}, '', url);
            hideLoader();
            initAfterPjax();
            if(typeof PR != "undefined") {
                PR.prettyPrint();
            }
        });
    }

    var showLoader = function() {
        $("#loading-line").show();
    }

    var hideLoader = function() {
        $("#loading-line").hide();   
    }

    $(window).on("popstate", function(e) {
        if (e.originalEvent.state !== null && e.originalEvent.state.tabPjax) {
            showLoader();
            loadPjaxPage(location.href);
        }
    });

    $(document).on("click", "a[pjax]", function() {
        var href = $(this).attr("href");
        if(history.state == null) {
            history.replaceState({tabPjax: true}, document.title , window.location.href);
        }
        if(this.classList.contains(".p-menu__tab")) {
            $(".p-menu__tab--active").removeClass("p-menu__tab--active");
            $(this).addClass("p-menu__tab--active");
        }
        showLoader();
        loadPjaxPage(href);
        return false; 
    });


    // var counter = 0;

    // $.ajaxSetup({
    //     xhr: function() {
    //         var xhr = new window.XMLHttpRequest();

    //         xhr.addEventListener("progress", function(evt) {
    //            if (evt.lengthComputable) {
    //                 var percentComplete = evt.loaded / evt.total;
    //                 if(!$("#loading-line").is(":visible")){
    //                     $("#loading-line").show();
    //                     $("#loading-line").css("width", 0);
    //                     counter = 0; 
    //                 }
    //                 if(percentComplete == 1) {
    //                     $("#loading-line").hide();
    //                 }
    //                 else {
    //                     var width = (percentComplete ) * 100;
    //                     $("#loading-line").css("width", width + "%");
    //                 }
    //            }
    //         }, false);

    //        return xhr;
    //     }
    // });


    // 
    // Header logo right click to open asset
    //
    //modal popup
    var MODAL_TEMPLATE = {
        popupTemplate:["<div class='ch-modal' id='ch-modal' style='display:none'>",
            "<div class='ch-modal__overlay' id='ch-modal-overlay'></div>",
            "<div class='ch-modal__body' id='ch-modal-body'>",
            "<div class='ch-modal__icon'><img src='/static/resources/downloads/cb-logo-download.svg' alt='Chargebee Logo Download' width='50'></div>",
            "<div class='ch-modal__content'>",
            "<div class='ch-modal__desc'>Download our logos, Zipped in<br> EPS and PNG formats.</div>",
            "<div class='ch-modal__actions'>",
            "<a href='/static/resources/downloads/Chargebee Logo kit.zip' download class='ch-modal__action'>Download Logos</a>",
            "</div>",
            "</div>",
            "<div class='ch-modal__close' id='ch-modal-close'>&times;</div>",
            "</div>",
            "</div>"
        ]
    }
    var closeModal = function(){
        $(body).css("overflow","visible");
        $("#ch-modal").removeClass("ch-modal--active");
    }
    var modal = MODAL_TEMPLATE.popupTemplate.join(" ");
    var body = document.body;
    body.append($.parseHTML(modal)[0]);
    $('[data-ch-js-asset]').bind('contextmenu', function(e) {//ch-nav__logo
        e.preventDefault();
        $("#ch-modal").addClass("ch-modal--active");
        $(body).css("overflow","hidden");
    });
    $("#ch-modal-close").click(function() {
        closeModal();
    });
    $(document).keyup(function(e) {
      if (e.keyCode === 27){
        closeModal();
      }
    });
    $("#ch-modal-overlay").click(function() {
        closeModal();
    });

});