-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.2.0.6576
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sistema_gestion_contable
CREATE DATABASE IF NOT EXISTS `sistema_gestion_contable` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sistema_gestion_contable`;

-- Volcando estructura para tabla sistema_gestion_contable.almacenes
CREATE TABLE IF NOT EXISTS `almacenes` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `localidade_id` int(11) DEFAULT '0',
  `plan_de_cuenta_id` int(11) DEFAULT '0',
  `predeterminado` tinyint(1) DEFAULT NULL,
  `observaciones` text,
  `geo_posicion` point DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sistema_gestion_contable.almacenes: ~1 rows (aproximadamente)
REPLACE INTO `almacenes` (`id`, `nombre`, `direccion`, `codigo_postal`, `localidade_id`, `plan_de_cuenta_id`, `predeterminado`, `observaciones`, `geo_posicion`, `created`, `modified`, `deleted`) VALUES
	(1, 'Almacen Principal', '-', '3470', 1, 114702, -1, NULL, NULL, NULL, NULL, NULL);

-- Volcando estructura para tabla sistema_gestion_contable.configurations
CREATE TABLE IF NOT EXISTS `configurations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_name` varchar(255) NOT NULL,
  `system_abbr` varchar(255) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `author` varchar(255) NOT NULL,
  `user_reg` tinyint(1) NOT NULL,
  `version` varchar(255) NOT NULL,
  `year` varchar(50) NOT NULL DEFAULT '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla sistema_gestion_contable.configurations: ~1 rows (aproximadamente)
REPLACE INTO `configurations` (`id`, `system_name`, `system_abbr`, `organization_name`, `email`, `meta_title`, `meta_keyword`, `meta_desc`, `timezone`, `author`, `user_reg`, `version`, `year`, `created`, `modified`) VALUES
	(1, 'Sistemas de Gestión Empresarial', 'SGE', 'JA Software', 'javalegre@gmail.com', 'Gestion', 'Contabilidad', 'd', 'Asia/Kuala_Lumpur', 'Javier Alegre', 1, '1.0.0', '2023', '2023-02-07 16:51:46', '2023-02-07 16:51:46');

-- Volcando estructura para tabla sistema_gestion_contable.localidades
CREATE TABLE IF NOT EXISTS `localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `CP` varchar(50) DEFAULT NULL,
  `provincia_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sistema_gestion_contable.localidades: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_gestion_contable.paises
CREATE TABLE IF NOT EXISTS `paises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sistema_gestion_contable.paises: ~1 rows (aproximadamente)
REPLACE INTO `paises` (`id`, `nombre`) VALUES
	(1, 'Argentina');

-- Volcando estructura para tabla sistema_gestion_contable.plan_de_cuentas
CREATE TABLE IF NOT EXISTS `plan_de_cuentas` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(255) DEFAULT NULL,
  `CuentaPadre` int(11) DEFAULT '0',
  `Nivel` int(11) DEFAULT '0',
  `SaldoAnterior` decimal(19,4) DEFAULT '0.0000',
  `Debe` decimal(19,4) DEFAULT '0.0000',
  `Haber` decimal(19,4) DEFAULT '0.0000',
  `Saldo` decimal(19,4) DEFAULT '0.0000',
  `TipoCuenta` int(11) DEFAULT '0',
  `Indent` int(11) DEFAULT '0',
  `Imprescindible` int(11) DEFAULT '0',
  `Presupuestado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando estructura para tabla sistema_gestion_contable.provincias
CREATE TABLE IF NOT EXISTS `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `paise_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sistema_gestion_contable.provincias: ~0 rows (aproximadamente)

-- Volcando estructura para tabla sistema_gestion_contable.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apodo` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ruta_imagen` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla sistema_gestion_contable.users: ~2 rows (aproximadamente)
REPLACE INTO `users` (`id`, `nombre`, `username`, `password`, `email`, `apodo`, `ruta_imagen`, `observaciones`, `created`, `modified`, `deleted`) VALUES
	(1, 'ALEGRE, Javier', 'root', '$2y$10$aPuVv16EW7HgdRCdfrMtFu9Q1cofpNiZp9yptC6eFL0IJfIMpOtcW', 'root@test.com', 'root', 'alegre_javier.jpg', '', '2022-11-07 13:25:24', '2023-02-07 14:43:38', NULL),
	(2, 'ALEGRE, Javier Feliciano', 'javalegre', '$2y$10$zSaRPwY93hszkaLtp7ZCl.ma1MHT4hbHf54Rwl3HsBSZbrSlbqrK6', 'jalegre@adecoagro.com', 'colo', 'avatar_javier_alegre.jpg', '', '2023-02-14 12:02:08', '2023-02-14 12:02:08', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
