<?php
/*
 * Helper con métodos para diversas acciones
 * 
 * @utor: Moisés Alcocer
 * Junio 2014, <m_alc1@hotmail.com> */

//prob( 'Cargado helper Utils' );

final class Utils {

    /**********************************/
    /*** Declaración de Propiedades ***/

        //Caracteres por defecto para generar claves
		public static $car = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //eliminadas ñ
        private static $clase = 'Helper Utils';
	

    /**********************************/
    /*** Declaración de Métodos *******/


    /*** Métodos públicos *************/


        /**
         * Devuelve un string formado a partir de un array
         * @param  array  $array
         * @param  string $separador
         * @return string
         */
        public static function getArrayToString($array=NULL, $separador=NULL) {
            prob(self::$clase .' / getArrayToString()');

            //Array pasado con contenido (array vacio no se evalua)
            if ($array && is_array($array)) {
                if ($separador)
                    return implode($separador, $array);

                return implode(' ', $array);
            }

            return FALSE;
        }

        /**
         * Convierte un string en un array
         * @param  String $cadena ---> String dado
         * @param  String $x      ---> caracter de corte
         * @return Array
         */
        public static function getStringToArray($cadena=NULL, $x=NULL) {
            prob(self::$clase .' / getStringToArray() '/*-> String entrada: <br>' . $cadena*/);
            //prob("Corte: {$x}");
            if ($cadena && is_string($cadena)) {
                if ($x)
                    return explode($x, $cadena);

                return ($x==='') 
                    ? str_split($cadena)     //Delimitador es string vacío -> devuelve array de caracteres
                    : explode(' ', $cadena); //No pasado delimitador -> usa un espacio en blanco
            }
                
            return FALSE;
        }


    /*** Métodos privados de la clase ***/




} //class
