import { initCarousel } from './carousel';

let opened = false;
const navbarToggle = document.getElementById('navbarToggleBtn');
const navbarMenu = document.getElementById('navbarMenu');

function toggleNavigation(event) {
	event.preventDefault();
	opened ? navbarMenu.classList.add('hidden') : navbarMenu.classList.remove('hidden');
	opened = !opened;
}

export function initNavigation() {
	navbarToggle.addEventListener('click', toggleNavigation);
}
