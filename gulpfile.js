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
		'plugins/lodash/lodash.min.js',
		'plugins/parsley/i18n/es.js',
		'plugins/parsley/parsley.min.js',
	], tmpJavascript + 'core.js', 'resources/assets/');

	// CSS
	mix.styles([
		// css files
		// template core
	    './resources/assets/template/admin1/css/admin1.css',
	    './resources/assets/template/globals/css/elements.css',
	    // styles
	    './resources/assets/css/style.css',
	    //color selector
		/*'./resources/assets/plugins/pnikolov-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
		'./resources/assets/plugins/minicolors/jquery.minicolors.css',
		'./resources/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
		'./resources/assets/plugins/clockface/css/clockface.css',
		'./resources/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
		'./resources/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',*/
	    //table responsive 
	    './public/assets/globals/plugins/rickshaw/rickshaw.min.css',
	    './public/assets/globals/plugins/bxslider/jquery.bxslider.css',
	    './public/assets/globals/plugins/datatables/media/css/jquery.dataTables.min.css',
	    './public/assets/globals/plugins/datatables/themes/bootstrap/dataTables.bootstrap.css',

		'./public/assets/globals/plugins/pnikolov-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
		'./public/assets/globals/plugins/minicolors/jquery.minicolors.css',
		'./public/assets/globals/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css',
		'./public/assets/globals/plugins/clockface/css/clockface.css',
		'./public/assets/globals/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
		'./public/assets/globals/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css',

	    // plugins select2
	    './resources/assets/plugins/select2/css/select2.min.css',
	    './resources/assets/plugins/select2-bootstrap/select2-bootstrap.min.css',
	    //chart
	    './resources/assets/plugins/c3js-chart/c3.min.css',
	    //sweetAlert
	    './resources/assets/plugins/sweetAlert/sweetalert.css',
	    './public/assets/globals/plugins/bootstrap-fileinput/css/fileinput.css',
	    './public/assets/globals/plugins/photoswipe/photoswipe.css',
	    './public/assets/globals/plugins/photoswipe/default-skin/default-skin.css',
	    // template plugins
	    './public/assets/globals/plugins/bxslider/jquery.bxslider.css',
	    './resources/assets/template/globals/css/plugins.css',

	], 'public/css/style.css');

	//Javascript
	// uncomment if have javascript
	mix.scripts([
		// javascript files
		// template plugins
	    'plugins/jquery-ui/jquery-ui.min.js',
	    '../../public/assets/globals/plugins/bootstrap/dist/js/bootstrap.min.js',
	    'plugins/velocity/velocity.min.js',
	    'plugins/moment/min/moment-with-locales.min.js',
	    'plugins/toastr/toastr.min.js',
	    'plugins/scrollMonitor/scrollMonitor.js',
	    'plugins/textarea-autosize/dist/jquery.textarea_autosize.min.js',
	    'plugins/bootstrap-select/dist/js/bootstrap-select.min.js',
	    'plugins/fastclick/lib/fastclick.js',
	    '../../public/assets/globals/plugins/bxslider/jquery.bxslider.min.js',
	     //Tables
	    'plugins/datatables/media/js/jquery.dataTables.min.js',
	    'plugins/datatables/themes/bootstrap/dataTables.bootstrap.js',
	    '../../public/assets/globals/scripts/tables-datatables.js',
	    // plugins
	    'plugins/select2/js/select2.full.min.js',
	    'plugins/select2/js/i18n/es.js',
		'plugins/sweetAlert/sweetalert.min.js',
	    // chart
	    'plugins/d3/d3.min.js',
		'plugins/c3js-chart/c3.min.js',
	    /*'../../public/assets/globals/scripts/charts-c3.js'*/,
	    
	    '../../public/assets/globals/plugins/bootstrap-fileinput/js/fileinput.js',
	    '../../public/assets/globals/plugins/bootstrap-fileinput/js/fileinput_locale_es.js',
	    '../../public/assets/globals/plugins/photoswipe/photoswipe.min.js',
	    '../../public/assets/globals/plugins/photoswipe/photoswipe-ui-default.min.js',
	    // template core
	    'template/globals/js/pleasure.js',
	    'template/admin1/js/layout.js',

	], tmpJavascript+'vendor.js', 'resources/assets/');
	

	// Application
	mix.browserify('bootstrap/app.js', tmpJavascript + 'bundle.js');

	mix.scripts([
		'core.js',
		'vendor.js', // uncomment if have javascript
		'bundle.js',
	], 'public/js/app.js', tmpJavascript);

	// PUBLIC
	// CSS
	mix.styles([
	    // template core
	    './public/assets/globals/plugins/fontawesome/css/font-awesome.css',
	    './public/assets/globals/plugins/bootstrap/dist/css/bootstrap.css',
	    // styles
	    /*'./resources/assets/css/style-open.css',*/
	// plugins
	// template plugins
	], 'public/css/style-open.css');

	// Javascript
	// core scripts
	mix.scripts([
	    'plugins/jquery/jquery-2.1.4.min.js',
	    '../../public/assets/globals/plugins/bootstrap/dist/js/bootstrap.min.js',
	    /*'plugins/angular/angular.min.js',
	    'plugins/angular/angular-route.js',
	    'js/public/script.js',
	    'plugins/jquery.arctext/jquery.arctext.js',
	    'plugins/jquery.color/jquery.color.min.js',*/
	    'plugins/parsley/i18n/es.js',
	    'plugins/parsley/parsley.min.js',
	], 'public/js/app-open.js', 'resources/assets/');

	//mix.version('js/app.js'); // comment if have javascript and css
	mix.version(['js/app-open.js', 'css/style-open.css', 'js/app.js', 'css/style.css']); // uncomment if have javascript and css
});