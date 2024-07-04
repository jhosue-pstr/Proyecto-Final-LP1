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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.cliente: ~7 rows (aproximadamente)
INSERT INTO `cliente` (`cl_id`, `cl_dni`, `cl_nombre`, `cl_direccion`, `cl_correo`, `cl_celular`, `cl_usuario`, `cl_contraseña`) VALUES
	(1, '23423423', 'Pedro López', 'Av. Cliente 123', 'pedro@cliente.com', '987654321', 'pedrol', '12345'),
	(2, '235235', 'María Rodríguez', 'Calle Cliente 456', 'maria@cliente.com', '123456789', 'mariar', '54321'),
	(3, '2352352', 'Luis González', 'Av. Ejemplo 789', 'luis@cliente.com', '456789123', 'luisg', '98765'),
	(4, '76606525', 'jhosue', 'av.emancipacion jr,chupa', 'ronald1pasot@gmail.com', '944501816', 'ronald1pasot@gmail.com', '123'),
	(8, '701612024', 'liz', 'pastor', 'lizpstr@gmail.com', '950357078', 'lizpstr@gmail.com', 'holaliz123'),
	(9, '20006955', 'Juan Michel', 'Pastor Terreros', 'juan123@gmail.com', '65564654', 'juan123@gmail.com', '123'),
	(10, '72198998', 'moises', 'plaza de armas', 'moisesjoaquin@gmail.com', '9656456', 'moises', '123');

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
	(1, 1, 3);

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
	(1, 'anguel concha', 'Av. Ejemplo 123', 'anguel@chevrolet.com', '987654321', 'anguel', '123', 'gerente'),
	(2, 'lizbeth ', 'Calle Ejemplo 456', 'lizbeth@chevrolet.com', '123456789', 'lizbeth', '123', 'gestora'),
	(3, 'domindo', 'Av. Prueba 789', 'domingo@chevrolet.com', '456789123', 'domingo', '123', 'asesor de ventas'),
	(4, 'balver', 'Av. Ejemplo 123', 'balver@chevrolet.com', '987654321', 'balver', '123', 'asesor de ventas'),
	(5, 'wilder', 'Calle 123, Ciudad A', 'wilber@chevrolet.com', '123456789', 'wilber', '123', 'Asesor de ventas'),
	(6, 'anguel concha', 'Av. Principal 456, Ciudad B', 'anguel1@chevrolet.com', '987654321', 'anguel', '123', 'jefe de venta'),
	(7, 'Carlos López', 'Carrera 789, Ciudad C', 'carlos.lopez@example.com', '456789012', 'carloslopez', '123', 'gestora'),
	(8, 'María Martínez', 'Calle Secundaria 234, Ciudad D', 'maria.martinez@example.com', '321654987', 'mariamartinez', '123', 'asesor de ventas'),
	(9, 'Pedro Sánchez', 'Av. Central 567, Ciudad E', 'pedro.sanchez@example.com', '789012345', 'pedrosanchez', '123', 'Asesor de ventas');

