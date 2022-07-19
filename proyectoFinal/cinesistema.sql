-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2022 a las 06:20:59
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinesistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `asi_iCodigo` int(11) NOT NULL,
  `asi_iEstado` int(11) NOT NULL,
  `asi_vcAsistenteNombre` varchar(30) DEFAULT NULL,
  `asi_iAsistenteDNI` int(11) DEFAULT NULL,
  `zona_zon_iCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `com_iCodigo` int(11) NOT NULL,
  `com_dtFecha` date NOT NULL,
  `com_iTotal` int(11) NOT NULL,
  `usuario_usu_iCodigo` int(11) NOT NULL,
  `evento_eve_iCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `det_iSubtotal` int(11) NOT NULL,
  `compra_com_iCodigo` int(11) NOT NULL,
  `asiento_asi_iCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleprivilegio`
--

CREATE TABLE `detalleprivilegio` (
  `usuario_usu_iCodigo` int(11) NOT NULL,
  `privilegio_pri_iCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalleprivilegio`
--

INSERT INTO `detalleprivilegio` (`usuario_usu_iCodigo`, `privilegio_pri_iCodigo`) VALUES
(14, 1),
(14, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `eve_iCodigo` int(11) NOT NULL,
  `eve_iEstado` int(11) NOT NULL,
  `eve_vcNombre` varchar(20) NOT NULL,
  `eve_vcDescripcion` varchar(200) NOT NULL,
  `eve_dtFechaIniCompra` date NOT NULL,
  `eve_dtFechaFinCompra` date NOT NULL,
  `eve_dtFechaEvento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`eve_iCodigo`, `eve_iEstado`, `eve_vcNombre`, `eve_vcDescripcion`, `eve_dtFechaIniCompra`, `eve_dtFechaFinCompra`, `eve_dtFechaEvento`) VALUES
(1, 1, 'Evento1', 'Lorem', '2022-07-21', '2022-07-23', '2022-07-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `pri_iCodigo` int(11) NOT NULL,
  `pri_vcNombre` varchar(45) NOT NULL,
  `pri_vcPathPrivilegio` varchar(80) NOT NULL,
  `pri_vcImage` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`pri_iCodigo`, `pri_vcNombre`, `pri_vcPathPrivilegio`, `pri_vcImage`) VALUES
(1, 'realizar compra', '../compraModule/getCompraModule.php', NULL),
(2, 'evento', '../crudeventoModule/index.php', NULL),
(3, 'venta', '../ventaModule/index.php', NULL),
(4, 'consultar evento', '../consultarEventoModule/index.php', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_iCodigo` int(11) NOT NULL,
  `usu_vcUsuario` varchar(15) NOT NULL,
  `usu_vcContrasenia` varchar(80) NOT NULL,
  `usu_vcNombre` varchar(15) NOT NULL,
  `usu_vcApellidoPat` varchar(30) NOT NULL,
  `usu_vcSexo` varchar(12) NOT NULL,
  `usu_iTarjeta` int(11) DEFAULT NULL,
  `usu_vcCorreo` varchar(40) NOT NULL,
  `usu_iTelefono` int(11) NOT NULL,
  `usu_iEstado` int(11) NOT NULL,
  `usu_iModo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_iCodigo`, `usu_vcUsuario`, `usu_vcContrasenia`, `usu_vcNombre`, `usu_vcApellidoPat`, `usu_vcSexo`, `usu_iTarjeta`, `usu_vcCorreo`, `usu_iTelefono`, `usu_iEstado`, `usu_iModo`) VALUES
(14, 'crossfire26', '202cb962ac59075b964b07152d234b70', 'prish', 'Dominguez', 'masculino', NULL, 'prish@hotmail.com', 123142342, 1, 0),
(19, 'crossfire1807', '202cb962ac59075b964b07152d234b70', 'antony', 'Dominguez', 'masculino', NULL, 'pris23h1@hotmail.com', 124556456, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `zon_iCodigo` int(11) NOT NULL,
  `zon_vcNombre` varchar(25) NOT NULL,
  `zon_iNumAsientos` int(11) NOT NULL,
  `evento_eve_iCodigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`asi_iCodigo`,`zona_zon_iCodigo`),
  ADD KEY `fk_asiento_zona1_idx` (`zona_zon_iCodigo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`com_iCodigo`,`usuario_usu_iCodigo`,`evento_eve_iCodigo`),
  ADD KEY `fk_compra_usuario1_idx` (`usuario_usu_iCodigo`),
  ADD KEY `fk_compra_evento1_idx` (`evento_eve_iCodigo`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`compra_com_iCodigo`,`asiento_asi_iCodigo`),
  ADD KEY `fk_detallecompra_asiento1_idx` (`asiento_asi_iCodigo`);

--
-- Indices de la tabla `detalleprivilegio`
--
ALTER TABLE `detalleprivilegio`
  ADD PRIMARY KEY (`usuario_usu_iCodigo`,`privilegio_pri_iCodigo`),
  ADD KEY `fk_detalleprivilegio_privilegio1_idx` (`privilegio_pri_iCodigo`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`eve_iCodigo`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`pri_iCodigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_iCodigo`);

--
-- Indices de la tabla `zona`
--
ALTER TABLE `zona`
  ADD PRIMARY KEY (`zon_iCodigo`,`evento_eve_iCodigo`),
  ADD KEY `fk_zona_evento1_idx` (`evento_eve_iCodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `asi_iCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `com_iCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `eve_iCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  MODIFY `pri_iCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_iCodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `zona`
--
ALTER TABLE `zona`
  MODIFY `zon_iCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `fk_asiento_zona1` FOREIGN KEY (`zona_zon_iCodigo`) REFERENCES `zona` (`zon_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_evento1` FOREIGN KEY (`evento_eve_iCodigo`) REFERENCES `evento` (`eve_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_usuario1` FOREIGN KEY (`usuario_usu_iCodigo`) REFERENCES `usuario` (`usu_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `fk_detallecompra_asiento1` FOREIGN KEY (`asiento_asi_iCodigo`) REFERENCES `asiento` (`asi_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detallecompra_compra1` FOREIGN KEY (`compra_com_iCodigo`) REFERENCES `compra` (`com_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalleprivilegio`
--
ALTER TABLE `detalleprivilegio`
  ADD CONSTRAINT `fk_detalleprivilegio_privilegio1` FOREIGN KEY (`privilegio_pri_iCodigo`) REFERENCES `privilegio` (`pri_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleprivilegio_usuario1` FOREIGN KEY (`usuario_usu_iCodigo`) REFERENCES `usuario` (`usu_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `zona`
--
ALTER TABLE `zona`
  ADD CONSTRAINT `fk_zona_evento1` FOREIGN KEY (`evento_eve_iCodigo`) REFERENCES `evento` (`eve_iCodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
