jQuery(document).ready(function () {    
  jQuery('#cpipr-menu-btn').click(function (e) {
    e.preventDefault();
    jQuery('#cpipr-menu').collapsecpipr('toggle');
  });
});