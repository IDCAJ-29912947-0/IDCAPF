-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-02-2018 a las 11:45:49
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `cod_alu` int(11) NOT NULL AUTO_INCREMENT,
  `ide_alu` varchar(15) NOT NULL,
  `nom_alu` varchar(25) NOT NULL,
  `ape_alu` varchar(25) NOT NULL,
  `sex_alu` char(1) NOT NULL,
  `ema_alu` varchar(80) NOT NULL,
  `te1_alu` varchar(15) NOT NULL,
  `te2_alu` varchar(15) DEFAULT NULL,
  `ins_alu` varchar(20) DEFAULT NULL,
  `fky_pais` int(11) NOT NULL,
  `fky_universidad` int(11) DEFAULT NULL,
  `est_alu` char(1) NOT NULL,
  PRIMARY KEY (`cod_alu`),
  UNIQUE KEY `ide_alu` (`ide_alu`),
  KEY `fky_pais` (`fky_pais`),
  KEY `fky_universidad` (`fky_universidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`cod_alu`, `ide_alu`, `nom_alu`, `ape_alu`, `sex_alu`, `ema_alu`, `te1_alu`, `te2_alu`, `ins_alu`, `fky_pais`, `fky_universidad`, `est_alu`) VALUES
(7, '15565316', 'Jose', 'Perez', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763561643', 'ingenieriadigitalsc', 1, 0, 'A'),
(8, '15565317', 'Jose', 'Perez', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763561643', 'ingenieriadigitalsc', 1, 0, 'A'),
(9, '15565318', 'Jose', 'Perez', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763561643', 'ingenieriadigitalsc', 1, 0, 'A'),
(10, '15565319', 'Jose', 'Perez', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763561643', 'ingenieriadigitalsc', 1, 0, 'A'),
(11, '15565322', 'Jose', 'Perez', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763561643', 'ingenieriadigitalsc', 1, 0, 'A'),
(12, '15565323', 'Jose', 'Perez', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763561643', 'ingenieriadigitalsc', 1, 0, 'A'),
(13, '15565324', 'Maria', 'Perez', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763561643', 'ingenieriadigitalsc', 1, 0, 'A'),
(14, '20999679', 'Angel', 'OrduÃ±o', 'M', 'eduardo.angel42@gmail.com', '04127267658', '', '', 1, 0, ''),
(15, '20999677', 'Angel', 'OrduÃ±o', 'M', 'eduardo.angel42@gmail.com', '04127267658', '04147789966', '', 1, 0, ''),
(16, '24743080', 'Gabriel', 'Paredes', 'M', 'gabalej091194@gmail.com', '04247711289', '', '', 1, 0, ''),
(17, '15565329', 'Gabriel', 'Parra', 'M', 'pedro.parra83@gmail.com', '04147464801', '02763414261', 'ingenieriadigit', 2, 0, 'S'),
(18, '1556531', 'Pedro', 'Parra Avila', 'M', 'pedro.parra82@gmail.com', '04147464801', '02763414261', 'ingenieriadigit', 2, 0, 'S'),
(19, '15565999', 'JosÃ©', 'Perez', 'M', 'pedro.parra85@gmail.com', '04147464801', '02763567788', 'ingenieriadigitalsc', 2, 0, 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `cod_are` int(11) NOT NULL AUTO_INCREMENT,
  `nom_are` varchar(35) NOT NULL,
  `est_are` char(1) NOT NULL,
  PRIMARY KEY (`cod_are`),
  UNIQUE KEY `nom_are` (`nom_are`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`cod_are`, `nom_are`, `est_are`) VALUES
(1, 'Marketing Digital', 'I'),
(2, 'ComunicaciÃ³n Social', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `cod_asi` int(11) NOT NULL AUTO_INCREMENT,
  `fec_asi` date NOT NULL,
  `hor_asi` time NOT NULL,
  `fky_curso` int(11) NOT NULL,
  `fky_alumno` int(11) NOT NULL,
  `est_asi` char(1) NOT NULL,
  PRIMARY KEY (`cod_asi`),
  KEY `fky_curso` (`fky_curso`),
  KEY `fky_alumno` (`fky_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `cod_aud` int(11) NOT NULL AUTO_INCREMENT,
  `tab_aud` varchar(35) NOT NULL,
  `fec_aud` datetime NOT NULL,
  `acc_aud` varchar(20) NOT NULL,
  `prk_aud` int(11) NOT NULL,
  `fky_usuario` int(11) NOT NULL,
  `sql_aud` text NOT NULL,
  PRIMARY KEY (`cod_aud`),
  KEY `fky_usuario` (`fky_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=242 ;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`cod_aud`, `tab_aud`, `fec_aud`, `acc_aud`, `prk_aud`, `fky_usuario`, `sql_aud`) VALUES
(1, 'permiso', '2018-02-13 12:03:56', 'agregar', 24, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(2, 'permiso', '2018-02-13 12:03:56', 'agregar', 25, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(3, 'permiso', '2018-02-13 12:03:56', 'agregar', 26, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(4, 'permiso', '2018-02-13 12:03:56', 'agregar', 27, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(5, 'permiso', '2018-02-13 12:03:57', 'agregar', 28, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(6, 'permiso', '2018-02-13 12:03:57', 'agregar', 29, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(7, 'permiso', '2018-02-13 12:03:57', 'agregar', 30, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(8, 'permiso', '2018-02-13 12:03:57', 'agregar', 31, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(9, 'permiso', '2018-02-13 12:03:57', 'agregar', 32, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(10, 'permiso', '2018-02-13 12:03:57', 'agregar', 33, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(11, 'permiso', '2018-02-13 12:03:57', 'agregar', 34, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       11, \r\n       1, \r\n      A\r\n      );'),
(12, 'permiso', '2018-02-13 12:03:58', 'agregar', 35, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       12, \r\n       1, \r\n      A\r\n      );'),
(13, 'permiso', '2018-02-13 12:03:58', 'agregar', 36, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       13, \r\n       1, \r\n      A\r\n      );'),
(14, 'permiso', '2018-02-13 12:03:58', 'agregar', 37, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       14, \r\n       1, \r\n      A\r\n      );'),
(15, 'permiso', '2018-02-13 12:03:58', 'agregar', 38, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       15, \r\n       1, \r\n      A\r\n      );'),
(16, 'permiso', '2018-02-13 12:03:58', 'agregar', 39, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(17, 'permiso', '2018-02-13 12:03:58', 'agregar', 40, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(18, 'permiso', '2018-02-13 12:03:58', 'agregar', 41, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       18, \r\n       1, \r\n      A\r\n      );'),
(19, 'permiso', '2018-02-13 12:03:58', 'agregar', 42, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(20, 'permiso', '2018-02-13 12:03:59', 'agregar', 43, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       20, \r\n       1, \r\n      A\r\n      );'),
(21, 'permiso', '2018-02-13 12:03:59', 'agregar', 44, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(22, 'permiso', '2018-02-13 12:03:59', 'agregar', 45, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(23, 'permiso', '2018-02-13 12:03:59', 'agregar', 46, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(24, 'permiso', '2018-02-13 12:03:59', 'agregar', 47, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(25, 'permiso', '2018-02-13 12:03:59', 'agregar', 48, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(26, 'permiso', '2018-02-13 12:03:59', 'agregar', 49, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       28, \r\n       1, \r\n      A\r\n      );'),
(27, 'permiso', '2018-02-13 12:04:00', 'agregar', 50, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       29, \r\n       1, \r\n      A\r\n      );'),
(28, 'permiso', '2018-02-13 12:05:52', 'agregar', 51, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(29, 'permiso', '2018-02-13 12:05:52', 'agregar', 52, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(30, 'permiso', '2018-02-13 12:05:52', 'agregar', 53, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(31, 'permiso', '2018-02-13 12:05:52', 'agregar', 54, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(32, 'permiso', '2018-02-13 12:05:53', 'agregar', 55, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(33, 'permiso', '2018-02-13 12:05:53', 'agregar', 56, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(34, 'permiso', '2018-02-13 12:05:53', 'agregar', 57, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(35, 'permiso', '2018-02-13 12:05:53', 'agregar', 58, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(36, 'permiso', '2018-02-13 12:05:53', 'agregar', 59, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(37, 'permiso', '2018-02-13 12:05:53', 'agregar', 60, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(38, 'permiso', '2018-02-13 12:05:53', 'agregar', 61, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       11, \r\n       1, \r\n      A\r\n      );'),
(39, 'permiso', '2018-02-13 12:05:54', 'agregar', 62, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       12, \r\n       1, \r\n      A\r\n      );'),
(40, 'permiso', '2018-02-13 12:05:54', 'agregar', 63, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       13, \r\n       1, \r\n      A\r\n      );'),
(41, 'permiso', '2018-02-13 12:05:54', 'agregar', 64, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       14, \r\n       1, \r\n      A\r\n      );'),
(42, 'permiso', '2018-02-13 12:05:54', 'agregar', 65, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       15, \r\n       1, \r\n      A\r\n      );'),
(43, 'permiso', '2018-02-13 12:05:54', 'agregar', 66, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(44, 'permiso', '2018-02-13 12:05:54', 'agregar', 67, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(45, 'permiso', '2018-02-13 12:05:54', 'agregar', 68, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(46, 'permiso', '2018-02-13 12:05:54', 'agregar', 69, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(47, 'permiso', '2018-02-13 12:05:55', 'agregar', 70, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(48, 'permiso', '2018-02-13 12:05:55', 'agregar', 71, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(49, 'permiso', '2018-02-13 12:05:55', 'agregar', 72, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(50, 'permiso', '2018-02-13 12:05:55', 'agregar', 73, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(51, 'permiso', '2018-02-13 12:05:55', 'agregar', 74, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       28, \r\n       1, \r\n      A\r\n      );'),
(52, 'permiso', '2018-02-13 12:05:55', 'agregar', 75, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       29, \r\n       1, \r\n      A\r\n      );'),
(53, 'permiso', '2018-02-13 01:47:30', 'agregar', 76, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(54, 'permiso', '2018-02-13 01:47:30', 'agregar', 77, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(55, 'permiso', '2018-02-13 01:47:31', 'agregar', 78, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(56, 'permiso', '2018-02-13 01:47:31', 'agregar', 79, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(57, 'permiso', '2018-02-13 01:47:31', 'agregar', 80, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(58, 'permiso', '2018-02-13 01:47:31', 'agregar', 81, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(59, 'permiso', '2018-02-13 01:47:31', 'agregar', 82, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(60, 'permiso', '2018-02-13 01:47:31', 'agregar', 83, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(61, 'permiso', '2018-02-13 01:47:31', 'agregar', 84, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(62, 'permiso', '2018-02-13 01:47:31', 'agregar', 85, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(63, 'permiso', '2018-02-13 01:47:32', 'agregar', 86, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       11, \r\n       1, \r\n      A\r\n      );'),
(64, 'permiso', '2018-02-13 01:47:32', 'agregar', 87, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       12, \r\n       1, \r\n      A\r\n      );'),
(65, 'permiso', '2018-02-13 01:47:32', 'agregar', 88, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       13, \r\n       1, \r\n      A\r\n      );'),
(66, 'permiso', '2018-02-13 01:47:32', 'agregar', 89, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       14, \r\n       1, \r\n      A\r\n      );'),
(67, 'permiso', '2018-02-13 01:47:32', 'agregar', 90, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       15, \r\n       1, \r\n      A\r\n      );'),
(68, 'permiso', '2018-02-13 01:47:32', 'agregar', 91, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(69, 'permiso', '2018-02-13 01:47:32', 'agregar', 92, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(70, 'permiso', '2018-02-13 01:47:33', 'agregar', 93, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       18, \r\n       1, \r\n      A\r\n      );'),
(71, 'permiso', '2018-02-13 01:47:33', 'agregar', 94, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(72, 'permiso', '2018-02-13 01:47:33', 'agregar', 95, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(73, 'permiso', '2018-02-13 01:47:33', 'agregar', 96, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(74, 'permiso', '2018-02-13 01:47:33', 'agregar', 97, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(75, 'permiso', '2018-02-13 01:47:33', 'agregar', 98, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(76, 'permiso', '2018-02-13 01:47:33', 'agregar', 99, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(77, 'permiso', '2018-02-13 01:47:33', 'agregar', 100, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       28, \r\n       1, \r\n      A\r\n      );'),
(78, 'permiso', '2018-02-13 01:47:34', 'agregar', 101, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       29, \r\n       1, \r\n      A\r\n      );'),
(79, 'rol', '2018-02-13 10:16:47', 'agregar', 2, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador, \r\n      A);'),
(80, 'rol', '2018-02-13 10:18:51', 'agregar', 3, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador2, \r\n      A);'),
(81, 'rol', '2018-02-13 10:20:17', 'agregar', 4, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador3, \r\n      A);'),
(82, 'rol', '2018-02-13 10:21:04', 'agregar', 5, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador4, \r\n      A);'),
(83, 'rol', '2018-02-13 10:22:38', 'agregar', 6, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador4, \r\n      A);'),
(84, 'rol', '2018-02-13 10:26:17', 'agregar', 7, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador, \r\n      A);'),
(85, 'rol', '2018-02-13 10:28:47', 'agregar', 8, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador, \r\n      A);'),
(86, 'rol', '2018-02-13 10:30:27', 'agregar', 9, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador, \r\n      A);'),
(87, 'rol', '2018-02-13 10:31:31', 'agregar', 10, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Operador, \r\n      A);'),
(88, 'rol', '2018-02-13 11:08:53', 'agregar', 12, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Administrador, \r\n      A);'),
(89, 'permiso', '2018-02-15 08:27:06', 'agregar', 102, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(90, 'permiso', '2018-02-15 08:27:06', 'agregar', 103, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(91, 'permiso', '2018-02-15 08:27:06', 'agregar', 104, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(92, 'permiso', '2018-02-15 08:27:06', 'agregar', 105, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(93, 'permiso', '2018-02-15 08:27:07', 'agregar', 106, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(94, 'permiso', '2018-02-15 08:27:07', 'agregar', 107, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(95, 'permiso', '2018-02-15 08:27:07', 'agregar', 108, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(96, 'permiso', '2018-02-15 08:27:07', 'agregar', 109, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(97, 'permiso', '2018-02-15 08:27:07', 'agregar', 110, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(98, 'permiso', '2018-02-15 08:27:07', 'agregar', 111, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(99, 'permiso', '2018-02-15 08:27:08', 'agregar', 112, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(100, 'permiso', '2018-02-15 08:27:08', 'agregar', 113, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(101, 'permiso', '2018-02-15 08:27:08', 'agregar', 114, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       18, \r\n       1, \r\n      A\r\n      );'),
(102, 'permiso', '2018-02-15 08:27:08', 'agregar', 115, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(103, 'permiso', '2018-02-15 08:27:08', 'agregar', 116, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(104, 'permiso', '2018-02-15 08:27:09', 'agregar', 117, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(105, 'permiso', '2018-02-15 08:27:09', 'agregar', 118, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(106, 'permiso', '2018-02-15 08:27:09', 'agregar', 119, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(107, 'permiso', '2018-02-15 08:27:09', 'agregar', 120, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(108, 'permiso', '2018-02-15 08:27:09', 'agregar', 121, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       28, \r\n       1, \r\n      A\r\n      );'),
(109, 'permiso', '2018-02-15 08:27:09', 'agregar', 122, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       29, \r\n       1, \r\n      A\r\n      );'),
(110, 'permiso', '2018-02-15 08:30:03', 'agregar', 123, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(111, 'permiso', '2018-02-15 08:30:03', 'agregar', 124, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(112, 'permiso', '2018-02-15 08:30:03', 'agregar', 125, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(113, 'permiso', '2018-02-15 08:30:03', 'agregar', 126, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(114, 'permiso', '2018-02-15 08:30:04', 'agregar', 127, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(115, 'permiso', '2018-02-15 08:30:04', 'agregar', 128, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(116, 'permiso', '2018-02-15 08:30:04', 'agregar', 129, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(117, 'permiso', '2018-02-15 08:30:04', 'agregar', 130, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(118, 'permiso', '2018-02-15 08:30:04', 'agregar', 131, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(119, 'permiso', '2018-02-15 08:30:04', 'agregar', 132, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(120, 'permiso', '2018-02-15 08:30:05', 'agregar', 133, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(121, 'permiso', '2018-02-15 08:30:05', 'agregar', 134, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(122, 'permiso', '2018-02-15 08:30:05', 'agregar', 135, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       18, \r\n       1, \r\n      A\r\n      );'),
(123, 'permiso', '2018-02-15 08:30:05', 'agregar', 136, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(124, 'permiso', '2018-02-15 08:30:05', 'agregar', 137, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(125, 'permiso', '2018-02-15 08:30:06', 'agregar', 138, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(126, 'permiso', '2018-02-15 08:30:06', 'agregar', 139, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(127, 'permiso', '2018-02-15 08:30:06', 'agregar', 140, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(128, 'permiso', '2018-02-15 08:30:06', 'agregar', 141, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(129, 'permiso', '2018-02-15 08:30:06', 'agregar', 142, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       28, \r\n       1, \r\n      A\r\n      );'),
(130, 'permiso', '2018-02-15 08:30:06', 'agregar', 143, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       29, \r\n       1, \r\n      A\r\n      );'),
(131, 'permiso', '2018-02-15 08:42:47', 'agregar', 144, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(132, 'permiso', '2018-02-15 08:42:47', 'agregar', 145, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(133, 'permiso', '2018-02-15 08:42:48', 'agregar', 146, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(134, 'permiso', '2018-02-15 08:42:48', 'agregar', 147, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(135, 'permiso', '2018-02-15 08:42:48', 'agregar', 148, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(136, 'permiso', '2018-02-15 08:42:48', 'agregar', 149, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(137, 'permiso', '2018-02-15 08:42:48', 'agregar', 150, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(138, 'permiso', '2018-02-15 08:42:48', 'agregar', 151, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(139, 'permiso', '2018-02-15 08:42:48', 'agregar', 152, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(140, 'permiso', '2018-02-15 08:42:49', 'agregar', 153, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(141, 'permiso', '2018-02-15 08:42:49', 'agregar', 154, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       11, \r\n       1, \r\n      A\r\n      );'),
(142, 'permiso', '2018-02-15 08:42:49', 'agregar', 155, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       12, \r\n       1, \r\n      A\r\n      );'),
(143, 'permiso', '2018-02-15 08:42:49', 'agregar', 156, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       13, \r\n       1, \r\n      A\r\n      );'),
(144, 'permiso', '2018-02-15 08:42:49', 'agregar', 157, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       14, \r\n       1, \r\n      A\r\n      );'),
(145, 'permiso', '2018-02-15 08:42:49', 'agregar', 158, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       15, \r\n       1, \r\n      A\r\n      );'),
(146, 'permiso', '2018-02-15 08:42:50', 'agregar', 159, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(147, 'permiso', '2018-02-15 08:42:50', 'agregar', 160, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(148, 'permiso', '2018-02-15 08:42:50', 'agregar', 161, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       18, \r\n       1, \r\n      A\r\n      );'),
(149, 'permiso', '2018-02-15 08:42:50', 'agregar', 162, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(150, 'permiso', '2018-02-15 08:42:50', 'agregar', 163, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(151, 'permiso', '2018-02-15 08:42:50', 'agregar', 164, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(152, 'permiso', '2018-02-15 08:42:51', 'agregar', 165, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(153, 'permiso', '2018-02-15 08:42:51', 'agregar', 166, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(154, 'permiso', '2018-02-15 08:42:51', 'agregar', 167, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(155, 'permiso', '2018-02-15 08:42:51', 'agregar', 168, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       28, \r\n       1, \r\n      A\r\n      );'),
(156, 'permiso', '2018-02-15 08:42:51', 'agregar', 169, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       29, \r\n       1, \r\n      A\r\n      );'),
(157, 'permiso', '2018-02-15 08:54:12', 'agregar', 170, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(158, 'permiso', '2018-02-15 08:54:12', 'agregar', 171, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(159, 'permiso', '2018-02-15 08:54:12', 'agregar', 172, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(160, 'permiso', '2018-02-15 08:54:12', 'agregar', 173, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(161, 'permiso', '2018-02-15 08:54:12', 'agregar', 174, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(162, 'permiso', '2018-02-15 08:54:13', 'agregar', 175, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(163, 'permiso', '2018-02-15 08:54:13', 'agregar', 176, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(164, 'permiso', '2018-02-15 08:54:13', 'agregar', 177, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(165, 'permiso', '2018-02-15 08:54:13', 'agregar', 178, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(166, 'permiso', '2018-02-15 08:54:13', 'agregar', 179, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(167, 'permiso', '2018-02-15 08:54:13', 'agregar', 180, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       11, \r\n       1, \r\n      A\r\n      );'),
(168, 'permiso', '2018-02-15 08:54:13', 'agregar', 181, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       12, \r\n       1, \r\n      A\r\n      );'),
(169, 'permiso', '2018-02-15 08:54:14', 'agregar', 182, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       13, \r\n       1, \r\n      A\r\n      );'),
(170, 'permiso', '2018-02-15 08:54:14', 'agregar', 183, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       14, \r\n       1, \r\n      A\r\n      );'),
(171, 'permiso', '2018-02-15 08:54:14', 'agregar', 184, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       15, \r\n       1, \r\n      A\r\n      );'),
(172, 'permiso', '2018-02-15 08:54:14', 'agregar', 185, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(173, 'permiso', '2018-02-15 08:54:14', 'agregar', 186, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(174, 'permiso', '2018-02-15 08:54:14', 'agregar', 187, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       18, \r\n       1, \r\n      A\r\n      );'),
(175, 'permiso', '2018-02-15 08:54:15', 'agregar', 188, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(176, 'permiso', '2018-02-15 08:54:15', 'agregar', 189, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(177, 'permiso', '2018-02-15 08:54:15', 'agregar', 190, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(178, 'permiso', '2018-02-15 08:54:15', 'agregar', 191, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(179, 'permiso', '2018-02-15 08:54:15', 'agregar', 192, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(180, 'permiso', '2018-02-15 08:54:15', 'agregar', 193, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(181, 'rol', '2018-02-15 08:55:55', 'agregar', 13, 1, 'insert into rol(\r\n      nom_rol, \r\n      est_rol)\r\n      values(\r\n      Cobranza, \r\n      A);'),
(182, 'permiso', '2018-02-17 12:31:40', 'agregar', 194, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       1, \r\n       1, \r\n      A\r\n      );'),
(183, 'permiso', '2018-02-17 12:31:40', 'agregar', 195, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       2, \r\n       1, \r\n      A\r\n      );'),
(184, 'permiso', '2018-02-17 12:31:40', 'agregar', 196, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       3, \r\n       1, \r\n      A\r\n      );'),
(185, 'permiso', '2018-02-17 12:31:41', 'agregar', 197, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       4, \r\n       1, \r\n      A\r\n      );'),
(186, 'permiso', '2018-02-17 12:31:41', 'agregar', 198, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       5, \r\n       1, \r\n      A\r\n      );'),
(187, 'permiso', '2018-02-17 12:31:41', 'agregar', 199, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       6, \r\n       1, \r\n      A\r\n      );'),
(188, 'permiso', '2018-02-17 12:31:41', 'agregar', 200, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       7, \r\n       1, \r\n      A\r\n      );'),
(189, 'permiso', '2018-02-17 12:31:41', 'agregar', 201, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       8, \r\n       1, \r\n      A\r\n      );'),
(190, 'permiso', '2018-02-17 12:31:41', 'agregar', 202, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       9, \r\n       1, \r\n      A\r\n      );'),
(191, 'permiso', '2018-02-17 12:31:41', 'agregar', 203, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       10, \r\n       1, \r\n      A\r\n      );'),
(192, 'permiso', '2018-02-17 12:31:42', 'agregar', 204, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       11, \r\n       1, \r\n      A\r\n      );'),
(193, 'permiso', '2018-02-17 12:31:42', 'agregar', 205, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       12, \r\n       1, \r\n      A\r\n      );'),
(194, 'permiso', '2018-02-17 12:31:42', 'agregar', 206, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       13, \r\n       1, \r\n      A\r\n      );'),
(195, 'permiso', '2018-02-17 12:31:42', 'agregar', 207, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       14, \r\n       1, \r\n      A\r\n      );'),
(196, 'permiso', '2018-02-17 12:31:42', 'agregar', 208, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       15, \r\n       1, \r\n      A\r\n      );'),
(197, 'permiso', '2018-02-17 12:31:42', 'agregar', 209, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       16, \r\n       1, \r\n      A\r\n      );'),
(198, 'permiso', '2018-02-17 12:31:43', 'agregar', 210, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       17, \r\n       1, \r\n      A\r\n      );'),
(199, 'permiso', '2018-02-17 12:31:43', 'agregar', 211, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       18, \r\n       1, \r\n      A\r\n      );'),
(200, 'permiso', '2018-02-17 12:31:43', 'agregar', 212, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       19, \r\n       1, \r\n      A\r\n      );'),
(201, 'permiso', '2018-02-17 12:31:43', 'agregar', 213, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       21, \r\n       1, \r\n      A\r\n      );'),
(202, 'permiso', '2018-02-17 12:31:43', 'agregar', 214, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       22, \r\n       1, \r\n      A\r\n      );'),
(203, 'permiso', '2018-02-17 12:31:43', 'agregar', 215, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       23, \r\n       1, \r\n      A\r\n      );'),
(204, 'permiso', '2018-02-17 12:31:44', 'agregar', 216, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       24, \r\n       1, \r\n      A\r\n      );'),
(205, 'permiso', '2018-02-17 12:31:44', 'agregar', 217, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       25, \r\n       1, \r\n      A\r\n      );'),
(206, 'permiso', '2018-02-17 12:31:44', 'agregar', 218, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       28, \r\n       1, \r\n      A\r\n      );'),
(207, 'permiso', '2018-02-17 12:31:44', 'agregar', 219, 1, 'insert into permiso(\r\n      fky_opcion, \r\n      fky_usuario, \r\n      est_per\r\n      )values(\r\n       29, \r\n       1, \r\n      A\r\n      );'),
(208, 'rol', '2018-02-17 02:27:23', 'agregar', 2, 1, 'insert into usuario\r\n            (log_usu, \r\n             nom_usu, \r\n             ape_usu, \r\n             ema_usu, \r\n             cla_usu, \r\n             fky_rol, \r\n             est_usu)\r\n            values(\r\n            aorduno,\r\n            eduardo.angel42@gmail.com, \r\n            OrduÃ±o,  \r\n            eduardo.angel42@gmail.com,\r\n            202cb962ac59075b964b07152d234b70,\r\n            12, \r\n            A);'),
(209, 'rol', '2018-02-17 03:05:13', 'agregar', 3, 1, 'insert into usuario\r\n            (log_usu, \r\n             nom_usu, \r\n             ape_usu, \r\n             ema_usu, \r\n             cla_usu, \r\n             fky_rol, \r\n             est_usu)\r\n            values(\r\n            imaldonado,\r\n            maldonado@gmail.com, \r\n            Maldonado,  \r\n            maldonado@gmail.com,\r\n            827ccb0eea8a706c4c34a16891f84e7b,\r\n            12, \r\n            A);'),
(210, 'rol', '2018-02-17 03:34:25', 'agregar', 4, 1, 'insert into usuario\r\n            (log_usu, \r\n             nom_usu, \r\n             ape_usu, \r\n             ema_usu, \r\n             cla_usu, \r\n             fky_rol, \r\n             est_usu)\r\n            values(\r\n            jperez,\r\n            joseperez@gmail.com, \r\n            Perez,  \r\n            joseperez@gmail.com,\r\n            827ccb0eea8a706c4c34a16891f84e7b,\r\n            12, \r\n            A);'),
(211, 'rol', '2018-02-17 03:38:57', 'agregar', 5, 1, 'insert into usuario\r\n            (log_usu, \r\n             nom_usu, \r\n             ape_usu, \r\n             ema_usu, \r\n             cla_usu, \r\n             fky_rol, \r\n             est_usu)\r\n            values(\r\n            lgonzalez,\r\n            Luis, \r\n            GonzÃ¡lez,  \r\n            luisgonzalez@gmail.com,\r\n            827ccb0eea8a706c4c34a16891f84e7b,\r\n            12, \r\n            A);'),
(212, 'rol', '2018-02-17 06:30:17', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=13, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(213, 'rol', '2018-02-17 06:32:00', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=12, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(214, 'rol', '2018-02-17 06:32:41', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=13, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(215, 'rol', '2018-02-17 06:34:13', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=12, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(216, 'rol', '2018-02-17 06:35:46', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=13, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(217, 'rol', '2018-02-17 06:37:05', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=12, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(218, 'rol', '2018-02-17 06:38:13', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=13, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(219, 'rol', '2018-02-17 06:40:45', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=12, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(220, 'rol', '2018-02-17 06:41:15', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=13, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(221, 'rol', '2018-02-17 06:43:41', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=1, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(222, 'rol', '2018-02-17 06:44:07', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=12, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;'),
(223, 'rol', '2018-02-17 06:45:03', 'modificar', 2, 1, 'update usuario set\r\n            log_usu=aorduno, \r\n            nom_usu=eduardo.angel42@gmail.com, \r\n            ape_usu=OrduÃ±o, \r\n            ema_usu=eduardo.angel42@gmail.com, \r\n            fky_rol=13, \r\n            est_usu=A\r\n            where \r\n            cod_usu=2;');
INSERT INTO `auditoria` (`cod_aud`, `tab_aud`, `fec_aud`, `acc_aud`, `prk_aud`, `fky_usuario`, `sql_aud`) VALUES
(224, 'rol', '2018-02-17 06:51:44', 'modificar', 4, 1, 'update usuario set\r\n            log_usu=jperez, \r\n            nom_usu=Jose Alejandro, \r\n            ape_usu=Perez, \r\n            ema_usu=joseperez@gmail.com, \r\n            fky_rol=12, \r\n            est_usu=A\r\n            where \r\n            cod_usu=4;'),
(225, 'requisito', '2018-02-18 10:02:33', 'agregar', 1, 1, 'insert into requisito(\r\n            nom_req,\r\n            est_req)\r\n            values(\r\n            , \r\n            );'),
(226, 'requisito', '2018-02-18 10:02:49', 'agregar', 2, 1, 'insert into requisito(\r\n            nom_req,\r\n            est_req)\r\n            values(\r\n            , \r\n            );'),
(227, 'requisito', '2018-02-18 10:03:52', 'agregar', 3, 1, 'insert into requisito(\r\n            nom_req,\r\n            est_req)\r\n            values(\r\n            Tener Concocimientos en HTML , \r\n            A);'),
(228, 'requisito', '2018-02-18 10:04:29', 'agregar', 4, 1, 'insert into requisito(\r\n            nom_req,\r\n            est_req)\r\n            values(\r\n            Tener Conocimientos en CSS, \r\n            A);'),
(229, 'requisito', '2018-02-18 10:11:27', 'modificar', 0, 1, 'update requisito \r\n               set \r\n               nom_req=Tener Conocimientos en HTML ,\r\n               est_req=A \r\n               where\r\n               cod_req=3;'),
(230, 'requisito', '2018-02-18 10:12:34', 'modificar', 3, 1, 'update requisito \r\n               set \r\n               nom_req=Tener Conocimientos en HTML ,\r\n               est_req=I \r\n               where\r\n               cod_req=3;'),
(231, 'requisito', '2018-02-18 10:13:15', 'modificar', 3, 1, 'update requisito \r\n               set \r\n               nom_req=Tener Conocimientos en HTML ,\r\n               est_req=A \r\n               where\r\n               cod_req=3;'),
(232, 'empresa', '2018-02-18 10:56:49', 'agregar', 1, 1, 'insert into empresa\r\n           (rif_emp, \r\n            nom_emp, \r\n            dom_emp, \r\n            est_emp)\r\n            values\r\n            (J-29912947-0, \r\n             IngenierÃ­a Digital CA, \r\n             Carrera 22 entre calle 10 y pasaje acueducto, edificio J&M, San CristÃ³bal, Edo. TÃ¡chira, \r\n             A);'),
(233, 'empresa', '2018-02-18 10:58:49', 'modificar', 1, 1, 'update empresa \r\n               set \r\n               rif_emp=J-29912947-0, \r\n               nom_emp=IngenierÃ­a Digital CA, \r\n               dom_emp=Carrera 22 entre calle 10 y pasaje acueducto, edificio J&M, San CristÃ³bal, Edo. TÃ¡chira, \r\n               est_emp=I\r\n               where \r\n               cod_emp=1;'),
(234, 'cuenta', '2018-02-18 12:05:27', 'agregar', 4, 1, 'insert into cuenta(\r\n            num_cue, \r\n            rif_cue, \r\n            nom_cue, \r\n            fky_banco,\r\n            fky_empresa, \r\n            tip_cue,\r\n            est_cue)\r\n            values(\r\n            01020131470000044147, \r\n            15565314, \r\n            Pedro Parra, \r\n            1,\r\n             1, \r\n            A,\r\n            A      \r\n            );'),
(235, 'cuenta', '2018-02-22 12:11:02', 'agregar', 5, 1, 'insert into cuenta(\r\n            num_cue, \r\n            rif_cue, \r\n            nom_cue, \r\n            fky_banco,\r\n            fky_empresa, \r\n            tip_cue,\r\n            est_cue)\r\n            values(\r\n            01024445566787990000, \r\n            15565314, \r\n            Jose Cordero, \r\n            2,\r\n             1, \r\n            I,\r\n            A      \r\n            );'),
(236, 'cuenta', '2018-02-22 01:04:35', 'agregar', 6, 1, 'insert into cuenta(\r\n            num_cue, \r\n            rif_cue, \r\n            nom_cue, \r\n            fky_banco,\r\n            fky_empresa, \r\n            tip_cue,\r\n            est_cue)\r\n            values(\r\n            01020131470000044147, \r\n            15565314, \r\n            Pedro Parra Avila, \r\n            1,\r\n             1, \r\n            C,\r\n            A      \r\n            );'),
(237, 'cuenta', '2018-02-22 01:10:34', 'modificar', 0, 1, 'update cuenta set \r\n              num_cue=01231212344556666788, \r\n              rif_cue=10152845, \r\n              nom_cue=Doraliza Parra, \r\n              fky_banco=2, \r\n              fky_empresa=1,\r\n              tip_cue=A,\r\n              est_cue=A\r\n              where\r\n              cod_cue=4;'),
(238, 'cuenta', '2018-02-22 01:11:25', 'modificar', 4, 1, 'update cuenta set \r\n              num_cue=01231212344556666788, \r\n              rif_cue=10152845, \r\n              nom_cue=Doraliza Parra Avila, \r\n              fky_banco=2, \r\n              fky_empresa=1,\r\n              tip_cue=A,\r\n              est_cue=A\r\n              where\r\n              cod_cue=4;'),
(239, 'cuenta', '2018-02-22 01:13:35', 'modificar', 4, 1, 'update cuenta set \r\n              num_cue=01231212344556666788, \r\n              rif_cue=10152845, \r\n              nom_cue=Doraliza Parra Avila, \r\n              fky_banco=2, \r\n              fky_empresa=1,\r\n              tip_cue=C,\r\n              est_cue=A\r\n              where\r\n              cod_cue=4;'),
(240, 'cuenta', '2018-02-22 01:13:43', 'modificar', 4, 1, 'update cuenta set \r\n              num_cue=01231212344556666788, \r\n              rif_cue=10152845, \r\n              nom_cue=Doraliza Parra Avila, \r\n              fky_banco=2, \r\n              fky_empresa=1,\r\n              tip_cue=A,\r\n              est_cue=A\r\n              where\r\n              cod_cue=4;'),
(241, 'cuenta', '2018-02-22 01:20:01', 'modificar', 4, 1, 'update cuenta set \r\n              num_cue=01231212344556666788, \r\n              rif_cue=10152845, \r\n              nom_cue=Doraliza Parra Avila, \r\n              fky_banco=1, \r\n              fky_empresa=1,\r\n              tip_cue=C,\r\n              est_cue=A\r\n              where\r\n              cod_cue=4;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `cod_ban` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ban` varchar(50) NOT NULL,
  `est_ban` char(1) NOT NULL,
  PRIMARY KEY (`cod_ban`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`cod_ban`, `nom_ban`, `est_ban`) VALUES
(1, 'Mercantil', 'A'),
(2, 'Venezuela', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE IF NOT EXISTS `certificado` (
  `cod_cer` int(11) NOT NULL AUTO_INCREMENT,
  `fky_inscripcion` int(11) NOT NULL,
  `num_cer` int(11) NOT NULL,
  `lib_cer` int(11) NOT NULL,
  `fol_cer` int(11) NOT NULL,
  `fec_cer` date NOT NULL,
  `md5_cer` varchar(32) NOT NULL,
  `est_cer` char(1) NOT NULL,
  PRIMARY KEY (`cod_cer`),
  KEY `fky_inscripcion` (`fky_inscripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
  `cod_con` int(11) NOT NULL AUTO_INCREMENT,
  `nom_con` varchar(80) NOT NULL,
  `est_con` char(1) NOT NULL,
  PRIMARY KEY (`cod_con`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`cod_con`, `nom_con`, `est_con`) VALUES
(1, 'IntroducciÃ³n a la ProgramaciÃ³n Orientada a Objetos 2', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_por_curso`
--

CREATE TABLE IF NOT EXISTS `contenido_por_curso` (
  `cod_con_cur` int(11) NOT NULL AUTO_INCREMENT,
  `fky_tipo_curso` int(11) NOT NULL,
  `fky_contenido` int(11) NOT NULL,
  `url_con_cur` text NOT NULL,
  `est_con_cur` char(1) NOT NULL,
  PRIMARY KEY (`cod_con_cur`),
  KEY `fky_tipo_curso` (`fky_tipo_curso`),
  KEY `fky_contenido` (`fky_contenido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `cod_cue` int(11) NOT NULL AUTO_INCREMENT,
  `num_cue` varchar(20) NOT NULL,
  `rif_cue` varchar(15) NOT NULL,
  `nom_cue` varchar(25) NOT NULL,
  `fky_banco` int(11) NOT NULL,
  `tip_cue` char(1) NOT NULL,
  `fky_empresa` int(11) NOT NULL,
  `est_cue` char(1) NOT NULL,
  PRIMARY KEY (`cod_cue`),
  KEY `fky_banco` (`fky_banco`),
  KEY `fky_empresa` (`fky_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`cod_cue`, `num_cue`, `rif_cue`, `nom_cue`, `fky_banco`, `tip_cue`, `fky_empresa`, `est_cue`) VALUES
(4, '01231212344556666788', '10152845', 'Doraliza Parra Avila', 1, 'C', 1, 'A'),
(5, '01024445566787990000', '15565314', 'Jose Cordero', 2, 'I', 1, 'A'),
(6, '01020131470000044147', '15565314', 'Pedro Parra Avila', 1, 'C', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `cod_cur` int(11) NOT NULL AUTO_INCREMENT,
  `dia_cur` varchar(80) NOT NULL,
  `hor_cur` time NOT NULL,
  `fec_ini` date NOT NULL,
  `fec_fin` date NOT NULL,
  `bas_cur` float NOT NULL,
  `iva_cur` float NOT NULL,
  `pre_cur` float NOT NULL,
  `obs_cur` varchar(10) DEFAULT NULL,
  `fky_tipo_curso` int(11) NOT NULL,
  `fky_instructor` int(11) NOT NULL,
  `fky_modalidad` int(11) NOT NULL,
  `est_cur` char(1) NOT NULL,
  PRIMARY KEY (`cod_cur`),
  KEY `fky_tipo_curso` (`fky_tipo_curso`),
  KEY `fky_instructor` (`fky_instructor`),
  KEY `fky_modalidad` (`fky_modalidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `cod_emp` int(11) NOT NULL AUTO_INCREMENT,
  `rif_emp` varchar(15) NOT NULL,
  `nom_emp` varchar(50) NOT NULL,
  `dom_emp` varchar(100) NOT NULL,
  `est_emp` char(1) NOT NULL,
  PRIMARY KEY (`cod_emp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`cod_emp`, `rif_emp`, `nom_emp`, `dom_emp`, `est_emp`) VALUES
(1, 'J-29912947-0', 'IngenierÃ­a Digital CA', 'Carrera 22 entre calle 10 y pasaje acueducto, edificio J&M, San CristÃ³bal, Edo. TÃ¡chira', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `num_fac` int(11) NOT NULL AUTO_INCREMENT,
  `fec_fac` date NOT NULL,
  `bas_fac` float NOT NULL,
  `iva_fac` float NOT NULL,
  `tot_fac` float NOT NULL,
  `gen_fac` char(1) NOT NULL,
  `fky_iva` int(11) NOT NULL,
  `fky_titular_factura` int(11) NOT NULL,
  `est_fac` char(1) NOT NULL,
  PRIMARY KEY (`num_fac`),
  KEY `fky_iva` (`fky_iva`),
  KEY `fky_titular_factura` (`fky_titular_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE IF NOT EXISTS `factura_detalle` (
  `fky_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fky_curso` int(11) NOT NULL,
  `can_fac_det` int(11) NOT NULL,
  `pre_fac_det` float NOT NULL,
  `iva_fac_det` float NOT NULL,
  `sub_fac_det` float NOT NULL,
  PRIMARY KEY (`fky_factura`,`fky_curso`),
  KEY `fky_curso` (`fky_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `cod_ins` int(11) NOT NULL AUTO_INCREMENT,
  `fec_ins` date NOT NULL,
  `hor_ins` time NOT NULL,
  `fky_alu` varchar(15) NOT NULL,
  `fky_cur` int(11) NOT NULL,
  `fky_factura` int(11) NOT NULL,
  `est_ins` char(1) NOT NULL,
  PRIMARY KEY (`cod_ins`),
  KEY `fky_alu` (`fky_alu`),
  KEY `fky_cur` (`fky_cur`),
  KEY `fky_factura` (`fky_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `cod_ins` int(11) NOT NULL AUTO_INCREMENT,
  `ide_ins` varchar(15) NOT NULL,
  `nom_ins` varchar(25) NOT NULL,
  `ape_ins` varchar(25) NOT NULL,
  `ema_ins` varchar(80) NOT NULL,
  `te1_ins` varchar(15) NOT NULL,
  `te2_ins` varchar(15) DEFAULT NULL,
  `est_ins` char(1) NOT NULL,
  PRIMARY KEY (`cod_ins`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE IF NOT EXISTS `iva` (
  `cod_iva` int(11) NOT NULL AUTO_INCREMENT,
  `val_iva` float NOT NULL,
  `ini_iva` date NOT NULL,
  `fin_iva` date NOT NULL,
  `est_iva` char(1) NOT NULL,
  PRIMARY KEY (`cod_iva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE IF NOT EXISTS `modalidad` (
  `cod_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(80) NOT NULL,
  `est_mod` char(1) NOT NULL,
  PRIMARY KEY (`cod_mod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `cod_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(25) NOT NULL,
  `url_mod` text NOT NULL,
  `est_mod` char(1) NOT NULL,
  PRIMARY KEY (`cod_mod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`cod_mod`, `nom_mod`, `url_mod`, `est_mod`) VALUES
(1, 'Alumnos', 'frontend/vista/', 'A'),
(2, 'Areas', 'frontend/area/', 'A'),
(3, 'Bancos', 'frontend/banco/', 'A'),
(4, 'Módulos', 'frontend/modulo/', 'A'),
(5, 'Opciones', 'frontend/opcion', 'A'),
(6, 'País', 'frontend/pais', 'A'),
(7, 'Inscripción', 'frontend/inscripcion', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion`
--

CREATE TABLE IF NOT EXISTS `opcion` (
  `cod_opc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_opc` varchar(25) NOT NULL,
  `fky_modulo` int(11) NOT NULL,
  `url_opc` text NOT NULL,
  `est_opc` char(1) NOT NULL,
  PRIMARY KEY (`cod_opc`),
  KEY `fky_modulo` (`fky_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `opcion`
--

INSERT INTO `opcion` (`cod_opc`, `nom_opc`, `fky_modulo`, `url_opc`, `est_opc`) VALUES
(1, 'Agregar Alumno', 1, 'agregar_alumno.php', 'A'),
(2, 'Modificar Alumno', 1, 'modificar_alumno.php', 'A'),
(3, 'Filtrar Alumno', 1, 'filtrar_alumno.php', 'A'),
(4, 'Listar Alumno', 1, 'listar_alumno.php', 'A'),
(5, 'Ver Alumno', 1, 'ver_alumno.php', 'A'),
(6, 'Agregar Area', 2, 'agregar_area.php', 'A'),
(7, 'Modificar Area', 2, 'modificar_area.php', 'A'),
(8, 'Filtrar Area', 2, 'filtrar_area.php', 'A'),
(9, 'Listar Area', 2, 'listar_area.php', 'A'),
(10, 'Ver Area', 2, 'ver_area.php', 'A'),
(11, 'Agregar Banco', 3, 'agregar_banco.php', 'A'),
(12, 'Modificar Banco', 3, 'modificar_banco.php', 'A'),
(13, 'Filtrar Banco', 3, 'filtrar_banco.php', 'A'),
(14, 'Listar Banco', 3, 'listar_banco.php', 'A'),
(15, 'Ver Banco', 3, 'ver_banco.php', 'A'),
(16, 'Agregar Módulo', 4, 'agregar_modulo.php', 'A'),
(17, 'Modificar Módulo', 4, 'modificar_modulo.php', 'A'),
(18, 'Filtrar Módulo', 4, 'filtrar_modulo.php', 'A'),
(19, 'Listar Módulo', 4, 'listar_modulo.php', 'A'),
(20, 'Ver Módulo', 4, 'ver_modulo.php', 'A'),
(21, 'Agregar Opción', 5, 'agregar_opcion.php', 'A'),
(22, 'Modificar Opción', 5, 'modificar_opcion.php', 'A'),
(23, 'Filtrar Opción', 5, 'filtrar_opcion.php', 'A'),
(24, 'Listar Opción', 5, 'listar_opcion.php', 'A'),
(25, 'Ver Opción', 5, 'ver_opcion.php', 'A'),
(28, 'Agregar País', 6, 'agregar_pais.php', 'A'),
(29, 'Modificar País 2', 6, 'modificar_pais.php', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion_rol`
--

CREATE TABLE IF NOT EXISTS `opcion_rol` (
  `fky_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `fky_rol` int(11) NOT NULL,
  `est_opc_rol` char(1) DEFAULT NULL,
  PRIMARY KEY (`fky_opcion`,`fky_rol`),
  KEY `fky_rol` (`fky_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcado de datos para la tabla `opcion_rol`
--

INSERT INTO `opcion_rol` (`fky_opcion`, `fky_rol`, `est_opc_rol`) VALUES
(1, 12, 'A'),
(1, 13, 'A'),
(2, 12, 'A'),
(2, 13, 'A'),
(3, 12, 'A'),
(3, 13, 'A'),
(4, 12, 'A'),
(4, 13, 'A'),
(5, 12, 'A'),
(5, 13, 'A'),
(6, 12, 'A'),
(7, 12, 'A'),
(8, 12, 'A'),
(9, 12, 'A'),
(10, 12, 'A'),
(11, 12, 'A'),
(11, 13, 'A'),
(12, 12, 'A'),
(12, 13, 'A'),
(13, 12, 'A'),
(13, 13, 'A'),
(14, 12, 'A'),
(14, 13, 'A'),
(15, 12, 'A'),
(15, 13, 'A'),
(16, 12, 'A'),
(17, 12, 'A'),
(18, 12, 'A'),
(19, 12, 'A'),
(20, 12, 'A'),
(21, 12, 'A'),
(22, 12, 'A'),
(23, 12, 'A'),
(24, 12, 'A'),
(25, 12, 'A'),
(28, 12, 'A'),
(29, 12, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `cod_pag` int(11) NOT NULL AUTO_INCREMENT,
  `fec_pag` date NOT NULL,
  `hor_pag` time NOT NULL,
  `dep_pag` varchar(20) NOT NULL,
  `mon_pag` float NOT NULL,
  `fky_curso` int(11) DEFAULT NULL,
  `fky_alumno` varchar(15) DEFAULT NULL,
  `fky_proveedor` int(11) DEFAULT NULL,
  `fky_banco_origen` int(11) DEFAULT NULL,
  `fky_banco_destino` int(11) DEFAULT NULL,
  `fky_tipo_pago` int(11) NOT NULL,
  `fky_inscripcion` int(11) DEFAULT NULL,
  `fky_tipo_movimiento` int(11) NOT NULL,
  `url_pag` text,
  `obs_pag` varchar(10) DEFAULT NULL,
  `est_pag` char(1) NOT NULL,
  PRIMARY KEY (`cod_pag`),
  KEY `fky_curso` (`fky_curso`),
  KEY `fky_alumno` (`fky_alumno`),
  KEY `fky_proveedor` (`fky_proveedor`),
  KEY `fky_banco_origen` (`fky_banco_origen`),
  KEY `fky_banco_destino` (`fky_banco_destino`),
  KEY `fky_tipo_pago` (`fky_tipo_pago`),
  KEY `fky_inscripcion` (`fky_inscripcion`),
  KEY `fky_tipo_movimiento` (`fky_tipo_movimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `cod_pai` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pai` varchar(25) NOT NULL,
  `est_pai` char(1) NOT NULL,
  PRIMARY KEY (`cod_pai`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`cod_pai`, `nom_pai`, `est_pai`) VALUES
(1, 'Venezuela', 'A'),
(2, 'Colombia', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `cod_per` int(11) NOT NULL AUTO_INCREMENT,
  `fky_opcion` int(11) NOT NULL,
  `fky_usuario` int(11) NOT NULL,
  `est_per` char(1) NOT NULL,
  PRIMARY KEY (`cod_per`),
  KEY `fky_opcion` (`fky_opcion`),
  KEY `fky_usuario` (`fky_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=365 ;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`cod_per`, `fky_opcion`, `fky_usuario`, `est_per`) VALUES
(194, 1, 1, 'A'),
(195, 2, 1, 'A'),
(196, 3, 1, 'A'),
(197, 4, 1, 'A'),
(198, 5, 1, 'A'),
(199, 6, 1, 'A'),
(200, 7, 1, 'A'),
(201, 8, 1, 'A'),
(202, 9, 1, 'A'),
(203, 10, 1, 'A'),
(204, 11, 1, 'A'),
(205, 12, 1, 'A'),
(206, 13, 1, 'A'),
(207, 14, 1, 'A'),
(208, 15, 1, 'A'),
(209, 16, 1, 'A'),
(210, 17, 1, 'A'),
(211, 18, 1, 'A'),
(212, 19, 1, 'A'),
(213, 21, 1, 'A'),
(214, 22, 1, 'A'),
(215, 23, 1, 'A'),
(216, 24, 1, 'A'),
(217, 25, 1, 'A'),
(218, 28, 1, 'A'),
(219, 29, 1, 'A'),
(220, 1, 3, 'A'),
(221, 2, 3, 'A'),
(222, 3, 3, 'A'),
(223, 4, 3, 'A'),
(224, 5, 3, 'A'),
(225, 6, 3, 'A'),
(226, 7, 3, 'A'),
(227, 8, 3, 'A'),
(228, 9, 3, 'A'),
(229, 10, 3, 'A'),
(230, 11, 3, 'A'),
(231, 12, 3, 'A'),
(232, 13, 3, 'A'),
(233, 14, 3, 'A'),
(234, 15, 3, 'A'),
(235, 16, 3, 'A'),
(236, 17, 3, 'A'),
(237, 18, 3, 'A'),
(238, 19, 3, 'A'),
(239, 20, 3, 'A'),
(240, 21, 3, 'A'),
(241, 22, 3, 'A'),
(242, 23, 3, 'A'),
(243, 24, 3, 'A'),
(244, 25, 3, 'A'),
(245, 28, 3, 'A'),
(246, 29, 3, 'A'),
(247, 1, 4, 'A'),
(248, 2, 4, 'A'),
(249, 3, 4, 'A'),
(250, 4, 4, 'A'),
(251, 5, 4, 'A'),
(252, 6, 4, 'A'),
(253, 7, 4, 'A'),
(254, 8, 4, 'A'),
(255, 9, 4, 'A'),
(256, 10, 4, 'A'),
(257, 11, 4, 'A'),
(258, 12, 4, 'A'),
(259, 13, 4, 'A'),
(260, 14, 4, 'A'),
(261, 15, 4, 'A'),
(262, 16, 4, 'A'),
(263, 17, 4, 'A'),
(264, 18, 4, 'A'),
(265, 19, 4, 'A'),
(266, 20, 4, 'A'),
(267, 21, 4, 'A'),
(268, 22, 4, 'A'),
(269, 23, 4, 'A'),
(270, 24, 4, 'A'),
(271, 25, 4, 'A'),
(272, 28, 4, 'A'),
(273, 29, 4, 'A'),
(274, 1, 5, 'A'),
(275, 2, 5, 'A'),
(276, 3, 5, 'A'),
(277, 4, 5, 'A'),
(278, 5, 5, 'A'),
(279, 6, 5, 'A'),
(280, 7, 5, 'A'),
(281, 8, 5, 'A'),
(282, 9, 5, 'A'),
(283, 10, 5, 'A'),
(284, 11, 5, 'A'),
(285, 12, 5, 'A'),
(286, 13, 5, 'A'),
(287, 14, 5, 'A'),
(288, 15, 5, 'A'),
(289, 16, 5, 'A'),
(290, 17, 5, 'A'),
(291, 18, 5, 'A'),
(292, 19, 5, 'A'),
(293, 20, 5, 'A'),
(294, 21, 5, 'A'),
(295, 22, 5, 'A'),
(296, 23, 5, 'A'),
(297, 24, 5, 'A'),
(298, 25, 5, 'A'),
(299, 28, 5, 'A'),
(300, 29, 5, 'A'),
(338, 1, 2, 'A'),
(339, 2, 2, 'A'),
(340, 3, 2, 'A'),
(341, 4, 2, 'A'),
(342, 5, 2, 'A'),
(343, 6, 2, 'A'),
(344, 7, 2, 'A'),
(345, 8, 2, 'A'),
(346, 9, 2, 'A'),
(347, 10, 2, 'A'),
(348, 11, 2, 'A'),
(349, 12, 2, 'A'),
(350, 13, 2, 'A'),
(351, 14, 2, 'A'),
(352, 15, 2, 'A'),
(353, 16, 2, 'A'),
(354, 17, 2, 'A'),
(355, 18, 2, 'A'),
(356, 19, 2, 'A'),
(357, 20, 2, 'A'),
(358, 21, 2, 'A'),
(359, 22, 2, 'A'),
(360, 23, 2, 'A'),
(361, 24, 2, 'A'),
(362, 25, 2, 'A'),
(363, 28, 2, 'A'),
(364, 29, 2, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_evaluacion_curso`
--

CREATE TABLE IF NOT EXISTS `pregunta_evaluacion_curso` (
  `cod_pre_eva` int(11) NOT NULL AUTO_INCREMENT,
  `enu_pre_eva` text NOT NULL,
  `re1_pre_eva` varchar(80) NOT NULL,
  `re2_pre_eva` varchar(80) NOT NULL,
  `re3_pre_eva` varchar(80) NOT NULL,
  `re4_pre_eva` varchar(80) NOT NULL,
  `re5_pre_eva` varchar(80) NOT NULL,
  `fky_tipo_curso` int(11) NOT NULL,
  `tip_pre_eva` char(1) NOT NULL,
  `est_pre_eva` char(1) NOT NULL,
  PRIMARY KEY (`cod_pre_eva`),
  KEY `fky_tipo_curso` (`fky_tipo_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_quiz`
--

CREATE TABLE IF NOT EXISTS `pregunta_quiz` (
  `cod_pre_qui` int(11) NOT NULL AUTO_INCREMENT,
  `enu_pre_qui` text NOT NULL,
  `res_pre_qui` varchar(10) NOT NULL,
  `re1_pre_qui` varchar(10) NOT NULL,
  `re2_pre_qui` varchar(10) NOT NULL,
  `re3_pre_qui` varchar(10) NOT NULL,
  `re4_pre_qui` varchar(10) NOT NULL,
  `tip_pre_qui` char(1) NOT NULL,
  `fky_quiz` int(11) NOT NULL,
  `fky_contenido` int(11) NOT NULL,
  `fky_tipo_curso` int(11) NOT NULL,
  `est_pre_qui` char(1) NOT NULL,
  PRIMARY KEY (`cod_pre_qui`),
  KEY `fky_quiz` (`fky_quiz`),
  KEY `fky_contenido` (`fky_contenido`),
  KEY `fky_tipo_curso` (`fky_tipo_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `cod_pro` int(11) NOT NULL AUTO_INCREMENT,
  `rif_pro` varchar(15) NOT NULL,
  `nom_pro` varchar(80) NOT NULL,
  `te1_pro` varchar(15) NOT NULL,
  `te2_pro` varchar(15) NOT NULL,
  `dir_pro` varchar(80) NOT NULL,
  `est_pro` char(1) NOT NULL,
  PRIMARY KEY (`cod_pro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `cod_qui` int(11) NOT NULL AUTO_INCREMENT,
  `nom_qui` varchar(10) NOT NULL,
  `tie_qui` int(11) NOT NULL,
  `tip_qui` char(1) NOT NULL,
  `min_qui` int(11) NOT NULL,
  `ini_qui` date NOT NULL,
  `fin_qui` date NOT NULL,
  `hor_ini` time NOT NULL,
  `hor_fin` time NOT NULL,
  `est_qui` char(1) NOT NULL,
  PRIMARY KEY (`cod_qui`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisito`
--

CREATE TABLE IF NOT EXISTS `requisito` (
  `cod_req` int(11) NOT NULL AUTO_INCREMENT,
  `nom_req` varchar(80) NOT NULL,
  `est_req` char(1) NOT NULL,
  PRIMARY KEY (`cod_req`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `requisito`
--

INSERT INTO `requisito` (`cod_req`, `nom_req`, `est_req`) VALUES
(3, 'Tener Conocimientos en HTML ', 'A'),
(4, 'Tener Conocimientos en CSS', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisito_por_curso`
--

CREATE TABLE IF NOT EXISTS `requisito_por_curso` (
  `cod_req_cur` int(11) NOT NULL AUTO_INCREMENT,
  `fky_requisito` int(11) NOT NULL,
  `fky_tipo_curso` int(11) NOT NULL,
  `ini_req` varchar(15) NOT NULL,
  `fin_req` varchar(15) NOT NULL,
  `obl_req` char(1) NOT NULL,
  `est_req` char(1) NOT NULL,
  PRIMARY KEY (`cod_req_cur`),
  KEY `fky_requisito` (`fky_requisito`),
  KEY `fky_tipo_curso` (`fky_tipo_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_evaluacion_curso`
--

CREATE TABLE IF NOT EXISTS `respuesta_evaluacion_curso` (
  `cod_eva_cur` int(11) NOT NULL AUTO_INCREMENT,
  `fec_eva_cur` date NOT NULL,
  `fky_alumno` int(11) NOT NULL,
  `fky_tipo_curso` int(11) NOT NULL,
  `fky_curso` int(11) NOT NULL,
  `fky_pregunta_evaluacion` int(11) NOT NULL,
  `res_eva_cur` char(1) NOT NULL,
  `obs_eva_cur` text NOT NULL,
  `est_eva_cur` char(1) NOT NULL,
  PRIMARY KEY (`cod_eva_cur`),
  KEY `fky_alumno` (`fky_alumno`),
  KEY `fky_tipo_curso` (`fky_tipo_curso`),
  KEY `fky_curso` (`fky_curso`),
  KEY `fky_pregunta_evaluacion` (`fky_pregunta_evaluacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiro`
--

CREATE TABLE IF NOT EXISTS `retiro` (
  `cod_ret` int(11) NOT NULL AUTO_INCREMENT,
  `fec_ret` date NOT NULL,
  `hor_ret` time NOT NULL,
  `fky_pago` int(11) NOT NULL,
  `mot_ret` varchar(50) NOT NULL,
  `mon_ret` float NOT NULL,
  `ide_ret` varchar(15) NOT NULL,
  `tit_ret` varchar(50) NOT NULL,
  `cue_ret` varchar(20) NOT NULL,
  `fky_banco` int(11) NOT NULL,
  `fpa_ret` date NOT NULL,
  `obs_ret` varchar(10) DEFAULT NULL,
  `est_ret` char(1) NOT NULL,
  PRIMARY KEY (`cod_ret`),
  KEY `fky_pago` (`fky_pago`),
  KEY `fky_banco` (`fky_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `cod_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rol` varchar(25) NOT NULL,
  `est_rol` char(1) NOT NULL,
  PRIMARY KEY (`cod_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `nom_rol`, `est_rol`) VALUES
(1, 'Personalizado', 'A'),
(12, 'Administrador', 'A'),
(13, 'Cobranza', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_curso`
--

CREATE TABLE IF NOT EXISTS `tipo_curso` (
  `cod_tip_cur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tip_cur` varchar(50) NOT NULL,
  `hor_tip_cur` int(11) NOT NULL,
  `cer_tip_cur` varchar(50) NOT NULL,
  `obj_tip_cur` varchar(10) NOT NULL,
  `min_tip_cur` int(11) NOT NULL,
  `max_tip_cur` int(11) NOT NULL,
  `ava_tip_cur` char(1) NOT NULL,
  `url_tip_cur` text,
  `fky_area` int(11) NOT NULL,
  `fky_empresa` int(11) NOT NULL,
  `est_tip_cur` char(1) NOT NULL,
  PRIMARY KEY (`cod_tip_cur`),
  KEY `fky_area` (`fky_area`),
  KEY `fky_empresa` (`fky_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE IF NOT EXISTS `tipo_movimiento` (
  `cod_tip_mov` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tip_mov` varchar(25) NOT NULL,
  `tip_tip_mov` char(1) NOT NULL,
  `est_tip_mov` char(1) NOT NULL,
  PRIMARY KEY (`cod_tip_mov`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`cod_tip_mov`, `nom_tip_mov`, `tip_tip_mov`, `est_tip_mov`) VALUES
(1, 'Pago de NÃ³mina Fija', 'E', 'A'),
(2, 'Pago a Instructores', 'E', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE IF NOT EXISTS `tipo_pago` (
  `cod_tip_pag` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tip_pag` varchar(25) NOT NULL,
  `est_tip_pag` char(1) NOT NULL,
  PRIMARY KEY (`cod_tip_pag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titular_factura`
--

CREATE TABLE IF NOT EXISTS `titular_factura` (
  `cod_tit` int(11) NOT NULL AUTO_INCREMENT,
  `rif_tit` varchar(15) NOT NULL,
  `nom_tit` varchar(80) NOT NULL,
  `ret_iva` char(1) NOT NULL,
  `ret_isl` char(1) NOT NULL,
  `tip_tit` char(1) NOT NULL,
  `est_tit` char(1) NOT NULL,
  PRIMARY KEY (`cod_tit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE IF NOT EXISTS `universidad` (
  `cod_uni` int(11) NOT NULL AUTO_INCREMENT,
  `nom_uni` varchar(25) NOT NULL,
  `est_uni` char(1) NOT NULL,
  PRIMARY KEY (`cod_uni`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`cod_uni`, `nom_uni`, `est_uni`) VALUES
(1, 'UNET', 'A'),
(2, 'ULA', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `log_usu` varchar(25) NOT NULL,
  `nom_usu` varchar(50) NOT NULL,
  `ape_usu` varchar(50) NOT NULL,
  `ema_usu` varchar(80) NOT NULL,
  `cla_usu` varchar(32) NOT NULL,
  `tok_per` varchar(32) NOT NULL,
  `fky_rol` int(11) NOT NULL,
  `est_usu` char(1) NOT NULL,
  PRIMARY KEY (`cod_usu`),
  UNIQUE KEY `ema_usu` (`ema_usu`),
  KEY `fky_rol` (`fky_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `log_usu`, `nom_usu`, `ape_usu`, `ema_usu`, `cla_usu`, `tok_per`, `fky_rol`, `est_usu`) VALUES
(1, 'pparra', 'Pedro', 'Parra', 'pedro.parra82@gmail.com', 'c6cc8094c2dc07b700ffcc36d64e2138', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'A'),
(2, 'aorduno', 'eduardo.angel42@gmail.com', 'OrduÃ±o', 'eduardo.angel42@gmail.com', '202cb962ac59075b964b07152d234b70', '', 13, 'A'),
(3, 'imaldonado', 'maldonado@gmail.com', 'Maldonado', 'maldonado@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 12, 'A'),
(4, 'jperez', 'Jose Alejandro', 'Perez', 'joseperez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 12, 'A'),
(5, 'lgonzalez', 'Luis', 'GonzÃ¡lez', 'luisgonzalez@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 12, 'A');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`fky_pais`) REFERENCES `pais` (`cod_pai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`fky_universidad`) REFERENCES `universidad` (`cod_uni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`fky_curso`) REFERENCES `curso` (`cod_cur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`fky_alumno`) REFERENCES `alumno` (`cod_alu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `auditoria_ibfk_1` FOREIGN KEY (`fky_usuario`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD CONSTRAINT `certificado_ibfk_1` FOREIGN KEY (`fky_inscripcion`) REFERENCES `inscripcion` (`cod_ins`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `contenido_por_curso`
--
ALTER TABLE `contenido_por_curso`
  ADD CONSTRAINT `contenido_por_curso_ibfk_1` FOREIGN KEY (`fky_tipo_curso`) REFERENCES `tipo_curso` (`cod_tip_cur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `contenido_por_curso_ibfk_2` FOREIGN KEY (`fky_contenido`) REFERENCES `contenido` (`cod_con`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`fky_banco`) REFERENCES `banco` (`cod_ban`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cuenta_ibfk_2` FOREIGN KEY (`fky_empresa`) REFERENCES `empresa` (`cod_emp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`fky_tipo_curso`) REFERENCES `tipo_curso` (`cod_tip_cur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_2` FOREIGN KEY (`fky_instructor`) REFERENCES `instructor` (`cod_ins`) ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_ibfk_3` FOREIGN KEY (`fky_modalidad`) REFERENCES `modalidad` (`cod_mod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`fky_iva`) REFERENCES `iva` (`cod_iva`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`fky_titular_factura`) REFERENCES `titular_factura` (`cod_tit`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_detalle`
--
ALTER TABLE `factura_detalle`
  ADD CONSTRAINT `factura_detalle_ibfk_1` FOREIGN KEY (`fky_factura`) REFERENCES `factura` (`num_fac`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_detalle_ibfk_2` FOREIGN KEY (`fky_curso`) REFERENCES `curso` (`cod_cur`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`fky_alu`) REFERENCES `alumno` (`ide_alu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_ibfk_2` FOREIGN KEY (`fky_cur`) REFERENCES `curso` (`cod_cur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripcion_ibfk_3` FOREIGN KEY (`fky_factura`) REFERENCES `factura` (`num_fac`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opcion`
--
ALTER TABLE `opcion`
  ADD CONSTRAINT `opcion_ibfk_1` FOREIGN KEY (`fky_modulo`) REFERENCES `modulo` (`cod_mod`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `opcion_rol`
--
ALTER TABLE `opcion_rol`
  ADD CONSTRAINT `opcion_rol_ibfk_1` FOREIGN KEY (`fky_opcion`) REFERENCES `opcion` (`cod_opc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `opcion_rol_ibfk_2` FOREIGN KEY (`fky_rol`) REFERENCES `rol` (`cod_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`fky_curso`) REFERENCES `curso` (`cod_cur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`fky_alumno`) REFERENCES `alumno` (`ide_alu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`fky_proveedor`) REFERENCES `proveedor` (`cod_pro`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_4` FOREIGN KEY (`fky_banco_origen`) REFERENCES `banco` (`cod_ban`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_5` FOREIGN KEY (`fky_banco_destino`) REFERENCES `banco` (`cod_ban`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_6` FOREIGN KEY (`fky_tipo_pago`) REFERENCES `tipo_pago` (`cod_tip_pag`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_7` FOREIGN KEY (`fky_inscripcion`) REFERENCES `inscripcion` (`cod_ins`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_8` FOREIGN KEY (`fky_tipo_movimiento`) REFERENCES `tipo_movimiento` (`cod_tip_mov`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`fky_opcion`) REFERENCES `opcion` (`cod_opc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`fky_usuario`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta_evaluacion_curso`
--
ALTER TABLE `pregunta_evaluacion_curso`
  ADD CONSTRAINT `pregunta_evaluacion_curso_ibfk_1` FOREIGN KEY (`fky_tipo_curso`) REFERENCES `tipo_curso` (`cod_tip_cur`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta_quiz`
--
ALTER TABLE `pregunta_quiz`
  ADD CONSTRAINT `pregunta_quiz_ibfk_1` FOREIGN KEY (`fky_quiz`) REFERENCES `quiz` (`cod_qui`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pregunta_quiz_ibfk_2` FOREIGN KEY (`fky_contenido`) REFERENCES `contenido` (`cod_con`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pregunta_quiz_ibfk_3` FOREIGN KEY (`fky_tipo_curso`) REFERENCES `tipo_curso` (`cod_tip_cur`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `requisito_por_curso`
--
ALTER TABLE `requisito_por_curso`
  ADD CONSTRAINT `requisito_por_curso_ibfk_1` FOREIGN KEY (`fky_requisito`) REFERENCES `requisito` (`cod_req`) ON UPDATE CASCADE,
  ADD CONSTRAINT `requisito_por_curso_ibfk_2` FOREIGN KEY (`fky_tipo_curso`) REFERENCES `tipo_curso` (`cod_tip_cur`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta_evaluacion_curso`
--
ALTER TABLE `respuesta_evaluacion_curso`
  ADD CONSTRAINT `respuesta_evaluacion_curso_ibfk_1` FOREIGN KEY (`fky_alumno`) REFERENCES `alumno` (`cod_alu`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_evaluacion_curso_ibfk_2` FOREIGN KEY (`fky_tipo_curso`) REFERENCES `tipo_curso` (`cod_tip_cur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_evaluacion_curso_ibfk_3` FOREIGN KEY (`fky_curso`) REFERENCES `curso` (`cod_cur`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_evaluacion_curso_ibfk_4` FOREIGN KEY (`fky_pregunta_evaluacion`) REFERENCES `pregunta_evaluacion_curso` (`cod_pre_eva`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `retiro`
--
ALTER TABLE `retiro`
  ADD CONSTRAINT `retiro_ibfk_1` FOREIGN KEY (`fky_pago`) REFERENCES `pago` (`cod_pag`) ON UPDATE CASCADE,
  ADD CONSTRAINT `retiro_ibfk_2` FOREIGN KEY (`fky_banco`) REFERENCES `banco` (`cod_ban`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_curso`
--
ALTER TABLE `tipo_curso`
  ADD CONSTRAINT `tipo_curso_ibfk_1` FOREIGN KEY (`fky_area`) REFERENCES `area` (`cod_are`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tipo_curso_ibfk_2` FOREIGN KEY (`fky_empresa`) REFERENCES `empresa` (`cod_emp`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`fky_rol`) REFERENCES `rol` (`cod_rol`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
