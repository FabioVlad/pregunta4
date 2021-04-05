-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2021 a las 04:26:49
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mibase`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` varchar(10) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `codigo`, `nombre`) VALUES
('00FFF8', '00FFF8', 'cyan'),
('27FF01', '299E1F', 'verde'),
('FAFF00', 'FAFF00', 'amarillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `id` int(11) NOT NULL,
  `ci` varchar(20) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  `nota1` double NOT NULL,
  `nota2` double NOT NULL,
  `nota3` double NOT NULL,
  `notafinal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`id`, `ci`, `sigla`, `nota1`, `nota2`, `nota3`, `notafinal`) VALUES
(1, '1111', 'inf-324', 30, 30, 28, 88),
(2, '1212', 'inf-324', 28, 32, 15, 75),
(3, '2222', 'inf-324', 20, 22, 22, 64),
(4, '2345', 'inf-324', 25, 20, 20, 65),
(5, '3224', 'inf-324', 20, 20, 20, 60),
(6, '3232', 'inf-324', 10, 10, 20, 40),
(7, '4222', 'inf-324', 30, 15, 15, 60),
(8, '4345', 'inf-324', 30, 20, 1, 51),
(9, '5454', 'inf-324', 15, 15, 15, 45),
(10, '5455', 'inf-324', 25, 15, 10, 50),
(11, '6565', 'inf-324', 25, 20, 5, 50),
(12, '6666', 'inf-324', 22, 22, 26, 70),
(13, '7474', 'inf-324', 30, 10, 15, 55),
(14, '7777', 'inf-324', 25, 20, 10, 55),
(15, '8585', 'inf-324', 27, 27, 7, 61),
(16, '8888', 'inf-324', 30, 30, 30, 90),
(17, '9899', 'inf-324', 25, 30, 30, 85),
(18, '9999', 'inf-324', 25, 35, 35, 95),
(19, '3224', 'inf-111', 20, 10, 20, 50),
(20, '3232', 'inf-111', 10, 10, 10, 30),
(21, '4345', 'inf-111', 30, 20, 11, 61),
(22, '4222', 'inf-111', 30, 15, 25, 70),
(23, '5454', 'inf-111', 15, 15, 25, 55),
(24, '5455', 'inf-111', 25, 15, 20, 60),
(25, '6565', 'inf-111', 25, 20, 25, 70),
(26, '6666', 'inf-111', 22, 22, 36, 80),
(27, '7474', 'inf-111', 30, 10, 25, 65),
(28, '7777', 'inf-111', 25, 20, 5, 50),
(29, '8585', 'inf-111', 27, 27, 17, 71),
(30, '8888', 'inf-111', 30, 30, 20, 80),
(31, '9899', 'inf-111', 25, 30, 20, 75),
(32, '9999', 'inf-111', 25, 35, 25, 85),
(33, '1212', 'inf-111', 28, 32, 25, 85),
(34, '1111', 'inf-111', 30, 30, 38, 98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `paterno` varchar(20) NOT NULL,
  `materno` varchar(20) NOT NULL,
  `fecnac` varchar(20) NOT NULL,
  `departamento` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`, `materno`, `fecnac`, `departamento`) VALUES
('1111', 'metralla', 'yandel', 'extraterrestres', '03/10/1997', '09'),
('1212', 'fusil', 'pueblo', 'nocalla', '10/12/1993', '09'),
('2222', 'jimbo', 'perez', 'martir', '02/05/1992', '01'),
('2345', 'pablo', 'marquez', 'sanchez', '02/03/1994', '01'),
('3224', 'juan', 'perez', 'sanchez', '03/12/1993', '02'),
('3232', 'jorge', 'gimenez', 'martir', '03/10/1991', '02'),
('4222', 'carlos', 'mamani', 'swift', '03/10/1996', '03'),
('4345', 'pedro', 'mamani', 'tailor', '03/12/1995', '03'),
('5454', 'maria', 'perez', 'cundir', '22/09/1993', '04'),
('5455', 'leo', 'gimenez', 'rodriguez', '23/07/1991', '04'),
('6565', 'talia', 'tunder', 'sanchez', '20/11/1993', '05'),
('6666', 'yorch', 'motin', 'martir', '28/10/1991', '05'),
('7474', 'chimo', 'moscaera', 'sanchez', '03/10/1993', '06'),
('7777', 'yayi', 'moscaes', 'martir', '03/21/1991', '06'),
('8585', 'waca', 'perez', 'cesped', '10/09/1993', '07'),
('8888', 'toro', 'campo', 'martir', '12/11/1991', '07'),
('9899', 'talio', 'tunca', 'sanchez', '05/10/1999', '08'),
('9999', 'fercho', 'tunca', 'martir', '03/10/1991', '08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'docente'),
(2, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `usuario`, `contrasena`, `id_rol`, `id_color`) VALUES
('1234', 'fabio', '1234', 1, '27FF01'),
('2345', 'pablo', '2345', 2, '00FFF8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_color` (`id_color`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
