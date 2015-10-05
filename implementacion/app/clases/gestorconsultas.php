<?php namespace ironwoods\paginator\clases;

/**
 * Clase que maneja acceso a la BD
 *
 * Proyecto: paginador
 * Desarrollo inicial: Sept. 2015
 *
 * @autor: Moisés Alcocer
 */
use ironwoods\app\core\DbCon as DbCon;

final class GestorConsultas extends DbCon {

	/************************************/
    /*** Declaración de propiedades *****/

        private $clase  = "GestorConsultas";
        private $nombre_tabla = "provincias";

        //Si datos proceden de ficheros
        private $arr_provincias = NULL;
        private $arr_regiones   = NULL;
            

    /************************************/
    /*** Delaración de métodos  *********/

        /**
         * Constructor
         * Hereda el contructor de Controller
         */
        public function __construct() { 
            prob("Instanciado: <b>{$this->clase}</b>");
            
            /**
             * Los datos van a ser proporcionados por la base de datos "config/bd_config.php":
             *  - paginador -> tabla: "provincias"
             *  - paginador -> tabla: "regiones"
             */
            if (defined('FUENTE_DATOS') && FUENTE_DATOS === 'bd') {
                parent::__construct();

                $this->nombre_tabla = PREF_TAB.$this->nombre_tabla;
            }

            /**
             * Cargar los datos
             * Los datos van a ser proporcionados por arrays de datos:
             *  - data/provincias
             *  - data/regiones
             */
            if (defined('FUENTE_DATOS') && FUENTE_DATOS === 'ficheros') {
                $this->arr_provincias = require PATH_DATOS . 'provincias.php';
                $this->arr_regiones   = require PATH_DATOS . 'regiones.php';
            }
        }

    /*** Métodos públicos *************/

        /**
         * Devuelve resultado de consultar la tabla "provincias"
         * 
         * @return Array
         */
        public function getListaProvincias() {
            prob("{$this->clase} / <b>getListaProvincias()</b>");

            //Los datos vienen de arrays
            if ($this->arr_provincias)
                $res = $this->arr_provincias;

            //Obtener datos de la BD
            else
                $res = $this->getAll("SELECT * FROM provincias");

            //dx($res); die();    //traza

            return ($res && is_array($res)) ? $res : FALSE;
        }

        /**
         * Devuelve resultado de consultar la tabla "regiones"
         * 
         * @return Array
         */
        public function getListaRegiones() {
            prob("{$this->clase} / <b>getListaRegiones()</b>");

            //Los datos vienen de arrays
            if ($this->arr_regiones)
                $res = $this->arr_regiones;

            //Obtener datos de la BD
            else {
                $tabla = PREF_TAB . 'regiones';
                $sql = "SELECT * FROM {$tabla}";

                $res = $this->getAll( $sql );
            }

            //dx($res); die();    //traza
            
            return ($res && is_array($res)) ? $res : FALSE;
        }

        /**
         * Devuelve las "regiones" de la provincia
         *
         * @param  String   $provincia
         * @return Array
         */
        public function getRegionesDe( $provincia=NULL ) {
            prob("{$this->clase} / <b>getRegionesDe()</b>");

            $res = NULL;

            if ($provincia && is_string($provincia)) {
                $provincia_id = $this->getIdProvincia($provincia);

                if ((int)$provincia_id > 0) {
                    $arr_regiones = $this->getListaRegiones();
                    
                    //dx('ID provincia: ' . $provincia_id); dx($arr_regiones); //traza
                    

                    if ($arr_regiones && is_array($arr_regiones))
                        return $this->getCoincidencias( $arr_regiones, $provincia_id);
                }

            } else
                prob("{$this->clase} / getRegionesDe() -> Err args");
            
            return FALSE;
        }

        /**
         * Realizar queries
         * 
         * @param  String $consulta
         * @return Array
         */
        public function consultar( $consulta=NULL ) {
            prob("{$this->clase} / <b>consultar()</b>");

            if ($consulta && is_string($consulta))
                return $this->getAll( Paginar::cleanQuery($consulta) );

            else
                prob("{$this->clase} / <b>consultar()</b> -> Err args");

            return FALSE; 
        }

