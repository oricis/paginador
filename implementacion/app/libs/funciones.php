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
	 * @param ??? $dato
	 */
	function dx( $dato=NULL ) {

		if (defined('DEBUG') && DEBUG) {

			//Recibido array
            if ($dato && $dato !== TRUE) {
                if (is_array($dato) || is_object($dato)) {
                    echo '<pre>';
                    var_dump($dato);
                    echo '</pre>';
                } else {
                    if ((int)$dato > 0)
                        echo 'Pasado número: <b>'.$dato.'</b>';
                    else    
                        var_dump($dato);
                }
                        
            } else {
                if (is_null($dato))
                    echo 'Pasado <b>NULL</b>';

                if ($dato === FALSE)
                    echo 'Pasado <b>FALSE</b>';

                if ($dato === TRUE)
                    echo 'Pasado <b>TRUE</b>';

                if ($dato === 0)
                    echo 'Pasado número: <b>0</b>';

                if (is_array($dato))
                    echo 'Pasado <b>array vacio</b>';
            }
            echo '<br>';

		}
	}


/**
 * Funciones var.
 */
	
