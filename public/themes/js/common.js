(function($) {
    /**
     * START - ONLOAD - JS
     */
	/* ----------------------------------------------- */
	/* ------------- FrontEnd Functions -------------- */
	/* ----------------------------------------------- */
    function displayMenu() {
        $(".sub-1 li").hover(function(){
            $(this).find(".sub-2").css("height", "auto").slideDown();
        }, function(){
            $(this).find(".sub-2").stop().slideUp();
        });
        $(".sub-2 li").hover(function(){
            $(this).find(".sub-3").css("height", "auto").slideDown();
        }, function(){
            $(this).find(".sub-3").stop().slideUp();
        });
    }
	/* ----------------------------------------------- */
	/* ----------------------------------------------- */
	/* OnLoad Page */
    $(document).ready(function($) {
        displayMenu();
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
