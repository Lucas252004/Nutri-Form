-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2022 a las 02:17:35
-- Versión del servidor: 8.0.25
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idhistorial` int NOT NULL,
  `date` timestamp NOT NULL,
  `productos_idproductos` int NOT NULL,
  `users_idusers` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nutrientes`
--

CREATE TABLE `nutrientes` (
  `idnutrientes` int NOT NULL,
  `proteinas` varchar(45) DEFAULT NULL,
  `grasasTotales` varchar(45) DEFAULT NULL,
  `sodio` varchar(45) DEFAULT NULL,
  `calorias` varchar(45) DEFAULT NULL,
  `valorEnergetico` varchar(45) DEFAULT NULL,
  `carbohidratos` varchar(45) DEFAULT NULL,
  `productos_idproductos` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `aptoVegano` tinyint DEFAULT NULL,
  `aptoCeliaco` tinyint DEFAULT NULL,
  `nutrienteCritico` varchar(45) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `aptoVegetariano` varchar(45) DEFAULT NULL,
  `codigo_barra` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `nombre`, `aptoVegano`, `aptoCeliaco`, `nutrienteCritico`, `image`, `aptoVegetariano`, `codigo_barra`) VALUES
(1, 'Macucas', 0, 0, 'Carbohidratos', NULL, '1', 7790040133495);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idusers` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `googleHash` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idhistorial`,`productos_idproductos`,`users_idusers`),
  ADD KEY `fk_historial_productos1_idx` (`productos_idproductos`),
  ADD KEY `fk_historial_users1_idx` (`users_idusers`);

--
-- Indices de la tabla `nutrientes`
--
ALTER TABLE `nutrientes`
  ADD PRIMARY KEY (`idnutrientes`,`productos_idproductos`),
  ADD KEY `fk_nutrientes_productos_idx` (`productos_idproductos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`,`codigo_barra`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idhistorial` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nutrientes`
--
ALTER TABLE `nutrientes`
  MODIFY `idnutrientes` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_historial_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`),
  ADD CONSTRAINT `fk_historial_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`);

--
-- Filtros para la tabla `nutrientes`
--
ALTER TABLE `nutrientes`
  ADD CONSTRAINT `fk_nutrientes_productos` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
