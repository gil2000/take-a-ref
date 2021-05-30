-- --------------------------------------------------------
-- Anfitrião:                    localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for take-a-ref
DROP DATABASE IF EXISTS `take-a-ref`;
CREATE DATABASE IF NOT EXISTS `take-a-ref` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `take-a-ref`;

-- Dumping structure for table take-a-ref.cantinas
DROP TABLE IF EXISTS `cantinas`;
CREATE TABLE IF NOT EXISTS `cantinas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localizacao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.cantinas: ~0 rows (approximately)
/*!40000 ALTER TABLE `cantinas` DISABLE KEYS */;
REPLACE INTO `cantinas` (`id`, `nome`, `horario`, `localizacao`, `created_at`, `updated_at`) VALUES
	(1, 'Instituto Superior de Contabilidade e Administração de Coimbra', '24 horas por dia', 'Eira Pedrinha', '2021-05-30 01:29:01', '2021-05-30 01:29:01');
/*!40000 ALTER TABLE `cantinas` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.carrinhos
DROP TABLE IF EXISTS `carrinhos`;
CREATE TABLE IF NOT EXISTS `carrinhos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ementa_dia` bigint(20) unsigned NOT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carrinhos_ementa_dia_foreign` (`ementa_dia`),
  KEY `carrinhos_users_id_foreign` (`users_id`),
  CONSTRAINT `carrinhos_ementa_dia_foreign` FOREIGN KEY (`ementa_dia`) REFERENCES `ementas` (`id`),
  CONSTRAINT `carrinhos_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.carrinhos: ~0 rows (approximately)
/*!40000 ALTER TABLE `carrinhos` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinhos` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.categorias
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.categorias: ~6 rows (approximately)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
REPLACE INTO `categorias` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
	(1, 'Carne', '2021-05-21 20:10:43', '2021-05-21 20:10:43'),
	(2, 'Peixe', '2021-05-21 20:14:59', '2021-05-21 20:14:59'),
	(3, 'Vegetariano', '2021-05-21 19:15:21', '2021-05-21 19:15:21'),
	(4, 'Doce', '2021-05-21 21:21:14', '2021-05-21 21:21:14'),
	(5, 'Fruta', '2021-05-21 21:21:26', '2021-05-21 21:21:26'),
	(6, 'Sopa', '2021-05-21 21:21:35', '2021-05-21 21:21:35'),
	(7, 'Pão', '2021-05-22 16:43:55', '2021-05-22 16:43:55'),
	(8, 'Bebidas', '2021-05-25 13:28:47', '2021-05-25 13:28:47');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.comp_carrinhos
DROP TABLE IF EXISTS `comp_carrinhos`;
CREATE TABLE IF NOT EXISTS `comp_carrinhos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `carrinho_id` bigint(20) unsigned NOT NULL,
  `produto_id` bigint(20) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comp_carrinhos_carrinho_id_foreign` (`carrinho_id`),
  KEY `comp_carrinhos_produto_id_foreign` (`produto_id`),
  CONSTRAINT `comp_carrinhos_carrinho_id_foreign` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinhos` (`id`),
  CONSTRAINT `comp_carrinhos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.comp_carrinhos: ~0 rows (approximately)
