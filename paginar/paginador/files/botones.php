<?php namespace ironwoods\paginator\clases;
/*
 * @file: HELPER Botones
 * @info: Permite añadir clases CSS / HTML para el espaciado entre botones
 * 
 * @utor: Moisés Alcocer
 */
 
final class Botones {

    /**********************************/
	/*** Declaración de Propiedades ***/
        
        private static $clase = 'Helper Botones';
        private static $clase_espacio_dcha  = NULL;
        private static $clase_espacio_lat   = NULL;

    /**********************************/
    /*** Declaración de Métodos *******/


    /*** Métodos públicos *************/

        /**
         * Obtiene HTML con botones, con clases para el espaciado entre ellos si son varios
         * 
         * @param  Array    $arr_botones
         * @param  String   $clase_espacio_dcha
         * @param  String   $clase_espacio_lat
         * @return String
         */
        public static function getButtons(  $arr_botones=NULL, 
                                            $clase_espacio_dcha=NULL, 
                                            $clase_espacio_lat=NULL ) {
            prob( self::$clase . " / getButtons()" );

            if ($arr_botones && is_array($arr_botones)) {

                //Establecer clases
                self::$clase_espacio_dcha = ($clase_espacio_dcha && is_string($clase_espacio_dcha))
                    ? $clase_espacio_dcha 
                    : 'espacio-a-derecha';
                self::$clase_espacio_lat  = ($clase_espacio_lat  && is_string($clase_espacio_lat))
                    ? $clase_espacio_lat  
                    : 'espacio-a-los-lados';

                //Número de botones
                $num_botones = count($arr_botones);
                
                //Más de un botón -> añadir clases para espaciado
                if ($num_botones > 1) {

                    return (isPar($num_botones))
                            ? self::getBotoneraPar($arr_botones)
                            : self::getBotoneraImpar($arr_botones);

                //Sólo 1 botón -> no lleva clases
                } else
                    return $arr_botones[0];
                
            } else
                prob( self::$clase . " / getButtons() -> Err args" );

            return FALSE;
        }


    /*** Métodos privados *************/
        
        /**
         * Aux. getButtons()
         * Obtiene botonera con num. de botones impar
         * 
         * @param  Array $arr_botones
         * @return String -> HTML
         */
        private static function getBotoneraImpar( $arr_botones=NULL ) {
            prob( self::$clase . " / getBotoneraImpar()" );
            $html = '';

            //Recorrer array e introducir clases para espaciado
            foreach ($arr_botones as $indice => $html_boton) {
                //primer boton indice: 0

                //Botones pares -> Añade clase espaciado a los lados
                $html .= ($indice === 0 || isPar($indice))
                    ? $html_boton   //HTML del boton (sin modificar)
                    : Html::addNewClass( $html_boton, self::$clase_espacio_lat );
                
            } //foreach

            //Devuelve HTML con los botones
            return $html;
        }

        /**
         * Aux. getButtons()
         * Obtiene botonera con num. de botones par
         * 
         * @param  Array $arr_botones
         * @return String -> HTML
         */
        private static function getBotoneraPar( $arr_botones=NULL ) {
            prob( self::$clase . " / getBotoneraPar()" );
            $html = '';

            //Recorrer array e introducir clases para espaciado
            foreach ($arr_botones as $indice => $html_boton) {
                //primer boton indice: 0
                        

                //Primer boton -> Añade clase espaciado a derecha
                if ($indice === 0)
                    $html .= Html::addNewClass( $html_boton, self::$clase_espacio_dcha );

                //Resto botones
                else {
                    //Botones pares (desde 2) -> Añade clase espaciado a los lados
                    //Botones impares -> Sin clase
                    $html .= (isPar($indice))
                        ? Html::addNewClass( $html_boton, self::$clase_espacio_lat )
                        : $html_boton;
                }
            }

            //Devuelve HTML con los botones
            return $html;
        }

} //class




