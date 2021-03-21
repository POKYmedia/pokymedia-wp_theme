module.exports = {
	darkMode: false, // or 'media' or 'class'
	purge: {
		preserveHtmlElements: false,
		content: [
			'./*.php',
			'./partials/**/*.php',
		],
	},
	theme: {
		inset: {
			'-8': '-2rem',
			'-12': '-3rem',
			'-16': '-4rem',
		},
		extend: {
			height: {
				72: '18rem',
				84: '21rem',
				96: '24rem',
				108: '27rem',
			},
			lineHeight: {
				12: '2.75rem',
				16: '3rem',
				18: '3.25rem',
				24: '3.5rem',
				32: '3.75rem',
				36: '4rem',
			},
		},
	},
	variants: {
		extend: {
			borderColor: ['focus'],
		},
	},
	plugins: [],
};
