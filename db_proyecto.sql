-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2021 a las 20:21:50
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo_laboral`
--

CREATE TABLE `cargo_laboral` (
  `ID_CARGO_LABORAL` int(11) NOT NULL,
  `CARGO_LABORAL` varchar(100) NOT NULL,
  `DESCRIPCION_CARGO_LABORAL` text NOT NULL,
  `SALARIO_MESUAL_CARGO_LABORAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo_laboral`
--

INSERT INTO `cargo_laboral` (`ID_CARGO_LABORAL`, `CARGO_LABORAL`, `DESCRIPCION_CARGO_LABORAL`, `SALARIO_MESUAL_CARGO_LABORAL`) VALUES
(1, 'EMPLEADO', 'REGISTRO DE COMPRAS', 500),
(2, 'JEFE', 'CONTROL DE REGISTROS E INFRAESTRUCTURA', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_PERSONA_CLIENTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`ID_CLIENTE`, `ID_PERSONA_CLIENTE`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `NOMBRE_DEPARTAMENTO` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`ID_DEPARTAMENTO`, `NOMBRE_DEPARTAMENTO`) VALUES
(1, 'LA PAZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `FECHA_CONTRATACION` date NOT NULL,
  `HORAS_LABORALES` int(250) NOT NULL,
  `ID_CARGO_LABORAL_EMPLEADO` int(11) NOT NULL,
  `ID_SUCURSAL_EMPLEADO` int(11) NOT NULL,
  `ID_PERSONA_EMPLEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_EMPLEADO`, `FECHA_CONTRATACION`, `HORAS_LABORALES`, `ID_CARGO_LABORAL_EMPLEADO`, `ID_SUCURSAL_EMPLEADO`, `ID_PERSONA_EMPLEADO`) VALUES
(1, '2021-06-01', 18, 2, 1, 7),
(2, '2021-04-01', 16, 1, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_FACTURA` int(11) NOT NULL,
  `FECHA_FACTURA` date NOT NULL,
  `ID_SUCURSAL_FACTURA` int(11) NOT NULL,
  `ID_CLIENTE_FACTURA` int(11) NOT NULL,
  `ID_EMPLEADO_FACTURA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`ID_FACTURA`, `FECHA_FACTURA`, `ID_SUCURSAL_FACTURA`, `ID_CLIENTE_FACTURA`, `ID_EMPLEADO_FACTURA`) VALUES
(1, '2021-06-30', 1, 1, 2),
(2, '2021-07-01', 1, 2, 2),
(3, '2021-07-10', 1, 3, 2),
(4, '2021-07-20', 1, 4, 2),
(5, '2021-07-30', 1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_producto`
--

