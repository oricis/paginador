<?php namespace ironwoods\paginator\clases;

/**
 * paginar.php
 *
 * Clase para páginar resultados
 */
use ironwoods\paginator\clases\BotonesPaginador as BotonesPaginador;

final class Paginar extends RegistrosActividadPaginar {

    /************************************/
    /*** Declaración de propiedades *****/

    	private static $clase  = "Paginar";

        private static $modelo      = NULL; //Almacenar modelo necesario para consultar la BD
        private static $arr_tablas  = NULL; //Almacenar nombres de tablas para consultas simples

    	//Número de resultados x defecto
        private static $resultados_por_pagina  = 10;
        //Número de página actual x defecto
        private static $num_pagina_inicio      = 1;
        //Número de páginas de resultados
        private static $total_paginas          = 0;


    /************************************/
    /*** Delaración de métodos  *********/

    /*** Métodos públicos *************/

        /**
         * Limpieza sentencia SELECT
         * Origen: http://stackoverflow.com/questions/4223980/the-ultimate-clean-secure-function
         * 
         * @param  String $consulta
         * @return String
         */
        public static function cleanQuery( $consulta=NULL ) {
            prob(self::$clase . " / cleanQuery()");

            if ($consulta && is_string($consulta)) {

                //Comprueba si hay consulta o solo nombre de tabla
                if (class_exists('DbRepo') && method_exists('DbRepo','isTabla') && DbRepo::isTabla($consulta))
                    return $consulta; //Pasado un nombre de tabla de la BD
                
                // Limpieza query 
                $consulta = mysql_real_escape_string($consulta); //pone rn en los saltos de linea
                $consulta = str_replace('=rn', '=', $consulta);    //quitar rn de la query
                $consulta = str_replace('rnWHERE', 'WHERE', $consulta);    //quitar rn de la query
                $consulta = htmlspecialchars($consulta, ENT_IGNORE, 'utf-8');
                $consulta = strip_tags($consulta);
                $consulta = stripslashes($consulta);

                return $consulta;
            }
            
            return FALSE;
        }

        /**
         * Obtiene HTML con los botones del paginador
         * 
         * Como primer argumento se recibe:
         *     - una query
         *     - un nombre de tabla -> recuperar todos los campos
         * 
         * @param  String 	$consulta   -> Consulta SQL de base, p.e. "SELECT * FROM paises" //A esta se añadira el limite
         * @param  int 		$num_pagina -> Número pagina actual a mostrar
         * @param  int 		$resultados_por_pagina
         * @return Array 	(datos, botones)
         */
        public static function get( $consulta=NULL, $num_pagina=0, $resultados_por_pagina=NULL ) {
        	prob(self::$clase . " / <b>get()</b>");
            
            if (self::$modelo) {
                prob('Modelo disponible...');

                //prob("Página: " . $num_pagina);
                prob("Query: "  . $consulta); //die();

                if ($consulta && is_string($consulta)) {
                    prob("Consultando... Página: {$num_pagina}");

                    //Parámetros
                        //Establece que página se esta viendo
                        $num_pagina = ((int)$num_pagina === 0)
                            ? self::$num_pagina_inicio 
                            : $num_pagina;

                        //Establece núm. resultados por página
                        $resultados_por_pagina = ((int)$resultados_por_pagina > 0) 
                            ? $resultados_por_pagina : self::$resultados_por_pagina;

                        //Determina los registros a obtener (posición y número)
                        $limite_consulta = self::getLimite(($num_pagina - 1), $resultados_por_pagina);

                    //Fin / Parámetros

                    //Trazas
                        //dev("Página: {$num_pagina}");
                        //dev("Límite: " . $limite_consulta); //die(); //traza

                    //Limpieza query
                    if (class_exists('DbVal') && method_exists('DbVal','cleanQuery'))
                        $consulta = DbVal::cleanQuery($consulta); 

                    //Obtener núm total de páginas (consulta sin LIMITE)
                    $total_paginas = self::getNumPags($consulta, $resultados_por_pagina);
                    //dev("Páginas: " . $total_paginas); //die(); //traza

                    //Compone la SELECT -> Añade LIMITE
                    $consulta = self::componerQuery($consulta, $limite_consulta);

                    echo("Query: " . $consulta); //die(); //traza


                    //Hay resultados que mostrar, almenos para 1 página
                    if ($total_paginas) {
                        prob('Hay ' . $total_paginas . ' páginas de resultados.');

                        //Obtiene los datos para la vista
                        $arr_datos = self::$modelo->consultar($consulta);
                        //dev($arr_datos); //die('84'); //traza

                        //Obtenidos registros
                        if ($arr_datos) {
                            //prob("Página actual: " . $num_pagina . " / Total:" . $total_paginas);
                            $botones = BotonesPaginador::get($total_paginas, $num_pagina);

                            //Guarda registro de los botones creados para cada página
                            self::registrarBotns( $total_paginas, $num_pagina, $botones );
    

                            //Devuelve Datos y HTML botones
                            return array('datos' => $arr_datos, 'botones' => $botones);

                        } else
                            prob(self::$clase . " / get() -> Err: obteniendo datos de la Base de Datos");
                    } else
                        die(self::$clase . " / get() -> No hay datos que mostrar");
                } else
                    prob(self::$clase . " / <b>get()</b> -> Err args: falta Query");
            } else
                prob(self::$clase . " / <b>get()</b> -> Err args: falta modelo o URL");
    	    
    	    return FALSE;
        }


