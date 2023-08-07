-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2019 a las 03:53:09
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cdn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols_users`
--

CREATE TABLE `rols_users` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rols_users`
--

INSERT INTO `rols_users` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Colaborador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblarbitros`
--

CREATE TABLE `tblarbitros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblarbitros`
--

INSERT INTO `tblarbitros` (`id`, `nombre`, `apellido`) VALUES
(1, 'Casper', 'Blanda'),
(2, 'Tyreek', 'Doyle'),
(3, 'Jettie', 'Wolf'),
(4, 'Geoffrey', 'Armstrong'),
(5, 'Eladio', 'Weber'),
(6, 'Ferne', 'DuBuque'),
(7, 'Pietro', 'Witting'),
(8, 'Hank', 'Ward'),
(9, 'George', 'Schumm'),
(10, 'Ole', 'Braun'),
(11, 'Alberto', 'Rodriguez'),
(12, 'Melany', 'Hagenes'),
(13, 'Hazle', 'Lemke'),
(14, 'Patrick', 'Shanahan'),
(15, 'Deshawn', 'Shields'),
(16, 'Ryley', 'Larkin'),
(17, 'Schuyler', 'Quigley'),
(18, 'Robin', 'Doyle'),
(19, 'Dorthy', 'Becker'),
(20, 'Kadin', 'Hodkiewicz'),
(21, 'Easter', 'Carter'),
(22, 'Jeff', 'O\'Reilly'),
(23, 'Omari', 'McKenzie'),
(24, 'Zackery', 'Rippin'),
(25, 'Santino', 'Lemke'),
(26, 'Lemuel', 'Renner'),
(27, 'Lawrence', 'Dickens'),
(28, 'Austyn', 'Strosin'),
(29, 'Damon', 'Braun'),
(30, 'Saige', 'Carroll');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcampeonatos`
--

CREATE TABLE `tblcampeonatos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcampeonatos`
--

