// the JavaScript for the guitars page

"use strict";

// the jQuery code for the bxslider
$(document).ready(function(){
    $(".slider").bxSlider({
        auto: true,
        pause: 3000,
        randomStart: true,
        controls: false,
        slideWidth: 210,
        pager: true,
        pagerType: 'short',
        captions: true
    });
});