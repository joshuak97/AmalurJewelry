-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-04-2021 a las 22:10:17
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ewor3492_admon_amalur`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_prod`
--

CREATE TABLE `categoria_prod` (
  `id_categoria` int(10) NOT NULL COMMENT 'Id de categoria',
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Descripcion',
  `nombre_categoria` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre categoria'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_prod`
--

INSERT INTO `categoria_prod` (`id_categoria`, `descripcion`, `nombre_categoria`) VALUES
(3, 'Pulseras-Amalur', 'Pulseras'),
(4, 'Collares-Amalur', 'Collares '),
(5, 'Piercing-Amalur', 'Piercings'),
(7, 'Anillos-Amalur', 'Anillos'),
(8, 'Broqueles de Oro', 'Oro 10K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_envio`
--

CREATE TABLE `direccion_envio` (
  `id_direccion` int(10) NOT NULL COMMENT 'Id de direccion',
  `calle` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Calle',
  `numero_ext` int(11) NOT NULL COMMENT 'Numero casa',
  `numero_int` int(11) NOT NULL,
  `colonia` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Colonia',
  `cp` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Codigo postal',
  `ciudad` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Ciudad',
  `estado` varchar(200) DEFAULT NULL COMMENT 'Estado',
  `pais` varchar(200) DEFAULT '0' COMMENT 'Pais',
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion_envio`
--

INSERT INTO `direccion_envio` (`id_direccion`, `calle`, `numero_ext`, `numero_int`, `colonia`, `cp`, `ciudad`, `estado`, `pais`, `id_usuario`) VALUES
(2, 'Magnolia', 1, 0, 'Centro', '92730', 'Alamo,Temapache', 'Veracruz', 'Mexico', 2),
(3, 'Vicente Guerrero ', 31, 0, 'Centro ', '92800', 'Tuxpan', 'Veracruz ', 'Mexico', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `folio_entrada` varchar(30) NOT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archivo` varchar(200) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada_producto`
--

CREATE TABLE `entrada_producto` (
  `id_ep` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_entrada` int(11) NOT NULL,
  `costo_unitario` decimal(30,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `nombre_cliente` varchar(200) NOT NULL,
  `total_pedido` decimal(30,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_entrega` varchar(30) NOT NULL,
  `folio_pedido` varchar(40) NOT NULL,
  `cargo_envio` decimal(30,2) NOT NULL,
  `total_final` decimal(30,2) NOT NULL,
  `detalles_envio` varchar(300) NOT NULL,
  `clave_rastreo` varchar(300) NOT NULL,
  `correocliente` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `nombre_cliente`, `total_pedido`, `status`, `fecha_pedido`, `fecha_entrega`, `folio_pedido`, `cargo_envio`, `total_final`, `detalles_envio`, `clave_rastreo`, `correocliente`) VALUES
(8, '', 450.00, 'PAGADO', '2021-04-29 18:02:11', '', 'FDSJFK890809', 150.00, 600.00, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `id_pedido_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(30,2) NOT NULL,
  `precio_costo` decimal(30,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`id_pedido_producto`, `id_producto`, `id_pedido`, `cantidad`, `precio_venta`, `precio_costo`) VALUES
(7, 60, 8, 5, 50.00, 25.00),
(6, 62, 8, 1, 200.00, 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(10) NOT NULL COMMENT 'Id de Usuario',
  `codigo` varchar(40) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Id tipo de usuario',
  `descripcion_prod` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre',
  `id_categoria` int(30) NOT NULL COMMENT 'Apellido',
  `precio_compra` decimal(20,2) NOT NULL COMMENT 'Correo',
  `precio_venta` decimal(20,2) NOT NULL COMMENT 'Contraseña',
  `existencia` int(55) NOT NULL COMMENT 'Existencia del Producto',
  `fecha_creacion` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Fecha',
  `imagen` text COMMENT 'Id direccion',
  `seccion` varchar(40) NOT NULL,
  `descuento` decimal(30,2) NOT NULL,
  `id_set` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `codigo`, `nombre`, `descripcion_prod`, `id_categoria`, `precio_compra`, `precio_venta`, `existencia`, `fecha_creacion`, `imagen`, `seccion`, `descuento`, `id_set`) VALUES
(20, 'AJ0001', 'Saturno Oro', 'Saturno-ORO10K-1pz', 8, 100.00, 200.00, 1, '19-04-2021 11:34:38', 'AJ0001.jpg', 'NUEVO', 0.00, 0),
(21, 'AJ0002', 'Corazon Mini', 'Corazon Mini-ORO10K-1pz', 8, 100.00, 190.00, 1, '19-04-2021 11:36:02', 'AJ0002.jpg', 'NUEVO', 0.00, 0),
(22, 'AJ0003', 'Triple Corazon', 'Triple Corazon-ORO10K-1pz', 8, 100.00, 200.00, 1, '19-04-2021 11:37:07', 'AJ0003.jpg', 'NUEVO', 0.00, 0),
(23, 'AJ0004', 'Triangulo Oro', 'Triangulo-ORO10K-1pz', 8, 100.00, 190.00, 1, '19-04-2021 11:38:08', 'AJ0004.jpg', 'NUEVO', 0.00, 0),
(24, 'AJ0005', 'Bolita', 'Bolita-ORO10K-1pz', 8, 100.00, 180.00, 1, '19-04-2021 11:40:16', 'AJ0005.jpg', 'NUEVO', 0.00, 0),
(25, 'AJ0006', 'Torito', 'Torito-ORO10K-1pz', 8, 100.00, 200.00, 1, '19-04-2021 11:41:00', 'AJ0006.jpg', 'NUEVO', 0.00, 0),
(26, 'AJ0007', 'Viborita', 'Viborita-ORO10K-1pz', 8, 100.00, 200.00, 1, '19-04-2021 11:41:43', 'AJ0007.jpg', 'NUEVO', 0.00, 0),
(27, 'AJ0008', 'Tiburoncito', 'Tiburoncito-ORO10K-1pz', 8, 100.00, 200.00, 1, '19-04-2021 11:43:38', 'AJ0008.jpg', 'NUEVO', 0.00, 0),
(28, 'AJ0009', 'Dino Cuello Largo', 'Dino Cuello Largo-ORO10K-1pz', 8, 100.00, 210.00, 1, '19-04-2021 11:44:48', 'AJ0009.jpg', 'NUEVO', 0.00, 0),
(29, 'AJ0010', 'Dino T-rex', 'Dino T-rex-Oro10K-1pz.', 8, 100.00, 210.00, 1, '19-04-2021 11:46:13', 'AJ0010.jpg', 'NUEVO', 0.00, 0),
(30, 'AJ0011', 'Cola Sirena', 'Cola de Sirena-ORO10K-1pz', 8, 100.00, 200.00, 1, '19-04-2021 11:47:21', 'AJ0011.jpg', 'NUEVO', 0.00, 0),
(31, 'AJ0012', 'Cohete Circonia Blanca', 'Cohete Circonia Blanca-ORO10K-1pz', 8, 100.00, 210.00, 1, '19-04-2021 11:49:03', 'AJ0012.jpg', 'NUEVO', 0.00, 0),
(32, 'AJ0013', 'Perla ', 'Perla-ORO10K-1pz', 8, 100.00, 180.00, 1, '20-04-2021 09:06:47', 'AJ0013.jpg', 'NUEVO', 0.00, 0),
(33, 'AJ0014', 'Estrella Mini', 'Estrella Mini-ORO10K-1pz.', 8, 100.00, 190.00, 1, '20-04-2021 09:08:02', 'AJ0014.jpg', 'NUEVO', 0.00, 0),
(34, 'AJ0015', 'Palito', 'Palito-ORO10K-1pz', 8, 100.00, 180.00, 1, '20-04-2021 09:09:07', 'AJ0015.jpg', 'NUEVO', 0.00, 0),
(35, 'AJ0016', 'Corazon Vacio con Circonia', 'Corazon Vacio con Circonia-ORO10K-1pz', 8, 100.00, 190.00, 1, '20-04-2021 09:10:19', 'AJ0016.jpg', 'NUEVO', 0.00, 0),
(36, 'AJ0017', 'Estrella Vacia con Circonia', 'Estrella Vacia con Circonia-ORO10K-1pz.', 8, 100.00, 190.00, 1, '20-04-2021 09:12:00', 'AJ0017.jpg', 'NUEVO', 0.00, 0),
(37, 'AJ0018', 'Luna Vacia.', 'Luna Vacia con Circonia-ORO10K-1pz.', 8, 100.00, 190.00, 1, '20-04-2021 09:13:12', 'AJ0018.jpg', 'NUEVO', 0.00, 0),
(38, 'AJ0019', 'Estrella Vacia', 'Estrella Vacia sin Circonia-ORO10K-1pz.', 8, 100.00, 180.00, 1, '20-04-2021 09:14:15', 'AJ0019.jpg', 'NUEVO', 0.00, 0),
(39, 'AJ0020', 'Estrella de Mar Mini.', 'Estrella de Mar Mini-ORO10K-1pz', 8, 100.00, 210.00, 1, '20-04-2021 09:15:20', 'AJ0020.jpg', 'NUEVO', 0.00, 0),
(40, 'AJ0030', 'Collar de luna ', 'Collar de luna con circonias - oro laminado', 4, 100.00, 200.00, 1, '21-04-2021 09:53:19', 'AJ0030-1.jpg,AJ0030-2.jpg', 'NUEVO', 0.00, 0),
(41, 'AJ0031', 'Collar corazon chunky ', 'Collar corazon chunky - acero inoxidable ', 4, 100.00, 200.00, 1, '21-04-2021 10:06:13', 'AJ0031-1.jpg,AJ0031-2.jpg', 'NUEVO', 0.00, 0),
(42, 'AJ0032', 'Collar circonias de colores', 'Collar circonias de colores - acero inoxidable ', 4, 100.00, 200.00, 1, '21-04-2021 10:11:03', 'AJ0032-1.jpg,AJ0032-2.jpg', 'NUEVO', 0.00, 0),
(43, 'AJ0033', 'Collar lunas circonias ', 'Collar lunas circonias - oro laminado', 4, 100.00, 200.00, 1, '21-04-2021 10:15:00', 'AJ0033-1.jpg,AJ0033-2.jpg', 'NUEVO', 0.00, 0),
(44, 'AJ0034', 'Collar cruces circonias', 'Collar cruces circonias - oro laminado', 4, 100.00, 200.00, 1, '21-04-2021 10:25:44', 'AJ0034-1.jpg', 'NUEVO', 0.00, 0),
(45, 'AJ0021', 'Triple Estrella', 'Triple Estrella-ORO10K-1pz.', 8, 100.00, 220.00, 1, '21-04-2021 15:24:53', 'AJ0021.jpg', 'NUEVO', 0.00, 0),
(46, 'AJ0022', 'Rayito', 'Rayito-ORO10K-1pz.', 8, 100.00, 210.00, 1, '21-04-2021 15:26:16', 'AJ0022.jpg', 'NUEVO', 0.00, 0),
(47, 'AJ0023', 'Flecha Lisa', 'Flecha Lisa-ORO10K-1pz.', 8, 100.00, 210.00, 1, '21-04-2021 15:27:19', 'AJ0023.jpg', 'NUEVO', 0.00, 0),
(48, 'AJ0024', 'Cometa 2 Estrellas', 'Cometa 2 Estrellas-ORO10K-1pz.', 8, 100.00, 200.00, 1, '21-04-2021 15:28:07', 'AJ0024.jpg', 'NUEVO', 0.00, 0),
(49, 'AJ0025', 'Pacman', 'Pacman-ORO10K-1pz.', 8, 100.00, 200.00, 1, '21-04-2021 15:28:48', 'AJ0025.jpg', 'NUEVO', 0.00, 0),
(50, 'AJ0026', 'Ojo Turco Azul', 'Ojo Turco Azul-ORO10K-1pz.', 8, 100.00, 220.00, 1, '21-04-2021 15:33:46', 'AJ0026.jpg', 'NUEVO', 0.00, 0),
(51, 'AJ0027', 'Palmera', 'Palmera-ORO10K-1pz.', 8, 100.00, 220.00, 1, '21-04-2021 15:34:56', 'AJ0027.jpg', 'NUEVO', 0.00, 0),
(52, 'AJ0028', 'Mano Mini Fatima', 'Mano Mini Fatima-ORO10K-1pz.', 8, 100.00, 200.00, 1, '21-04-2021 15:36:11', 'AJ0028.jpg', 'NUEVO', 0.00, 0),
(53, 'AJ0029', 'Manita Fatima Vacia', 'Manita Fatima Vacia-ORO10K-1pz.', 8, 100.00, 190.00, 1, '21-04-2021 15:38:22', 'AJ0029.jpg', 'NUEVO', 0.00, 0),
(54, 'AJ0036', 'Rayito Vacio', 'Rayito Vacio-ORO10K-1pz', 8, 100.00, 190.00, 1, '21-04-2021 15:39:25', 'AJ0036.jpg', 'NUEVO', 0.00, 0),
(55, 'AJ0035', 'Triple Bolita', 'Triple Bolita-ORO10K-1pz.', 8, 100.00, 180.00, 1, '21-04-2021 15:41:16', 'AJ0035.jpg', 'NUEVO', 0.00, 0),
(56, 'AJ0037', 'Concha Marina', 'Concha Marina-ORO10K-1pz.', 8, 100.00, 220.00, 1, '21-04-2021 15:44:11', 'AJ0037.jpg', 'NUEVO', 0.00, 0),
(57, 'AJ0038', 'Pata de Perro', 'Pata de Perro-ORO10K-1pz.', 8, 100.00, 200.00, 1, '21-04-2021 15:45:13', 'AJ0038.jpg', 'NUEVO', 0.00, 0),
(58, 'AJ0039', 'Perrito Globo', 'Perrito Globo-ORO10K-1pz.', 8, 100.00, 210.00, 1, '21-04-2021 15:46:11', 'AJ0039.jpg', 'NUEVO', 0.00, 0),
(59, 'AJ0040', 'Espada', 'Espada-ORO10K-1pz.', 8, 100.00, 200.00, 1, '21-04-2021 15:47:03', 'AJ0040.jpg', 'NUEVO', 0.00, 0),
(60, 'AJ0041', 'Cadena Estrella Luna', 'Cadena Estrella Luna-ORO10K-1pz.', 8, 100.00, 420.00, 1, '21-04-2021 15:50:14', 'AJ0041.jpg', 'NUEVO', 0.00, 0),
(61, 'AJ0042', 'Cadena Estrella', 'Cadena Estrella-ORO10K-1pz.', 8, 100.00, 420.00, 1, '21-04-2021 15:51:16', 'AJ0042.jpg', 'NUEVO', 0.00, 0),
(62, 'AJ0043', 'Cadena Bolita-Bolita', 'Cadena Bolita-Bolita-ORO10K-1pz.', 8, 100.00, 420.00, 1, '21-04-2021 15:52:41', 'AJ0043.jpg', 'NUEVO', 0.00, 0),
(63, 'AJ0060', 'Piercings Amalur Jewelry', 'Piercings AJ', 5, 20.00, 100.00, 2, '29-04-2021 09:05:32', 'AJ0060-1.jpg,', 'NUEVO', 0.00, 17),
(64, 'AJ0061', 'Piercings Amalur Jewelry', 'Racimo', 5, 20.00, 100.00, 1, '29-04-2021 09:05:32', 'AJ0061-1.jpg,', 'NUEVO', 0.00, 17),
(65, 'AJ0062', 'Piercings Amalur Jewelry', 'Mini Flor', 5, 20.00, 100.00, 1, '29-04-2021 09:05:32', 'AJ0062-1.jpg,', 'NUEVO', 0.00, 17),
(66, 'AJ0063', 'Piercings Amalur Jewelry', 'Zirconia Sencilla', 5, 20.00, 100.00, 1, '29-04-2021 09:05:32', 'AJ0063-1.jpg,', 'NUEVO', 0.00, 17),
(67, 'AJ0064', 'Piercings Amalur Jewelry', 'Flor Triple', 5, 20.00, 100.00, 1, '29-04-2021 09:05:32', 'AJ0064-1.jpg,', 'NUEVO', 0.00, 17),
(68, 'AJ0065', 'Piercings Amalur Jewelry', 'Constelacion Rosa', 5, 20.00, 100.00, 1, '29-04-2021 09:05:32', 'AJ0065-1.jpg,', 'NUEVO', 0.00, 17),
(69, 'AJ0066', 'Piercings Amalur Jewelry', 'Luna Estrella Opalo', 5, 20.00, 100.00, 1, '29-04-2021 09:05:32', 'AJ0066-1.jpg,', 'NUEVO', 0.00, 17),
(70, 'AJ0080', 'Anillo Flor Happy', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:09:40', 'AJ0080-1.jpg,', 'NUEVO', 0.00, 0),
(71, 'AJ0081', 'Anillo Hug Red', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:10:57', 'AJ0081-1.jpg,', 'NUEVO', 0.00, 0),
(72, 'AJ0082', 'Anillo Heart Rojo', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:14:24', 'AJ0082-1.jpg,', 'NUEVO', 0.00, 0),
(73, 'AJ0084', 'Anillo Tulipan Rosa', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:15:25', 'AJ0084-1.jpg,', 'NUEVO', 0.00, 0),
(74, 'AJ0085', 'Anillo MargaritaHexa', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:16:13', 'AJ0085-1.jpg,', 'NUEVO', 0.00, 0),
(75, 'AJ0086', 'Anillo corazon off', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:17:10', 'AJ0086-1.jpg,', 'NUEVO', 0.00, 0),
(76, 'AJ0087', 'Anillo ovni pink', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:17:59', 'AJ0087-1.jpg,', 'NUEVO', 0.00, 0),
(77, 'AJ0083', 'Anillo nube aqua', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:19:28', 'AJ0083-1.jpg,', 'NUEVO', 0.00, 0),
(78, 'AJ0088', 'Anillo heart yellow', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:20:53', 'AJ0088-1.jpg,', 'NUEVO', 0.00, 0),
(79, 'AJ0089', 'Anillo corazon arcoiris', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:21:48', 'AJ0089-1.jpg,', 'NUEVO', 0.00, 0),
(80, 'AJ0090', 'Anillo flor amarilla', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:22:55', 'AJ0090-1.jpg,', 'NUEVO', 0.00, 0),
(81, 'AJ0091', 'Anillo heart purple', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:23:53', 'AJ0091-1.jpg,', 'NUEVO', 0.00, 0),
(82, 'AJ0092', 'Anillo heart pink', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:24:37', 'AJ0092-1.jpg,', 'NUEVO', 0.00, 0),
(84, 'AJ0094', 'Anillo animado blanco', 'Anillo súper moda ', 7, 20.00, 80.00, 1, '29-04-2021 12:27:04', 'AJ0094-1.jpg,', 'NUEVO', 0.00, 0),
(85, 'AJ0095', 'Anillo animado rojo', 'Anillo súper moda ', 7, 20.00, 80.00, 1, '29-04-2021 12:31:13', 'AJ0095-1.jpg,', 'NUEVO', 0.00, 0),
(86, 'AJ0096', 'Anillo cuadrado corte Princesa', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:31:56', 'AJ0096-1.jpg,', 'NUEVO', 0.00, 0),
(87, 'AJ0097', 'Anillo oro laminado Trebol', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:35:03', 'AJ0097-1.jpg,', 'NUEVO', 0.00, 0),
(88, 'AJ0099', 'Anillo oro laminado Flor', 'Anillo súper moda oro laminado', 7, 20.00, 80.00, 1, '29-04-2021 12:35:55', 'AJ0099-1.jpg,', 'NUEVO', 0.00, 0),
(89, 'AJ0098', 'Anilo animado aqua', 'Anillo súper moda ', 7, 20.00, 80.00, 1, '29-04-2021 12:38:04', 'AJ0098-1.jpg,', 'NUEVO', 0.00, 0),
(90, 'AJ0067', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ear Piercing Quirurjico', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0067-1.jpg,', 'NUEVO', 0.00, 18),
(91, 'AJ0068', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Monito Con Zirconia', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0068-1.jpg,', 'NUEVO', 0.00, 18),
(92, 'AJ0069', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Luna Corazon Rosado', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0069-1.jpg,', 'NUEVO', 0.00, 18),
(93, 'AJ0070', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Estrella Tornasol', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0070-1.jpg,', 'NUEVO', 0.00, 18),
(94, 'AJ0071', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Engarzada Tornasol', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0071-1.jpg,', 'NUEVO', 0.00, 18),
(95, 'AJ0072', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Diamante', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0072-1.jpg,', 'NUEVO', 0.00, 18),
(96, 'AJ0073', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Corazon Relleno', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0073-1.jpg,', 'NUEVO', 0.00, 18),
(97, 'AJ0074', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Corazon Hueco', 5, 20.00, 100.00, 1, '30-04-2021 08:27:11', 'AJ0074-1.jpg,', 'NUEVO', 0.00, 18),
(98, 'AJ0100', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ear Piercing Quirurjico', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0100-1.jpg,', 'NUEVO', 0.00, 19),
(99, 'AJ0101', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Triple Estrella', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0101-1.jpg,', 'NUEVO', 0.00, 19),
(100, 'AJ0102', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Saturno Opalo', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0102-1.jpg,', 'NUEVO', 0.00, 19),
(101, 'AJ0103', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Rayo Cadena Multicolor', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0103-1.jpg,', 'NUEVO', 0.00, 19),
(102, 'AJ0104', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ojo Turco Zirconia', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0104-1.jpg,', 'NUEVO', 0.00, 19),
(103, 'AJ0105', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Flor con Perla', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0105-1.jpg,', 'NUEVO', 0.00, 19),
(104, 'AJ0106', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Estrella Rellena', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0106-1.jpg,', 'NUEVO', 0.00, 19),
(105, 'AJ0107', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Corazon con Corona', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0107-1.jpg,', 'NUEVO', 0.00, 19),
(106, 'AJ0108', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Cometa con Zirconia', 5, 20.00, 100.00, 1, '30-04-2021 08:33:03', 'AJ0108-1.jpg,', 'NUEVO', 0.00, 19),
(107, 'AJ0109', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ear Piercing Quirurjico', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0109-1.jpg,', 'NUEVO', 0.00, 20),
(108, 'AJ0110', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Triple Estrella Mini', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0110-1.jpg,', 'NUEVO', 0.00, 20),
(109, 'AJ0111', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Segurito Con Zirconia', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0111-1.jpg,', 'NUEVO', 0.00, 20),
(110, 'AJ0112', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Mini Mariposa', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0112-1.jpg,', 'NUEVO', 0.00, 20),
(111, 'AJ0113', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Mini Corona', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0113-1.jpg,', 'NUEVO', 0.00, 20),
(112, 'AJ0114', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Estrella Copo De Nieve', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0114-1.jpg,', 'NUEVO', 0.00, 20),
(113, 'AJ0115', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Estrella Con Piedra', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0115-1.jpg,', 'NUEVO', 0.00, 20),
(114, 'AJ0116', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Cruz de Zirconia', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0116-1.jpg,', 'NUEVO', 0.00, 20),
(115, 'AJ0117', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Amuleto de la Suerte', 5, 20.00, 100.00, 1, '30-04-2021 08:37:49', 'AJ0117-1.jpg,', 'NUEVO', 0.00, 20),
(117, 'AJ0118', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ear Piercing Quirurjico', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0118-1.jpg,', 'NUEVO', 0.00, 21),
(118, 'AJ0119', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Torre Eiffel', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0119-1.jpg,', 'NUEVO', 0.00, 21),
(119, 'AJ0120', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Serpiente con cadenita', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0120-1.jpg,', 'NUEVO', 0.00, 21),
(120, 'AJ0121', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Micro Luna Con Zirconia', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0121-1.jpg,', 'NUEVO', 0.00, 21),
(121, 'AJ0122', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Luna Micro Estrella', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0122-1.jpg,', 'NUEVO', 0.00, 21),
(122, 'AJ0123', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Llavecita', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0123-1.jpg,', 'NUEVO', 0.00, 21),
(123, 'AJ0125', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Labios Turcos', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0125-1.jpg,', 'NUEVO', 0.00, 21),
(124, 'AJ0126', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Corazon Triple Piedra', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0126-1.jpg,', 'NUEVO', 0.00, 21),
(125, 'AJ0127', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Cola de Ballena', 5, 20.00, 100.00, 1, '30-04-2021 08:43:20', 'AJ0127-1.jpg,', 'NUEVO', 0.00, 21),
(126, 'AJ0128', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ear Piercing Quirurjico', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0128-1.jpg,', 'NUEVO', 0.00, 22),
(127, 'AJ0129', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Cometa Fugaz', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0129-1.jpg,', 'NUEVO', 0.00, 22),
(128, 'AJ0130', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Constelacion UNO', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0130-1.jpg,', 'NUEVO', 0.00, 22),
(129, 'AJ0131', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Constelacion DOS', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0131-1.jpg,', 'NUEVO', 0.00, 22),
(130, 'AJ0132', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Corazon Gordo Relleno', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0132-1.jpg,', 'NUEVO', 0.00, 22),
(131, 'AJ0133', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Luna Hacia Abajo', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0133-1.jpg,', 'NUEVO', 0.00, 22),
(132, 'AJ0134', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Luna Sencilla', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0134-1.jpg,', 'NUEVO', 0.00, 22),
(133, 'AJ0135', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Planeta En Orbita', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0135-1.jpg,', 'NUEVO', 0.00, 22),
(134, 'AJ0136', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Racimo Tornasol', 5, 20.00, 100.00, 1, '30-04-2021 08:46:50', 'AJ0136-1.jpg,', 'NUEVO', 0.00, 22),
(135, 'AJ0137', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ear Piercing Quirurjico', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0137-1.jpg,', 'NUEVO', 0.00, 23),
(136, 'AJ0138', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Racimo Zirconias TRES', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0138-1.jpg,', 'NUEVO', 0.00, 23),
(137, 'AJ0139', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Racimo Zirconias DOS', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0139-1.jpg,', 'NUEVO', 0.00, 23),
(138, 'AJ0140', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Heliz Zirconia Rosa', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0140-1.jpg,', 'NUEVO', 0.00, 23),
(139, 'AJ0141', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Helix Multo Zirconia', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0141-1.jpg,', 'NUEVO', 0.00, 23),
(140, 'AJ0142', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Flor Ceramica con Zirconia', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0142-1.jpg,', 'NUEVO', 0.00, 23),
(141, 'AJ0143', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Estrella de Maria', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0143-1.jpg,', 'NUEVO', 0.00, 23),
(142, 'AJ0144', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Estrella de Belen', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0144-1.jpg,', 'NUEVO', 0.00, 23),
(143, 'AJ0145', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Colgante Zirconia Verde y Rosa', 5, 20.00, 150.00, 1, '30-04-2021 08:51:08', 'AJ0145-1.jpg,', 'NUEVO', 0.00, 23),
(144, 'AJ0146', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Ear Piercing Quirurjico', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0146-1.jpg,', 'NUEVO', 0.00, 24),
(145, 'AJ0147', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Rayo', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0147-1.jpg,', 'NUEVO', 0.00, 24),
(146, 'AJ0148', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Media Luna', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0148-1.jpg,', 'NUEVO', 0.00, 24),
(147, 'AJ0149', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Mariposa', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0149-1.jpg,', 'NUEVO', 0.00, 24),
(148, 'AJ0150', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Flor', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0150-1.jpg,', 'NUEVO', 0.00, 24),
(149, 'AJ0151', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Estrella Rellena', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0151-1.jpg,', 'NUEVO', 0.00, 24),
(150, 'AJ0152', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Estrella Reborde', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0152-1.jpg,', 'NUEVO', 0.00, 24),
(151, 'AJ0153', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Estrella de Mar', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0153-1.jpg,', 'NUEVO', 0.00, 24),
(152, 'AJ0154', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Corazon Redondo', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0154-1.jpg,', 'NUEVO', 0.00, 24),
(153, 'AJ0155', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Corazon Reborde', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0155-1.jpg,', 'NUEVO', 0.00, 24),
(154, 'AJ0156', 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', 'Huggie Corazon Mini', 5, 20.00, 100.00, 1, '30-04-2021 09:00:03', 'AJ0156-1.jpg,', 'NUEVO', 0.00, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(150) NOT NULL,
  `rfc_proveedor` varchar(15) NOT NULL,
  `direccion_proveedor` varchar(200) NOT NULL,
  `telefono_proveedor` varchar(15) NOT NULL,
  `correo_proveedor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sets`
--

CREATE TABLE `sets` (
  `id_set` int(11) NOT NULL,
  `nombre_set` varchar(200) NOT NULL,
  `creation_fecha` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sets`
--

INSERT INTO `sets` (`id_set`, `nombre_set`, `creation_fecha`) VALUES
(18, 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', '30-04-2021 08:27:11'),
(17, 'Piercings Amalur Jewelry', '29-04-2021 09:05:32'),
(19, 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', '30-04-2021 08:33:03'),
(20, 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', '30-04-2021 08:37:49'),
(21, 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', '30-04-2021 08:43:20'),
(22, 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', '30-04-2021 08:46:50'),
(23, 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', '30-04-2021 08:51:08'),
(24, 'Ear piercing aceró quirúrgico 316 L excelente en perforaciones nuevas o cicatrizadas', '30-04-2021 09:00:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `set_producto`
--

CREATE TABLE `set_producto` (
  `id_set_producto` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_set` int(11) NOT NULL,
  `tallas` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id_subcategoria` int(10) NOT NULL COMMENT 'Id de subcategoria',
  `descripcion subcategoria` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Descripcion de subcategoria',
  `id_categoria` int(30) NOT NULL COMMENT 'Id categoria'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usu`
--

CREATE TABLE `tipo_usu` (
  `id_tipousu` int(10) NOT NULL COMMENT 'Id de tipo usuario',
  `descripcion` varchar(20) NOT NULL COMMENT 'Descripcion del tipo de usuario'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usu`
--

INSERT INTO `tipo_usu` (`id_tipousu`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL COMMENT 'Id de Usuario',
  `user` varchar(20) NOT NULL,
  `id_tipousu` int(10) NOT NULL COMMENT 'Id tipo de usuario',
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Nombre',
  `apellido` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Apellido',
  `correo` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Correo',
  `password` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Contraseña',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha',
  `id_direccion` varchar(200) DEFAULT NULL COMMENT 'Id direccion',
  `telefono` varchar(10) DEFAULT '0' COMMENT 'Telefono'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `user`, `id_tipousu`, `nombre`, `apellido`, `correo`, `password`, `fecha_creacion`, `id_direccion`, `telefono`) VALUES
(1, 'admin', 1, 'Administrador', '', '', '7488e331b8b64e5794da3fa4eb10ad5d', '2021-04-21 22:54:28', NULL, '7658335568'),
(2, 'Joshuak500', 2, 'Josue', 'Cruz Santiago', 'j_cruz1997@outlook.es', '11294b8a68ffa84cb92e21caec0e0f34', '2021-04-21 22:54:11', NULL, '7658335568'),
(3, 'Emirmr', 2, 'Francisco Emir', 'Rivera', 'emir01417@gmail.com', '4b914e8f3a482903498eca4fd8d89bf4', '2021-04-28 17:04:50', NULL, '7831012144'),
(4, 'Maria', 2, 'Maria Dolores ', 'Aldasoro alarcon ', 'maria_aldasoro@hotmail.com', '037ddcee641e6c6e8194856fc0a20e17', '2021-04-29 21:38:48', NULL, '7831240516');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) NOT NULL COMMENT 'Id venta',
  `id_usuario` int(10) NOT NULL COMMENT 'Id usuario',
  `id_producto` int(100) NOT NULL COMMENT 'Producto',
  `subtotal` decimal(30,0) NOT NULL COMMENT 'Subtotal',
  `iva` decimal(20,0) NOT NULL COMMENT 'IVA',
  `total` decimal(20,0) NOT NULL COMMENT 'Total',
  `fecha_venta` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Fecha de venta',
  `folio_venta` varchar(10) DEFAULT NULL COMMENT 'Folio de venta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_prod`
--
ALTER TABLE `categoria_prod`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `direccion_envio`
--
ALTER TABLE `direccion_envio`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `entrada_producto`
--
ALTER TABLE `entrada_producto`
  ADD PRIMARY KEY (`id_ep`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_entrada` (`id_entrada`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`id_pedido_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `sets`
--
ALTER TABLE `sets`
  ADD PRIMARY KEY (`id_set`);

--
-- Indices de la tabla `set_producto`
--
ALTER TABLE `set_producto`
  ADD PRIMARY KEY (`id_set_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_set` (`id_set`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id_subcategoria`);

--
-- Indices de la tabla `tipo_usu`
--
ALTER TABLE `tipo_usu`
  ADD PRIMARY KEY (`id_tipousu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipousu` (`id_tipousu`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`,`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_prod`
--
ALTER TABLE `categoria_prod`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de categoria', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `direccion_envio`
--
ALTER TABLE `direccion_envio`
  MODIFY `id_direccion` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de direccion', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  MODIFY `id_pedido_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de Usuario', AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `sets`
--
ALTER TABLE `sets`
  MODIFY `id_set` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `set_producto`
--
ALTER TABLE `set_producto`
  MODIFY `id_set_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id_subcategoria` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de subcategoria';

--
-- AUTO_INCREMENT de la tabla `tipo_usu`
--
ALTER TABLE `tipo_usu`
  MODIFY `id_tipousu` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de tipo usuario', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id de Usuario', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id venta';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
