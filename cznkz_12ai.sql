-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: srv-pleskdb18.ps.kz:3306
-- Время создания: Янв 29 2018 г., 17:16
-- Версия сервера: 5.5.56-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cznkz_12ai`
--

-- --------------------------------------------------------

--
-- Структура таблицы `callbacks`
--

CREATE TABLE `callbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `callbacks`
--

INSERT INTO `callbacks` (`id`, `phone`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '87072940015', 'Нурсултан', 0, '2018-01-21 18:15:37', '2018-01-21 18:00:51', '2018-01-21 18:15:37'),
(2, '87072940015', 'Нурсултан', 0, '2018-01-21 18:15:57', '2018-01-21 18:15:45', '2018-01-21 18:15:57'),
(3, '87072940015', 'Нурсултан', 0, '2018-01-21 18:16:23', '2018-01-21 18:15:45', '2018-01-21 18:16:23'),
(4, '87072940015', 'Нурсултан', 0, NULL, '2018-01-21 18:16:30', '2018-01-21 18:16:30'),
(5, '87756512595', 'Майра', 0, NULL, '2018-01-26 06:57:17', '2018-01-26 06:57:17');

-- --------------------------------------------------------

--
-- Структура таблицы `carousels`
--

CREATE TABLE `carousels` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sorting` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `carousels`
--

INSERT INTO `carousels` (`id`, `title`, `link`, `image`, `sorting`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ewfwe', 'refe', 'a6UdP2018-01-15.png', 2, 1, '2018-01-15 17:16:43', '2018-01-15 17:10:42', '2018-01-15 17:16:43'),
(2, 'ewfwe', 'refe', 'H7fBD2018-01-15.png', 2, 1, '2018-01-15 17:16:45', '2018-01-15 17:11:00', '2018-01-15 17:16:45'),
(3, 'update', 'update', 'x5TCd2018-01-15.png', 12, 0, '2018-01-15 17:25:43', '2018-01-15 17:17:57', '2018-01-15 17:25:43'),
(4, 'Лучшие цены на сантехнику', '/products', 'OePZk2018-01-16-03-01-31.png', 1, 1, NULL, '2018-01-15 21:13:31', '2018-01-16 21:50:11'),
(5, 'Лучшие цена на ламинат', '/laminats', 'Lnskr2018-01-17-03-01-23.png', 2, 1, NULL, '2018-01-16 21:51:23', '2018-01-16 21:51:23');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_main` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `image_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sorting` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent_id`, `link`, `is_main`, `image_1`, `image_2`, `status`, `sorting`, `deleted_at`, `created_at`, `updated_at`) VALUES
(15, 'Двери', NULL, '/dveri', '1', 'PUBP42018-01-17-04-01-34.svg', 'wFLCo2018-01-17-04-01-34.svg', 1, 1, NULL, '2018-01-16 22:20:34', '2018-01-16 22:20:34'),
(16, 'Ламинат', NULL, '/laminat', '1', '8IaSM2018-01-17-04-01-02.svg', '6Wvhd2018-01-17-04-01-02.svg', 1, 2, NULL, '2018-01-16 22:21:02', '2018-01-16 22:21:02'),
(17, 'Лакокрасочные материалы', NULL, '/lakokrasochnye-materialy', '1', 'zXdCx2018-01-17-04-01-36.svg', 'sXpwO2018-01-17-04-01-36.svg', 1, 3, NULL, '2018-01-16 22:21:36', '2018-01-16 22:21:36'),
(18, 'Обои', NULL, '/oboi', '1', 'NWQlY2018-01-17-04-01-55.svg', 'WlWar2018-01-17-04-01-55.svg', 1, 4, NULL, '2018-01-16 22:22:55', '2018-01-16 22:22:55'),
(19, 'Дверная фурнитура', NULL, '/dvernaya-furnitura', '1', 'zOaD02018-01-17-04-01-40.svg', 'ZgWnL2018-01-17-04-01-40.svg', 1, 5, NULL, '2018-01-16 22:23:24', '2018-01-18 13:24:35'),
(20, 'Пластиковые изделия', NULL, '/plastikovye-izdeliya', '1', 'YJxo52018-01-17-04-01-07.svg', 'JfUm82018-01-17-04-01-07.svg', 1, 6, NULL, '2018-01-16 22:24:07', '2018-01-16 22:24:07'),
(21, 'Россия', 19, '/dvernaya-furnitura/rossiya', '0', NULL, NULL, 1, 1, NULL, '2018-01-16 22:24:40', '2018-01-16 22:24:40'),
(22, 'Южная Корея', 19, '/dvernaya-furnitura/yudgnaya-koreya', '0', NULL, NULL, 1, 2, NULL, '2018-01-16 22:25:11', '2018-01-18 13:32:52'),
(23, 'Италия', 19, '/dvernaya-furnitura/italiya', '0', NULL, NULL, 1, 3, NULL, '2018-01-16 22:25:25', '2018-01-18 13:32:42'),
(24, 'Бумажные обои', 18, '/oboi/bumadgnye-oboi', '0', NULL, NULL, 1, 1, NULL, '2018-01-17 00:57:28', '2018-01-17 00:57:28'),
(25, 'Обои виниловые на бумаге', 18, '/oboi/oboi-vinilovye-na-bumage', '0', NULL, NULL, 1, 2, NULL, '2018-01-17 00:57:55', '2018-01-17 00:57:55'),
(26, 'Российские', 15, '/dveri/rossiyskie', '0', NULL, NULL, 1, 1, NULL, '2018-01-18 13:27:31', '2018-01-18 13:27:31'),
(27, 'Межкомнатные', 15, '/dveri/medgkomnatnye', '0', NULL, NULL, 1, 2, NULL, '2018-01-18 13:28:18', '2018-01-18 13:28:18'),
(28, 'Белорусские двери', 15, '/dveri/belorusskie-dveri', '0', NULL, NULL, 1, 3, NULL, '2018-01-18 16:40:13', '2018-01-18 16:40:13'),
(29, 'Kronospan', 16, '/laminat/Kronospan', '0', NULL, NULL, 1, 1, NULL, '2018-01-18 16:46:10', '2018-01-18 16:46:10'),
(30, 'Фотообои', 18, '/oboi/fotooboi', '0', NULL, NULL, 1, 2, NULL, '2018-01-18 16:54:50', '2018-01-18 16:54:50'),
(31, 'Краски акриловые', 17, '/lakokrasochnye-materialy/kraski-akrilovye', '0', NULL, NULL, 1, 1, NULL, '2018-01-18 17:02:36', '2018-01-18 17:02:36'),
(32, 'Аксессуары силиконовые', 20, '/plastikovye-izdeliya/aksessuary-silikonovye', '0', NULL, NULL, 1, 1, NULL, '2018-01-18 17:07:54', '2018-01-18 17:07:54');

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sorting` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `status`, `sorting`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Спасибо Вам большое!!! Операторы в интернет магазине очень добрые, вежливые! Привезли быстро, бесплатно и на этаж тоже бесплатно подняли! Все ответственные, доброжелательные и грузчики и водители.', '19x1L2018-01-17-02-01-19.png', 1, 1, NULL, '2018-01-16 20:54:19', '2018-01-16 21:00:21'),
(2, 'qwdqwd', 'wPf1j2018-01-17-03-01-20.png', 1, 1, '2018-01-16 21:02:34', '2018-01-16 21:02:12', '2018-01-16 21:02:34');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `image`, `product_id`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(42, 'hwiSR2018-01-16-03-01-47.png', 17, 1, '2018-01-15 21:12:07', NULL, '2018-01-15 21:12:07'),
(43, 'Mv7tP2018-01-16-03-01-47.png', 17, 0, '2018-01-15 21:12:07', NULL, '2018-01-15 21:12:07'),
(44, 'tTFK92018-01-16-03-01-47.png', 17, 0, '2018-01-15 21:12:07', NULL, '2018-01-15 21:12:07'),
(45, 'wEw1U2018-01-16-03-01-47.png', 17, 0, '2018-01-15 21:12:07', NULL, '2018-01-15 21:12:07'),
(46, 'CAC4S2018-01-16-03-01-47.png', 17, 0, '2018-01-15 21:12:07', NULL, '2018-01-15 21:12:07'),
(47, 'KESGZ2018-01-16-03-01-08.png', 18, 1, '2018-01-16 22:19:45', NULL, '2018-01-16 22:19:45'),
(48, 'wix4k2018-01-16-03-01-08.png', 18, 0, '2018-01-16 22:19:45', NULL, '2018-01-16 22:19:45'),
(49, 'w1gli2018-01-16-03-01-08.png', 18, 0, '2018-01-16 22:19:45', NULL, '2018-01-16 22:19:45'),
(50, 'UYqyI2018-01-16-03-01-08.png', 18, 0, '2018-01-16 22:19:45', NULL, '2018-01-16 22:19:45'),
(51, 'U4pxY2018-01-16-03-01-08.png', 18, 0, '2018-01-16 22:19:45', NULL, '2018-01-16 22:19:45'),
(52, 'A9k2f2018-01-17-04-01-25.png', 19, 1, '2018-01-18 16:39:23', NULL, '2018-01-18 16:39:23'),
(53, 'afSdm2018-01-17-04-01-25.png', 19, 0, '2018-01-18 16:39:23', NULL, '2018-01-18 16:39:23'),
(54, 'xIjW72018-01-17-04-01-25.png', 19, 0, '2018-01-18 16:39:23', NULL, '2018-01-18 16:39:23'),
(55, 'F50W62018-01-17-04-01-25.png', 19, 0, '2018-01-18 16:39:23', NULL, '2018-01-18 16:39:23'),
(56, 'RLK672018-01-17-04-01-25.png', 19, 0, '2018-01-18 16:39:23', NULL, '2018-01-18 16:39:23'),
(57, 'oVpsE2018-01-17-04-01-12.jpg', 20, 1, '2018-01-18 16:39:25', NULL, '2018-01-18 16:39:25'),
(58, '7V2XE2018-01-17-04-01-13.jpg', 20, 0, '2018-01-18 16:39:25', NULL, '2018-01-18 16:39:25'),
(59, 'JWWST2018-01-17-07-01-42.jpg', 21, 1, '2018-01-18 13:25:38', NULL, '2018-01-18 13:25:38'),
(60, 'rVZVk2018-01-17-07-01-42.jpg', 21, 0, '2018-01-18 13:25:38', NULL, '2018-01-18 13:25:38'),
(61, 'XixUb2018-01-18-19-01-48.jpg', 22, 1, NULL, NULL, NULL),
(62, 'E98cS2018-01-18-19-01-48.jpg', 22, 0, NULL, NULL, NULL),
(63, 'sqq1A2018-01-18-19-01-48.jpg', 22, 0, NULL, NULL, NULL),
(64, 'yS6zH2018-01-18-19-01-58.png', 23, 1, NULL, NULL, NULL),
(65, 'P8t3x2018-01-18-19-01-58.png', 23, 0, NULL, NULL, NULL),
(66, 'PztFT2018-01-18-19-01-58.JPG', 23, 0, NULL, NULL, NULL),
(67, '1oBXI2018-01-18-19-01-58.png', 23, 0, NULL, NULL, NULL),
(68, '1zZRF2018-01-18-19-01-45.png', 24, 1, NULL, NULL, NULL),
(69, 'rN00R2018-01-18-19-01-45.png', 24, 0, NULL, NULL, NULL),
(70, 'tuaWh2018-01-18-19-01-45.JPG', 24, 0, NULL, NULL, NULL),
(71, '98pQD2018-01-18-19-01-45.png', 24, 0, NULL, NULL, NULL),
(72, '8oZCA2018-01-18-19-01-56.jpg', 25, 1, NULL, NULL, NULL),
(73, '6F9oW2018-01-18-19-01-56.jpg', 25, 0, NULL, NULL, NULL),
(74, 'V51tv2018-01-18-19-01-56.JPG', 25, 0, NULL, NULL, NULL),
(75, 'nRqPM2018-01-18-19-01-12.jpg', 26, 1, NULL, NULL, NULL),
(76, 'LiCNl2018-01-18-19-01-12.jpg', 26, 0, NULL, NULL, NULL),
(77, 'rLVNI2018-01-18-19-01-12.JPG', 26, 0, NULL, NULL, NULL),
(78, 'Qrwke2018-01-18-19-01-58.jpg', 27, 1, NULL, NULL, NULL),
(79, '1lrhT2018-01-18-19-01-58.jpg', 27, 0, NULL, NULL, NULL),
(80, 'AnEfM2018-01-18-19-01-58.jpg', 27, 0, NULL, NULL, NULL),
(81, 'RoNZZ2018-01-18-19-01-58.jpg', 27, 0, NULL, NULL, NULL),
(82, 'mWXel2018-01-18-19-01-58.jpg', 27, 0, NULL, NULL, NULL),
(83, '93CWv2018-01-18-19-01-16.jpg', 28, 1, NULL, NULL, NULL),
(84, 'ED68y2018-01-18-19-01-16.png', 28, 0, NULL, NULL, NULL),
(85, 'kZfeA2018-01-18-19-01-16.jpg', 28, 0, NULL, NULL, NULL),
(86, 'w5JJg2018-01-18-19-01-16.jpg', 28, 0, NULL, NULL, NULL),
(87, 'J7Lji2018-01-18-19-01-13.jpg', 29, 1, NULL, NULL, NULL),
(88, 'SxQsd2018-01-18-19-01-13.jpg', 29, 0, NULL, NULL, NULL),
(89, 'fYHjr2018-01-18-19-01-13.jpg', 29, 0, NULL, NULL, NULL),
(90, 'aankh2018-01-18-19-01-13.jpg', 29, 0, NULL, NULL, NULL),
(91, 'ICydH2018-01-18-19-01-13.jpg', 29, 0, NULL, NULL, NULL),
(92, '6ADxJ2018-01-18-19-01-35.jpg', 30, 1, NULL, NULL, NULL),
(93, 'KkMUH2018-01-18-19-01-35.jpg', 30, 0, NULL, NULL, NULL),
(94, 'ZeMmv2018-01-18-19-01-35.png', 30, 0, NULL, NULL, NULL),
(95, 'jqf022018-01-18-19-01-35.jpg', 30, 0, NULL, NULL, NULL),
(96, 'Y5e2E2018-01-18-19-01-46.jpg', 31, 1, NULL, NULL, NULL),
(97, 'Ajdpo2018-01-18-19-01-46.jpg', 31, 0, NULL, NULL, NULL),
(98, 'Cwt4O2018-01-18-19-01-46.jpg', 31, 0, NULL, NULL, NULL),
(99, 'Hu7ZU2018-01-18-19-01-46.jpg', 31, 0, NULL, NULL, NULL),
(100, 'YL9z52018-01-18-19-01-37.jpg', 32, 1, NULL, NULL, NULL),
(101, '9VMFq2018-01-18-19-01-37.jpg', 32, 0, NULL, NULL, NULL),
(102, 'tZZDN2018-01-18-19-01-37.jpg', 32, 0, NULL, NULL, NULL),
(103, 'sCENn2018-01-18-19-01-37.jpg', 32, 0, NULL, NULL, NULL),
(104, 'pytsC2018-01-18-19-01-37.jpg', 32, 0, NULL, NULL, NULL),
(105, 'Ly1iJ2018-01-18-19-01-03.jpg', 33, 1, NULL, NULL, NULL),
(106, '81S4q2018-01-18-19-01-03.jpg', 33, 0, NULL, NULL, NULL),
(107, 'm3utQ2018-01-18-19-01-03.jpg', 33, 0, NULL, NULL, NULL),
(108, 'Vho312018-01-18-19-01-03.jpg', 33, 0, NULL, NULL, NULL),
(109, 'BbJg22018-01-18-19-01-03.jpg', 33, 0, NULL, NULL, NULL),
(110, 'axgso2018-01-18-19-01-16.jpg', 34, 1, NULL, NULL, NULL),
(111, 'njtRl2018-01-18-19-01-16.jpg', 34, 0, NULL, NULL, NULL),
(112, 'C3Ekp2018-01-18-19-01-16.jpg', 34, 0, NULL, NULL, NULL),
(113, 'n3X6D2018-01-18-19-01-16.jpg', 34, 0, NULL, NULL, NULL),
(114, '6ucoX2018-01-18-20-01-40.jpg', 35, 1, NULL, NULL, NULL),
(115, '7oTDu2018-01-18-20-01-40.jpg', 35, 0, NULL, NULL, NULL),
(116, 'Fe3vB2018-01-18-20-01-40.jpg', 35, 0, NULL, NULL, NULL),
(117, 'dqVfA2018-01-18-20-01-40.jpg', 35, 0, NULL, NULL, NULL),
(118, 'AKa222018-01-18-22-01-21.jpg', 36, 1, NULL, NULL, NULL),
(119, 'sxZTq2018-01-18-22-01-21.jpg', 36, 0, NULL, NULL, NULL),
(120, '9zVjz2018-01-18-22-01-58.jpg', 37, 1, NULL, NULL, NULL),
(121, 'd04Zc2018-01-18-22-01-58.jpg', 37, 0, NULL, NULL, NULL),
(122, 'Dx4332018-01-18-22-01-58.jpeg', 37, 0, NULL, NULL, NULL),
(123, 'ysG5l2018-01-18-22-01-11.jpg', 38, 1, NULL, NULL, NULL),
(124, '6Hqd72018-01-18-22-01-11.jpg', 38, 0, NULL, NULL, NULL),
(125, 'I1d7f2018-01-18-22-01-11.jpeg', 38, 0, NULL, NULL, NULL),
(126, 'tR1CC2018-01-18-22-01-11.jpeg', 38, 0, NULL, NULL, NULL),
(127, 'WPkic2018-01-18-22-01-29.jpg', 39, 1, NULL, NULL, NULL),
(128, 'TTkuo2018-01-18-22-01-29.jpg', 39, 0, NULL, NULL, NULL),
(129, 'xob1i2018-01-18-22-01-29.jpg', 39, 0, NULL, NULL, NULL),
(130, 'Wf6XW2018-01-18-22-01-29.jpg', 39, 0, NULL, NULL, NULL),
(131, 'ma47s2018-01-18-22-01-24.jpg', 40, 1, NULL, NULL, NULL),
(132, '0v9gN2018-01-18-22-01-24.jpg', 40, 0, NULL, NULL, NULL),
(133, '4lhRT2018-01-18-22-01-22.jpg', 41, 1, NULL, NULL, NULL),
(134, 'vFtOe2018-01-18-22-01-22.jpg', 41, 0, NULL, NULL, NULL),
(135, 'SpxNW2018-01-18-22-01-57.jpg', 42, 1, NULL, NULL, NULL),
(136, 'RnRCq2018-01-18-22-01-57.jpg', 42, 0, NULL, NULL, NULL),
(137, 'CVqMH2018-01-18-22-01-50.jpg', 43, 1, NULL, NULL, NULL),
(138, 'iCg0t2018-01-18-22-01-50.jpg', 43, 0, NULL, NULL, NULL),
(139, 'hOXLY2018-01-18-22-01-51.jpg', 43, 0, NULL, NULL, NULL),
(140, 'UMtL52018-01-18-22-01-49.jpg', 44, 1, NULL, NULL, NULL),
(141, 'CCGBv2018-01-18-22-01-49.jpg', 44, 0, NULL, NULL, NULL),
(142, 'CVaJU2018-01-18-23-01-52.jpg', 45, 1, NULL, NULL, NULL),
(143, 'R45mQ2018-01-18-23-01-53.jpg', 45, 0, NULL, NULL, NULL),
(144, 'C9h3I2018-01-18-23-01-39.jpg', 46, 1, NULL, NULL, NULL),
(145, 'kFJJd2018-01-18-23-01-39.jpg', 46, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_01_15_222255_create_carousels_table', 2),
(6, '2018_01_15_232626_create_categories_table', 3),
(7, '2018_01_16_004434_create_products_table', 4),
(8, '2018_01_16_005144_create_images_table', 5),
(10, '2018_01_17_024046_create_gallleries_table', 6),
(12, '2018_01_17_030402_create_pages_table', 7),
(14, '2018_01_21_143433_create_orders_table', 8),
(15, '2018_01_21_144817_create_order_products_table', 9),
(17, '2018_01_21_235324_create_callbacks_table', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(21, 1, 0, '2018-01-21 10:26:23', '2018-01-21 10:26:06', '2018-01-21 10:26:23'),
(22, 1, 0, NULL, '2018-01-21 18:21:07', '2018-01-21 18:21:07'),
(23, 2, 0, NULL, '2018-01-22 05:52:10', '2018-01-22 05:52:10'),
(24, 2, 0, NULL, '2018-01-23 11:20:14', '2018-01-23 11:20:14'),
(25, 2, 0, NULL, '2018-01-29 04:18:03', '2018-01-29 04:18:03');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `count`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 21, 42, 1, '2018-01-21 10:26:23', '2018-01-21 10:26:06', '2018-01-21 10:26:23'),
(20, 21, 43, 1, '2018-01-21 10:26:23', '2018-01-21 10:26:06', '2018-01-21 10:26:23'),
(21, 22, 42, 1, NULL, '2018-01-21 18:21:07', '2018-01-21 18:21:07'),
(22, 23, 42, 1, NULL, '2018-01-22 05:52:10', '2018-01-22 05:52:10'),
(23, 24, 43, 1, NULL, '2018-01-23 11:20:14', '2018-01-23 11:20:14'),
(24, 25, 37, 1, NULL, '2018-01-29 04:18:03', '2018-01-29 04:18:03');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sorting` int(11) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `desc`, `link`, `status`, `sorting`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'О нас', '<div class=\"contents\">\r\n<div class=\"container\">\r\n<div class=\"contents_item\">\r\n<h1>О НАС</h1>\r\n<div class=\"contents_text\">\r\n<p>В историческом ракурсе, длительность нашей деятельности несравнимо короче существования нашей Планеты или Государства Российского. Первый магазин строительных материалов мы открыли в 1995 году, на месте заброшенных помещений военно-строительного отряда. Его площадь была 72м2 , и 80% продаж составляла реализация цемента. Движение, без малого, сотни наименований товара учитывали в рукописных карточках. Дальнейшее наше развитие &ndash; история становления предпринимательства и малого бизнеса в России с его взлетами и падениями, победами и поражениями.</p>\r\n<p>На сегодняшний день общая площадь торгово-складских комплексов наших предприятий 55000м2, в том числе торгово-выставочные площади около 5000м2. Ассортимент складских позиций превышает 65000 наименований товаров для выполнения строительно-ремонтных работ. Над созданием и обеспечением бесперебойной работы наших комплексов непрерывно трудится сплоченная команда единомышленников, более двухсот сотрудников. За годы работы сформировались семейные династии.</p>\r\n</div>\r\n<div class=\"contents_block\">\r\n<h1>ПОЧЕМУ ВЫБИРАЮТ НАС</h1>\r\n<div class=\"list_contents\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<p class=\"contents_block_title\">Ассортимент</p>\r\n</div>\r\n<div class=\"col-lg-2\" align=\"center\"><img src=\"/web/images/Path127.png\" alt=\"\" /></div>\r\n<div class=\"col-lg-10\">\r\n<p class=\"contents_block_text\">Огромное количество наименований строительных материалов от производителей по доступным ценам, которые пополняются новыми товарами.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"list_contents\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<p class=\"contents_block_title\">Внимательность</p>\r\n</div>\r\n<div class=\"col-lg-2\" align=\"center\"><img src=\"/web/images/Path127.png\" alt=\"\" /></div>\r\n<div class=\"col-lg-10\">\r\n<p class=\"contents_block_text\">Мы всегда прислушиваемся к нашим покупателям. Будьте уверены, что с нами вы подберете для себя самый подходящий вариант покупки по выгодной цене.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"list_contents\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<p class=\"contents_block_title\">Удобство</p>\r\n</div>\r\n<div class=\"col-lg-2\" align=\"center\"><img src=\"/web/images/Path127.png\" alt=\"\" /></div>\r\n<div class=\"col-lg-10\">\r\n<p class=\"contents_block_text\">Заказать стройматериалы в нашем интернет-магазине очень просто: достаточно оформить заявку на нашем сайте или же попросту набрать наш номер по телефону.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"list_contents\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<p class=\"contents_block_title\">Качество</p>\r\n</div>\r\n<div class=\"col-lg-2\" align=\"center\"><img src=\"/web/images/Path127.png\" alt=\"\" /></div>\r\n<div class=\"col-lg-10\">\r\n<p class=\"contents_block_text\">Нашему магазину важно, чтобы наши покупатели всегда оставались довольны, поэтому мы тщательно следим за тем, чтобы стройматериалы соответствовали требуемым качествам и нормам.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"list_contents\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<p class=\"contents_block_title\">Доступность</p>\r\n</div>\r\n<div class=\"col-lg-2\" align=\"center\"><img src=\"/web/images/Path127.png\" alt=\"\" /></div>\r\n<div class=\"col-lg-10\">\r\n<p class=\"contents_block_text\">Мы работаем как с физическими, так и с юридическими лицами.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"list_contents\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<p class=\"contents_block_title\">Честность и открытость</p>\r\n</div>\r\n<div class=\"col-lg-2\" align=\"center\"><img src=\"/web/images/Path127.png\" alt=\"\" /></div>\r\n<div class=\"col-lg-10\">\r\n<p class=\"contents_block_text\">Мы ценим наших покупателей, поэтому всегда стремимся вести честный и открытый диалог с ними. Мы заинтересованы в плодотворном и долгом сотрудничестве с нашими покупателями, поэтому делаем все, чтобы оно было выгодным и приятным обеим сторонам.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"contents_commands\">\r\n<h1>НАША КОМАНДА</h1>\r\n<div class=\"row\">\r\n<div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">\r\n<div class=\"commands_img\"><img src=\"/web/images/myAvatar.png\" alt=\"\" /></div>\r\n<p class=\"commands_name\">Имя Фамилия</p>\r\n<p class=\"commands_position\">Должность</p>\r\n<p class=\"commands_information\">Если Вам необходимо обеспечить бесперебойное, качественное снабжение строительства или ремонта &ndash; обращайтесь, мы всегда рады сотрудничеству!</p>\r\n</div>\r\n<div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">\r\n<div class=\"commands_img\"><img src=\"/web/images/myAvatar.png\" alt=\"\" /></div>\r\n<p class=\"commands_name\">Имя Фамилия</p>\r\n<p class=\"commands_position\">Должность</p>\r\n<p class=\"commands_information\">Если Вам необходимо обеспечить бесперебойное, качественное снабжение строительства или ремонта &ndash; обращайтесь, мы всегда рады сотрудничеству!</p>\r\n</div>\r\n<div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">\r\n<div class=\"commands_img\"><img src=\"/web/images/myAvatar.png\" alt=\"\" /></div>\r\n<p class=\"commands_name\">Имя Фамилия</p>\r\n<p class=\"commands_position\">Должность</p>\r\n<p class=\"commands_information\">Если Вам необходимо обеспечить бесперебойное, качественное снабжение строительства или ремонта &ndash; обращайтесь, мы всегда рады сотрудничеству!</p>\r\n</div>\r\n<div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">\r\n<div class=\"commands_img\"><img src=\"/web/images/myAvatar.png\" alt=\"\" /></div>\r\n<p class=\"commands_name\">Имя Фамилия</p>\r\n<p class=\"commands_position\">Должность</p>\r\n<p class=\"commands_information\">Если Вам необходимо обеспечить бесперебойное, качественное снабжение строительства или ремонта &ndash; обращайтесь, мы всегда рады сотрудничеству!</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"content_partners\">\r\n<h1>ПАРТНЕРЫ</h1>\r\n<div class=\"row\">\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n<div class=\"col-lg-3 col-md-4 col-sm-6 col-xs-12\">\r\n<div class=\"partners_img\"><img src=\"/web/images/Rectangle100.png\" alt=\"\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'o-nas', 1, 1, NULL, '2018-01-16 21:31:35', '2018-01-17 01:23:09'),
(3, 'Доставка', '<div class=\"contents\">\r\n<div class=\"container\">\r\n<div class=\"shipping\">\r\n<h1>Доставка и оплата</h1>\r\n<p>Точную стоимость доставки и все условия можно узнать у оператора нашего Call-центра по телефону</p>\r\n<p>По городу &mdash; c 10:00 до 17:00 В пригород &mdash; c 10:00 до 17:00.</p>\r\n<p>Доставка осуществляется до подъезда дома/офиса. Транспортировка и подъем товара на этаж не входят в стоимость доставки. Если Вам необходимо осуществить доставку купленных товаров непосредственно в квартиру/офис, Вы можете воспользоваться услугой Подъем на этаж.</p>\r\n<p>Оплата товара производится до его подъема на этаж. Просим Вас осуществить приемку товара по внешнему виду, комплектности, отсутствию механических повреждений непосредственно в момент доставки. После приемки товара претензии покупателя, касающиеся комплектности и механических повреждений товара, - не принимаются.</p>\r\n<p>Транспортировка товара по квартире, проверка, настройка и установка товаров - службой доставки не осуществляются.</p>\r\n<p>Время, проведенное службой доставки по одному адресу, строго регламентировано и составляет 1 час, поэтому просим Вас не опаздывать и не задерживать разгрузку. Не осуществление приёма товара покупателем в течение 1 часа после приезда курьера по указанному адресу, считается отказом от заказа.</p>\r\n<p>В случае невозможности принять товар в оговоренные сроки доставки (день и интервал времени), просим Вас проинформировать оператора за сутки. Если доставка срывается по Вашей вине (покупателя или его представителей не оказалось по адресу доставки в оговоренный интервал времени, либо был назван неверный адрес), заказ будет отменен.</p>\r\n</div>\r\n</div>\r\n</div>', 'dostavka', 1, 1, NULL, '2018-01-17 01:25:40', '2018-01-17 01:25:40'),
(4, 'Контакты', '<div class=\"contents\">\r\n<div class=\"container\">\r\n<div class=\"content_contacts\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-12\">\r\n<h1>Телефон:</h1>\r\n<p>+7 (707) 777 77 77</p>\r\n<p>+7 (707) 777 77 77</p>\r\n</div>\r\n<div class=\"col-lg-12\">\r\n<h1>Email:</h1>\r\n<p>mail111@mail.com</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"col-lg-6\">\r\n<h1>Адреса пунктов</h1>\r\n<p>г. Шымкент ,ул.Рыскулова 4</p>\r\n</div>\r\n<div class=\"col-lg-12\">\r\n<div class=\"content_map\">\r\n<h1>Адреса пунктов</h1>\r\n<div class=\"map\"><script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa168699a87cb8b84f79fb4b539ad549f7a81dbff35e660033ad41b9166d54960&amp;width=100%&amp;height=457&amp;lang=ru_RU&amp;scroll=true\"></script></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'kontakty', 1, 1, NULL, '2018-01-17 01:26:55', '2018-01-17 01:26:55');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sh_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_new` tinyint(1) NOT NULL DEFAULT '0',
  `is_main_catalog` tinyint(1) NOT NULL DEFAULT '0',
  `sorting` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `link`, `sh_desc`, `desc`, `price`, `is_sale`, `is_new`, `is_main_catalog`, `sorting`, `category_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(19, 'Смеситель для раковины', 'smesitel-dlya-rakoviny-81', 'Горизонтальный Управление смесителем однорычажный латунь, монолитный', 'Ванна чугунная Aqualux Zya 9-2 150х75 см без ручек и ножек является оптимальным вариантом благодаря высокой надежности и низкой цене. Изготовлена из высококачественного чугуна, покрытого двухслойной эмалью, отличающейся отличным внешним видом и неприхотливостью, а также долговечностью.', '15000', 0, 0, 1, 1, 21, 1, '2018-01-18 16:39:23', '2018-01-16 22:27:25', '2018-01-18 16:39:23'),
(20, 'Cмеситель Decoroom 68 DR68011', 'Cmesitel-Decoroom-68-DR68011-59', 'Смеситель Decoroom 68 DR68011 для раковины, хром – это продукция европейского уровня, проверенная временем.', 'Смеситель Decoroom 68 DR68011 для раковины, хром – это продукция европейского уровня, проверенная временем. Изготовлена в современном дизайне, из высококачественных износостойких материалов, она будет служить Вам длительный срок и обеспечивать удобство в использовании. Смеситель Decoroom 68 DR68011 для раковины, хром создан для тех, кто ценит надёжность, практичность, красоту и уют.\r\nПродукция от этого производителя изготавливается с использованием современных высокотехнологичных приёмов, из долговечных материалов. Это обеспечивает продуманность каждого элемента, его безупречное качество, практичность и надёжность в использовании. Как и все другие предложения из этой коллекции, Смеситель Decoroom 68 DR68011 для раковины, хром будет отличным дополнением интерьера Вашей ванной комнаты и придаст её стилю эстетичности и изысканности.', '4791', 1, 1, 0, 2, 21, 1, '2018-01-18 16:39:25', '2018-01-16 22:39:12', '2018-01-18 16:39:25'),
(21, 'Обои гомель (0114044-51) лилия акрил на бумажной основе (0,53*10,05) (8)', 'oboi-gomel-0114044-51-liliya-akril-na-bumadgnoy-osnove-053*1005-8-28', 'Обои \"Гомель\" выполнены из бумаги, покрытой акриловой пенокраской с эффектом под \"замшу\" с блестками.', 'Обои \"Гомель\" выполнены из бумаги, покрытой акриловой пенокраской с эффектом под \"замшу\" с блестками. Они сочетают в себе удивительные богатые декоры и интересные фактуры, подчеркнутые воздушным слоем акрила. Рельефный рисунок на поверхности имеет вид мазков толстой кистью или отдельных выпуклых точек. Этот эффект достигается путем нанесения на печатный рисунок бумажной основы акриловых полимеров, которые подвергаются вспениванию при высокой температуре. Обои хорошо смотрятся практически в любых помещениях, особенно в парадных комнатах: гостиных, столовых, спальнях, холлах и прихожих.', '1 130', 0, 0, 0, 1, 25, 1, '2018-01-18 13:25:38', '2018-01-17 01:02:42', '2018-01-18 13:25:38'),
(22, 'Входная дверь «Афина»', 'vkhodnaya-dver-afina', 'Оптимальное сочетание цены и потребительских качеств. Идеальный вариант для Вашей квартиры.', 'Оптимальное сочетание цены и потребительских качеств. Идеальный вариант для Вашей квартиры. Дверь комплектуется надёжными замками GUARDIAN (лидер по производству замков в России), а так же МДФ панелью толщиной в 16 мм, что обеспечивает высокие тепло и шумо – изоляционные свойства дверного полотна. Полная комплектация броненакладка и ночная задвижка, обеспечат удобство во время всего срока службы.', '110 000', 0, 0, 0, 2, 26, 1, NULL, '2018-01-18 13:29:48', '2018-01-18 13:30:26'),
(23, 'Входная дверь «Дон,Печора + для дома»', 'vkhodnaya-dver-donpechora--dlya-doma', 'Входная Российская дверь Печора + (Дон) за счёт своих размеров идеально подходит как к нашим панельным домам, так и новостройкам.', 'Входная Российская дверь Печора + (Дон) за счёт своих размеров идеально подходит как к нашим панельным домам, так и новостройкам. Усиленная конструкция и толщина металла в 1,5 мм обеспечат Вам долговечность и надёжность в использовании на весь срок эксплуатации. Замок 4 класса защитит от постороннего проникновения. Модель выполненная не  в стандартной комплектации строго выглядит с наружи. Внутри облагороженная влагостойкой мдф панелью толщиной 16 мм подходит почти к любому интерьеру.  Модель Печора занимает лидирующее место по продажам дверей в Новосибирске.', '135 000', 0, 0, 0, 3, 26, 1, NULL, '2018-01-18 13:35:58', '2018-01-18 13:35:58'),
(24, 'Входная дверь Алмаз 14 Капучино', 'vkhodnaya-dver-almaz-14-kapuchino', 'Монтажный кодовый ротор и 1 ключ для проверки работоспособности замка при установке в дверь', 'Защита от наиболее распространенных методов вскрытия:Защита от вскрытия отмычкой – ложные пазы на дисках кодового ротора и сувальдах, увеличенная жесткость пружин сувальд — Защита от «свертыша» – ослабленный зуб рейки хвостовика; Защита от взлома – усиленная конструкция засова.Защита от высверливания – внутренняя бронепластина;', '140 000', 0, 0, 0, 4, 26, 1, NULL, '2018-01-18 13:37:45', '2018-01-18 13:37:45'),
(25, 'Входная дверь Алмаз 14 Палисандр', 'vkhodnaya-dver-almaz-14-palisandr', 'Монтажный кодовый ротор и 1 ключ для проверки работоспособности замка при установке в дверь;', 'В комплекте:Монтажный кодовый ротор и 1 ключ для проверки работоспособности замка при установке в дверь; Основной, рабочий кодовый ротор и 5 ключей в индивидуальной упаковке защита от копирования основного ключа до и во время установки двери.', '140 000', 0, 0, 0, 3, 26, 1, NULL, '2018-01-18 13:38:56', '2018-01-18 13:38:56'),
(26, 'Входная дверь Алмаз Циркон 4 контура уплотнения', 'vkhodnaya-dver-almaz-tsirkon-4-kontura-uplotneniya', 'Цилиндр ключ-вертушка, ночная задвижка, утопленная броненакпадка, фурнитура хром.', 'Четыре контура уплотнения.\r\nУплотнитель: на полотне и на коробе по всему периметру, покрытие Шелк.Декоративная МДФ панель: 18 мм с филенчатым рисунком.', '147 000', 0, 0, 0, 4, 26, 1, NULL, '2018-01-18 13:40:12', '2018-01-18 13:40:12'),
(27, 'Входная дверь Аргус Тепло с терморазрывом', 'vkhodnaya-dver-argus-teplo-s-termorazryvom', 'Порошково-полимерное покрытие «Молотковая коричневая» с предварительным фосфатированием металла.', 'Жесткая профильная открытая коробка t=126 мм, гнутая кромка. Полотно увеличенной толщины t=85 мм усилено ребрами жесткости и дополнительным листом металла в зоне замка. Три специальных трубчатых уплотнителя из пористой резины по всему периметру полотна и коробки. Материал уплотнителя устойчив к воздействию низких температур (до -60°С).', '162 000', 0, 0, 0, 0, 26, 1, NULL, '2018-01-18 13:41:58', '2018-01-18 13:41:58'),
(28, 'Входная дверь Брест 2114 три контура уплотнения', 'vkhodnaya-dver-brest-2114-tri-kontura-uplotneniya', 'Двери с тремя контурами уплотнения - максимальная тепло-, и звуко- изоляция.', 'Двери с тремя контурами уплотнения - максимальная тепло-, и звуко- изоляция. Трехконтурное дверное полотно обладает меньшей теплопроводностью, а значит лучше сохраняет  тепло вашего дома в долгие зимние вечера и улучшает звукоизоляционные характеристики. Усиленый замок Гардиан 2114 с перекодировкий, самый усиленый и взломостойкий в линейке Российских замков.', '135 000', 0, 0, 0, 3, 26, 1, NULL, '2018-01-18 13:43:16', '2018-01-18 13:43:16'),
(29, 'Входная дверь Гарда Муар 7,5см', 'vkhodnaya-dver-garda-muar-75sm', 'Покрытие снаружи - Полимерное (Черный Муар) Толщина металла - 1.5 мм Толщина полотна - 75 мм.', 'Толщина металла - 1.5 мм.Толщина полотна - 75 мм.Толщина короба - 105 мм.МДФ 10 мм, цвет тобако, дуб сонома Уплотнение - 2 Контура.Утеплитель - Минеральная ватаТипоразмеры 860*2050, 960*2050', '72 000', 0, 0, 0, 3, 26, 1, NULL, '2018-01-18 13:45:13', '2018-01-18 13:45:13'),
(30, 'Входная дверь Super Omega 8', 'vkhodnaya-dver-Super-Omega-8', 'Два листа стали, два замка высшего класса взломостойкости, запатентованная система «Зацеп», полотно', 'Два листа стали, два замка высшего класса взломостойкости, запатентованная система «Зацеп», полотно, усиленное специальным гибом жесткости, противосъемные ригели. Результат - повышенная сопротивляемость силовым и интеллектуальным методам вскрытия и взлома. Удвоенная защита во всех направлениях - усиленная дверь. Ваши близкие и Ваше имущество под надежной охраной!', '159 000', 0, 0, 0, 4, 26, 1, NULL, '2018-01-18 13:46:35', '2018-01-18 13:46:35'),
(31, 'Входная дверь «Лацио»', 'vkhodnaya-dver-latsio', 'Отделка снаружи – МДФ 16 мм влагостойкий, покрытие VINORIT, цвет «Дуб золотистый», лак+патина, рис. ХФ-31, стеклопакет зеркально-тонированный «Бронза», решетка «Е», кованная решетка', 'Окраска – Полимер «Муар черный» Отделка снаружи – МДФ 16 мм влагостойкий, покрытие VINORIT, цвет «Дуб золотистый», лак+патина, рис. ХФ-31, стеклопакет зеркально-тонированный «Бронза», решетка «Е», кованная решетка Отделка внутри – МДФ 16 мм влагостойкий, покрытие VINORIT, цвет «Дуб золотистый», лак+патина, рис. О-Е', '270', 0, 0, 0, 4, 26, 1, NULL, '2018-01-18 13:47:46', '2018-01-18 13:47:46'),
(32, 'Входная дверь «МеДверь»', 'vkhodnaya-dver-medver', 'Изготавливается по технологии терморазрыва, т.е. металл с жилой стороны двери не соприкасается с уличной', 'Изготавливается по технологии терморазрыва, т.е. металл с жилой стороны двери не соприкасается с уличной, что позволяет не появляться наледи с внутренней стороны и не промерзать;\r\nТолщина полотна 81 мм;\r\n2 контура уплотнения D формы;\r\nГлубина коробки 154 мм, 2 притвора;\r\nВнутреннее заполнение: минеральная плита+сэндвич панель;\r\nЗамки и фурнитура: осн. Гардиан 2112; доп. Гардиан3001\r\nВнешняя отделка: Полимерное покрытие на выбор;\r\nВнутренняя отделка: МДФ 16 мм, влагостойкий, ПВХ пленка, рисунки фрезировки, цвета - на выбор;\r\nФурнитура: ручка, задвижка, цвет - Хром\r\nТупики недопустимы, зашивка обязательна.', '190 000', 0, 0, 0, 3, 26, 1, NULL, '2018-01-18 13:49:37', '2018-01-18 13:49:37'),
(33, 'Входная дверь «МОДЕРН GALLA»', 'vkhodnaya-dver-modern-GALLA', 'возможна поставка в комплекте, устанавливается при монтаже двери', 'МДФ влагостойкий фрезерованный, рис. \"Стандарт 23\" МДФ влагостойкий фрезерованный, рис. \"Стандарт 23\" Стандартное, цвет \"Тиковое дерево\"', '170 000', 0, 0, 0, 3, 26, 1, NULL, '2018-01-18 13:51:03', '2018-01-18 13:51:03'),
(34, 'Входная дверь Цезарь', 'vkhodnaya-dver-tsezar', '«Цезарь» — это коллекция дверей, гармонично сочетающая в себе роскошь и безопасность', '«Цезарь» — это коллекция дверей, гармонично сочетающая в себе роскошь и безопасность. Дверь «Колизей» имеет покрытие Vinorit, которое является надёжной защитой от ультрафиолета, атмосферных воздействий и механических повреждений. Чтобы подчеркнуть красоту рисунка и визуально состарить поверхность, дверь вручную покрывается патиной.', '170 000', 0, 0, 1, 4, 26, 1, NULL, '2018-01-18 13:52:16', '2018-01-18 13:58:01'),
(35, 'Межкомнатная дверь Токио 2', 'medgkomnatnaya-dver-tokio-2', 'Межкомнатная дверь \"Токио-2\" отличается презентабельностью и лаконичным дизайном, идеальным сочетанием с любым современным интерьером (модерн, японский минимализм и т.д.)', 'Межкомнатная дверь \"Токио-2\" отличается презентабельностью и лаконичным дизайном, идеальным сочетанием с любым современным интерьером (модерн, японский минимализм и т.д.),Межкомнатная дверь \"Токио-2\" отличается презентабельностью и лаконичным дизайном, идеальным сочетанием с любым современным интерьером (модерн, японский минимализм и т.д.),', '41 000', 0, 0, 1, 3, 27, 1, NULL, '2018-01-18 14:03:40', '2018-01-18 14:03:40'),
(36, 'Межкомнатные двери Trend Doors 6 моделей', 'medgkomnatnye-dveri-Trend-Doors-6-modeley', 'Модели Тренд Дорс отлично сочетаются с современным дизайном.', 'Модели Тренд Дорс отлично сочетаются с современным дизайном. Сочетание деревянного бруса и мдф панелей обеспечат надёжность и долговечность.  Ниже в таблице Вы ознакомитесь с цветовой палитрой моделей. Также вы можете выбрать входную дверь, которая будет сочетаться с межкомнатными, перейдя по ссылкам', '25 000', 0, 0, 0, 4, 27, 1, NULL, '2018-01-18 16:37:21', '2018-01-18 16:37:21'),
(37, 'Межкомнатная дверь Токио 5', 'medgkomnatnaya-dver-tokio-5', 'Межкомнатная дверь \"Токио-5\" отличается презентабельностью и лаконичным дизайном', 'Межкомнатная дверь \"Токио-5\" отличается презентабельностью и лаконичным дизайном, идеальным сочетанием с любым современным интерьером (модерн, японский минимализм и т.д.),', '41 000', 1, 0, 1, 3, 27, 1, NULL, '2018-01-18 16:38:58', '2018-01-18 16:38:58'),
(38, 'Входная дверь Polonia | Полониа', 'vkhodnaya-dver-Polonia-|-polonia', 'Белорусское качество из европейских комплектующих Polonia | Полониа снаружи внутри', 'МДФ влагостойкий 12 мм, покрыт пленкой Vinorit (цвет дуб темный), патина, лак , рис. О-Е (окно)', '255 000', 0, 1, 0, 3, 28, 1, NULL, '2018-01-18 16:42:11', '2018-01-18 16:42:11'),
(39, 'Входная дверь Aplot', 'vkhodnaya-dver-Aplot', 'Белорусское качество из европейских комплектующих Aplot снаружи внутри размер', 'МДФ влагостойкий 16мм, отделка плёной \"Vinorit\" + ручное патенирование МДФ влагостойкий 16мм, отделка плёной \"Vinorit\" + ручное патенирование', '245 000', 0, 1, 0, 3, 28, 1, NULL, '2018-01-18 16:43:29', '2018-01-18 16:43:29'),
(40, 'Ламинат Kronofix Classic Бродволк 5968', 'laminat-Kronofix-Classic-brodvolk-5968', 'Ваш ламинат Kronofix Classic не только красив, но и непритязателен в уходе.', 'Ваш ламинат Kronofix Classic не только красив, но и непритязателен в уходе. Он с легкостью выдерживает ежедневные нагрузки, устойчив к пятнам и царапинам. Этот пол прост в укладке, а результат, как всегда, великолепен.', '1 999', 0, 0, 0, 2, 29, 1, NULL, '2018-01-18 16:47:24', '2018-01-18 16:47:24'),
(41, 'Ламинат Kronospan Castello Classic 5955', 'laminat-Kronospan-Castello-Classic-5955', 'Благодаря элегантным декорам и натуральной поверхности, ламинат Castello Classic едва ли можно отличить от натуральной древесины.', 'Благодаря элегантным декорам и натуральной поверхности, ламинат Castello Classic едва ли можно отличить от натуральной древесины. Кроме того, он отличается особой простотой в уходе и чистке.', '1 999', 0, 1, 0, 2, 29, 1, NULL, '2018-01-18 16:49:22', '2018-01-18 16:49:22'),
(42, 'Обои Нева 2073 вспененный винил на флизелине (1,06*10,05) (6)', 'oboi-neva-2073-vspenennyy-vinil-na-flizeline-106*1005-6', 'Вспененное виниловое покрытие создает глубокий рельеф на обоях, что позволяет скрыть различные неровности стен и добавить интерьеру фактуры', 'Вспененное виниловое покрытие создает глубокий рельеф на обоях, что позволяет скрыть различные неровности стен и добавить интерьеру фактуры', '4 430', 0, 1, 0, 2, 24, 1, NULL, '2018-01-18 16:52:57', '2018-01-18 16:52:57'),
(43, 'Фотообои KOMAR 368*254cm 8-526 Sailing (8 частей)', 'fotooboi-KOMAR-368*254cm-8-526-Sailing-8-chastey', 'Свежий ветер наполняет паруса шхун у берегов Портленда.', 'Фотообои – снова на пике популярности! Они позволяют с легкостью преобразить интерьер спальни, гостиной и даже детской комнаты.  Фотообои Komar изготовлены из плотной полуглянцевой бумаги. Каждый рулон упакован в пластиковый тубус, исключающий повреждения при транспортировке.', '10 169', 1, 0, 0, 3, 30, 1, NULL, '2018-01-18 16:56:50', '2018-01-18 16:56:50'),
(44, 'Ручки FKF c защелкой 6883 SS PS /Тұтқалар FKF 6883 SS PS шаппасымен', 'ruchki-FKF-c-zaschelkoy-6883-SS-PS--tutqalar-FKF-6883-SS-PS-shappasymen', 'Главной отличительной чертой продукции FKF является широкое использование в производстве дверных ручек PVD-технологии', 'Главной отличительной чертой продукции FKF является широкое использование в производстве дверных ручек PVD-технологии, благодаря которой гарантийный срок службы ручки составляет не менее 25 лет.', '2 841', 1, 0, 0, 2, 21, 1, NULL, '2018-01-18 16:59:49', '2018-01-18 16:59:49'),
(45, 'Эмульсия Радуга ЭКО акриловая для стен и потолков 20л снежно-белая', 'emulsiya-raduga-eko-akrilovaya-dlya-sten-i-potolkov-20l-snedgno-belaya', 'Эмульсия Радуга ЭКО акриловая для стен и потолков.', 'Эмульсия Радуга ЭКО акриловая для стен и потолков.Эмульсия Радуга ЭКО акриловая для стен и потолков.Эмульсия Радуга ЭКО акриловая для стен и потолков.', '8 778', 1, 1, 0, 1, 31, 1, NULL, '2018-01-18 17:03:52', '2018-01-18 17:03:52'),
(46, 'Набор емкостей для продуктов квадратные 0,5л 3 шт. салатовый', 'nabor-emkostey-dlya-produktov-kvadratnye-05l-3-sht-salatovyy', 'Набор емкостей для продуктов из полипропилена.', 'Набор емкостей для продуктов из полипропилена. Полиэтиленовая крышка остается пластичной при низких температурах, поэтому легко открывается, если емкости хранить в морозилке. Можно использовать в СВЧ-печи, предварительно приоткрыв крышку.Набор контейнеров \"Idea\" можно мыть в посудомоечной машине. Контейнер выдерживает температуру в диапазоне от -30°C до +100°, его можно мыть в посудомоечной машине и нельзя греть пустым.', '430', 1, 0, 0, 1, 32, 1, NULL, '2018-01-18 17:09:38', '2018-01-18 17:09:38');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `token`, `role_id`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kalibayev', 'Nursultan', '7072940015', 'admin@admin.com', '$2y$10$AUBhaIdwbGgvUsaBrmtiaer4oA7hEcCSPfidI5z14RX1QYP/AGLRa', NULL, 1, NULL, 'mEVXTpdQWXao8HdZL3maKdthLR7xAj7nzgZPQQNRM5xiCaG2KcgYH3yW1gHD', NULL, NULL),
(2, 'Аскарбекова', 'Майра', '87756512595', 'maira_1189@mail.ru', '$2y$10$PfwRzVYZXnXcRLXnGPfRvOb7S8//9MkRHeV9NJTcO6Nc4xnNzWyvm', NULL, 0, NULL, NULL, '2018-01-22 05:50:22', '2018-01-22 05:50:22');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `callbacks`
--
ALTER TABLE `callbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `link` (`link`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `callbacks`
--
ALTER TABLE `callbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