    /*
    |--------------------------------------------------------------------------
    | Configuración
    |--------------------------------------------------------------------------
    |
    | Métodos de congiguración de la clase
    |
    */
        /**
         * Guarda modelo en propiedad de la clase
         * 
         * @param Object $modelo
         */
        public static function setModel( $modelo=NULL ) {
            if ($modelo && is_object($modelo))
                self::$modelo = $modelo;
        }

        /**
         * Guarda tablas que pueden ser objeto de consultas en propiedad de la clase
         * 
         * @param Array $arr_tablas
         */
        public static function setTablas( $arr_tablas=NULL ) {
            if ($arr_tablas && is_array($arr_tablas))
                self::$arr_tablas = $arr_tablas;
        }

        /**
         * Guarda URL para los botones
         * 
         * @param String $url
         */
        public static function setUrl( $url=NULL ) {
            BotonesPaginador::setUrl($url);
        }

        
    /*** Métodos privados *************/

    /*
    |--------------------------------------------------------------------------
    | Métodos auxiliares
    |--------------------------------------------------------------------------
    |
    | Compone / válida la query y añade límites
    | Determina los registros a obtener para la página
    | Devuelve núm. de páginas (total de registros / núm. registros x página)
    |
    */
        /**
         * Aux. get()
         * Compone / válida la quey y añade límites
         * 
         * @param  String $consulta
         * @param  int $num_pagina_mostrar
         * @return String
         */
        private static function componerQuery( $consulta=NULL, $limite_consulta=NULL ) {
            prob(self::$clase . " / <b>componerQuery()</b> -> Query: {$consulta}");

            if ($consulta && $limite_consulta) {

                $consulta  = self::getConsulta($consulta);

                //Query válida -> Añade límites y devuelve la consulta
                if ($consulta)
                    return $consulta . $limite_consulta;
                
                else
                    prob(self::$clase . " / <b>componerQuery()</b> -> Err: query no válida.");
            } else
                prob(self::$clase . " / <b>componerQuery()</b> -> Err args");

            return FALSE;
        }

