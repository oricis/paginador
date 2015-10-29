<?php namespace ironwoods\paginator\clases;
/*
 * @file: HELPER Html
 * @info: Métodos para manipular fragmentos de HTML
 * 
 * @utor: Moisés Alcocer
 */
 
final class Html {

    /**********************************/
	/*** Declaración de Propiedades ***/
        
        private static $clase = 'Helper Html';
    

    /**********************************/
    /*** Declaración de Métodos *******/

    /*** Métodos públicos *************/

        /**
         * Añade una clase HTML / CSS a una ya existente o la crea
         *
         * @param  String   $html
         * @param  String   $nombre_clase
         * @return String -> HTML
         */
        public static function addNewClass( $html=NULL, $nombre_clase=NULL ) {
            //prob( self::$clase . " / addNewClass() -> clase: {$nombre_clase}" );
            //prob("HTML: " . $html, TRUE); //traza //p.e. '<p class="xxx memes" name="algo"></p>'

            if ($html && $nombre_clase && is_string($html) && is_string($nombre_clase)) {
                //prob( "Recibidos parámetros -> procediendo..." );

                //Encontrado atributo clase
                if (stripos($html, 'class="') >= 0) {
                    //prob( "Hay attr clase -> procediendo..." );

                    //Atributo clase vacío -> añadir clase
                    if ($pos = stripos($html, 'class=""') && ($pos >= 0)) {
                        //prob('Encontrada coincidencia...');

                        $html = str_ireplace( 'class=""', 
                                             ('class="' . $nombre_clase . '"'), 
                                             $html);

                    //Atributo clase tiene contenido -> añadir clase despues de la existente
                    } else {
                        //prob("Atributo clase tiene contenido...");  //Traza

                        $clase_existente = self::getAttrValue( $html );
                        $str_reemplazo   = $clase_existente . ' ' . $nombre_clase;
                         
                        $html = str_ireplace( $clase_existente, 
                                              $str_reemplazo, 
                                              $html);
                    }
                    

                    prob("Resultado: " . $html, TRUE ); //Traza

                // No hay atributo clase, añadirla: class="nombre_clase"
                } else {
                    //prob( self::$clase . " / addNewClass() -> No hay atributo \'class\'. Creando..." );
                    $html = self::createAttr( $html, $attr_name, $value );
                }

            } else
                prob( self::$clase . " / addNewClass() -> Err args" );

            return $html;
        }

        /**
         * Añade un atributo nuevo (nombre="valor") en un elemento HTML
         * 
         * @param  String $html
         * @param  String $value
         * @param  String $atributo
         * @return String -> HTML
         */
        public static function createAttr( $html=NULL, $value=NULL, $atributo='class' ) {
            //prob( self::$clase . " / createAttr() -> Atributo: {$atributo}" );

            if ($html && $atributo && $value && is_string($html) && is_string($atributo) && is_string($value)) {
                
                $pos = strpos($html, $atributo.'="');

                //Se ha encontrado el atributo que se quiere crear
                if ($pos === 0 || $pos > 0) {
                    prob( self::$clase . " / createAttr() -> Err: el atributo ya existe." );
                    return $html;
                }

                //Se introduce attr="valor" delante del primer cierre de tag HTML '>'
                //Separa el HTML en 2
                
                $fragm_inicio = strstr($html, '>', TRUE);
                $fragm_final  = strstr($html, '>');
                
                //Compone y devuelve resultado
                return $fragm_inicio . ' ' . $atributo . '="' . $value . '"' . $fragm_final;

            } else
                prob( self::$clase . " / createAttr() -> Err args" );

            return $html;
        }

        /**
         * Devuelve valor de un atributo HTML, p.e. la clase/s
         * 
         * @param  string   $html
         * @param  string   $atributo -> atributo, por defecto 'class'
         * @return string -> HTML
         */
        public static function getAttrValue( $html=NULL, $atributo="class" ) {
            //prob( self::$clase . " / getAttrValue()" );

            if ($html && is_string($html)) {

                //Eliminar fragmento inicial de la cadena
                $fragmento_html  = strstr($html, $atributo . '="');             // class="xxx memes" name="algo">
                $primera_comilla = stripos($fragmento_html, '"');
                $fragmento_html  = substr($fragmento_html, ($primera_comilla + 1)); // xxx memes" name="algo">

                //Eliminar fragmento final de la cadena
                $attr_value = strstr($fragmento_html, '"', TRUE);  // xxx memes

                return $attr_value;
            }

            prob( self::$clase . " / getAttrValue() -> Err args" );
            return FALSE;
        }   

        /**
         * Sustituye valor de un atributo HTML, p.e. la clase/s
         *
         * @param  String   $html     -> HTML con el atributo a cambiar
         * @param  String   $value    -> nuevo valor para el atributo
         * @param  String   $atributo -> atributo, por defecto 'class'
         * @return String -> HTML
         */
        public static function replaceAttr( $html=NULL, $value=NULL, $atributo='class' ) {
            //prob( self::$clase . " / replaceAttr()" );

            if ($html && $atributo && $value && is_string($html) && is_string($atributo) && is_string($value)) {
                $pos = strpos($html, $atributo.'="');

                //Se ha encontrado el atributo cuyo valor dene sustituirse
                if ($pos === 0 || $pos > 0) {
                    prob( "Atributo encontrado..." );

                    //Obtiene valor original del atributo
                    $original = self::getAttrValue($html, $atributo);

                    //Reemplaza valores y devuelve HTMl
                    return str_ireplace($original, $value, $html);

                } else
                    prob( self::$clase . " / replaceAttr() -> No se encuentra el atributo" );
            } else
                prob( self::$clase . " / replaceAttr() -> Err args" );

            return $html;
        }


    /*** Métodos privados *************/


} //class




