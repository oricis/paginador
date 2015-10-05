<?php

/*
 * Test clase: Paginador
 *
 * 2/10/2015
 */

//////////////////////////////////////////////////
// Configuración x defecto paginador
//

    //Intancia modelo:
    $modelo = new ironwoods\paginator\clases\GestorConsultas();

    //Carga modelo y url para los botones
    ironwoods\paginator\clases\Paginar::setModel($modelo);
    ironwoods\paginator\clases\BotonesPaginador::setUrl('mi-url/');
    $num_resultados_x_pagina = 10;


//////////////////////////////////////////////////
// Impresión estilos
//
echo '<style>';
echo ' .paginador div { border: 1px solid grey; display: inline-block; margin: 3px; padding: 5px; }';
echo ' .paginador { font-weight: bold; }';
echo '</style>';

//////////////////////////////////////////////////
// Tests
//

/**********************************************************/
/*** Test 1 - Consultando todas las regiones - Página 1 ***/
	echo( "<h1>Test 1</h1>" );
	echo( "<h2>Consultando todas las regiones - Página 1</h2>" );


	//Puede pasarse la SELECT o el nombre de la tabla
	$consulta = "SELECT * FROM regiones";
	$res = ironwoods\paginator\clases\Paginar::get( $consulta );	//Obtiene datos de la consulta y HTML botones

	ironwoods\paginator\clases\Paginar::getBtnsRegistrados();
	ironwoods\paginator\clases\Paginar::getQueriesRegistradas();
	echo '<hr>';

/**********************************************************/
/*** Test 2 - Consultando todas las regiones - Página 2 ***/
	echo( "<h1>Test 2</h1>" );
	echo( "<h2>Consultando todas las regiones - Página 2</h2>" );


	//Puede pasarse la SELECT o el nombre de la tabla
	$consulta = "SELECT * FROM regiones";
	$res = ironwoods\paginator\clases\Paginar::get( $consulta, 2 );	//Obtiene datos de la consulta y HTML botones

	ironwoods\paginator\clases\Paginar::getBtnsRegistrados();
	ironwoods\paginator\clases\Paginar::getQueriesRegistradas();
	echo '<hr>';

/**********************************************************/
/*** Test 3 - Consultando todas las regiones - Página 3 ***/
	echo( "<h1>Test 3</h1>" );
	echo( "<h2>Consultando todas las regiones - Página 3</h2>" );

	
	//Puede pasarse la SELECT o el nombre de la tabla
	$consulta = "SELECT * FROM regiones";
	$res = ironwoods\paginator\clases\Paginar::get( $consulta, 3 );	//Obtiene datos de la consulta y HTML botones

	ironwoods\paginator\clases\Paginar::getBtnsRegistrados();
	ironwoods\paginator\clases\Paginar::getQueriesRegistradas();
	echo '<hr>';

/**********************************************************/
/*** Test 4 - Consultando todas las regiones - Página 4 ***/
	echo( "<h1>Test 4</h1>" );
	echo( "<h2>Consultando todas las regiones - Página 4</h2>" );

	
	//Puede pasarse la SELECT o el nombre de la tabla
	$consulta = "SELECT * FROM regiones";
	$res = ironwoods\paginator\clases\Paginar::get( $consulta, 4 );	//Obtiene datos de la consulta y HTML botones

	ironwoods\paginator\clases\Paginar::getBtnsRegistrados();
	ironwoods\paginator\clases\Paginar::getQueriesRegistradas();
	echo '<hr>';

/**********************************************************/
/*** Test 5 - Consultando todas las regiones - Página 5 ***/
	echo( "<h1>Test 5</h1>" );
	echo( "<h2>Consultando todas las regiones - Página 5</h2>" );
	

	//Puede pasarse la SELECT o el nombre de la tabla
	$consulta = "SELECT * FROM regiones";
	$res = ironwoods\paginator\clases\Paginar::get( $consulta, 5 );	//Obtiene datos de la consulta y HTML botones

	ironwoods\paginator\clases\Paginar::getBtnsRegistrados();
	ironwoods\paginator\clases\Paginar::getQueriesRegistradas();
	echo '<hr>';


/**/