-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Tiempo de generación: 19-06-2024 a las 02:25:37
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejemplo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `Id_Carrito` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total_Carrito` int(11) NOT NULL,
  `Impuestos` float NOT NULL,
  `Estado_pago` tinyint(4) NOT NULL,
  `Productos_Codigo_producto` varchar(10) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `personas_Id_persona` int(11) NOT NULL,
  `ValorXproducto` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `idDetalles_Factura` int(11) NOT NULL,
  `Nombre_producto` varchar(45) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio_unit` float DEFAULT NULL,
  `Valor_pagado` float DEFAULT NULL,
  `No_guia` varchar(45) DEFAULT NULL,
  `Empresa` varchar(45) DEFAULT NULL,
  `Facturas_Id_Facturas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`idDetalles_Factura`, `Nombre_producto`, `Cantidad`, `Precio_unit`, `Valor_pagado`, `No_guia`, `Empresa`, `Facturas_Id_Facturas`) VALUES
(2, 'ejemplo enviado', 1, 30000, 100, '123456', 'ADSOFAST', 1),
(3, 'ejmplo pendiente', 3, 30000, 90000, '', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `Id_Facturas` int(11) NOT NULL,
  `Estado_pago` tinyint(4) NOT NULL,
  `Estado_envio` tinyint(2) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Fecha_Factura` datetime NOT NULL,
  `Total_factura` float NOT NULL,
  `personas_Id_persona` int(11) DEFAULT NULL,
  `id_transaccion` varchar(45) NOT NULL,
  `Metodo_pago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`Id_Facturas`, `Estado_pago`, `Estado_envio`, `Ciudad`, `Direccion`, `Fecha_Factura`, `Total_factura`, `personas_Id_persona`, `id_transaccion`, `Metodo_pago`) VALUES
(1, 1, 1, 'Florencia-Caqueta', 'Calle 3A No 4-36 barrio el triunfo', '2024-05-19 08:43:17', 100000, 1, 'prueba1', 'PSE'),
(2, 1, 0, 'Armenia-Quindio', 'carrera33 No 2A-05 segundo piso', '2024-05-19 08:42:30', 150000, 14, '321654', 'PSE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas`
--

CREATE TABLE `lineas` (
  `idLineas` int(11) NOT NULL,
  `Nombre_linea` varchar(45) NOT NULL,
  `estado` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lineas`
--

INSERT INTO `lineas` (`idLineas`, `Nombre_linea`, `estado`) VALUES
(2, 'Niñas', 1),
(3, 'Hombres', 1),
(4, 'Mujeres', 1),
(5, 'ejemplo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `Id_persona` int(11) NOT NULL,
  `Activo` tinyint(2) DEFAULT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Celular` varchar(11) NOT NULL,
  `Contrasenia` char(20) NOT NULL,
  `Tipo_Id` varchar(10) DEFAULT NULL,
  `N_Id` int(20) DEFAULT NULL,
  `Rol` varchar(45) NOT NULL,
  `Fecha_inscrito` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Entidad_territorial` varchar(60) NOT NULL,
  `Direccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`Id_persona`, `Activo`, `Nombres`, `Correo`, `Celular`, `Contrasenia`, `Tipo_Id`, `N_Id`, `Rol`, `Fecha_inscrito`, `Entidad_territorial`, `Direccion`) VALUES
