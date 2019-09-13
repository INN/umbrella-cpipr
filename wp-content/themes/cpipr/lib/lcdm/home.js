(function ($) {
    $(document).ready(function () {
        $('#top-hero-carousel').owlCarousel({
            autoplay: false,
            loop: true,
            items: 1,
            nav: true,
            dots: true,
            mergeControls: true,
            autoHeight: true,
            navContainer: '#main-hero-controls .owl-nav',
            dotsContainer: '#main-hero-controls .owl-dots',
            navText: [
                '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
            ],
        });
    });
})(jQuery);


(function ($) {
    $(document).ready(function () {
        $('#power-players-hero-carousel').owlCarousel({
            autoplay: false,
            loop: true,
            items: 1,
            nav: true,
            dots: true,
            mergeControls: true,
            autoHeight: true,
            navContainer: '#power-player-controls .owl-nav',
            dotsContainer: '#power-player-controls .owl-dots',
            navText: [
                '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
            ],
        });
    });
})(jQuery);


(function ($) {
    $(document).ready(function () {
        $('#inphographic-hero-carousel').owlCarousel({
            autoplay: false,
            loop: true,
            items: 1,
            nav: true,
            dots: true,
            mergeControls: true,
            autoHeight: true,
            navContainer: '#inphographic-controls .owl-nav',
            dotsContainer: '#inphographic-controls .owl-dots',
            navText: [
                '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
            ],
        });
    });
})(jQuery);


(function ($) {
    $(document).ready(function () {
        $('#video-hero-carousel').owlCarousel({
            autoplay: false,
            loop: true,
            items: 1,
            nav: true,
            dots: true,
            mergeControls: true,
            autoHeight: true,
            navContainer: '#video-hero-controls .owl-nav',
            dotsContainer: '#video-hero-controls .owl-dots',
            navText: [
                '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
            ],
        });
    });
})(jQuery);


(function ($) {
    $(document).ready(function () {
        $('#glossary-carousel').owlCarousel({
            autoplay: false,
            loop: true,
            items: 1,
            nav: true,
            dots: true,
            mergeControls: true,
            autoHeight: true,
            navContainer: '#glossary-controls .owl-nav',
            dotsContainer: '#glossary-controls .owl-dots',
            navText: [
                '<span class="lcdm-icon lcdm-icon-arrow-left" aria-label="' + 'Previous' + '"></span>',
                '<span class="lcdm-icon lcdm-icon-arrow-right" aria-label="' + 'Next' + '"></span>'
            ],
        });
    });
})(jQuery);

(function ($) {
    $(window).load(function () {
        if(window.location.hash) {
          var hash = window.location.hash;
          $.scrollTo($(hash), 800);
        }
    });
})(jQuery);