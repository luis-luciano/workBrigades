Convenciones.

	Reglas de nombrado generales.
		camelCase, es colocar una palabra iniciando en minúsculas y en caso de continuar otra palabra colocar la inicial en Mayúscula. ej. hola, holaComoEstas

		snake_case, esta situación es que se ocupen puras minúsculas y en caso de continuar otra palabra separarla con un guión bajo. ej. hola, hola_como_estas

		StudlyCaps, es colocar las palabras iniciando por la mayúscula en cada una. ej. Hola, HolaComoEstas

	Javascript es un lenguaje que utiliza tradicionalmente camelCase así que camelCase se tendrá que utilizar en todos los escenarios incluyendo el nombrado de archivos.

	Escribir ; (punto y coma) al final de cada sentencia pertinente.

Módulos.
	Para facilitar el uso de módulos en Javascript y así poder reutilizar el código y seccionar en módulos la aplicación se utiliza Browserify.
	Esto permite crear objetos, funciones, propiedades o rutinas y reutilizarlas en donde se requiera.
	Para esto se encontrará continuamente con lo siguiente al inicio de cada archivo:
	module.exports
	lo cual permitirá exportar dicho módulo y ser reutilizado con la función require(), la cual permitirá requerir un módulo e incluso otorgar argumentos a través de el, require("square.js")(3)

Objetos.
	Se utiliza el patrón "Revealing Module Pattern" para crear objetos, un ejemplo de ello es el validador que se incluye en app/validators/validator.js

	Para variables y funciones privadas:
		Debe anteponerse un guión bajo como prefijo, antes del nombre.

	Para variables y funciones públicas:
		A diferencia de las privadas, debe escribirse sin guión bajo antes del nombre.

	Al final se observa un return de un objeto, éste sólo debe retornar las funciones públicas, las que se usarán prácticamente desde la vista u otro módulo:
	{
	    init: init,
	};

	// app/validators/validator.js
	module.exports = (function() {

	    /**
	     * Form element in DOM.
	     */
	    var _form;

	    /**
	     * Validator rules.
	     */
	    var _rules = {};

	    /**
	     * Initialize the validator.
	     *
	     * @param DOM form
	     * @param JSON rules
	     * @return void
	     */
	    var init = function(form, rules) {
	        _form = form;
	        _rules = rules;

	        _setup();
	    };

	    /**
	     * Setup stuff for validation.
	     */
	    var _setup = function() {
	        _form.parsley();

	        // Apply validation rules
	        _applyRules(_rules);
	    };

	    /**
	     * Iterate and apply every validation rule based on parsley plugin.
	     *
	     * @param JSON rules
	     * @return void
	     */
	    var _applyRules = function(rules) {
	        $.each(rules, function(field, constraints) {
	            $.each(constraints, function(constraint, value) {
	                $('[name="' + field + '"]').attr('data-parsley-' + constraint, value);
	            }.bind(field));
	        });
	    }.bind($);

	    return {
	        init: init,
	    };
	})();

	Si se desea reutilizar un objeto en otro módulo es prudente declararlo y utilizarlo.
	ej.
	var postsController = require('./app/controllers/postController.js');
	postController.create();

Funciones | Helpers.
	Algo tan simple como una función que otorgue una alerta puede ser reutilizada escribiendola de la siguiente manera:
	// alert.js
	module.exports = function(text) {
		alert(text);
	};

	Para utilizarla es recomendable hacerlo a través de la función require.
	ej.
	require('./helpers/alert.js')('Hola!');

	ó declarándola
	ej.
	var myAlert = require('./helpers/alert.js');
	myAlert('Hola!');

	Pueden ser creadas con el siguiente comando:
	php artisan js:make:helper
	ej.
	php artisan js:make:helper alert

Rutinas.
	Los archivos de configuración son rutinas que comunmente se ejecutan para configurar un uso o configuración de un elemento. Un ejemplo es el archivo de configuración de jquery.
	// config/jquery.js
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	Esto permite obtener el token csrf que provee laravel, evidentemente de una etiqueta meta:
		<meta name="csrf-token" content="{{ csrf_token() }}">

	Como se observa el contenido del archivo de configuración de jquery en esta situación es una pequeña rutina y fácilmente se puede requerir
	desde otro módulo con la función require().
	ej.
	require('../config/jquery.js')

	De esta manera esta rutina se ejecutará en cuanto sea requerida.

