/**********************************************************************/
/*** CREAR TABLAS *****************************************************/

/***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***                                           
 ***                                               ***
 ***            Proyecto: Paginador                ***
 ***            Moisés Alcocer, 2015               ***
 ***                                               ***
 ***  *  *  *  *  *  *  *  *  *  *  *  *  *  *  *  ***/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------
-- --------------------------------------------------------
-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- Estructura de la tabla `provincias`
--
CREATE TABLE IF NOT EXISTS `provincias` (
    `id_provincia`  int(11)      NOT NULL AUTO_INCREMENT,
    `nombre`        varchar(255) NOT NULL,
        UNIQUE (nombre),
        PRIMARY KEY (id_provincia)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------
--
-- Estructura de la tabla `comarcas`
--
CREATE TABLE IF NOT EXISTS `regiones` (
    `id_region`    int(11)       NOT NULL AUTO_INCREMENT,
    `nombre`        varchar(255) NOT NULL,
    `descripcion`   text         NOT NULL,
    `provincia_id`  int(11)      NOT NULL,
        FOREIGN KEY (provincia_id) REFERENCES provincias(id_provincia)
        ON DELETE CASCADE ON UPDATE CASCADE,
        PRIMARY KEY (id_region)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci;

-- --------------------------------------------------------
-- --------------------------------------------------------
