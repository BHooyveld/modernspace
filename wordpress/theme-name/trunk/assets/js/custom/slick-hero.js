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
			speed: 500,
			slidesToShow: 1,
			centerMode: false,
			variableWidth: false,
			adaptiveHeight: false,
			arrows: false,
			autoplay: true,
			autoplaySpeed: 8000,
			cssEase: "linear",
			fade: true,

			//cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
		});
	};

	var initializeSlide = function ($rotate, $index) {
		$rotate
			.removeClass("is-visible")
			.addClass("is-hidden")
			.eq($index)
			.removeClass("is-hidden")
			.addClass("is-visible");

		//$caption.addClass("fadeIn").removeClass("fadeOut");
	};

	// Initialize each block on page load (front end).
	$(document).ready(function () {
		$(".slider--hero")
			.on("beforeChange", function (event, slick, currentSlide, nextSlide) {
				const $rotate = $(".cd-words-wrapper b");
				setTimeout(() => {
					initializeSlide($rotate, nextSlide);
				}, 100);
			})
			.on("afterChange", function (event, slick, currentSlide) {
				$(".slider--hero")
					.find(".slides")
					.slick("slickSetOption", "autoplaySpeed", 7500, false);
			})
			.on("init", function (event) {
				setTimeout(() => {
					const $rotate = $(".cd-words-wrapper").removeClass("initializing");
				}, 2500);
			});

		$(".slider--hero").each(function () {
			initializeBlock($(this));
		});
	});
})(jQuery);
