<?php

/*
 * funciones.php
 * Función para trazado de las clases
 *
 * Proyecto: paginador
 * Versión 0.1 / Sept. 2015
 *
 * @autor: Moisés Alcocer
 */



/**
 * Funciones para trazado
 */

	/**
	 * Imprime un string y un salto de linea
	 * 
	 * @param  String $cadena
	 */
	function prob( $cadena=NULL ) {

		if (defined('TRAZAS') && TRAZAS)
			if ($cadena && is_string($cadena))
				echo $cadena . "<br>";
	}

	/**
	 * var_dump
	 * 
	 * @param ??? $contenido
	 */
	function dx( $contenido=NULL ) {

		if (defined('DEBUG') && DEBUG) {

			if (is_array($contenido))
				echo '<pre>';

			var_dump($contenido);
			echo "<br>";

			if (is_array($contenido))
				echo '</pre>';
		}
	}


/**
 * Funciones var.
 */
