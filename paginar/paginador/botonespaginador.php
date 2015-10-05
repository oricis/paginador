<?php namespace ironwoods\paginator\clases;

/**
 * botonespaginador.php
 * Clase "BotonesPaginador"
 * Helper Composer (componer elementos para las vistas)
 *
 * Proyecto: paginador
 * Versión 0.1 / Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

final class BotonesPaginador {

	/************************************/
    /*** Declaración de propiedades *****/

        private static $clase = "Composer: BotonesPaginador";

        private static $url   = NULL;
        
        //Numero de páginas a saltar adelante / atras (boton avance retroceso)
        private static $salto = 3;
            

    /************************************/
    /*** Delaración de métodos  *********/

    /*** Métodos públicos *************/

    	/**
         * Compone HTML para mostrar los botones del paginador
         * 
         * @param  int      $total_paginas
         * @param  int      $num_pagina_actual
         * @return String -> HTML
         */
        public static function get( $total_paginas=NULL, $num_pagina_actual=NULL ) {
            prob("<b>" . self::$clase . " / get()</b>");
            //prob("Página " . $num_pagina_actual . " de " . $total_paginas);

            //Si no se pasa página actual o es 0, toma el valor 1
            $num_pagina_actual = (! $num_pagina_actual)
                ? 1 : (int)$num_pagina_actual;

            //prob("Página actual: " . $num_pagina_actual . " / Total:" . $total_paginas);

            //Se recibe total de páginas
            //Página actual igual o inferior al total páginas
            if (((int)$total_paginas > 0) && ((int)$num_pagina_actual <= (int)$total_paginas)) {

                    /*
                     * Código páginador, p.e.
                     *
                     * <div class="paginador">
                     *      <p class="aviso">Página 2 de 7</p>
                     *
                     *      <a   class="btn-paginador" href="xxx/ver-Pagina/1"><div> 1 </div></a>
                     *      <div class="btn-paginador btn-actual"> 2 <div>
                     *      <a   class="btn-paginador" href="xxx/ver-Pagina/3"><div> 3 </div></a>
                     *      <!-- Salta a 3 páginas de la actual -->
                     *      <a   class="btn-paginador" href="xxx/ver-Pagina/5"><div> > </div></a>
                     * </div>
                     */
                    
                    $html  = '<div class="paginador">';
                    $html .= '<p class="aviso">Página ' . $num_pagina_actual . ' de ' . $total_paginas . '</p>';


                    //Más de 1 página -> mostrar botones paginador
                    if ($total_paginas > 1) {
                        prob("Más de 1 página...");

                        $html .= self::getActiveButtons($total_paginas, $num_pagina_actual);
                    }
                    $html .= '</div>';

                    return $html;

            //NO se recibe total de páginas || la pagina actual es superior
            } else
                prob("<b>" . self::$clase . " / get()</b> -> Err args");

            return FALSE;
        }   

        /**
         * Guarda URL para los enlaces en propiedad de la clase
         * 
         * @param String $url
         */
        public static function setUrl( $url=NULL ) {
            if ($url && is_string($url))
                self::$url = $url;
        }


    /*** Métodos privados *************/

        /**
         * Aux. get()
         * Obtiene botones con enlaces
         *
         */
        private static function getActiveButtons( $total_paginas=NULL, $num_pagina_actual=NULL ) {
            prob("<b>" . self::$clase . " / getActiveButtons()</b>");

            if ($total_paginas && $num_pagina_actual) {

                $btn_actual = '<div class="btn-paginador btn-actual">' . $num_pagina_actual . '</div>';
                $html = '';

                //Estamos en la página 1 de X
                //No hay páginas previas
                //Hay páginas después de la actual
                if ($num_pagina_actual === 1) {
                    $html .= $btn_actual;
                    $html .= self::getFrontButtons($total_paginas, $num_pagina_actual);

                //Estamos en la página 2 o más de X
                //Hay páginas previas
                //Puede haber páginas después de la actual
                } else {
                    $html .= self::getBackButtons($total_paginas, $num_pagina_actual);
                    $html .= $btn_actual;

                    //Hay páginas después de la actual
                    if ($num_pagina_actual < $total_paginas)
                        $html .= self::getFrontButtons($total_paginas, $num_pagina_actual);
                }

                return $html;

            } else
                prob("<b>" . self::$clase . " / getActiveButtons()</b> -> Err args");

            return FALSE;
        }

        /**
         * Aux. getActiveButtons()
         * Obtiene botones que preceden al actual
         *
         */
        private static function getBackButtons( $total_paginas=NULL, $num_pagina_actual=NULL ) {
            prob("<b>" . self::$clase . " / getBackButtons()</b>");

            if ($total_paginas && $num_pagina_actual && ($num_pagina_actual > 1)) {
                $html_botones = '';

                //Hay sólo 2 páginas -> 1 boton numérico
                if ($num_pagina_actual === 2)
                    return self::getButtonRetroceso(1);

                //2 o + páginas antes de la actual -> 2 botones
                else {

                    //2 páginas antes de la actual -> 2 botones numéricos
                    if ($num_pagina_actual === 3) {
                        $html_botones  = self::getButtonRetroceso(1);
                        $html_botones .= self::getButtonRetroceso(2);
                    
                    //+ de 2 páginas antes de la actual -> 2 botones: 1 numérico + 1 de retroceso
                    } else {
                        $html_botones  = self::getButtonRetroceso($num_pagina_actual - 3, TRUE);
                        $html_botones .= self::getButtonRetroceso($num_pagina_actual - 1);
                    }
                }
                return $html_botones;

            } else
                prob("<b>" . self::$clase . " / getBackButtons()</b> -> Err args");
                
            return FALSE;
        }

        /**
         * Aux. getActiveButtons()
         * Obtiene botones que siguen al actual
         *
         */
        private static function getFrontButtons( $total_paginas=NULL, $num_pagina_actual=NULL ) {
            prob("<b>" . self::$clase . " / getFrontButtons()</b>");

            if ($total_paginas && $num_pagina_actual) {
                $html_botones = '';

                $num_pagina_actual = (int)$num_pagina_actual;
                $total_paginas     = (int)$total_paginas;

                //Solo 1 página después de la actual -> 1 boton numérico
                if ($num_pagina_actual === ($total_paginas - 1)) {
                    $avance       = $num_pagina_actual + 1;
                    $html_botones = self::getButtonAvance( $avance );
                
                //2 o + páginas después de la actual -> 2 botones
                } else {

                    //Solo 2 páginas después de la actual -> 2 botones numéricos
                    if ($num_pagina_actual === ($total_paginas - 2)) {
                        $avance        = $num_pagina_actual + 1;
                        $html_botones  = self::getButtonAvance( $avance );
                        $avance        = $num_pagina_actual + 2;
                        $html_botones .= self::getButtonAvance( $avance );
                    }

                    //+ de 2 páginas después de la actual -> 1 boton numérico + 1 de avance
                    if ($num_pagina_actual <= ($total_paginas - self::$salto)) {
                        $avance        = $num_pagina_actual + 1;
                        $html_botones  = self::getButtonAvance( $avance );
                        $avance        = $num_pagina_actual + self::$salto;
                        $html_botones .= self::getButtonAvance( $avance, TRUE );
                    }
                }
                
                return $html_botones;

            } else
                prob("<b>" . self::$clase . " / getFrontButtons()</b> -> Err args");
                
            return FALSE;
        }

        /**
         * Aux. getFrontButtons()
         * Compone un boton activo
         * 
         * @param  int      $num -> número para el boton
         * @param  boolean  $boton_de_avance -> se require boton de avance
         * @return String -> HTML
         */
        private static function getButtonAvance( $num=NULL, $boton_de_avance=FALSE ) {
            //prob('getButtonAvance()');
            
            if ((int)$num > 0 || $num === 0) {
                $ini_boton_activo   = '<a href="' . self::$url;
                $class_boton_activo = '" class="btn-paginador"><div>';
                $cierre_btn_activo  = '</div></a>';

                $boton = ($boton_de_avance) 
                    ? $ini_boton_activo . $num . $class_boton_activo . '&#62;' . $cierre_btn_activo // >
                    : $ini_boton_activo . $num . $class_boton_activo . $num . $cierre_btn_activo;
           
                return $boton;

            } else
                prob("<b>" . self::$clase . " / getButtonAvance()</b> -> Err args");
                
            return FALSE;
        }

        /**
         * Aux. getBackButtons()
         * Compone un boton activo
         * 
         * @param  int      $num -> número para el boton
         * @param  boolean  $boton_de_retroceso -> se require boton de retroceso
         * @return String -> HTML
         */
        private static function getButtonRetroceso( $num=NULL, $boton_de_retroceso=FALSE ) {
            //prob('getButtonRetroceso()');
            
            if ((int)$num > 0) {
                $ini_boton_activo   = '<a href="' . self::$url;
                $class_boton_activo = '" class="btn-paginador"><div>';
                $cierre_btn_activo  = '</div></a>';

                $boton = ($boton_de_retroceso) 
                    ? $ini_boton_activo . $num . $class_boton_activo . '&#60;' . $cierre_btn_activo // <
                    : $ini_boton_activo . $num . $class_boton_activo . $num . $cierre_btn_activo;
            
                return $boton;

            } else
                prob("<b>" . self::$clase . " / getButtonRetroceso()</b> -> Err args");
                
            return FALSE;
        }

} //class