-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2018 a las 13:02:49
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `febrero`
--
CREATE DATABASE IF NOT EXISTS `febrero` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `febrero`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `cod_aud` int(11) NOT NULL AUTO_INCREMENT,
  `fec_aud` datetime NOT NULL,
  `ip_aud` varchar(15) NOT NULL,
  `fky_usuario` int(11) NOT NULL,
  `fky_opcion` int(11) NOT NULL,
  `sql_aud` text NOT NULL,
  `id_aud` int(11) NOT NULL,
  PRIMARY KEY (`cod_aud`),
  KEY `fky_usuario` (`fky_usuario`),
  KEY `fky_opcion` (`fky_opcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`cod_aud`, `fec_aud`, `ip_aud`, `fky_usuario`, `fky_opcion`, `sql_aud`, `id_aud`) VALUES
(1, '2018-04-06 14:47:16', '127.0.0.1', 1, 1, 'insert', 2),
(2, '2018-04-09 12:56:57', '127.0.0.1', 1, 1, 'insert', 2),
(3, '2018-04-09 14:51:58', '127.0.0.1', 1, 1, 'insert', 2),
(4, '2018-04-09 14:58:46', '127.0.0.1', 1, 1, 'insert', 3),
(5, '2018-04-11 14:36:03', '127.0.0.1', 1, 1, 'insert', 3),
(6, '2018-04-11 14:37:55', '127.0.0.1', 1, 1, 'insert', 4),
(7, '2018-04-11 14:38:42', '127.0.0.1', 1, 1, 'insert', 5),
(8, '2018-04-11 14:39:23', '127.0.0.1', 1, 1, 'insert', 6),
(9, '2018-04-11 02:41:38', '127.0.0.1', 1, 1, 'insert', 3),
(10, '2018-04-11 14:42:24', '127.0.0.1', 1, 1, 'insert', 7),
(11, '2018-04-11 14:43:03', '127.0.0.1', 1, 1, 'insert', 8),
(12, '2018-04-11 14:43:26', '127.0.0.1', 1, 1, 'insert', 9),
(13, '2018-04-11 14:45:18', '127.0.0.1', 1, 1, 'insert', 10),
(14, '2018-04-11 02:45:37', '127.0.0.1', 1, 1, 'insert', 4),
(15, '2018-04-11 14:46:06', '127.0.0.1', 1, 1, 'insert', 11),
(16, '2018-04-11 14:46:25', '127.0.0.1', 1, 1, 'insert', 12),
(17, '2018-04-11 14:46:50', '127.0.0.1', 1, 1, 'insert', 13),
(18, '2018-04-11 14:47:14', '127.0.0.1', 1, 1, 'insert', 14),
(19, '2018-04-11 02:47:42', '127.0.0.1', 1, 1, 'insert', 5),
(20, '2018-04-11 14:48:04', '127.0.0.1', 1, 1, 'insert', 15),
(21, '2018-04-11 14:48:30', '127.0.0.1', 1, 1, 'insert', 16),
(22, '2018-04-11 14:48:56', '127.0.0.1', 1, 1, 'insert', 17),
(23, '2018-04-11 02:50:15', '127.0.0.1', 1, 1, 'insert', 6),
(24, '2018-04-11 14:50:43', '127.0.0.1', 1, 1, 'insert', 18),
(25, '2018-04-11 14:51:23', '127.0.0.1', 1, 1, 'insert', 19),
(26, '2018-04-11 14:52:50', '127.0.0.1', 1, 1, 'insert', 20),
(27, '2018-04-11 14:53:09', '127.0.0.1', 1, 1, 'insert', 21),
(28, '2018-04-11 02:54:32', '127.0.0.1', 1, 1, 'insert', 7),
(29, '2018-04-11 14:54:54', '127.0.0.1', 1, 1, 'insert', 22),
(30, '2018-04-11 14:55:16', '127.0.0.1', 1, 1, 'insert', 23),
(31, '2018-04-11 14:56:01', '127.0.0.1', 1, 1, 'insert', 24),
(32, '2018-04-11 14:57:21', '127.0.0.1', 1, 1, 'insert', 25),
(33, '2018-04-11 14:57:45', '127.0.0.1', 1, 1, 'insert', 26),
(34, '2018-04-11 02:58:19', '127.0.0.1', 1, 1, 'insert', 8),
(35, '2018-04-11 14:58:42', '127.0.0.1', 1, 1, 'insert', 27),
(36, '2018-04-11 14:59:05', '127.0.0.1', 1, 1, 'insert', 28),
(37, '2018-04-11 14:59:22', '127.0.0.1', 1, 1, 'insert', 29),
(38, '2018-04-11 15:00:04', '127.0.0.1', 1, 1, 'insert', 30),
(39, '2018-04-11 03:01:15', '127.0.0.1', 1, 1, 'insert', 9),
(40, '2018-04-11 15:02:03', '127.0.0.1', 1, 1, 'insert', 31),
(41, '2018-04-11 15:02:52', '127.0.0.1', 1, 1, 'insert', 32),
(42, '2018-04-11 03:05:08', '127.0.0.1', 1, 1, 'insert', 10),
(43, '2018-04-11 15:06:37', '127.0.0.1', 1, 1, 'insert', 33),
(44, '2018-04-11 15:07:19', '127.0.0.1', 1, 1, 'insert', 34),
(45, '2018-04-11 15:08:35', '127.0.0.1', 1, 1, 'insert', 35),
(46, '2018-04-20 12:36:43', '127.0.0.1', 1, 1, 'insert', 11),
(47, '2018-04-20 12:39:08', '127.0.0.1', 1, 1, 'insert', 36),
(48, '2018-05-28 15:29:49', '127.0.0.1', 1, 1, 'insert', 37),
(49, '2018-05-28 03:31:48', '127.0.0.1', 1, 1, 'insert', 12),
(50, '2018-05-28 15:33:06', '127.0.0.1', 1, 1, 'insert', 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `cod_ban` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ban` varchar(35) NOT NULL,
  `est_ban` char(1) NOT NULL,
  PRIMARY KEY (`cod_ban`),
  UNIQUE KEY `nom_ban` (`nom_ban`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`cod_ban`, `nom_ban`, `est_ban`) VALUES
(1, 'BBVA BANCOMER.', 'A'),
(2, 'BANORTE', 'A'),
(3, 'BANAMEX', 'A'),
(4, 'SANTANDER', 'A'),
(5, 'SCOTIABANK', 'A'),
(6, 'BANCO DEL BAJIO', 'A'),
(7, 'BANCO HSBC', 'A'),
(8, 'BANCO INBURSA', 'A'),
(9, 'BANCO AZTECA', 'A'),
(10, 'BANCA MIFEL', 'A'),
(11, 'BANCA AFIRME', 'A'),
(12, 'BANSI', 'A'),
(13, 'BANK OF AMERICA', 'A'),
(14, 'BANREGIO', 'A'),
(15, 'BANJERCITO', 'A'),
(16, 'BANCO INTERACCIONES', 'A'),
(17, 'AMERICAN EXPRESS', 'A'),
(18, 'BANCO INVEX', 'A'),
(19, 'BANCO VE POR MAS', 'A'),
(20, 'ING BANCO', 'A'),
(21, 'COMPARTAMOS', 'A'),
(22, 'BANCO MULTIVA', 'A'),
(23, 'BANCOPPEL', 'A'),
(24, 'AHORRO FAMSA', 'A'),
(25, 'AUTOFIN', 'A'),
(26, 'MONEX', 'A'),
(27, 'JP MORGAN', 'A'),
(28, 'PRUDENTIAL BANK', 'A'),
(29, 'BANCO VOLKSWAGEN', 'A'),
(30, 'BANCO DE MEXICO', 'A'),
(31, 'ABC CAPITAL', 'A'),
(32, 'ACTINVER', 'A'),
(33, 'BANCO BASE', 'A'),
(34, 'BANCO CREDIT SUISSE', 'A'),
(35, 'BANCO FINTERRA', 'A'),
(36, 'BANCO FORJADORES', 'A'),
(37, 'BANCO INMOBILIARIO MEXICANO', 'A'),
(38, 'BANCO PAGATODO', 'A'),
(39, 'BANCO PROGRESO CHIHUAHUA', 'A'),
(40, 'BANCO SABADELL', 'A'),
(41, 'BANCREA', 'A'),
(42, 'BANK OF CHINA MEXICO', 'A'),
(43, 'BANK OF TOKYO MITSUBISHI UFJ (MEXIC', 'A'),
(44, 'BANKAOOL', 'A'),
(45, 'BARCLAYS BANK MEXICO', 'A'),
(46, 'CIBANCO', 'A'),
(47, 'CONSUBANCO', 'A'),
(48, 'DEUTSCHE BANK MEXICO', 'A'),
(49, 'FUNDACION DONDE BANCO', 'A'),
(50, 'ICBC MEXICO', 'A'),
(51, 'INTERCAM BANCO', 'A'),
(52, 'INVESTA BANCO', 'A'),
(53, 'MIZUHO BANCO', 'A'),
(54, 'SHINHAN BANCO', 'A'),
(55, 'UBS BANCO MEXICO', 'A'),
(56, 'IXE BANCO', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `cod_ciu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ciu` varchar(35) NOT NULL,
  `fky_estado` int(11) NOT NULL,
  `est_ciu` char(1) NOT NULL,
  PRIMARY KEY (`cod_ciu`),
  KEY `fky_estado` (`fky_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`cod_ciu`, `nom_ciu`, `fky_estado`, `est_ciu`) VALUES
(1, 'Aguascalientes', 1, 'A'),
(2, 'Ensenada', 2, 'A'),
(3, 'La Paz', 3, 'A'),
(4, 'Campeche', 4, 'A'),
(5, 'Tapachula', 5, 'A'),
(6, 'Juarez', 6, 'A'),
(7, 'Acapulco', 1, 'A'),
(8, 'Cancun', 2, 'A'),
(9, 'Celaya', 3, 'A'),
(10, 'Chetumal', 3, 'A'),
(11, 'Chihuahua', 4, 'A'),
(12, 'Chilpancingo', 4, 'A'),
(13, 'Ciudad del Carmen', 5, 'A'),
(14, 'Ciudad Obregon', 5, 'A'),
(15, 'Ciudad Victoria', 6, 'A'),
(16, 'Coatzacoalcos', 6, 'A'),
(17, 'Colima-Villa de Alvarez ', 7, 'A'),
(18, 'Cuautla', 7, 'A'),
(19, 'Cuernavaca', 7, 'A'),
(20, 'Culiacan', 7, 'A'),
(21, 'Cardenas', 8, 'A'),
(22, 'Cordoba', 8, 'A'),
(23, 'Durango', 8, 'A'),
(24, 'Guadalajara', 10, 'A'),
(25, 'Guanajuato', 11, 'A'),
(26, 'Guaymas', 11, 'A'),
(27, 'Hermosillo', 11, 'A'),
(28, 'Irapuato', 11, 'A'),
(29, 'La Laguna', 11, 'A'),
(30, 'La Piedad-Penjamo', 12, 'A'),
(31, 'Leon', 12, 'A'),
(32, 'Los Cabos', 13, 'A'),
(33, 'Los Mochis', 13, 'A'),
(34, 'Manzanillo', 13, 'A'),
(35, 'Matamoros', 14, 'A'),
(36, 'Mazatlan', 14, 'A'),
(37, 'Mexicali', 14, 'A'),
(38, 'Minatitlan', 17, 'A'),
(39, 'Monclova-Frontera', 15, 'A'),
(40, 'Monterrey', 15, 'A'),
(41, 'Morelia', 15, 'A'),
(42, 'Merida', 16, 'A'),
(43, 'Nuevo Laredo', 16, 'A'),
(44, 'Oaxaca', 18, 'A'),
(45, 'Ocotlan', 19, 'A'),
(46, 'Orizaba', 20, 'A'),
(47, 'Pachuca', 20, 'A'),
(48, 'Piedras Negras', 21, 'A'),
(49, 'Poza Rica', 21, 'A'),
(50, 'Puebla-Tlaxcala', 22, 'A'),
(51, 'Puerto Vallarta', 22, 'A'),
(52, 'Queretaro', 23, 'A'),
(53, 'Reynosa-Rio Bravo', 23, 'A'),
(54, 'Rioverde-Ciudad Fern', 24, 'A'),
(55, 'Salamanca', 24, 'A'),
(56, 'Saltillo', 25, 'A'),
(57, 'San Francisco del Rincon', 25, 'A'),
(58, 'San Juan del Rio', 25, 'A'),
(59, 'San Luis Potosi-Soledad', 26, 'A'),
(60, 'Tampico-Panuco', 26, 'A'),
(61, 'Tecoman', 27, 'A'),
(62, 'Tehuacan', 27, 'A'),
(63, 'Tehuantepec-Salina Cruz', 28, 'A'),
(64, 'Tepic', 28, 'A'),
(65, 'Tijuana', 28, 'A'),
(66, 'Tlaxcala-Apizaco', 28, 'A'),
(67, 'Toluca', 28, 'A'),
(68, 'Tula', 29, 'A'),
(69, 'Tulancingo', 30, 'A'),
(70, 'Tuxtla Guti', 30, 'A'),
(71, 'Uruapan', 30, 'A'),
(72, 'Valle de Mexico', 30, 'A'),
(73, 'Veracruz', 30, 'A'),
(74, 'Villahermosa', 30, 'A'),
(75, 'Xalapa', 30, 'A'),
(76, 'Zacatecas-Guadalupe', 31, 'A'),
(77, 'Zamora-Jacona', 32, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `cod_cli` int(11) NOT NULL AUTO_INCREMENT,
  `rfc_cli` varchar(15) NOT NULL,
  `com_cli` varchar(80) NOT NULL,
  `cue_cli` varchar(20) NOT NULL,
  `fil_cli` varchar(35) NOT NULL,
  `cre_cli` float NOT NULL,
  `dia_cli` int(11) NOT NULL,
  `pag_cli` int(11) NOT NULL,
  `ven_cli` int(11) NOT NULL,
  `pdf_cli` text NOT NULL,
  `fac_cli` int(11) NOT NULL,
  `fky_empleado` int(11) NOT NULL,
  `fky_banco` int(11) NOT NULL,
  `est_cli` char(1) NOT NULL,
  PRIMARY KEY (`cod_cli`),
  KEY `fki_empleado` (`fky_empleado`),
  KEY `fky_banco` (`fky_banco`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cli`, `rfc_cli`, `com_cli`, `cue_cli`, `fil_cli`, `cre_cli`, `dia_cli`, `pag_cli`, `ven_cli`, `pdf_cli`, `fac_cli`, `fky_empleado`, `fky_banco`, `est_cli`) VALUES
(19, '999066666', 'Mantenimiento Automotriz de Aguascalientes, S.A. de C.V.', '67788990000', '.', 50000, 15, 1, 0, '', 0, 1, 1, 'A'),
(20, '888888888', 'Grease Monkey Norte', '2323232323', '.', 50000, 10, 12, 0, '', 0, 1, 5, 'A'),
(21, 'A11111111', 'LLYASA  CARDENAS MEXICALLI', '44444', '.', 50000, 15, 10, 0, '', 30, 1, 5, 'A'),
(22, 'J299129470', 'Mantenimiento Automotriz de Aguascalientes, S.A. de C.V..', '2343253243223142', 'DF', 50000, 0, 1, 0, '', 30, 1, 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `cod_emp` int(11) NOT NULL AUTO_INCREMENT,
  `dni_emp` varchar(10) NOT NULL,
  `nom_emp` varchar(25) NOT NULL,
  `ape_emp` varchar(25) NOT NULL,
  `sex_emp` char(1) NOT NULL,
  `te1_emp` varchar(15) NOT NULL,
  `te2_emp` varchar(15) DEFAULT NULL,
  `ema_emp` varchar(80) NOT NULL,
  `est_emp` char(1) NOT NULL,
  PRIMARY KEY (`cod_emp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`cod_emp`, `dni_emp`, `nom_emp`, `ape_emp`, `sex_emp`, `te1_emp`, `te2_emp`, `ema_emp`, `est_emp`) VALUES
(1, 'V-24743077', 'Gabriel Alejandro.', 'Paredes Rojas', 'M', '04247711289', '02763913305', 'gabalej091194@gmail.com', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `cod_est` int(11) NOT NULL AUTO_INCREMENT,
  `nom_est` varchar(35) NOT NULL,
  `est_est` char(1) NOT NULL,
  PRIMARY KEY (`cod_est`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`cod_est`, `nom_est`, `est_est`) VALUES
(1, 'Aguascalientes', 'A'),
(2, 'Baja California', 'A'),
(3, 'Baja California Sur', 'A'),
(4, 'Campeche', 'A'),
(5, 'Chiapas', 'A'),
(6, 'Chihuahua', 'A'),
(7, 'Coahuila de Zaragoza', 'A'),
(8, 'Colima', 'A'),
(9, 'Distrito Federal', 'A'),
(10, 'Durango', 'A'),
(11, 'Guanajuato', 'A'),
(12, 'Guerrero', 'A'),
(13, 'Hidalgo', 'A'),
(14, 'Jalisco', 'A'),
(15, 'Michoacan de Ocampo', 'A'),
(16, 'Morelos', 'A'),
(17, 'Mexico', 'A'),
(18, 'Nayarit', 'A'),
(19, 'Nuevo Leon', 'A'),
(20, 'Oaxaca', 'A'),
(21, 'Puebla', 'A'),
(22, 'Queretaro', 'A'),
(23, 'Quintana Roo', 'A'),
(24, 'San Luis Potosi', 'A'),
(25, 'Sinaloa', 'A'),
(26, 'Sonora', 'A'),
(27, 'Tabasco', 'A'),
(28, 'Tamaulipas', 'A'),
(29, 'Tlaxcala', 'A'),
(30, 'Veracruz de Ignacio de la Llave', 'A'),
(31, 'Yucatan', 'A'),
(32, 'Zacatecas', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `franquicia`
--

CREATE TABLE IF NOT EXISTS `franquicia` (
  `cod_fra` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fra` varchar(50) NOT NULL,
  `est_fra` char(1) NOT NULL,
  PRIMARY KEY (`cod_fra`),
  UNIQUE KEY `nom_fra` (`nom_fra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `franquicia`
--

INSERT INTO `franquicia` (`cod_fra`, `nom_fra`, `est_fra`) VALUES
(1, 'Ãguila Azteca.', 'A'),
(2, 'Airbag MÃ©xico', 'A'),
(3, 'Auto Market', 'A'),
(4, 'Badilub Automotive Center', 'A'),
(5, 'Car Wash Domicilios', 'A'),
(6, 'Dr. Auto & Casa', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `cod_mar` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mar` varchar(25) NOT NULL,
  `est_mar` char(1) NOT NULL,
  PRIMARY KEY (`cod_mar`),
  UNIQUE KEY `nom_mar` (`nom_mar`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`cod_mar`, `nom_mar`, `est_mar`) VALUES
(1, 'Chevrolet.', 'A'),
(2, 'Toyota', 'A'),
(3, 'Ford', 'A'),
(4, 'Kia', 'A'),
(5, 'Volvo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `cod_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(35) NOT NULL,
  `fky_marca` int(11) NOT NULL,
  `est_mod` char(1) NOT NULL,
  PRIMARY KEY (`cod_mod`),
  KEY `fky_marca` (`fky_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`cod_mod`, `nom_mod`, `fky_marca`, `est_mod`) VALUES
(1, 'Aveo LT', 1, 'A'),
(2, 'Ka', 3, 'A'),
(3, 'Corolla', 2, 'A'),
(4, 'Corsa', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `cod_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(25) NOT NULL,
  `url_mod` varchar(50) NOT NULL,
  `est_mod` char(1) NOT NULL,
  PRIMARY KEY (`cod_mod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`cod_mod`, `nom_mod`, `url_mod`, `est_mod`) VALUES
(1, 'Rol', 'frontend/pantalla/rol', 'A'),
(6, 'Rol', 'frontend/pantalla/rol', 'A'),
(7, 'MÃ³dulo', 'frontend/pantalla/modulo', 'A'),
(8, 'OpciÃ³n', 'frontend/pantalla/opcion', 'A'),
(9, 'Usuario', 'frontend/pantalla/usuario', 'A'),
(10, 'Permiso', 'frontend/pantalla/permiso', 'A'),
(12, 'Banco', 'frontend/pantalla/banco', 'A'),
(13, 'Estado', 'frontend/pantalla/estado', 'A'),
(15, 'Ciudad', 'frontend/pantalla/ciudad', 'A'),
(16, 'Empleado', 'frontend/pantalla/empleado', 'A'),
(17, 'Marca', 'frontend/pantalla/marca', 'A'),
(18, 'Taller', 'frontend/pantalla/taller', 'A'),
(19, 'Cliente', 'frontend/pantalla/cliente', 'A'),
(20, 'Modelo', 'frontend/pantalla/modelo', 'A'),
(21, 'Tipo de Taller', 'frontend/pantalla/tipo_taller', 'A'),
(22, 'Franquicia', 'frontend/pantalla/franquicia', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE IF NOT EXISTS `opcion` (
  `cod_opc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_opc` varchar(25) NOT NULL,
  `fky_modulo` int(11) NOT NULL,
  `url_opc` varchar(50) NOT NULL,
  `est_opc` char(1) NOT NULL,
  PRIMARY KEY (`cod_opc`),
  KEY `fky_modulo` (`fky_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`cod_opc`, `nom_opc`, `fky_modulo`, `url_opc`, `est_opc`) VALUES
(1, 'Agregar Rol', 1, 'agregar_rol.php', 'A'),
(20, 'Listar Rol', 1, 'listar_rol.php', 'A'),
(22, 'Agregar MÃ³dulo', 7, 'agregar_modulo.php', 'A'),
(27, 'Agregar OpciÃ³n', 8, 'agregar_opcion.php', 'A'),
(31, 'Agregar Usuario', 9, 'agregar_usuario.php', 'A'),
(32, 'Modificar Usuario', 9, 'listar_usuario.php', 'A'),
(35, 'Asignar Permisos', 10, 'filtrar_usuario.php', 'A'),
(37, 'Listar MÃ³dulos', 7, 'listar_modulo.php', 'A'),
(38, 'Agregar Banco', 12, 'agregar_banco.php', 'A'),
(39, 'Listar Banco', 12, 'filtrar_banco.php', 'A'),
(41, 'Listar Estado', 13, 'filtrar_estado.php', 'A'),
(42, 'Agregar Estado', 13, 'agregar_estado.php', 'A'),
(43, 'Agregar Ciudad', 15, 'agregar_ciudad.php', 'A'),
(44, 'Listar Ciudad', 15, 'filtrar_ciudad.php', 'A'),
(45, 'Agregar Empleado', 16, 'agregar_empleado.php', 'A'),
(46, 'Listar Empleado', 16, 'filtrar_empleado.php', 'A'),
(47, 'Agregar Marca', 17, 'agregar_marca.php', 'A'),
(48, 'Listar Marca', 17, 'filtrar_marca.php', 'A'),
(49, 'Agregar Taller', 18, 'agregar_taller.php', 'A'),
(50, 'Listar Taller', 18, 'filtrar_taller.php', 'A'),
(51, 'Agregar Cliente', 19, 'agregar_cliente.php', 'A'),
(52, 'Listar Cliente', 19, 'filtrar_cliente.php', 'A'),
(53, 'Listar Modelo', 20, 'filtrar_modelo.php', 'A'),
(54, 'Agregar Modelo', 20, 'agregar_modelo.php', 'A'),
(55, 'Agregar Tipo de Taller', 21, 'agregar_tipo_taller.php', 'A'),
(56, 'Filtrar Tipo de Taller', 1, 'filtrar_tipo_taller.php', 'A'),
(57, 'Filtrar Tipo de Taller', 21, 'filtrar_tipo_taller.php', 'A'),
(58, 'Listar Tipo de Taller', 21, 'listar_tipo_taller.php', 'A'),
(59, 'Ver Tipo de Taller', 21, 'ver_tipo_taller.php', 'A'),
(60, 'Agregar Franquicia', 22, 'agregar_franquicia.php', 'A'),
(61, 'Modificar Franquicia', 22, 'modificar_franquicia.php', 'A'),
(62, 'Filtrar Franquicia', 22, 'filtrar_franquicia.php', 'A'),
(63, 'Listar Franquicia', 22, 'listar_franquicia.php', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `cod_per` int(11) NOT NULL AUTO_INCREMENT,
  `fky_usuario` int(11) NOT NULL,
  `fky_opcion` int(11) NOT NULL,
  `est_per` char(1) NOT NULL,
  PRIMARY KEY (`cod_per`),
  UNIQUE KEY `fky_usuario` (`fky_usuario`,`fky_opcion`),
  KEY `fky_opcion` (`fky_opcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`cod_per`, `fky_usuario`, `fky_opcion`, `est_per`) VALUES
(10, 1, 22, 'A'),
(14, 1, 20, 'A'),
(16, 1, 32, 'A'),
(17, 1, 31, 'A'),
(22, 1, 27, 'A'),
(23, 1, 35, 'A'),
(32, 1, 1, 'A'),
(33, 1, 37, 'A'),
(34, 1, 38, 'A'),
(35, 1, 39, 'A'),
(36, 1, 41, 'A'),
(37, 1, 42, 'A'),
(38, 1, 43, 'A'),
(39, 1, 44, 'A'),
(40, 1, 45, 'A'),
(41, 1, 46, 'A'),
(42, 1, 47, 'A'),
(43, 1, 48, 'A'),
(44, 1, 49, 'A'),
(45, 1, 50, 'A'),
(46, 1, 51, 'A'),
(47, 1, 52, 'A'),
(48, 1, 53, 'A'),
(49, 1, 54, 'A'),
(50, 1, 55, 'A'),
(51, 1, 56, 'A'),
(52, 1, 57, 'A'),
(53, 1, 58, 'A'),
(54, 1, 59, 'A'),
(57, 1, 62, 'A'),
(58, 1, 60, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `cod_res` int(11) NOT NULL AUTO_INCREMENT,
  `nom_res` varchar(50) NOT NULL,
  `tel_res` varchar(15) NOT NULL,
  `ema_res` varchar(80) DEFAULT NULL,
  `are_res` varchar(25) NOT NULL,
  PRIMARY KEY (`cod_res`),
  UNIQUE KEY `nom_res` (`nom_res`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `responsable`
--

INSERT INTO `responsable` (`cod_res`, `nom_res`, `tel_res`, `ema_res`, `are_res`) VALUES
(57, 'Gerson Omar AvendaÃ±o', '04145556767', 'omar@gmail.com', 'Contabilidad'),
(58, 'Manuel Rodriguez', '344556666', 'manuel@gmail.com', 'Contabilidad'),
(59, 'Indira Maldonado', '34455668', 'indira@gmail.com', 'Contabilidad'),
(63, 'Gabriel Paredes', '453334444', 'gabriel@gmail.com', 'Informatica'),
(67, 'Gabriel Paredes.', '453334444', 'gabriel@gmail.com', 'Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable_cliente`
--

CREATE TABLE IF NOT EXISTS `responsable_cliente` (
  `fky_cliente` int(11) NOT NULL,
  `fky_responsable` int(11) NOT NULL,
  PRIMARY KEY (`fky_cliente`,`fky_responsable`),
  KEY `fky_resposable` (`fky_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsable_cliente`
--

INSERT INTO `responsable_cliente` (`fky_cliente`, `fky_responsable`) VALUES
(22, 57),
(22, 58),
(22, 59);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `cod_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rol` varchar(25) NOT NULL,
  `est_rol` char(1) NOT NULL,
  PRIMARY KEY (`cod_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `nom_rol`, `est_rol`) VALUES
(1, 'Administrador', 'A'),
(2, 'Operador', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE IF NOT EXISTS `taller` (
  `cod_tal` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tal` varchar(50) NOT NULL,
  `ubi_tal` varchar(50) NOT NULL,
  `te1_tal` varchar(15) NOT NULL,
  `te2_tal` varchar(15) DEFAULT NULL,
  `res_tal` varchar(50) NOT NULL,
  `ema_tal` varchar(80) NOT NULL,
  `fky_banco` int(11) NOT NULL,
  `fky_franquicia` int(11) DEFAULT NULL,
  `fky_tipo_taller` int(11) NOT NULL,
  `cue_tal` varchar(20) NOT NULL,
  `fky_ciudad` int(11) NOT NULL,
  `est_tal` char(1) NOT NULL,
  PRIMARY KEY (`cod_tal`),
  KEY `fky_banco` (`fky_banco`),
  KEY `fky_ciudad` (`fky_ciudad`),
  KEY `fky_franquicia` (`fky_franquicia`),
  KEY `fky_tipo_taller` (`fky_tipo_taller`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`cod_tal`, `nom_tal`, `ubi_tal`, `te1_tal`, `te2_tal`, `res_tal`, `ema_tal`, `fky_banco`, `fky_franquicia`, `fky_tipo_taller`, `cue_tal`, `fky_ciudad`, `est_tal`) VALUES
(4, 'AUTO SERVICIO PREMIER S.A.', 'Campeche 123', '3445566', '3434455', 'Gabriela Urdaneta Gomez', 'premier@gmail.com', 3, 6, 2, '123456789', 3, 'A'),
(5, 'POWER SERVICE TUXTLA GUTIERREZ ', 'Tuxtla GutiÃ©rrez  56.', '98877655', '98877677', 'JosÃ© Alberto Perez', 'jose@gmail.com', 35, 2, 3, '4545455', 2, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_taller`
--

CREATE TABLE IF NOT EXISTS `tipo_taller` (
  `cod_tip_tal` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tip_tal` varchar(50) NOT NULL,
  `est_tip_tal` char(1) NOT NULL,
  PRIMARY KEY (`cod_tip_tal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_taller`
--

INSERT INTO `tipo_taller` (`cod_tip_tal`, `nom_tip_tal`, `est_tip_tal`) VALUES
(1, 'MecÃ¡nica en general.', 'A'),
(2, 'Talleres elÃ©ctricos.', 'A'),
(3, 'servicio y lubricaciÃ³n.', 'A'),
(4, 'hojalaterÃ­a y pintura', 'A'),
(5, 'reparaciÃ³n de llantas', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `ema_usu` varchar(60) NOT NULL,
  `cla_usu` varchar(32) NOT NULL,
  `reg_usu` datetime NOT NULL,
  `nom_usu` varchar(25) NOT NULL,
  `ape_usu` varchar(25) NOT NULL,
  `fky_rol` int(11) NOT NULL,
  `est_usu` char(1) NOT NULL,
  PRIMARY KEY (`cod_usu`),
  KEY `fky_rol` (`fky_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `ema_usu`, `cla_usu`, `reg_usu`, `nom_usu`, `ape_usu`, `fky_rol`, `est_usu`) VALUES
(1, 'bennysrugo@platinumfleet.com.mx', '827ccb0eea8a706c4c34a16891f84e7b', '2018-04-04 11:31:00', 'Platinium', 'Fleet', 1, 'A'),
(2, 'jose.varela@hotmail.com', '12345', '2018-04-09 14:51:58', 'Jose', 'Varela', 2, 'A'),
(3, 'gabalej091194@gmail.com', 'b89d2b4ccd998271d270f33a17db25c6', '2018-04-09 14:58:46', 'Gabriel', 'Paredes', 2, 'A');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`fky_usuario`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `auditoria_ibfk_2` FOREIGN KEY (`fky_opcion`) REFERENCES `opcion` (`cod_opc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`fky_estado`) REFERENCES `estado` (`cod_est`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fki_banco_cli` FOREIGN KEY (`fky_banco`) REFERENCES `banco` (`cod_ban`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fki_empleado_cli` FOREIGN KEY (`fky_empleado`) REFERENCES `empleado` (`cod_emp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`fky_marca`) REFERENCES `marca` (`cod_mar`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD CONSTRAINT `opcion_ibfk_1` FOREIGN KEY (`fky_modulo`) REFERENCES `modulo` (`cod_mod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`fky_usuario`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`fky_opcion`) REFERENCES `opcion` (`cod_opc`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsable_cliente`
--
ALTER TABLE `responsable_cliente`
  ADD CONSTRAINT `responsable_cliente_ibfk_1` FOREIGN KEY (`fky_cliente`) REFERENCES `cliente` (`cod_cli`) ON UPDATE CASCADE,
  ADD CONSTRAINT `responsable_cliente_ibfk_2` FOREIGN KEY (`fky_responsable`) REFERENCES `responsable` (`cod_res`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `taller`
--
ALTER TABLE `taller`
  ADD CONSTRAINT `franquicia_ibfk` FOREIGN KEY (`fky_franquicia`) REFERENCES `franquicia` (`cod_fra`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taller_ibfk_1` FOREIGN KEY (`fky_banco`) REFERENCES `banco` (`cod_ban`) ON UPDATE CASCADE,
  ADD CONSTRAINT `taller_ibfk_2` FOREIGN KEY (`fky_ciudad`) REFERENCES `ciudad` (`cod_ciu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_taller_ibfk` FOREIGN KEY (`fky_tipo_taller`) REFERENCES `tipo_taller` (`cod_tip_tal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fky_rol`) REFERENCES `rol` (`cod_rol`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
