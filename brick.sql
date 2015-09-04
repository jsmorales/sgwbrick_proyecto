-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-09-2015 a las 23:08:32
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `brick`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `fkID_clase` int(11) DEFAULT NULL,
  `fkID_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`pkID`, `nombre`, `precio`, `marca`, `imagen`, `fkID_clase`, `fkID_tipo`) VALUES
(1, 'Bloque naranja hueco', 2500, 'Santafé', 'Bloque.png', NULL, NULL),
(2, 'Ladrillo Común', 3200, 'Ladrillo-S.A.D', NULL, NULL, NULL),
(3, 'Bloque Macizo', 2300, '', 'vga_hueco12x18x25.jpg.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_propiedad`
--

CREATE TABLE IF NOT EXISTS `material_propiedad` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `fkID_material` int(11) DEFAULT NULL,
  `fkID_propiedad` int(11) NOT NULL,
  `valor` varchar(200) NOT NULL,
  `fkID_uMedida` int(11) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `material_propiedad`
--

INSERT INTO `material_propiedad` (`pkID`, `fkID_material`, `fkID_propiedad`, `valor`, `fkID_uMedida`) VALUES
(1, 1, 1, '2.4', 1),
(2, 1, 2, '3.6', 1),
(4, 3, 1, '2.9', 1),
(5, 1, 3, '5.4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedad`
--

CREATE TABLE IF NOT EXISTS `propiedad` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `propiedad`
--

INSERT INTO `propiedad` (`pkID`, `nombre`) VALUES
(1, 'ancho'),
(2, 'alto'),
(3, 'largo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`pkID`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `numero_cc` int(11) NOT NULL,
  `fkID_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pkID`, `alias`, `pass`, `nombres`, `apellidos`, `numero_cc`, `fkID_tipo`) VALUES
(1, 'jsmorales', '8cb2237d0679ca88db6464eac60da96345513964', 'Johan', 'Morales', 1024524163, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `u_medida`
--

CREATE TABLE IF NOT EXISTS `u_medida` (
  `pkID` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `abreviatura` varchar(20) NOT NULL,
  PRIMARY KEY (`pkID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `u_medida`
--

INSERT INTO `u_medida` (`pkID`, `nombre`, `abreviatura`) VALUES
(1, 'centímetro', 'cm'),
(2, 'metro', 'm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
