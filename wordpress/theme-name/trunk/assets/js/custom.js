"use strict";

/* global wp, jQuery */

/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
(function ($) {
  // Site title and description.
  wp.customize("blogname", function (value) {
    value.bind(function (to) {
      $(".site-title a").text(to);
    });
  });
  wp.customize("blogdescription", function (value) {
    value.bind(function (to) {
      $(".site-description").text(to);
    });
  }); // Header text color.

  wp.customize("header_textcolor", function (value) {
    value.bind(function (to) {
      if ("blank" === to) {
        $(".site-title, .site-description").css({
          clip: "rect(1px, 1px, 1px, 1px)",
          position: "absolute"
        });
      } else {
        $(".site-title, .site-description").css({
          clip: "auto",
          position: "relative"
        });
        $(".site-title a, .site-description").css({
          color: to
        });
      }
    });
  });
})(jQuery);
"use strict";

(function ($) {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function initializeBlock($block) {
    $block.find(".slides").slick({
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      centerMode: false,
      variableWidth: false,
      adaptiveHeight: false,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 8000,
      cssEase: "linear",
      fade: true //cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",

    });
  };

  var initializeSlide = function initializeSlide($rotate, $index) {
    $rotate.removeClass("is-visible").addClass("is-hidden").eq($index).removeClass("is-hidden").addClass("is-visible"); //$caption.addClass("fadeIn").removeClass("fadeOut");
  }; // Initialize each block on page load (front end).


  $(document).ready(function () {
    $(".slider--hero").on("beforeChange", function (event, slick, currentSlide, nextSlide) {
      var $rotate = $(".cd-words-wrapper b");
      setTimeout(function () {
        initializeSlide($rotate, nextSlide);
      }, 100);
    }).on("afterChange", function (event, slick, currentSlide) {
      $(".slider--hero").find(".slides").slick("slickSetOption", "autoplaySpeed", 7500, false);
    }).on("init", function (event) {
      setTimeout(function () {
        var $rotate = $(".cd-words-wrapper").removeClass("initializing");
      }, 2500);
    });
    $(".slider--hero").each(function () {
      initializeBlock($(this));
    });
  });
})(jQuery);
"use strict";

(function ($) {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function initializeBlock($block) {
    $block.find(".slides").slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: "0",
      arrows: true,
      nextArrow: $block.find(".slick__next"),
      prevArrow: $block.find(".slick__prev"),
      variableWidth: true,
      adaptiveHeight: true
    });
  };

  var initializeSlide = function initializeSlide($slide, $caption) {
    $caption.find(".logo.content").html($slide.data("logo"));
    $caption.find(".year.content").html($slide.data("year"));
    $caption.find(".location.content").html($slide.data("location"));
    $caption.find(".category.content").html($slide.data("category"));
    $caption.find(".type_of_project.content").html($slide.data("type_of_project"));
    $caption.find(".scope_of_work.content").html($slide.data("scope_of_work"));
    setTimeout(function () {
      var height = $caption.find(".caption__body-bg").outerHeight();
      $caption.addClass("fadeIn").removeClass("fadeOut");
    }, 100);
  }; // Initialize each block on page load (front end).


  $(document).ready(function () {
    $(".slider--homepage").on("beforeChange", function (event, slick, currentSlide, nextSlide) {
      var $caption = $(this).find(".caption");
      var $slide = $(slick.$slides[nextSlide]);
      $caption.addClass("fadeOut").removeClass("fadeIn");
      initializeSlide($slide, $caption);
    }).on("init", function (event) {
      var $slide = $(this).find(".slick-current");
      var $caption = $(this).find(".caption");
      initializeSlide($slide, $caption);
    });
    $(".slider--homepage").each(function () {
      initializeBlock($(this));
    });
  });
})(jQuery);
"use strict";

