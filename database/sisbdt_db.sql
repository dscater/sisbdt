-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2024 a las 00:08:27
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisbdt_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_sistema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `nombre_sistema`, `alias`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'SIS. SISBDT', 'SISBDT', '1726414529_1.svg', NULL, '2024-09-15 19:35:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cualidads`
--

CREATE TABLE `cualidads` (
  `id` bigint UNSIGNED NOT NULL,
  `datos_otros_id` bigint UNSIGNED NOT NULL,
  `cualidad` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cualidads`
--

INSERT INTO `cualidads` (`id`, `datos_otros_id`, `cualidad`, `created_at`, `updated_at`) VALUES
(1, 1, 'CUALIDAD 1', '2024-09-14 23:42:18', '2024-10-16 00:58:22'),
(4, 6, 'CUALIDAD #1', '2024-09-16 20:54:36', '2024-09-16 20:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_otros`
--

CREATE TABLE `datos_otros` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_otros`
--

INSERT INTO `datos_otros` (`id`, `user_id`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-08-31', '2024-08-31 19:26:58', '2024-08-31 19:26:58'),
(2, 3, '2024-09-14', '2024-09-14 23:16:05', '2024-09-14 23:16:05'),
(3, 4, '2024-09-16', '2024-09-16 20:47:16', '2024-09-16 20:47:16'),
(6, 5, '2024-09-16', '2024-09-16 20:54:36', '2024-09-16 20:54:36'),
(7, 6, '2024-10-15', '2024-10-16 01:21:57', '2024-10-16 01:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personals`
--

CREATE TABLE `datos_personals` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tipo_ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoja_vida` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calificacion` double NOT NULL DEFAULT '0',
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos_personals`
--

INSERT INTO `datos_personals` (`id`, `user_id`, `tipo_ci`, `nro_ci`, `fecha_nacimiento`, `lugar_nacimiento`, `genero`, `foto`, `fono`, `dir`, `hoja_vida`, `calificacion`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 2, 'CÉDULA DE IDENTIDAD', '5445454', '1999-01-01', 'LA PAZ', 'MASCULINO', '1725113569_1.jpg', '77776566', 'ZONA LOS PEDREGALES', '1725113569_1.pdf', 0, '2024-08-31', '2024-08-31 18:12:49', '2024-08-31 18:12:49'),
(2, 6, 'CÉDULA DE IDENTIDAD', '656565', '1990-01-01', 'BOLIVIA', 'FEMENINO', '1729026334_2.png', '777777', 'ZONA LOS OLIVOS #33223', '1729026334_2.pdf', 0, '2024-10-15', '2024-10-16 01:05:34', '2024-10-16 01:05:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacions`
--

CREATE TABLE `evaluacions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `puntuacion` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacions`
--

INSERT INTO `evaluacions` (`id`, `user_id`, `fecha_registro`, `puntuacion`, `created_at`, `updated_at`) VALUES
(3, 2, '2024-09-14', 184, '2024-09-14 21:42:40', '2024-10-15 20:13:32'),
(4, 3, '2024-09-14', 12, '2024-09-14 23:16:05', '2024-09-15 19:33:37'),
(5, 4, '2024-09-16', 20, '2024-09-16 20:47:16', '2024-09-16 20:47:16'),
(8, 5, '2024-09-16', 94, '2024-09-16 20:54:36', '2024-09-16 20:54:36'),
(9, 6, '2024-10-15', 23, '2024-10-16 01:21:57', '2024-10-16 01:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_basicas`
--

CREATE TABLE `evaluacion_basicas` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluacion_id` bigint UNSIGNED NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion_basicas`
--

INSERT INTO `evaluacion_basicas` (`id`, `evaluacion_id`, `nivel`, `grado`, `institucion`, `created_at`, `updated_at`) VALUES
(1, 3, 'SEXTO DE SECUNDARIA', 'BACHILLER', 'COL. FRANCIAS', '2024-09-14 21:43:17', '2024-10-15 18:00:18'),
(2, 4, 'SECUNDARIA', 'BACHILLER', 'COL. EDUARDO AVAROA', '2024-09-14 23:18:37', '2024-09-14 23:36:59'),
(3, 5, '6', 'BACHILLER', 'COLEGIO', '2024-09-16 20:47:16', '2024-09-16 20:47:16'),
(6, 8, '6', 'BACHILLER', 'COLEGIO', '2024-09-16 20:54:36', '2024-09-16 20:54:36'),
(7, 9, 'SEXTO DE SECUNDARIA', 'BACHILLER', 'COL. ITALIA', '2024-10-16 01:21:57', '2024-10-16 01:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_carreras`
--

CREATE TABLE `evaluacion_carreras` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluacion_id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carrera` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_titulo` date NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disciplina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion_carreras`
--

INSERT INTO `evaluacion_carreras` (`id`, `evaluacion_id`, `titulo`, `carrera`, `institucion`, `nivel`, `fecha_titulo`, `estado`, `disciplina`, `created_at`, `updated_at`) VALUES
(6, 3, 'LIC. EN ECONOMIA', 'INGENIERÍA CIVIL', 'INSTITUCION 2', 'TÉCNICO SUPERIOR', '2022-01-01', 'EGRESADO', 'INGENIERIA', '2024-09-14 23:57:13', '2024-10-16 00:58:22'),
(7, 5, 'LIC. EN DERECHO', 'INGENIERÍA CIVIL', 'INSTITUCION #2', 'NIVEL PROF', '2024-09-16', 'TITULADO', 'INGENIERIA', '2024-09-16 20:47:16', '2024-09-16 20:47:16'),
(10, 8, 'LIC. EN ECONOMIA', 'INGENIERÍA ELECTRÓNICA', 'INSTITUCION #2', 'NIVEL PROF', '2023-12-05', 'TITULADO', 'LICENCIATURA', '2024-09-16 20:54:36', '2024-09-16 20:54:36'),
(18, 3, 'LIC. EN COMERCIO', 'COMERCIO EXTERIOR', 'INSTITUCION', 'LICENCIATURA', '2024-01-01', 'TITULADO', 'LICENCIATURA', '2024-10-15 18:14:45', '2024-10-15 18:14:45'),
(19, 9, 'LIC. EN COMERCIO', 'COMERCIO INTERNACIONAL', 'INSTITUCION', 'LICENCIATURA', '2023-01-01', 'TITULADO', 'LICENCIATURA', '2024-10-16 01:21:57', '2024-10-16 01:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_cursos`
--

CREATE TABLE `evaluacion_cursos` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluacion_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `carga_horaria` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion_cursos`
--

INSERT INTO `evaluacion_cursos` (`id`, `evaluacion_id`, `nombre`, `institucion`, `fecha`, `carga_horaria`, `created_at`, `updated_at`) VALUES
(5, 3, 'CURSO 1', 'INSTITUCION CURSO', '2024-03-03', 20, '2024-09-14 23:57:13', '2024-10-16 00:58:22'),
(6, 3, 'CURSO 2', 'INSTITUCIÓN CURSO', '2024-06-06', 20, '2024-09-15 00:29:37', '2024-10-16 00:58:22'),
(9, 8, 'CURSO #1', 'INSTITUCION CURSO', '2024-05-01', 10, '2024-09-16 20:54:36', '2024-09-16 20:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_distincions`
--

CREATE TABLE `evaluacion_distincions` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluacion_id` bigint UNSIGNED NOT NULL,
  `merito` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion_distincions`
--

INSERT INTO `evaluacion_distincions` (`id`, `evaluacion_id`, `merito`, `institucion`, `fecha`, `created_at`, `updated_at`) VALUES
(5, 3, 'MÉRITO 1', 'INSTUTUCION 1', '2024-03-03', '2024-09-14 23:57:13', '2024-10-16 00:58:22'),
(8, 8, 'MERITO #1', 'INSTUTUCION #1', '2023-12-01', '2024-09-16 20:54:36', '2024-09-16 20:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_laborals`
--

CREATE TABLE `evaluacion_laborals` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluacion_id` bigint UNSIGNED NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion_laborals`
--

INSERT INTO `evaluacion_laborals` (`id`, `evaluacion_id`, `cargo`, `institucion`, `fecha_ini`, `fecha_fin`, `descripcion`, `created_at`, `updated_at`) VALUES
(5, 3, 'CARGO', 'EMPRESA', '2023-01-01', '2023-12-12', 'DESC.', '2024-09-14 23:57:13', '2024-09-15 00:12:48'),
(8, 8, 'CARGO EXP. LAB.', 'EMPRESA #1', '2023-05-30', '2024-09-01', 'DESC. CARGO', '2024-09-16 20:54:36', '2024-09-16 20:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion_postgrados`
--

CREATE TABLE `evaluacion_postgrados` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluacion_id` bigint UNSIGNED NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_postgrado` date NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postgrado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evaluacion_postgrados`
--

INSERT INTO `evaluacion_postgrados` (`id`, `evaluacion_id`, `institucion`, `fecha_postgrado`, `titulo`, `nivel`, `postgrado`, `created_at`, `updated_at`) VALUES
(6, 3, 'INSTITUCION POSTGRADO', '2024-02-02', 'TIT. POSTGRADO', 'NIVEL POST.', 'MAESTRÍA', '2024-09-14 23:57:13', '2024-10-15 20:13:32'),
(9, 8, 'INSTITUCION POSTGRADO', '2024-02-03', 'TIT. POSTGRADO', 'NIVEL POST.', 'DIPLOMADO', '2024-09-16 20:54:36', '2024-09-16 20:54:36'),
(10, 9, 'INSTITUCION 2', '2023-02-02', 'TITULO POSTGRADO', 'NIVEL ACADEMICO', 'ESPECIALIDAD', '2024-10-16 01:21:57', '2024-10-16 01:21:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidads`
--

CREATE TABLE `habilidads` (
  `id` bigint UNSIGNED NOT NULL,
  `datos_otros_id` bigint UNSIGNED NOT NULL,
  `habilidad` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `habilidads`
--

INSERT INTO `habilidads` (`id`, `datos_otros_id`, `habilidad`, `created_at`, `updated_at`) VALUES
(2, 1, 'TRABAJO BAJO PRESION', '2024-08-31 19:29:49', '2024-08-31 19:29:49'),
(3, 1, 'RESOLUCION DE PROBLEMAS', '2024-08-31 19:34:09', '2024-08-31 19:34:09'),
(6, 6, 'HABILIDAD #1', '2024-09-16 20:54:36', '2024-09-16 20:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` bigint UNSIGNED NOT NULL,
  `datos_otros_id` bigint UNSIGNED NOT NULL,
  `idioma` bigint UNSIGNED NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `datos_otros_id`, `idioma`, `nivel`, `certificado`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'MEDIO', 'CON CERTIFICADO', '2024-08-31 19:29:20', '2024-10-15 18:30:52'),
(7, 6, 1, 'AVANZADO', '', '2024-09-16 20:54:36', '2024-09-16 20:54:36'),
(8, 1, 1, 'MEDIO', 'SIN CERTIFICADO', '2024-10-15 18:24:30', '2024-10-15 18:32:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_idiomas`
--

CREATE TABLE `lista_idiomas` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_idiomas`
--

INSERT INTO `lista_idiomas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'INGLES', NULL, NULL),
(2, 'QUECHUA', NULL, NULL),
(3, 'AYMARA', NULL, NULL),
(4, 'GUARANI', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_01_31_165641_create_configuracions_table', 1),
(3, '2024_08_23_204407_create_parametrizacions_table', 2),
(4, '2024_08_24_151015_create_datos_personals_table', 3),
(5, '2024_08_24_151024_create_datos_otros_table', 3),
(6, '2024_08_24_151033_create_evaluacions_table', 3),
(7, '2024_08_24_151232_create_evaluacion_basicas_table', 3),
(8, '2024_08_24_151238_create_evaluacion_carreras_table', 3),
(9, '2024_08_24_151245_create_evaluacion_postgrados_table', 3),
(10, '2024_08_24_151251_create_evaluacion_cursos_table', 3),
(11, '2024_08_24_151257_create_evaluacion_laborals_table', 3),
(12, '2024_08_24_151302_create_evaluacion_distincions_table', 3),
(13, '2024_08_24_151642_create_idiomas_table', 3),
(14, '2024_08_24_151647_create_habilidads_table', 3),
(15, '2024_08_24_151653_create_referencias_table', 3),
(16, '2024_09_14_163606_create_cualidads_table', 4),
(17, '2024_10_15_141607_create_lista_idiomas_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrizacions`
--

CREATE TABLE `parametrizacions` (
  `id` bigint UNSIGNED NOT NULL,
  `primaria` double NOT NULL,
  `secundaria` double NOT NULL,
  `bachiller` double NOT NULL,
  `titulado` double NOT NULL,
  `egresado` double NOT NULL,
  `en_curso` double NOT NULL,
  `tecnico_superior` double NOT NULL,
  `tecnico_medio` double NOT NULL,
  `disciplina_ingenieria` double NOT NULL,
  `doctorado` double NOT NULL,
  `maestria` double NOT NULL,
  `especialidad` double NOT NULL,
  `diplomado` double NOT NULL,
  `c_carga_horaria` double NOT NULL,
  `p_cada_mes` double NOT NULL,
  `p_cada_reconocimiento` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parametrizacions`
--

INSERT INTO `parametrizacions` (`id`, `primaria`, `secundaria`, `bachiller`, `titulado`, `egresado`, `en_curso`, `tecnico_superior`, `tecnico_medio`, `disciplina_ingenieria`, `doctorado`, `maestria`, `especialidad`, `diplomado`, `c_carga_horaria`, `p_cada_mes`, `p_cada_reconocimiento`, `created_at`, `updated_at`) VALUES
(1, 6, 6, 7, 3, 4, 2, 3, 4, 5, 6, 7, 8, 4, 3, 3, 5, '2024-08-24 03:12:56', '2024-08-30 19:23:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `id` bigint UNSIGNED NOT NULL,
  `datos_otros_id` bigint UNSIGNED NOT NULL,
  `nombre_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relacion_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `referencias`
--

INSERT INTO `referencias` (`id`, `datos_otros_id`, `nombre_ref`, `cel_ref`, `correo_ref`, `cargo_ref`, `relacion_ref`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'JUAN BAUTISTA', '777777', 'JUAN@GMAIL.COM', 'GERENTE', 'GERENTE', 'DESC', '2024-08-31 19:33:07', '2024-10-16 00:58:30'),
(2, 6, 'JORGE PAREDES', '7777777', 'JORGE@GMAIL.COM', 'CARGO REF.', 'RELACION REF.', 'DESC. REF', '2024-09-16 20:54:36', '2024-09-16 20:54:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `password`, `email`, `tipo`, `foto`, `fecha_registro`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$12$65d4fgZsvBV5Lc/AxNKh4eoUdbGyaczQ4sSco20feSQANshNLuxSC', 'admin@admin.com', 'ADMINISTRADOR', NULL, '2024-08-23', 1, NULL, NULL),
(2, 'JUAN', 'PERES MAMANI', '$2y$12$/mlrOpJd2wIr7/L1EX9UxuF6FTMX.CN/jo0PZWSGXTS29oXhKFgpO', 'juan@gmail.com', 'POSTULANTE', '1725121911_2.jpg', '2024-08-23', 1, '2024-08-24 00:34:47', '2024-10-16 03:22:42'),
(3, 'PEDRO', 'MAMANI', '$2y$12$rp5ah1/cH1QKzFl1EWgINuQO6BOJpVZcHdhqJIHevLC4XbHzEAOUu', 'pedro@gmail.com', 'POSTULANTE', NULL, '2024-08-30', 1, '2024-08-30 19:43:23', '2024-10-16 03:32:36'),
(4, 'EDUARDO', 'GONZALES', '$2y$12$daON8WieVTEoE8YCfjYQPONVtDmFoIbatyWKLx0CROLHmUr4MtIcy', 'eduardo@gmail.com', 'POSTULANTE', NULL, '2024-09-16', 1, '2024-09-16 20:41:01', '2024-09-16 20:41:01'),
(5, 'ALFONSO', 'RODRIGUEZ', '$2y$12$tsm1ZKkFhx45BLHJS38PkOgRfpkc5OKVjbINXWtwrDb7BZXTV3Y7u', 'alfonso@gmail.com', 'POSTULANTE', NULL, '2024-09-16', 1, '2024-09-16 20:47:49', '2024-09-16 20:47:49'),
(6, 'CLAUDIA', 'RAMOS', '$2y$12$5KehOho5qSoNGBXxeNM3W.DMzxzExFnKvfbGGwjg2UP920n3NYD9K', 'claudia@gmail.com', 'POSTULANTE', NULL, '2024-10-15', 1, '2024-10-16 01:02:57', '2024-10-16 01:02:57'),
(7, 'recursos', 'humanos', '$2y$12$65d4fgZsvBV5Lc/AxNKh4eoUdbGyaczQ4sSco20feSQANshNLuxSC', 'rh@gmail.com', 'RECURSOS HUMANOS', NULL, '2024-10-15', 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cualidads`
--
ALTER TABLE `cualidads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cualidads_datos_otros_id_foreign` (`datos_otros_id`);

--
-- Indices de la tabla `datos_otros`
--
ALTER TABLE `datos_otros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datos_otros_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `datos_personals`
--
ALTER TABLE `datos_personals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datos_personals_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `evaluacions`
--
ALTER TABLE `evaluacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluacions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `evaluacion_basicas`
--
ALTER TABLE `evaluacion_basicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluacion_basicas_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indices de la tabla `evaluacion_carreras`
--
ALTER TABLE `evaluacion_carreras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluacion_carreras_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indices de la tabla `evaluacion_cursos`
--
ALTER TABLE `evaluacion_cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluacion_cursos_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indices de la tabla `evaluacion_distincions`
--
ALTER TABLE `evaluacion_distincions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluacion_distincions_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indices de la tabla `evaluacion_laborals`
--
ALTER TABLE `evaluacion_laborals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluacion_laborals_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indices de la tabla `evaluacion_postgrados`
--
ALTER TABLE `evaluacion_postgrados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluacion_postgrados_evaluacion_id_foreign` (`evaluacion_id`);

--
-- Indices de la tabla `habilidads`
--
ALTER TABLE `habilidads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `habilidads_datos_otros_id_foreign` (`datos_otros_id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idiomas_datos_otros_id_foreign` (`datos_otros_id`);

--
-- Indices de la tabla `lista_idiomas`
--
ALTER TABLE `lista_idiomas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametrizacions`
--
ALTER TABLE `parametrizacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referencias_datos_otros_id_foreign` (`datos_otros_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cualidads`
--
ALTER TABLE `cualidads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `datos_otros`
--
ALTER TABLE `datos_otros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `datos_personals`
--
ALTER TABLE `datos_personals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `evaluacions`
--
ALTER TABLE `evaluacions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `evaluacion_basicas`
--
ALTER TABLE `evaluacion_basicas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `evaluacion_carreras`
--
ALTER TABLE `evaluacion_carreras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `evaluacion_cursos`
--
ALTER TABLE `evaluacion_cursos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `evaluacion_distincions`
--
ALTER TABLE `evaluacion_distincions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `evaluacion_laborals`
--
ALTER TABLE `evaluacion_laborals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `evaluacion_postgrados`
--
ALTER TABLE `evaluacion_postgrados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `habilidads`
--
ALTER TABLE `habilidads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `lista_idiomas`
--
ALTER TABLE `lista_idiomas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `parametrizacions`
--
ALTER TABLE `parametrizacions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cualidads`
--
ALTER TABLE `cualidads`
  ADD CONSTRAINT `cualidads_datos_otros_id_foreign` FOREIGN KEY (`datos_otros_id`) REFERENCES `datos_otros` (`id`);

--
-- Filtros para la tabla `datos_otros`
--
ALTER TABLE `datos_otros`
  ADD CONSTRAINT `datos_otros_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `datos_personals`
--
ALTER TABLE `datos_personals`
  ADD CONSTRAINT `datos_personals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `evaluacions`
--
ALTER TABLE `evaluacions`
  ADD CONSTRAINT `evaluacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `evaluacion_basicas`
--
ALTER TABLE `evaluacion_basicas`
  ADD CONSTRAINT `evaluacion_basicas_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`);

--
-- Filtros para la tabla `evaluacion_carreras`
--
ALTER TABLE `evaluacion_carreras`
  ADD CONSTRAINT `evaluacion_carreras_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`);

--
-- Filtros para la tabla `evaluacion_cursos`
--
ALTER TABLE `evaluacion_cursos`
  ADD CONSTRAINT `evaluacion_cursos_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`);

--
-- Filtros para la tabla `evaluacion_distincions`
--
ALTER TABLE `evaluacion_distincions`
  ADD CONSTRAINT `evaluacion_distincions_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`);

--
-- Filtros para la tabla `evaluacion_laborals`
--
ALTER TABLE `evaluacion_laborals`
  ADD CONSTRAINT `evaluacion_laborals_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`);

--
-- Filtros para la tabla `evaluacion_postgrados`
--
ALTER TABLE `evaluacion_postgrados`
  ADD CONSTRAINT `evaluacion_postgrados_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacions` (`id`);

--
-- Filtros para la tabla `habilidads`
--
ALTER TABLE `habilidads`
  ADD CONSTRAINT `habilidads_datos_otros_id_foreign` FOREIGN KEY (`datos_otros_id`) REFERENCES `datos_otros` (`id`);

--
-- Filtros para la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD CONSTRAINT `idiomas_datos_otros_id_foreign` FOREIGN KEY (`datos_otros_id`) REFERENCES `datos_otros` (`id`);

--
-- Filtros para la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD CONSTRAINT `referencias_datos_otros_id_foreign` FOREIGN KEY (`datos_otros_id`) REFERENCES `datos_otros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