(1, 1, 'Davinson Capera Ortiz', 'da-v-inson@hotmail.com', '3155874091', 'Naisslyu1', 'CC', 1117523245, 'Cliente', '2024-06-16 20:55:18', 'Caquetá-Florencia', 'Calle 3A 4-36'),
(2, 1, 'Naissla tatiana Gutierrez', 'naisslatatiana92@outlook.com', '3221111111', '123456789', NULL, NULL, 'Admin', '2024-06-16 20:21:30', 'Antioquia-Argelia', 'Casa 1 esquina sur'),
(14, 1, 'Daniel stiven suarez', 'daniel1@outlook.com', '3115555555', '123456789', NULL, NULL, 'Cliente', '2024-06-16 20:10:38', 'Antioquia-Argelia', 'Casa 2 esquina norte'),
(16, 1, 'suarez 1', 'da-v@hotmail.com', '1234567890', '123456', NULL, NULL, 'Cliente', '2024-06-17 00:49:02', '', ''),
(17, 1, 'KJASLKJFLSJF', '1@hotmail.com', '1234567890', 'dav123', NULL, NULL, 'Cliente', '2024-06-17 00:54:49', '', ''),
(18, 1, 'juan n', '1@gmail.com', '3155748092', '123davinso', NULL, NULL, 'Cliente', '2024-06-19 00:03:16', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Codigo_producto` varchar(10) NOT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `Imagen` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Cant_disp` int(11) NOT NULL,
  `Precio_uni` float NOT NULL,
  `Descuento` tinyint(2) NOT NULL DEFAULT 0,
  `Descripcion` varchar(200) NOT NULL,
  `Lineas_idLineas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Codigo_producto`, `Estado`, `Imagen`, `Nombre`, `Cant_disp`, `Precio_uni`, `Descuento`, `Descripcion`, `Lineas_idLineas`) VALUES
