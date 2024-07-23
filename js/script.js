window.addEventListener("load", function () {
  jQuery(document).ready(function ($) {
    "use strict";
    $("body").addClass("page-loaded");

    var myCursor = jQuery(".theme-custom-cursor");
    if (myCursor.length) {
      if ($("body")) {
        const e = document.querySelector(".theme-cursor-secondary"),
          t = document.querySelector(".theme-cursor-primary");
        let n,
          i = 0,
          o = !1;
        (window.onmousemove = function (s) {
          o ||
            (t.style.transform =
              "translate(" + s.clientX + "px, " + s.clientY + "px)"),
            (e.style.transform =
              "translate(" + s.clientX + "px, " + s.clientY + "px)"),
            (n = s.clientY),
            (i = s.clientX);
        }),
          $("body").on(
            "mouseenter",
            'a, button, input[type="submit"], .slick-arrow, .cursor-pointer',
            function () {
              e.classList.add("cursor-hover"), t.classList.add("cursor-hover");
            }
          ),
          $("body").on(
            "mouseleave",
            'a, button, input[type="submit"], .slick-arrow, .cursor-pointer',
            function () {
              ($(this).is("a") && $(this).closest(".cursor-pointer").length) ||
                (e.classList.remove("cursor-hover"),
                t.classList.remove("cursor-hover"));
            }
          ),
          (e.style.visibility = "visible"),
          (t.style.visibility = "visible");
      }
    }
  });
});

(function ($, window, undefined) {
  "use strict";

  var rtled = false;

  if ($("body").hasClass("rtl")) {
    rtled = true;
  }

  $(function () {
    $("#mainslider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 8000,
      infinite: true,
      dots: true,
      nextArrow: '<i class="nav-arrow nav-main icon-right"></i>',
      prevArrow: '<i class="nav-arrow nav-main icon-left"></i>',
      rtl: rtled,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            arrows: false,
          },
        },
      ],
    });
    $(
      "figure.wp-block-gallery.has-nested-images.columns-1, .wp-block-gallery.columns-1 ul.blocks-gallery-grid, .gallery-columns-1"
    ).each(function () {
      $(this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        autoplay: true,
        autoplaySpeed: 8000,
        infinite: true,
        dots: false,
        nextArrow: '<i class="nav-arrow icon-right"></i>',
        prevArrow: '<i class="nav-arrow icon-left"></i>',
        rtl: rtled,
      });
    });
    $(".recommendation-block-carousel").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      speed: 900,
      autoplaySpeed: 4545,
      dots: true,
      arrows: false,
      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
    $(".testimonial-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      speed: 900,
      autoplaySpeed: 4545,
      dots: true,
      arrows: false,
    });
  });
  $(function () {
    $(".widget-area").theiaStickySidebar({
      additionalMarginTop: 30,
    });
  });
  $(function () {
    var pageSection = $(".header-image");
    pageSection.each(function (indx) {
      if ($(this).attr("data-background")) {
        $(this).css(
          "background-image",
          "url(" + $(this).data("background") + ")"
        );
      }
    });
  });
  $(function () {
    $(".icon-search").on("click", function (event) {
      $("body").toggleClass("united-model");
      $("body").addClass("window-scroll-locked");
      setTimeout(function () {
        $(".model-search-wrapper .search-field").focus();
      }, 300);
    });
    $(".cross-exit").on("click", function (event) {
      $("body").removeClass("united-model");
      $("body").removeClass("window-scroll-locked");
      $(".icon-search").focus();
    });

    $(document).keyup(function (j) {
      if (j.key === "Escape") {
        $("body").removeClass("united-model");
        $("body").removeClass("window-scroll-locked");
        $(".icon-search").focus();
      }
    });

    $(".searchbar-skip-link").focus(function () {
      $(".model-search .search-submit").focus();
    });

    $("input, a, button").on("focus", function () {
      if ($("body").hasClass("united-model")) {
        if (!$(this).parents(".model-search").length) {
          $(".cross-exit").focus();
        }
      }
    });
  });
  $(".gallery, .wp-block-gallery").each(function () {
    $(this).magnificPopup({
      delegate: "a",
      type: "image",
      closeOnContentClick: false,
      closeBtnInside: false,
      mainClass: "mfp-with-zoom mfp-img-mobile",
      image: {
        verticalFit: true,
        titleSrc: function (item) {
          return item.el.attr("title");
        },
      },
      gallery: {
        enabled: true,
      },
    });
  });
  $(".zoom-gallery").each(function () {
    $(this).magnificPopup({
      delegate: "button",
      type: "image",
      closeOnContentClick: false,
      closeBtnInside: false,
      mainClass: "mfp-with-zoom mfp-img-mobile",
      image: {
        verticalFit: true,
        titleSrc: function (item) {
          return item.el.attr("title");
        },
      },
    });
  });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      $(".scroll-up").fadeIn();
    } else {
      $(".scroll-up").fadeOut();
    }
  });
  $(".scroll-up").on("click", function (e) {
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
})(jQuery, this);

