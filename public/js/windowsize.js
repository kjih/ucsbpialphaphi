/*
 * windowsize.js
 *
 * Set container widths depending on window width
 * and display regular or mobile menu
 */

// set_size()
// Sets the appropriate div sizes
function set_size() {
    var containerWidth;
    var winWidth = $(window).width();

    // Determine main container width
    // Thresholds based off of Bootstrap thresholds
    if (winWidth >= 992) {
        containerWidth = 970;
    } else if (winWidth >= 768) {
        containerWidth = 750;
    } else {
        containerWidth = winWidth - 8;
    }

    // Display mobile menu if window width < 512
    if (winWidth < 512) {
        $("#menuDiv").css("display", "none");
        $("#mobileMenuDiv").css("display", "block");
    } else {
        $("#mobileMenuDiv").css("display", "none");
        $("#menuDiv").css("display", "block");
    }

    // Shrink text size if width <= 375 (iPhone 6 portrait width)
    if (winWidth <= 475) {
        $(".bodyText").css("font-size", "12px");
        $(".bodyText-left").css("font-size", "12px");
    } else {
        $(".bodyText").css("font-size", "14px");
        $(".bodyText-left").css("font-size", "14px");
    }

    // Apply sizes to css
    $(".container").css("width", containerWidth);
    $(".container-small").css("width", containerWidth - (containerWidth / 4));
    // Stack xs containers if width <= 450
    if (winWidth <= 512) {
        $(".container-xs-left").css("width", containerWidth - 5);
        $(".container-xs-right").css("width", containerWidth - 5);
        $(".container-xs-center").css("width", containerWidth - 5);
        $(".container-xs-left").css("float", "center");
        $(".container-xs-right").css("float", "center");
    } else {
        $(".container-xs-left").css("width", (containerWidth / 2) - 5);
        $(".container-xs-right").css("width", (containerWidth / 2) - 5);
        $(".container-xs-center").css("width", containerWidth * .6);
        $(".container-xs-left").css("float", "left");
        $(".container-xs-right").css("float", "right");
    }
}

// Call set_size() at initial page load
set_size();

// Call set_size() on window resize
$(window).resize(function() {
    set_size();
});
