<?php

/**
 * Clase "Botones"
 * Helper Composer (componer elementos para las vistas)
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

final class Botones {

	/************************************/
    /*** Declaración de propiedades *****/

        private static $clase = "Composer: Botones";
            

    /************************************/
    /*** Delaración de métodos  *********/

    /*** Métodos públicos *************/

    	/**
         * Metodo que se ejecuta por defecto
         */ 
        public static function index() {
            prob(self::$clase . " / index()");
        }

        /**
         * Descripción método
         * @param  tipo $xxx ---> Descripción
         * @param  tipo $zzz
         * @return tipo
         */
        public static function xxx($xxx=NULL, $zzz=NULL) {
            prob(self::$clase . " / xxx()");

            return $xxx;
        }

    /*** Métodos privados *************/

} //class