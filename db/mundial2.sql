-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2018 at 08:00 AM
-- Server version: 5.5.59
-- PHP Version: 5.4.45-0+deb7u13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mundial2`
--

-- --------------------------------------------------------

--
-- Table structure for table `juegos`
--

CREATE TABLE IF NOT EXISTS `juegos` (
  `id_juego` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL,
  `grupo` text NOT NULL,
  `ResultadoA` int(11) NOT NULL,
  `ResultadoB` int(11) NOT NULL,
  PRIMARY KEY (`id_juego`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `juegos`
--

INSERT INTO `juegos` (`id_juego`, `fecha`, `hora`, `a`, `b`, `grupo`, `ResultadoA`, `ResultadoB`) VALUES
(1, '2018-06-14', '12:00:00', 26, 2, 'A', 0, 0),
(2, '2018-06-15', '09:00:00', 11, 32, 'A', 0, 0),
(3, '2018-06-15', '12:00:00', 17, 25, 'B', 0, 0),
(4, '2018-06-15', '15:00:00', 23, 12, 'B', 0, 0),
(5, '2018-06-16', '07:00:00', 13, 4, 'C', 0, 0),
(6, '2018-06-16', '10:00:00', 3, 15, 'D', 0, 0),
(7, '2018-06-16', '13:00:00', 21, 10, 'C', 0, 0),
(8, '2018-06-16', '16:00:00', 9, 19, 'D', 0, 0),
(9, '2018-06-17', '09:00:00', 8, 28, 'F', 0, 0),
(10, '2018-06-17', '12:00:00', 1, 18, 'F', 0, 0),
(11, '2018-06-17', '15:00:00', 6, 30, 'E', 0, 0),
(12, '2018-06-18', '09:00:00', 29, 24, 'F', 0, 0),
(13, '2018-06-18', '12:00:00', 5, 20, 'G', 0, 0),
(14, '2018-06-18', '15:00:00', 31, 14, 'G', 0, 0),
(15, '2018-06-19', '09:00:00', 7, 16, 'H', 0, 0),
(16, '2018-06-19', '12:00:00', 22, 27, 'H', 0, 0),
(17, '2018-06-19', '15:00:00', 26, 11, 'A', 0, 0),
(18, '2018-06-20', '09:00:00', 23, 17, 'B', 0, 0),
(19, '2018-06-20', '12:00:00', 32, 2, 'A', 0, 0),
(20, '2018-06-20', '15:00:00', 25, 12, 'B', 0, 0),
(21, '2018-06-21', '09:00:00', 10, 4, 'C', 0, 0),
(22, '2018-06-21', '12:00:00', 13, 21, 'C', 0, 0),
(23, '2018-06-21', '15:00:00', 3, 9, 'D', 0, 0),
(24, '2018-06-22', '09:00:00', 6, 8, 'E', 0, 0),
(25, '2018-06-22', '12:00:00', 19, 15, 'D', 0, 0),
(26, '2018-06-22', '15:00:00', 28, 30, 'E', 0, 0),
(27, '2018-06-23', '09:00:00', 5, 31, 'G', 0, 0),
(28, '2018-06-23', '12:00:00', 24, 18, 'F', 0, 0),
(29, '2018-06-23', '15:00:00', 1, 29, 'F', 0, 0),
(30, '2018-06-24', '09:00:00', 14, 20, 'G', 0, 0),
(31, '2018-06-24', '12:00:00', 16, 27, 'H', 0, 0),
(32, '2018-06-24', '15:00:00', 22, 7, 'H', 0, 0),
(33, '2018-06-25', '11:00:00', 32, 26, 'A', 0, 0),
(34, '2018-06-25', '11:00:00', 2, 11, 'A', 0, 0),
(35, '2018-06-25', '15:00:00', 12, 17, 'B', 0, 0),
(36, '2018-06-25', '15:00:00', 25, 23, 'B', 0, 0),
(37, '2018-06-26', '11:00:00', 4, 21, 'C', 0, 0),
(38, '2018-06-26', '11:00:00', 10, 13, 'C', 0, 0),
(39, '2018-06-26', '15:00:00', 19, 3, 'D', 0, 0),
(40, '2018-06-26', '15:00:00', 15, 9, 'D', 0, 0),
(41, '2018-06-27', '11:00:00', 24, 1, 'F', 0, 0),
(42, '2018-06-27', '11:00:00', 18, 29, 'F', 0, 0),
(43, '2018-06-27', '15:00:00', 28, 6, 'E', 0, 0),
(44, '2018-06-27', '15:00:00', 30, 8, 'E', 0, 0),
(45, '2018-06-28', '11:00:00', 16, 22, 'H', 0, 0),
(46, '2018-06-28', '11:00:00', 27, 7, 'H', 0, 0),
(47, '2018-06-28', '15:00:00', 20, 31, 'G', 0, 0),
(48, '2018-06-28', '15:00:00', 14, 5, 'G', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jugada`
--

