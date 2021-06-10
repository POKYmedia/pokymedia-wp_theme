import $ from 'jquery';

export function initScrollToTop(selector) {
	$(window).scroll(function () {
		if ($(this).scrollTop() >= 500) {
			$(selector).fadeIn(500); // Fade in the arrow
		} else {
			$(selector).fadeOut(500); // Else fade out the arrow
		}
	});

	$(selector).click(function () {
		// When arrow is clicked
		$('body,html').animate(
			{
				scrollTop: 0, // Scroll to top of body
			},
			500
		);
	});
}

export function initScrollToBottom(selector) {
	$(selector).click(function () {
		// When arrow is clicked
		$('body,html').animate(
			{
				scrollTop: 750,
			},
			1000
		);
	});
}
