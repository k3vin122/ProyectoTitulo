-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-01-2024 a las 18:10:47
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cintas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cintas`
--

CREATE TABLE `cintas` (
  `id` bigint UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almacenamiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingreso_cinta_sn_rotulo_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cintas`
--

INSERT INTO `cintas` (`id`, `codigo`, `almacenamiento`, `marca`, `ingreso_cinta_sn_rotulo_id`, `created_at`, `updated_at`) VALUES
(3, 'HFSTRE65234', '15 TB', 'IBM', 14, '2024-01-15 19:11:18', '2024-01-15 19:11:18'),
(4, 'HFSTRE65235', '15tb', 'Generica', 17, '2024-01-23 15:47:20', '2024-01-23 15:47:20'),
(5, 'HFSTRE65236', '15 TB', 'Generica', 18, '2024-01-23 15:47:42', '2024-01-23 15:47:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint UNSIGNED NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `rol`, `nombre`, `direccion`, `telefono`, `correo`, `created_at`, `updated_at`) VALUES
(1, '87.548.698-0', 'Claro Chile SPA', 'Santiago SN', '0000', 'contacto@gmail.com', '2023-12-18 22:00:25', '2023-12-18 22:00:25'),
(2, '456549878-8', 'test', 'h', 'ola', 'sadasdx', '2023-12-19 20:49:14', '2023-12-19 20:49:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_movimientos`
--

CREATE TABLE `estado_movimientos` (
  `id` bigint UNSIGNED NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_movimientos`
--

INSERT INTO `estado_movimientos` (`id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'En uso', '2023-12-18 22:01:50', '2023-12-18 22:01:50'),
(2, 'Respaldada', '2023-12-18 22:02:05', '2023-12-18 22:02:05'),
(3, 'Limpieza', '2023-12-18 22:02:22', '2023-12-18 22:02:22'),
(4, 'Dañada', '2023-12-18 22:02:28', '2023-12-18 22:02:28'),
(5, 'sdadasd', '2023-12-22 18:05:17', '2023-12-22 18:05:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_rotulos`
--

CREATE TABLE `estado_rotulos` (
  `id` bigint UNSIGNED NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_rotulos`
--

INSERT INTO `estado_rotulos` (`id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Utilizado', '2023-12-18 21:52:38', '2023-12-18 21:52:38'),
(2, 'Dañado', '2023-12-18 21:52:51', '2023-12-18 21:52:51'),
(3, 'Devuelto', '2023-12-18 21:52:57', '2023-12-18 21:52:57'),
(4, 'Perdido', '2023-12-18 21:53:03', '2023-12-18 21:53:03'),
(5, 'Sin uso', '2023-12-18 21:53:28', '2023-12-18 21:53:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_sn_rotulos`
--

CREATE TABLE `estado_sn_rotulos` (
  `id` bigint UNSIGNED NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_sn_rotulos`
--

INSERT INTO `estado_sn_rotulos` (`id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Dañada', '2023-12-18 21:56:08', '2023-12-18 21:56:08'),
(4, 'En Proceso', '2023-12-18 21:56:41', '2023-12-22 17:52:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso_cinta_sn_rotulos`
--

CREATE TABLE `ingreso_cinta_sn_rotulos` (
  `id` bigint UNSIGNED NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almacenamiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_sn_rotulo_id` bigint UNSIGNED NOT NULL,
  `rotulo_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingreso_cinta_sn_rotulos`
--

INSERT INTO `ingreso_cinta_sn_rotulos` (`id`, `serie`, `almacenamiento`, `marca`, `estado_sn_rotulo_id`, `rotulo_id`, `created_at`, `updated_at`) VALUES
(14, 'HFSTRE65234', '15TB', 'Genérica', 4, 6, '2023-12-22 17:53:42', '2023-12-22 17:55:01'),
(17, 'HFSTRE65235', '15TB', 'Genérica', 4, 4, '2024-01-23 15:40:50', '2024-01-23 15:40:50'),
(18, 'HFSTRE65236', '15TB', 'Genérica', 4, 5, '2024-01-23 15:41:11', '2024-01-23 15:41:11');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_18_000001_create_cintas_table', 1),
(6, '2023_12_18_000002_create_empresas_table', 1),
(7, '2023_12_18_000003_create_estado_movimientos_table', 1),
(8, '2023_12_18_000004_create_estado_rotulos_table', 1),
(9, '2023_12_18_000005_create_estado_sn_rotulos_table', 1),
(10, '2023_12_18_000006_create_ingreso_cinta_sn_rotulos_table', 1),
(11, '2023_12_18_000007_create_movimientos_table', 1),
(12, '2023_12_18_000008_create_responsables_table', 1),
(13, '2023_12_18_000009_create_rotulos_table', 1),
(14, '2023_12_18_009001_add_foreigns_to_cintas_table', 1),
(15, '2023_12_18_009002_add_foreigns_to_ingreso_cinta_sn_rotulos_table', 1),
(16, '2023_12_18_009003_add_foreigns_to_movimientos_table', 1),
(17, '2023_12_18_009004_add_foreigns_to_responsables_table', 1),
(18, '2023_12_18_009005_add_foreigns_to_rotulos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` bigint UNSIGNED NOT NULL,
  `cinta_id` bigint UNSIGNED NOT NULL,
  `estado_movimiento_id` bigint UNSIGNED NOT NULL,
  `responsable_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `cinta_id`, `estado_movimiento_id`, `responsable_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 1, 1, '2024-01-15 19:11:58', '2024-01-15 19:11:58'),
(4, 4, 1, 1, 1, '2024-01-23 15:53:55', '2024-01-23 15:53:55'),
(5, 5, 1, 1, 1, '2024-01-23 15:54:09', '2024-01-23 17:37:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `id` bigint UNSIGNED NOT NULL,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id`, `rut`, `nombre`, `telefono`, `empresa_id`, `created_at`, `updated_at`) VALUES
(1, '19.548.654-8', 'Ignacio Barra', '920368074', 1, '2023-12-18 22:01:09', '2023-12-18 22:01:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rotulos`
--

CREATE TABLE `rotulos` (
  `id` bigint UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_rotulo_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rotulos`
--

INSERT INTO `rotulos` (`id`, `codigo`, `estado_rotulo_id`, `created_at`, `updated_at`) VALUES
(4, 'XL800L2', 1, '2023-12-20 20:53:50', '2023-12-20 20:53:50'),
(5, 'XL800L3', 1, '2023-12-20 20:54:31', '2023-12-20 20:54:31'),
(6, 'XL800L4', 1, '2023-12-20 20:54:40', '2023-12-20 20:54:40'),
(7, 'XL800L5', 1, '2024-01-23 15:39:30', '2024-01-23 15:39:30'),
(8, 'XL800L6', 1, '2024-01-23 15:39:38', '2024-01-23 15:39:38'),
(9, 'XL800L7', 1, '2024-01-23 15:39:48', '2024-01-23 15:39:48'),
(10, 'XL800L9', 1, '2024-01-23 15:40:08', '2024-01-23 15:40:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kevin Ross', 'kross@ssdr.gob.cl', NULL, '$2y$10$FogafETPXPZBdzJdaQFFLeH7W9sKqLtvs3pi.rUAnPa6bgpc0VliK', 'akScWmJteoGCcKdJbIuNcudNnCJd8aMVnDGDsoHh5B8KvMl4w6MuGgNdWGXO', '2023-12-18 21:51:31', '2023-12-18 21:51:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cintas`
--
ALTER TABLE `cintas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cintas_ingreso_cinta_sn_rotulo_id_foreign` (`ingreso_cinta_sn_rotulo_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_movimientos`
--
ALTER TABLE `estado_movimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_rotulos`
--
ALTER TABLE `estado_rotulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_sn_rotulos`
--
ALTER TABLE `estado_sn_rotulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `ingreso_cinta_sn_rotulos`
--
ALTER TABLE `ingreso_cinta_sn_rotulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingreso_cinta_sn_rotulos_estado_sn_rotulo_id_foreign` (`estado_sn_rotulo_id`),
  ADD KEY `ingreso_cinta_sn_rotulos_rotulo_id_foreign` (`rotulo_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimientos_cinta_id_foreign` (`cinta_id`),
  ADD KEY `movimientos_estado_movimiento_id_foreign` (`estado_movimiento_id`),
  ADD KEY `movimientos_responsable_id_foreign` (`responsable_id`),
  ADD KEY `movimientos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `responsables_empresa_id_foreign` (`empresa_id`);

--
-- Indices de la tabla `rotulos`
--
ALTER TABLE `rotulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rotulos_estado_rotulo_id_foreign` (`estado_rotulo_id`);

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
-- AUTO_INCREMENT de la tabla `cintas`
--
ALTER TABLE `cintas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_movimientos`
--
ALTER TABLE `estado_movimientos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_rotulos`
--
ALTER TABLE `estado_rotulos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_sn_rotulos`
--
ALTER TABLE `estado_sn_rotulos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingreso_cinta_sn_rotulos`
--
ALTER TABLE `ingreso_cinta_sn_rotulos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rotulos`
--
ALTER TABLE `rotulos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cintas`
--
ALTER TABLE `cintas`
  ADD CONSTRAINT `cintas_ingreso_cinta_sn_rotulo_id_foreign` FOREIGN KEY (`ingreso_cinta_sn_rotulo_id`) REFERENCES `ingreso_cinta_sn_rotulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ingreso_cinta_sn_rotulos`
--
ALTER TABLE `ingreso_cinta_sn_rotulos`
  ADD CONSTRAINT `ingreso_cinta_sn_rotulos_estado_sn_rotulo_id_foreign` FOREIGN KEY (`estado_sn_rotulo_id`) REFERENCES `estado_sn_rotulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ingreso_cinta_sn_rotulos_rotulo_id_foreign` FOREIGN KEY (`rotulo_id`) REFERENCES `rotulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_cinta_id_foreign` FOREIGN KEY (`cinta_id`) REFERENCES `cintas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_estado_movimiento_id_foreign` FOREIGN KEY (`estado_movimiento_id`) REFERENCES `estado_movimientos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `responsables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD CONSTRAINT `responsables_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rotulos`
--
ALTER TABLE `rotulos`
  ADD CONSTRAINT `rotulos_estado_rotulo_id_foreign` FOREIGN KEY (`estado_rotulo_id`) REFERENCES `estado_rotulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
