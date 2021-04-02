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

	var initializeBlock = function ($block) {
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
			adaptiveHeight: true,
		});
	};

	var initializeSlide = function ($slide, $caption) {
		$caption.find(".logo.content").html($slide.data("logo"));
		$caption.find(".year.content").html($slide.data("year"));
		$caption.find(".location.content").html($slide.data("location"));
		$caption.find(".category.content").html($slide.data("category"));
		$caption
			.find(".type_of_project.content")
			.html($slide.data("type_of_project"));
		$caption.find(".scope_of_work.content").html($slide.data("scope_of_work"));

		setTimeout(() => {
			const height = $caption.find(".caption__body-bg").outerHeight();
			$caption.addClass("fadeIn").removeClass("fadeOut");
		}, 100);
	};

	// Initialize each block on page load (front end).
	$(document).ready(function () {
		$(".slider--homepage")
			.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
				var $caption = $(this).find(".caption");
				var $slide = $(slick.$slides[nextSlide]);
				$caption.addClass("fadeOut").removeClass("fadeIn");
				initializeSlide($slide, $caption);
			})
			.on("init", function (event) {
				var $slide = $(this).find(".slick-current");
				var $caption = $(this).find(".caption");
				initializeSlide($slide, $caption);
			});

		$(".slider--homepage").each(function () {
			initializeBlock($(this));
		});
	});
})(jQuery);
