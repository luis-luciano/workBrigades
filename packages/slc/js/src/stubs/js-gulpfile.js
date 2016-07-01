var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	var tmpJavascript = 'resources/assets/js/tmp/';

	// core scripts
	mix.scripts([
		'plugins/jquery/jquery-2.1.4.min.js',
		'plugins/parsley/i18n/es.js',
		'plugins/parsley/parsley.min.js',
	], tmpJavascript + 'core.js', 'resources/assets/');

	// CSS
	mix.styles([
		// css files
	], 'public/css/style.css');

	// Javascript
	// uncomment if have javascript
	/*mix.scripts([
		// javascript files
	], tmpJavascript+'vendor.js', 'resources/assets/');
	*/

	// Application
	mix.browserify('bootstrap/app.js', tmpJavascript + 'bundle.js');

	mix.scripts([
		'core.js',
		//'vendor.js', // uncomment if have javascript
		'bundle.js',
	], 'public/js/app.js', tmpJavascript);

	mix.version('js/app.js'); // comment if have javascript and css
	// mix.version(['js/app.js', 'css/style.css']); // uncomment if have javascript and css
});