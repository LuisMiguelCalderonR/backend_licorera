-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2024 a las 03:21:58
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
-- Base de datos: `basedatos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(150) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'entrada'),
(2, 'postre'),
(3, 'bebida'),
(20, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fo_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `fo_dpto`) VALUES
(1, 'bogota', 1),
(2, 'medellin', 2),
(3, 'cali', 3),
(4, 'girardot', 6),
(5, 'pereira', 4),
(6, 'bucaramanga', 7),
(7, 'pasto', 9),
(8, 'funza', 1),
(9, 'monteria', 14),
(10, 'rio negro', 2),
(11, 'cartagena', 13),
(12, 'neiva', 15),
(38, 'Prueba ddd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `tipo_identificacion` varchar(150) NOT NULL,
  `numero_identificacion` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `numero_contacto` varchar(150) NOT NULL,
  `fo_ciudad` int(11) NOT NULL,
  `fo_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `tipo_identificacion`, `numero_identificacion`, `correo`, `direccion`, `numero_contacto`, `fo_ciudad`, `fo_dpto`) VALUES
(1, 'juan pablo calderon reyes', 'c.c', '1014396286', 'juancs2017@gmail.com', 'calle 13 A # 18-225 T21-603', '301294868', 1, 1),
(2, 'delfina reyes reyes', 'c.c', '55163716', 'delmariareyes716@gmail.com', 'calle 13 A # 18-225 T21-603', '310476798', 1, 1),
(3, 'andres felipe sarmiento', 'c.c', '1014555555', 'andresf@gmail.com', 'suba prado', '3105555555', 3, 3),
(20, 'prueba 44', 'prueba444', '1', 'prueba44', 'prueba44', 'prueba44', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_dpto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_dpto`, `nombre`) VALUES
(1, 'cundinamarca'),
(2, 'antioquia'),
(3, 'valle del cauca'),
(4, 'risaralda'),
(5, 'cauca'),
(6, 'tolima'),
(7, 'santander'),
(8, 'quindio'),
(9, 'nariño'),
(10, 'monteria'),
(11, 'caldas'),
(12, 'boyaca'),
(13, 'bolivar'),
(14, 'cordoba'),
(15, 'huila'),
(17, 'prueba ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devoluciones` int(11) NOT NULL,
  `fecha_recoleccion` date NOT NULL,
  `orden_devolucion` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `fo_productos` int(11) NOT NULL,
  `fo_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`id_devoluciones`, `fecha_recoleccion`, `orden_devolucion`, `cantidad`, `total`, `fo_productos`, `fo_proveedor`) VALUES
(1, '2024-10-17', '0001', 20, 500000, 1, 1),
(7, '1997-12-03', 'prueba', 11111111, 0, 18, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `medio_pago` varchar(150) NOT NULL,
  `fo_ventas` int(11) NOT NULL,
  `fo_cliente` int(11) NOT NULL,
  `fo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `medio_pago`, `fo_ventas`, `fo_cliente`, `fo_usuario`) VALUES