CREATE TABLE `factura_producto` (
  `ID_FACTURA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura_producto`
--

INSERT INTO `factura_producto` (`ID_FACTURA`, `ID_PRODUCTO`) VALUES
(2, 1),
(5, 2),
(1, 4),
(3, 17),
(4, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ID_PERSONA` int(11) NOT NULL,
  `NOMBRES` varchar(50) CHARACTER SET latin1 NOT NULL,
  `PRIMER_APELLIDO` varchar(50) CHARACTER SET latin1 NOT NULL,
  `SEGUNDO_APELLIDO` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `FECHA_NACIMENTO` date NOT NULL,
  `DIRECCION` text CHARACTER SET latin1 NOT NULL,
  `ID_DEPARTAMENTO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ID_PERSONA`, `NOMBRES`, `PRIMER_APELLIDO`, `SEGUNDO_APELLIDO`, `FECHA_NACIMENTO`, `DIRECCION`, `ID_DEPARTAMENTO`) VALUES
(1, 'PEPE', 'COLO COLO', 'PEREZ', '1990-12-01', 'OBRAJES', 1),
(2, 'JUANA', 'LOPEZ', 'RAMIREZ', '1991-06-30', 'MIRAFLORES', 1),
(3, 'ANA', 'MALDONADO', 'ZELEN', '1995-12-25', 'MIRAFLORES', 1),
(4, 'CARLOS', 'MARTINEZ', 'MARTINEZ', '2021-06-01', 'MIRAFLORES', 1),
(5, 'MARIA', 'MAMANI', 'MAMANI', '1995-06-01', 'OBRAJES', 1),
(6, 'PEDRO', 'PEREZ', 'LOPEZ', '1990-12-01', 'MIRAFLORES', 1),
(7, 'ADRIANA', 'VARGAS', 'RAMIREZ', '1990-06-01', 'OBRAJES', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_PRODUCTO` varchar(50) NOT NULL,
  `FECHA_ELABORACION` date NOT NULL,
  `FECHA_VENCIMIENTO` date NOT NULL,
  `COMPRA_PRODUCTO` float NOT NULL,
  `VENTA_PRODUCTO` float NOT NULL,
  `CANTIDAD_PRODUCTO` int(11) NOT NULL,
  `DESCRIPCION_PRODUCTO` varchar(50) NOT NULL,
  `ID_TIPO_PRODUCTO` int(11) NOT NULL,
  `ID_SUCURSAL_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_PRODUCTO`, `NOMBRE_PRODUCTO`, `FECHA_ELABORACION`, `FECHA_VENCIMIENTO`, `COMPRA_PRODUCTO`, `VENTA_PRODUCTO`, `CANTIDAD_PRODUCTO`, `DESCRIPCION_PRODUCTO`, `ID_TIPO_PRODUCTO`, `ID_SUCURSAL_PRODUCTO`) VALUES
(1, 'MANZANA', '2021-06-01', '2021-08-19', 2, 3, 100, 'FRUTAS', 1, 1),
(2, 'CREMA', '2021-06-01', '2021-08-19', 50, 70, 50, 'CREMA CORPORAL', 2, 1),
(3, 'REFRIGERADOR LG', '2021-06-01', '2021-10-19', 1000, 1500, 6, 'ELECTRODOMESTICO LG', 3, 1),
(4, 'BASURERO', '2021-10-01', '0000-00-00', 10, 20, 50, 'RECOLECTOR DE BASURA', 4, 1),
(5, 'HUESO PARA PERROS', '2021-01-01', '0000-00-00', 20, 30, 100, 'JUGUETE DE MASCOTA', 5, 1),
(6, 'PANTALON', '2021-01-01', '0000-00-00', 30, 45, 50, 'ROPA', 6, 1),
(7, 'ROPERO', '2021-02-10', '0000-00-00', 500, 650, 15, 'GUARDA ROPA', 7, 1),
(8, 'PLATANOS', '2021-06-30', '2021-07-31', 1, 2, 150, 'FRUTA', 1, 1),
(9, 'PERFUME', '2021-06-30', '2021-09-30', 70, 90, 75, 'PERFUME YANBAL', 2, 1),
(10, 'LAVADORA LG', '2021-06-12', '0000-00-00', 1500, 1800, 15, 'ELECTRODOMESTICO LG', 3, 1),
(11, 'ESCOBA', '2021-06-15', '0000-00-00', 10, 15, 50, 'ESCOBA RECOLECTORA DE BASURA', 4, 1),
(12, 'ROBOT ESPACIAL', '2021-06-27', '0000-00-00', 10, 20, 50, 'JUGUETE PARA NIIÑOS', 5, 1),
(13, 'CANGURO', '2021-05-31', '0000-00-00', 100, 150, 15, 'ROPA', 6, 1),
(14, 'ESCRITORIO', '2021-06-30', '0000-00-00', 600, 700, 15, 'ESCRITORIO', 7, 1),
(15, 'PEPSI', '2021-05-31', '2021-09-30', 10, 12, 500, 'GASEOSA', 1, 1),
(16, 'MICROONDAS LG', '2021-06-01', '2021-09-30', 1100, 1500, 15, 'ELECTRODOMESTICO LG', 3, 1),
(17, 'SURF', '2021-06-15', '0000-00-00', 20, 30, 200, 'DETERGENTE EN POLVO', 4, 1),
(18, 'CAMIONSITO', '2021-06-01', '0000-00-00', 100, 150, 50, 'CAMION DE JUGUETE', 5, 1),
(19, 'CAMISA', '2021-06-01', '0000-00-00', 90, 110, 30, 'ROPA', 6, 1),
(20, 'MESA DE MADERA', '2021-01-01', '0000-00-00', 250, 300, 10, 'MESA DE SALA', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_PROVEEDOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_proveedor`
--

INSERT INTO `producto_proveedor` (`ID_PRODUCTO`, `ID_PROVEEDOR`) VALUES
(4, 2),
(11, 2),
(15, 5),
(1, 6),
(8, 6),
(7, 7),
(14, 7),
(20, 7),
(6, 8),
(13, 8),
(19, 8),
(5, 9),
(18, 9),
(2, 10),
(9, 10),
(12, 10),
(17, 10),
(3, 11),
(10, 11),
(16, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID_PROVEEDOR` int(11) NOT NULL,
  `NOMBRE_PROVEEDOR` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID_PROVEEDOR`, `NOMBRE_PROVEEDOR`) VALUES
(1, 'ASR SISTEMAS DE SEGURIDAD'),
(2, 'ATLATIDA MUEBLES & EQUIPAMIENTO'),
(3, 'EL CEIBO BOLIVIA'),
(4, 'ROSVANIA'),
(5, 'PIL ANDINA S.A.'),
(6, 'GRUPO VENADO'),
(7, 'MUEBLERIA COMODO RELAX'),
(8, 'ROPA BRASILERA BOLIVIA'),
(9, 'BOLIVIAMAR'),
(10, 'NIVEA BOLIVIA'),
(11, 'D&P ELECTRODOMESTICOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_bd`
--

CREATE TABLE `rol_bd` (
  `ID_ROL_BD` int(11) NOT NULL,
  `DESCRIPCION_ROL_BD` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `ID_SUCURSAL` int(11) NOT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `ID_SUPERMERCADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`ID_SUCURSAL`, `DIRECCION`, `ID_DEPARTAMENTO`, `ID_SUPERMERCADO`) VALUES
(1, 'MIRAFLORES', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supermercado`
--

CREATE TABLE `supermercado` (
  `ID_SUPERMERCADO` int(11) NOT NULL,
  `NOMBRE` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `supermercado`
--

INSERT INTO `supermercado` (`ID_SUPERMERCADO`, `NOMBRE`) VALUES
(1, 'LAS BICHOTAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `ID_TIPO_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_TIPO_PRODUCTO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`ID_TIPO_PRODUCTO`, `NOMBRE_TIPO_PRODUCTO`) VALUES
(1, 'ALIMENTOS'),
(2, 'CUIDADO PERSONAL'),
(3, 'ELECTRODOMESTICOS'),
(4, 'BASICOS DEL HOGAR'),
(5, 'ENTRETENIMIENTO'),
(6, 'VESTIMENTA'),
(7, 'MUEBLERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `DESCRIPCION_TIPO_USUARIO` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOMBRE_USUARIO` varchar(50) CHARACTER SET latin1 NOT NULL,
  `CONTRASEÑA_USUARIO` varchar(100) CHARACTER SET latin1 NOT NULL,
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `ID_PERSONA_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol_bd`
--

CREATE TABLE `usuario_rol_bd` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_ROL_BD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo_laboral`
--
ALTER TABLE `cargo_laboral`
  ADD PRIMARY KEY (`ID_CARGO_LABORAL`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`),
  ADD KEY `ID_PERSONA_CLIENTE` (`ID_PERSONA_CLIENTE`) USING BTREE;

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_EMPLEADO`),
  ADD KEY `ID_CARGO_LABORAL_EMPLEADO` (`ID_CARGO_LABORAL_EMPLEADO`) USING BTREE,
  ADD KEY `ID_PERSONA_EMPLEADO` (`ID_PERSONA_EMPLEADO`) USING BTREE,
  ADD KEY `ID_SUCURSAL_EMPLEADO` (`ID_SUCURSAL_EMPLEADO`) USING BTREE;

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `ID_SUCURSAL_FACTURA` (`ID_SUCURSAL_FACTURA`) USING BTREE,
  ADD KEY `ID_CLIENTE_FACTURA` (`ID_CLIENTE_FACTURA`) USING BTREE,
  ADD KEY `ID_EMPLEADO_FACTURA` (`ID_EMPLEADO_FACTURA`) USING BTREE;

--
-- Indices de la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD UNIQUE KEY `ID_FACTURA` (`ID_FACTURA`),
  ADD KEY `ID_PRODUCTO` (`ID_PRODUCTO`) USING BTREE;

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ID_PERSONA`),
  ADD KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`) USING BTREE;

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `ID_TIPO_PRODUCTO` (`ID_TIPO_PRODUCTO`) USING BTREE,
  ADD KEY `ID_SUCURSAL_PRODUCTO` (`ID_SUCURSAL_PRODUCTO`) USING BTREE;

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD UNIQUE KEY `ID_PRODUCTO` (`ID_PRODUCTO`),
  ADD KEY `ID_PROVEEDOR` (`ID_PROVEEDOR`) USING BTREE;

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID_PROVEEDOR`);

--
-- Indices de la tabla `rol_bd`
--
ALTER TABLE `rol_bd`
  ADD PRIMARY KEY (`ID_ROL_BD`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`ID_SUCURSAL`),
  ADD UNIQUE KEY `ID_SUPERMERCADO` (`ID_SUPERMERCADO`) USING BTREE,
  ADD KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`) USING BTREE;

--
-- Indices de la tabla `supermercado`
--
ALTER TABLE `supermercado`
  ADD PRIMARY KEY (`ID_SUPERMERCADO`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`ID_TIPO_PRODUCTO`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_TIPO_USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `ID_TIPO_USUARIO` (`ID_TIPO_USUARIO`) USING BTREE,
  ADD KEY `ID_PERSONA_USUARIO` (`ID_PERSONA_USUARIO`) USING BTREE;

--
-- Indices de la tabla `usuario_rol_bd`
--
ALTER TABLE `usuario_rol_bd`
  ADD KEY `ID_USUARIO` (`ID_USUARIO`) USING BTREE,
  ADD KEY `ID_ROL_BD` (`ID_ROL_BD`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `supermercado`
--
ALTER TABLE `supermercado`
  MODIFY `ID_SUPERMERCADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_PERSONA_CLIENTE`) REFERENCES `persona` (`ID_PERSONA`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`ID_PERSONA_EMPLEADO`) REFERENCES `persona` (`ID_PERSONA`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`ID_SUCURSAL_EMPLEADO`) REFERENCES `sucursal` (`ID_SUCURSAL`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`ID_CARGO_LABORAL_EMPLEADO`) REFERENCES `cargo_laboral` (`ID_CARGO_LABORAL`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_SUCURSAL_FACTURA`) REFERENCES `sucursal` (`ID_SUCURSAL`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`ID_CLIENTE_FACTURA`) REFERENCES `cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`ID_EMPLEADO_FACTURA`) REFERENCES `empleado` (`ID_EMPLEADO`);

--
-- Filtros para la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD CONSTRAINT `factura_producto_ibfk_1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `factura` (`ID_FACTURA`),
  ADD CONSTRAINT `factura_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_TIPO_PRODUCTO`) REFERENCES `tipo_producto` (`ID_TIPO_PRODUCTO`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_SUCURSAL_PRODUCTO`) REFERENCES `sucursal` (`ID_SUCURSAL`);

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`),
  ADD CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`),
  ADD CONSTRAINT `sucursal_ibfk_2` FOREIGN KEY (`ID_SUPERMERCADO`) REFERENCES `supermercado` (`ID_SUPERMERCADO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_PERSONA_USUARIO`) REFERENCES `persona` (`ID_PERSONA`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_TIPO_USUARIO`) REFERENCES `tipo_usuario` (`ID_TIPO_USUARIO`);

--
-- Filtros para la tabla `usuario_rol_bd`
--
ALTER TABLE `usuario_rol_bd`
  ADD CONSTRAINT `usuario_rol_bd_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `usuario_rol_bd_ibfk_2` FOREIGN KEY (`ID_ROL_BD`) REFERENCES `rol_bd` (`ID_ROL_BD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;