// Variables to target our base class,  get carousel items, count how many carousel items there are, set the slide to 0 (which is the number that tells us the frame we're on), and set motion to true which disables interactivity.

export default class Carousel {
	root = '';
	moving = false;
	totalItems = 0;
	currentSlide = 0;
	options = {};

	constructor(root, options = {}) {
		this.root = root;
		this.options = {
			carouselItemSelector: '.carousel-item',
			prevButtonSelector: '.carousel-button-prev',
			nextButtonSelector: '.carousel-button-next',
			moving: false,
			userControlsEnabled: true,
			autoScroll: 0,
			...options,
		};

		if (document.querySelector(root) > 0) {
			this.init();
		}

		// Set moving to false now that the carousel is ready
		this.moving = this.options.moving;
	}

	init() {
		this.items = document.querySelectorAll(`${this.root} ${this.options.carouselItemSelector}`);
		this.totalItems = this.items.length;

		if (this.totalItems > 1) {
			// set initial classes
			this.items[this.totalItems - 1].classList.add('prev');
			this.items[0].classList.add('active');
			this.items[1].classList.add('next');

			if (this.options.autoScroll > 0) {
				this.setAutoScrollTimeout();
			}
		}

		if (this.options.userControlsEnabled) {
			// set event listeners to prev/next button clicks
			const next = document.querySelectorAll(`${this.root} ${this.options.nextButtonSelector}`)[0];
			const prev = document.querySelectorAll(`${this.root} ${this.options.prevButtonSelector}`)[0];

			if (this.totalItems > 1) {
				next.addEventListener('click', this.moveNext.bind(this));
				prev.addEventListener('click', this.movePrev.bind(this));
			} else {
				prev.style.display = 'none';
				next.style.display = 'none';
			}
		}
	}

	setAutoScrollTimeout() {
		return setTimeout(() => {
			this.moveNext();
			return this.setAutoScrollTimeout();
		}, this.options.autoScroll);
	}

	// Next navigation handler
	moveNext(event) {
		if (event) {
			event.preventDefault();
		}

		// Check if moving
		if (!this.moving) {
			// If it's the last slide, reset to 0, else +1
			if (this.currentSlide === this.totalItems - 1) {
				this.currentSlide = 0;
			} else {
				this.currentSlide++;
			}

			// Move carousel to updated slide
			this.moveCarouselTo(this.currentSlide);
		}
	}

	// Previous navigation handler
	movePrev(event) {
		event.preventDefault();

		// Check if moving
		if (!this.moving) {
			// If it's the first slide, set as the last slide, else -1
			if (this.currentSlide === 0) {
				this.currentSlide = this.totalItems - 1;
			} else {
				this.currentSlide--;
			}

			// Move carousel to updated slide
			this.moveCarouselTo(this.currentSlide);
		}
	}

	moveCarouselTo(slide) {
		// Check if carousel is moving, if not, allow interaction

		if (!this.moving) {
			// temporarily disable interactivity
			this.disableInteraction();

			// Preemptively set variables for the current next and previous slide, as well as the potential next or previous slide.
			let newPrevious = slide - 1,
				newNext = slide + 1,
				oldPrevious = slide - 2,
				oldNext = slide + 2;

			if (this.totalItems - 1 >= 2) {
				// Checks if the new potential slide is out of bounds and sets slide numbers
				if (newPrevious <= 0) {
					oldPrevious = this.totalItems - 1;
				} else if (newNext >= this.totalItems - 1) {
					oldNext = 0;
				}

				// Check if current slide is at the beginning or end and sets slide numbers
				if (slide === 0) {
					newPrevious = this.totalItems - 1;
					oldPrevious = this.totalItems - 2;
					oldNext = slide + 1;
				} else if (slide === this.totalItems - 1) {
					newPrevious = slide - 1;
					newNext = 0;
					oldNext = 1;
				}

				// Now we've worked out where we are and where we're going, by adding and removing classes, we'll be triggering the carousel's transitions.

				// Based on the current slide, reset to default classes.
				// items[oldPrevious].className = carouselItemSelector;
				// items[oldNext].className = carouselItemSelector;

				// Add the new classes
				this.removeAllPositionClasses(this.items[newPrevious]);
				this.items[newPrevious].classList.add('prev');
				this.removeAllPositionClasses(this.items[slide]);
				this.items[slide].classList.add('active');
				this.removeAllPositionClasses(this.items[newNext]);
				this.items[newNext].classList.add('next');
			}
		}
	}

	removeAllPositionClasses(item) {
		const classList = [...item.classList];
		['next', 'prev', 'active', 'initial'].forEach(cls => {
			if (classList.includes(cls)) {
				item.classList.remove(cls);
			}
		});
	}

	// Disable interaction by setting 'moving' to true for the same duration as our transition (0.5s = 500ms)
	disableInteraction() {
		this.moving = true;

		setTimeout(() => {
			this.moving = false;
		}, 500);
	}
}