(1, 'efectivo', 1, 2, 2),
(2, 'nequi', 2, 3, 2),
(4, 'daviplata', 1, 1, 1),
(6, 'pruebas', 8, 20, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fo_cliente` int(11) NOT NULL,
  `productos` longtext NOT NULL,
  `subtotal` double NOT NULL,
  `total` double NOT NULL,
  `fo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedidos`, `fecha`, `fo_cliente`, `productos`, `subtotal`, `total`, `fo_usuario`) VALUES
(1, '2024-10-23', 3, 'a:1:{i:0;a:5:{i:0;s:6:\"prueba\";i:1;s:6:\"prueba\";i:2;i:1111111;i:3;i:0;i:4;i:0;}}', 3000, 3000, 1),
(33, '2024-10-23', 2, 'a:4:{i:0;a:5:{i:0;s:12:\"poker 350 ml\";i:1;s:7:\"0000001\";i:2;i:3000;i:3;i:3;i:4;i:9000;}i:1;a:5:{i:0;s:19:\"costena lata 350 ml\";i:1;s:7:\"0000009\";i:2;i:2800;i:3;i:4;i:4;i:11200;}i:2;a:5:{i:0;s:16:\"costenita 350 ml\";i:1;s:7:\"0000010\";i:2;i:2600;i:3;i:5;i:4;i:13000;}i:3;a:5:{i:0;s:13:\"andina 350 ml\";i:1;s:7:\"0000003\";i:2;i:2800;i:3;i:6;i:4;i:16800;}}', 50000, 50000, 1),
(34, '2024-10-23', 3, 'a:1:{i:0;a:5:{i:0;s:19:\"costena lata 350 ml\";i:1;s:7:\"0000009\";i:2;i:2800;i:3;i:2;i:4;i:5600;}}', 5600, 5600, 1),
(38, '2024-10-23', 2, 'a:5:{i:0;a:5:{i:0;s:12:\"poker 350 ml\";i:1;s:7:\"0000001\";i:2;i:3000;i:3;i:1;i:4;i:3000;}i:1;a:5:{i:0;s:19:\"costena lata 350 ml\";i:1;s:7:\"0000009\";i:2;i:2800;i:3;i:1;i:4;i:2800;}i:2;a:5:{i:0;s:16:\"costenita 350 ml\";i:1;s:7:\"0000010\";i:2;i:2600;i:3;i:1;i:4;i:2600;}i:3;a:5:{i:0;s:15:\"gatorade 350 ml\";i:1;s:7:\"0000005\";i:2;i:4000;i:3;i:1;i:4;i:4000;}i:4;a:5:{i:0;s:14:\"poker 750ml ml\";i:1;s:7:\"0000007\";i:2;i:4500;i:3;i:1;i:4;i:4500;}}', 16900, 16900, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `precio_und` double NOT NULL,
  `precio_venta` double NOT NULL,
  `cantidad_stock` int(11) NOT NULL,
  `fo_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre`, `codigo`, `precio_und`, `precio_venta`, `cantidad_stock`, `fo_categoria`) VALUES
(1, 'poker 350 ml', '0000001', 2500, 3000, 150, 3),
(2, 'costena lata 350 ml', '0000009', 2200, 2800, 151, 3),
(3, 'costenita 350 ml', '0000010', 2200, 2600, 150, 3),
(4, 'andina 350 ml', '0000003', 2200, 2800, 150, 3),
(5, 'budweiser 350 ml', '0000004', 2200, 2800, 150, 3),
(6, 'gatorade 350 ml', '0000005', 3000, 4000, 80, 3),
(7, 'gaseosa 350 ml', '0000006', 200, 2500, 112, 3),
(8, 'poker 750ml ml', '0000007', 4000, 4500, 100, 3),
(17, 'tostaco picantee', '022256', 4500, 7000, 80, 2),
(18, 'prueba', 'prueba', 111, 1111111, 11111, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `nit` varchar(150) NOT NULL,
  `contacto` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `fo_ciudad` int(11) NOT NULL,
  `fo_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `nit`, `contacto`, `direccion`, `fo_ciudad`, `fo_dpto`) VALUES
(1, 'bavaria', '900039956 ', '2755505', 'Cra. 53a # 127 - 35', 1, 1),
(2, 'postobon S.A', '860900544', '6589999', 'calle 17a #49-50', 2, 2),
(7, 'prueba', 'prueba', 'prueba', 'prueba', 38, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reabastecimiento`
--

CREATE TABLE `reabastecimiento` (
  `id_reabastecimiento` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `orden_compra` varchar(150) NOT NULL,
  `cantidad_comprada` int(11) NOT NULL,
  `precio_total` int(11) NOT NULL,
  `fo_producto` int(11) NOT NULL,
  `fo_usuario` int(11) NOT NULL,
  `fo_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reabastecimiento`
--

INSERT INTO `reabastecimiento` (`id_reabastecimiento`, `fecha`, `orden_compra`, `cantidad_comprada`, `precio_total`, `fo_producto`, `fo_usuario`, `fo_proveedor`) VALUES
(1, '2024-10-10', '000009', 200, 1500000, 1, 1, 1),
(5, '1997-03-12', 'prueba', 111, 111, 18, 17, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'bodeguero'),
(3, 'cajero'),
(7, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(150) NOT NULL,
  `numero_identificacion` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `contacto` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `fo_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `numero_identificacion`, `correo`, `contacto`, `direccion`, `clave`, `fo_tipo_usuario`) VALUES
