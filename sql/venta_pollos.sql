-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2024 a las 20:08:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `venta_pollos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contador`
--

CREATE TABLE `contador` (
  `id` int(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Cedula` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contador`
--

INSERT INTO `contador` (`id`, `Nombre`, `Apellido`, `Cedula`) VALUES
(0, 'Higuain', 'blanco', 1902);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `Fecha` date NOT NULL,
  `Invertido` int(11) NOT NULL,
  `Estado_Ingresos` varchar(20) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`Fecha`, `Invertido`, `Estado_Ingresos`, `Total`) VALUES
('2024-04-17', 20000, 'dasd', 2000),
('2024-04-18', 1233123, 'ganancias', 2132133),
('2024-04-18', 30000, 'ganancia', 20000),
('2024-04-22', 50000, 'invertido', 2000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliario`
--

CREATE TABLE `domiciliario` (
  `id` int(20) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Cedula` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `domiciliario`
--

INSERT INTO `domiciliario` (`id`, `Nombre`, `Apellido`, `Cedula`) VALUES
(0, 'Karim', 'benzema', 1407);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Nombre_cliente` varchar(20) NOT NULL,
  `Apellido_cliente` varchar(20) NOT NULL,
  `N_Pedido` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(20) NOT NULL,
  `Pedido` varchar(50) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Nombre_cliente`, `Apellido_cliente`, `N_Pedido`, `Telefono`, `Direccion`, `Pedido`, `Valor`, `Estado`) VALUES
('Pollo', 'Jon', 123, 315093, 'monteria', '20 pechugas y 3 huevos', 90000, 1),
('sebass', 'rrr', 123444, 2233, '223', 'pollos', 20000, 1),
('andres', 'rivero', 878, 232, 'los pericos ', '10 pechugas y 50 huevos', 20000, 0),
('julio', 'burgos', 232, 232, 'la pradera', '5 pechugas y 10 huevos', 100000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Presas` varchar(20) NOT NULL,
  `Huevos` varchar(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Presas`, `Huevos`, `id`) VALUES
('', 'dsadasd', 1),
('dasdaaaa', '', 2),
('50', '', 5),
('', '10', 6),
('50', '', 7),
('', '10', 8),
('', '10', 9),
('5', '', 10),
('', '20', 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contador`
--
ALTER TABLE `contador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
