<?php

/*
 * Test clase: ironwoods\paginator\clases\BotonesPaginador
 */

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

/*** Paginas 0 - 3 ***/

/*		$total_paginas=0;	//genera error (debe ser 1 o más)
		$pagina_actual=0;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Composer: ironwoods\paginator\clases\BotonesPaginador / get() -> Err args
		echo '<hr>';

		$total_paginas=1;
		$pagina_actual=2;	//genera error (debe ser igual o menor al total de páginas)
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Composer: ironwoods\paginator\clases\BotonesPaginador / get() -> Err args
		echo '<hr>';

		$pagina_actual=0;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 1
		echo '<hr>';

		$total_paginas=1;
		$pagina_actual=1;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 1
		echo '<hr>';

		$total_paginas=2;
		$pagina_actual=0;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=1;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=2;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';
/**/
		$total_paginas=3;
		$pagina_actual=1;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$total_paginas=3;
		$pagina_actual=2;
		echo('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';
		
		$total_paginas=3;
		$pagina_actual=3;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

/*** Paginas 4 - 6 ***/

		$total_paginas=4;
		$pagina_actual=1;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=2;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=3;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=4;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$total_paginas=5;
		$pagina_actual=1;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=2;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=3;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=4;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=5;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$total_paginas=6;
		$pagina_actual=1;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=2;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=3;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=4;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=5;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=6;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';


/*** Paginas 7 ***/


		$total_paginas=7;
		$pagina_actual=1;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=2;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=3;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=4;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=5;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=6;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

		$pagina_actual=7;
		prob('Test -> página ' .$pagina_actual. ' de ' .$total_paginas);
		prob( ironwoods\paginator\clases\BotonesPaginador::get( $total_paginas, $pagina_actual ));	//Página 1 de 2 // 1  2(link)
		echo '<hr>';

/**/