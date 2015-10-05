<?php

/**
 * Fichero de configuración
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

/*
| ------------------------------------------------------------------------------
| Variables de configuración
| ------------------------------------------------------------------------------
|
| Estas variables configuran los parámetros generales de funcionamiento
|
 */
$modo_de_la_app  = "desarrollo";	// desarrollo | test
$fuente_de_datos = "bd"; 			// bd  | ficheros

$ejecutar_test   = TRUE;			//TRUE | FALSE

$trazado_activo  = TRUE;			//TRUE | FALSE
$debug_activo    = TRUE;			//TRUE | FALSE


/*********************************************/
/*** Constantes de la App ********************/

//
//	Desde aki no modificar
//

/*
| ------------------------------------------------------------------------------
| Var
| ------------------------------------------------------------------------------
|
| 
|
 */
	define(	'MODO', $modo_de_la_app ); // desarrollo | test
	define(	'FUENTE_DATOS', 'bd' ); // bd | ficheros
	
	if ( MODO === 'desarrollo' ) {
		define( 'TRAZAS',   $trazado_activo ); 
		define( 'DEBUG',    $debug_activo );
		define( 'TEST',     $ejecutar_test );
	
	} else {
		define( 'TRAZAS',   FALSE ); 
		define( 'DEBUG',    FALSE );
		define( 'TEST',     FALSE );
	}


/*
| ------------------------------------------------------------------------------
| Paths
| ------------------------------------------------------------------------------
|
| Rutas de los directorios de la aplicación
|
 */
	define( 'PATH_CSS', 		'public/css/' ); //directorio donde almacenar css
	//define( 'PATH_IMG', 		'public/img/' ); //directorio donde almacenar imagenes
	//define( 'PATH_JS',  		'public/js/' ); //directorio donde almacenar js

	define( 'PATH_INSTALL', 	'app/_install/' );

	define( 'PATH_CLASES', 	 	 'app/clases/' );
	define( 'PATH_COMPOSERS', 	 'app/views/composers/' );
	define( 'PATH_CONFIG', 	 	 'app/config/' );
	//define( 'PATH_CONTRACTS', 	 'app/contracts/' );
	define( 'PATH_CORE', 	 	 'app/libs/' );
	define( 'PATH_DATOS', 	 	 'app/data/' );
	define( 'PATH_HELPERS', 	 'app/helpers/' );
	//define( 'PATH_REPOSITORIOS', 'app/repositories/' );
	define( 'PATH_TEST', 		 'app/test/' );
	define( 'PATH_VENDORS', 	 'app/vendors/' );
	define( 'PATH_VIEWS', 	 	 'app/views/' );

/*
| ------------------------------------------------------------------------------
| Ficheros de configuración con datos
| ------------------------------------------------------------------------------
|
| Contiene rutas de los ficheros de datos de la aplicación: directorios del autoload, etc
|
 */
	define('CF_TABLAS_DB',     PATH_CONFIG . 'tablas.config.php');





/*** Fin / Constantes de la App ***/
/*
 *
 */
