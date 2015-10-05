<?php

/**********************************************************************/
/*** DATOS DEMO *******************************************************/

/***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***
 ***                                               ***
 ***            Proyecto: CMS - INMO               ***
 ***            Moisés Alcocer, 2015               ***
 ***                                               ***
 ***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***/


$regiones = "
	(NULL, 'La Jara',   	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'), 
	(NULL, 'Caravera',  	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espiguera', 	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'La Real',   	'Lorem ipsum', '3'),
	(NULL, 'La Real',   	'Lorem ipsum sit amet', '2'), 
	(NULL, 'Canaveral', 	'Lorem ipsum', '3'),
	(NULL, 'La Espina', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Marranal',  	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'La llana',  	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'La fuente', 	'Lorem ipsum dolor, consectetur adipisicing elit.', '1'),
	(NULL, 'Lamaranta', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Lamaranta', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Navados', 		'Lorem ipsum sit amet', '2'),
	(NULL, 'Peñalva', 		'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Peralva del Jao', 'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espi de Enguera', 'Lorem ipsum dolor sit adipisicing elit.', '1'),
	(NULL, 'Font de Enguera', 'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Mijares',   	'Lorem ipsum consectetur adipisicing elit. amet', '1'),
	(NULL, 'Cimerelas', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Penarubia', 	'Lorem ipsum consectetur adipisicing elit. amet', '1'),
	(NULL, 'Milanares',   	'Consectetur adipisicing elit.', '1'),
	(NULL, 'Cienriscos', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espi la Manca', 'Lorem ipsum sit amet', '2'),
	(NULL, 'Manga menor',   'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Manga mayor',   'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espinares',     'Lorem ipsum', '3'),
	(NULL, 'El Pozuelo', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Jara de Abajo', 'Lorem ipsum dolor sit adipisicing elit.', '1'), 
	(NULL, 'Jara de Arriba', 'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'El Pozo de Aba', 'Lorem ipsum sit amet', '2'),
	(NULL, 'Espina Doro', 	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'Jaralejos', 	'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Pinares negros', 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'El Llano', 		'Lorem ipsum sit amet', '2'),
	(NULL, 'Jara del Ama', 	'Lorem ipsum sit amet', '4'), 
	(NULL, 'Espigüerales',  'Lorem ipsum sit amet', '4'),
	(NULL, 'Punta de Aro',  'Lorem ipsum sit amet', '2'),";

$regiones = str_replace( '(NULL,', '',	$regiones );
//dev( $regiones );

$arr_regiones = Utils::getStringToArray($regiones, '),');
//dev( $arr_regiones );

$arr_temp 		= array();
$arr_resultado 	= array();

foreach ($arr_regiones as $region) {
	if ($region) {
		$arr = Utils::getStringToArray($region, ', ');
		if (!isset($arr[2]))
			prob($arr[0]);
		$arr_temp['region'] 	 	= trim(str_replace( '\'', '', $arr[0] ));
		$arr_temp['descripcion'] 	= trim(str_replace( '\'', '', $arr[1] ));
		$arr_temp['provincia_id'] 	= (int)trim(str_replace( '\'', '', $arr[2] ));

		$arr_resultado[] = $arr_temp;
	}
}
//dx( $arr_resultado );

return $arr_resultado;

/*
INSERT INTO regiones (`id_region`, `nombre`, `descripcion`, `provincia_id`) VALUES 
	(NULL, 'La Jara',   	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'), 
	(NULL, 'Caravera',  	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espiguera', 	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'La Real',   	'Lorem ipsum', '3'),
	(NULL, 'La Real',   	'Lorem ipsum sit amet', '2'), 
	(NULL, 'Cañaveral', 	'Lorem ipsum', '3'),
	(NULL, 'La Espina', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Marranal',  	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'La llana',  	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'La fuente', 	'Lorem ipsum dolor, consectetur adipisicing elit.', '1'),
	(NULL, 'Lamaranta', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Lamaranta', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Navalón',		'Lorem ipsum sit amet', '2'),
	(NULL, 'Peñalva',		'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Peñalva del Jalón', 'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espi de Enguera', 'Lorem ipsum dolor sit adipisicing elit.', '1'),
	(NULL, 'Font de Enguera', 'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Mijares',   	'Lorem ipsum consectetur adipisicing elit. amet', '1'),
	(NULL, 'Cigüenueras', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Peñarubia', 	'Lorem ipsum consectetur adipisicing elit. amet', '1'),
	(NULL, 'Miñanares',   	'Consectetur adipisicing elit.', '1'),
	(NULL, 'Cienriscos', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espi la Manca', 'Lorem ipsum sit amet', '2'),
	(NULL, 'Manga menor',   'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Manga mayor',   'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espinares',     'Lorem ipsum', '3'),
	(NULL, 'El Pozuelo', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Jara de Abajo', 'Lorem ipsum dolor sit adipisicing elit.', '1'), 
	(NULL, 'Jara de Arriba','Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espina Doro',	'Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'El Pozo de Aba','Lorem ipsum sit amet', '2'),
	(NULL, 'Jaralejos', 	'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Pinares negros','Lorem ipsum dolor sit amet consectetur adipisicing elit.', '1'),
	(NULL, 'El Llano', 		'Lorem ipsum sit amet', '2'),
	(NULL, 'Jara del Ama', 	'Lorem ipsum sit amet', '4'), 
	(NULL, 'Espiguerales',  'Lorem ipsum sit amet', '4'),
	(NULL, 'Punta de Aro',  'Lorem ipsum sit amet', '2')
/**/