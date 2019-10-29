const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
	.scripts([
		'node_modules/jquery/dist/jquery.min.js',
		'node_modules/@fortawesome/fontawesome-free/js/fontawesome.js',
		'node_modules/bootstrap/dist/bootstrap.min.js',
		'node_modules/popper/dist/popper.min.js',
		'resources/js/custom.js',		
	], 'public/js/main.js')
   .sass('resources/sass/app.scss', 'public/css')
   .browserSync('localhost/FoodVibe/public');