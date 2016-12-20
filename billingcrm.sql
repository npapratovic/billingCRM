-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2016 at 03:55 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 2),
(21, 21, 5),
(18, 18, 5);

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
(1, 'Zagreb', 'zagreb', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(2, 'Dugo Selo', 'dugo-selo', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(3, 'Ivanić Grad', 'ivanic-grad', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(4, 'Jastrebarsko', 'jastrebarsko', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(5, 'Samobor', 'samobor', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(6, 'Sveta Nedelja', 'sveta-nedelja', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(7, 'Sveti Ivan Zelina', 'sveti-ivan-zelina', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(8, 'Velika Gorica', 'velika-gorica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(9, 'Vrbovec', 'vrbovec', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(10, 'Zaprešić', 'zapresic', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(11, 'Donja Stubica', 'donja-stubica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(12, 'Klanjec', 'klanjec', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(13, 'Krapina', 'krapina', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(14, 'Oroslavje', 'oroslavje', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(15, 'Pregrada', 'pregrada', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(16, 'Zabok', 'zabok', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(17, 'Zlatar', 'zlatar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(18, 'Glina', 'glina', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(19, 'Hrvatska Kostajnica', 'hrvatska-kostajnica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(20, 'Kutina', 'kutina', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(21, 'Novska', 'novska', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(22, 'Petrinja', 'petrinja', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(23, 'Popovača', 'popovaca', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(24, 'Sisak', 'sisak', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(25, 'Duga Resa', 'duga-resa', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(26, 'Karlovac', 'karlovac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(27, 'Ogulin', 'ogulin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(28, 'Ozalj', 'ozalj', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(29, 'Slunj', 'slunj', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(30, 'Ivanec', 'ivanec', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(31, 'Lepoglava', 'lepoglava', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(32, 'Ludbreg', 'ludbreg', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(33, 'Novi Marof', 'novi-marof', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(34, 'Varaždin', 'varazdin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(35, 'Varaždinske Toplice', 'varazdinske-toplice', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(36, 'Đurđevac', 'durdevac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(37, 'Koprivnica', 'koprivnica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(38, 'Križevci', 'krizevci', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(39, 'Bjelovar', 'bjelovar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(40, 'Čazma', 'cazma', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(41, 'Daruvar', 'daruvar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(42, 'Garešnica', 'garesnica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(43, 'Grubišno Polje', 'grubisno-polje', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(44, 'Bakar', 'bakar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(45, 'Cres', 'cres', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(46, 'Crikvenica', 'crikvenica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(47, 'Čabar', 'cabar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(48, 'Delnice', 'delnice', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(49, 'Kastav', 'kastav', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(50, 'Kraljevica', 'kraljevica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(51, 'Krk', 'krk', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(52, 'Mali Lošinj', 'mali-losinj', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(53, 'Novi Vinodolski', 'novi-vinodolski', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(54, 'Opatija', 'opatija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(55, 'Rab', 'rab', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(56, 'Rijeka', 'rijeka', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(57, 'Vrbovsko', 'vrbovsko', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(58, 'Gospić', 'gospic', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(59, 'Novalja', 'novalja', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(60, 'Otočac', 'otocac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(61, 'Senj', 'senj', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(62, 'Orahovica', 'orahovica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(63, 'Slatina', 'slatina', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(64, 'Virovitica', 'virovitica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(65, 'Kutjevo', 'kutjevo', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(66, 'Lipik', 'lipik', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(67, 'Pakrac', 'pakrac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(68, 'Pleternica', 'pleternica', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(69, 'Požega', 'pozega', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(70, 'Nova gradiška', 'nova-gradiska', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(71, 'Slavonski Brod', 'slavonski-brod', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(72, 'Benkovac', 'benkovac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(73, 'Biograd na Moru', 'biograd-na-moru', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(74, 'Nin', 'nin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(75, 'Obrovac', 'obrovac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(76, 'Pag', 'pag', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(77, 'Zadar', 'zadar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(78, 'Beli Manastir', 'beli-manastir', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(79, 'Belišće', 'belisce', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(80, 'Donji Miholjac', 'donji-miholjac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(81, 'Đakovo', 'dakovo', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(82, 'Našice', 'nasice', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(83, 'Osijek', 'osijek', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(84, 'Valpovo', 'valpovo', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(85, 'Drniš', 'drnis', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(86, 'Knin', 'knin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(87, 'Skradin', 'skradin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(88, 'Šibenik', 'sibenik', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(89, 'Vodice', 'vodice', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(90, 'Ilok', 'ilok', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(91, 'Otok', 'otok', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(92, 'Vinkovci', 'vinkovci', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(93, 'Vukovar', 'vukovar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(94, 'Županja', 'zupanja', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(95, 'Hvar', 'hvar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(96, 'Imotski', 'imotski', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(97, 'Kaštela', 'kastela', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(98, 'Komiža', 'komiza', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(99, 'Makarska', 'makarska', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(100, 'Omiš', 'omis', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(101, 'Sinj', 'sinj', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(102, 'Solin', 'solin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(103, 'Split', 'split', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(104, 'Stari Grad', 'stari-grad', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(105, 'Supetar', 'supetar', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(106, 'Trilj', 'trilj', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(107, 'Trogir', 'trogir', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(108, 'Vis', 'vis', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(109, 'Vrgorac', 'vrgorac', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(110, 'Vrlika', 'vrlika', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(111, 'Buje-Buie', 'buje-buie', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(112, 'Buzet', 'buzet', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(113, 'Labin', 'labin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(114, 'Novigrad', 'novigrad', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(115, 'Pazin', 'pazin', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(116, 'Poreč', 'porec', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(117, 'Pula', 'pula', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(118, 'Rovinj', 'rovinj', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(119, 'Umag', 'umag', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(120, 'Vodnjan', 'vodnjan', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(121, 'Dubrovnik', 'dubrovnik', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(122, 'Korčula', 'korcula', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(123, 'Metković', 'metkovic', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(124, 'Opuzen', 'opuzen', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(125, 'Ploče', 'ploce', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(126, 'Čakovec', 'cakovec', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(127, 'Mursko Središće', 'mursko-sredisce', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(128, 'Prelog', 'prelog', '2016-12-19 14:34:00', '2016-12-19 14:34:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `imported_order_products`
--

INSERT INTO `imported_order_products` (`id`, `subtotal`, `subtotal_tax`, `total`, `total_tax`, `price`, `quantity`, `tax_class`, `name`, `product_id`, `sku`, `existing`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '35.00', '0.00', '35.00', '0.00', '35.00', 1, NULL, 'Aventurin - privjesak', '786', NULL, 0, 'imported', '2016-12-19 16:07:45', '2016-12-19 16:07:45', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `client_id`, `employee_id`, `invoice_type`, `tax`, `address`, `cityname`, `payment_way`, `invoice_date`, `invoice_date_deadline`, `invoice_date_ship`, `invoice_note`, `intern_note`, `repeat_invoice`, `invoice_language`, `valute`, `from_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 18, 1, 'R', 0, '', '', 'virman', '2016-12-19', '2016-12-26', '2016-12-26', '', '', 0, 'croatian', '', NULL, '2016-12-19 15:53:41', '2016-12-19 16:41:36', '2016-12-19 16:41:36'),
(2, 877, 21, 1, 'R', 0, '', 'Osijek', 'virman', '2016-12-19', '0000-00-00', '0000-00-00', '', '', 0, 'croatian', '0', 1, '2016-12-19 16:10:10', '2016-12-19 16:41:33', '2016-12-19 16:41:33'),
(3, 877, 21, 1, 'R', 0, '', 'Osijek', 'virman', '2016-12-19', '0000-00-00', '0000-00-00', '', '', 0, 'croatian', '0', 1, '2016-12-19 16:41:23', '2016-12-19 16:41:49', NULL),
(4, 877, 21, 1, 'N', 0, '', 'Osijek', 'cod', '2016-12-19', '0000-00-00', '0000-00-00', '', '', 0, 'croatian', '0', 1, '2016-12-19 16:45:45', '2016-12-19 16:45:45', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `invoices_products`
--

INSERT INTO `invoices_products` (`id`, `invoice_id`, `product_id`, `measurement`, `amount`, `price`, `discount`, `taxpercent`, `imported`, `created_at`, `updated_at`) VALUES
(1, 1, 18, 'hour', 75, 75.00, 0.00, 0.00, 0, '2016-12-19 15:53:41', '2016-12-19 15:53:41'),
(3, 2, 18, 'piece', 10, 75.00, 0.00, 0.00, 0, '2016-12-19 16:11:44', '2016-12-19 16:11:44'),
(4, 2, 1, '0', 1, 35.00, 0.00, 0.00, 1, '2016-12-19 16:11:44', '2016-12-19 16:11:44'),
(7, 3, 1, '0', 1, 35.00, 0.00, 0.00, 1, '2016-12-19 16:43:17', '2016-12-19 16:43:17'),
(8, 4, 1, '0', 1, 0.00, 0.00, 0.00, 1, '2016-12-19 16:45:45', '2016-12-19 16:45:45');

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
(1, 'en', 'English', NULL, '2016-12-19 14:33:59', '2016-12-19 14:33:59'),
(2, 'hr', 'Croatian', 'Hrvatski', '2016-12-19 14:33:59', '2016-12-19 14:33:59'),
(3, 'de', 'German', 'Deutsch', '2016-12-19 14:33:59', '2016-12-19 14:33:59');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `employee_id`, `price`, `shipping_way`, `payment_way`, `payment_status`, `cityname`, `billing_address`, `shipping_address`, `note`, `order_date`, `show_only`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '877', 21, 1, 35.00, 'Dostava', 'cod', 'processing', 'Osijek', 'Vijenac Gorana Zobundžije 16', 'Vijenac Gorana Zobundžije 16', '', '2016-12-19 16:08:02', 1, '2016-12-19 16:08:02', '2016-12-19 16:08:02', NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 35.00, '2016-12-19 17:07:45', '2016-12-19 17:07:45');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=807 ;

--
-- Dumping data for table `products_services`
--

INSERT INTO `products_services` (`id`, `product_id`, `title`, `permalink`, `product_type`, `image`, `intro`, `content`, `visibility`, `stock_status`, `total_sales`, `downloadable`, `virtual`, `regular_price`, `sale_price`, `purchase_note`, `featured`, `weight`, `length`, `width`, `height`, `status`, `sku`, `price`, `sold_individually`, `manage_stock`, `backorders`, `stock`, `existing`, `measurement`, `amount`, `discount`, `tax`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(799, 0, 'Nefrit - Žad - privjesak', 'http://zlatnazora.hr/webshop/proizvod/nefrit-zad-privjesak/', '1', NULL, '', '<p>Nefrit - Žad je zelene boje ali može biti i žute, smeđe, ružičast. Daje smirenost, štiti živčani sustav, jača naše tijelo i štiti nas od mentalnih i fizičkih oboljenja. Štiti djecu od bolesti, donosi sreću bračnim parovima. Žad je simbol mira, sreće i prosperiteta. Naziva se i kamen ljubavi. Pomaže u ostvarivanju želja i privlači sreću.<br />\nUpotrebljava se za liječenje bolesnih bubrega, reumatskih bolesti, te svih bolesti unutarnjih organa.</p>\n', '1', 1, 1, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 13:29:00', '2016-06-28 13:42:02', NULL),
(803, 0, 'Lapis', 'http://zlatnazora.hr/webshop/proizvod/lapis/', '1', NULL, '', '<p>On je plave boje prošaran sa zlatnim i srebrnim točkicama. Osobe koje imaju problema s javnim nastupom ili govorom trebali bi nositi nakit od Lapisa. On je simbol jedinstva i prijateljstva. Potiče kreativnost, oslobađa intuiciju te pridonosi duhovnom miru i stabilnosti.<br />\nKoristi se prilikom problema s grlom, regulira rad hormona te tlak. Pomaže kod problema s disanjem, smanjuje stres i bol.</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 1.00, 'publish', 0, 19.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 13:45:26', '2016-06-28 13:54:12', NULL),
(806, 0, 'Citrin', 'http://zlatnazora.hr/webshop/proizvod/citrin/', '1', NULL, '', '<p>Citrin je kristal proziran i žute boje. To je boja solarne čakre pa citrin najbolje balansira taj energetski čvor. Djeluje smirujuće na osjećaje, ublažava ljubomoru. Pomaže kontroli vlastitih osjećaja te pročišćava emocionalne blokade, suzbija bijes.<br />\nRegulira poremećaje u želudcu, utječe na rad štitnjače te na proizvodnju inzulina (dobar za dijabetičare), usklađuje hormone i smanjuje zamor. Pomaže kod loše cirkulacije.</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 1.00, 'publish', 0, 19.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 13:51:16', '2016-06-28 13:53:31', NULL),
(18, 0, 'Uređivanje web stranice', '', NULL, NULL, 'Uređivanje web stranice', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75.00, NULL, NULL, NULL, NULL, NULL, 'hour', 1, 0.00, 0.00, 'service', '2016-12-19 15:52:59', '2016-12-19 15:52:59', NULL),
(795, 0, 'Citrin - privjesak', 'http://zlatnazora.hr/webshop/proizvod/citrin-privjesak/', '1', NULL, '', '<p>Citrin je kristal proziran i žute boje. To je boja solarne čakre pa citrin najbolje balansira taj energetski čvor. Djeluje smirujuće na osjećaje, ublažava ljubomoru. Pomaže kontroli vlastitih osjećaja te pročišćava emocionalne blokade, suzbija bijes.<br />\nRegulira poremećaje u želudcu, utječe na rad štitnjače te na proizvodnju inzulina (dobar za dijabetičare),usklađuje hormone i smanjuje zamor. Pomaže kod loše cirkulacije.</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 13:16:49', '2016-06-28 13:16:49', NULL),
(793, 0, 'Gorski kristal - privjesak', 'http://zlatnazora.hr/webshop/proizvod/gorski-kristal-privjesak/', '1', NULL, '', '<p>Gorski kristal (kvarc) pojačava energiju i iscjeljenje. Prozirne je boje a sjaji u duginim bojama. On je izvor snage i pojačava energetska djelovanja. Pročišćava i jača organe, donosi čistoću uma, otklanja štetna zračenja. Djeluje pozitivno na izgradnju aure – šesta čakra ili treće oko.<br />\nDjeluje na poboljšanje koncentracije, protiv glavobolje (staviti na sljepoočnicu), djeluje pozitivno na san, iznenadne bolove.</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 13:12:51', '2016-06-28 13:17:19', NULL),
(789, 0, 'Karneol - privjesak', 'http://zlatnazora.hr/webshop/proizvod/karneol-privjesak/', '1', NULL, '', '<p>Karneol je kamen narančaste do žute te crvene do smeđe-crvene boje. Djelomično je prugast, svilenkastog sjaja. Kamen za postizanje mira i harmonije i za oslobađanje od depresije. Nosi se kao nakit jer smiruje bijes, ljubomoru te mržnju i zavist. Pomaže u karijeri i realizaciji svojih planova. Daje energiju, snagu, hrabrost te nam pomaže da se riješimo strahova.<br />\nSnižava šećer u krvi, pročišćava krvi, daje više fizičke energije te vitalnost.</p>\n', '1', 1, 1, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 13:08:23', '2016-06-28 13:08:23', NULL),
(786, 0, 'Aventurin - privjesak', 'http://zlatnazora.hr/webshop/proizvod/aventurin-privjesak/', '1', NULL, '', '<p>Aventurin djeluje na srčanu čakru to znači na sve poremećaje vezane uz rad srca. U vaš život donosi radost, entuzijazam, pomaže vam u odlukama a također daje vam kreativnost. Bitan je za karijeru i prosperitet.<br />\nDjeluje na sve probleme za rad srca, iritiranu te oboljelu kožu. Također liječi akutne upale očiju te tjeme kose. Potiče regeneraciju tkiva. Djeluje umirujuće i sprečava potištenost.</p>\n', '1', 1, 2, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 13:01:56', '2016-06-28 13:01:56', NULL),
(784, 0, 'Amazonit - privjesak', 'http://zlatnazora.hr/webshop/proizvod/784/', '1', NULL, '', '<p>Amazonit je kamen nade i donosi sreću i ostvarivanje snova i želja. Boja amazonita je blijedo-azurno-zelena, staklastog sjaja.<br />\nNosi se kao nakit protiv zračenja mobilnog telefona, kod <a id="g0" class="promijenjenaRijec" name="greska"></a>osteoporoze. Smanjuje strah i zabrinutost.</p>\n', '1', 1, 1, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 12:55:32', '2016-06-28 12:57:33', NULL),
(781, 0, 'Ocean Jaspis - privjesak', 'http://zlatnazora.hr/webshop/proizvod/ocean-jaspis-privjesak/', '1', NULL, '', '<p>To je kamen koji djeluje umirujuće. Donosi mir, blaženstvo i smirivanje. Pomaže kod rješavanja teških situacija. Treba ga nositi kao nakit jer stimulira brzo razmišljanje, maštu i donosi dobre organizacijske sposobnosti.<br />\nPomaže u liječenju svih čakri. Ublažava bolove kod menopauze, čira na želucu, bolesti trbuha, kašlja, mučnine, neplodnosti. Sprečava celulit, hrkanje, jača cijeli imunitet, snižava temperaturu te pomaže kod mnogih drugih problema.</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 12:51:22', '2016-06-28 12:51:22', NULL),
(779, 0, 'Jaspis - privjesak', 'http://zlatnazora.hr/webshop/proizvod/jaspis-privjesak/', '1', NULL, '', '<p>Jaspis daje mentalnu jasnoću, pomaže pri fokusiranju na bitne stvari u životu te da postanemo iskreni sami sa sobom. Vezan je za prvu čakru. Može biti crven, bež, smeđi, prošarani točkicama ili prugicama.<br />\nJaspis je dobar za liječenje hunjavice, začepljenog nosa, prehlade, sinuse, zubobolju, išijas i reumu. Djeluje na fizičku snagu , zacjeljuje rane te pročišćava krv.</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 12:43:20', '2016-06-28 12:45:00', NULL),
(777, 0, 'Ružičasti kvarc (rozenkvarc) - privjesak', 'http://zlatnazora.hr/webshop/proizvod/ruzicasti-kvarc-rozenkvarc-privjesak/', '1', NULL, '', '<p>Ružičasti kvarc (rozenkvarc)<br />\nRužičasti kvarc je najvažniji kristal za srce i srčanu čakru. Upotrebljava se za smirivanje, dobar san. Može biti blijede boje do izrazito ružičaste, mutan. Potiče kreativnost u likovnoj umjetnosti, glazbi. Oslobađa boli i tuge.<br />\nRužičasti kvarc jača srce, ublažava srčane tegobe, povećava plodnost. Stavlja se pod jastuk za dobar san. Smiruje nervozu.</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 12:36:42', '2016-06-28 12:44:21', NULL),
(773, 0, 'Tigrovo oko - privjesak', 'http://zlatnazora.hr/webshop/proizvod/tigrovo-oko-privjesak/', '1', NULL, '', '<p><a href="http://zlatnazora.hr/redizajn/wp-content/uploads/2016/06/TigrovoOko_780x780.jpg"><br />\n</a> <a href="http://zlatnazora.hr/redizajn/wp-content/uploads/2016/06/TigrovoOko_350x350.jpg"><br />\n</a>Tigrovo oko je zlatnožute do smeđe boje koja se prelijeva. Pojačava životnu energiju, pruža podršku kod novih početaka i ponovnog uspostavljanja harmonije u životu. Štiti prilikom putovanja, pojačava sigurnost i samopoštovanje. Nosi se kao privjesak koji štiti od uroka.<br />\nNajbolje odgovara organima vezanim uz treću čakru, solarni pleksus. Ima utjecaj na jetru, gušteraču, žuč te želudac. Također liječi duševne bolesti i glavobolje. Potiče talent i pomaže kod zarastanja kostiju (prijeloma).</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 0.01, 1.00, 1.00, 2.00, 'publish', 0, 35.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-28 12:26:34', '2016-06-28 12:37:58', NULL),
(771, 0, 'Knjiga - Tarot kao profesija, Vesna Burcsa', 'http://zlatnazora.hr/webshop/proizvod/knjiga-tarot-kao-profesija-vesna-burcsa/', '1', NULL, '', '<p>Zanimaju Vas tajne tarota?<br />\nOva knjiga, <strong>Tarot kao profesija</strong>, udžbenik je tarota i jedina knjiga o tarotu koju ćete ikad trebati! Knjiga se koristi kao detaljna podloga za sve koji se žele baviti tarotom, na bilo kojoj razini. Luksuzno je izdanje u tvrdom uvezu s ilustracijama karata u boji na kvalitetnom papiru.</p>\n<p>Tarot kao profesija sadrži:</p>\n<ul>\n<li>pregled povijesti tarota</li>\n<li>značenja tarota</li>\n<li>slike i detaljne opise svih 78 karata</li>\n<li>metode rada u tarotu</li>\n</ul>\n<p>Savladavanjem znanja iz knjige Tarot kao profesija na pola ste puta da ostvarite novu karijeru i postanete tumač tarota.</p>\n<p>Knjiga: Tarot kao profesija<br />\nAutor: Vesna Burcsa<br />\nTvrdi uvez<br />\n146 stranica<br />\n78 ilustracija</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, 1.40, 24.00, 17.00, 6.00, 'publish', 0, 299.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-13 12:07:25', '2016-06-28 14:09:56', NULL),
(757, 0, 'Svijeća horoskopski znak - Mediano', 'http://zlatnazora.hr/webshop/proizvod/svijeca-horoskopski-znak-mediano/', '1', NULL, '', '<p>Svijeće s horoskopskim znakom i vremenom gorenja cca 70 sati.</p>\n<p>&nbsp;</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, NULL, 0.00, 0.00, 0.00, 'publish', 0, 0.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-13 11:28:09', '2016-06-13 11:39:20', NULL),
(705, 0, 'Svijeća horoskopski znak - Grande', 'http://zlatnazora.hr/webshop/proizvod/svijeca-horoskopski-znak/', '1', NULL, '', '<p>Svijeće s horoskopskim znakom i vremenom gorenja cca 90 sati.</p>\n<p>&nbsp;</p>\n', '1', 1, 0, 0, 0, NULL, NULL, '1', 0, NULL, 0.00, 0.00, 0.00, 'publish', 0, 0.00, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 'product', '2016-06-13 06:52:12', '2016-06-13 11:44:01', NULL);

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
(1, 'Zagrebačka županija', 'zagrebacka-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(2, 'Krapinsko-zagorska županija', 'krapinsko-zagorska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(3, 'Sisačko-moslavačka županija', 'sisacko-moslavacka-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(4, 'Karlovačka županija', 'karlovacka-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(5, 'Varaždinska županija', 'varazdinska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(6, 'Koprivničko-križevačka županija', 'koprivnicko-krizevacka-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(7, 'Bjelovarsko-bilogorska županija', 'bjelovarsko-bilogorska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(8, 'Primorsko-goranska županija', 'primorsko-goranska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(9, 'Ličko-senjska županija', 'licko-senjska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(10, 'Virovitičko-podravska županija', 'viroviticko-podravska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(11, 'Požeško-slavonska županija', 'pozesko-slavonska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(12, 'Brodsko-posavska županija', 'brodsko-posavska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(13, 'Zadarska županija', 'zadarska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(14, 'Osječko-baranjska županija', 'osjecko-baranjska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(15, 'Šibensko-kninska županija', 'sibensko-kninska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(16, 'Vukovarsko-srijemska županija', 'vukovarsko-srijemska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(17, 'Splitsko-dalmatinska županija', 'splitsko-dalmatinska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(18, 'Istarska županija', 'istarska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(19, 'Dubrovačko-neretvanska županija', 'dubrovacko-neretvanska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(20, 'Međimurska županija', 'medimurska-zupanija', '2016-12-19 14:34:00', '2016-12-19 14:34:00'),
(21, 'Grad Zagreb', 'grad-zagreb', '2016-12-19 14:34:00', '2016-12-19 14:34:00');

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
(1, 'superadmin', '2016-12-19 14:33:59', '2016-12-19 14:33:59'),
(2, 'admin', '2016-12-19 14:33:59', '2016-12-19 14:33:59'),
(3, 'manager', '2016-12-19 14:33:59', '2016-12-19 14:33:59'),
(4, 'employee', '2016-12-19 14:33:59', '2016-12-19 14:33:59'),
(5, 'user', '2016-12-19 14:33:59', '2016-12-19 14:33:59'),
(6, 'anonymous', '2016-12-19 14:33:59', '2016-12-19 14:33:59');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_group`, `email`, `password`, `first_name`, `last_name`, `address`, `city`, `mjesto`, `zip`, `country`, `fax`, `mobile`, `phone`, `web`, `iban`, `note`, `region`, `image`, `oib`, `company_name`, `client_type`, `remember_token`, `verify_code`, `language`, `consumer_key`, `consumer_secret`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', '$2y$10$rrd73qrxS0u.v8fbjmcgi.ESOB.l7MLvT7bUW.rmIv4OA2MTxfAz6', 'Ivan', 'Horvat', 'Sunčana ulica 365', 83, NULL, NULL, NULL, '', '', '0959039610', '', '', NULL, 14, '', NULL, NULL, NULL, 'U0Q4MVx8eDU5uSifwAOqqoBYRzwZLDbGTxTARklI4EiIsyUxgYa7uzESZvZV', NULL, 1, '', '', NULL, '2016-12-19 14:33:59', '2016-12-19 15:47:34'),
(21, '', 'client', 'nikola.papratovic@culex.hr', '', 'Nikola', 'Papratović', 'asdf', 1, '14', '31000', '14', '0', '123098456', '987654321', 'http://mojawebstranica.com', 'iban', 'Podaci iz WordPress stranice', 0, '', '1', 'asdf', '1', NULL, NULL, 1, '', '', NULL, '2016-12-19 16:05:04', '2016-12-19 16:05:04'),
(18, '', 'client', 'nikola.papratovic@gmail.com', '', 'Nikola', 'Papratović', 'Zelena ulica 3651', 1, 'Osijek', '31000', 'Hrvatska', '', '0959039610', '', '', '', '', 0, '', '', '', 'bez oznake', NULL, NULL, 1, '', '', NULL, '2016-12-19 15:50:17', '2016-12-19 15:50:17');

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
