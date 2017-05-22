(function ($) {
    /**
     * START - ONLOAD - JS
     */
    /* ----------------------------------------------- */
    /* ------------- FrontEnd Functions -------------- */
    /* ----------------------------------------------- */

    function checkUrl(){
        var pathname = window.location.pathname;
        var patt = /user\/register/;
        if(patt.test(pathname))
        {
            console.log("success");
            $(".container").addClass("active");
        }
    }
    /* OnLoad Page */
    $(document).ready(function ($) {
        checkUrl();
        $('.toggle').on('click', function() {
            $('.container').stop().addClass('active');
        });

        $('.close').on('click', function() {
            $('.container').stop().removeClass('active');
        });
    });
    /* OnLoad Window */
    var init = function () {

    };
    window.onload = init;

})(jQuery);