Controladores.
	Se recomienda crear un controlador por recurso y un método se debe de encargar de una vista.
	Por lo que generalmente se iniciará con un controller.
	ej.
	php artisan js:make:controller postsController
	
	Los controladores se localizan en la carpeta app/controllers.
	Cabe mencionar que de esta manera se generará un controlador con los métodos tradicionalmente usados en una aplicación; index, create, edit.

	En el método se declara todo lo que la vista ocupará para que en su implementación se ejecute sólo lo correspondietne a esa vista.
	ej.
	// app/controllers/postsController.js
	module.exports = (function($) {

	    var index = function() {
	    	var text = 'Beib';
	        require('../helpers/alert.js')('Hola, ' + text);
	    };

	    // return the variables to be public
	    return {
	        index: index,
	    };

	})(window.jQuery);

	La implementación en la vista será únicamente de la siguiente manera:
	postsController.index();

	donde la vista más recomendada para esta acción esté localizada en:
	resources/views/posts/index.blade.php

Validadores.
	Los validadores utilizan un plugin por defecto que es parsleyjs y las reglas de validación son la que este plugin contiene, la documentación puede ser encontrada en http://parsleyjs.org/doc/index.html
	Crear validadores es una tarea sencilla utilizando el generador otorgado, de la siguiente manera:
	php artisan js:make:validator postValidator
	
	Los validadores se localizan en la carpeta app/validators.
	
	Un ejemplo de validador es el siguiente:
	module.exports = function(form) {
		require('./validator.js').init(form, {
			name: {
				required: "true",
				minlength : 3,
            	maxlength : 80,
			}
		});
	};

	Para implementar este validador basta con ser requerido en donde se necesite y tener como argumento el formulario en el que se va a aplicar cierto validador.
	ej.
	// app/controllers/postsController.js
	module.exports = (function($) {

	    var create = function() {
	        require('../validators/postValidator.js')($('#createPostForm'));
	    };

	    // return the variables to be public
	    return {
	        create: create,
	    };

	})(window.jQuery);

	Validadores personalizados.
	Parsley permite añadir validadores personalizados, así que se aprovecha esta propiedad. Una implementación correcta es hacer un validatorProvider en app/providers/validatorProvider.js
	un ejemplo es el siguiente:
	// app/providers/validatorProvider.js
	var isCurp = function(value) {
	    if (value.length != 18) {
	        return false;
	    }

	    value = value.toUpperCase();

	    var badWords = ['BACA', 'LOCO', 'BAKA', 'LOKA', 'BUEI', 'LOKO', 'BUEY', 'MAME', 'CACA', 'MAMO', 'CACO', 'MEAR', 'CAGA', 'MEAS', 'CAGO', 'MEON', 'CAKA', 'MIAR', 'CAKO', 'MION', 'COGE', 'MOCO', 'COGI', 'MOKO', 'COJA', 'MULA', 'COJE', 'MULO', 'COJI', 'NACA', 'COJO', 'NACO', 'COLA', 'PEDA', 'CULO', 'PEDO', 'FALO', 'PENE', 'FETO', 'PIPI', 'GETA', 'PITO', 'GUEI', 'POPO', 'GUEY', 'PUTA', 'JETA', 'PUTO', 'JOTO', 'QULO', 'KACA', 'RATA', 'KACO', 'ROBA', 'KAGA', 'ROBE', 'KAGO', 'ROBO', 'KAKA', 'RUIN', 'KAKO', 'SENO', 'KOGE', 'TETA', 'KOGI', 'VACA', 'KOJA', 'VAGA', 'KOJE', 'VAGO', 'KOJI', 'VAKA', 'KOJO', 'VUEI', 'KOLA', 'VUEY', 'KULO', 'WUEI', 'LILO', 'WUEY', 'LOCA'];

	    if ($.inArray(value.substr(0, 4), badWords) !== -1) {
	        return false;
	    }

	    if (!(value.substr(0, 4).match(/[A-Z]{4}/))) {
	        return false;
	    }

	    var date = value.substr(4, 6);

	    if (!(date.match(/[0-9]{6}/))) {
	        return false;
	    }

	    if (!(moment(date, "YYMMDD").isValid())) {
	        return false;
	    }

	    if (!(value.substr(10, 1).match(/[HM]{1}/))) {
	        return false;
	    }

	    var states = ['AS', 'BC', 'BS', 'CC', 'CS', 'CH', 'CL', 'CM', 'DF', 'DG', 'GT', 'GR', 'HG', 'JC', 'MC', 'MN', 'MS', 'NT', 'NL', 'OC', 'PL', 'QT', 'QR', 'SP', 'SL', 'SR', 'TC', 'TS', 'TL', 'VZ', 'YN', 'ZS', 'NE'];

	    if ($.inArray(value.substr(11, 2), states) === -1) {
	        return false;
	    }

	    if (!(value.substr(13, 3).match(/[B-DF-HJ-NP-TV-Z]{3}/))) {
	        return false;
	    }

	    if (!(value.substr(16, 1).match(/[0-9A-Z]{1}/))) {
	        return false;
	    }

	    if (!(value.substr(17, 1).match(/[0-9]{1}/))) {
	        return false;
	    }

	    return true;
	};

	window.Parsley.addValidator('curp', function(value, element) {
	        return isCurp(value);
	    }, 32)
	    .addMessage('es', 'curp', 'No es una CURP válida.');

	Una vez hecho el provider debe ser registrado en la aplicación en config/app.js de la siguiente manera:
	// config/app.js
	require('../app/providers/pluginProvider.js');
	require('../app/providers/eventProvider.js');
	require('../app/providers/validatorProvider.js');

	La implementación del validador personalizado puede ser de la siguiente manera:

	module.exports = function(form) {
		require('./validator.js').init(form, {
			name: {
				required: "true",
            	curp : "true",
			}
		});
	};

	Cabe mencionar que el validador fue detallado en el mismo provider. Se recomienda hacer una carpeta dentro de validators, quizá llamada appValidators,
	que contenga los validadores de la aplicación y estén alojados en diversos archivos, probablemente curp.js, y sean requeridos en el validatorProvider.
	
	Más información acerca de los validadores personalizados puede encontrarse en la documentación. http://parsleyjs.org/doc/index.html

