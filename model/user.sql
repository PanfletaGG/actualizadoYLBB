-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2023 a las 15:56:24
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ylbb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `Identificacion` bigint(15) NOT NULL,
  `Tipo_de_dato` varchar(30) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `foto2` varchar(200) NOT NULL,
  `foto3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`Identificacion`, `Tipo_de_dato`, `Nombres`, `Apellidos`, `Email`, `telefono`, `clave`, `rol`, `estado`, `foto`, `foto2`, `foto3`) VALUES
(1023162918, 'C.C', 'Anderson Tovar', 'Tovar Sanchez', 'adtovar81@misena.edu.co', '3021413242354325', '15c4fc57e8e99b0e90e6b2fdb635c707', 'Administrador', 'Activo', '../Uploads/usuariosjs.png', '../Uploads/usuarios', '../Uploads/usuarios'),
(218390214412, 'C.C', 'Edison Sebastian ', 'Ramirez Suarez', 'esramirez51@gmail.com', '43232543645', '01ceb8141c88907d05404162a17d9bcb', 'Administrador', 'Activo', '../Uploads/usuarios/WhatsApp Image 2023-08-22 at 8.10.46 PM.jpeg', '../Uploads/usuarios/', '../Uploads/usuarios/'),
(321093120321, 'C.C', 'Samuel Sanchez', 'Diaz Martinez', '16samuel18@gamil.com', '43232543645', '6b50daa1c96088c65ec86940b565ae1a', 'Administrador', 'Activo', '../Uploads/usuarios/WhatsApp Image 2023-08-22 at 8.18.46 PM.jpeg', '../Uploads/usuarios/', '../Uploads/usuarios/');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
