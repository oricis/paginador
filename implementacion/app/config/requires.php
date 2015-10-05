<?php

/*** Carga de ficheros ***/

	require "app/config/config.php";		   //config principal
    require PATH_CONFIG . "bd_config.php"; //importa config BD

//importa librerias debug
    require PATH_VENDORS . "kint-0.9/kint.class.php";
    require PATH_CONFIG . "vendors_config.php";

//importa clases
    require PATH_TEST . "test.php";
    require PATH_CORE . "funciones.php";
    require PATH_CORE . "app.php";
	require PATH_CORE . "dbcon.php";

    require PATH_HELPERS . "utils.php";
    require PATH_COMPOSERS . "botonespaginador.php";
    require PATH_COMPOSERS . "buscadorcomposer.php";

    require PATH_CLASES . "gestorconsultas.php";
    require PATH_CLASES . "registrosactividadpaginar.php";
    require PATH_CLASES . "paginar.php";



