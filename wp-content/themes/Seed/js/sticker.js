(function($) {  
"use strict";

    var s = $(".organic-header");
    var pos = s.position();
    var number =150;
    if(pos!=undefined){
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos.top + number) {
                s.addClass("stick");
            }
            else {
                s.removeClass("stick");

            }
            if(windowpos<1){
                s.removeClass("stick");

            }
        });
    }

})(jQuery); 