jQuery(document).ready(function ($) {
  //Sticky Header
  $(window).scroll(function () {
    var sticky = $('.site-header'),
      scroll = $(window).scrollTop();

    if (scroll >= 120) {
      sticky.addClass('fixed');
    }
    else {
      sticky.removeClass('fixed');
    }
  });
  //add class to header to add background color for resp header menu
  $("body").on("click", "#menu-toggle", function (e) {
    var status = $(this).hasClass("toggled-on");
    if (status) {
      $("header.site-header").addClass("openMenu");
    }
    else {
      $("header.site-header").removeClass("openMenu");
    }
  })

});