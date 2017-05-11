(function ($) {
    /**
     * START - ONLOAD - JS
     */
    /* ----------------------------------------------- */
    /* ------------- FrontEnd Functions -------------- */
    /* ----------------------------------------------- */

    function checkAllProduct(){
        $('#select-all').change(function() {
            var checkboxes = $(this).closest('tr').siblings().find(':checkbox');
            if($(this).is(':checked')) {
                checkboxes.prop('checked', true);
            } else {
                checkboxes.prop('checked', false);
            }
        });
    }
    /* OnLoad Page */
    $(document).ready(function ($) {
        checkAllProduct();

    });
    /* OnLoad Window */
    var init = function () {

    };
    window.onload = init;

})(jQuery);
