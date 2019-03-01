jQuery(document).ready(function ($) {

  //To Instantiate Patners slider-homepage
  $("#news-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });

  $("#events-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  $(".center_slick").slick({
    dots: true,
    arrows: false,
    centerMode: true,
    centerPadding: '0',
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          infinite: true
        }
      },
      {
        breakpoint: 450,
        settings: {
          slidesToShow: 1,
          infinite: true
        }
      },
    ]
  });
  $("#services-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  $("#banner-home").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: ".c-prev",
    nextArrow: ".c-next"
  });

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
    });
    
});
