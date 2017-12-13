(function($) {  
"use strict";

    $(".showlogin").click(function(){  
        $(".col-2 .form-login").fadeToggle('400');
    });
    
    $(".es_textbox_class").attr('placeholder', 'email...');
    $(".menu-right").hover(function(){  
    $(".menu-right-layout").fadeToggle('400');
    $(".proinput").attr('style', 'width:75%!important;');
    $(".orig").attr('style', 'width:75%!important;');
    $(".autocomplete").attr('style', 'width:75%!important;');

    if ($(".link-menu").hasClass("activelink-menu")) {
            $(".link-menu").removeClass("activelink-menu");
    }
    else{
        $(".link-menu").addClass("activelink-menu");
    }
    return false;
    });

    $(".form-login").hover(function(){  
        $(".login").fadeIn('9000');
        $(".poup-login").addClass("active");
    });
    $(".icon-quickview").click(function(){  
        $(".popup-quickview").fadeIn('9000');
    });

    $(".title-content-blog").hover(function(){  
        if(!$(this).hasClass('active')){
            $(".btn-outlined").addClass("active");
        }
        else{
            $(".btn-outlined").removeClass("active");
        }
    });
    $(".menu-mb").click(function(){  
        $("#menu-menu-mobile").toggleClass("mobile-show");
        $("#main-page").toggleClass("show-menu-mobile");
        $("footer").toggleClass("show-menu-mobile");
        $("#logo").toggleClass("show-menu-mobile");
        $(".menu-mb").toggleClass("show-menu-mobile");
    });



    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })

        $(".close").click(function(){  
        $(".search-header").fadeOut('400');
        $(".ajaxsearchpro").fadeOut('400');
        return false;
        });

        $("#search-header").click(function(){  
        $(".search-header").fadeIn('400');
        $(".ajaxsearchpro").fadeIn('400');
        $(".proinput").attr('style', 'width:75%!important;');
        $(".orig").attr('style', 'width:75%!important;');
        $(".autocomplete").attr('style', 'width:75%!important;');
        return false;
        });

    //Look book
    $("#organic-lookbook-3").click(function(){  
        if($(this).hasClass('active')){
            $(this).removeClass("active");
        }
        else{
             $(this).addClass("active");
        }
    });

    //Look book masterslide
    $(".master-slider-parent .master-slider .ms-layer").click(function(){  
        var idproduct = $(this).attr('id');
        $('#product-'+idproduct).addClass('active');
        $('.organic-lookbook-masterslide').attr('style', 'margin-left: -15%;');
        $('.vc_row-fluid.lookbook').attr('style', 'margin-left: -15%;');
    });

    $(".master-slider-parent .master-slider .ms-layer").hover(function(){  
        $(this).toggleClass('cbutton--click');
    });

    $(".lb-masterslide #close").click(function(){  
        $('.product-show').removeClass('active');
        $('.organic-lookbook-masterslide').attr('style', 'margin-left: 0;');
        $('.vc_row-fluid.lookbook').attr('style', 'margin-left: 0;');
    });
    $(window).load(function() {
        $('.master-slider-parent .master-slider .ms-layer').addClass('cbutton cbutton--effect-radomir');
    });

})(jQuery); 