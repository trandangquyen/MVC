(function ($) {
    /**
     * START - ONLOAD - JS
     */
    /* ----------------------------------------------- */
    /* ------------- FrontEnd Functions -------------- */
    /* ----------------------------------------------- */
    function rateStar() {
        var clicked = false;
        var countStar = 0;
        var imgStaroff = "url('public/themes/images/star-off.png') no-repeat scroll";
        var imgStaron = "url('public/themes/images/star-on.png') no-repeat scroll";

        $(".rate-star i").mouseenter(
            function () {
                // console.log("mouse in");
                $(this).on('mouseleave');
                if (countStar != 0) {
                    for (var i = 0; i < 5; i++) {
                        $(".rate-star i:eq(" + i + ")").css("background", imgStaroff);
                    }
                    var index = $(this).index();
                    for (var i = 0; i < index; i++) {
                        $(".rate-star i:eq(" + i + ")").css("background", imgStaron);
                        $("#count-star").html(index);
                    }
                }
                else {
                    // $(this).on('mouseleave');
                    var index = $(this).index();
                    for (var i = 0; i < index; i++) {
                        $(".rate-star i:eq(" + i + ")").css("background", imgStaron);
                        $("#count-star").html(index);
                    }
                }

            }
        );
        $(".rate-star i").mouseleave(
            function () {
                // console.log("muose outed");
                if (countStar != 0) {
                    $("#count-star").html(countStar);
                    for (var i = 0; i < 5; i++) {
                        console.log("reseted");
                        $(".rate-star i:eq(" + i + ")").css("background", imgStaroff);
                    }
                    for (var i = 0; i < countStar; i++) {
                        $(".rate-star i:eq(" + i + ")").css("background", imgStaron);
                    }
                }
                else {
                    var index = $(this).index();
                    $("#count-star").html(0);
                    for (var i = 0; i < index; i++) {
                        $(".rate-star i:eq(" + i + ")").css("background", imgStaroff);
                    }
                }


            }
        );
        $(".rate-star i").click(
            function () {
                clicked = true;
                var index = $(this).index();
                countStar = index;
                $(this).data('clicked', true);
                for (var i = 0; i < index; i++) {
                    var star = $(".rate-star i:eq(" + i + ")").css("background", imgStaron);
                }
                $('input[name=comment\\[rate\\]]').val(countStar);
            }
        );
    }

    function displayMenu() {
        $(".sub-1 li").hover(function () {
            $(this).addClass("active").find(".sub-2").slideDown(300);
        }, function () {
            $(this).removeClass("active").find(".sub-2").stop().slideUp(50);
        });
        $(".sub-2 li").hover(function () {
            $(this).addClass("active").find(".sub-3").slideDown(300);
        }, function () {
            $(this).removeClass("active").find(".sub-3").stop().slideUp(50);
        });
    }
    /* OnLoad Page */
    $(document).ready(function ($) {
        rateStar();
        displayMenu();
        $('.flexslider').flexslider({
            directionNav: false,
            animation: "slide",
            slideshow: true,
            pauseOnAction: false,
            pauseOnHover: false,
            slideshowSpeed: 3000,
            after: function () {
                $(".flex-active-slide").siblings().find(".flex-caption").removeClass("bounceInUp");
                $(".flex-active-slide .flex-caption").addClass("bounceInUp");

            }
        });

    });
    /* OnLoad Window */
    var init = function () {

    };
    window.onload = init;

})(jQuery);
