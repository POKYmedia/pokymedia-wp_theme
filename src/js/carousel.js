// Variables to target our base class,  get carousel items, count how many carousel items there are, set the slide to 0 (which is the number that tells us the frame we're on), and set motion to true which disables interactivity.
const carouselItemSelector = '.carousel-item';
const prevButtonSelector = '.carousel-button-prev';
const nextButtonSelector = '.carousel-button-next';
const items = document.querySelectorAll(carouselItemSelector);
const totalItems = items.length;
let slide = 0;
let moving = true;

function setInitialClasses() {
	items[totalItems - 1].classList.add('prev');
	items[0].classList.add('active');
	items[1].classList.add('next');
}

function removeAllPositionClasses(item) {
	const classList = [...item.classList];
	['next', 'prev', 'active', 'initial'].forEach(cls => {
		if (classList.includes(cls)) {
			item.classList.remove(cls);
		}
	});
}

function setEventListeners() {
	const next = document.querySelectorAll(nextButtonSelector)[0];
	const prev = document.querySelectorAll(prevButtonSelector)[0];

	next.addEventListener('click', moveNext);
	prev.addEventListener('click', movePrev);
}

// Disable interaction by setting 'moving' to true for the same duration as our transition (0.5s = 500ms)
function disableInteraction() {
	moving = true;

	setTimeout(function () {
		moving = false;
	}, 500);
}

function moveCarouselTo(slide) {
	// Check if carousel is moving, if not, allow interaction
	if (!moving) {
		// temporarily disable interactivity
		disableInteraction();

		// Preemptively set variables for the current next and previous slide, as well as the potential next or previous slide.
		let newPrevious = slide - 1,
			newNext = slide + 1,
			oldPrevious = slide - 2,
			oldNext = slide + 2;

		if (totalItems - 1 >= 3) {
			// Checks if the new potential slide is out of bounds and sets slide numbers
			if (newPrevious <= 0) {
				oldPrevious = totalItems - 1;
			} else if (newNext >= totalItems - 1) {
				oldNext = 0;
			}

			// Check if current slide is at the beginning or end and sets slide numbers
			if (slide === 0) {
				newPrevious = totalItems - 1;
				oldPrevious = totalItems - 2;
				oldNext = slide + 1;
			} else if (slide === totalItems - 1) {
				newPrevious = slide - 1;
				newNext = 0;
				oldNext = 1;
			}

			// Now we've worked out where we are and where we're going, by adding and removing classes, we'll be triggering the carousel's transitions.

			// Based on the current slide, reset to default classes.
			// items[oldPrevious].className = carouselItemSelector;
			// items[oldNext].className = carouselItemSelector;

			// Add the new classes
			removeAllPositionClasses(items[newPrevious]);
			items[newPrevious].classList.add('prev');
			removeAllPositionClasses(items[slide]);
			items[slide].classList.add('active');
			removeAllPositionClasses(items[newNext]);
			items[newNext].classList.add('next');
		}
	}
}

// Next navigation handler
function moveNext(event) {
	event.preventDefault();

	// Check if moving
	if (!moving) {
		// If it's the last slide, reset to 0, else +1
		if (slide === totalItems - 1) {
			slide = 0;
		} else {
			slide++;
		}

		// Move carousel to updated slide
		moveCarouselTo(slide);
	}
}

// Previous navigation handler
function movePrev(event) {
	event.preventDefault();

	// Check if moving
	if (!moving) {
		// If it's the first slide, set as the last slide, else -1
		if (slide === 0) {
			slide = totalItems - 1;
		} else {
			slide--;
		}

		// Move carousel to updated slide
		moveCarouselTo(slide);
	}
}

// Initialise carousel
export function initCarousel() {
	setInitialClasses();
	setEventListeners();

	// Set moving to false now that the carousel is ready
	moving = false;
}
