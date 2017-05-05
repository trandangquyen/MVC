(function($) {
    /**
     * START - ONLOAD - JS
     */
	/* ----------------------------------------------- */
	/* ------------- FrontEnd Functions -------------- */
	/* ----------------------------------------------- */

	/* ----------------------------------------------- */
	/* ----------------------------------------------- */
	/* OnLoad Page */
    $(document).ready(function($) {
        $('.flexslider').flexslider({
            directionNav: false,
            animation: "slide",
            slideshow: true,
            pauseOnAction: false,
            pauseOnHover: false,
            slideshowSpeed: 3000,
            after: function(){
                $(".flex-active-slide").siblings().find(".flex-caption").removeClass("bounceInUp");
                $(".flex-active-slide .flex-caption").addClass("bounceInUp");

            }
        });
    });
	/* OnLoad Window */
    var init = function() {

    };
    window.onload = init;

})(jQuery);