('10', 0, 'Pulsera niñas.jpg', 'Pulsera niñas', 2500, 3000, 0, 'Pulsera de Flores para niña se elabora en diferentes colores                  ', 2),
('11', 0, 'choker niñas.jpg', 'choker niñas ', 35, 150, 0, 'Choker para niñas se elabora en diferentes colores azul.         ', 2),
('12', 0, 'Juego Floral.jpg', 'Juego Floral', 1, 50, 0, 'Juego flores de colores                            ', 2),
('13', 0, 'Candongas en plata.jpg', 'Candongas en plata', 1, 55, 0, 'Hermosas Candongas en plata el precio puede varias según tamaño y especificaciones de cada una.              ', 3),
('15', 1, 'Topos en plata.jpg', 'Topos en plata', 1, 25, 0, 'Hermoso topos en plata el precio puede variar según especificaciones y tamaño de los mismos                           ', 4),
('16', 1, 'Pulseras en plata.jpg', 'Pulseras en plata', 5, 50, 0, 'Pulsera en plata el precio puede variar según especificaciones y tamaño de las mismas                           ', 4),
('17', 1, 'Aretes en plata.jpg', 'Aretes en plata', 18, 50, 0, 'Aretes largos en plata el precio puede variar según especificaciones y tamaño de los mismos.                    ', 4),
('18', 1, 'Aretes largos en Plata.jpg', 'Aretes largos en Plata', 4, 50, 0, 'El precio puede variar según especificaciones y tamaño del mismo.            ', 4),
('19', 1, 'Anillos en plata Mujer.jpg', 'Anillos en plata Mujer', 5, 50, 0, 'El precio puede variar según tamaño y especificaciones de los mismos.                             ', 4),
('20', 1, 'Topos Cover Gold.jpg', 'Topos Cover Gold', 19, 20, 0, 'El precio puede variar según especificaciones de los mismos                      ', 4),
('21', 1, 'Ear Cuff.jpg', 'Ear Cuff', 15, 20, 0, 'El precio puede variar según especificaciones de los mismos', 4),
('22', 1, 'Cadenas en acero.jpg', 'Cadenas en acero', 9, 20, 0, 'Los Precios pueden varias según especificaciones de la cadena y del dije.             ', 4),
('23', 1, 'Pulseras en acero.jpg', 'Pulseras en acero', 8, 15, 0, 'El precio puede variar según especificaciones de las mismas.               ', 4),
('24', 1, 'Anillos grandes en plata.jpg', 'Anillos grandes en plata', 4, 60, 0, 'El precio varia según especificaciones de los mimos.', 4),
('25', 1, 'Cuarzos.jpg', 'Cuarzos', 7, 60, 0, 'El precio puede variar según las especificaciones y material de los mismos.', 4),
('3', 1, 'Anillos  Hombre.jpg', 'Anillos  Hombre', 4, 65, 0, 'Hermosos Anillos en oro plata para hombre          ', 3),
('4', 1, 'Pulsera en Plata Hombres.jpg', 'Pulsera en Plata Hombres', 1, 150, 0, 'Pulsera en plata eslabones gruesos                 ', 3),
('5', 1, 'Manilla Energética para Hombre.jpg', 'Manilla Energética para Hombre', 1, 25, 0, 'Nueva Manilla hecha a mano para hombre tejida con piedra Turmalina y dije de mano sagrada.                             ', 3),
('6', 1, 'Manilla Piedras Mate.jpg', 'Manilla Piedras Mate', 1, 20, 0, 'Manilla en Piedras Mate negra.                       ', 3),
('7', 1, 'Manilla Piedras turquesa.jpg', 'Manilla Piedras turquesa', 1, 25, 0, 'Manilla tejida en piedras turquesa y ónix', 3),
('8', 1, 'Aguacates Amorosos.jpg', 'Aguacates Amorosos', 1, 20, 0, 'Aguacates Amorosos versión niñas                    ', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `Id_Direccion` int(11) NOT NULL,
  `Departamento` varchar(45) NOT NULL,
  `Municipio` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `personas_Id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`Id_Direccion`, `Departamento`, `Municipio`, `Direccion`, `personas_Id_persona`) VALUES
(1, 'cundinamarga - bogota', 'FLORENCIA', 'CALLE 3A 4-36', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`Id_Carrito`),
  ADD UNIQUE KEY `Id_Facturas_UNIQUE` (`Id_Carrito`),
  ADD KEY `fk_Carritos_Productos1_idx` (`Productos_Codigo_producto`),
  ADD KEY `fk_Carritos_personas1_idx` (`personas_Id_persona`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`idDetalles_Factura`),
  ADD KEY `fk_Detalles_Factura_Facturas1_idx` (`Facturas_Id_Facturas`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`Id_Facturas`),
  ADD KEY `fk_Facturas_personas1_idx` (`personas_Id_persona`);

--
-- Indices de la tabla `lineas`
--
ALTER TABLE `lineas`
  ADD PRIMARY KEY (`idLineas`),
  ADD UNIQUE KEY `Nombre_linea` (`Nombre_linea`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`Id_persona`),
  ADD UNIQUE KEY `Correo_UNIQUE` (`Correo`),
  ADD UNIQUE KEY `Numero_documento_UNIQUE` (`N_Id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Codigo_producto`),
  ADD KEY `fk_Productos_Lineas1_idx` (`Lineas_idLineas`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`Id_Direccion`),
  ADD KEY `fk_Ubicacion_personas1_idx` (`personas_Id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `Id_Carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `idDetalles_Factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `Id_Facturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lineas`
--
ALTER TABLE `lineas`
  MODIFY `idLineas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `Id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `Id_Direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `fk_Carritos_Productos1` FOREIGN KEY (`Productos_Codigo_producto`) REFERENCES `productos` (`Codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Carritos_personas1` FOREIGN KEY (`personas_Id_persona`) REFERENCES `personas` (`Id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `fk_Detalles_Factura_Facturas1` FOREIGN KEY (`Facturas_Id_Facturas`) REFERENCES `facturas` (`Id_Facturas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_Facturas_personas1` FOREIGN KEY (`personas_Id_persona`) REFERENCES `personas` (`Id_persona`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Lineas1` FOREIGN KEY (`Lineas_idLineas`) REFERENCES `lineas` (`idLineas`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `fk_Ubicacion_personas1` FOREIGN KEY (`personas_Id_persona`) REFERENCES `personas` (`Id_persona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
