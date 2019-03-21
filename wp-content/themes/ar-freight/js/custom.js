jQuery(document).ready(function ($) {
  $('.type-of-services').click(function (e) {
    var name = $(this).data("name");
    $('#qoute-title h2').html(name);
    var options = '';
    if(name=='Relocation Services'){
    options += '<option value="Internation Relocation">International Relocation</option>';
    options += '<option value="Local Moves">Local Moves (Kuwait)</option>';
    options += '<option value="Packing-Palletization">Packing, Lashing, Palletization</option>';
    }
    if(name=='Freight Services'){
      options += '<option value="Air Freight Services">Air Freight Services</option>';
      options += '<option value="Land Freight Services">Land Freight Services</option>';
      options += '<option value="Sea Freight Services">Sea Freight Services</option>';
    }
    if(name=='Other Services'){
      options += '<option value="Custom Operations">Custom Operations</option>';
      options += '<option value="Embassy and Govt Services">Embassy and Govt Services</option>';
      options += '<option value="cargo-Services">Cargo Pickup, Delivery & Warehousing</option>';
      options += '<option value="Import Services">Import Services</option>';
    }
    $('#type-of-service').html(options);
    $('#quote-title h2').html(name);

    //add active class
    $(this).addClass("active");
    $(".type-of-services").not(this).removeClass("active");

  });
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
  $("#contact-gallery").slick({
    dots: true,
    arrows: true,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          infinite: true
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
    // resposnive - to avoid the menuitem to be expanded on pageload
    $(".sub-menu").removeClass('toggled-on');
    $(".dropdown-toggle").removeClass('toggled-on');

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
  $("#job-desc").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
   //news page lazy loading plugin
  $('.loadMore').loadMoreResults({
    tag: {
          'name': 'div',
          'class': 'lazyload'
        },
    displayedItems: 8
  });
  //show/hide loadmore button - news and events page
  var noOfNews =  $(".news-content").attr("data-count");
  var noOfEvents =  $(".events-content").attr("data-count");
  console.log(noOfNews,",",noOfEvents);
  console.log($(".news-content .btn-load-more"));
  console.log($(".events-content .btn-load-more"));
  if(noOfNews <=8){
    $(".news-content .btn-load-more").addClass('hide');
  }
  if(noOfEvents <= 8){
    $(".events-content .btn-load-more").addClass('hide');
  }


  $("#relocation-services").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  $("#freight-services").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  $("#other-logistics-services").slick({
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  // Add minus icon for collapse element which is open by default - Accordion
  $(".panel-title a").click(function(){
    $(".panel-title a").not(this).removeClass("open").addClass("closed");
    $(this).toggleClass("closed open");

  });

  
  // Get the element with id="defaultOpen" and click on it - Archives page
  if($('.archives-container')[0]){
    document.getElementById("defaultOpen").click();
  }

});

//Archives page vertical tabs
function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
