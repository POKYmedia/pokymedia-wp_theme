let mix = require('laravel-mix');

mix.setPublicPath('dist')
	.js('src/js/script.js', 'js')
	.sass('src/scss/style.scss', 'css')
	.copyDirectory('src/assets', 'dist/assets')
	.copyDirectory('src/fonts', 'dist/fonts')
	.options({
		cleanCss: {
			level: {
				1: {
					specialComments: 'none',
				},
			},
		},
		processCssUrls: false,
		postCss: [
			require('tailwindcss'),
			require('autoprefixer'),
			require('postcss-discard-comments')({ removeAll: true }),
		],
	})
	.browserSync({
		proxy: process.env.MIX_APP_HOST,
		host: process.env.MIX_APP_HOST,
		open: 'external',
		files: ['./**/*.css', './**/*.js'],
	})
	.disableNotifications();