        /**
         * Devuelve nombre de  la provincia dada su ID
         * 
         * @param  int   $provincia_id
         * @return String
         */
        public function getNombreProvincia( $provincia_id=NULL ) {
            prob("{$this->clase} / <b>getNombreProvincia()</b>");

            if ($provincia_id) {
                $contador     = 1; //Para ID si no existe indice
                $provincia_id = (int)$provincia_id;

                $arr_provincias = $this->getListaProvincias();

                if ($arr_provincias && is_array($arr_provincias)) {
                    foreach ($arr_provincias as $provincia) {
                        
                        //El indice existe -> Las provincias vienen de BD
                        if (isset($provincia['id_provincia'])) {
                            //prob('Encontrada ID provincia...');

                            if ($provincia_id === (int)$provincia['id_provincia'])
                                return $provincia['nombre'];
                        
                        //El indice NO existe -> Las provincias vienen de array, el indice lo simula el contador
                        } else {
                            //prob('NO encontrada ID provincia...');
                            //prob('provincia_id: ' . $provincia_id . ' / contador: ' . $contador);

                            if ($provincia_id === $contador)
                                return $provincia['nombre'];

                            $contador++;
                        }
                    }

                } else
                    prob("Err obteniendo provincias");
            } else
                prob("{$this->clase} / getNombreProvincia() -> Err args");
            
            return FALSE;
        }


    /*** Métodos privados *************/

        /**
         * Devuelve "regiones" de la provincia dada su ID
         *
         * @param  Array    $arr_regiones
         * @param  int      $provincia_id
         * @return Array
         */
        private function getCoincidencias( $arr_regiones=NULL, $provincia_id=NULL ) {
            prob("{$this->clase} / <b>getCoincidencias()</b>");

            if ($arr_regiones && $provincia_id) {
                prob('Comprobando...');
                
                $arr_res = array();

                foreach ($arr_regiones as $region) {
                    if ((int)$region['provincia_id'] === (int)$provincia_id)
                        $arr_res[] = $region;
                }

                return $arr_res;
            } else
                prob("{$this->clase} / getCoincidencias() -> Err args");
            
            return FALSE;
        }

        /**
         * Devuelve la ID para la provincia
         * 
         * @param  String   $nombre_provincia
         * @return int
         */
        private function getIdProvincia( $nombre_provincia=NULL ) {
            prob("{$this->clase} / <b>getIdProvincia()</b> -> {$nombre_provincia}");

            if ($nombre_provincia) {
                $contador = 1;

                $arr_provincias = $this->getListaProvincias();

                if ($arr_provincias && is_array($arr_provincias)) {
                    foreach ($arr_provincias as $provincia) {
                        if ($nombre_provincia === $provincia['nombre']) {

                            if (isset($provincia['id_provincia'])) {
                                //prob('Encontrada ID provincia...');
                                return $provincia['id_provincia'];

                            } else {
                                //prob('NO encontrada ID provincia...');
                                return $contador;
                            }
                        }

                        $contador++;
                    }
                } else
                    prob("Err obteniendo provincias");
            } else
                prob("{$this->clase} / getIdProvincia() -> Err args");
            
            return FALSE;
        }


    /***************************************************
     *
     * Consulta a la BD
     */
    
        /**
         * Devuelve el resultado de una consulta (todos los registros)
         * @param  String $sql
         * @return FALSE / Array de objetos
         */
        private function getAll( $sql=NULL ) {
            //prob("{$this->clase} / getAll() -> {$sql}");  //For debug
            
            if (is_null($sql)) 
                return FALSE;

            $query = $this->ejecutarQuery($sql);
            return $query->fetchAll();
        }

        /**
         * Prepara consulta y devuelve ejecución de la query
         * @return datos
         */
        private function ejecutarQuery($sql=NULL) {
            //prob("{$this->clase} / ejecutarQuery()");
            //prob($sql);
            $query = $this->db->prepare($sql);
            $query->execute();
            return $query;
        }


} //class