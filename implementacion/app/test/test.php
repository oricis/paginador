<?php

/**
 * Clase "Test"
 * Realizar test de la App
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */

final class Test {

	/************************************/
    /*** Declaración de propiedades *****/

        private $clase = "Test";
            

    /************************************/
    /*** Delaración de métodos  *********/

    /**
     * Constructor
     */
	public function __construct( $test=NULL ) {
		prob("Instanciada clase: <b>{$this->clase}</b>");

		if (!defined('TEST') || !TEST)
			header("location:index.php");

		else {
			echo '<meta charset="UTF-8">';
			
			switch ($test) {
				case 'ArraysDatos': 	 $this->testArraysDeDatos();	break;
				case 'BotonesPaginador': $this->testBotonesPaginador();	break;
				case 'GestorConsultas':  $this->testGestorConsultas();	break;
				case 'Paginador': 		 $this->testPaginador();		break;
				case 'PaginadorRegistros': $this->testPaginadorRegistros();		break;

				default:
					die( '¿Se ha indicado test?' );
			}
		}
	}

	/*** Métodos públicos *************/

	/**
	 * [testArraysDeDatos description]
	 * 
	 */
	public function testArraysDeDatos() {
		prob("{$this->clase} / test: <b>Arrays de datos</b>");

		/*************************************/
		/*** Test Arrays de datos ************/

		prob( 'Cargando regiones...' );
		$arr_regiones   = require PATH_DATOS . 'regiones.php';

		prob( 'Cargando provincias...' );
		$arr_provincias = require PATH_DATOS . 'provincias.php';

		dx( $arr_regiones );
		/**/
	}

	/**
	 * [testBotonesPaginador description]
	 * 
	 */
	public function testBotonesPaginador() {
		prob("{$this->clase} / test: <b>BotonesPaginador</b>");

		/*************************************/
		/*** Test clase BotonesPaginador *****/

		require PATH_TEST . 'testbotonespaginador.php';
	}

	/**
	 * [testGestorConsultas description]
	 * 
	 */
	public function testGestorConsultas() {
		prob("{$this->clase} / test: <b>GestorConsultas</b>");

		/*************************************/
		/*** Test clase -> GestorConsultas ***/
		
		$gc = new ironwoods\paginator\clases\GestorConsultas();
		/*
		//Nombre provincia dada ID (funcion privada -> cambiar visibilidad antes test)
		dev( $gc->getNombreProvincia( 1 ) );
		dev( $gc->getNombreProvincia( 2 ) );
		dev( $gc->getNombreProvincia( 3 ) );
		dev( $gc->getNombreProvincia( 4 ) );
		dev( $gc->getNombreProvincia( 5 ) ); //No existe la provincia 5
		prob('<hr>');

		//ID provincia dado Nombre (funcion privada -> cambiar visibilidad antes test)
		dev( $gc->getIdProvincia( 'Álava' ) );
		dev( $gc->getIdProvincia( 'Frog' ) ); //No existe la provincia
		prob('<hr>');
		/**/
		
		//Lista provincias
		dev( $gc->getListaProvincias() );
		prob('<hr>');

		//Lista regiones
		dev( $gc->getListaRegiones() );
		prob('<hr>');

		//Lista regiones de la provincia: Albacete
		dev( $gc->getRegionesDe('Albacete') );
		prob('<hr>');

		//Lista regiones de la provincia: Almería
		dev( $gc->getRegionesDe('Almeria') );
		prob('<hr>');

		/**/
	}

	/**
	 * [testPaginador description]
	 * 
	 */
	public function testPaginador() {
		prob("{$this->clase} / test: <b>testPaginador</b>");

		/*************************************/
		/*** Test clase Paginador ************/

		require PATH_TEST . 'testpaginador.php';
	}

	/**
	 * [testPaginadorRegistros description]
	 * 
	 */
	public function testPaginadorRegistros() {
		prob("{$this->clase} / test: <b>testPaginadorRegistros</b>");

		/*************************************/
		/*** Test clase Paginador ************/

		require PATH_TEST . 'testpaginadorregistros.php';
	}
	
	/*** Métodos privados *************/

} //class