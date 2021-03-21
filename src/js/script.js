import { initNavigation } from './navigation';
import Carousel from './carousel';

initNavigation();

// jumbotron carousel
new Carousel('#jumbotron-carousel', { userControlsEnabled: false, autoScroll: 3000 });

// carousel for testimonials
new Carousel('#testimonial-carousel');
