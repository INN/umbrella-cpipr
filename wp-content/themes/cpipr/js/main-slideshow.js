(function ($) {
  
  $(document).ready(function () {
    $('#main-slideshow').owlCarousel({
      autoplay: true,
      autoplayHoverPause: true,
      loop: true,
      items: 1,
      nav: true,
      dots: true,
      navText: [
        '<span aria-label="' + 'Previous' + '"></span>',
        '<span aria-label="' + 'Next' + '"></span>'
      ],
    });
  });

})(jQuery);