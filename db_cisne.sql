-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para db_cisne
CREATE DATABASE IF NOT EXISTS `db_cisne` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_cisne`;

-- Volcando estructura para tabla db_cisne.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cl_id` int NOT NULL AUTO_INCREMENT,
  `cl_dni` varchar(20) NOT NULL,
  `cl_nombre` varchar(50) NOT NULL,
  `cl_direccion` varchar(100) NOT NULL,
  `cl_correo` varchar(50) NOT NULL,
  `cl_celular` varchar(20) NOT NULL,
  `cl_usuario` varchar(30) NOT NULL,
  `cl_contraseña` varchar(30) NOT NULL,
  PRIMARY KEY (`cl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.cliente: ~7 rows (aproximadamente)
INSERT INTO `cliente` (`cl_id`, `cl_dni`, `cl_nombre`, `cl_direccion`, `cl_correo`, `cl_celular`, `cl_usuario`, `cl_contraseña`) VALUES
	(1, '23423423', 'Pedro López', 'Av. Cliente 123', 'pedro@cliente.com', '987654321', 'pedrol', '12345'),
	(2, '235235', 'María Rodríguez', 'Calle Cliente 456', 'maria@cliente.com', '123456789', 'mariar', '54321'),
	(3, '2352352', 'Luis González', 'Av. Ejemplo 789', 'luis@cliente.com', '456789123', 'luisg', '98765'),
	(4, '76606525', 'jhosue', 'pastor', 'ronald1pasot@gmail.com', '944501816', 'ronald1pasot@gmail.com', '123'),
	(5, '76606525', 'jhosue', 'pastor', 'ronald1pasot@gmail.com', '944501816', 'ronald1pasot@gmail.com', '123'),
	(6, '76606525', 'jhosue', 'pastor', 'ronald1pasot@gmail.com', '944501816', 'ronald1pasot@gmail.com', '12345'),
	(7, '76606525', 'jhosue', 'pastor', 'ronald1pasot@gmail.com', '944501816', 'ronald1pasot@gmail.com', '12345'),
	(8, '701612024', 'liz', 'pastor', 'lizpstr@gmail.com', '950357078', 'lizpstr@gmail.com', 'holaliz123');

-- Volcando estructura para tabla db_cisne.clientepromocion
CREATE TABLE IF NOT EXISTS `clientepromocion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pd_id` int NOT NULL,
  `cl_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cp_promocion` (`pd_id`),
  KEY `fk_cp_cliente` (`cl_id`),
  CONSTRAINT `fk_cp_cliente` FOREIGN KEY (`cl_id`) REFERENCES `cliente` (`cl_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_cp_promocion` FOREIGN KEY (`pd_id`) REFERENCES `promociones_y_descuentos` (`pd_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.clientepromocion: ~0 rows (aproximadamente)
INSERT INTO `clientepromocion` (`id`, `pd_id`, `cl_id`) VALUES
	(1, 1, 3),
	(2, 2, 5),
	(3, 3, 7);

-- Volcando estructura para tabla db_cisne.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `em_id` int NOT NULL AUTO_INCREMENT,
  `em_nombre` varchar(50) NOT NULL,
  `em_direccion` varchar(100) NOT NULL,
  `em_correo` varchar(50) NOT NULL,
  `em_celular` varchar(20) NOT NULL,
  `em_usuario` varchar(30) NOT NULL,
  `em_contraseña` varchar(30) NOT NULL,
  `em_cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`em_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.empleado: ~9 rows (aproximadamente)
INSERT INTO `empleado` (`em_id`, `em_nombre`, `em_direccion`, `em_correo`, `em_celular`, `em_usuario`, `em_contraseña`, `em_cargo`) VALUES
	(1, 'Juan Pérez', 'Av. Ejemplo 123', 'juan@empresa.com', '987654321', 'juanp', '12345', 'Mecánico'),
	(2, 'Ana Gómez', 'Calle Ejemplo 456', 'ana@empresa.com', '123456789', 'anag', '54321', 'Administrativa'),
	(3, 'Carlos Sánchez', 'Av. Prueba 789', 'carlos@chevrolet.com', '456789123', 'carloss', '123', 'jefe de servicios'),
	(4, 'Juan pastor', 'Av. Ejemplo 123', 'juan@chevrolet.com', '987654321', 'juanp', '123', 'gerente'),
	(5, 'Juan Pérez', 'Calle 123, Ciudad A', 'juan.perez@example.com', '123456789', 'juanperez', 'password123', 'Asesor de ventas'),
	(6, 'Ana Gómez', 'Av. Principal 456, Ciudad B', 'ana.gomez@example.com', '987654321', 'anagomez', 'password456', 'Asesor de ventas'),
	(7, 'Carlos López', 'Carrera 789, Ciudad C', 'carlos.lopez@example.com', '456789012', 'carloslopez', 'password789', 'Asesor de ventas'),
	(8, 'María Martínez', 'Calle Secundaria 234, Ciudad D', 'maria.martinez@example.com', '321654987', 'mariamartinez', 'passwordabc', 'Asesor de ventas'),
	(9, 'Pedro Sánchez', 'Av. Central 567, Ciudad E', 'pedro.sanchez@example.com', '789012345', 'pedrosanchez', 'passwordxyz', 'Asesor de ventas');

-- Volcando estructura para tabla db_cisne.historial_de_servicios
CREATE TABLE IF NOT EXISTS `historial_de_servicios` (
  `hvs_id` int NOT NULL AUTO_INCREMENT,
  `hvs_fecha_y_hora` date NOT NULL,
  `hvs_descripcion` varchar(300) NOT NULL,
  `hvs_vts_id` int NOT NULL,
  PRIMARY KEY (`hvs_id`),
  KEY `venta_de_servicio_historial_de_servicios_fk` (`hvs_vts_id`),
  CONSTRAINT `venta_de_servicio_historial_de_servicios_fk` FOREIGN KEY (`hvs_vts_id`) REFERENCES `venta_de_servicio` (`vts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_de_servicios: ~3 rows (aproximadamente)
INSERT INTO `historial_de_servicios` (`hvs_id`, `hvs_fecha_y_hora`, `hvs_descripcion`, `hvs_vts_id`) VALUES
	(1, '2023-04-15', 'Mantenimiento regular y revisión de motor.', 1),
	(2, '2023-06-05', 'Cambio de aceite y filtro según especificaciones del fabricante.', 2),
	(3, '2023-07-20', 'Reparación de sistema de frenos y verificación general de seguridad.', 3);

-- Volcando estructura para tabla db_cisne.historial_de_ventas_repuesto
CREATE TABLE IF NOT EXISTS `historial_de_ventas_repuesto` (
  `hvr_id` int NOT NULL AUTO_INCREMENT,
  `hvr_fecha_y_hora` date NOT NULL,
  `hvr_descripcion` varchar(300) NOT NULL,
  `hvr_vtr_id` int NOT NULL,
  PRIMARY KEY (`hvr_id`),
  KEY `ventas_de_repuestos_historial_de_ventas_repuesto__fk` (`hvr_vtr_id`),
  CONSTRAINT `ventas_de_repuestos_historial_de_ventas_repuesto__fk` FOREIGN KEY (`hvr_vtr_id`) REFERENCES `ventas_de_repuestos` (`vtr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_de_ventas_repuesto: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_cisne.historial_de_ventas_vehiculo
CREATE TABLE IF NOT EXISTS `historial_de_ventas_vehiculo` (
  `hv_id` int NOT NULL AUTO_INCREMENT,
  `hv_fecha_y_hora` date NOT NULL,
  `hv_descripcion` varchar(300) NOT NULL,
  `hv_vtv_id` int NOT NULL,
  PRIMARY KEY (`hv_id`),
  KEY `ventas_de_vehiculo_historial_de_ventas_vehiculo_fk` (`hv_vtv_id`),
  CONSTRAINT `ventas_de_vehiculo_historial_de_ventas_vehiculo_fk` FOREIGN KEY (`hv_vtv_id`) REFERENCES `ventas_de_vehiculo` (`vtv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_de_ventas_vehiculo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_cisne.historial_separacion_repuestos
CREATE TABLE IF NOT EXISTS `historial_separacion_repuestos` (
  `hpr_id` int NOT NULL AUTO_INCREMENT,
  `hpr_descripcion` varchar(300) NOT NULL,
  `hpr_codigo` varchar(30) NOT NULL,
  `hpr_rp_id` int NOT NULL,
  `hpr_cl_id` int NOT NULL,
  `hpr_mp_id` int NOT NULL,
  PRIMARY KEY (`hpr_id`),
  KEY `metodo_de_pago_historial_separacion_repuestos_fk` (`hpr_mp_id`),
  KEY `repuesto_historial_separacion_repuestos_fk` (`hpr_rp_id`),
  KEY `cliente_historial_separacion_repuestos_fk` (`hpr_cl_id`),
  CONSTRAINT `cliente_historial_separacion_repuestos_fk` FOREIGN KEY (`hpr_cl_id`) REFERENCES `cliente` (`cl_id`),
  CONSTRAINT `metodo_de_pago_historial_separacion_repuestos_fk` FOREIGN KEY (`hpr_mp_id`) REFERENCES `metodo_de_pago` (`mp_id`),
  CONSTRAINT `repuesto_historial_separacion_repuestos_fk` FOREIGN KEY (`hpr_rp_id`) REFERENCES `repuesto` (`rp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_separacion_repuestos: ~3 rows (aproximadamente)
INSERT INTO `historial_separacion_repuestos` (`hpr_id`, `hpr_descripcion`, `hpr_codigo`, `hpr_rp_id`, `hpr_cl_id`, `hpr_mp_id`) VALUES
	(1, 'Separación de filtro de aceite', 'HSR001', 1, 1, 1),
	(2, 'Separación de pastillas de freno', 'HSR002', 2, 2, 2),
	(3, 'Separación de batería', 'HSR003', 3, 3, 3);

-- Volcando estructura para tabla db_cisne.historial_separacion_servicios
CREATE TABLE IF NOT EXISTS `historial_separacion_servicios` (
  `hps_id` int NOT NULL AUTO_INCREMENT,
  `hps_descripcion` varchar(300) NOT NULL,
  `hps_codigo` varchar(30) NOT NULL,
  `hps_sr_id` int NOT NULL,
  `hps_cl_id` int NOT NULL,
  `hps_mp_id` int NOT NULL,
  PRIMARY KEY (`hps_id`),
  KEY `metodo_de_pago_historial_separacion_servicios_fk` (`hps_mp_id`),
  KEY `servicio_historial_separacion_servicios_fk` (`hps_sr_id`),
  KEY `cliente_historial_separacion_servicios_fk` (`hps_cl_id`),
  CONSTRAINT `cliente_historial_separacion_servicios_fk` FOREIGN KEY (`hps_cl_id`) REFERENCES `cliente` (`cl_id`),
  CONSTRAINT `metodo_de_pago_historial_separacion_servicios_fk` FOREIGN KEY (`hps_mp_id`) REFERENCES `metodo_de_pago` (`mp_id`),
  CONSTRAINT `servicio_historial_separacion_servicios_fk` FOREIGN KEY (`hps_sr_id`) REFERENCES `servicio` (`sr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_separacion_servicios: ~3 rows (aproximadamente)
INSERT INTO `historial_separacion_servicios` (`hps_id`, `hps_descripcion`, `hps_codigo`, `hps_sr_id`, `hps_cl_id`, `hps_mp_id`) VALUES
	(1, 'Separación de servicio de lavado', 'HSS001', 1, 1, 1),
	(2, 'Separación de servicio de cambio de aceite', 'HSS002', 2, 2, 2),
	(3, 'Separación de servicio de alineación', 'HSS003', 3, 3, 3);

-- Volcando estructura para tabla db_cisne.historial_separacion_vehiculos
CREATE TABLE IF NOT EXISTS `historial_separacion_vehiculos` (
  `hp_id` int NOT NULL AUTO_INCREMENT,
  `hp_descripcion` varchar(300) NOT NULL,
  `hp_codigo` varchar(30) NOT NULL,
  `hp_vh_id` int NOT NULL,
  `hp_cl_id` int NOT NULL,
  `hp_mp_id` int NOT NULL,
  PRIMARY KEY (`hp_id`),
  KEY `metodo_de_pago_historial_separacion_vehiculos_fk` (`hp_mp_id`),
  KEY `vehiculo_historial_separacion_vehiculos_fk` (`hp_vh_id`),
  KEY `cliente_historial_separacion_vehiculos_fk` (`hp_cl_id`),
  CONSTRAINT `cliente_historial_separacion_vehiculos_fk` FOREIGN KEY (`hp_cl_id`) REFERENCES `cliente` (`cl_id`),
  CONSTRAINT `metodo_de_pago_historial_separacion_vehiculos_fk` FOREIGN KEY (`hp_mp_id`) REFERENCES `metodo_de_pago` (`mp_id`),
  CONSTRAINT `vehiculo_historial_separacion_vehiculos_fk` FOREIGN KEY (`hp_vh_id`) REFERENCES `vehiculo` (`vh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_separacion_vehiculos: ~3 rows (aproximadamente)
INSERT INTO `historial_separacion_vehiculos` (`hp_id`, `hp_descripcion`, `hp_codigo`, `hp_vh_id`, `hp_cl_id`, `hp_mp_id`) VALUES
	(1, 'Separación de vehículo Toyota', 'HSV001', 1, 1, 1),
	(2, 'Separación de vehículo Honda', 'HSV002', 2, 2, 2),
	(3, 'Separación de vehículo Ford', 'HSV003', 3, 3, 3),
	(4, 'Descripción del vehículo separado', 'Código del vehículo separado', 1, 1, 1);

-- Volcando estructura para tabla db_cisne.metodo_de_pago
CREATE TABLE IF NOT EXISTS `metodo_de_pago` (
  `mp_id` int NOT NULL AUTO_INCREMENT,
  `mp_tipo_de_comprobante` varchar(30) NOT NULL,
  `mp_metodo_pago` varchar(30) NOT NULL,
  PRIMARY KEY (`mp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.metodo_de_pago: ~6 rows (aproximadamente)
INSERT INTO `metodo_de_pago` (`mp_id`, `mp_tipo_de_comprobante`, `mp_metodo_pago`) VALUES
	(1, 'Factura', 'Tarjeta de Crédito'),
	(2, 'Boleta', 'Efectivo'),
	(3, 'Factura', 'Transferencia Bancaria'),
	(4, 'Factura', 'Tarjeta de Crédito'),
	(5, 'Boleta', 'Efectivo'),
	(6, 'Factura', 'Transferencia Bancaria');

-- Volcando estructura para tabla db_cisne.nota_de_venta
CREATE TABLE IF NOT EXISTS `nota_de_venta` (
  `nt_id` int NOT NULL AUTO_INCREMENT,
  `nt_telefono` varchar(30) NOT NULL,
  `nt_tipo_de_cambio` decimal(10,2) NOT NULL,
  `nt_correo_general` varchar(50) NOT NULL,
  `nt_fecha` date NOT NULL,
  PRIMARY KEY (`nt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.nota_de_venta: ~3 rows (aproximadamente)
INSERT INTO `nota_de_venta` (`nt_id`, `nt_telefono`, `nt_tipo_de_cambio`, `nt_correo_general`, `nt_fecha`) VALUES
	(1, '987654321', 3.85, 'ventas@empresa.com', '2024-06-01'),
	(2, '123456789', 3.85, 'info@empresa.com', '2024-06-02'),
	(3, '456789123', 3.85, 'contacto@empresa.com', '2024-06-03');

-- Volcando estructura para tabla db_cisne.pedido_proveedor
CREATE TABLE IF NOT EXISTS `pedido_proveedor` (
  `pp_id` int NOT NULL AUTO_INCREMENT,
  `pp_serie` varchar(10) NOT NULL,
  `pp_numero` decimal(10,2) NOT NULL,
  `pp_tipo_de_comprobante` varchar(10) NOT NULL,
  `pp_estado` varchar(30) NOT NULL,
  `pp_pv_id` int NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `proveedor_pedido_proveedor_fk` (`pp_pv_id`),
  CONSTRAINT `proveedor_pedido_proveedor_fk` FOREIGN KEY (`pp_pv_id`) REFERENCES `proveedor` (`pv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.pedido_proveedor: ~3 rows (aproximadamente)
INSERT INTO `pedido_proveedor` (`pp_id`, `pp_serie`, `pp_numero`, `pp_tipo_de_comprobante`, `pp_estado`, `pp_pv_id`) VALUES
	(1, 'A001', 1.00, 'Factura', 'Pendiente', 1),
	(2, 'A002', 2.00, 'Boleta', 'Completado', 2),
	(3, 'A003', 3.00, 'Factura', 'Cancelado', 3);

-- Volcando estructura para tabla db_cisne.proforma
CREATE TABLE IF NOT EXISTS `proforma` (
  `pf_id` int NOT NULL AUTO_INCREMENT,
  `pf_telefono` varchar(30) NOT NULL,
  `pf_tipo_de_cambio` decimal(10,2) NOT NULL,
  `pf_correo_general` varchar(50) NOT NULL,
  `pf_fecha` date NOT NULL,
  PRIMARY KEY (`pf_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.proforma: ~3 rows (aproximadamente)
INSERT INTO `proforma` (`pf_id`, `pf_telefono`, `pf_tipo_de_cambio`, `pf_correo_general`, `pf_fecha`) VALUES
	(1, '987654321', 3.85, 'proforma@empresa.com', '2024-06-01'),
	(2, '123456789', 3.85, 'info@empresa.com', '2024-06-02'),
	(3, '456789123', 3.85, 'ventas@empresa.com', '2024-06-03');

-- Volcando estructura para tabla db_cisne.promociones_y_descuentos
CREATE TABLE IF NOT EXISTS `promociones_y_descuentos` (
  `pd_id` int NOT NULL AUTO_INCREMENT,
  `pd_nombre_promocion` varchar(30) NOT NULL,
  `pd_descripcion` varchar(300) NOT NULL,
  `pd_monto` decimal(10,2) NOT NULL,
  `pd_condiciones` varchar(300) NOT NULL,
  `pd_fecha_inicio` date NOT NULL,
  `pd_fecha_fin` date NOT NULL,
  PRIMARY KEY (`pd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.promociones_y_descuentos: ~3 rows (aproximadamente)
INSERT INTO `promociones_y_descuentos` (`pd_id`, `pd_nombre_promocion`, `pd_descripcion`, `pd_monto`, `pd_condiciones`, `pd_fecha_inicio`, `pd_fecha_fin`) VALUES
	(1, 'Descuento de Verano', '10% de descuento en todos los servicios', 10.00, 'Aplica solo a servicios', '2024-06-01', '2024-06-30'),
	(2, 'Promoción de Invierno', '15% de descuento en repuestos seleccionados', 15.00, 'Aplica solo a repuestos', '2024-07-01', '2024-07-31'),
	(3, 'Descuento de Primavera', '5% de descuento en compras mayores a $100', 5.00, 'Compras mayores a $100', '2024-08-01', '2024-08-31');

-- Volcando estructura para tabla db_cisne.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `pv_id` int NOT NULL AUTO_INCREMENT,
  `pv_nombre` varchar(30) NOT NULL,
  `pv_direccion` varchar(50) NOT NULL,
  `pv_correo` varchar(50) NOT NULL,
  `pv_telefono` varchar(30) NOT NULL,
  PRIMARY KEY (`pv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.proveedor: ~3 rows (aproximadamente)
INSERT INTO `proveedor` (`pv_id`, `pv_nombre`, `pv_direccion`, `pv_correo`, `pv_telefono`) VALUES
	(1, 'Repuestos Auto S.A.', 'Av. Siempre Viva 123', 'contacto@repuestosauto.com', '987654321'),
	(2, 'Servicios Mecánicos S.A.', 'Calle Falsa 456', 'ventas@serviciosmecanicos.com', '123456789'),
	(3, 'Accesorios Vehiculares S.A.', 'Av. Principal 789', 'info@accesoriosvehiculares.com', '456789123');

-- Volcando estructura para tabla db_cisne.reporte
CREATE TABLE IF NOT EXISTS `reporte` (
  `re_id` int NOT NULL AUTO_INCREMENT,
  `em_id` int NOT NULL,
  `re_descripcion` varchar(50) NOT NULL,
  `empleado_em_id` int NOT NULL,
  PRIMARY KEY (`re_id`),
  KEY `empleado_reporte_fk` (`em_id`),
  KEY `empleado_reporte_fk1` (`empleado_em_id`),
  CONSTRAINT `empleado_reporte_fk` FOREIGN KEY (`em_id`) REFERENCES `empleado` (`em_id`),
  CONSTRAINT `empleado_reporte_fk1` FOREIGN KEY (`empleado_em_id`) REFERENCES `empleado` (`em_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.reporte: ~3 rows (aproximadamente)
INSERT INTO `reporte` (`re_id`, `em_id`, `re_descripcion`, `empleado_em_id`) VALUES
	(1, 1, 'Reporte de mantenimiento', 2),
	(2, 2, 'Reporte de ventas', 3),
	(3, 3, 'Reporte de compras', 1);

-- Volcando estructura para tabla db_cisne.repuesto
CREATE TABLE IF NOT EXISTS `repuesto` (
  `rp_id` int NOT NULL AUTO_INCREMENT,
  `rp_marca` varchar(30) NOT NULL,
  `rp_modelo` varchar(30) NOT NULL,
  `rp_precio_base` decimal(10,2) NOT NULL,
  `rp_estado` varchar(30) NOT NULL,
  `rp_nombre` varchar(30) NOT NULL,
  `rp_codigo` varchar(30) NOT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.repuesto: ~3 rows (aproximadamente)
INSERT INTO `repuesto` (`rp_id`, `rp_marca`, `rp_modelo`, `rp_precio_base`, `rp_estado`, `rp_nombre`, `rp_codigo`) VALUES
	(1, 'Toyota', 'Corolla', 100.00, 'Nuevo', 'Filtro de Aceite', 'RP001'),
	(2, 'Honda', 'Civic', 150.00, 'Usado', 'Pastillas de Freno', 'RP002'),
	(3, 'Ford', 'Focus', 200.00, 'Nuevo', 'Batería', 'RP003');

-- Volcando estructura para tabla db_cisne.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `sr_id` int NOT NULL AUTO_INCREMENT,
  `sr_nombre` varchar(100) NOT NULL,
  `sr_descripcion` varchar(300) NOT NULL,
  `sr_precio_base` decimal(10,2) NOT NULL,
  `sr_fecha_y_hora` date NOT NULL,
  `sr_codigo` varchar(30) NOT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.servicio: ~6 rows (aproximadamente)
INSERT INTO `servicio` (`sr_id`, `sr_nombre`, `sr_descripcion`, `sr_precio_base`, `sr_fecha_y_hora`, `sr_codigo`) VALUES
	(1, 'Lavado de Auto', 'Lavado completo del automóvil', 25.00, '2024-06-01', 'SR001'),
	(2, 'Cambio de Aceite', 'Cambio de aceite y filtro', 50.00, '2024-06-02', 'SR002'),
	(3, 'Alineación y Balanceo', 'Alineación y balanceo de las llantas', 40.00, '2024-06-03', 'SR003'),
	(4, 'Lavado de Auto', 'Lavado completo del automóvil', 25.00, '2024-06-01', 'SR001'),
	(5, 'Cambio de Aceite', 'Cambio de aceite y filtro', 50.00, '2024-06-02', 'SR002'),
	(6, 'Alineación y Balanceo', 'Alineación y balanceo de las llantas', 40.00, '2024-06-03', 'SR003');

-- Volcando estructura para tabla db_cisne.stock
CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `tipo_elemento` enum('servicio','repuesto','vehiculo') NOT NULL,
  `elemento_id` int NOT NULL,
  `cantidad_disponible` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`stock_id`),
  UNIQUE KEY `uk_tipo_elemento_elemento_id` (`tipo_elemento`,`elemento_id`),
  KEY `elemento_id` (`elemento_id`),
  CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`elemento_id`) REFERENCES `servicio` (`sr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`elemento_id`) REFERENCES `repuesto` (`rp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`elemento_id`) REFERENCES `vehiculo` (`vh_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.stock: ~2 rows (aproximadamente)
INSERT INTO `stock` (`stock_id`, `tipo_elemento`, `elemento_id`, `cantidad_disponible`) VALUES
	(1, 'vehiculo', 1, 10),
	(2, 'vehiculo', 2, 5),
	(3, 'vehiculo', 3, 2);

-- Volcando estructura para tabla db_cisne.vehiculo
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `vh_id` int NOT NULL AUTO_INCREMENT,
  `vh_marca` varchar(30) NOT NULL,
  `vh_modelo` varchar(30) NOT NULL,
  `vh_color` varchar(30) NOT NULL,
  `vh_año` varchar(30) NOT NULL,
  `vh_placa` varchar(30) NOT NULL,
  `vh_codigo` varchar(30) NOT NULL,
  `vh_precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`vh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.vehiculo: ~75 rows (aproximadamente)
INSERT INTO `vehiculo` (`vh_id`, `vh_marca`, `vh_modelo`, `vh_color`, `vh_año`, `vh_placa`, `vh_codigo`, `vh_precio`) VALUES
	(1, 'Chevrolet', 'Spark', 'Blanco', '2023', 'ABC123', 'SPK2023', 15000.00),
	(2, 'Chevrolet', 'Aveo', 'Blanco', '2023', 'DEF456', 'AVEO2023', 18000.00),
	(3, 'Chevrolet', 'Beat', 'Blanco', '2023', 'GHI789', 'BEAT2023', 16000.00),
	(4, 'Chevrolet', 'Onix', 'Blanco', '2022', 'JKL012', 'ONIX2022', 20000.00),
	(5, 'Chevrolet', 'Sonic', 'Blanco', '2023', 'MNO345', 'SONIC2023', 22000.00),
	(6, 'Chevrolet', 'Cruze', 'Blanco', '2022', 'PQR678', 'CRUZE2022', 25000.00),
	(7, 'Chevrolet', 'Malibu', 'Blanco', '2023', 'STU901', 'MALIBU2023', 30000.00),
	(8, 'Chevrolet', 'Impala', 'Blanco', '2022', 'VWX234', 'IMPALA2022', 35000.00),
	(9, 'Chevrolet', 'Equinox', 'Blanco', '2023', 'YZA567', 'EQUINOX2023', 40000.00),
	(10, 'Chevrolet', 'Traverse', 'Blanco', '2022', 'BCD890', 'TRAVERSE2022', 45000.00),
	(11, 'Chevrolet', 'Blazer', 'Blanco', '2023', 'EFG123', 'BLAZER2023', 48000.00),
	(12, 'Chevrolet', 'Tahoe', 'Blanco', '2022', 'HIJ456', 'TAHOE2022', 55000.00),
	(13, 'Chevrolet', 'Suburban', 'Blanco', '2023', 'KLM789', 'SUBURBAN2023', 60000.00),
	(14, 'Chevrolet', 'Camaro', 'Blanco', '2022', 'NOP012', 'CAMARO2022', 65000.00),
	(15, 'Chevrolet', 'Corvette', 'Blanco', '2023', 'QRS345', 'CORVETTE2023', 70000.00),
	(16, 'Chevrolet', 'Spark', 'Celeste', '2023', 'ABC123', 'SPK2023', 15000.00),
	(17, 'Chevrolet', 'Aveo', 'Celeste', '2022', 'DEF456', 'AVEO2022', 18000.00),
	(18, 'Chevrolet', 'Beat', 'Celeste', '2023', 'GHI789', 'BEAT2023', 16000.00),
	(19, 'Chevrolet', 'Onix', 'Celeste', '2022', 'JKL012', 'ONIX2022', 20000.00),
	(20, 'Chevrolet', 'Sonic', 'Celeste', '2023', 'MNO345', 'SONIC2023', 22000.00),
	(21, 'Chevrolet', 'Cruze', 'Celeste', '2022', 'PQR678', 'CRUZE2022', 25000.00),
	(22, 'Chevrolet', 'Malibu', 'Celeste', '2023', 'STU901', 'MALIBU2023', 30000.00),
	(23, 'Chevrolet', 'Impala', 'Celeste', '2022', 'VWX234', 'IMPALA2022', 35000.00),
	(24, 'Chevrolet', 'Equinox', 'Celeste', '2023', 'YZA567', 'EQUINOX2023', 40000.00),
	(25, 'Chevrolet', 'Traverse', 'Celeste', '2022', 'BCD890', 'TRAVERSE2022', 45000.00),
	(26, 'Chevrolet', 'Blazer', 'Celeste', '2023', 'EFG123', 'BLAZER2023', 48000.00),
	(27, 'Chevrolet', 'Tahoe', 'Celeste', '2022', 'HIJ456', 'TAHOE2022', 55000.00),
	(28, 'Chevrolet', 'Suburban', 'Celeste', '2023', 'KLM789', 'SUBURBAN2023', 60000.00),
	(29, 'Chevrolet', 'Camaro', 'Celeste', '2022', 'NOP012', 'CAMARO2022', 65000.00),
	(30, 'Chevrolet', 'Corvette', 'Celeste', '2023', 'QRS345', 'CORVETTE2023', 70000.00),
	(31, 'Chevrolet', 'Spark', 'Negro', '2023', 'ABC123', 'SPK2023', 15000.00),
	(32, 'Chevrolet', 'Aveo', 'Negro', '2022', 'DEF456', 'AVEO2022', 18000.00),
	(33, 'Chevrolet', 'Beat', 'Negro', '2023', 'GHI789', 'BEAT2023', 16000.00),
	(34, 'Chevrolet', 'Onix', 'Negro', '2022', 'JKL012', 'ONIX2022', 20000.00),
	(35, 'Chevrolet', 'Sonic', 'Negro', '2023', 'MNO345', 'SONIC2023', 22000.00),
	(36, 'Chevrolet', 'Cruze', 'Negro', '2022', 'PQR678', 'CRUZE2022', 25000.00),
	(37, 'Chevrolet', 'Malibu', 'Negro', '2023', 'STU901', 'MALIBU2023', 30000.00),
	(38, 'Chevrolet', 'Impala', 'Negro', '2022', 'VWX234', 'IMPALA2022', 35000.00),
	(39, 'Chevrolet', 'Equinox', 'Negro', '2023', 'YZA567', 'EQUINOX2023', 40000.00),
	(40, 'Chevrolet', 'Traverse', 'Negro', '2022', 'BCD890', 'TRAVERSE2022', 45000.00),
	(41, 'Chevrolet', 'Blazer', 'Negro', '2023', 'EFG123', 'BLAZER2023', 48000.00),
	(42, 'Chevrolet', 'Tahoe', 'Negro', '2022', 'HIJ456', 'TAHOE2022', 55000.00),
	(43, 'Chevrolet', 'Suburban', 'Negro', '2023', 'KLM789', 'SUBURBAN2023', 60000.00),
	(44, 'Chevrolet', 'Camaro', 'Negro', '2022', 'NOP012', 'CAMARO2022', 65000.00),
	(45, 'Chevrolet', 'Corvette', 'Negro', '2023', 'QRS345', 'CORVETTE2023', 70000.00),
	(46, 'Chevrolet', 'Spark', 'Azul', '2023', 'ABC123', 'SPK2023', 15000.00),
	(47, 'Chevrolet', 'Aveo', 'Azul', '2022', 'DEF456', 'AVEO2022', 18000.00),
	(48, 'Chevrolet', 'Beat', 'Azul', '2023', 'GHI789', 'BEAT2023', 16000.00),
	(49, 'Chevrolet', 'Onix', 'Azul', '2022', 'JKL012', 'ONIX2022', 20000.00),
	(50, 'Chevrolet', 'Sonic', 'Azul', '2023', 'MNO345', 'SONIC2023', 22000.00),
	(51, 'Chevrolet', 'Cruze', 'Azul', '2022', 'PQR678', 'CRUZE2022', 25000.00),
	(52, 'Chevrolet', 'Malibu', 'Azul', '2023', 'STU901', 'MALIBU2023', 30000.00),
	(53, 'Chevrolet', 'Impala', 'Azul', '2022', 'VWX234', 'IMPALA2022', 35000.00),
	(54, 'Chevrolet', 'Equinox', 'Azul', '2023', 'YZA567', 'EQUINOX2023', 40000.00),
	(55, 'Chevrolet', 'Traverse', 'Azul', '2022', 'BCD890', 'TRAVERSE2022', 45000.00),
	(56, 'Chevrolet', 'Blazer', 'Azul', '2023', 'EFG123', 'BLAZER2023', 48000.00),
	(57, 'Chevrolet', 'Tahoe', 'Azul', '2022', 'HIJ456', 'TAHOE2022', 55000.00),
	(58, 'Chevrolet', 'Suburban', 'Azul', '2023', 'KLM789', 'SUBURBAN2023', 60000.00),
	(59, 'Chevrolet', 'Camaro', 'Azul', '2022', 'NOP012', 'CAMARO2022', 65000.00),
	(60, 'Chevrolet', 'Corvette', 'Azul', '2023', 'QRS345', 'CORVETTE2023', 70000.00),
	(61, 'Chevrolet', 'Spark', 'Rojo', '2023', 'ABC123', 'SPK2023', 15000.00),
	(62, 'Chevrolet', 'Aveo', 'Rojo', '2022', 'DEF456', 'AVEO2022', 18000.00),
	(63, 'Chevrolet', 'Beat', 'Rojo', '2023', 'GHI789', 'BEAT2023', 16000.00),
	(64, 'Chevrolet', 'Onix', 'Rojo', '2022', 'JKL012', 'ONIX2022', 20000.00),
	(65, 'Chevrolet', 'Sonic', 'Rojo', '2023', 'MNO345', 'SONIC2023', 22000.00),
	(66, 'Chevrolet', 'Cruze', 'Rojo', '2022', 'PQR678', 'CRUZE2022', 25000.00),
	(67, 'Chevrolet', 'Malibu', 'Rojo', '2023', 'STU901', 'MALIBU2023', 30000.00),
	(68, 'Chevrolet', 'Impala', 'Rojo', '2022', 'VWX234', 'IMPALA2022', 35000.00),
	(69, 'Chevrolet', 'Equinox', 'Rojo', '2023', 'YZA567', 'EQUINOX2023', 40000.00),
	(70, 'Chevrolet', 'Traverse', 'Rojo', '2022', 'BCD890', 'TRAVERSE2022', 45000.00),
	(71, 'Chevrolet', 'Blazer', 'Rojo', '2023', 'EFG123', 'BLAZER2023', 48000.00),
	(72, 'Chevrolet', 'Tahoe', 'Rojo', '2022', 'HIJ456', 'TAHOE2022', 55000.00),
	(73, 'Chevrolet', 'Suburban', 'Rojo', '2023', 'KLM789', 'SUBURBAN2023', 60000.00),
	(74, 'Chevrolet', 'Camaro', 'Rojo', '2022', 'NOP012', 'CAMARO2022', 65000.00),
	(75, 'Chevrolet', 'Corvette', 'Rojo', '2023', 'QRS345', 'CORVETTE2023', 70000.00);

-- Volcando estructura para tabla db_cisne.ventas_de_repuestos
CREATE TABLE IF NOT EXISTS `ventas_de_repuestos` (
  `vtr_id` int NOT NULL AUTO_INCREMENT,
  `vtr_serie` varchar(8) NOT NULL,
  `vtr_numero` decimal(10,2) NOT NULL,
  `vtr_fecha` date NOT NULL,
  `vtr_igv_total` decimal(10,2) NOT NULL,
  `vtr_valor_venta_total` decimal(10,2) NOT NULL,
  `vtr_importe_total` decimal(10,2) NOT NULL,
  `vtr_estado` varchar(30) NOT NULL,
  `vtr_vdr_id` int NOT NULL,
  `vtr_cl_id` int NOT NULL,
  `vtr_em_id` int NOT NULL,
  `vtr_rp_id` int NOT NULL,
  `vtr_nt_id` int NOT NULL,
  `vtr_pf_id` int NOT NULL,
  PRIMARY KEY (`vtr_id`),
  KEY `repuesto_ventas_de_repuestos_fk` (`vtr_rp_id`),
  KEY `empleado_ventas_de_repuestos_fk` (`vtr_em_id`),
  KEY `cliente_ventas_de_repuestos_fk` (`vtr_cl_id`),
  KEY `nota_de_venta_ventas_de_repuestos_fk` (`vtr_nt_id`),
  KEY `proforma_ventas_de_repuestos_fk` (`vtr_pf_id`),
  KEY `venta_detalle_repuestos_ventas_de_repuestos_fk` (`vtr_vdr_id`),
  CONSTRAINT `cliente_ventas_de_repuestos_fk` FOREIGN KEY (`vtr_cl_id`) REFERENCES `cliente` (`cl_id`),
  CONSTRAINT `empleado_ventas_de_repuestos_fk` FOREIGN KEY (`vtr_em_id`) REFERENCES `empleado` (`em_id`),
  CONSTRAINT `nota_de_venta_ventas_de_repuestos_fk` FOREIGN KEY (`vtr_nt_id`) REFERENCES `nota_de_venta` (`nt_id`),
  CONSTRAINT `proforma_ventas_de_repuestos_fk` FOREIGN KEY (`vtr_pf_id`) REFERENCES `proforma` (`pf_id`),
  CONSTRAINT `repuesto_ventas_de_repuestos_fk` FOREIGN KEY (`vtr_rp_id`) REFERENCES `repuesto` (`rp_id`),
  CONSTRAINT `venta_detalle_repuestos_ventas_de_repuestos_fk` FOREIGN KEY (`vtr_vdr_id`) REFERENCES `venta_detalle_repuestos` (`vdr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.ventas_de_repuestos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_cisne.ventas_de_vehiculo
CREATE TABLE IF NOT EXISTS `ventas_de_vehiculo` (
  `vtv_id` int NOT NULL AUTO_INCREMENT,
  `vtv_serie` varchar(8) NOT NULL,
  `vtv_numero` decimal(10,2) NOT NULL,
  `vtv_fecha` date NOT NULL,
  `vtv_igv_total` decimal(10,2) NOT NULL,
  `vtv_valor_venta_total` decimal(10,2) NOT NULL,
  `vtv_importe_total` decimal(10,2) NOT NULL,
  `vtv_estado` varchar(30) NOT NULL,
  `vtv_vdv_id` int NOT NULL,
  `vtv_cl_id` int NOT NULL,
  `vtv_vh_id` int NOT NULL,
  `vtv_em_id` int NOT NULL,
  `vtv_nt_id` int NOT NULL,
  `vtv_pf_id` int NOT NULL,
  PRIMARY KEY (`vtv_id`),
  KEY `vehiculo_ventas_de_vehiculo_fk` (`vtv_vh_id`),
  KEY `empleado_ventas_de_vehiculo_fk` (`vtv_em_id`),
  KEY `cliente_ventas_de_vehiculo_fk` (`vtv_cl_id`),
  KEY `nota_de_venta_ventas_de_vehiculo_fk` (`vtv_nt_id`),
  KEY `proforma_ventas_de_vehiculo_fk` (`vtv_pf_id`),
  KEY `venta_detalle_vehiculo_ventas_de_vehiculo_fk` (`vtv_vdv_id`),
  CONSTRAINT `cliente_ventas_de_vehiculo_fk` FOREIGN KEY (`vtv_cl_id`) REFERENCES `cliente` (`cl_id`),
  CONSTRAINT `empleado_ventas_de_vehiculo_fk` FOREIGN KEY (`vtv_em_id`) REFERENCES `empleado` (`em_id`),
  CONSTRAINT `nota_de_venta_ventas_de_vehiculo_fk` FOREIGN KEY (`vtv_nt_id`) REFERENCES `nota_de_venta` (`nt_id`),
  CONSTRAINT `proforma_ventas_de_vehiculo_fk` FOREIGN KEY (`vtv_pf_id`) REFERENCES `proforma` (`pf_id`),
  CONSTRAINT `vehiculo_ventas_de_vehiculo_fk` FOREIGN KEY (`vtv_vh_id`) REFERENCES `vehiculo` (`vh_id`),
  CONSTRAINT `venta_detalle_vehiculo_ventas_de_vehiculo_fk` FOREIGN KEY (`vtv_vdv_id`) REFERENCES `venta_detalle_vehiculo` (`vdv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.ventas_de_vehiculo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_cisne.venta_detalle_repuestos
CREATE TABLE IF NOT EXISTS `venta_detalle_repuestos` (
  `vdr_id` int NOT NULL AUTO_INCREMENT,
  `vdr_cantidad` decimal(10,2) NOT NULL,
  `vdr_precio_unitario` decimal(10,2) NOT NULL,
  `vdr_igv_item` decimal(10,2) NOT NULL,
  `vdr_valor_venta_item` decimal(10,2) NOT NULL,
  `vdr_estado` varchar(30) NOT NULL,
  `vdr_pd_id` int NOT NULL,
  `vdr_pp_id` int NOT NULL,
  `vdr_mp_id` int NOT NULL,
  PRIMARY KEY (`vdr_id`),
  KEY `metodo_de_pago_venta_detalle_repuestos_fk` (`vdr_mp_id`),
  KEY `pedido_proveedor_venta_detalle_repuestos_fk` (`vdr_pp_id`),
  KEY `promociones_y_descuentos_venta_detalle_repuestos_fk` (`vdr_pd_id`),
  CONSTRAINT `metodo_de_pago_venta_detalle_repuestos_fk` FOREIGN KEY (`vdr_mp_id`) REFERENCES `metodo_de_pago` (`mp_id`),
  CONSTRAINT `pedido_proveedor_venta_detalle_repuestos_fk` FOREIGN KEY (`vdr_pp_id`) REFERENCES `pedido_proveedor` (`pp_id`),
  CONSTRAINT `promociones_y_descuentos_venta_detalle_repuestos_fk` FOREIGN KEY (`vdr_pd_id`) REFERENCES `promociones_y_descuentos` (`pd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_detalle_repuestos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_cisne.venta_detalle_servicios
CREATE TABLE IF NOT EXISTS `venta_detalle_servicios` (
  `vds_id` int NOT NULL AUTO_INCREMENT,
  `vds_cantidad` decimal(10,2) NOT NULL,
  `vds_precio_unitario` decimal(10,2) NOT NULL,
  `vds_igv_item` decimal(10,2) NOT NULL,
  `vds_valor_venta_item` decimal(10,2) NOT NULL,
  `vds_estado` varchar(30) NOT NULL,
  `vds_pd_id` int NOT NULL,
  `vds_pp_id` int NOT NULL,
  `vds_mp_id` int NOT NULL,
  PRIMARY KEY (`vds_id`),
  KEY `metodo_de_pago_venta_detalle_servicios_fk` (`vds_mp_id`),
  KEY `pedido_proveedor_venta_detalle_servicios_fk` (`vds_pp_id`),
  KEY `promociones_y_descuentos_venta_detalle_servicios_fk` (`vds_pd_id`),
  CONSTRAINT `metodo_de_pago_venta_detalle_servicios_fk` FOREIGN KEY (`vds_mp_id`) REFERENCES `metodo_de_pago` (`mp_id`),
  CONSTRAINT `pedido_proveedor_venta_detalle_servicios_fk` FOREIGN KEY (`vds_pp_id`) REFERENCES `pedido_proveedor` (`pp_id`),
  CONSTRAINT `promociones_y_descuentos_venta_detalle_servicios_fk` FOREIGN KEY (`vds_pd_id`) REFERENCES `promociones_y_descuentos` (`pd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_detalle_servicios: ~3 rows (aproximadamente)
INSERT INTO `venta_detalle_servicios` (`vds_id`, `vds_cantidad`, `vds_precio_unitario`, `vds_igv_item`, `vds_valor_venta_item`, `vds_estado`, `vds_pd_id`, `vds_pp_id`, `vds_mp_id`) VALUES
	(1, 1.00, 25.00, 4.50, 20.50, 'Completado', 1, 1, 1),
	(2, 2.00, 50.00, 9.00, 41.00, 'Pendiente', 2, 2, 2),
	(3, 3.00, 40.00, 7.20, 32.80, 'Cancelado', 3, 3, 3);

-- Volcando estructura para tabla db_cisne.venta_detalle_vehiculo
CREATE TABLE IF NOT EXISTS `venta_detalle_vehiculo` (
  `vdv_id` int NOT NULL AUTO_INCREMENT,
  `vdv_cantidad` decimal(10,2) NOT NULL,
  `vdv_precio_unitario` decimal(10,2) NOT NULL,
  `vdv_igv_item` decimal(10,2) NOT NULL,
  `vdv_valor_venta_item` decimal(10,2) NOT NULL,
  `vdv_estado` varchar(30) NOT NULL,
  `vdv_pd_id` int NOT NULL,
  `vdv_pp_id` int NOT NULL,
  `vdv_mp_id` int NOT NULL,
  PRIMARY KEY (`vdv_id`),
  KEY `metodo_de_pago_venta_detalle_vehiculo_fk` (`vdv_mp_id`),
  KEY `pedido_proveedor_venta_detalle_vehiculo_fk` (`vdv_pp_id`),
  KEY `promociones_y_descuentos_venta_detalle_vehiculo_fk` (`vdv_pd_id`),
  CONSTRAINT `metodo_de_pago_venta_detalle_vehiculo_fk` FOREIGN KEY (`vdv_mp_id`) REFERENCES `metodo_de_pago` (`mp_id`),
  CONSTRAINT `pedido_proveedor_venta_detalle_vehiculo_fk` FOREIGN KEY (`vdv_pp_id`) REFERENCES `pedido_proveedor` (`pp_id`),
  CONSTRAINT `promociones_y_descuentos_venta_detalle_vehiculo_fk` FOREIGN KEY (`vdv_pd_id`) REFERENCES `promociones_y_descuentos` (`pd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_detalle_vehiculo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla db_cisne.venta_de_servicio
CREATE TABLE IF NOT EXISTS `venta_de_servicio` (
  `vts_id` int NOT NULL AUTO_INCREMENT,
  `vts_serie` varchar(8) NOT NULL,
  `vts_numero` decimal(10,2) NOT NULL,
  `vts_fecha` date NOT NULL,
  `vts_igv_total` decimal(10,2) NOT NULL,
  `vts_valor_venta_total` decimal(10,2) NOT NULL,
  `vts_importe_total` decimal(10,2) NOT NULL,
  `vts_estado` varchar(30) NOT NULL,
  `vts_vds_id` int NOT NULL,
  `vts_cl_id` int NOT NULL,
  `vts_em_id` int NOT NULL,
  `vts_sr_id` int NOT NULL,
  `vts_nt_id` int NOT NULL,
  `vts_pf_id` int NOT NULL,
  PRIMARY KEY (`vts_id`),
  KEY `servicio_venta_de_servicio_fk` (`vts_sr_id`),
  KEY `empleado_venta_de_servicio_fk` (`vts_em_id`),
  KEY `cliente_venta_de_servicio_fk` (`vts_cl_id`),
  KEY `nota_de_venta_venta_de_servicio_fk` (`vts_nt_id`),
  KEY `proforma_venta_de_servicio_fk` (`vts_pf_id`),
  KEY `venta_detalle_servicios_venta_de_servicio_fk` (`vts_vds_id`),
  CONSTRAINT `cliente_venta_de_servicio_fk` FOREIGN KEY (`vts_cl_id`) REFERENCES `cliente` (`cl_id`),
  CONSTRAINT `empleado_venta_de_servicio_fk` FOREIGN KEY (`vts_em_id`) REFERENCES `empleado` (`em_id`),
  CONSTRAINT `nota_de_venta_venta_de_servicio_fk` FOREIGN KEY (`vts_nt_id`) REFERENCES `nota_de_venta` (`nt_id`),
  CONSTRAINT `proforma_venta_de_servicio_fk` FOREIGN KEY (`vts_pf_id`) REFERENCES `proforma` (`pf_id`),
  CONSTRAINT `servicio_venta_de_servicio_fk` FOREIGN KEY (`vts_sr_id`) REFERENCES `servicio` (`sr_id`),
  CONSTRAINT `venta_detalle_servicios_venta_de_servicio_fk` FOREIGN KEY (`vts_vds_id`) REFERENCES `venta_detalle_servicios` (`vds_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_de_servicio: ~3 rows (aproximadamente)
INSERT INTO `venta_de_servicio` (`vts_id`, `vts_serie`, `vts_numero`, `vts_fecha`, `vts_igv_total`, `vts_valor_venta_total`, `vts_importe_total`, `vts_estado`, `vts_vds_id`, `vts_cl_id`, `vts_em_id`, `vts_sr_id`, `vts_nt_id`, `vts_pf_id`) VALUES
	(1, 'VTS001', 1.00, '2024-06-01', 4.50, 20.50, 25.00, 'Completado', 1, 1, 1, 1, 1, 1),
	(2, 'VTS002', 2.00, '2024-06-02', 9.00, 41.00, 50.00, 'Pendiente', 2, 2, 2, 2, 2, 2),
	(3, 'VTS003', 3.00, '2024-06-03', 7.20, 32.80, 40.00, 'Cancelado', 3, 3, 3, 3, 3, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