CREATE TABLE IF NOT EXISTS `jugada` (
  `id_usuario` int(11) NOT NULL,
  `id_juego` int(11) NOT NULL,
  `ResultadoA` int(11) NOT NULL,
  `ResultadoB` int(11) NOT NULL,
  `ResultadoZ` int(11) NOT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0',
  `actualizacion` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jugada`
--

INSERT INTO `jugada` (`id_usuario`, `id_juego`, `ResultadoA`, `ResultadoB`, `ResultadoZ`, `puntos`, `actualizacion`) VALUES
(1, 1, 3, 5, 12, 0, '2018-May-Su'),
(1, 2, 3, 6, 12, 0, '2018-May-Su'),
(1, 3, 4, 3, 23, 0, '2018-May-Su'),
(1, 4, 5, 5, 100, 0, '2018-May-Su'),
(19, 1, 6, 4, 26, 0, '2018-May-Su'),
(19, 2, 9, 4, 11, 0, '2018-May-Su'),
(19, 3, 9, 9, 100, 0, '2018-May-Su'),
(19, 4, 10, 9, 23, 0, '2018-May-Su');

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(11) NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`id_pais`, `pais`) VALUES
(1, 'Alemania'),
(2, 'Arabia Saud'),
(3, 'Argentina'),
(4, 'Australia'),
(5, 'Bélgica'),
(6, 'Brasil'),
(7, 'Colombia'),
(8, 'Costa Rica'),
(9, 'Croacia'),
(10, 'Dinamarca'),
(11, 'Egipto'),
(12, 'España'),
(13, 'Francia'),
(14, 'Inglaterra'),
(15, 'Islandia'),
(16, 'Japón'),
(17, 'Marruecos'),
(18, 'México'),
(19, 'Nigeria'),
(20, 'Panamá'),
(21, 'Perú'),
(22, 'Polonia'),
(23, 'Portugal'),
(24, 'República d'),
(25, 'RI de Irán'),
(26, 'Rusia'),
(27, 'Senegal'),
(28, 'Serbia'),
(29, 'Suecia'),
(30, 'Suiza'),
(31, 'Túnez'),
(32, 'Uruguay');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `estado` varchar(12) NOT NULL,
  `time_login` varchar(20) NOT NULL,
  `time_logout` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `contrasena`, `nombre`, `apellido`, `email`, `estado`, `time_login`, `time_logout`) VALUES
(1, 'ggg', 'ggg', '', '', 'aa@gmail.com', 'desconectado', '2018-May-Sun 21:27:0', '2018-May-Sun 21:45:5'),
(14, 'Alejandra', '12345', '', '', 'akdjjd@gmail.com', 'desconectado', '2017-Aug-Thu 4:25:35', '2017-Aug-Thu 4:25:56'),
(15, 'Juan', 'juan123', '', '', 'juan@hotmail.com', 'desconectado', '2017-Jul-Thu 17:03:3', '2017-Jul-Thu 17:09:1'),
(19, 'test', 'test', '', '', 'aaa@aaa', 'desconectado', '2018-May-Mon 7:05:36', '2018-May-Mon 7:05:55'),
(20, 'lbrines', '12345', 'Leopoldo', 'Brines Riera', 'leo@gmail.com', '', '', ''),
(21, 'caribas', '1234', 'JOSE', 'CARIBAS', 'aaa@aaa.xxx', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
