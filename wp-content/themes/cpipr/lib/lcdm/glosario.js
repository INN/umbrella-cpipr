(function ($) {
    $('.nice-select').niceSelect().on('change', function (event) {
        var letter = $(this).val();
        if (letter) {
            $.scrollTo($('#' + letter), 500);
        }
    });
})(jQuery);