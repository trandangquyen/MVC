(function($) {
    /**
     * START - ONLOAD - JS
     */
	/* ----------------------------------------------- */
	/* ------------- FrontEnd Functions -------------- */
	/* ----------------------------------------------- */
    function displayMenu() {
        $(".sub-1 li").hover(function(){
            $(this).addClass("active").find(".sub-2").slideDown(300);
        }, function(){
            $(this).removeClass("active").find(".sub-2").stop().slideUp(50);
        });
        $(".sub-2 li").hover(function(){
            $(this).addClass("active").find(".sub-3").slideDown(300);
        }, function(){
            $(this).removeClass("active").find(".sub-3").stop().slideUp(50);
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