Plugins.
	Añadir un plugin al proyecto no es problema, sólo es cuestión de orden, prácticamente sólo son los siguientes pasos:
		1. Almacenar el plugin en la carpeta /resources/assets/plugins/, el plugin debe estar contenido en una carpeta con su nombre.
		2. Registrar los recursos css y js en el gulpfile donde corresponda.
		3. Hacer un archivo de configuración para el plugin en config/ con el nombre del plugin.
		4. Registrar el plugin en el pluginProvider.

	A continuación se demostrará añadiendo el plugin select2 el cual favorece en hacer selectboxes potentes.
	
	Siguiendo los pasos descritos anteriormente:
	1. Una vez descargado select2, trae consigo una carpeta llamada "dist" que es la contenedora propiamente del plugin; css, js y archivos de idioma.
		Se coloca esta carpeta con el nombre de select2 en la carpeta /resources/assets/plugins/

	2. En el gulpfile que se otorga hay que añadir el css y js de select2 como se muestra:
	El css
	mix.styles([
		'./resources/assets/plugins/select2/css/select2.min.css',
	], 'public/css/style.css');

	Nota: El . (punto) en la ruta antes de /resources indica que es apartir de donde se encuentra el gulpfile.

	Y descomentar la parte pertinente del gulpfile para ser añadido en el versionamiento, quedando de la siguiente manera:
	// mix.version('js/app.js'); // comment if have javascript and css
	mix.version(['js/app.js', 'css/style.css']); // uncomment if have javascript and css

	El js
	Descomentamos la sección pertinente quedando de la siguiente manera:
	// Javascript
	// uncomment if have javascript
	mix.scripts([
		'plugins/select2/js/select2.min.js',
		'plugins/select2/js/i18n/es.js',
	], tmpJavascript + 'vendor.js', 'resources/assets/');

	Nota: En este caso las rutas son relativas a resources/assets/ por esta razón se inicia la ruta con plugins/

	Y descomentar la parte pertinente del gulpfile para ser añadido en la concatenación, quedando de la siguiente manera:
	mix.scripts([
		'core.js',
		'vendor.js', // uncomment if have javascript
		'bundle.js',
	], 'public/js/app.js', tmpJavascript);

	3. Ahora, es preciso hacer un archivo de configuración. Para esto se tiene un generador el cual se ocupará de la siguiente manera:
	php artisan js:make:config select2

	Este comando generará un archivo de configuración en config/ llamado select2.js
	En éste se debe detallar el uso de select2 en el proyecto, por ejemplo:
	$(".select2").select2({
		language: "es"
	});
	
	De esta manera cualquier elemento, de acuerdo a select2, que tenga la clase select2 podrá tener las bondades de dicho plugin.

	4. Finalmente, se debe registrar en el pluginProvider ubicado en app/providers/pluginProvider.js como se muestra:

	require('../../config/jquery.js');
	require('../../config/parsley.js');
	require('../../config/select2.js');

	Nota: No olvidar que hay que ejecutar gulp para tener los recursos de css y js en el proyecto actualizados.