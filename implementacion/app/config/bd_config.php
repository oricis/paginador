<?php

/**
 * Fichero de config para la BD
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

/*** Variables a configurar para el proyecto ***/
/*** Configurar al iniciar el proyecto 		 ***/

$nombre_bd      = 'paginador';       //Una vez desplegada la BD no modificar
$nombre_usuario = 'root';
$clave_acceso   = '';
$host_bd_local  = 'localhost';
$tipo_bd        = 'mysql';

/*** Fin / Variables a configurar para el proyecto ***/

/*** DESDE AQUÍ ---> NO MODIFICAR ***************************/
/*** DESDE AQUÍ ---> NO MODIFICAR ***************************/
/*** DESDE AQUÍ ---> NO MODIFICAR ***************************/
/************************************************************/

/*** *** *** Configuración de la BD *** *** *** *** *** ***/
    
    define('PREF_TAB', ''); //Necesario en la clase Model

    // Datos para la conexión:
    define('DB_TYPE', $tipo_bd);
	define('DB_HOST', $host_bd_local);
	define('DB_NAME', $nombre_bd);
    define('DB_USER', $nombre_usuario);
	define('DB_PASS', $clave_acceso);

/*** *** Fin / Configuración de la BD *** *** *** *** *** */