<?php

/**
 * index.php
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

require 'app/config/requires.php';

//Si se recibe consulta almacena la provincia seleccionada
$provincia  = (isset($_GET['provincias'])) ? $_GET['provincias'] : NULL;
$num_pagina = (isset($_GET['pagina'])) 	   ? $_GET['pagina'] 	 : NULL;

//dx($_SERVER); die();

if (defined('TEST') && TEST){
	prob('<h1>Ejecutando TEST...</h1>');

	$test = "Paginador"; // ArraysDatos | BotonesPaginador | GestorConsultas | Paginador | PaginadorRegistros
	new Test( $test );

} else
	new App( $provincia, $num_pagina ); //Instancia la Aplicación








