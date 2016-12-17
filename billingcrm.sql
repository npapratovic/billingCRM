-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2016 at 11:35 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

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
(16, 16, 5);

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
(1, '1. attribute', '1-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(2, '2. attribute', '2-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(3, '3. attribute', '3-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(4, '4. attribute', '4-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(5, '5. attribute', '5-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(6, '6. attribute', '6-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(7, '7. attribute', '7-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(8, '8. attribute', '8-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(9, '9. attribute', '9-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(10, '10. attribute', '10-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(11, '11. attribute', '11-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(12, '12. attribute', '12-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(13, '13. attribute', '13-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(14, '14. attribute', '14-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(15, '15. attribute', '15-attribute', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL);

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
(1, '1. category', '1-category', '1. description', '/uploads/frontend/category/hotdog.jpg', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(2, '2. category', '2-category', '2. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(3, '3. category', '3-category', '3. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(4, '4. category', '4-category', '4. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(5, '5. category', '5-category', '5. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(6, '6. category', '6-category', '6. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(7, '7. category', '7-category', '7. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(8, '8. category', '8-category', '8. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(9, '9. category', '9-category', '9. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(10, '10. category', '10-category', '10. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(11, '11. category', '11-category', '11. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(12, '12. category', '12-category', '12. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(13, '13. category', '13-category', '13. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(14, '14. category', '14-category', '14. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(15, '15. category', '15-category', '15. description', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL);

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
(1, 'Zagreb', 'zagreb', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(2, 'Dugo Selo', 'dugo-selo', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(3, 'Ivanić Grad', 'ivanic-grad', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(4, 'Jastrebarsko', 'jastrebarsko', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(5, 'Samobor', 'samobor', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(6, 'Sveta Nedelja', 'sveta-nedelja', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(7, 'Sveti Ivan Zelina', 'sveti-ivan-zelina', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(8, 'Velika Gorica', 'velika-gorica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(9, 'Vrbovec', 'vrbovec', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(10, 'Zaprešić', 'zapresic', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(11, 'Donja Stubica', 'donja-stubica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(12, 'Klanjec', 'klanjec', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(13, 'Krapina', 'krapina', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(14, 'Oroslavje', 'oroslavje', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(15, 'Pregrada', 'pregrada', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(16, 'Zabok', 'zabok', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(17, 'Zlatar', 'zlatar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(18, 'Glina', 'glina', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(19, 'Hrvatska Kostajnica', 'hrvatska-kostajnica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(20, 'Kutina', 'kutina', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(21, 'Novska', 'novska', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(22, 'Petrinja', 'petrinja', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(23, 'Popovača', 'popovaca', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(24, 'Sisak', 'sisak', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(25, 'Duga Resa', 'duga-resa', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(26, 'Karlovac', 'karlovac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(27, 'Ogulin', 'ogulin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(28, 'Ozalj', 'ozalj', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(29, 'Slunj', 'slunj', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(30, 'Ivanec', 'ivanec', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(31, 'Lepoglava', 'lepoglava', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(32, 'Ludbreg', 'ludbreg', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(33, 'Novi Marof', 'novi-marof', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(34, 'Varaždin', 'varazdin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(35, 'Varaždinske Toplice', 'varazdinske-toplice', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(36, 'Đurđevac', 'durdevac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(37, 'Koprivnica', 'koprivnica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(38, 'Križevci', 'krizevci', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(39, 'Bjelovar', 'bjelovar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(40, 'Čazma', 'cazma', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(41, 'Daruvar', 'daruvar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(42, 'Garešnica', 'garesnica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(43, 'Grubišno Polje', 'grubisno-polje', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(44, 'Bakar', 'bakar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(45, 'Cres', 'cres', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(46, 'Crikvenica', 'crikvenica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(47, 'Čabar', 'cabar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(48, 'Delnice', 'delnice', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(49, 'Kastav', 'kastav', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(50, 'Kraljevica', 'kraljevica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(51, 'Krk', 'krk', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(52, 'Mali Lošinj', 'mali-losinj', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(53, 'Novi Vinodolski', 'novi-vinodolski', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(54, 'Opatija', 'opatija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(55, 'Rab', 'rab', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(56, 'Rijeka', 'rijeka', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(57, 'Vrbovsko', 'vrbovsko', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(58, 'Gospić', 'gospic', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(59, 'Novalja', 'novalja', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(60, 'Otočac', 'otocac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(61, 'Senj', 'senj', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(62, 'Orahovica', 'orahovica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(63, 'Slatina', 'slatina', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(64, 'Virovitica', 'virovitica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(65, 'Kutjevo', 'kutjevo', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(66, 'Lipik', 'lipik', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(67, 'Pakrac', 'pakrac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(68, 'Pleternica', 'pleternica', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(69, 'Požega', 'pozega', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(70, 'Nova gradiška', 'nova-gradiska', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(71, 'Slavonski Brod', 'slavonski-brod', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(72, 'Benkovac', 'benkovac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(73, 'Biograd na Moru', 'biograd-na-moru', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(74, 'Nin', 'nin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(75, 'Obrovac', 'obrovac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(76, 'Pag', 'pag', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(77, 'Zadar', 'zadar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(78, 'Beli Manastir', 'beli-manastir', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(79, 'Belišće', 'belisce', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(80, 'Donji Miholjac', 'donji-miholjac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(81, 'Đakovo', 'dakovo', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(82, 'Našice', 'nasice', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(83, 'Osijek', 'osijek', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(84, 'Valpovo', 'valpovo', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(85, 'Drniš', 'drnis', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(86, 'Knin', 'knin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(87, 'Skradin', 'skradin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(88, 'Šibenik', 'sibenik', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(89, 'Vodice', 'vodice', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(90, 'Ilok', 'ilok', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(91, 'Otok', 'otok', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(92, 'Vinkovci', 'vinkovci', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(93, 'Vukovar', 'vukovar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(94, 'Županja', 'zupanja', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(95, 'Hvar', 'hvar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(96, 'Imotski', 'imotski', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(97, 'Kaštela', 'kastela', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(98, 'Komiža', 'komiza', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(99, 'Makarska', 'makarska', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(100, 'Omiš', 'omis', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(101, 'Sinj', 'sinj', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(102, 'Solin', 'solin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(103, 'Split', 'split', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(104, 'Stari Grad', 'stari-grad', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(105, 'Supetar', 'supetar', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(106, 'Trilj', 'trilj', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(107, 'Trogir', 'trogir', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(108, 'Vis', 'vis', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(109, 'Vrgorac', 'vrgorac', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(110, 'Vrlika', 'vrlika', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(111, 'Buje-Buie', 'buje-buie', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(112, 'Buzet', 'buzet', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(113, 'Labin', 'labin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(114, 'Novigrad', 'novigrad', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(115, 'Pazin', 'pazin', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(116, 'Poreč', 'porec', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(117, 'Pula', 'pula', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(118, 'Rovinj', 'rovinj', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(119, 'Umag', 'umag', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(120, 'Vodnjan', 'vodnjan', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(121, 'Dubrovnik', 'dubrovnik', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(122, 'Korčula', 'korcula', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(123, 'Metković', 'metkovic', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(124, 'Opuzen', 'opuzen', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(125, 'Ploče', 'ploce', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(126, 'Čakovec', 'cakovec', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(127, 'Mursko Središće', 'mursko-sredisce', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(128, 'Prelog', 'prelog', '2016-12-16 16:17:15', '2016-12-16 16:17:15');

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
-- Table structure for table `imported_order_products`
--

CREATE TABLE IF NOT EXISTS `imported_order_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subtotal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtotal_tax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_tax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `tax_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `existing` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
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
  `cityname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_way` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `invoice_date_deadline` date DEFAULT NULL,
  `invoice_date_ship` date DEFAULT NULL,
  `invoice_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intern_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repeat_invoice` int(11) NOT NULL,
  `invoice_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `from_order` int(11) DEFAULT NULL,
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
  `imported` int(11) DEFAULT NULL,
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
(1, 'en', 'English', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(2, 'hr', 'Croatian', 'Hrvatski', '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(3, 'de', 'German', 'Deutsch', '2016-12-16 16:17:14', '2016-12-16 16:17:14');

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
  `cityname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `order_date` datetime NOT NULL,
  `show_only` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `product_id` int(11) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `products_services`
--

INSERT INTO `products_services` (`id`, `product_id`, `title`, `permalink`, `product_type`, `image`, `intro`, `content`, `visibility`, `stock_status`, `total_sales`, `downloadable`, `virtual`, `regular_price`, `sale_price`, `purchase_note`, `featured`, `weight`, `length`, `width`, `height`, `status`, `sku`, `price`, `sold_individually`, `manage_stock`, `backorders`, `stock`, `existing`, `measurement`, `amount`, `discount`, `tax`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '1. produkt', '1-produkt', '1', NULL, '1. intro', '1. content', '1', 500, 1000, 1, 1, 1, 0, '1. purchase note', 1, 3.40, 8.30, 5.10, 3.80, NULL, 11, 6.89, 1, 1, 1, 1414, NULL, NULL, NULL, NULL, NULL, 'product', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(2, 0, '2. produkt', '2-produkt', '1', NULL, '2. intro', '2. content', '1', 500, 1000, 1, 1, 1, 0, '1. purchase note', 1, 3.40, 8.30, 5.10, 3.80, NULL, 11, 6.89, 1, 1, 1, 1414, NULL, NULL, NULL, NULL, NULL, 'product', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(3, 0, '1. service', '', NULL, NULL, '1. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(4, 0, '2. service', '', NULL, NULL, '2. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(5, 0, '3. service', '', NULL, NULL, '3. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(6, 0, '4. service', '', NULL, NULL, '4. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(7, 0, '5. service', '', NULL, NULL, '5. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(8, 0, '6. service', '', NULL, NULL, '6. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(9, 0, '7. service', '', NULL, NULL, '7. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(10, 0, '8. service', '', NULL, NULL, '8. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(11, 0, '9. service', '', NULL, NULL, '9. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(12, 0, '10. service', '', NULL, NULL, '10. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(13, 0, '11. service', '', NULL, NULL, '11. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(14, 0, '12. service', '', NULL, NULL, '12. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(15, 0, '13. service', '', NULL, NULL, '13. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(16, 0, '14. service', '', NULL, NULL, '14. description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(17, 0, '15. service', '', NULL, NULL, '15. intro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.10, NULL, NULL, NULL, NULL, NULL, 'piece', 20, 10.00, 13.00, 'service', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL);

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
(1, 'Zagrebačka županija', 'zagrebacka-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(2, 'Krapinsko-zagorska županija', 'krapinsko-zagorska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(3, 'Sisačko-moslavačka županija', 'sisacko-moslavacka-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(4, 'Karlovačka županija', 'karlovacka-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(5, 'Varaždinska županija', 'varazdinska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(6, 'Koprivničko-križevačka županija', 'koprivnicko-krizevacka-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(7, 'Bjelovarsko-bilogorska županija', 'bjelovarsko-bilogorska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(8, 'Primorsko-goranska županija', 'primorsko-goranska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(9, 'Ličko-senjska županija', 'licko-senjska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(10, 'Virovitičko-podravska županija', 'viroviticko-podravska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(11, 'Požeško-slavonska županija', 'pozesko-slavonska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(12, 'Brodsko-posavska županija', 'brodsko-posavska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(13, 'Zadarska županija', 'zadarska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(14, 'Osječko-baranjska županija', 'osjecko-baranjska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(15, 'Šibensko-kninska županija', 'sibensko-kninska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(16, 'Vukovarsko-srijemska županija', 'vukovarsko-srijemska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(17, 'Splitsko-dalmatinska županija', 'splitsko-dalmatinska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(18, 'Istarska županija', 'istarska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(19, 'Dubrovačko-neretvanska županija', 'dubrovacko-neretvanska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(20, 'Međimurska županija', 'medimurska-zupanija', '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(21, 'Grad Zagreb', 'grad-zagreb', '2016-12-16 16:17:15', '2016-12-16 16:17:15');

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
(1, 'superadmin', '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(2, 'admin', '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(3, 'manager', '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(4, 'employee', '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(5, 'user', '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(6, 'anonymous', '2016-12-16 16:17:14', '2016-12-16 16:17:14');

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
(1, '1. tag', '1-tag', '1. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(2, '2. tag', '2-tag', '2. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(3, '3. tag', '3-tag', '3. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(4, '4. tag', '4-tag', '4. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(5, '5. tag', '5-tag', '5. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(6, '6. tag', '6-tag', '6. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(7, '7. tag', '7-tag', '7. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(8, '8. tag', '8-tag', '8. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(9, '9. tag', '9-tag', '9. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(10, '10. tag', '10-tag', '10. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(11, '11. tag', '11-tag', '11. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(12, '12. tag', '12-tag', '12. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(13, '13. tag', '13-tag', '13. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(14, '14. tag', '14-tag', '14. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL),
(15, '15. tag', '15-tag', '15. description', '2016-12-16 16:17:15', '2016-12-16 16:17:15', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_group`, `email`, `password`, `first_name`, `last_name`, `address`, `city`, `mjesto`, `zip`, `country`, `fax`, `mobile`, `phone`, `web`, `iban`, `note`, `region`, `image`, `oib`, `company_name`, `client_type`, `remember_token`, `verify_code`, `language`, `consumer_key`, `consumer_secret`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', '$2y$10$HaCXQpZbKdnDy6XROJnB0e6ZsJujNW2YobpgE6Kz8cf8iDhDgqBD.', 'Ivan', 'Horvat', 'Sunčana ulica 365', 83, NULL, NULL, NULL, '', '', '0959039610', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(2, 'jbarnese', 'client', 'jbarnese@blogger.com', '$2y$10$ZJOM6QwyLxjyFP4Lt80jKuQIsL9H5VxrQn9djVm1ZoS/3enP2qqcu', 'Joyce', 'Barnese', '56 Sherman Lane', 83, NULL, '30000', NULL, '', '', '8912824968', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(3, 'fbrownb', 'client', 'fbrownb@weebly.com', '$2y$10$gvjbF1B9J4/t8R1YJzrc7OCwR5fU2NE.CXi39USw/XuOYPp84FrxC', 'Fred', 'Brown', '2014 Hoffman Parkway', 83, NULL, '31000', NULL, '', '', '5237464341', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(4, 'blanec', 'client', 'blanec@businessweek.com', '$2y$10$CBzctuImyI0z0C1yhdr8I.fOU1K37nuaKdQfQlCzg8xcbDKtFZoZC', 'Brian', 'Lane', '1 Hanover Street', 83, NULL, '32000', NULL, '', '', '2024359010', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(5, 'shayesd', 'client', 'shayesd@hubpages.com', '$2y$10$S90ds0x.nqTwKkeLl7BTX./LhVKadW64./oO4P1LNNcG3xUR77gIK', 'Shiley', 'Hayes', '3 Quincy Way', 83, NULL, '33000', NULL, '', '', '2253961257', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(6, 'epeters8', 'client', 'epeters8@dagondesign.com', '$2y$10$YqtbksZvoSdjT9SXn/6dEuBbNQ1gN10apTPFxOqftsSafX8w.f9NS', 'Eugene', 'Peters', '82 Duke Avenue', 83, NULL, '34000', NULL, '', '', '3984360132', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(7, 'wgraham9', 'client', 'wgraham9@marriott.com', '$2y$10$pj7t3rJrwrx.OtYo3pT67.TAPoLYAOREOcaUVab8RUz9e0/lxBqP2', 'Willie', 'Graham', '53 Carey Parkway', 83, NULL, '35000', NULL, '', '', '8912824968', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(8, 'achapmana', 'client', 'achapmana@wordpress.org', '$2y$10$DW.DWy4M25x6Gkvz2ASZlumO7bQHnSpnQygTQ.xKfx8aidxhKN7y.', 'Andrew', 'Chapman', '0 Gale Trail', 83, NULL, '36000', NULL, '', '', '9292275546', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(9, 'cfreeman7', 'client', 'cfreeman7@jimdo.com', '$2y$10$2mBXnXtYgN1duDM26kqVp.t1aO5K5dzyW1v4Ht5Dck8YajQdIAHeW', 'Clarence', 'Freeman', '0621 Spaight Way', 83, NULL, '37000', NULL, '', '', '2822200509', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(10, 'erogers6', 'client', 'erogers6@tamu.edu', '$2y$10$YfSCvwdrLqp68YN/HA.q0.DkyhHYIxGVR1tW239ihxR0hpcXPzPwW', 'Emily', 'Rogers', '969 Parkside Park', 83, NULL, '38000', NULL, '', '', '4589807140', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(11, 'wlittle5', 'client', 'wlittle5@tuttocitta.it', '$2y$10$d5bO8oeumaevHTwoQRDBNOHn31NMOqqoRrbhOCGsGqIhrv69YhF7i', 'Wanda', 'Little', '12 Hauk Place', 83, NULL, '39000', NULL, '', '', '8171047682', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(12, 'rdiaz4', 'client', 'rdiaz4@canalblog.com', '$2y$10$0g0cxsW4peMahP/e8FRvh.OyfEw.Tdnr/vTvIYytjdadI0WQjgISm', 'Rebecca', 'Diaz', '85646 Cottonwood Parkway', 83, NULL, '40000', NULL, '', '', '9211325551', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(13, 'bcastillo3', 'client', 'bcastillo3@deviantart.com', '$2y$10$XhdIeNIXNDMfM3lUh.P7sOVBI8uqk4mLfbT/TGviaNGBHz77trpNK', 'Bonnie', 'Castillo', '30 Acker Center', 83, NULL, '41000', NULL, '', '', '9396412064', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:14', '2016-12-16 16:17:14'),
(14, 'jgomez2', 'client', 'jgomez2@imdb.com', '$2y$10$sqKDVWsf9ihowc/8o/gv5ehljMMHg16ec8zdKNXtenJLH6IG7V/ie', 'Jacqueline', 'Gomez', '08 Towne Place', 83, NULL, '42000', NULL, '', '', '9396412064', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(15, 'kday0', 'client', 'kday0@walmart.com', '$2y$10$9Bv3HwjpchEfE/CDLKdGMOlmS2I7XzugL/d2x7rN2pvp5mEHzmsYu', 'Kathleen', 'Day', '53964 Spenser Trail', 83, NULL, '43000', NULL, '', '', '7732294081', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15'),
(16, 'bcarter1', 'client', 'bcarter1@auda.org.au', '$2y$10$QmbqcfxloWPJxtum4/wAROJzszs2Xqxd6ELbDv0hTNbCN9J3RzfI2', 'Barbara', 'Carter', '697 Jenifer Way', 83, NULL, '44000', NULL, '', '', '8326578470', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-16 16:17:15', '2016-12-16 16:17:15');

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
