<?php

/**
 * paginar.php
 *
 * Clase para páginar resultados
 */
use ironwoods\paginator\clases\Paginar as Paginar;

final class App {

    /************************************/
    /*** Declaración de propiedades *****/

        private $clase  = "App";
        private $modelo = NULL; //para instancia del modelo
        private $nombre_modelo = "ironwoods\paginator\clases\GestorConsultas";

        private $arr_datos = array(); //Almacenara las provincias y en caso de busqueda tb las regiones


    /************************************/
    /*** Delaración de métodos  *********/

        /**
         * Constructor
         * Hereda el contructor de Controller
         */
        public function __construct( $provincia=NULL, $num_pagina=NULL ) { 
            prob("<br>Instanciado: <b>{$this->clase}</b>");

            //Intancia modelo y guarda en propiedad de la clase
            $this->modelo = new $this->nombre_modelo;

            //Obtener datos de la BD
            $this->arr_datos['provincias'] = $this->modelo->getListaProvincias();

            //Se recibe provincia -> mostrar regiones
            if ($provincia)
                $this->consultar($provincia, $num_pagina);
            
            //No se recibe provincia -> mostrar formulario x defecto
            else
                $this->index();
        }

    /*** Métodos públicos *************/

        /**
         * Metodo que se ejecuta por defecto
         * Cargar vista formulario de busqueda / página de resultados
         */ 
        public function index() {
            prob("{$this->clase}, método: index()"); //traza

            require PATH_VIEWS . 'buscador.php';
        }

        /**
         * Recibe la provincia consultada
         * 
         * @param  String $provincia
         * @param  tipo $zzz
         * @return tipo
         */
        public function consultar( $provincia=NULL, $num_pagina=NULL ) {
            prob("{$this->clase} / consultar() -> Provincia: {$provincia}");

            $tabla_reg  = PREF_TAB . 'regiones';
            $tabla_prov = PREF_TAB . 'provincias';

            if ($provincia === 'todas')
                $consulta = $tabla_reg;

            else {
                $campos     = "*";
                $consulta   = "SELECT {$campos} FROM {$tabla_reg} WHERE provincia_id=
                    (SELECT id_provincia FROM {$tabla_prov} WHERE nombre='{$provincia}')";
            }
            

            //
            // Configuración paginador
            //
            
            Paginar::setModel($this->modelo);               //Carga modelo
            Paginar::setTablas(['regiones', 'provincias']); //Carga tablas
            Paginar::setUrl('index.php?provincias='.$provincia.'&pagina='); //Carga url para botones
            $num_resultados_x_pagina = 5;

            //Obtiene datos de la consulta y HTML botones
            $arr_respuesta = Paginar::get(  $consulta, 
                                            (int)$num_pagina, 
                                            $num_resultados_x_pagina );

            if ($arr_respuesta && is_array($arr_respuesta)) {
                prob("Resultados: " . count($arr_respuesta['datos']));
                
                //Añade el nombre de la provincia a los datos de regiones
                $arr_regiones = $this->componer($arr_respuesta['datos'], $provincia);

                $this->arr_datos['regiones'] = $arr_regiones;
                $this->arr_datos['botones']  = $arr_respuesta['botones'];
            }
            
            //Carga la vista
            require PATH_VIEWS . 'buscador.php';
        }

    /*** Métodos privados *************/

        /**
         * Añade el nombre de la provincia a los datos de regiones
         * 
         * @param  Array    $arr_regiones
         * @param  String   $provincia
         * @return Array
         */
        private function componer( $arr_regiones=NULL, $provincia=NULL ) {
            prob("{$this->clase} / componer()");

            if ($arr_regiones && $provincia) {
                $arr_res = array();

                foreach ($arr_regiones as $arr_region)
                    $arr_res[] = array(
                        'seleccionado'  => $provincia,
                        'id_region'     => $arr_region['id_region'],
                        'nombre'        => $arr_region['nombre'],
                        'descripcion'   => $arr_region['descripcion'],
                        'provincia'     => $this->getProvincia($provincia, $arr_region['provincia_id']));
                
                //dev($arr_res); die();  //traza
                return $arr_res;

            } else
                prob("{$this->clase} / componer() -> Err args");

            return FALSE;
        }

        /**
         * Obtiene nombre de la provincia
         * 
         * @param  String   $provincia
         * @param  int      $provincia_id
         * @return String
         */
        private function getProvincia( $provincia=NULL, $provincia_id=NULL ) {
            prob("{$this->clase} / getProvincia() -> {$provincia}"); //echo '<br>';

            //Tenemos nombre para la provincia
            if ($provincia && $provincia !== 'todas')
                return $provincia;

            //No hay nombre de provincia -> obtener
            elseif ($provincia_id && (int)$provincia_id > 0) {
                prob("Obteniendo nombre provincia..."); //echo '<br>';

                //Intancia modelo:
                //$modelo = new GestorConsultas();

                //Realizar query
                $tabla_prov = PREF_TAB . 'provincias';
                $consulta   = "SELECT nombre FROM {$tabla_prov} WHERE id_provincia='{$provincia_id}'";
                $res        = $this->modelo->consultar($consulta);

                //var_dump($res); die();
                //Se obtuvo nombre de provincia
                if ($res && isset($res[0]['nombre']))
                    return $res[0]['nombre'];

                //No se obtuvo nombre de provincia
                prob("{$this->clase} / getProvincia() -> Err: No se obtuvo nombre de provincia");

            } else
                prob("{$this->clase} / getProvincia() -> Err args");

            return FALSE;
        }

} //class