import $ from 'jquery';
import Carousel from './carousel';
import { initNavigation } from './navigation';
import { initPhotoSwipe } from './photoswipe';

$(document).ready(() => {
	initNavigation();

	initPhotoSwipe('#mosaic-gallery');

	// jumbotron carousel
	new Carousel('#jumbotron-carousel', { userControlsEnabled: false, autoScroll: 3000 });

	// carousel for testimonials
	new Carousel('#testimonial-carousel');
});