(1, 'luis miguel calderon reyes', '1014287580', 'luicalderon886@gmail.com', '3104767124', 'calle 13 A # 18-225 T21-603', '1014287580', 1),
(2, 'jessica reyes', '1014300033', 'reyesjessica17andrea@gmail.com', '3012908437', 'calle 13 A # 18-225 T21-603', '1014300033', 3),
(3, 'nicolas sarmiento', '9970102', 'nico_2024@gmail.com', '3214568787', 'zipaquira vrda ', '9970102', 2),
(4, 'camilo soto', '1075896589', 'camilos@gmail.com', '310444777888', 'neiva-huila', '1075896589', 3),
(17, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numero_factura` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `fo_usuario` int(11) NOT NULL,
  `fo_cliente` int(11) NOT NULL,
  `fo_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `fecha`, `numero_factura`, `cantidad`, `total`, `fo_usuario`, `fo_cliente`, `fo_productos`) VALUES
(1, '2024-10-16', '00000001', 5, 10000, 2, 1, 7),
(2, '2024-10-31', '0000002', 30, 500000, 2, 3, 2),
(8, '1997-11-03', 'prueba', 11, 11, 17, 20, 18),
(9, '2024-10-10', 'prueba', 500000, 90258000, 1, 2, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fo_dpto` (`fo_dpto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fo_dpto` (`fo_ciudad`),
  ADD KEY `fo_dpto_2` (`fo_dpto`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_dpto`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devoluciones`),
  ADD KEY `fo_proveedor` (`fo_proveedor`),
  ADD KEY `fo_productos` (`fo_productos`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fo_usuario` (`fo_usuario`),
  ADD KEY `fo_cliente` (`fo_cliente`),
  ADD KEY `fo_ventas` (`fo_ventas`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`),
  ADD KEY `fo_cliente` (`fo_cliente`),
  ADD KEY `fo_usuario` (`fo_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`),
  ADD KEY `fo_categoria` (`fo_categoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `fo_dpto` (`fo_dpto`),
  ADD KEY `fo_ciudad` (`fo_ciudad`);

--
-- Indices de la tabla `reabastecimiento`
--
ALTER TABLE `reabastecimiento`
  ADD PRIMARY KEY (`id_reabastecimiento`),
  ADD KEY `fo_producto` (`fo_producto`),
  ADD KEY `fo_usuario` (`fo_usuario`),
  ADD KEY `fo_proveedor` (`fo_proveedor`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fo_tipo_usuario` (`fo_tipo_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `fo_productos` (`fo_productos`),
  ADD KEY `fo_cliente` (`fo_cliente`),
  ADD KEY `fo_usuario` (`fo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_dpto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id_devoluciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reabastecimiento`
--
ALTER TABLE `reabastecimiento`
  MODIFY `id_reabastecimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `fo_dpto` FOREIGN KEY (`fo_dpto`) REFERENCES `departamento` (`id_dpto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`fo_dpto`) REFERENCES `departamento` (`id_dpto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fo_ciudad` FOREIGN KEY (`fo_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `devoluciones_ibfk_1` FOREIGN KEY (`fo_productos`) REFERENCES `productos` (`id_productos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `devoluciones_ibfk_2` FOREIGN KEY (`fo_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fo_ventas` FOREIGN KEY (`fo_ventas`) REFERENCES `ventas` (`id_ventas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`fo_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`fo_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`fo_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`fo_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`fo_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`fo_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proveedor_ibfk_2` FOREIGN KEY (`fo_dpto`) REFERENCES `departamento` (`id_dpto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reabastecimiento`
--
ALTER TABLE `reabastecimiento`
  ADD CONSTRAINT `reabastecimiento_ibfk_1` FOREIGN KEY (`fo_producto`) REFERENCES `productos` (`id_productos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reabastecimiento_ibfk_2` FOREIGN KEY (`fo_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reabastecimiento_ibfk_3` FOREIGN KEY (`fo_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fo_tipo_usuario` FOREIGN KEY (`fo_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fo_cliente` FOREIGN KEY (`fo_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fo_producto` FOREIGN KEY (`fo_productos`) REFERENCES `productos` (`id_productos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fo_usuario` FOREIGN KEY (`fo_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
