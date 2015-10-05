<?php namespace ironwoods\paginator\clases;

/**
 * registrosactividadpaginar.php
 *
 * Clase de registro de actividad de Paginador
 */

class RegistrosActividadPaginar {

    /************************************/
    /*** Declaración de propiedades *****/

        private static $clase  = "RegistrosActividadPaginar";
        
        //Registros de actividad: consultas / botones creados
        protected static $arr_registro_botns   = array(); //Registra botones creados para cada página
        protected static $arr_registro_queries = array(); //Registra la consulta SQL para cada página


    /************************************/
    /*** Delaración de métodos  *********/

    /*** Métodos públicos *************/

    /*
    |--------------------------------------------------------------------------
    | Registros de actividad
    |--------------------------------------------------------------------------
    |
    | Métodos de registro de actividad
    | Permiten testear:
    |   - Consultas realizadas
    |   - Botones generados
    |
    */
        /**
         * Mostrar / devolver registro de botones
         * 
         * @param  boolean $trazar -> Segun valor: TRUE:  imprime los registros
         *                                         FALSE: devuelve los registros
         * @return array
         */
        public static function getBtnsRegistrados( $trazar=TRUE ) {
            //prob(self::$clase . " / <b>getBtnsRegistrados()</b>");

            if ($trazar) {

                if (self::$arr_registro_botns && is_array(self::$arr_registro_botns)) {

                    foreach (self::$arr_registro_botns as $indice => $arr_registro) {
                        $num_pagina    = $arr_registro['pagina actual'];
                        $total_paginas = $arr_registro['paginas totales'];
                        $botones       = $arr_registro['botones'];
                        
                        //Trazado:
                        //echo("<b>Página: {$indice}</b>"); //Cada página de resultados almacena 1 registro
                        //echo("Página " . $num_pagina . " de " . $total_paginas);
                        echo( $botones );
                    }
                } else
                    prob("No hay botones registrados");

            //Devuelve los registros
            } else
                return self::$arr_registro_botns;
        }

        /**
         * Mostrar / devolver registro de consultas
         * 
         * @param  boolean $trazar -> Segun valor: TRUE:  imprime los registros
         *                                         FALSE: devuelve los registros
         * @return array
         */
        public static function getQueriesRegistradas( $trazar=TRUE ) {
            prob(self::$clase . " / <b>getQueriesRegistradas()</b>");

            if ($trazar) {

                if (self::$arr_registro_queries && is_array(self::$arr_registro_queries)) {

                    foreach (self::$arr_registro_queries as $indice => $querie) {
                        
                        //Trazado:
                        //Cada página de resultados almacena 1 consulta
                        echo("Consulta número {$indice}: <br><b>" . $querie . "</b>");
                    }

                } else
                    echo("No hay consultas registradas");

            //Devuelve los registros
            } else
                return self::$arr_registro_queries;
        }


    /*** Métodos privados *************/

    /*
    |--------------------------------------------------------------------------
    | Registros de actividad
    |--------------------------------------------------------------------------
    |
    | Métodos de registro de actividad
    | Permiten testear:
    |   - Consultas realizadas
    |   - Botones generados
    |
    */
        /**
         * Guarda los botones creados para cada página
         * 
         * @param  int      $total_paginas
         * @param  int      $num_pagina
         * @param  String   $botones
         */
        protected static function registrarBotns( $total_paginas=NULL, $num_pagina=NULL, $botones=NULL ) {
            prob(self::$clase . " / <b>registrarBotns()</b>");

            //Trazas
            //prob("Página " . $num_pagina . " de " . $total_paginas);
            //prob('Botones: ' . $botones); die();
            
            if ($total_paginas && ($num_pagina || $num_pagina === 0) && $botones) {
                $arr_btns = array();

                $arr_btns['pagina actual']   = $num_pagina;
                $arr_btns['paginas totales'] = $total_paginas;
                $arr_btns['botones']         = $botones;

                self::$arr_registro_botns[] = $arr_btns;

            } else
                prob(self::$clase . " / <b>registrarBotns()</b> -> Err args");
        }

        /**
         * Guarda registro de las consultas (1 por página)
         * 
         * @param  String   $consulta
         */
        protected static function registrarQueries( $consulta=NULL ) {
            prob(self::$clase . " / <b>registrarQueries()</b>");

            //Trazas
            //prob("Consulta: " . $consulta); die();
            
            if ($consulta && is_string($consulta)) {
                $arr_btns = array();

                self::$arr_registro_queries[] = $consulta;

            } else
                prob(self::$clase . " / <b>registrarQueries()</b> -> Err args");
        }

} //class