/*!40000 ALTER TABLE `comp_carrinhos` DISABLE KEYS */;
/*!40000 ALTER TABLE `comp_carrinhos` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.detalhes_pedidos
DROP TABLE IF EXISTS `detalhes_pedidos`;
CREATE TABLE IF NOT EXISTS `detalhes_pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pedido_id` bigint(20) unsigned NOT NULL,
  `produto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalhes_pedidos_pedido_id_foreign` (`pedido_id`),
  KEY `detalhes_pedidos_produto_id_foreign` (`produto_id`),
  CONSTRAINT `detalhes_pedidos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalhes_pedidos_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.detalhes_pedidos: ~27 rows (approximately)
/*!40000 ALTER TABLE `detalhes_pedidos` DISABLE KEYS */;
REPLACE INTO `detalhes_pedidos` (`id`, `pedido_id`, `produto_id`, `created_at`, `updated_at`) VALUES
	(18, 8, 4, '2021-05-30 10:12:14', '2021-05-30 10:12:14'),
	(19, 8, 1, '2021-05-30 10:12:14', '2021-05-30 10:12:14'),
	(20, 8, 6, '2021-05-30 10:12:14', '2021-05-30 10:12:14'),
	(21, 8, 7, '2021-05-30 10:12:14', '2021-05-30 10:12:14'),
	(22, 9, 4, '2021-05-30 10:36:12', '2021-05-30 10:36:12'),
	(23, 9, 1, '2021-05-30 10:36:12', '2021-05-30 10:36:12'),
	(24, 9, 6, '2021-05-30 10:36:12', '2021-05-30 10:36:12'),
	(25, 9, 7, '2021-05-30 10:36:12', '2021-05-30 10:36:12'),
	(26, 10, 4, '2021-05-30 10:38:04', '2021-05-30 10:38:04'),
	(27, 10, 1, '2021-05-30 10:38:04', '2021-05-30 10:38:04'),
	(28, 10, 6, '2021-05-30 10:38:04', '2021-05-30 10:38:04'),
	(29, 10, 7, '2021-05-30 10:38:04', '2021-05-30 10:38:04'),
	(30, 11, 4, '2021-05-30 11:41:45', '2021-05-30 11:41:45'),
	(31, 11, 1, '2021-05-30 11:41:45', '2021-05-30 11:41:45'),
	(32, 11, 5, '2021-05-30 11:41:45', '2021-05-30 11:41:45'),
	(33, 11, 7, '2021-05-30 11:41:45', '2021-05-30 11:41:45'),
	(34, 11, 8, '2021-05-30 11:41:45', '2021-05-30 11:41:45'),
	(36, 13, 4, '2021-05-30 14:35:03', '2021-05-30 14:35:03'),
	(37, 13, 1, '2021-05-30 14:35:03', '2021-05-30 14:35:03'),
	(38, 13, 5, '2021-05-30 14:35:03', '2021-05-30 14:35:03'),
	(39, 13, 7, '2021-05-30 14:35:03', '2021-05-30 14:35:03'),
	(40, 13, 8, '2021-05-30 14:35:03', '2021-05-30 14:35:03'),
	(41, 13, 2, '2021-05-30 14:35:03', '2021-05-30 14:35:03'),
	(42, 14, 2, '2021-05-30 15:35:44', '2021-05-30 15:35:44'),
	(43, 14, 4, '2021-05-30 15:35:44', '2021-05-30 15:35:44'),
	(44, 14, 5, '2021-05-30 15:35:44', '2021-05-30 15:35:44'),
	(45, 14, 7, '2021-05-30 15:35:44', '2021-05-30 15:35:44');