-- Volcando estructura para tabla db_cisne.historial_de_servicios
CREATE TABLE IF NOT EXISTS `historial_de_servicios` (
  `hvs_id` int NOT NULL AUTO_INCREMENT,
  `hvs_fecha_y_hora` date NOT NULL,
  `hvs_descripcion` varchar(300) NOT NULL,
  `hvs_vts_id` int NOT NULL,
  PRIMARY KEY (`hvs_id`),
  KEY `venta_de_servicio_historial_de_servicios_fk` (`hvs_vts_id`),
  CONSTRAINT `venta_de_servicio_historial_de_servicios_fk` FOREIGN KEY (`hvs_vts_id`) REFERENCES `venta_de_servicio` (`vts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_de_servicios: ~10 rows (aproximadamente)
INSERT INTO `historial_de_servicios` (`hvs_id`, `hvs_fecha_y_hora`, `hvs_descripcion`, `hvs_vts_id`) VALUES
	(1, '2023-04-15', 'Mantenimiento regular y revisión de motor.', 1),
	(2, '2023-06-05', 'Cambio de aceite y filtro según especificaciones del fabricante.', 2),
	(3, '2023-07-20', 'Reparación de sistema de frenos y verificación general de seguridad.', 3),
	(4, '2024-07-05', 'Cambio de pastilla', 4),
	(5, '2024-07-04', 'Inspeccion de Vehiculo, limpieza y detalle ', 5),
	(6, '2024-07-13', 'Reparacion Mecanica ', 6),
	(7, '2024-07-16', 'Instalacion de Accesorios', 7),
	(8, '2024-07-18', 'Inspeccion de Vehiculo, Instalacion de Accesorios', 8),
	(9, '2024-07-20', 'Servicio de alineacion, servicio de lavado', 9),
	(10, '2024-07-21', 'Limpieza y Detalle', 10);

-- Volcando estructura para tabla db_cisne.historial_de_ventas_repuesto
CREATE TABLE IF NOT EXISTS `historial_de_ventas_repuesto` (
  `hvr_id` int NOT NULL AUTO_INCREMENT,
  `hvr_fecha_y_hora` date NOT NULL,
  `hvr_descripcion` varchar(300) NOT NULL,
  `hvr_vtr_id` int NOT NULL,
  PRIMARY KEY (`hvr_id`),
  KEY `ventas_de_repuestos_historial_de_ventas_repuesto__fk` (`hvr_vtr_id`),
  CONSTRAINT `ventas_de_repuestos_historial_de_ventas_repuesto__fk` FOREIGN KEY (`hvr_vtr_id`) REFERENCES `ventas_de_repuestos` (`vtr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_de_ventas_repuesto: ~10 rows (aproximadamente)
INSERT INTO `historial_de_ventas_repuesto` (`hvr_id`, `hvr_fecha_y_hora`, `hvr_descripcion`, `hvr_vtr_id`) VALUES
	(1, '2024-07-03', 'El [10 de junio de 2024], se realizó la venta de un filtro de aceite para Chevrolet Tracker a Luis Fernández (DNI 12345678). El precio unitario del repuesto fue de S/ 50, con un 5% de descuento', 1),
	(2, '2024-07-04', 'El [18 de junio de 2024], se efectuó la venta de pastillas de freno para Chevrolet Onix a Ana López (DNI 87654321). El precio unitario de las pastillas de freno era S/ 120, con un 10% de descuento', 4),
	(3, '2024-07-05', 'El [25 de junio de 2024], se completó la venta de una batería para Chevrolet Trailblazer a Carlos Torres (DNI 13579246).El [25 de junio de 2024], se completó la venta de una batería para Chevrolet Trailblazer a Carlos Torres (DNI 13579246).', 4),
	(4, '2024-07-06', 'El [30 de junio de 2024], se realizó la venta de un juego de filtros para Chevrolet Malibu a Elena Sánchez (DNI 22334455). ', 8),
	(5, '2024-07-08', 'El [8 de julio de 2024], se concretó la venta de un alternador para Chevrolet Spark a Andrés Ruiz (DNI 55667788). El precio del repuesto fue de S/ 350, con un 8% de descuento por ser un cliente frecuente', 10),
	(6, '2024-07-09', 'El [15 de julio de 2024], se llevó a cabo la venta de amortiguadores para Chevrolet Equinox a Mariana Díaz (DNI 99887766). El precio unitario de los amortiguadores era de S/ 180, con un 20% de descuento ', 8),
	(7, '2024-07-16', 'El [22 de julio de 2024], se efectuó la venta de una bomba de agua para Chevrolet Malibu a Roberto González (DNI 22334455). El precio del repuesto fue de S/ 240, con un 7% de descuento por la compra urgente', 7),
	(8, '2024-07-18', 'El [30 de julio de 2024], se llevó a cabo la venta de un kit de correa de distribución para Chevrolet Aveo a Carla Fernández (DNI 44556677). El precio del repuesto fue de S/ 120, con un 10% de descuento', 3),
	(9, '2024-07-20', 'El [5 de agosto de 2024], se completó la venta de aceite de motor para Chevrolet Sonic a Manuel Fernández (DNI 33445566). Se compraron 10 unidades a un precio unitario de S/ 30, con un 12% de descuento', 1),
	(10, '2024-07-22', 'El [12 de agosto de 2024], se llevó a cabo la venta de un sensor de estacionamiento para Chevrolet Tracker a Hugo Pérez (DNI 55667788). El precio del repuesto fue de S/ 90, con un 5% de descuento debido a la devolución previa de un repuesto incorrecto,', 5);

-- Volcando estructura para tabla db_cisne.historial_de_ventas_vehiculo
CREATE TABLE IF NOT EXISTS `historial_de_ventas_vehiculo` (
  `hv_id` int NOT NULL AUTO_INCREMENT,
  `hv_fecha_y_hora` date NOT NULL,
  `hv_descripcion` varchar(300) NOT NULL,
  `hv_vtv_id` int NOT NULL,
  PRIMARY KEY (`hv_id`),
  KEY `ventas_de_vehiculo_historial_de_ventas_vehiculo_fk` (`hv_vtv_id`),
  CONSTRAINT `ventas_de_vehiculo_historial_de_ventas_vehiculo_fk` FOREIGN KEY (`hv_vtv_id`) REFERENCES `ventas_de_vehiculo` (`vtv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_de_ventas_vehiculo: ~10 rows (aproximadamente)
INSERT INTO `historial_de_ventas_vehiculo` (`hv_id`, `hv_fecha_y_hora`, `hv_descripcion`, `hv_vtv_id`) VALUES
	(1, '2024-07-03', 'Se realizó la venta del Chevrolet Tracker 2024, color blanco, a Juan Pérez con DNI 12345678. El precio inicial del vehículo fue de S/ 45,000, con un descuento del 10% por promoción de fin de año, resultando en un precio final de S/ 40,500. Se aplicó un IGV del 18% (S/ 7,290)', 1),
	(2, '2024-07-04', '"La venta del Chevrolet Onix 2023, color rojo, se realizó a María Fernández con DNI 87654321. El precio de venta del vehículo fue de S/ 35,000, sin descuentos aplicables. Se calculó un IGV del 18% (S/ 6,300)', 2),
	(3, '2024-07-05', 'Se completó la venta del Chevrolet Trailblazer 2024, color gris, a Carlos Gómez con DNI 13579246. El precio de venta fue de S/ 60,000, con un 5% de descuento por compra anticipada, lo que resultó en un precio final de S/ 57,000. Se aplicó un IGV del 18% (S/ 10,260)', 3),
	(4, '2024-07-06', 'La venta del Chevrolet Spin 2023, color plata, se llevó a cabo con Laura Martínez, DNI 65432198. El precio original del vehículo era S/ 30,000, pero se aplicó un 7% de descuento por un evento de ventas, resultando en un precio final de S/ 27,900', 4),
	(5, '2024-07-07', 'El [Fecha], se realizó la venta del [Modelo del Vehículo] a [Nombre del Cliente]. El precio inicial fue de [Precio de Venta], con un [Descuento Aplicado]. El precio final después del descuento fue de', 8),
	(6, '2024-07-08', 'El [Fecha], [Nombre del Cliente] adquirió un [Modelo del Vehículo] aprovechando una oferta especial. El precio del vehículo fue de [Precio de Venta],', 10),
	(7, '2024-07-09', 'El [20 de julio de 2024], se concretó la venta del Chevrolet Equinox 2024, color azul, a Javier López (DNI 98765432). El precio inicial del vehículo fue de S/ 75,000', 9),
	(8, '2024-07-10', 'El [28 de julio de 2024], se llevó a cabo la venta del Chevrolet Camaro 2024, color negro, a Ana Morales (DNI 54321678). El precio del vehículo fue de S/ 90,000, con un 12% de descuento por el lanzamiento del nuevo modelo, resultando en un precio final de S/ 79,200', 7),
	(9, '2024-07-12', 'El [5 de agosto de 2024], se realizó la venta del Chevrolet Aveo 2023, color verde, a Felipe Ortega (DNI 11223344). El precio del vehículo fue de S/ 32,000,', 4),
	(10, '2024-07-14', 'El [15 de agosto de 2024], se concretó la venta del Chevrolet Tracker 2023, color plata, a Teresa Hernández (DNI 33445566). El precio de venta del vehículo fue de S/ 55,000, con un 7% de descuento como parte de un incentivo por recomendación de un cliente anterior', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_separacion_repuestos: ~10 rows (aproximadamente)
INSERT INTO `historial_separacion_repuestos` (`hpr_id`, `hpr_descripcion`, `hpr_codigo`, `hpr_rp_id`, `hpr_cl_id`, `hpr_mp_id`) VALUES
	(1, 'Separación de filtro de aceite', 'HSR001', 1, 1, 1),
	(2, 'Separación de pastillas de freno', 'HSR002', 2, 2, 2),
	(3, 'Separación de batería', 'HSR003', 3, 3, 3),
	(4, 'Separacion de Amortiguadores', 'HSR004', 2, 3, 5),
	(5, 'Separacion de radiador', 'HSR005', 14, 3, 5),
	(6, 'Separacion de Correa de distribucion', 'HSR006', 15, 2, 5),
	(7, 'Separacion de Alternador ', 'HSR007', 3, 9, 2),
	(8, 'Separacion de Sensor de oxigeno', 'HSR008', 15, 1, 1),
	(9, 'Separacion Sensor Maf', 'HSR009', 7, 2, 3),
	(10, 'Separacion de Tubo de escape', 'HSR010', 3, 1, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_separacion_servicios: ~10 rows (aproximadamente)
INSERT INTO `historial_separacion_servicios` (`hps_id`, `hps_descripcion`, `hps_codigo`, `hps_sr_id`, `hps_cl_id`, `hps_mp_id`) VALUES
	(1, 'Separación de servicio de lavado', 'HSS001', 1, 1, 1),
	(2, 'Separación de servicio de cambio de aceite', 'HSS002', 2, 2, 2),
	(3, 'Separación de servicio de alineación', 'HSS003', 3, 3, 3),
	(4, 'Cambio de pastilla', 'HSS004', 1, 1, 1),
	(5, 'Limpieza y detalle', 'HSS005', 1, 1, 1),
	(6, 'Cambio de aceite', 'HSS006', 1, 1, 1),
	(7, 'Instalacion de accesorios', 'HSS007', 4, 4, 4),
	(8, 'Reparacion Mecanica ', 'HSS008', 2, 2, 1),
	(9, 'Inspeccion de Vehiculo', 'HSS009', 4, 1, 3),
	(10, 'Instalacion de Accesorios', 'HSS010', 3, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.historial_separacion_vehiculos: ~10 rows (aproximadamente)
INSERT INTO `historial_separacion_vehiculos` (`hp_id`, `hp_descripcion`, `hp_codigo`, `hp_vh_id`, `hp_cl_id`, `hp_mp_id`) VALUES
	(1, 'Separación de vehículo ', 'HSV001', 1, 1, 1),
	(2, 'Separación de vehículo ', 'HSV002', 2, 2, 2),
	(3, 'Separación de vehículo ', 'HSV003', 3, 3, 3),
	(4, 'Separación de vehículo ', 'HSV004', 1, 1, 1),
	(5, 'Separación de vehículo ', 'HSV005', 3, 1, 3),
	(6, 'Separación de vehículo ', 'HSV006', 12, 1, 2),
	(7, 'Separación de vehículo ', 'HSV007', 3, 2, 5),
	(8, 'Separación de vehículo ', 'HSV008', 4, 1, 2),
	(9, 'Separación de vehículo ', 'HSV009', 4, 1, 1),
	(10, 'Separación de vehículo ', 'HSV010', 2, 1, 4);

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

-- Volcando estructura para tabla db_cisne.notificaciones
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `not_id` int NOT NULL AUTO_INCREMENT,
  `not_empleado_id1` int NOT NULL,
  `not_empleado_id2` int NOT NULL,
  `not_titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `not_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `not_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`not_id`) USING BTREE,
  KEY `fk_notificaciones_empleado1` (`not_empleado_id1`),
  KEY `fk_notificaciones_empleado2` (`not_empleado_id2`),
  CONSTRAINT `fk_notificaciones_empleado1` FOREIGN KEY (`not_empleado_id1`) REFERENCES `empleado` (`em_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_notificaciones_empleado2` FOREIGN KEY (`not_empleado_id2`) REFERENCES `empleado` (`em_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.notificaciones: ~10 rows (aproximadamente)
INSERT INTO `notificaciones` (`not_id`, `not_empleado_id1`, `not_empleado_id2`, `not_titulo`, `not_descripcion`, `not_fecha`) VALUES
	(1, 6, 6, '¡Bienvenido a [Nombre de la ¡Nueva Tarea Asignada!', 'Revisa los detalles de la tarea en el panel de tareas y asegúrate de completarla a tiempo.', '2024-07-04 04:49:49'),
	(2, 1, 2, '¡Recordatorio de Reunión!', 'No olvides la reunión de equipo a las [Hora] del [Fecha]. Agenda: [Temas de la Reunión]. ¡Tu presencia es importante!', '2024-07-04 05:02:58'),
	(3, 1, 2, '¡Actualización en Políticas de la Empresa!¡Actualización en Políticas de la Empresa!', 'Revisa las nuevas políticas. Se han actualizado las políticas internas. Por favor, léelas en el [Enlace a Políticas].', '2024-07-04 05:04:15'),
	(4, 1, 2, '¡Promoción del Mes!', 'Revisa la nueva promoción del mes y actualiza la información en tu área de ventas para informar a los clientes.', '2024-07-04 06:09:22'),
	(5, 2, 3, '¡Recordatorio de Mantenimiento de Equipos!', 'No olvides el mantenimiento. El equipo [Nombre del Equipo] debe ser revisado hoy. Sigue las instrucciones en [Enlace a Procedimientos]', '2024-07-04 08:44:39'),
	(6, 7, 7, '¡Anuncio de Nuevas Horas de Trabajo!', '¡Cambio en el horario! A partir del [Fecha], el horario de trabajo será [Nuevo Horario]. Revisa el [Enlace a Horarios].', '2024-07-04 08:46:18'),
	(7, 3, 2, '¡Actualización en Inventario!', 'El inventario ha sido actualizado. Revisa las nuevas existencias y actualiza tus registros en el sistema.', '2024-07-04 08:47:36'),
	(8, 1, 2, '¡Aviso de Vacaciones!', '¡Vacaciones Aprobadas! Tu solicitud de vacaciones del [Fecha de Inicio] al [Fecha de Fin] ha sido aprobada.', '2024-07-04 08:47:58'),
	(9, 7, 7, '¡Tarea de Fin de Mes!	', '¡No olvides las tareas de fin de mes! Completa el reporte de ventas y revisa el inventario antes del [Fecha].¡No olvides las tareas de fin de mes! Completa el reporte de ventas y revisa el inventario antes del [Fecha].', '2024-07-04 08:48:21'),
	(10, 5, 6, '¡Cambio en el Personal!¡Cambio en el Personal!', 'Actualización en el equipo. [Nombre del Nuevo Empleado] se une a nuestro equipo como [Puesto]. Dale la bienvenida.Actualización en el equipo. [Nombre del Nuevo Empleado] se une a nuestro equipo como [Puesto]. Dale la bienvenida.', '2024-07-04 08:48:49');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.pedido_proveedor: ~10 rows (aproximadamente)
INSERT INTO `pedido_proveedor` (`pp_id`, `pp_serie`, `pp_numero`, `pp_tipo_de_comprobante`, `pp_estado`, `pp_pv_id`) VALUES
	(1, 'A001', 1.00, 'Factura', 'Pendiente', 1),
	(2, 'A002', 2.00, 'Boleta', 'Completado', 2),
	(3, 'A003', 3.00, 'Factura', 'Cancelado', 3),
	(4, 'A004', 4.00, 'Factura', 'Cancelado', 3),
	(5, 'A005', 5.00, 'Factura', 'Cancelado', 2),
	(6, 'A006', 6.00, 'FACTURA', 'CANCELADO', 2),
	(7, 'A007', 6.00, 'Boleta', 'Cancelado', 1),
	(8, 'A008', 7.00, 'Boleta', 'Cancelado', 1),
	(9, 'A009', 8.00, 'BOLETA', 'Cancelado', 2),
	(10, 'A010', 9.00, 'Factura', 'Cancelado', 3);

-- Volcando estructura para tabla db_cisne.proforma
CREATE TABLE IF NOT EXISTS `proforma` (
  `pf_id` int NOT NULL AUTO_INCREMENT,
  `pf_fecha` date NOT NULL,
  `vh_id` int DEFAULT NULL,
  `em_id` int DEFAULT NULL,
  `cl_id` int DEFAULT NULL,
  PRIMARY KEY (`pf_id`),
  KEY `fk_vh_id` (`vh_id`),
  KEY `fk_em_id` (`em_id`),
  KEY `fk_cl_id` (`cl_id`),
  CONSTRAINT `fk_em_id` FOREIGN KEY (`em_id`) REFERENCES `empleado` (`em_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.proforma: ~10 rows (aproximadamente)
INSERT INTO `proforma` (`pf_id`, `pf_fecha`, `vh_id`, `em_id`, `cl_id`) VALUES
	(1, '2024-06-01', 6, 1, 3),
	(2, '2024-06-02', 4, 4, 3),
	(3, '2024-06-03', 5, 7, 2),
	(4, '2024-07-04', 4, 7, 2),
	(5, '2024-07-05', 2, 3, 1),
	(6, '2024-07-06', 2, 4, 3),
	(7, '2024-07-07', 6, 2, 1),
	(8, '2024-07-09', 11, 5, 6),
	(9, '2024-07-10', 4, 8, 3),
	(10, '2024-07-11', 2, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.promociones_y_descuentos: ~10 rows (aproximadamente)
INSERT INTO `promociones_y_descuentos` (`pd_id`, `pd_nombre_promocion`, `pd_descripcion`, `pd_monto`, `pd_condiciones`, `pd_fecha_inicio`, `pd_fecha_fin`) VALUES
	(1, 'Descuento de Verano', '10% de descuento en todos los servicios', 10.00, 'Aplica solo a servicios', '2024-06-01', '2024-06-30'),
	(2, 'Promoción de Invierno', '15% de descuento en repuestos seleccionados', 15.00, 'Aplica solo a repuestos', '2024-07-01', '2024-07-31'),
	(3, 'Descuento de Primavera', '5% de descuento en compras mayores a $100', 5.00, 'Compras mayores a $100', '2024-08-01', '2024-08-31'),
	(4, 'Descuento Año Nuevo', '10% de descuentos en autos ', 80.00, 'Aplica a solo autos', '2024-12-29', '2024-12-30'),
	(5, 'Descuento dia del  Amor', '5% de descuento en autos', 30.00, 'Aplica solo autos', '2024-07-06', '2024-07-19'),
	(6, 'Descuento Dia del Padre', '5% de descuento en repuestos y autos', 50.00, 'Compras mayores a $100', '2024-07-06', '2024-07-19'),
	(7, 'Descuento del Dial  Trabajador', '8% de descuento en repuestos y autos ', 40.00, 'Compras mayores a $100', '2024-07-06', '2024-07-19'),
	(8, 'Descuento de Aniversario ', '12% de descuento en repuestos y autos', 100.00, 'compras mayores a $100', '2024-07-10', '2024-07-11'),
	(9, 'Descuento Halloween', '6% de dewsecuento en repuestos', 30.00, 'Aplica solo a repuestos', '2024-07-09', '2024-07-15'),
	(10, 'Descuento Black Friday', '15% descuento en repuestos y autos', 120.00, 'Compras mayores a $100', '2024-07-04', '2024-07-09');

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
  `rp_imagen` varchar(255) NOT NULL,
  `rp_descripcion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.repuesto: ~25 rows (aproximadamente)
INSERT INTO `repuesto` (`rp_id`, `rp_marca`, `rp_modelo`, `rp_precio_base`, `rp_estado`, `rp_nombre`, `rp_codigo`, `rp_imagen`, `rp_descripcion`) VALUES
	(1, 'AC Delco', 'A3138C', 15.00, 'Nuevo', 'Filtro de Aceite', 'RP001', 'imagenes/repuesto1.png', 'La principal función que tiene el filtro de aire de un vehículo es la de retener, en la medida de lo posible, las posibles impurezas que puedan acceder al circuito de admisión\n'),
	(2, 'AC Delco', 'PF457G', 8.00, 'Nuevo', 'Filtro de aceite', 'RP002', 'imagenes/repuesto2.png', 'Dispositivo que elimina impurezas del aceite del motor para proteger y mantener limpios los componentes del mismo.'),
	(3, 'AC Delco', '48AGM', 150.00, 'Nuevo', 'Batería', 'RP003', 'imagenes/repuesto3.png', 'Almacena energía eléctrica para el arranque y funcionamiento de un vehículo, con tecnología AGM para mayor durabilidad y rendimiento.'),
	(4, 'AC Delco', '171-0966', 50.00, 'Nuevo', 'Pastillas de freno', 'RP004', 'imagenes/repuesto4.png', ' Componente clave en el sistema de frenado que proporciona fricción para detener el vehículo de manera efectiva y segura.\n'),
	(5, 'AC Delco', '18A1705', 80.00, 'Nuevo', 'Discos de freno', 'RP005', 'imagenes/repuesto5.png', 'Superficies metálicas donde las pastillas de freno aplican presión para detener el vehículo, disipando el calor generado'),
	(6, 'AC Delco', '41-110', 6.00, 'Nuevo', 'Bujías', 'RP006', 'imagenes/repuesto6.png', 'Generan chispas eléctricas en el motor de combustión interna para encender la mezcla de aire y combustible.'),
	(7, 'Monroe', '58637', 80.00, 'Nuevo', 'Amortiguadores', 'RP007', 'imagenes/repuesto7.png', 'Controlan la oscilación de la suspensión del vehículo, proporcionando confort y estabilidad en el manejo.'),
	(8, 'AC Delco', '21566', 200.00, 'Nuevo', 'Radiador', 'RP008', 'imagenes/repuesto8.png', 'Dispositivo que disipa el calor generado por el motor, manteniendo la temperatura óptima de funcionamiento.'),
	(9, 'Dayco', '95235K1', 50.00, 'Nuevo', 'Correa de distribución', 'RP009', 'imagenes/repuesto9.png', ' Sincroniza el movimiento entre el cigüeñal y el árbol de levas, asegurando el funcionamiento correcto del motor.'),
	(10, 'AC Delco', '252-700', 70.00, 'Nuevo', 'Bomba de agua', 'RP010', 'imagenes/repuesto10.png', 'Circula el líquido refrigerante a través del motor y del radiador para mantener la temperatura adecuada de operación.'),
	(11, 'AC Delco', '334-2112', 150.00, 'Nuevo', 'Alternador', 'RP011', 'imagenes/repuesto11.png', 'Genera energía eléctrica para cargar la batería y alimentar los sistemas eléctricos del vehículo.\n'),
	(12, 'Bosch', '15733', 50.00, 'Nuevo', 'Sensor de oxígeno', 'RP012', 'imagenes/repuesto12.png', 'Mide el nivel de oxígeno en los gases de escape para optimizar la mezcla aire-combustible y reducir las emisiones.'),
	(13, 'AC Delco', '217-3028', 100.00, 'Nuevo', 'Inyectores de combustible', 'RP013', 'imagenes/repuesto13.png', ' Dosifican y atomizan el combustible en el motor para una combustión eficiente y potencia adecuada.'),
	(14, 'AC Delco', '131-78', 20.00, 'Nuevo', 'Termostato', 'RP014', 'imagenes/repuesto14.png', 'egula la temperatura del motor abriendo y cerrando el flujo del líquido refrigerante hacia el radiador.'),
	(15, 'AC Delco', 'EP1022', 150.00, 'Nuevo', 'Bomba de combustible', 'RP015', 'imagenes/repuesto15.png', 'Transporta el combustible desde el tanque hasta el motor con la presión adecuada para la inyección.'),
	(16, 'AC Delco', '19212300', 30.00, 'Nuevo', 'Rotor del distribuidor', 'RP016', 'imagenes/repuesto16.png', 'Distribuye la corriente eléctrica a las bujías en el orden correcto para la ignición del motor.'),
	(17, 'AC Delco', '19245558', 10.00, 'Nuevo', 'Capuchón del distribuidor', 'RP017', 'imagenes/repuesto17.png', 'Aísla y protege los cables de encendido en el distribuidor, asegurando un buen funcionamiento eléctrico.'),
	(18, 'Valeo', '52252601', 300.00, 'Nuevo', 'Kit de embrague', 'RP018', 'imagenes/repuesto18.png', 'Conjunto de piezas que transmiten el movimiento del motor a la transmisión, permitiendo cambiar de marchas'),
	(19, ' AC Delco', '9748HH', 50.00, 'Nuevo', 'Cables de bujías', 'RP019', 'imagenes/repuesto19.png', 'Conducen la corriente eléctrica de la bobina a las bujías, asegurando una chispa adecuada para la ignición.'),
	(20, 'AC Delco', ' 213-354', 30.00, 'Nuevo', 'Sensor de posición ', 'RP020', 'imagenes/repuesto20.png', 'Detecta la posición de componentes como el acelerador o el árbol de levas, enviando la información al sistema de gestión del motor.'),
	(21, 'Walker', '54568', 100.00, 'Nuevo', 'Tubo de escape', 'RP021', 'imagenes/repuesto21.png', 'Conduce los gases de combustión desde el motor hasta el exterior del vehículo, reduciendo el ruido y las emisiones.'),
	(22, 'AC Delco', '214-559', 150.00, 'Nuevo', 'álvula EGR', 'RP022', 'imagenes/repuesto22.png', 'Recircula parte de los gases de escape al motor para reducir las emisiones de óxidos de nitrógeno.'),
	(23, 'AC Delco', '336-1876', 120.00, 'Nuevo', 'Motor de arranque', 'RP023', 'imagenes/repuesto23.png', 'Gira el motor de combustión interna para iniciar el ciclo de trabajo cuando se activa la llave de encendido.'),
	(24, 'Timken', 'P580310', 100.00, 'Nuevo', 'Cojinetes de rueda', 'RP024', 'imagenes/repuesto24.png', 'Soportan el peso del vehículo y permiten el giro suave de las ruedas sobre el eje.'),
	(25, ' AC Delco', '213-3428', 80.00, 'Nuevo', 'Sensor MAF', 'RP025', 'imagenes/repuesto25.png', 'Mide la cantidad de aire que ingresa al motor para calcular la cantidad de combustible necesaria, optimizando el rendimiento');

-- Volcando estructura para tabla db_cisne.repuestos_utilizados
CREATE TABLE IF NOT EXISTS `repuestos_utilizados` (
  `ru_id` int NOT NULL AUTO_INCREMENT,
  `rp_id` int NOT NULL,
  `cantidad_utilizada` int NOT NULL,
  `fecha_utilizacion` date NOT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ru_id`),
  KEY `rp_id` (`rp_id`),
  CONSTRAINT `fk_repuesto_id` FOREIGN KEY (`rp_id`) REFERENCES `repuesto` (`rp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.repuestos_utilizados: ~10 rows (aproximadamente)
INSERT INTO `repuestos_utilizados` (`ru_id`, `rp_id`, `cantidad_utilizada`, `fecha_utilizacion`, `detalle`) VALUES
	(1, 1, 2, '2024-07-02', 'servico de mantenimeitno'),
	(2, 2, 1, '2024-06-22', 'servicio de mantenimiento\r\n'),
	(3, 1, 4, '2024-07-04', 'reparacion mecanica'),
	(4, 3, 2, '2024-07-07', 'limpieza y detalle'),
	(5, 16, 1, '2024-07-05', 'Inspeccion de vehiculo'),
	(6, 2, 2, '2024-07-13', 'instalacion de accesorios'),
	(7, 20, 2, '2024-07-16', 'mantenimiento basico'),
	(8, 23, 1, '2024-07-17', 'mantenimiento basico'),
	(9, 25, 4, '2024-07-19', 'reparacion mecanica'),
	(10, 11, 1, '2024-07-23', 'limpieza y detalle');

-- Volcando estructura para tabla db_cisne.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `sr_id` int NOT NULL AUTO_INCREMENT,
  `sr_nombre` varchar(100) NOT NULL,
  `sr_descripcion` varchar(300) NOT NULL,
  `sr_precio_base` decimal(10,2) NOT NULL,
  `sr_fecha_y_hora` date NOT NULL,
  `sr_codigo` varchar(30) NOT NULL,
  PRIMARY KEY (`sr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.servicio: ~10 rows (aproximadamente)
INSERT INTO `servicio` (`sr_id`, `sr_nombre`, `sr_descripcion`, `sr_precio_base`, `sr_fecha_y_hora`, `sr_codigo`) VALUES
	(1, 'Lavado de Auto', 'Lavado completo del automóvil', 25.00, '2024-06-01', 'SR001'),
	(2, 'Cambio de Aceite', 'Cambio de aceite y filtro', 50.00, '2024-06-02', 'SR002'),
	(3, 'Alineación y Balanceo', 'Alineación y balanceo de las llantas', 40.00, '2024-06-03', 'SR003'),
	(4, 'Lavado de Auto', 'Lavado completo del automóvil', 25.00, '2024-06-01', 'SR001'),
	(5, 'Cambio de Aceite', 'Cambio de aceite y filtro', 50.00, '2024-06-02', 'SR002'),
	(6, 'Alineación y Balanceo', 'Alineación y balanceo de las llantas', 40.00, '2024-06-03', 'SR003'),
	(7, 'Mantenimiento de motor', 'Descripción del mantenimiento de motor', 150.00, '2024-07-05', 'MAN001'),
	(8, 'Mantenimiento de frenos', 'Descripción del mantenimiento de frenos', 120.00, '2024-07-08', 'MAN002'),
	(9, 'Mantenimiento general', 'Descripción del mantenimiento general', 200.00, '2024-07-10', 'MAN003'),
	(10, 'Revisión de mantenimiento', 'Descripción de revisión de mantenimiento', 80.00, '2024-07-15', 'MAN004');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.stock: ~10 rows (aproximadamente)
INSERT INTO `stock` (`stock_id`, `tipo_elemento`, `elemento_id`, `cantidad_disponible`) VALUES
	(1, 'vehiculo', 1, 10),
	(2, 'vehiculo', 2, 5),
	(3, 'vehiculo', 3, 2),
	(4, 'repuesto', 2, 10),
	(5, 'servicio', 2, 3),
	(6, 'servicio', 1, 4),
	(7, 'vehiculo', 9, 7),
	(8, 'repuesto', 3, 4),
	(9, 'servicio', 6, 4),
	(10, 'repuesto', 5, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.vehiculo: ~76 rows (aproximadamente)
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
	(75, 'Chevrolet', 'Corvette', 'Rojo', '2023', 'QRS345', 'CORVETTE2023', 70000.00),
	(77, 'bocho', '2', 'rojo', '2384', '2374sd', '12341', 2.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.ventas_de_repuestos: ~10 rows (aproximadamente)
INSERT INTO `ventas_de_repuestos` (`vtr_id`, `vtr_serie`, `vtr_numero`, `vtr_fecha`, `vtr_igv_total`, `vtr_valor_venta_total`, `vtr_importe_total`, `vtr_estado`, `vtr_vdr_id`, `vtr_cl_id`, `vtr_em_id`, `vtr_rp_id`, `vtr_nt_id`, `vtr_pf_id`) VALUES
	(1, '2', 1.00, '2024-07-03', 18.00, 15.00, 17.70, 'NUEVO', 1, 4, 3, 4, 1, 1),
	(2, '1', 2.00, '2024-07-04', 18.00, 150.00, 177.00, 'NUEVO', 6, 9, 1, 2, 1, 1),
	(3, '3', 3.00, '2024-07-08', 18.00, 50.00, 59.00, 'NUEVO', 4, 2, 4, 4, 1, 2),
	(4, '4', 4.00, '2024-07-08', 18.00, 75.50, 89.09, 'NUEVO', 5, 1, 6, 3, 3, 1),
	(5, '5', 5.00, '2024-07-10', 18.00, 10.00, 11.80, 'NUEVO', 4, 1, 2, 3, 1, 1),
	(6, '6', 6.00, '2024-07-07', 18.00, 7.00, 18.00, 'NUEVO', 4, 2, 1, 4, 1, 2),
	(7, '7', 7.00, '2024-07-09', 18.00, 15.00, 17.70, 'NUEVO', 1, 2, 5, 25, 3, 2),
	(8, '8', 8.00, '2024-07-16', 18.00, 45.50, 53.69, 'NUEVO', 4, 2, 7, 19, 1, 1),
	(9, '9', 9.00, '2024-07-13', 18.00, 58.00, 68.44, 'NUEVO', 4, 1, 1, 25, 2, 2),
	(10, '10', 10.00, '2024-07-13', 18.00, 70.50, 83.19, 'NUEVO', 4, 1, 1, 25, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.ventas_de_vehiculo: ~0 rows (aproximadamente)
INSERT INTO `ventas_de_vehiculo` (`vtv_id`, `vtv_serie`, `vtv_numero`, `vtv_fecha`, `vtv_igv_total`, `vtv_valor_venta_total`, `vtv_importe_total`, `vtv_estado`, `vtv_vdv_id`, `vtv_cl_id`, `vtv_vh_id`, `vtv_em_id`, `vtv_nt_id`, `vtv_pf_id`) VALUES
	(1, '12345', 1.00, '2024-07-03', 18.00, 25000.00, 29500.00, 'COMPRANDO', 1, 2, 3, 7, 3, 1),
	(2, '123456', 2.00, '2024-07-05', 18.00, 30000.00, 35400.00, 'COMPRANDO', 2, 2, 3, 6, 1, 3),
	(3, '123445', 3.00, '2024-07-06', 18.00, 27000.00, 31860.00, 'COMPRANDO', 3, 1, 4, 6, 1, 2),
	(4, '451384', 4.00, '2024-07-07', 18.00, 32000.00, 37760.00, 'COMPRANDO', 3, 2, 4, 4, 1, 1),
	(5, '373524', 5.00, '2024-07-08', 18.00, 28650.00, 33807.00, 'COMPRANDO', 5, 4, 10, 6, 2, 2),
	(6, '645678', 6.00, '2024-07-09', 18.00, 29600.00, 37928.00, 'COMPRANDO', 5, 4, 2, 2, 3, 1),
	(7, '454543', 7.00, '2024-07-10', 18.00, 36000.00, 42480.00, 'COMPRANDO', 3, 2, 14, 6, 2, 2),
	(8, '546464', 8.00, '2024-07-12', 18.00, 40000.00, 47200.00, 'COMPRANDO', 3, 1, 14, 7, 2, 2),
	(9, '546464', 9.00, '2024-07-13', 18.00, 45000.00, 53100.00, 'COMPRANDO', 2, 2, 3, 3, 3, 3),
	(10, '786451', 10.00, '2024-07-14', 18.00, 128000.00, 151040.00, 'COMPRANDO', 3, 1, 13, 7, 3, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_detalle_repuestos: ~0 rows (aproximadamente)
INSERT INTO `venta_detalle_repuestos` (`vdr_id`, `vdr_cantidad`, `vdr_precio_unitario`, `vdr_igv_item`, `vdr_valor_venta_item`, `vdr_estado`, `vdr_pd_id`, `vdr_pp_id`, `vdr_mp_id`) VALUES
	(1, 2.00, 15.00, 18.00, 17.70, 'NUEVO', 3, 2, 5),
	(2, 1.00, 150.00, 18.00, 177.00, 'NUEVO', 3, 3, 5),
	(3, 1.00, 50.00, 18.00, 59.00, 'NUEVO', 2, 2, 5),
	(4, 3.00, 75.50, 18.00, 89.09, 'NUEVO', 3, 3, 3),
	(5, 1.00, 10.00, 18.00, 11.80, 'NUEVO', 4, 2, 2),
	(6, 1.00, 7.00, 18.00, 8.26, 'NUEVO', 7, 3, 2),
	(7, 2.00, 15.00, 18.00, 17.70, 'NUEVO', 3, 3, 2),
	(8, 3.00, 45.50, 18.00, 53.69, 'NUEVO', 3, 3, 2),
	(9, 1.00, 58.00, 18.00, 68.44, 'NUEVO', 3, 3, 3),
	(10, 2.00, 70.50, 18.00, 83.19, 'NUEVO', 1, 3, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_detalle_servicios: ~0 rows (aproximadamente)
INSERT INTO `venta_detalle_servicios` (`vds_id`, `vds_cantidad`, `vds_precio_unitario`, `vds_igv_item`, `vds_valor_venta_item`, `vds_estado`, `vds_pd_id`, `vds_pp_id`, `vds_mp_id`) VALUES
	(1, 1.00, 25.00, 18.00, 20.50, 'Completado', 1, 1, 1),
	(2, 2.00, 50.00, 18.00, 41.00, 'Pendiente', 2, 2, 2),
	(3, 1.00, 40.00, 18.00, 47.20, 'Cancelado', 3, 3, 3),
	(4, 1.00, 15.00, 18.00, 17.70, 'Completado\r\n', 4, 2, 1),
	(5, 1.00, 22.00, 18.00, 25.96, 'Completado', 5, 3, 6),
	(6, 3.00, 60.20, 18.00, 71.04, 'Pendiente', 6, 3, 2),
	(7, 2.00, 50.00, 18.00, 118.00, 'Activo', 1, 1, 1),
	(8, 1.00, 10.50, 18.00, 12.39, 'Pendiente', 4, 3, 3),
	(9, 1.00, 5.00, 18.00, 5.90, 'Activo', 1, 2, 5),
	(10, 2.00, 11.50, 18.00, 13.57, 'Activo', 1, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_detalle_vehiculo: ~0 rows (aproximadamente)
INSERT INTO `venta_detalle_vehiculo` (`vdv_id`, `vdv_cantidad`, `vdv_precio_unitario`, `vdv_igv_item`, `vdv_valor_venta_item`, `vdv_estado`, `vdv_pd_id`, `vdv_pp_id`, `vdv_mp_id`) VALUES
	(1, 1.00, 25000.00, 18.00, 29500.00, 'NUEVO', 2, 1, 2),
	(2, 1.00, 30000.00, 18.00, 35400.00, 'NUEVO', 5, 1, 1),
	(3, 1.00, 27000.00, 18.00, 31860.00, 'NUEVO', 1, 3, 3),
	(4, 1.00, 32000.00, 18.00, 37760.00, 'NUEVO', 5, 3, 5),
	(5, 1.00, 28650.00, 18.00, 33807.00, 'NUEVO', 1, 3, 5),
	(6, 1.00, 29600.00, 18.00, 34928.00, 'NUEVO', 7, 2, 1),
	(7, 1.00, 36000.00, 18.00, 42480.00, 'NUEVO', 6, 1, 3),
	(8, 1.00, 40000.00, 18.00, 47200.00, 'NUEVO', 4, 3, 4),
	(9, 1.00, 45000.00, 18.00, 53100.00, 'NUEVO', 1, 2, 5),
	(10, 2.00, 128000.00, 18.00, 151040.00, 'NUEVO', 7, 1, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla db_cisne.venta_de_servicio: ~10 rows (aproximadamente)
INSERT INTO `venta_de_servicio` (`vts_id`, `vts_serie`, `vts_numero`, `vts_fecha`, `vts_igv_total`, `vts_valor_venta_total`, `vts_importe_total`, `vts_estado`, `vts_vds_id`, `vts_cl_id`, `vts_em_id`, `vts_sr_id`, `vts_nt_id`, `vts_pf_id`) VALUES
	(1, 'VTS001', 1.00, '2024-06-01', 18.00, 5.00, 5.90, 'CANCELADO', 1, 1, 1, 1, 1, 1),
	(2, 'VTS002', 2.00, '2024-06-02', 18.00, 5.00, 5.90, 'PENDIENTE', 2, 2, 2, 2, 2, 2),
	(3, 'VTS003', 3.00, '2024-06-03', 18.00, 7.00, 8.26, 'CANCELADO', 3, 3, 3, 3, 3, 3),
	(4, 'VTS004', 4.00, '2024-07-03', 18.00, 20.00, 23.60, 'CANCELADO', 3, 1, 5, 9, 3, 2),
	(5, 'VTS005', 5.00, '2024-07-04', 18.00, 120.10, 141.60, 'PENDIENTE\r\n', 2, 3, 4, 5, 3, 1),
	(6, 'VTS006', 6.00, '2024-07-07', 18.00, 45.10, 53.22, 'CANCELADO', 3, 1, 7, 8, 1, 2),
	(7, 'VTS007', 7.00, '2024-07-08', 18.00, 30.70, 35.40, 'PENDIENTE\r\n', 2, 3, 7, 1, 3, 2),
	(8, 'VTS008', 8.00, '2024-07-08', 18.00, 15.20, 17.94, 'ACTIVO', 7, 1, 7, 6, 1, 3),
	(9, 'VTS009', 9.00, '2024-07-09', 18.00, 10.50, 12.39, 'COMPLETADO\r\n', 1, 2, 5, 7, 1, 1),
	(10, 'VTS010', 10.00, '2024-07-13', 18.00, 15.30, 18.05, 'ACTIVO\r\n', 7, 2, 7, 3, 1, 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
