-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 03:19:27
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectotds`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `nit_empre` int(11) NOT NULL,
  `nom_empre` varchar(50) DEFAULT NULL,
  `nom_prov` varchar(50) DEFAULT NULL,
  `tel_prov` bigint(20) DEFAULT NULL,
  `logo_empre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`nit_empre`, `nom_empre`, `nom_prov`, `tel_prov`, `logo_empre`) VALUES
(456, 'Colombina', 'Marco Antonio', 12345, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `identificacion` int(25) NOT NULL,
  `tipoDoc` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` bigint(50) NOT NULL,
  `claveMd` varchar(200) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`identificacion`, `tipoDoc`, `nombres`, `apellidos`, `email`, `telefono`, `claveMd`, `rol`, `estado`, `foto`) VALUES
(123, 'CC', 'Lizhet Geraldy ', 'Rincon  ', 'lizhet.rincon1@misena.edu.co', 589632056, 'eb62f6b9306db575c2d596b1279627a4', 'Administrador', 'Activo', '../upload/usuarios/llllll.jpeg'),
(456, 'CC', 'Jurany Alejandra', 'Cuervo Fontecha', 'jacuervo400@misena.edu.co', 52310654, '250cf8b51c773f3f8dc8b4be867a9a02', 'Administrador', 'Activo', '../upload/usuarios/gatoacostado.jpg'),
(654, 'CC', 'Breidy ', 'Jaime ', 'breidy.9@misena.edu.co', 3158963659, 'ab233b682ec355648e7891e66c54191b', 'Administrador', 'Activo', '../upload/usuarios/diomedezbreidy.jpeg'),
(12345, 'CC', 'Nelson Enrique', 'Alarcon Reyes', 'nelson.alarcn@misena.edu.co', 32545151, '827ccb0eea8a706c4c34a16891f84e7b', 'Administrador', 'Activo', '../upload/usuarios/gatonelson.jpg'),
(12468, 'CC', 'Felipe', 'Restrepo', 'felipe10restrepo@gmail.com', 315896354, '0d2922ee422da439d1304f3288bbd25b', 'Cliente', 'Activo', '../upload/usuarios/gatolindo.jpg'),
(56165, 'CC', 'Luisa Fernanda', 'Vega Zambrano', 'luisa.vega3@misena.edu.co', 213, '202cb962ac59075b964b07152d234b70', 'Administrador', 'Activo', '../upload/usuarios/Gatoluisa.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`nit_empre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `nit_empre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542310321;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
