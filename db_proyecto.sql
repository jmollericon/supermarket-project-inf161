SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cargo_laboral
-- ----------------------------
DROP TABLE IF EXISTS `cargo_laboral`;
CREATE TABLE `cargo_laboral`  (
  `ID_CARGO_LABORAL` int(11) NOT NULL,
  `CARGO_LABORAL` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DESCRIPCION_CARGO_LABORAL` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SALARIO_MESUAL_CARGO_LABORAL` float NOT NULL,
  PRIMARY KEY (`ID_CARGO_LABORAL`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cargo_laboral
-- ----------------------------
INSERT INTO `cargo_laboral` VALUES (1, 'EMPLEADO', 'REGISTRO DE COMPRAS', 500);
INSERT INTO `cargo_laboral` VALUES (2, 'JEFE', 'CONTROL DE REGISTROS E INFRAESTRUCTURA', 1000);

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente`  (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERSONA_CLIENTE` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`) USING BTREE,
  INDEX `ID_PERSONA_CLIENTE`(`ID_PERSONA_CLIENTE`) USING BTREE,
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`ID_PERSONA_CLIENTE`) REFERENCES `persona` (`ID_PERSONA`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES (1, 1);
INSERT INTO `cliente` VALUES (2, 2);
INSERT INTO `cliente` VALUES (3, 3);
INSERT INTO `cliente` VALUES (4, 4);
INSERT INTO `cliente` VALUES (5, 5);

-- ----------------------------
-- Table structure for departamento
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento`  (
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `NOMBRE_DEPARTAMENTO` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_DEPARTAMENTO`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES (1, 'LA PAZ');

-- ----------------------------
-- Table structure for empleado
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado`  (
  `ID_EMPLEADO` int(11) NOT NULL,
  `FECHA_CONTRATACION` date NOT NULL,
  `HORAS_LABORALES` int(250) NOT NULL,
  `ID_CARGO_LABORAL_EMPLEADO` int(11) NOT NULL,
  `ID_SUCURSAL_EMPLEADO` int(11) NOT NULL,
  `ID_PERSONA_EMPLEADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_EMPLEADO`) USING BTREE,
  INDEX `ID_CARGO_LABORAL_EMPLEADO`(`ID_CARGO_LABORAL_EMPLEADO`) USING BTREE,
  INDEX `ID_PERSONA_EMPLEADO`(`ID_PERSONA_EMPLEADO`) USING BTREE,
  INDEX `ID_SUCURSAL_EMPLEADO`(`ID_SUCURSAL_EMPLEADO`) USING BTREE,
  CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`ID_SUCURSAL_EMPLEADO`) REFERENCES `sucursal` (`ID_SUCURSAL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`ID_CARGO_LABORAL_EMPLEADO`) REFERENCES `cargo_laboral` (`ID_CARGO_LABORAL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`ID_PERSONA_EMPLEADO`) REFERENCES `persona` (`ID_PERSONA`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES (1, '2021-06-01', 18, 2, 1, 7);
INSERT INTO `empleado` VALUES (2, '2021-04-01', 16, 1, 1, 6);

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura`  (
  `ID_FACTURA` int(11) NOT NULL,
  `FECHA_FACTURA` date NOT NULL,
  `ID_SUCURSAL_FACTURA` int(11) NOT NULL,
  `ID_CLIENTE_FACTURA` int(11) NOT NULL,
  `ID_EMPLEADO_FACTURA` int(11) NOT NULL,
  PRIMARY KEY (`ID_FACTURA`) USING BTREE,
  INDEX `ID_SUCURSAL_FACTURA`(`ID_SUCURSAL_FACTURA`) USING BTREE,
  INDEX `ID_CLIENTE_FACTURA`(`ID_CLIENTE_FACTURA`) USING BTREE,
  INDEX `ID_EMPLEADO_FACTURA`(`ID_EMPLEADO_FACTURA`) USING BTREE,
  CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ID_SUCURSAL_FACTURA`) REFERENCES `sucursal` (`ID_SUCURSAL`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`ID_EMPLEADO_FACTURA`) REFERENCES `empleado` (`ID_EMPLEADO`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`ID_CLIENTE_FACTURA`) REFERENCES `cliente` (`ID_CLIENTE`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of factura
-- ----------------------------
INSERT INTO `factura` VALUES (1, '2021-06-30', 1, 1, 2);
INSERT INTO `factura` VALUES (2, '2021-07-01', 1, 2, 2);
INSERT INTO `factura` VALUES (3, '2021-07-10', 1, 3, 2);
INSERT INTO `factura` VALUES (4, '2021-07-20', 1, 4, 2);
INSERT INTO `factura` VALUES (5, '2021-07-30', 1, 5, 1);

-- ----------------------------
-- Table structure for factura_producto
-- ----------------------------
DROP TABLE IF EXISTS `factura_producto`;
CREATE TABLE `factura_producto`  (
  `ID_FACTURA` int(11) NULL DEFAULT NULL,
  `ID_PRODUCTO` int(11) NULL DEFAULT NULL,
  UNIQUE INDEX `ID_FACTURA`(`ID_FACTURA`) USING BTREE,
  INDEX `ID_PRODUCTO`(`ID_PRODUCTO`) USING BTREE,
  CONSTRAINT `factura_producto_ibfk_1` FOREIGN KEY (`ID_FACTURA`) REFERENCES `factura` (`ID_FACTURA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `factura_producto_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of factura_producto
-- ----------------------------
INSERT INTO `factura_producto` VALUES (1, 4);
INSERT INTO `factura_producto` VALUES (2, 1);
INSERT INTO `factura_producto` VALUES (3, 17);
INSERT INTO `factura_producto` VALUES (4, 17);
INSERT INTO `factura_producto` VALUES (5, 2);
INSERT INTO `factura_producto` VALUES (NULL, NULL);
INSERT INTO `factura_producto` VALUES (NULL, NULL);

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona`  (
  `ID_PERSONA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRES` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `PRIMER_APELLIDO` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `SEGUNDO_APELLIDO` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `FECHA_NACIMENTO` date NULL DEFAULT NULL,
  `DIRECCION` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `ID_DEPARTAMENTO` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`ID_PERSONA`) USING BTREE,
  INDEX `ID_DEPARTAMENTO`(`ID_DEPARTAMENTO`) USING BTREE,
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES (1, 'PEPE', 'COLO COLO', 'PEREZ', '1990-12-01', 'OBRAJES', 1);
INSERT INTO `persona` VALUES (2, 'JUANA', 'LOPEZ', 'RAMIREZ', '1991-06-30', 'MIRAFLORES', 1);
INSERT INTO `persona` VALUES (3, 'ANA', 'MALDONADO', 'ZELEN', '1995-12-25', 'MIRAFLORES', 1);
INSERT INTO `persona` VALUES (4, 'CARLOS', 'MARTINEZ', 'MARTINEZ', '2021-06-01', 'MIRAFLORES', 1);
INSERT INTO `persona` VALUES (5, 'MARIA', 'MAMANI', 'MAMANI', '1995-06-01', 'OBRAJES', 1);
INSERT INTO `persona` VALUES (6, 'PEDRO', 'PEREZ', 'LOPEZ', '1990-12-01', 'MIRAFLORES', 1);
INSERT INTO `persona` VALUES (7, 'ADRIANA', 'VARGAS', 'RAMIREZ', '1990-06-01', 'OBRAJES', 1);
INSERT INTO `persona` VALUES (24, 'Cliente', 'PAterno', 'Materno', '2021-06-14', NULL, 1);
INSERT INTO `persona` VALUES (25, 'Administrador', '-', '-', '1990-01-01', '-', 1);

-- ----------------------------
-- Table structure for producto
-- ----------------------------
DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto`  (
  `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_PRODUCTO` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FECHA_ELABORACION` date NOT NULL,
  `FECHA_VENCIMIENTO` date NOT NULL,
  `COMPRA_PRODUCTO` float NOT NULL,
  `VENTA_PRODUCTO` float NOT NULL,
  `CANTIDAD_PRODUCTO` int(11) NOT NULL,
  `DESCRIPCION_PRODUCTO` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_TIPO_PRODUCTO` int(11) NOT NULL,
  `ID_SUCURSAL_PRODUCTO` int(11) NOT NULL,
  PRIMARY KEY (`ID_PRODUCTO`) USING BTREE,
  INDEX `ID_TIPO_PRODUCTO`(`ID_TIPO_PRODUCTO`) USING BTREE,
  INDEX `ID_SUCURSAL_PRODUCTO`(`ID_SUCURSAL_PRODUCTO`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto
-- ----------------------------
INSERT INTO `producto` VALUES (1, 'MANZANA', '2021-06-01', '2021-08-19', 2, 3, 100, 'FRUTAS', 1, 1);
INSERT INTO `producto` VALUES (2, 'CREMA', '2021-06-01', '2021-08-19', 50, 70, 50, 'CREMA CORPORAL', 2, 1);
INSERT INTO `producto` VALUES (3, 'REFRIGERADOR LG', '2021-06-01', '2021-10-19', 1000, 1500, 6, 'ELECTRODOMESTICO LG', 3, 1);
INSERT INTO `producto` VALUES (4, 'BASURERO', '2021-10-01', '0000-00-00', 10, 20, 50, 'RECOLECTOR DE BASURA', 4, 1);
INSERT INTO `producto` VALUES (5, 'HUESO PARA PERROS', '2021-01-01', '0000-00-00', 20, 30, 100, 'JUGUETE DE MASCOTA', 5, 1);
INSERT INTO `producto` VALUES (6, 'PANTALON', '2021-01-01', '0000-00-00', 30, 45, 50, 'ROPA', 6, 1);
INSERT INTO `producto` VALUES (7, 'ROPERO', '2021-02-10', '0000-00-00', 500, 650, 15, 'GUARDA ROPA', 7, 1);
INSERT INTO `producto` VALUES (8, 'PLATANOS', '2021-06-30', '2021-07-31', 1, 2, 150, 'FRUTA', 1, 1);
INSERT INTO `producto` VALUES (9, 'PERFUME', '2021-06-30', '2021-09-30', 70, 90, 75, 'PERFUME YANBAL', 2, 1);
INSERT INTO `producto` VALUES (10, 'LAVADORA LG', '2021-06-12', '0000-00-00', 1500, 1800, 15, 'ELECTRODOMESTICO LG', 3, 1);
INSERT INTO `producto` VALUES (11, 'ESCOBA', '2021-06-15', '0000-00-00', 10, 15, 50, 'ESCOBA RECOLECTORA DE BASURA', 4, 1);
INSERT INTO `producto` VALUES (12, 'ROBOT ESPACIAL', '2021-06-27', '0000-00-00', 10, 20, 50, 'JUGUETE PARA NIIÑOS', 5, 1);
INSERT INTO `producto` VALUES (13, 'CANGURO', '2021-05-31', '0000-00-00', 100, 150, 15, 'ROPA', 6, 1);
INSERT INTO `producto` VALUES (14, 'ESCRITORIO', '2021-06-30', '0000-00-00', 600, 700, 15, 'ESCRITORIO', 7, 1);
INSERT INTO `producto` VALUES (15, 'PEPSI', '2021-05-31', '2021-09-30', 10, 12, 500, 'GASEOSA', 1, 1);
INSERT INTO `producto` VALUES (16, 'MICROONDAS LG', '2021-06-01', '2021-09-30', 1100, 1500, 15, 'ELECTRODOMESTICO LG', 3, 1);
INSERT INTO `producto` VALUES (17, 'SURF', '2021-06-15', '0000-00-00', 20, 30, 200, 'DETERGENTE EN POLVO', 4, 1);
INSERT INTO `producto` VALUES (18, 'CAMIONSITO', '2021-06-01', '0000-00-00', 100, 150, 50, 'CAMION DE JUGUETE', 5, 1);
INSERT INTO `producto` VALUES (19, 'CAMISA', '2021-06-01', '0000-00-00', 90, 110, 30, 'ROPA', 6, 1);
INSERT INTO `producto` VALUES (20, 'MESA DE MADERA', '2021-01-01', '0000-00-00', 250, 300, 10, 'MESA DE SALA', 7, 1);
INSERT INTO `producto` VALUES (21, 'probando', '2021-06-13', '2021-06-13', 2, 3, 10, 'desc', 1, 1);

-- ----------------------------
-- Table structure for producto_proveedor
-- ----------------------------
DROP TABLE IF EXISTS `producto_proveedor`;
CREATE TABLE `producto_proveedor`  (
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_PROVEEDOR` int(11) NOT NULL,
  UNIQUE INDEX `ID_PRODUCTO`(`ID_PRODUCTO`) USING BTREE,
  INDEX `ID_PROVEEDOR`(`ID_PROVEEDOR`) USING BTREE,
  CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`ID_PROVEEDOR`) REFERENCES `proveedor` (`ID_PROVEEDOR`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `producto` (`ID_PRODUCTO`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producto_proveedor
-- ----------------------------
INSERT INTO `producto_proveedor` VALUES (4, 2);
INSERT INTO `producto_proveedor` VALUES (11, 2);
INSERT INTO `producto_proveedor` VALUES (15, 5);
INSERT INTO `producto_proveedor` VALUES (1, 6);
INSERT INTO `producto_proveedor` VALUES (8, 6);
INSERT INTO `producto_proveedor` VALUES (7, 7);
INSERT INTO `producto_proveedor` VALUES (14, 7);
INSERT INTO `producto_proveedor` VALUES (20, 7);
INSERT INTO `producto_proveedor` VALUES (6, 8);
INSERT INTO `producto_proveedor` VALUES (13, 8);
INSERT INTO `producto_proveedor` VALUES (19, 8);
INSERT INTO `producto_proveedor` VALUES (5, 9);
INSERT INTO `producto_proveedor` VALUES (18, 9);
INSERT INTO `producto_proveedor` VALUES (2, 10);
INSERT INTO `producto_proveedor` VALUES (9, 10);
INSERT INTO `producto_proveedor` VALUES (12, 10);
INSERT INTO `producto_proveedor` VALUES (17, 10);
INSERT INTO `producto_proveedor` VALUES (3, 11);
INSERT INTO `producto_proveedor` VALUES (10, 11);
INSERT INTO `producto_proveedor` VALUES (16, 11);

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor`  (
  `ID_PROVEEDOR` int(11) NOT NULL,
  `NOMBRE_PROVEEDOR` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES (1, 'ASR SISTEMAS DE SEGURIDAD');
INSERT INTO `proveedor` VALUES (2, 'ATLATIDA MUEBLES & EQUIPAMIENTO');
INSERT INTO `proveedor` VALUES (3, 'EL CEIBO BOLIVIA');
INSERT INTO `proveedor` VALUES (4, 'ROSVANIA');
INSERT INTO `proveedor` VALUES (5, 'PIL ANDINA S.A.');
INSERT INTO `proveedor` VALUES (6, 'GRUPO VENADO');
INSERT INTO `proveedor` VALUES (7, 'MUEBLERIA COMODO RELAX');
INSERT INTO `proveedor` VALUES (8, 'ROPA BRASILERA BOLIVIA');
INSERT INTO `proveedor` VALUES (9, 'BOLIVIAMAR');
INSERT INTO `proveedor` VALUES (10, 'NIVEA BOLIVIA');
INSERT INTO `proveedor` VALUES (11, 'D&P ELECTRODOMESTICOS');

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `ID_ROL` int(11) NOT NULL,
  `DESCRIPCION_ROL` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_ROL`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'Administrador');
INSERT INTO `rol` VALUES (2, 'Vendedor');
INSERT INTO `rol` VALUES (3, 'Cliente');

-- ----------------------------
-- Table structure for sucursal
-- ----------------------------
DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE `sucursal`  (
  `ID_SUCURSAL` int(11) NOT NULL,
  `DIRECCION` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `ID_SUPERMERCADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_SUCURSAL`) USING BTREE,
  UNIQUE INDEX `ID_SUPERMERCADO`(`ID_SUPERMERCADO`) USING BTREE,
  INDEX `ID_DEPARTAMENTO`(`ID_DEPARTAMENTO`) USING BTREE,
  CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`ID_DEPARTAMENTO`) REFERENCES `departamento` (`ID_DEPARTAMENTO`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `sucursal_ibfk_2` FOREIGN KEY (`ID_SUPERMERCADO`) REFERENCES `supermercado` (`ID_SUPERMERCADO`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sucursal
-- ----------------------------
INSERT INTO `sucursal` VALUES (1, 'MIRAFLORES', 1, 1);

-- ----------------------------
-- Table structure for supermercado
-- ----------------------------
DROP TABLE IF EXISTS `supermercado`;
CREATE TABLE `supermercado`  (
  `ID_SUPERMERCADO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID_SUPERMERCADO`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supermercado
-- ----------------------------
INSERT INTO `supermercado` VALUES (1, 'LAS BICHOTAS');

-- ----------------------------
-- Table structure for tipo_producto
-- ----------------------------
DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE `tipo_producto`  (
  `ID_TIPO_PRODUCTO` int(11) NOT NULL,
  `NOMBRE_TIPO_PRODUCTO` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_TIPO_PRODUCTO`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipo_producto
-- ----------------------------
INSERT INTO `tipo_producto` VALUES (1, 'ALIMENTOS');
INSERT INTO `tipo_producto` VALUES (2, 'CUIDADO PERSONAL');
INSERT INTO `tipo_producto` VALUES (3, 'ELECTRODOMESTICOS');
INSERT INTO `tipo_producto` VALUES (4, 'BASICOS DEL HOGAR');
INSERT INTO `tipo_producto` VALUES (5, 'ENTRETENIMIENTO');
INSERT INTO `tipo_producto` VALUES (6, 'VESTIMENTA');
INSERT INTO `tipo_producto` VALUES (7, 'MUEBLERIA');

-- ----------------------------
-- Table structure for tipo_usuario_eliminar
-- ----------------------------
DROP TABLE IF EXISTS `tipo_usuario_eliminar`;
CREATE TABLE `tipo_usuario_eliminar`  (
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `DESCRIPCION_TIPO_USUARIO` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID_TIPO_USUARIO`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario`  (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_USUARIO` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `CONTRASEÑA_USUARIO` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ID_PERSONA_USUARIO` int(11) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`) USING BTREE,
  INDEX `ID_PERSONA_USUARIO`(`ID_PERSONA_USUARIO`) USING BTREE,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_PERSONA_USUARIO`) REFERENCES `persona` (`ID_PERSONA`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES (1, 'admin', '1234', 25);
INSERT INTO `usuario` VALUES (5, 'cliente', '1234', 24);

-- ----------------------------
-- Table structure for usuario_rol
-- ----------------------------
DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE `usuario_rol`  (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  INDEX `ID_USUARIO`(`ID_USUARIO`) USING BTREE,
  INDEX `ID_ROL_BD`(`ID_ROL`) USING BTREE,
  CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario_rol
-- ----------------------------
INSERT INTO `usuario_rol` VALUES (1, 1);
INSERT INTO `usuario_rol` VALUES (5, 3);

SET FOREIGN_KEY_CHECKS = 1;