/*!40000 ALTER TABLE `detalhes_pedidos` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.ementas
DROP TABLE IF EXISTS `ementas`;
CREATE TABLE IF NOT EXISTS `ementas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dia` timestamp NOT NULL,
  `tipo` int(11) NOT NULL,
  `produto_id` bigint(20) unsigned NOT NULL,
  `diasemana` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ementas_produto_id_foreign` (`produto_id`),
  CONSTRAINT `ementas_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.ementas: ~66 rows (approximately)
/*!40000 ALTER TABLE `ementas` DISABLE KEYS */;
REPLACE INTO `ementas` (`id`, `dia`, `tipo`, `produto_id`, `diasemana`, `created_at`, `updated_at`) VALUES
	(1, '2021-05-28 00:00:00', 1, 4, 1, '2021-05-21 20:11:10', '2021-05-30 15:48:58'),
	(3, '2021-05-21 00:00:00', 1, 1, 1, '2021-05-21 19:16:20', '2021-05-21 19:16:20'),
	(4, '2021-05-21 00:00:00', 1, 3, 1, '2021-05-21 19:16:44', '2021-05-21 19:16:44'),
	(5, '2021-05-21 00:00:00', 1, 2, 1, '2021-05-21 19:16:55', '2021-05-21 19:16:55'),
	(6, '2021-05-21 00:00:00', 1, 6, 1, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(7, '2021-05-21 20:11:02', 1, 1, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(8, '2021-05-21 20:11:02', 1, 2, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(9, '2021-05-21 20:11:02', 1, 3, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(10, '2021-05-21 20:11:02', 1, 4, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(11, '2021-05-21 20:11:02', 1, 5, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(12, '2021-05-21 20:11:02', 1, 6, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(13, '2021-05-21 20:11:02', 2, 1, 1, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(14, '2021-05-21 20:11:02', 2, 2, 1, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(15, '2021-05-21 20:11:02', 2, 3, 1, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(16, '2021-05-21 20:11:02', 2, 4, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(17, '2021-05-21 20:11:02', 2, 1, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(18, '2021-05-21 20:11:02', 2, 3, 2, '2021-05-21 20:11:10', '2021-05-21 20:11:10'),
	(19, '2021-05-21 00:00:00', 2, 4, 1, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(20, '2021-05-21 00:00:00', 2, 5, 1, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(21, '2021-05-21 00:00:00', 2, 6, 1, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(22, '2021-05-21 00:00:00', 2, 6, 2, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(23, '2021-05-21 00:00:00', 2, 2, 2, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(24, '2021-05-21 00:00:00', 2, 3, 2, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(25, '2021-05-21 00:00:00', 1, 4, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(26, '2021-05-21 00:00:00', 1, 5, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(27, '2021-05-21 00:00:00', 1, 6, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(28, '2021-05-21 00:00:00', 1, 2, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(29, '2021-05-21 00:00:00', 1, 1, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(30, '2021-05-21 00:00:00', 1, 3, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(31, '2021-05-21 00:00:00', 2, 5, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(32, '2021-05-21 00:00:00', 2, 4, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(33, '2021-05-21 00:00:00', 2, 1, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(34, '2021-05-21 00:00:00', 2, 5, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(35, '2021-05-21 00:00:00', 2, 1, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(36, '2021-05-21 00:00:00', 2, 2, 3, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(37, '2021-05-21 00:00:00', 1, 3, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(38, '2021-05-21 00:00:00', 1, 4, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(39, '2021-05-21 00:00:00', 1, 5, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(40, '2021-05-21 00:00:00', 1, 6, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(41, '2021-05-21 00:00:00', 1, 1, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(42, '2021-05-21 00:00:00', 1, 2, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(43, '2021-05-21 00:00:00', 2, 3, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(44, '2021-05-21 00:00:00', 2, 4, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(45, '2021-05-21 00:00:00', 2, 1, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(46, '2021-05-21 00:00:00', 2, 2, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(47, '2021-05-21 00:00:00', 2, 3, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(48, '2021-05-21 00:00:00', 2, 4, 4, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(49, '2021-05-21 00:00:00', 1, 5, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(50, '2021-05-21 00:00:00', 1, 6, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(51, '2021-05-21 00:00:00', 1, 1, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(52, '2021-05-21 00:00:00', 1, 2, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(53, '2021-05-21 00:00:00', 1, 3, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(54, '2021-05-21 00:00:00', 1, 4, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(55, '2021-05-21 00:00:00', 2, 5, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(56, '2021-05-21 00:00:00', 2, 6, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(57, '2021-05-21 00:00:00', 2, 6, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(58, '2021-05-21 00:00:00', 2, 1, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(59, '2021-05-21 00:00:00', 2, 2, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(60, '2021-05-21 00:00:00', 2, 3, 5, '2021-05-21 19:17:16', '2021-05-21 19:17:16'),
	(61, '2021-05-21 00:00:00', 1, 8, 1, '2021-05-21 19:16:11', '2021-05-21 19:16:11'),
	(65, '2021-05-30 11:31:09', 2, 8, 1, '2021-05-30 11:31:15', '2021-05-30 11:31:15'),
	(66, '2021-05-30 11:31:24', 2, 7, 1, '2021-05-30 11:31:31', '2021-05-30 11:31:31'),
	(67, '2021-05-30 00:00:00', 1, 5, 1, '2021-05-30 15:28:25', '2021-05-30 15:28:25'),
	(68, '2021-05-30 00:00:00', 1, 7, 1, '2021-05-30 15:29:12', '2021-05-30 15:29:12'),
	(69, '2021-05-30 22:15:07', 1, 8, 2, '2021-05-30 22:15:08', '2021-05-30 22:15:08'),
	(70, '2021-05-30 22:15:25', 2, 8, 2, '2021-05-30 22:15:32', '2021-05-30 22:15:32');
/*!40000 ALTER TABLE `ementas` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.faturas
DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `carrinho_id` bigint(20) unsigned NOT NULL,
  `comp_carrinho_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faturas_user_id_foreign` (`user_id`),
  KEY `faturas_carrinho_id_foreign` (`carrinho_id`),
  KEY `faturas_comp_carrinho_id_foreign` (`comp_carrinho_id`),
  CONSTRAINT `faturas_carrinho_id_foreign` FOREIGN KEY (`carrinho_id`) REFERENCES `carrinhos` (`id`),
  CONSTRAINT `faturas_comp_carrinho_id_foreign` FOREIGN KEY (`comp_carrinho_id`) REFERENCES `comp_carrinhos` (`id`),
  CONSTRAINT `faturas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.faturas: ~0 rows (approximately)
/*!40000 ALTER TABLE `faturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `faturas` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.feedback
DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.feedback: ~4 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
REPLACE INTO `feedback` (`id`, `nome`, `email`, `texto`, `created_at`, `updated_at`) VALUES
	(2, 'Gil Costa Aguilar', 'gil.aguilar2000@hotmail.com', 'Comida muito boa!', '2021-05-30 14:20:46', '2021-05-30 14:20:46'),
	(3, 'Pedro Santos', 'ped.57@gmail.com', 'Com certeza voltarei a esta cantina!\r\nObrigado.', '2021-05-30 14:21:43', '2021-05-30 14:21:43'),
	(4, 'João Carlos', 'joaocarlos@sporting.com', 'O bife estava mal passado, não gostei.\r\nSaudações leoninas!', '2021-05-30 14:22:44', '2021-05-30 14:22:44'),
	(5, 'Dillaz', 'dillazbusiness@sapo.pt', 'Alta pitéu, abraço.', '2021-05-30 14:24:00', '2021-05-30 14:24:00');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.migrations: ~16 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_04_29_144556_create_categorias_table', 1),
	(5, '2021_04_29_144560_create_produtos_table', 1),
	(6, '2021_04_29_144600_create_ementas_table', 1),
	(7, '2021_04_29_144808_create_carrinhos_table', 1),
	(8, '2021_04_29_144856_create_comp_carrinhos_table', 1),
	(9, '2021_04_29_145008_create_faturas_table', 1),
	(10, '2021_04_29_145031_create_feedback_table', 1),
	(11, '2021_05_01_230247_create_roles_table', 1),
	(12, '2021_05_01_230457_create_role_user_table', 1),
	(13, '2021_05_03_144303_create_cantinas_table', 1),
	(14, '2021_05_04_131957_foreign_keys_for_role_user', 1),
	(20, '2018_12_23_120000_create_shoppingcart_table', 2),
	(21, '2021_05_29_105014_create_pedidos_table', 2),
	(22, '2021_05_29_142657_create_detalhes_pedidos_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
REPLACE INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('gil.aguilar2000@hotmail.com', '$2y$10$RK.zm/ySS9NN1dlSFOogOePx6w5jiDzV9PsOwB6CyHCzOa2/2hgji', '2021-05-30 02:31:47');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.pedidos
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apelido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `morada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigopostal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.pedidos: ~6 rows (approximately)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
REPLACE INTO `pedidos` (`id`, `nome`, `apelido`, `morada`, `codigopostal`, `nif`, `created_at`, `updated_at`) VALUES
	(8, 'Gil', 'Costa', 'Caminho da Avessada nº5, Olho Marinho, Vila Nova de Poiares', '3350-210', '19425883', '2021-05-30 10:12:14', '2021-05-30 10:12:14'),
	(9, 'João', 'Carlos', 'Guarda', '3412-456', '25257418', '2021-05-30 10:36:12', '2021-05-30 10:36:12'),
	(10, 'Pedro', 'Santos', 'Eira Pedrinha', '3456-111', '674312312', '2021-05-30 10:38:04', '2021-05-30 10:38:04'),
	(11, 'Pedro', 'Santos', 'Eira Pedrinha', '3412-456', '123456', '2021-05-30 11:41:45', '2021-05-30 11:41:45'),
	(13, 'Gonçalo', 'Moreira', 'Moinho do meio', '3350-210', '123456', '2021-05-30 14:35:03', '2021-05-30 14:35:03'),
	(14, 'Gil', 'Santos', 'Caminho da Avessada nº5, Olho Marinho, Vila Nova de Poiares', '3350-210', '99999', '2021-05-30 15:35:44', '2021-05-30 15:35:44');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.produtos
DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produtos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `produtos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.produtos: ~10 rows (approximately)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
REPLACE INTO `produtos` (`id`, `categoria_id`, `nome`, `descricao`, `preco`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Bitoque', '--', 1.50, '2021-05-21 20:10:54', '2021-05-30 15:19:23'),
	(2, 3, 'Carapau', '--', 1.50, '2021-05-21 19:15:41', '2021-05-30 15:02:19'),
	(3, 3, 'Chamuças vegetarianas', '--', 1.50, '2021-05-21 19:15:51', '2021-05-21 19:15:51'),
	(4, 6, 'Sopa de Legumes', '--\r\n', 0.50, '2021-05-21 21:22:23', '2021-05-21 21:22:23'),
	(5, 5, 'Pêra', '--', 0.50, '2021-05-21 21:22:36', '2021-05-21 21:22:36'),
	(6, 4, 'Mousse', '--', 0.50, '2021-05-21 21:22:52', '2021-05-21 21:22:54'),
	(7, 7, 'Pão', '--', 0.15, '2021-05-22 16:44:08', '2021-05-22 16:44:08'),
	(8, 8, 'Sumo', '--', 1.00, '2021-05-28 14:48:05', '2021-05-28 14:48:05'),
	(10, 3, 'Castanhas assadas com arroz', '--', 1.50, '2021-05-29 15:20:35', '2021-05-29 15:20:35'),
	(11, 4, 'Baba de Camelo', '--', 1.00, '2021-05-30 15:24:54', '2021-05-30 15:24:54');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
REPLACE INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2021-05-21 19:09:21', '2021-05-21 19:09:21'),
	(2, 'estudante', '2021-05-21 19:09:21', '2021-05-21 19:09:21'),
	(3, 'user', '2021-05-21 19:09:21', '2021-05-21 19:09:21');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.role_user
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.role_user: ~4 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
REPLACE INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 3, 1, NULL, NULL),
	(2, 2, 2, NULL, NULL),
	(3, 1, 3, NULL, NULL),
	(4, 1, 6, NULL, NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table take-a-ref.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table take-a-ref.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Pedro Santos', 'ped.57@gmail.com', NULL, '$2y$10$e754htKmcMW.NGMzPY3XWOjw31u348ZuK3AnnTL7eCDM82DU7BuX.', NULL, '2021-05-21 19:09:21', '2021-05-27 21:08:18'),
	(2, 'Gil Aguilar Estudante', 'gil.aguilar2000@hotmail.com', NULL, '$2y$10$4AUCQ3IdPHg51dHaMx58p.AW.vc0pzh8zZNOzawFz7Nqonqt3OXwi', NULL, '2021-05-21 19:09:21', '2021-05-21 19:09:21'),
	(3, 'Admin', 'admin@admin.pt', NULL, '$2y$10$M56FM0Yo15u/j.Kjbq3SQeopOEDHorjzbCCbhysPQi0yWozgHWHjq', NULL, '2021-05-21 19:09:21', '2021-05-21 19:09:21'),
	(6, 'João Carlos', 'joaocarlosscp@gmail.com', NULL, '$2y$10$zTVxsNaMkAndceDXyV3zTezhxPQbEI3Wt69WpVPWCClJlMQniOHae', NULL, '2021-05-30 10:14:26', '2021-05-30 10:14:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
