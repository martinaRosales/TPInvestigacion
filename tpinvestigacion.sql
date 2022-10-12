-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2022 a las 00:37:59
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpinvestigacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(5) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `precio` float(7,2) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `precio`, `stock`, `tipo`) VALUES
(1, 'Figura Pikachu', 'Figura 3D de Pokemon, 10cm de alto', 1000.00, 20, '3D'),
(2, 'Figura Raichu', 'Figura 3D de Pokemon, 10cm de alto', 1000.00, 10, '3D'),
(3, 'Figura Pichu', 'Figura 3D de Pokemon, 10cm de alto', 1000.00, 25, '3D'),
(4, 'Figura Luffy', 'Figura 3D de One Piece, desde 15cm de alto', 2500.00, 5, '3D'),
(5, 'Figura Zoro', 'Figura 3D de One Piece, desde 15cm de alto', 2500.00, 3, '3D'),
(6, 'Figura Chopper', 'Figura 3D de One Piece, desde 15cm de alto', 2500.00, 1, '3D'),
(7, 'Llavero', 'Llavero de acrilico, diseños varios', 300.00, 100, 'Accesorio'),
(8, 'Stickers x 3', 'Pack de 3 stickers, diseños varios', 100.00, 1000, '2D'),
(9, 'Foto', 'Foto 10x15cm y apoya fotos, diseños varios.', 200.00, 100, '2D'),
(10, 'Cuernitos', 'Hebillas para cosplay.', 800.00, 5, 'Accesorio'),
(11, 'Hebillas Anya', 'Hebillas para cosplay.', 1000.00, 5, 'Accesorio'),
(12, 'Hebillas Evangelion', 'Hebillas para cosplay.', 1200.00, 5, 'Accesorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(20) NOT NULL,
  `contrasenia` varchar(20) DEFAULT NULL,
  `tipoCuenta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(5) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaproducto`
--

CREATE TABLE `ventaproducto` (
  `idVentaProducto` int(10) NOT NULL,
  `idVenta` int(5) NOT NULL,
  `idProducto` int(5) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`);

--
-- Indices de la tabla `ventaproducto`
--
ALTER TABLE `ventaproducto`
  ADD PRIMARY KEY (`idVentaProducto`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventaproducto`
--
ALTER TABLE `ventaproducto`
  ADD CONSTRAINT `ventaproducto_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`),
  ADD CONSTRAINT `ventaproducto_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
