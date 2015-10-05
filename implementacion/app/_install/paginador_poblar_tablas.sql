/**********************************************************************/
/*** POBLAR TABLAS ****************************************************/

/***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***
 ***                                               ***
 ***            Proyecto: CMS - INMO               ***
 ***            Moisés Alcocer, 2015               ***
 ***                                               ***
 ***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***/

/**/ /* El tag es necesario para el despliegue */

/**/
INSERT INTO provincias (`id_provincia`, `nombre`) VALUES
	(NULL, 'Álava'), 
	(NULL, 'Albacete'),
	(NULL, 'Alicante'), 
	(NULL, 'Almería');
/**/
INSERT INTO regiones (`id_region`, `nombre`, `descripcion`, `provincia_id`) VALUES 
	(NULL, 'La Jara',   	'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '1'), 
	(NULL, 'Caravera',  	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espiguera', 	'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '1'),
	(NULL, 'La Real',   	'Lorem ipsum', '3'),
	(NULL, 'La Real',   	'Lorem ipsum sit amet', '2'), 
	(NULL, 'Cañaveral', 	'Lorem ipsum', '3'),
	(NULL, 'La Espina', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Marranal',  	'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '1'),
	(NULL, 'La llana',  	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'La fuente', 	'Lorem ipsum dolor, consectetur adipisicing elit.', '1'),
	(NULL, 'Lamaranta', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Lamaranta', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Navalón',		'Lorem ipsum sit amet', '2'),
	(NULL, 'Peñalva',		'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Peñalva del Jalón', 'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espi de Enguera', 'Lorem ipsum dolor sit adipisicing elit.', '1'),
	(NULL, 'Font de Enguera', 'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Mijares',   	'Lorem ipsum , consectetur adipisicing elit. amet', '1'),
	(NULL, 'Cigüenueras', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Peñarubia', 	'Lorem ipsum , consectetur adipisicing elit. amet', '1'),
	(NULL, 'Miñanares',   	'Consectetur adipisicing elit.', '1'),
	(NULL, 'Cienriscos', 	'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espi la Manca', 'Lorem ipsum sit amet', '2'),
	(NULL, 'Manga menor',   'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Manga mayor',   'Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espinares',     'Lorem ipsum', '3'),
	(NULL, 'El Pozuelo', 	'Lorem ipsum sit amet', '2'),
	(NULL, 'Jara de Abajo', 'Lorem ipsum dolor sit adipisicing elit.', '1'), 
	(NULL, 'Jara de Arriba','Lorem ipsum dolor sit amet', '1'),
	(NULL, 'Espina Doro',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '1'),
	(NULL, 'El Pozo de Aba','Lorem ipsum sit amet', '2'),
	(NULL, 'Jaralejos', 	'Lorem ipsum dolor sit amet', '1'), 
	(NULL, 'Pinares negros','Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '1'),
	(NULL, 'El Llano', 		'Lorem ipsum sit amet', '2'),
	(NULL, 'Jara del Ama', 	'Lorem ipsum sit amet', '4'), 
	(NULL, 'Espiguerales',  'Lorem ipsum sit amet', '4'),
	(NULL, 'Punta de Aro',  'Lorem ipsum sit amet', '2');
/**/