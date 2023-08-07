-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2019 a las 03:53:27
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
-- Base de datos: `cdn_cms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `todo` text NOT NULL,
  `obj` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `about`
--

INSERT INTO `about` (`id`, `todo`, `obj`) VALUES
(1, 'sdfsdgdfsgdfggfdgdfgdfgdfgd', 'rtyrtrtyrtyrtyr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `service_one` text NOT NULL,
  `service_two` text NOT NULL,
  `service_three` text NOT NULL,
  `service_four` text NOT NULL,
  `todo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `service_one`, `service_two`, `service_three`, `service_four`, `todo`) VALUES
(1, 'sasdadasdsa', 'CirculaciÃ³n interna para el traslado hasta cada una de las canchas con suelos de la misma calidad.', 'Divisiones entre las canchas de alambrado tejido romboidal de alta resistencia con postes de estructura de hierro y hormigÃ³n armado con una altura mÃ­nima de 3 (tres) mts. sobre el nivel del terreno, que llega a una altura de 4,5 mts. en las zona detrÃ¡s de los arcos.', 'Contamos con una plantilla de Ã¡rbitros de la Liga SalteÃ±a de Futbol y de las Ligas de GÃ¼emes y del Valle junto a Ã¡rbitros nacionales del torneo del Interior y Federal A y B.', 'Veedores Cumplen con la funciÃ³n de identificar a los jugadores previo a su ingreso a los campos de juego, verifica que cada uno firme la planilla de buena fe, entrega la pelota a los Ã¡rbitros y alcanza las pelotas cuando estas trasponen los lÃ­mites del campo de juego. Pelotas Proveemos de 2 pelotas cada cancha. Buffet Con una superficie cubierta con aire acondicionado, ventiladores, con servicio Directv por cable satelital con dos televisores de 42 pulgadas para disfrutar de los partidos tanto de la liga nacional o internacional. Wifi, sevicio de confiteria, bebidas, calefacciÃ³n, pantalla gigante.GalerÃ­a Anexa al buffet y los asadores contamos con una galerÃ­a semi cubierta de 300mts.2 para una mejor atenciÃ³n a los usuarios de los servicios mencionados. Asadores Kit de 16 asadores en una superficie cubierta de 125 mts.2 que incluye parrilla y mesada, con servicio de agua corriente y electricidad para cada mÃ³dulo, con la provisiÃ³n sin cargo de atizador, cepillo, palita, tenedor y agarra carbÃ³n junto a una fuente y una tabla de madera para servir asado. Samec Contamos con un servicio de asistencia mÃ©dica de emergencia y de urgencia en el lugar brindada por el SAMEC con una ambulancia de alta complejidad cardiolÃ³gica con una dotaciÃ³n de seis personas distribuidos en 3 (tres) puestos de trabajo a cargo de un mÃ©dico, enfermeros y paramÃ©dicos. Brinda la atenciÃ³n mÃ©dica de urgencia en el lugar, con provisiÃ³n de medicamentos y traslada al jugador hasta el centro mÃ©dico de elecciÃ³n del paciente. Seguro de Accidente Deportivo A cargo de Swiss Medical brinda una cobertura de hasta $15.000, por reintegro, por lesiones que sufra el jugador durante el desarrollo de la prÃ¡ctica deportiva. Seguro de Responsabilidad Civil A cargo de Swiss Medical y Sura brinda una cobertura de hasta $ 2.000.000 por muerte o incapacidad. Vestuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
