<?php namespace ironwoods\app\core;

/**
 * @file: Crea la conexion PDO - Aplicación MVC
 * @info: Model debe extender esta clase para disponer de conexión a la BD
 *
 * @utor: Moisés Alcocer
 * 2014, <m_alc1@hotmail.com>
 */
use \PDO as PDO;    //referencia al namespace global

class DbCon {

	/**********************************/
    /*** Declaración de propiedades ***/
        private $clase = '@DbCon';
    	protected $db = NULL;


	/**********************************/
    /*** Declaración de Métodos *******/

    	/**
    	 * Constructor
         * Al crear el controlador, se abre una conex. con la BD. La conexión será usada por multiples modelos (hay frameworks que abren una conex. por modelo).
         */
        public function __construct() {
            $this->openDBConnection();
            //mysql_query("SET NAMES 'utf8'");

            //Muestra mensaje
            if (MODO === "desarrollo") {
                if (! is_object($this->db)) 
                    prob("PDO conection is null");
                //else  
                    //prob("PDO connection is true");
            } 
        }

        /**
         * Abre la conex. con la BD con las credenciales de application/config/config.php
         */
        private function openDBConnection() {
            // Genera una conexión PDO a la BD
            // Las consultas devuelven un array de resultados
            // 
            // set the (optional) options of the PDO connection. 
            // For example, fetch mode FETCH_ASSOC would return results like this:  $result["user_name]
            // For example, fetch mode FETCH_OBJ would return results like this:    $result->user_name
            // @see http://www.php.net/manual/en/pdostatement.fetch.php
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
            $options[] = (MODO === "desarrollo" || MODO === "test")
                ? array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
                : array(PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT);
            $options[] = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

            try {
                $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                //Guarda error en fichero:
                $err = '<pre>'. $e . '<br><br>';
                //file_put_contents(ERR_DBCON, $err, FILE_APPEND | LOCK_EX);
                //ErrorHandler::log($err, 1, TRUE);

                //Muestra mensaje y finaliza el script:
                die("Error de conexión a la BD.");
            }
        }
        
} //class