        /**
         * Valida o compone la consulta (sin límite)
         *
         * @param  String   $consulta
         * @return String
         */
        private static function getConsulta( $consulta=NULL ) {
            prob(self::$clase . " / <b>getConsulta()</b> -> Query: {$consulta}");

            if ($consulta) {

                //Comprueba si la consulta es compleja o solo sobre una tabla
                return (self::isTabla($consulta))
                    ? "SELECT * FROM {$consulta}"   //Pasado nombre de tabla
                    : self::cleanQuery($consulta);  //Pasada Query compleja ???

            } else
                prob(self::$clase . " / <b>getConsulta()</b> -> Err args");

            return FALSE;
        }

        /**
         * Aux. get()
         * Determina los registros a obtener (posición y número)
         * 
         * @param  int  $num_pagina
         * @param  int  $resultados_por_pagina
         * @return String
         */
        private static function getLimite( $num_pagina=NULL, $resultados_por_pagina=NULL ) {
            prob(self::$clase . " / <b>getLimite()</b>");

            //Número de registro por el que empezar a obtener registros
            $pos_inicio_rango = ($num_pagina * $resultados_por_pagina);

            
            return ( $num_pagina ) 
                ? " LIMIT {$pos_inicio_rango}, {$resultados_por_pagina}" //Obtener x resultados desde x posición
                : " LIMIT {$resultados_por_pagina}";                     //Obtener x resultados desde el inicio
        }

        /**
         * Aux. get()
         * Devuelve el número de páginas segun el total de registros y el número a mostrar x cada página
         *
         * @param  String   $consulta
         * @param  int 		$resultados_por_pagina
         * @return int -> num de páginas con resultados
         */
        private static function getNumPags( $consulta=NULL, $resultados_por_pagina=NULL ) {
            prob(self::$clase . " / <b>getNumPags()</b>");
            //prob("Query: " . $consulta . '<br>Resultados_por_pagina: '. $resultados_por_pagina); //traza

            if ($consulta && $resultados_por_pagina) {
                
                if (self::$total_paginas)
                    return self::$total_paginas;

                // Consulta SQL de todos los registros, p.e. "SELECT * FROM paises"
                $consulta  = self::getConsulta($consulta);
                $arr_datos = self::$modelo->consultar($consulta);

                //Si se obtuevieron registros los cuenta
                $num_registros = (is_array($arr_datos)) ? count($arr_datos) : 0;
                //dev($num_registros);

                //Traza -> Todos los registros que devuelve la consulta inicial
                prob("-> <b>Resultados totales: " . $num_registros . "</b>");

                //Se obtuvieron registros -> devuelve núm. páginas a mostrar
                if ($num_registros) {
                    $res = ($num_registros <= $resultados_por_pagina)
                        ? 1 
                        : ceil($num_registros / $resultados_por_pagina);

                    self::$total_paginas = $res; 
                    return $res;
                }

            } else
                prob(self::$clase . " / <b>getNumPags()</b> -> Err args");
            	
    	    return FALSE;
        }

        /**
         * Devuelve array con los nombres de las tablas disponibles
         * 
         * @return Array
         */
        private static function getTablas() {
            prob(self::$clase . " / <b>getTablas()</b>");

            if (self::$arr_tablas)
                return self::$arr_tablas;

            if (defined('CF_TABLAS_DB') && file_exists(CF_TABLAS_DB))
                return require CF_TABLAS_DB; //Carga nombres tablas desde fichero
            
            return NULL;
        }

        /**
         * Comprobar si un nombre de tabla es válido
         * 
         * @param  String   $nombre_tabla
         * @return boolean
         */
        private static function isTabla( $nombre_tabla=NULL ) {
            prob(self::$clase . " / <b>isTabla()</b> -> Tabla: {$nombre_tabla}");

            //Obtener nombres de las tablas
            $arr_tablas = self::getTablas();

            //Hay array con nombres de tabla
            if ($arr_tablas && is_array($arr_tablas)) {
                foreach ($arr_tablas as $tabla) {
                    if (strtolower($tabla) === strtolower($nombre_tabla))
                        return TRUE;
                }
                
            } else
                prob(self::$clase . " / <b>isTabla()</b> -> Err: no disponibles nombres tablas");

            return FAlSE;
        }

} //class