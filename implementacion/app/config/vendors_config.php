<?php

/*** Fin / Carga de ficheros ***/
/*
 *
 */
/*** Configuración librerías ***/

	//kint
	function dev($var=NULL) {
        //echo 'dev()<br>';
        if (DEBUG)
            d($var);
    }

    function dev_p($var=NULL) {
        dev_plain($var);
    }
    function dev_plain($var=NULL) {
        //echo 'dev_plain()<br>';
        if (DEBUG)
            s($var);
    }

/*** Fin / Configuración librerías ***/