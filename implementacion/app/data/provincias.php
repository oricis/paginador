<?php

/**********************************************************************/
/*** DATOS DEMO *******************************************************/

/***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***
 ***                                               ***
 ***            Proyecto: CMS - INMO               ***
 ***            Moisés Alcocer, 2015               ***
 ***                                               ***
 ***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***/


$provincias = "
	(NULL, 'Álava'), 
	(NULL, 'Albacete'),
	(NULL, 'Alicante'), 
	(NULL, 'Almería'),";

$provincias = str_replace( '(NULL,', '', $provincias );
//dev( $provincias );

$arr_provincias = Utils::getStringToArray($provincias, '),');
//dev( $arr_provincias );

$arr_temp 		= array();
$arr_resultado 	= array();

foreach ($arr_provincias as $provincia) {
	if ($provincia)
		$arr_resultado[] = array('nombre' => trim(str_replace( '\'', '', $provincia )));
}
//dx( $arr_resultado );

return $arr_resultado;

/*
INSERT INTO provincias (`id_provincia`, `nombre`) VALUES
	(NULL, 'Álava'), 
	(NULL, 'Albacete'),
	(NULL, 'Alicante'), 
	(NULL, 'Almería');

/**/