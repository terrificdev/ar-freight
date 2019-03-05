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
  $("#service-gallery").slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          dots: true,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 1,
          dots: true,
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
 //Hover interaction for news item
 var width = $(window).width();
 if (width > 1025) {
   //desktop interaction
   var toggleOn = false;
   $(".about-us__right__block").hover(
     function () {
       $(this).addClass('active');
     }, function () {
       toggleOn || $(this).removeClass('active');
     }
   );
 }
 else {
   // tablet and mobile interaction
   $(".about-us__right__block").click(function () {
     $(".about-us__right__block").removeClass('active');
     $(this).toggleClass('active');

   });
 }
 $("#services-home").slick({
  dots: true,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1
});
});