INSERT INTO `tblcampeonatos` (`Id`, `Nombre`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcanchas`
--

CREATE TABLE `tblcanchas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcanchas`
--

INSERT INTO `tblcanchas` (`id`, `nombre`, `observacion`) VALUES
(1, 'cancha 1', ''),
(2, 'cancha 2', ''),
(4, 'cancha 4', 'buen estado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblequipos`
--

CREATE TABLE `tblequipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `activo` bit(1) NOT NULL,
  `fecha_baja` date NOT NULL,
  `id_campeonato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblequipos`
--

INSERT INTO `tblequipos` (`id`, `nombre`, `fecha_inscripcion`, `activo`, `fecha_baja`, `id_campeonato`) VALUES
(1, 'Considine-Herman', '2017-07-09', b'1', '1983-09-06', 3),
(2, 'Labadie LLC', '1985-03-31', b'1', '2013-07-23', 2),
(3, 'Funk, Gutkowski and Boyle', '2010-01-24', b'1', '2012-04-09', 1),
(4, 'Huels, Bartell and Simonis', '1979-07-02', b'1', '1977-04-18', 2),
(5, 'Kovacek, Wuckert and Wisozk', '1973-12-14', b'1', '2012-04-08', 3),
(6, 'Kerluke, Wolf and Kuvalis', '1973-03-18', b'1', '2013-02-17', 2),
(7, 'Jacobi-Kihn', '1985-06-18', b'1', '1973-12-04', 2),
(8, 'Koch, Barton and Schamberger', '1999-07-26', b'1', '1994-05-18', 1),
(9, 'Runte, Grant and Wiegand', '2001-04-02', b'1', '2010-12-08', 1),
(10, 'Hammes, Green and Lemke', '2001-09-25', b'1', '1977-04-22', 3),
(11, 'Schiller, Mertz and Christiansen', '2005-04-18', b'1', '1975-12-06', 1),
(12, 'Ratke LLC', '2014-08-31', b'1', '1972-11-29', 3),
(13, 'Thiel Ltd', '1982-04-30', b'1', '1986-04-19', 3),
(14, 'Crona Inc', '1999-07-27', b'1', '1973-02-01', 3),
(15, 'Wiza and Sons', '1971-09-12', b'1', '1999-05-05', 3),
(16, 'Carroll Inc', '1983-03-28', b'1', '1988-07-16', 1),
(17, 'Hane-Adams', '1990-12-15', b'1', '2007-02-15', 1),
(18, 'Terry Ltd', '1979-05-14', b'1', '2016-08-19', 1),
(19, 'Legros LLC', '2012-04-30', b'1', '2002-05-12', 2),
(20, 'Parker Inc', '1982-05-07', b'1', '1978-10-15', 3),
(21, 'Gutmann-Wilkinson', '1978-11-20', b'1', '1993-07-11', 3),
(22, 'Jenkins-Deckow', '1976-08-17', b'1', '2000-03-27', 3),
(23, 'Considine, Fahey and Koch', '1980-11-10', b'1', '1974-07-16', 3),
(24, 'Hansen, Weimann and Conroy', '1973-12-09', b'1', '1983-10-22', 2),
(25, 'Reichel-Schulist', '2014-12-24', b'1', '2004-06-26', 3),
(26, 'Wyman, Ward and Balistreri', '1981-06-13', b'1', '1974-06-19', 3),
(27, 'Fay Ltd', '2009-04-22', b'1', '2003-02-23', 3),
(28, 'Sanford, Treutel and Lesch', '1981-03-06', b'1', '2014-07-25', 1),
(29, 'Murray Group', '1996-11-20', b'1', '1998-10-21', 3),
(30, 'Hane Inc', '1999-12-18', b'1', '1988-07-17', 1),
(31, 'Pouros Group', '1995-10-02', b'1', '1970-03-17', 1),
(32, 'Schoen-Considine', '1987-03-31', b'1', '1994-01-30', 3),
(33, 'Considine-Homenick', '2002-10-01', b'1', '2006-02-26', 1),
(34, 'Heidenreich, Windler and Kris', '2008-10-02', b'1', '1990-01-30', 2),
(35, 'Christiansen-Schoen', '1985-03-02', b'1', '2012-06-04', 1),
(36, 'Gislason, Hills and Haag', '1990-06-21', b'1', '1990-10-29', 3),
(37, 'Konopelski and Sons', '2016-03-30', b'1', '1990-03-07', 3),
(38, 'Veum-Stiedemann', '2000-06-14', b'1', '2012-08-27', 2),
(39, 'Reinger, Schaden and Rutherford', '1991-02-22', b'1', '1998-08-13', 3),
(40, 'Miller PLC', '2015-09-06', b'1', '2007-05-25', 1),
(41, 'Marvin Ltd', '1990-07-11', b'1', '1997-10-03', 1),
(42, 'Roberts-Hahn', '1976-08-27', b'1', '1989-07-27', 3),
(43, 'Simonis-Mraz', '1982-09-19', b'1', '1998-01-25', 3),
(44, 'Ratke, Dibbert and Mraz', '1980-09-06', b'1', '2005-04-15', 2),
(45, 'Runte-Von', '2011-01-25', b'1', '1995-03-14', 2),
(46, 'Waelchi-Crist', '1978-10-28', b'1', '1990-09-13', 1),
(47, 'Hintz-Orn', '1994-09-13', b'1', '2016-03-23', 2),
(48, 'Ziemann-Thompson', '2011-01-03', b'1', '1994-01-29', 1),
(49, 'Wisoky Ltd', '1984-05-14', b'1', '1971-03-18', 1),
(50, 'Greenfelder, Rippin and Mitchell', '1990-03-10', b'1', '1996-08-11', 2),
(51, 'D\'Amore, Mann and Towne', '2018-08-01', b'1', '1971-03-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfechasnew`
--

CREATE TABLE `tblfechasnew` (
  `id` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `id_equipo_loc` int(11) NOT NULL,
  `id_equipo_vis` int(11) NOT NULL,
  `id_campeonato` int(11) NOT NULL,
  `id_temporada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblfechasnew`
--

INSERT INTO `tblfechasnew` (`id`, `fecha`, `id_equipo_loc`, `id_equipo_vis`, `id_campeonato`, `id_temporada`) VALUES
(14, 1, 3, 2, 2, 2),
(15, 1, 4, 1, 2, 2),
(16, 2, 3, 4, 2, 2),
(17, 2, 1, 2, 2, 2),
(18, 3, 3, 1, 2, 2),
(19, 3, 2, 4, 2, 2),
(20, 4, 3, 2, 2, 2),
(21, 4, 4, 1, 2, 2),
(22, 5, 3, 4, 2, 2),
(23, 5, 1, 2, 2, 2),
(24, 6, 3, 1, 2, 2),
(25, 6, 2, 4, 2, 2),
(26, 7, 3, 2, 2, 2),
(27, 7, 4, 1, 2, 2),
(28, 8, 3, 4, 2, 2),
(29, 8, 1, 2, 2, 2),
(30, 9, 3, 1, 2, 2),
(31, 9, 2, 4, 2, 2),
(32, 10, 3, 2, 2, 2),
(33, 10, 4, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfechasold`
--

CREATE TABLE `tblfechasold` (
  `id` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `id_equipo_loc` int(11) NOT NULL,
  `id_equipo_vis` int(11) NOT NULL,
  `id_campeonato` int(11) NOT NULL DEFAULT 1,
  `id_tipo_l` int(11) NOT NULL,
  `id_tipo_v` int(11) NOT NULL,
  `goles_local` int(11) NOT NULL,
  `goles_visita` int(11) NOT NULL,
  `id_cancha` int(11) NOT NULL,
  `id_arbitro` int(11) NOT NULL,
  `id_arbitro_linia1` int(11) NOT NULL,
  `id_arbitro_linia2` int(11) NOT NULL,
  `horario` int(11) NOT NULL,
  `id_temporada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfixture`
--

CREATE TABLE `tblfixture` (
  `id` int(11) NOT NULL,
  `id_fecha` int(11) NOT NULL,
  `goles_local` int(11) DEFAULT NULL,
  `goles_visita` int(11) DEFAULT NULL,
  `id_cancha` int(11) NOT NULL,
  `id_arbitro` int(11) DEFAULT NULL,
  `id_arbitro_linea1` int(11) DEFAULT NULL,
  `id_arbitro_linea2` int(11) DEFAULT NULL,
  `horario` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblfixture`
--

INSERT INTO `tblfixture` (`id`, `id_fecha`, `goles_local`, `goles_visita`, `id_cancha`, `id_arbitro`, `id_arbitro_linea1`, `id_arbitro_linea2`, `horario`) VALUES
(59, 14, 1, 1, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(60, 15, 3, 3, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(61, 16, 1, 1, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(62, 17, 1, 1, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(63, 18, 2, 4, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(64, 19, 1, 2, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(65, 20, 1, 1, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(66, 21, 3, 3, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(67, 22, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(68, 23, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(69, 24, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(70, 25, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(71, 26, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(72, 27, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(73, 28, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(74, 29, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(75, 30, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(76, 31, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00'),
(77, 32, NULL, NULL, 4, 1, 15, 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgoleadores`
--

CREATE TABLE `tblgoleadores` (
  `Id` int(11) NOT NULL,
  `Id_Fecha` int(11) NOT NULL,
  `Id_jugador` int(11) NOT NULL,
  `Goles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbljugadores`
--

CREATE TABLE `tbljugadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbljugadores`
--

INSERT INTO `tbljugadores` (`id`, `nombre`, `apellido`, `fecha_nac`, `activo`) VALUES
(13, 'Dr. Beaulah Vandervort', 'Johnston', '1996-06-18', b'1'),
(14, 'Vida Barrows', 'Farrell', '1971-08-21', b'1'),
(15, 'Billie Kulas', 'Schaefer', '2005-07-31', b'1'),
(16, 'Jakayla Connelly', 'Strosin', '2002-02-18', b'1'),
(17, 'Clair Olson DDS', 'Herman', '1987-01-03', b'1'),
(18, 'Lewis Wisozk I', 'McGlynn', '1975-06-13', b'1'),
(19, 'Dejon Ullrich', 'Doyle', '1980-06-28', b'1'),
(20, 'Joel Windler', 'Hayes', '1974-02-12', b'1'),
(21, 'Lucius Ritchie III', 'Torphy', '2005-06-29', b'1'),
(22, 'Beatrice Kassulke DDS', 'Gusikowski', '2016-04-13', b'1'),
(23, 'Jovanny Ratke III', 'Dooley', '1982-12-25', b'1'),
(24, 'Dr. Makenna Dickens', 'Frami', '2000-05-23', b'1'),
(25, 'Mr. Mose Mills Jr.', 'Keebler', '2004-11-29', b'1'),
(26, 'Tom Emmerich', 'Renner', '1973-08-13', b'1'),
(27, 'Alexanne Metz MD', 'Reichel', '2014-02-02', b'1'),
(28, 'Michele Pouros', 'Von', '1973-02-07', b'1'),
(29, 'Zelma Wintheiser', 'Kreiger', '2001-12-23', b'1'),
(30, 'Prof. Ada Witting', 'Schuster', '1981-09-29', b'1'),
(31, 'Riley Macejkovic', 'Graham', '1990-05-09', b'1'),
(32, 'Ms. Virginia Franecki II', 'Berge', '2016-06-14', b'1'),
(33, 'Rosario Cruickshank', 'Gerhold', '1988-10-24', b'1'),
(34, 'Mrs. Bailee Schmitt DVM', 'Carter', '2008-04-26', b'1'),
(35, 'Mr. Enid DuBuque MD', 'Eichmann', '2016-02-23', b'1'),
(36, 'Name Muller', 'Beer', '1978-11-11', b'1'),
(37, 'Lindsay Boyle II', 'Bins', '2014-12-03', b'1'),
(38, 'Mrs. Heidi Kozey', 'Brown', '1996-12-19', b'1'),
(39, 'Mrs. Thora Streich', 'Erdman', '2013-09-08', b'1'),
(40, 'Anabel Kulas', 'Hodkiewicz', '2009-05-05', b'1'),
(41, 'Evans Fisher', 'Von', '1986-05-04', b'1'),
(42, 'Therese Fay', 'Davis', '1979-02-02', b'1'),
(43, 'Sydney Rowe', 'Wintheiser', '2011-07-05', b'1'),
(44, 'Ryleigh Harvey', 'Dickinson', '1984-12-01', b'1'),
(45, 'Jacey Ratke', 'Fadel', '1993-07-11', b'1'),
(46, 'Jakayla Berge', 'Morar', '1970-06-17', b'1'),
(47, 'Albin Ferry', 'Lakin', '2007-01-07', b'1'),
(48, 'Sophie Swaniawski', 'Schultz', '1987-09-27', b'1'),
(49, 'Lempi Mosciski', 'Denesik', '2003-03-24', b'1'),
(50, 'Prof. Naomi Stark', 'Weber', '1985-11-27', b'1'),
(51, 'Prof. Art Nicolas', 'White', '2018-05-12', b'1'),
(52, 'Dr. Everardo Schmitt', 'Farrell', '1990-12-30', b'1'),
(53, 'Hilton Beatty', 'Sauer', '1971-01-15', b'1'),
(54, 'Creola Zieme', 'Ziemann', '1976-04-30', b'1'),
(55, 'Miss Zoie Kulas Jr.', 'Larkin', '2000-06-16', b'1'),
(56, 'Nakia Frami PhD', 'Rosenbaum', '1986-09-10', b'1'),
(57, 'Kayla Lang', 'Oberbrunner', '2007-10-02', b'1'),
(58, 'Ms. Brionna Keeling Jr.', 'Prosacco', '2003-07-04', b'1'),
(59, 'Reggie Schroeder', 'Heller', '2011-04-17', b'1'),
(60, 'Alexandra Heathcote', 'Collier', '1998-10-18', b'1'),
(61, 'Arch Reichert IV', 'Beatty', '1987-06-30', b'1'),
(62, 'Hugo', 'Garcia', '1963-07-12', b'1'),
(67, 'Prueba', 'Prueba1', '2019-09-04', b'1'),
(68, 'Prueba', 'prueba', '2019-09-02', b'1'),
(69, 'Jose', 'Flores', '2019-09-03', b'1'),
(70, 'fd', 'sdfs', '2019-09-03', b'1'),
(71, 'Prueba2', 'prueba', '2017-09-04', b'1'),
(72, 'prueba3', 'prueba', '2019-09-04', b'1'),
(73, 'aaaaa', 'aaaa', '2015-09-02', b'1'),
(74, 'aaa', 'aaa', '2019-09-03', b'1'),
(75, 'a', 'a', '2019-09-02', b'1'),
(76, 'aa', 'a', '2015-09-07', b'1'),
(77, 'aaaaa', 'aa', '2019-08-26', b'1'),
(78, 'aaaaa', 'aa', '2019-09-09', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpocisiones`
--

CREATE TABLE `tblpocisiones` (
  `id` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `golF` int(11) NOT NULL,
  `golC` int(11) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblpocisiones`
--

INSERT INTO `tblpocisiones` (`id`, `id_equipo`, `golF`, `golC`, `puntos`) VALUES
(1, 1, 7, 5, 4),
(2, 2, 1, 1, 1),
(3, 3, 3, 5, 1),
(4, 4, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsanciones`
--

CREATE TABLE `tblsanciones` (
  `Id` int(11) NOT NULL,
  `Nro_fecha` int(11) NOT NULL,
  `Id_jugador` int(11) NOT NULL,
  `Tipo_sancion` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltemporada_campeonatos`
--

CREATE TABLE `tbltemporada_campeonatos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbltemporada_campeonatos`
--

INSERT INTO `tbltemporada_campeonatos` (`Id`, `Nombre`) VALUES
(1, 'Apertura'),
(2, 'Clausura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_localias`
--

CREATE TABLE `tbltipo_localias` (
  `Id` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbltipo_localias`
--

INSERT INTO `tbltipo_localias` (`Id`, `Tipo`) VALUES
(0, 'Apertura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo_sanciones`
--

CREATE TABLE `tbltipo_sanciones` (
  `Id` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `tarea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `todo`
--

INSERT INTO `todo` (`id`, `tarea`) VALUES
(18, 'ewreqwrewqfsdfsd'),
(19, 'Nueva'),
(20, 'dsgrgdfgd'),
(23, 'Fixture'),
(24, 'Fixture 1) pregunta si quiere nuevo fixture, si Borrar fecha fixture (table)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transjugadores_equipo`
--

CREATE TABLE `transjugadores_equipo` (
  `Id` int(11) NOT NULL,
  `Id_jugador` int(11) NOT NULL,
  `Id_equipo` int(11) NOT NULL,
  `Fecha_alta_jug` date NOT NULL,
  `Fecha_baja_jug` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transjugadores_equipo`
--

INSERT INTO `transjugadores_equipo` (`Id`, `Id_jugador`, `Id_equipo`, `Fecha_alta_jug`, `Fecha_baja_jug`) VALUES
(2, 13, 2, '0000-00-00', '0000-00-00'),
(4, 61, 23, '2019-09-10', '0000-00-00'),
(6, 27, 35, '2019-09-10', '0000-00-00'),
(10, 75, 2, '0000-00-00', '0000-00-00'),
(11, 76, 3, '0000-00-00', '0000-00-00'),
(12, 78, 1, '2019-09-27', '0000-00-00'),
(13, 13, 2, '2019-09-27', '0000-00-00'),
(14, 13, 2, '2019-09-27', '0000-00-00'),
(15, 75, 1, '2019-09-27', '0000-00-00'),
(17, 75, 2, '2019-09-27', '0000-00-00'),
(18, 75, 3, '2019-09-27', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `email`, `password`, `id_rol`) VALUES
(2, 'hola2dsfsdfsd', 'hola2@rma.com', '123456', 2),
(3, 'hola2', 'hola2@rma.com', '123456', 2),
(7, 'test', 'g@g.com', '123456', 1),
(8, 'test3', 'd@email.com', '123456', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rols_users`
--
ALTER TABLE `rols_users`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tblarbitros`
--
ALTER TABLE `tblarbitros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcampeonatos`
--
ALTER TABLE `tblcampeonatos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tblcanchas`
--
ALTER TABLE `tblcanchas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblequipos`
--
ALTER TABLE `tblequipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_campeonato` (`id_campeonato`);

--
-- Indices de la tabla `tblfechasnew`
--
ALTER TABLE `tblfechasnew`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipo_loc` (`id_equipo_loc`),
  ADD KEY `id_equipo_vis` (`id_equipo_vis`),
  ADD KEY `id_campeonato` (`id_campeonato`),
  ADD KEY `id_temporada` (`id_temporada`);

--
-- Indices de la tabla `tblfechasold`
--
ALTER TABLE `tblfechasold`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_campeonato` (`id_campeonato`),
  ADD KEY `id_equipo_loc` (`id_equipo_loc`),
  ADD KEY `id_equipo_vis` (`id_equipo_vis`),
  ADD KEY `id_tipo_v` (`id_tipo_v`),
  ADD KEY `id_tipo_l` (`id_tipo_l`),
  ADD KEY `id_cancha` (`id_cancha`),
  ADD KEY `id_arbitro` (`id_arbitro`),
  ADD KEY `id_arbitro_linia1` (`id_arbitro_linia1`),
  ADD KEY `id_arbitro_linia2` (`id_arbitro_linia2`),
  ADD KEY `id_temporada` (`id_temporada`);

--
-- Indices de la tabla `tblfixture`
--
ALTER TABLE `tblfixture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fecha` (`id_fecha`),
  ADD KEY `id_cancha` (`id_cancha`),
  ADD KEY `id_arbitro` (`id_arbitro`),
  ADD KEY `id_arbitro_linea1` (`id_arbitro_linea1`),
  ADD KEY `id_arbitro_linea2` (`id_arbitro_linea2`);

--
-- Indices de la tabla `tblgoleadores`
--
ALTER TABLE `tblgoleadores`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_tblGoleadores_transjugadoresequipos` (`Id_jugador`),
  ADD KEY `FK_tblgoleadores_tblfechas` (`Id_Fecha`);

--
-- Indices de la tabla `tbljugadores`
--
ALTER TABLE `tbljugadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblpocisiones`
--
ALTER TABLE `tblpocisiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `tblsanciones`
--
ALTER TABLE `tblsanciones`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_tblSanciones_tbltipo_sanciones` (`Tipo_sancion`),
  ADD KEY `FK_tblSanciones_transjugadoresequipos` (`Id_jugador`),
  ADD KEY `FK_tblsanciones_tblfechas` (`Nro_fecha`);

--
-- Indices de la tabla `tbltemporada_campeonatos`
--
ALTER TABLE `tbltemporada_campeonatos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbltipo_localias`
--
ALTER TABLE `tbltipo_localias`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbltipo_sanciones`
--
ALTER TABLE `tbltipo_sanciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transjugadores_equipo`
--
ALTER TABLE `transjugadores_equipo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_transJugadoresEquipos_tbljugadores` (`Id_jugador`),
  ADD KEY `FK_transJugadoresEquipos_tblequipos` (`Id_equipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usurios_ibfk_1` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblarbitros`
--
ALTER TABLE `tblarbitros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tblcanchas`
--
ALTER TABLE `tblcanchas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblequipos`
--
ALTER TABLE `tblequipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `tblfechasnew`
--
ALTER TABLE `tblfechasnew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tblfechasold`
--
ALTER TABLE `tblfechasold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- AUTO_INCREMENT de la tabla `tblfixture`
--
ALTER TABLE `tblfixture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `tbljugadores`
--
ALTER TABLE `tbljugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `tblpocisiones`
--
ALTER TABLE `tblpocisiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `transjugadores_equipo`
--
ALTER TABLE `transjugadores_equipo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblequipos`
--
ALTER TABLE `tblequipos`
  ADD CONSTRAINT `tblequipos_ibfk_1` FOREIGN KEY (`id_campeonato`) REFERENCES `tblcampeonatos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblfechasnew`
--
ALTER TABLE `tblfechasnew`
  ADD CONSTRAINT `tblfechasnew_ibfk_1` FOREIGN KEY (`id_temporada`) REFERENCES `tbltemporada_campeonatos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfechasnew_ibfk_2` FOREIGN KEY (`id_campeonato`) REFERENCES `tblcampeonatos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfechasnew_ibfk_3` FOREIGN KEY (`id_equipo_loc`) REFERENCES `tblequipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfechasnew_ibfk_4` FOREIGN KEY (`id_equipo_vis`) REFERENCES `tblequipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblfixture`
--
ALTER TABLE `tblfixture`
  ADD CONSTRAINT `tblfixture_ibfk_2` FOREIGN KEY (`id_cancha`) REFERENCES `tblcanchas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfixture_ibfk_3` FOREIGN KEY (`id_arbitro`) REFERENCES `tblarbitros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfixture_ibfk_4` FOREIGN KEY (`id_arbitro_linea1`) REFERENCES `tblarbitros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfixture_ibfk_5` FOREIGN KEY (`id_arbitro_linea2`) REFERENCES `tblarbitros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tblfixture_ibfk_6` FOREIGN KEY (`id_fecha`) REFERENCES `tblfechasnew` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblgoleadores`
--
ALTER TABLE `tblgoleadores`
  ADD CONSTRAINT `FK_tblGoleadores_transjugadoresequipos` FOREIGN KEY (`Id`) REFERENCES `transjugadores_equipo` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblpocisiones`
--
ALTER TABLE `tblpocisiones`
  ADD CONSTRAINT `FK_tblEquipos_tblEquipos` FOREIGN KEY (`id_equipo`) REFERENCES `tblequipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblsanciones`
--
ALTER TABLE `tblsanciones`
  ADD CONSTRAINT `FK_tblSanciones_tbltipo_sanciones` FOREIGN KEY (`Tipo_sancion`) REFERENCES `tbltipo_sanciones` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tblSancioness_transjugadoresequipos` FOREIGN KEY (`Id_jugador`) REFERENCES `transjugadores_equipo` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `transjugadores_equipo`
--
ALTER TABLE `transjugadores_equipo`
  ADD CONSTRAINT `FK_transJugadoresEquipos_tblequipos` FOREIGN KEY (`Id_equipo`) REFERENCES `tblequipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_transJugadoresEquipos_tbljugadores` FOREIGN KEY (`Id_jugador`) REFERENCES `tbljugadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `usurios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rols_users` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
