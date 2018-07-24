-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2018 a las 21:26:45
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sentiment`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `fecha` varchar(250) NOT NULL,
  `estado` varchar(250) DEFAULT 'Sin determinar',
  `sentimiento` varchar(250) DEFAULT 'Sin determinar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `autor`, `fecha`, `estado`, `sentimiento`) VALUES
(1, 'ï»¿QUIEN DICE >:V', '4 days ago,', 'Fer lol', 'Enojado', 'Negativo'),
(2, 'q ', '10 months ago,', 'Crispo Papu', 'Aburrido', 'Positivo'),
(3, 'Yo n saber que es Semana santa', '3 years ago,', 'Luis Lopez', 'Asustado', 'neutral'),
(4, 'Senota qe seles acabaron las ideas para hacer vs!!.... (Alex Torres)', '3 years ago,', 'Alex Torres', 'Enojado', 'neutral'),
(5, 'Senota qe seles acabaron las ideas para hacer vs!!.... (Alex Torres)', '3 years ago,', 'Alex Torres', 'Enojado', 'neutral'),
(6, 'que miedo', '4 years ago,', 'Carlos Gamba', 'Triste', 'Negativo'),
(7, 'o yeah', '4 years ago,', 'esteban burneo', 'Emocionado', 'Positivo'),
(8, 'ahahahahhahhaah', '5 years ago,', 'Ronny Pazmino', 'Feliz', 'Positivo'),
(9, 'son de ecuador', '5 years ago,', 'ignacio gomez', 'Feliz', 'Positivo'),
(10, 'esta promo es super bacaan jajajajaj', '5 years ago,', 'jose rivadeneira', 'Emocionado', 'Positivo'),
(11, 'esta promo es del putaaaaaaaaaaaas jajaja', '5 years ago,', 'jose rivadeneira', 'Emocionado', 'Positivo'),
(12, 'muy bueno deberian sacar una serie o algo pero por el momento estan buenos estos videos', '6 years ago,', 'Salomon Alcoba Trujillo', 'Emocionado', 'Positivo'),
(13, 'jajaja de nuevo ataca !!! seeeeeeeeh !!!!!!', '6 years ago,', 'Beltrham Manuel Barbabestias Ratoncio', 'Emocionado', 'Positivo'),
(14, 'EXCELENTE!!!!!!!', '6 years ago,', 'jaorhodes', 'Emocionado', 'Positivo'),
(15, 'me encanta la droga', '6 years ago,', 'Diego Monge', 'Feliz', 'Positivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corpus`
--

CREATE TABLE `corpus` (
  `id` int(11) NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `sentimiento` varchar(250) DEFAULT 'Sin Determinar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `corpus`
--

INSERT INTO `corpus` (`id`, `comentario`, `sentimiento`) VALUES
(1, 'Yo n saber que es Semana santa', 'neutral'),
(2, 'Yo n saber que es Semana santa', 'neutral'),
(3, 'Senota qe seles acabaron las ideas para hacer vs!!.... (Alex Torres)', 'neutral');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `corpus`
--
ALTER TABLE `corpus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `corpus`
--
ALTER TABLE `corpus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