let customHeader = document.querySelector(".custom-header");
const header = document.querySelector(".site-header");
const getPage = document.getElementById('page');

if (customHeader) {
  const checkPosition = () => {
    const windowWidth = window.innerWidth;
    const headerHeight = header.offsetHeight;
    const customHeaderHeight = customHeader.offsetHeight;
    const scrollPosition = window.scrollY;

    if (windowWidth >= 992) {
      header.style.top = `calc(100vh - ${headerHeight + 40}px)`;
    } else {
      header.style.top = "inherit";
    }

    let headerPosition =
      windowWidth >= 992
        ? header.offsetTop + headerHeight / 2
        : header.offsetTop + headerHeight;

    if (scrollPosition >= headerPosition) {
      header.classList.add("scroll-down");
    } else {
      header.classList.remove("scroll-down");
    }

    if (windowWidth <= 991 && scrollPosition >= headerPosition) {
      getPage.style.paddingTop = (header.offsetHeight + 40) + 'px';
    } else {
      getPage.style.paddingTop = 0;
    }

    if (
      windowWidth >= 992 &&
      scrollPosition <= customHeaderHeight - headerHeight
    ) {
      header.classList.remove("scroll-down");
    }
  };

  const handleScroll = optimizedCheckPosition(checkPosition);

  window.addEventListener("scroll", handleScroll);
  window.addEventListener("resize", checkPosition);
  window.addEventListener("load", () => {
    checkPosition();

    let customHeaderVideo = document.querySelector('#wp-custom-header-video');
    customHeaderVideo.setAttribute('tabindex', '-1')
  });
} else {
  function handleStickyMenu() {
    if (window.scrollY >= header.offsetTop) {
      header.classList.add("scroll-down");
      getPage.style.paddingTop = (header.offsetHeight + 40) + 'px';
    }
    
    if (window.scrollY <= 0) {
      header.classList.remove("scroll-down");
      getPage.style.paddingTop = 0;
    }
  }
  const handleScroll = optimizedCheckPosition(handleStickyMenu);

  window.addEventListener("scroll", handleScroll);
}

function optimizedCheckPosition(fnc) {
  // Throttle the function to improve performance
  let timeout;
  return () => {
    if (!timeout) {
      timeout = setTimeout(() => {
        fnc();
        timeout = null;
      }, 100); // Adjust the timeout value as needed
    }
  };
}

let videoCta = document.querySelector(".video-cta");

if (videoCta) {
  let videoCtaPlay = videoCta.querySelector(".video-cta-play");
  let videoCtaPopup = videoCta.querySelector(".video-cta-popup");
  let videoCtaPopupClose = videoCtaPopup.querySelector("svg");

  videoCtaPlay.addEventListener("click", () => {
    videoCtaPopup.classList.add("active");
    document.body.style.overflow = "hidden";
  });

  videoCtaPopupClose.addEventListener("click", () => {
    let popupVideo = videoCtaPopup.querySelector("iframe");
    let videoSrc = popupVideo.src;

    popupVideo.src = "";
    popupVideo.src = videoSrc;

    videoCtaPopup.classList.remove("active");
    document.body.style.overflow = "visible";
  });
}

