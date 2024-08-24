-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-08-2024 a las 15:23:22
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
(1, 'SISBDT', 'SISBDT', '1724511946_1.svg', NULL, '2024-08-24 19:05:46');

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
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoja_vida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calificacion` double NOT NULL DEFAULT '0',
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacions`
--

CREATE TABLE `evaluacions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` bigint UNSIGNED NOT NULL,
  `datos_otros_id` bigint UNSIGNED NOT NULL,
  `idioma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, '2024_08_24_151653_create_referencias_table', 3);

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
(1, 5, 6, 7, 3, 4, 2, 3, 4, 5, 6, 7, 8, 4, 3, 3, 3, '2024-08-24 03:12:56', '2024-08-24 03:23:42');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `password`, `email`, `tipo`, `foto`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$12$65d4fgZsvBV5Lc/AxNKh4eoUdbGyaczQ4sSco20feSQANshNLuxSC', 'admin@admin.com', 'ADMINISTRADOR', NULL, '2024-08-23', NULL, NULL),
(2, 'JUAN', 'PERES MAMANI', '$2y$12$H7Z1N6zoDI4hWvgPraCanO0ZT8VZ9CQS.v3mLKTyKpE/oLMRB.Ory', 'juan@gmail.com', 'POSTULANTE', NULL, '2024-08-23', '2024-08-24 00:34:47', '2024-08-24 00:34:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `datos_otros`
--
ALTER TABLE `datos_otros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_personals`
--
ALTER TABLE `datos_personals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacions`
--
ALTER TABLE `evaluacions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_basicas`
--
ALTER TABLE `evaluacion_basicas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_carreras`
--
ALTER TABLE `evaluacion_carreras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_cursos`
--
ALTER TABLE `evaluacion_cursos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_distincions`
--
ALTER TABLE `evaluacion_distincions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_laborals`
--
ALTER TABLE `evaluacion_laborals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evaluacion_postgrados`
--
ALTER TABLE `evaluacion_postgrados`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habilidads`
--
ALTER TABLE `habilidads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `parametrizacions`
--
ALTER TABLE `parametrizacions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `referencias`
--
ALTER TABLE `referencias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

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
