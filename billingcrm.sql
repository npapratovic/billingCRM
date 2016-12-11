-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2016 at 04:11 PM
-- Server version: 5.5.50-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crmgo_billingcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 2),
(2, 2, 5),
(3, 3, 5),
(4, 4, 5),
(5, 5, 5),
(6, 6, 5),
(7, 7, 5),
(8, 8, 5),
(9, 9, 5),
(10, 10, 5),
(11, 11, 5),
(12, 12, 5),
(13, 13, 5),
(14, 14, 5),
(15, 15, 5),
(16, 16, 5),
(17, 17, 5),
(18, 17, 5),
(19, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `permalink`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1. attribute', '1-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(2, '2. attribute', '2-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(3, '3. attribute', '3-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(4, '4. attribute', '4-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(5, '5. attribute', '5-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(6, '6. attribute', '6-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(7, '7. attribute', '7-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(8, '8. attribute', '8-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(9, '9. attribute', '9-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(10, '10. attribute', '10-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(11, '11. attribute', '11-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(12, '12. attribute', '12-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(13, '13. attribute', '13-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(14, '14. attribute', '14-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(15, '15. attribute', '15-attribute', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `permalink`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1. category', '1-category', '1. description', '/uploads/frontend/category/hotdog.jpg', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(2, '2. category', '2-category', '2. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(3, '3. category', '3-category', '3. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(4, '4. category', '4-category', '4. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(5, '5. category', '5-category', '5. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(6, '6. category', '6-category', '6. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(7, '7. category', '7-category', '7. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(8, '8. category', '8-category', '8. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(9, '9. category', '9-category', '9. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(10, '10. category', '10-category', '10. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(11, '11. category', '11-category', '11. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(12, '12. category', '12-category', '12. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(13, '13. category', '13-category', '13. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(14, '14. category', '14-category', '14. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(15, '15. category', '15-category', '15. description', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=129 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagreb', 'zagreb', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(2, 'Dugo Selo', 'dugo-selo', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(3, 'Ivanić Grad', 'ivanic-grad', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(4, 'Jastrebarsko', 'jastrebarsko', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(5, 'Samobor', 'samobor', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(6, 'Sveta Nedelja', 'sveta-nedelja', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(7, 'Sveti Ivan Zelina', 'sveti-ivan-zelina', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(8, 'Velika Gorica', 'velika-gorica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(9, 'Vrbovec', 'vrbovec', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(10, 'Zaprešić', 'zapresic', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(11, 'Donja Stubica', 'donja-stubica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(12, 'Klanjec', 'klanjec', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(13, 'Krapina', 'krapina', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(14, 'Oroslavje', 'oroslavje', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(15, 'Pregrada', 'pregrada', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(16, 'Zabok', 'zabok', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(17, 'Zlatar', 'zlatar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(18, 'Glina', 'glina', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(19, 'Hrvatska Kostajnica', 'hrvatska-kostajnica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(20, 'Kutina', 'kutina', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(21, 'Novska', 'novska', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(22, 'Petrinja', 'petrinja', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(23, 'Popovača', 'popovaca', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(24, 'Sisak', 'sisak', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(25, 'Duga Resa', 'duga-resa', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(26, 'Karlovac', 'karlovac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(27, 'Ogulin', 'ogulin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(28, 'Ozalj', 'ozalj', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(29, 'Slunj', 'slunj', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(30, 'Ivanec', 'ivanec', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(31, 'Lepoglava', 'lepoglava', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(32, 'Ludbreg', 'ludbreg', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(33, 'Novi Marof', 'novi-marof', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(34, 'Varaždin', 'varazdin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(35, 'Varaždinske Toplice', 'varazdinske-toplice', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(36, 'Đurđevac', 'durdevac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(37, 'Koprivnica', 'koprivnica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(38, 'Križevci', 'krizevci', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(39, 'Bjelovar', 'bjelovar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(40, 'Čazma', 'cazma', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(41, 'Daruvar', 'daruvar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(42, 'Garešnica', 'garesnica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(43, 'Grubišno Polje', 'grubisno-polje', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(44, 'Bakar', 'bakar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(45, 'Cres', 'cres', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(46, 'Crikvenica', 'crikvenica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(47, 'Čabar', 'cabar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(48, 'Delnice', 'delnice', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(49, 'Kastav', 'kastav', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(50, 'Kraljevica', 'kraljevica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(51, 'Krk', 'krk', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(52, 'Mali Lošinj', 'mali-losinj', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(53, 'Novi Vinodolski', 'novi-vinodolski', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(54, 'Opatija', 'opatija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(55, 'Rab', 'rab', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(56, 'Rijeka', 'rijeka', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(57, 'Vrbovsko', 'vrbovsko', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(58, 'Gospić', 'gospic', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(59, 'Novalja', 'novalja', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(60, 'Otočac', 'otocac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(61, 'Senj', 'senj', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(62, 'Orahovica', 'orahovica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(63, 'Slatina', 'slatina', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(64, 'Virovitica', 'virovitica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(65, 'Kutjevo', 'kutjevo', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(66, 'Lipik', 'lipik', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(67, 'Pakrac', 'pakrac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(68, 'Pleternica', 'pleternica', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(69, 'Požega', 'pozega', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(70, 'Nova gradiška', 'nova-gradiska', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(71, 'Slavonski Brod', 'slavonski-brod', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(72, 'Benkovac', 'benkovac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(73, 'Biograd na Moru', 'biograd-na-moru', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(74, 'Nin', 'nin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(75, 'Obrovac', 'obrovac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(76, 'Pag', 'pag', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(77, 'Zadar', 'zadar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(78, 'Beli Manastir', 'beli-manastir', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(79, 'Belišće', 'belisce', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(80, 'Donji Miholjac', 'donji-miholjac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(81, 'Đakovo', 'dakovo', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(82, 'Našice', 'nasice', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(83, 'Osijek', 'osijek', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(84, 'Valpovo', 'valpovo', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(85, 'Drniš', 'drnis', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(86, 'Knin', 'knin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(87, 'Skradin', 'skradin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(88, 'Šibenik', 'sibenik', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(89, 'Vodice', 'vodice', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(90, 'Ilok', 'ilok', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(91, 'Otok', 'otok', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(92, 'Vinkovci', 'vinkovci', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(93, 'Vukovar', 'vukovar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(94, 'Županja', 'zupanja', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(95, 'Hvar', 'hvar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(96, 'Imotski', 'imotski', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(97, 'Kaštela', 'kastela', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(98, 'Komiža', 'komiza', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(99, 'Makarska', 'makarska', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(100, 'Omiš', 'omis', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(101, 'Sinj', 'sinj', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(102, 'Solin', 'solin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(103, 'Split', 'split', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(104, 'Stari Grad', 'stari-grad', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(105, 'Supetar', 'supetar', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(106, 'Trilj', 'trilj', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(107, 'Trogir', 'trogir', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(108, 'Vis', 'vis', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(109, 'Vrgorac', 'vrgorac', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(110, 'Vrlika', 'vrlika', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(111, 'Buje-Buie', 'buje-buie', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(112, 'Buzet', 'buzet', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(113, 'Labin', 'labin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(114, 'Novigrad', 'novigrad', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(115, 'Pazin', 'pazin', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(116, 'Poreč', 'porec', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(117, 'Pula', 'pula', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(118, 'Rovinj', 'rovinj', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(119, 'Umag', 'umag', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(120, 'Vodnjan', 'vodnjan', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(121, 'Dubrovnik', 'dubrovnik', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(122, 'Korčula', 'korcula', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(123, 'Metković', 'metkovic', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(124, 'Opuzen', 'opuzen', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(125, 'Ploče', 'ploce', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(126, 'Čakovec', 'cakovec', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(127, 'Mursko Središće', 'mursko-sredisce', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(128, 'Prelog', 'prelog', '2016-12-11 04:03:50', '2016-12-11 04:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oib` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_number` int(11) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_percentage` float(8,2) DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `swift` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdv_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `free_input` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `show_text` int(11) DEFAULT NULL,
  `tax_base` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches`
--

CREATE TABLE IF NOT EXISTS `dispatches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dispatch_number` int(11) NOT NULL,
  `taxable` int(11) NOT NULL,
  `hide_amount` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `client_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_oib` int(11) NOT NULL,
  `stock_label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispatch_employee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dispatch_date_ship` date DEFAULT NULL,
  `dispatch_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dispatch_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches_products`
--

CREATE TABLE IF NOT EXISTS `dispatches_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dispatch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches_services`
--

CREATE TABLE IF NOT EXISTS `dispatches_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dispatch_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `invoice_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_way` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_date_deadline` date DEFAULT NULL,
  `invoice_date_ship` date DEFAULT NULL,
  `invoice_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intern_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repeat_invoice` int(11) NOT NULL,
  `invoice_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_products`
--

CREATE TABLE IF NOT EXISTS `invoices_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_products_invoice_id_foreign` (`invoice_id`),
  KEY `invoices_products_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iso_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `local_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_iso_tag_unique` (`iso_tag`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `iso_tag`, `language`, `local_name`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(2, 'hr', 'Croatian', 'Hrvatski', '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(3, 'de', 'German', 'Deutsch', '2016-12-11 04:03:49', '2016-12-11 04:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_06_28_165421_all_migrations', 1),
('2016_07_07_014132_create_session_table', 1),
('2016_11_19_202945_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice`
--

CREATE TABLE IF NOT EXISTS `narudzbenice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `narudzbenica_number` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `hide_amount` int(11) NOT NULL,
  `client_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_oib` int(11) NOT NULL,
  `payment_way` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `narudzbenica_start` date NOT NULL,
  `narudzbenica_end` date NOT NULL,
  `narudzbenica_note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `narudzbenica_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valute` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice_products`
--

CREATE TABLE IF NOT EXISTS `narudzbenice_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `narudzbenica_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `offer_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `hide_amount` int(11) NOT NULL,
  `client_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_oib` int(11) NOT NULL,
  `payment_way` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_start` date NOT NULL,
  `offer_end` date NOT NULL,
  `offer_note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `offer_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valute` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE IF NOT EXISTS `offers_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `shipping_way` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_way` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `show_only` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `employee_id`, `price`, `shipping_way`, `payment_way`, `payment_status`, `billing_address`, `shipping_address`, `note`, `order_date`, `show_only`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '19', 17, 1, 3.00, '', 'bacs', 'on-hold', 'Hr. Republike 36', 'Hr. Republike 36', '', '2016-12-06 12:16:31', 1, '2016-12-06 12:16:31', '2016-12-06 12:16:31', NULL),
(2, '18', 18, 1, 0.00, '', '', 'pending', '', '', '', '2016-12-05 11:43:00', 1, '2016-12-05 11:43:00', '2016-12-05 17:20:22', NULL),
(3, '17', 19, 1, 0.00, '', '', 'pending', '', '', '', '2016-12-05 11:34:00', 1, '2016-12-05 11:34:00', '2016-12-05 11:34:50', NULL),
(4, '16', 19, 1, 0.00, '', 'ppec_paypal', 'pending', 'Hr. Republike 19b', '', '', '2016-11-30 15:33:00', 1, '2016-11-30 15:33:00', '2016-11-30 15:34:37', NULL),
(5, '15', 19, 1, 0.00, '', 'bacs', 'pending', 'Hr. Republike 19b', 'Hr. Republike 19b', '', '2016-11-30 15:28:00', 1, '2016-11-30 15:28:00', '2016-11-30 15:30:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 1, 100.00, '2016-12-11 05:04:30', '2016-12-11 05:04:30'),
(2, 2, 12, 1, 80.00, '2016-12-11 05:04:30', '2016-12-11 05:04:30'),
(3, 3, 11, 1, 100.00, '2016-12-11 05:04:30', '2016-12-11 05:04:30'),
(4, 4, 10, 1, 100.00, '2016-12-11 05:04:30', '2016-12-11 05:04:30'),
(5, 4, 11, 1, 100.00, '2016-12-11 05:04:30', '2016-12-11 05:04:30'),
(6, 5, 18, 1, 3.00, '2016-12-11 05:04:30', '2016-12-11 05:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE IF NOT EXISTS `products_attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_attributes_product_id_foreign` (`product_id`),
  KEY `products_attributes_attribute_id_foreign` (`attribute_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categories_product_id_foreign` (`product_id`),
  KEY `products_categories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_services`
--

CREATE TABLE IF NOT EXISTS `products_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `visibility` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_status` int(11) DEFAULT NULL,
  `total_sales` int(11) DEFAULT NULL,
  `downloadable` int(11) DEFAULT NULL,
  `virtual` int(11) DEFAULT NULL,
  `regular_price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `purchase_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `weight` float(8,2) DEFAULT NULL,
  `length` float(8,2) DEFAULT NULL,
  `width` float(8,2) DEFAULT NULL,
  `height` float(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `sold_individually` int(11) DEFAULT NULL,
  `manage_stock` int(11) DEFAULT NULL,
  `backorders` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `existing` int(11) DEFAULT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `discount` float(8,2) DEFAULT NULL,
  `tax` float(8,2) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `products_services`
--

INSERT INTO `products_services` (`id`, `title`, `permalink`, `product_type`, `image`, `intro`, `content`, `visibility`, `stock_status`, `total_sales`, `downloadable`, `virtual`, `regular_price`, `sale_price`, `purchase_note`, `featured`, `weight`, `length`, `width`, `height`, `status`, `sku`, `price`, `sold_individually`, `manage_stock`, `backorders`, `stock`, `existing`, `measurement`, `amount`, `discount`, `tax`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'sffds', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3.00, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'product', '2016-12-11 04:04:30', '2016-12-11 04:04:30', NULL),
(10, 'Produkt 1', 'http://localhost/wordpress/wordpress/?post_type=product&p=10', '1', NULL, '', '<p>Ovo je moj prvi produkt</p>\n', '1', 1, 0, 1, 0, NULL, NULL, '1', 0, NULL, 0.00, 0.00, 0.00, 'draft', 0, 100.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-11-29 08:14:42', '2016-11-30 14:43:42', NULL),
(11, 'Produkt dost dobar', 'http://localhost/wordpress/wordpress/product/produkt-2/', '1', NULL, '', '<p>Ovo je moj dost dobar produkt</p>\n', '1', 1, 1, 1, 0, NULL, 80, '1', 0, NULL, 0.00, 0.00, 0.00, 'publish', 0, 100.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-11-29 08:17:39', '2016-12-06 10:25:40', NULL),
(12, 'Produkt 3', 'http://localhost/wordpress/wordpress/product/produkt-3/', '1', NULL, '', '<p>Moj 3. produkt</p>\n', '1', 1, 0, 1, 0, NULL, NULL, '1', 0, NULL, 0.00, 0.00, 0.00, 'publish', 0, 80.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-11-29 08:18:07', '2016-11-29 08:18:07', NULL),
(13, 'Produkt 4', 'http://localhost/wordpress/wordpress/?post_type=product&p=13', '1', NULL, '', '', '1', 1, 0, 1, 0, NULL, NULL, '1', 0, NULL, 0.00, 0.00, 0.00, 'draft', 0, 0.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-11-29 08:18:45', '2016-11-30 14:42:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_tags`
--

CREATE TABLE IF NOT EXISTS `products_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_tags_product_id_foreign` (`product_id`),
  KEY `products_tags_tag_id_foreign` (`tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagrebačka županija', 'zagrebacka-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(2, 'Krapinsko-zagorska županija', 'krapinsko-zagorska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(3, 'Sisačko-moslavačka županija', 'sisacko-moslavacka-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(4, 'Karlovačka županija', 'karlovacka-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(5, 'Varaždinska županija', 'varazdinska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(6, 'Koprivničko-križevačka županija', 'koprivnicko-krizevacka-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(7, 'Bjelovarsko-bilogorska županija', 'bjelovarsko-bilogorska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(8, 'Primorsko-goranska županija', 'primorsko-goranska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(9, 'Ličko-senjska županija', 'licko-senjska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(10, 'Virovitičko-podravska županija', 'viroviticko-podravska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(11, 'Požeško-slavonska županija', 'pozesko-slavonska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(12, 'Brodsko-posavska županija', 'brodsko-posavska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(13, 'Zadarska županija', 'zadarska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(14, 'Osječko-baranjska županija', 'osjecko-baranjska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(15, 'Šibensko-kninska županija', 'sibensko-kninska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(16, 'Vukovarsko-srijemska županija', 'vukovarsko-srijemska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(17, 'Splitsko-dalmatinska županija', 'splitsko-dalmatinska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(18, 'Istarska županija', 'istarska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(19, 'Dubrovačko-neretvanska županija', 'dubrovacko-neretvanska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(20, 'Međimurska županija', 'medimurska-zupanija', '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(21, 'Grad Zagreb', 'grad-zagreb', '2016-12-11 04:03:50', '2016-12-11 04:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(2, 'admin', '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(3, 'manager', '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(4, 'employee', '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(5, 'user', '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(6, 'anonymous', '2016-12-11 04:03:49', '2016-12-11 04:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `permalink`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1. tag', '1-tag', '1. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(2, '2. tag', '2-tag', '2. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(3, '3. tag', '3-tag', '3. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(4, '4. tag', '4-tag', '4. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(5, '5. tag', '5-tag', '5. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(6, '6. tag', '6-tag', '6. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(7, '7. tag', '7-tag', '7. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(8, '8. tag', '8-tag', '8. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(9, '9. tag', '9-tag', '9. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(10, '10. tag', '10-tag', '10. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(11, '11. tag', '11-tag', '11. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(12, '12. tag', '12-tag', '12. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(13, '13. tag', '13-tag', '13. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(14, '14. tag', '14-tag', '14. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL),
(15, '15. tag', '15-tag', '15. description', '2016-12-11 04:03:50', '2016-12-11 04:03:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `mjesto` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `web` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `iban` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `region` int(10) unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oib` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` int(10) unsigned NOT NULL DEFAULT '1',
  `consumer_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consumer_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_language_foreign` (`language`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_group`, `email`, `password`, `first_name`, `last_name`, `address`, `city`, `mjesto`, `zip`, `country`, `fax`, `mobile`, `phone`, `web`, `iban`, `note`, `region`, `image`, `oib`, `company_name`, `client_type`, `remember_token`, `verify_code`, `language`, `consumer_key`, `consumer_secret`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', '$2y$10$CPkkkWaZ.XbQHKO5a4/T0O9dL7evdKAm4F4tcq.Kcdhc3m9r/fnOW', 'Ivan', 'Horvat', 'Sunčana ulica 365', 83, NULL, NULL, NULL, '', '', '0959039610', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(2, 'jbarnese', 'client', 'jbarnese@blogger.com', '$2y$10$bu8fa2.Qo9zEmoeNgbtItuu9ppXvpRdVzcNdhAGCT1GrBFYI/Eehq', 'Joyce', 'Barnese', '56 Sherman Lane', 83, NULL, '30000', NULL, '', '', '8912824968', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(3, 'fbrownb', 'client', 'fbrownb@weebly.com', '$2y$10$BMUJXvHLGWouOIn1tLmj1e6CYjNFVvjusZ8.oj13NcrV2KAdGcC/.', 'Fred', 'Brown', '2014 Hoffman Parkway', 83, NULL, '31000', NULL, '', '', '5237464341', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(4, 'blanec', 'client', 'blanec@businessweek.com', '$2y$10$CvLzCNGvmxshMELipfbZV.d3MJf5VPaSSAWzr4YHl5fqUxnbVHthy', 'Brian', 'Lane', '1 Hanover Street', 83, NULL, '32000', NULL, '', '', '2024359010', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(5, 'shayesd', 'client', 'shayesd@hubpages.com', '$2y$10$YRVpKcpdIBCdxisqKwWaaepT4ZDvauI3VvmQGI2.2zY2GLgqbBzPK', 'Shiley', 'Hayes', '3 Quincy Way', 83, NULL, '33000', NULL, '', '', '2253961257', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(6, 'epeters8', 'client', 'epeters8@dagondesign.com', '$2y$10$J3YbUaWpbtCc5Na4RAUBx..oa6FtHPsVHkdSYDt4za5NXKQDdQABi', 'Eugene', 'Peters', '82 Duke Avenue', 83, NULL, '34000', NULL, '', '', '3984360132', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(7, 'wgraham9', 'client', 'wgraham9@marriott.com', '$2y$10$k0idWto.38HwjY63aLcgT.wDbxrdWy4/ATC5A6ZY745Hbg4M.y20S', 'Willie', 'Graham', '53 Carey Parkway', 83, NULL, '35000', NULL, '', '', '8912824968', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(8, 'achapmana', 'client', 'achapmana@wordpress.org', '$2y$10$A0kbVt7H3ZcUjGJtcorSB./6EEfw.rj0H/nfvU63orslW7HdFETDy', 'Andrew', 'Chapman', '0 Gale Trail', 83, NULL, '36000', NULL, '', '', '9292275546', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:49', '2016-12-11 04:03:49'),
(9, 'cfreeman7', 'client', 'cfreeman7@jimdo.com', '$2y$10$YS4zjsqbjt2uMGecb4DLWOydQQ.BJWLxRuCZpgsFlr/UDerk5ozjO', 'Clarence', 'Freeman', '0621 Spaight Way', 83, NULL, '37000', NULL, '', '', '2822200509', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(10, 'erogers6', 'client', 'erogers6@tamu.edu', '$2y$10$g8W2mxLk.nZ9B5KPaI26ZOVLn8Dbv2GPRJ8MBCuyupq4vBw8X97BC', 'Emily', 'Rogers', '969 Parkside Park', 83, NULL, '38000', NULL, '', '', '4589807140', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(11, 'wlittle5', 'client', 'wlittle5@tuttocitta.it', '$2y$10$nLnN7R7osdwGYw8lq7One.PeiZKVMTKeydn46K6KyWvNaIW9sOMQa', 'Wanda', 'Little', '12 Hauk Place', 83, NULL, '39000', NULL, '', '', '8171047682', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(12, 'rdiaz4', 'client', 'rdiaz4@canalblog.com', '$2y$10$aH5zzuKEyeiRCpe7Uj2HOeE17qLQ6Ugsr02wYBvWB7qjeEfGlAgxC', 'Rebecca', 'Diaz', '85646 Cottonwood Parkway', 83, NULL, '40000', NULL, '', '', '9211325551', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(13, 'bcastillo3', 'client', 'bcastillo3@deviantart.com', '$2y$10$g0C7qXC3DNTUO6OderfxJOsecRoEFHjiAs5JxlZNTgCYCofXQbsCy', 'Bonnie', 'Castillo', '30 Acker Center', 83, NULL, '41000', NULL, '', '', '9396412064', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(14, 'jgomez2', 'client', 'jgomez2@imdb.com', '$2y$10$LLKFqaOl7oj2u0.M6FVvNuRYf9tlbxyGU9AwTXG.1t02ItNVhA6Ba', 'Jacqueline', 'Gomez', '08 Towne Place', 83, NULL, '42000', NULL, '', '', '9396412064', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(15, 'kday0', 'client', 'kday0@walmart.com', '$2y$10$PO2ogXWj2k0YHxAFsOpPVO9HQkt9DOK6BFCbo8IvOH.To5qKk2QKm', 'Kathleen', 'Day', '53964 Spenser Trail', 83, NULL, '43000', NULL, '', '', '7732294081', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(16, 'bcarter1', 'client', 'bcarter1@auda.org.au', '$2y$10$6CgEYSirripOldG8kqcite8q2R3JyQUdL5RHuNVrwVYcBF9oTVasq', 'Barbara', 'Carter', '697 Jenifer Way', 83, NULL, '44000', NULL, '', '', '8326578470', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-11 04:03:50', '2016-12-11 04:03:50'),
(17, '', 'client', 'nikola.papratovic@gmail.com', '', 'Nikola', 'Papratović', 'asdf', 1, '14', '31000', '14', '0', '123098456', '987654321', 'http://mojawebstranica.com', 'iban', 'Podaci iz WordPress stranice', 0, '', '1', 'asdf', '1', NULL, NULL, 1, '', '', NULL, '2016-12-11 04:04:30', '2016-12-11 04:04:30'),
(18, '', 'client', '', '', '', '', 'asdf', 1, '14', '31000', '14', '0', '123098456', '987654321', 'http://mojawebstranica.com', 'iban', 'Podaci iz WordPress stranice', 0, '', '1', 'asdf', '1', NULL, NULL, 1, '', '', NULL, '2016-12-11 04:04:30', '2016-12-11 04:04:30'),
(19, '', 'client', 've.zezelj@gmail.com', '', '', '', 'asdf', 1, '14', '31000', '14', '0', '123098456', '987654321', 'http://mojawebstranica.com', 'iban', 'Podaci iz WordPress stranice', 0, '', '1', 'asdf', '1', NULL, NULL, 1, '', '', NULL, '2016-12-11 04:04:30', '2016-12-11 04:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `workingorders`
--

CREATE TABLE IF NOT EXISTS `workingorders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workingorder_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taxable` int(11) NOT NULL,
  `hide_amount` int(11) NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `client_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_oib` int(11) NOT NULL,
  `workingorder_employee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `workingorder_date_ship` date DEFAULT NULL,
  `workingorder_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workingorder_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workingorders_services`
--

CREATE TABLE IF NOT EXISTS `workingorders_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workingorder_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
