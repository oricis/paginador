<?php

/**
 * Clase Xxx
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

final class Xxx extends Xxx {

	/************************************/
    /*** Declaración de propiedades *****/

        private $clase  = "Xxx";
            

    /************************************/
    /*** Delaración de métodos  *********/

        /**
         * Constructor
         * Hereda el contructor de Controller
         */
        public function __construct() { 
            parent::__construct();
            prob("<br>Instanciado: <b>{$this->clase}</b>");

        }

    /*** Métodos públicos *************/

    	/**
         * Metodo que se ejecuta por defecto
         */ 
        public function index() {
            prob("{$this->clase}, método: index()"); //traza
        }

        /**
         * Descripción método
         * @param  tipo $xxx ---> Descripción
         * @param  tipo $zzz
         * @return tipo
         */
        public function xxx($xxx=NULL, $zzz=NULL) {
            prob("{$this->clase} / xxx()");

            return $xxx;
        }

    /*** Métodos privados *************/

} //class