<?php

/**
 * Clase BuscadorComposer
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

final class BuscadorComposer {

	/************************************/
    /*** Declaración de propiedades *****/

        private static $clase  = "BuscadorComposer";
            

    /************************************/
    /*** Delaración de métodos  *********/


    /*** Métodos públicos *************/

        /**
         * Componer HTML -> options para SELECT
         * 
         * @param  Array    $arr_provincias
         * @param  String   $actual
         * @return String
         */
        public static function getOptions( $arr_provincias=NULL, $actual=NULL ) {
            //prob(self::$clase . " / getOptions()");

            if ($arr_provincias && is_array($arr_provincias)) {
                $option_open  = '<option value="';
                $option_close = '</option>';

                if ($actual) 
                    $codigo = '<option value="' . $actual . '" selected>' . $actual . '</option>';
                else
                    $codigo = '<option selected>Ver regiones de</option>';

                foreach ($arr_provincias as $arr_provincia) {
                    $str_provincia = $arr_provincia['nombre'];
                    //prob( $str_provincia );
                    if ($actual !== $str_provincia)
                        $codigo .= $option_open . $str_provincia . '">' . $str_provincia;
                }

                if ($actual !== 'todas')
                    $codigo .= $option_open . 'todas">todas las provincias';

                return $codigo;
            }

            return FALSE;
        }

        /**
         * Componer HTML -> Resultados
         * 
         * @param  Array    $arr_regiones
         * @return String
         */
        public static function getResultados( $arr_regiones=NULL ) {
            //prob(self::$clase . " / getResultados()");

            if ($arr_regiones && is_array($arr_regiones)) {
                $p_open  = '<p class="region">';
                $p_close = '</p>';

                $codigo = '';
                foreach ($arr_regiones as $arr_region) {
                    $id          = $arr_region['id_region'];
                    $nombre      = $arr_region['nombre'];
                    $descripcion = $arr_region['descripcion'];
                    $provincia   = $arr_region['provincia'];
                    
                    $codigo .= $p_open . 'ID: ' . $id . ' -> ' . $nombre . ' (' . $provincia . ')' . 
                        '<br>Descripción:' . $descripcion . '<br>' . $p_close;
                }
                return $codigo;
            }
        
            return FALSE;
        }

    /*** Métodos privados *************/

} //class