(function ($) {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function initializeBlock($block) {
    $block.find(".slides").slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      arrows: true,
      //nextArrow:
      //	'<button type="button" class="caption__btn slick__prev"><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNDhweCIgaGVpZ2h0PSIzM3B4IiB2aWV3Qm94PSIwIDAgNDggMzMiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8dGl0bGU+YXJyb3cgbGlua3M8L3RpdGxlPgogICAgPGcgaWQ9IvCfmqlGaW5hbC1kZXNpZ24tIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4KICAgICAgICA8ZyBpZD0ibW9kZXJuc3BhY2UtaG9tZXBhZ2UiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC05NjMuMDAwMDAwLCAtMjExNi4wMDAwMDApIiBmaWxsPSIjRkZGRkZGIj4KICAgICAgICAgICAgPGcgaWQ9IjUtcHJvamVjdHMtIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxNTAuMDAwMDAwLCAxNzM5LjAwMDAwMCkiPgogICAgICAgICAgICAgICAgPGcgaWQ9InByb2plY3Qtc3BlY3MiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDc3My4wMDAwMDAsIDUwLjAwMDAwMCkiPgogICAgICAgICAgICAgICAgICAgIDxnIGlkPSJhcnJvd3Mtc2FtZW4iIHRyYW5zZm9ybT0idHJhbnNsYXRlKDQwLjAwMDAwMCwgMzI3LjAwMDAwMCkiPgogICAgICAgICAgICAgICAgICAgICAgICA8ZyBpZD0iYXJyb3ctbGlua3MiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI0LjAwMDAwMCwgMTYuMDYyNTAwKSByb3RhdGUoLTE4MC4wMDAwMDApIHRyYW5zbGF0ZSgtMjQuMDAwMDAwLCAtMTYuMDYyNTAwKSB0cmFuc2xhdGUoMC4wMDAwMDAsIDAuMDYyNTAwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNNDcuNzA3MDMxMiwxNS4yOTI5NSBMMzIuNzA3MDMxMiwwLjI5Mjk1IEMzMi4zMTYzNzUsLTAuMDk3NzA2MjUgMzEuNjgzNTYyNSwtMC4wOTc3MDYyNSAzMS4yOTMsMC4yOTI5NSBDMzAuOTAyMzQzNywwLjY4MzYwNjI1IDMwLjkwMjM0MzcsMS4zMTY0MTg3NSAzMS4yOTMsMS43MDY5ODEyNSBMNDQuNTg1OTA2MiwxNC45OTk5ODEzIEwxLjAwMDAzMTI1LDE0Ljk5OTk4MTMgQzAuNDQ3MjgxMjUsMTQuOTk5OTgxMyAwLDE1LjQ0NzI2MjUgMCwxNi4wMDAwMTI1IEMwLDE2LjU1MjY2ODggMC40NDcyODEyNSwxNi45OTk5NTc4IDEuMDAwMDMxMjUsMTYuOTk5OTU3OCBMNDQuNTg1OTA2MiwxNi45OTk5NTc4IEwzMS4yOTMsMzAuMjkyOTUgQzMwLjkwMjM0MzcsMzAuNjgzNjA2MyAzMC45MDIzNDM3LDMxLjMxNjQxODcgMzEuMjkzLDMxLjcwNjk4MTIgQzMxLjQ4ODI4MTIsMzEuOTAyMzU2MiAzMS43NDQxMjUsMzEuOTk5OTU3OCAzMS45OTk5Njg3LDMxLjk5OTk1NzggQzMyLjI1NTkwNjIsMzEuOTk5OTU3OCAzMi41MTE3NSwzMS45MDIzNTYyIDMyLjcwNzAzMTIsMzEuNzA2OTgxMiBMNDcuNzA3MDMxMiwxNi43MDY5ODEyIEM0OC4wOTc2ODc1LDE2LjMxNjQxODggNDguMDk3Njg3NSwxNS42ODM2MDYzIDQ3LjcwNzAzMTIsMTUuMjkyOTUiIGlkPSJGaWxsLTEiPjwvcGF0aD4KICAgICAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgICAgIDwvZz4KICAgICAgICAgICAgPC9nPgogICAgICAgIDwvZz4KICAgIDwvZz4KPC9zdmc+" alt=""></button>',
      //prevArrow:
      //	'<button type="button" class="caption__btn slick__next" o><img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iNDhweCIgaGVpZ2h0PSIzMnB4IiB2aWV3Qm94PSIwIDAgNDggMzIiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8dGl0bGU+QXJyb3cgcmVjaHRzPC90aXRsZT4KICAgIDxnIGlkPSLwn5qpRmluYWwtZGVzaWduLSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPGcgaWQ9Im1vZGVybnNwYWNlLWhvbWVwYWdlIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMTA0MC4wMDAwMDAsIC0yMTE2LjAwMDAwMCkiIGZpbGw9IiNGRkZGRkYiPgogICAgICAgICAgICA8ZyBpZD0iNS1wcm9qZWN0cy0iIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE1MC4wMDAwMDAsIDE3MzkuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICA8ZyBpZD0icHJvamVjdC1zcGVjcyIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNzczLjAwMDAwMCwgNTAuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICAgICAgPGcgaWQ9ImFycm93cy1zYW1lbiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDAuMDAwMDAwLCAzMjcuMDAwMDAwKSI+CiAgICAgICAgICAgICAgICAgICAgICAgIDxnIGlkPSJBcnJvdy1yZWNodHMiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDc3LjAwMDAwMCwgMC4wMDAwMDApIj4KICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGQ9Ik00Ny43MDcwMzEyLDE1LjI5Mjk1IEwzMi43MDcwMzEyLDAuMjkyOTUgQzMyLjMxNjM3NSwtMC4wOTc3MDYyNSAzMS42ODM1NjI1LC0wLjA5NzcwNjI1IDMxLjI5MywwLjI5Mjk1IEMzMC45MDIzNDM3LDAuNjgzNjA2MjUgMzAuOTAyMzQzNywxLjMxNjQxODc1IDMxLjI5MywxLjcwNjk4MTI1IEw0NC41ODU5MDYyLDE0Ljk5OTk4MTMgTDEuMDAwMDMxMjUsMTQuOTk5OTgxMyBDMC40NDcyODEyNSwxNC45OTk5ODEzIDAsMTUuNDQ3MjYyNSAwLDE2LjAwMDAxMjUgQzAsMTYuNTUyNjY4OCAwLjQ0NzI4MTI1LDE2Ljk5OTk1NzggMS4wMDAwMzEyNSwxNi45OTk5NTc4IEw0NC41ODU5MDYyLDE2Ljk5OTk1NzggTDMxLjI5MywzMC4yOTI5NSBDMzAuOTAyMzQzNywzMC42ODM2MDYzIDMwLjkwMjM0MzcsMzEuMzE2NDE4NyAzMS4yOTMsMzEuNzA2OTgxMiBDMzEuNDg4MjgxMiwzMS45MDIzNTYyIDMxLjc0NDEyNSwzMS45OTk5NTc4IDMxLjk5OTk2ODcsMzEuOTk5OTU3OCBDMzIuMjU1OTA2MiwzMS45OTk5NTc4IDMyLjUxMTc1LDMxLjkwMjM1NjIgMzIuNzA3MDMxMiwzMS43MDY5ODEyIEw0Ny43MDcwMzEyLDE2LjcwNjk4MTIgQzQ4LjA5NzY4NzUsMTYuMzE2NDE4OCA0OC4wOTc2ODc1LDE1LjY4MzYwNjMgNDcuNzA3MDMxMiwxNS4yOTI5NSIgaWQ9IkZpbGwtMSI+PC9wYXRoPgogICAgICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICAgICAgPC9nPgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=" alt=""></button>',
      nextArrow: $block.find(".slick__next"),
      prevArrow: $block.find(".slick__prev"),
      variableWidth: true,
      adaptiveHeight: true
    });
  }; // Initialize each block on page load (front end).


  $(document).ready(function () {
    $(".slider--projectpage").each(function () {
      initializeBlock($(this));
    });
  });
})(jQuery);