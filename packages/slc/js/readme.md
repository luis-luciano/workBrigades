Js - Auxiliar para estucturar Javascript y Css de un proyecto en Laravel

Introducción
	Este paquete es una propuesta para estructurar recursos de Javascript y Css de un proyecto en Laravel.
	La estructura de los directorios para Javascript es similar a la que tiene Laravel.

	Esta estructura incluye por defecto los siguientes plugins:
	jquery 2.1.4 - con esto se puede ocupar jquery en toda la aplicción.
	parsleyjs 2.2.0-rc1 - es un plugin auxiliar para los validadores.

Instalación.
	Nota: Para utilizar este paquete se debe contar con la instalación elemental de módulos en un proyecto en laravel, para esto se debe ejecutar lo siguiente en la raíz del proyecto:
			npm install

	Para añadir paquetes creados de manera local a un proyecto en laravel es bueno crear un directorio llamado "packages" en la raíz del proyecto:
	En esta carpeta se almacenará el paquete slc/js, así que la carpeta con nombre "slc" se copiará a la carpeta "packages" quedando la siguiente estructura:
	packages/slc/js/...

	De esta manera ya se tiene el paquete en la estructura del proyecto pero hay que registrarlo en composer.json y esto es de la siguiente manera:
	En la sección de carga utilizando PSR-4, se agrega como se muestra:

	"psr-4": {
	    "App\\": "app/",
	    "Slc\\Js\\": "packages/slc/js/src/"
	}

	Consecutivamente, se registra en el AppServiceProvider localizado en app/Providers/AppServiceProvider.php, de la siguiente manera:
	En el método register.

	public function register()
	{
	    if ($this->app->environment() == 'local') {
	        $this->app->register(\Slc\Js\JsServiceProvider::class);
	    }
	}

	Esto garantiza que mientras la aplicación se encuentre en desarrollo de manera local se tendrá la disposición de las funcionalidades de este paquete.

	Finalmente, se realiza un volcado de las clases registradas en el proyecto con composer, de la siguiente manera:
	composer dumpautoload

	con esto se debe tener la disponibilidad de los siguientes comandos en el artisan:

	php artisan js:make:controller
	php artisan js:make:validator
	php artisan js:make:listener
	php artisan js:dumpautoload
	php artisan js:make:helper
	php artisan js:make:config
	php artisan js:init

	Se puede observar la ayuda y opciones de cada comando anteponiendo la palabra help antes de un comando.
	ej.
	php artisan help js:make:controller

Iniciando.
	Para iniciar con una correcta estructura se recomienda asignar permisos de lectura, escritura y ejecución a las carpetas: resources, public, storage y  bootstrap, de la siguiente manera:
	chmod -R 777 bootstrap
	chmod -R 777 public
	chmod -R 777 resources
	chmod -R 777 storage

	Ahora para generar la estructura para los assets se inicializa ejecutando el comando:
	php artisan js:init

	Con esto se crea una estructura de directorios dentro de resources/assets
	y se crea un archivo en la raíz llamado js-gulpfile.js el cual es un archivo ejemplo de un gulpfile 
	para empezar a trabajar con los assets de tal manera que se produzcan solamente un archivo para el contenido css
	y un sólo archivo para el contenido javascript en la aplicación.
	Si se opta por trabajar con este gulpfile simplemente se elimina o renombra el gulpfile.js actual y se renombra el archivo js-gulpfile.js a gulpfile.js

Uso.
	Leer acerca de éste módulo en el archivo theBasics.md

Síntesis.
	Para generar los archivos hay diversas opciones y se puede realizar de la siguiente manera:
	Para una generación elemental basta con ejecutar la siguiente instrucción:
	gulp
	Para una generación de producción, esto es siempre recomendable para tener los archivos minimizados, se ejecuta lo siguiente:
	gulp --production

	Cabe mencionar que cada vez que se realicen cambios en javascript, se agreguen nuevos css o js hay que ejecutar gulp
	para mantener nuestros archivos fuente de la aplicación actualizados.
	Una manera para satisfacer esto es con:
	gulp watch
	y también puede funcionar en la manera de producción:
	gulp --production watch
	pero al haber errores en javascript o en alguna parte de la ejecución de tareas tiende a fallar. Por esto se recomienda ejecutar gulp como se mostró anteriormente.

Implementación.
	Para utilizar los recursos anteriormente generados se tienen que agregar a la aplicación en el layout maestro, del cual hereden las vistas.
	Esto es como se muestra a continuación:
	En el Head
	Para Css
	<link rel="stylesheet" type="text/css" href="{{ elixir('css/style.css') }}">
	Nota: Si no se tiene css generado, se recomienda no se coloque lo anterior.

	Antes de terminar Body </body>
	Para Javascript
	<script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
	<script type="text/javascript">
		@yield('scripts')
	</script>
	Nota: cabe mencionar que la sección de scripts es para que en las vistas que heredan de este layout utilicen los controladores de esa vista.
	ej.
	@section('scripts')
		postsController.create();
	@stop
