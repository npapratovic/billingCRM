-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2016 at 01:57 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billingcrm`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 2),
(2, 2, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=129 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagreb', 'zagreb', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(2, 'Dugo Selo', 'dugo-selo', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(3, 'Ivanić Grad', 'ivanic-grad', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(4, 'Jastrebarsko', 'jastrebarsko', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(5, 'Samobor', 'samobor', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(6, 'Sveta Nedelja', 'sveta-nedelja', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(7, 'Sveti Ivan Zelina', 'sveti-ivan-zelina', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(8, 'Velika Gorica', 'velika-gorica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(9, 'Vrbovec', 'vrbovec', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(10, 'Zaprešić', 'zapresic', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(11, 'Donja Stubica', 'donja-stubica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(12, 'Klanjec', 'klanjec', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(13, 'Krapina', 'krapina', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(14, 'Oroslavje', 'oroslavje', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(15, 'Pregrada', 'pregrada', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(16, 'Zabok', 'zabok', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(17, 'Zlatar', 'zlatar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(18, 'Glina', 'glina', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(19, 'Hrvatska Kostajnica', 'hrvatska-kostajnica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(20, 'Kutina', 'kutina', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(21, 'Novska', 'novska', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(22, 'Petrinja', 'petrinja', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(23, 'Popovača', 'popovaca', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(24, 'Sisak', 'sisak', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(25, 'Duga Resa', 'duga-resa', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(26, 'Karlovac', 'karlovac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(27, 'Ogulin', 'ogulin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(28, 'Ozalj', 'ozalj', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(29, 'Slunj', 'slunj', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(30, 'Ivanec', 'ivanec', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(31, 'Lepoglava', 'lepoglava', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(32, 'Ludbreg', 'ludbreg', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(33, 'Novi Marof', 'novi-marof', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(34, 'Varaždin', 'varazdin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(35, 'Varaždinske Toplice', 'varazdinske-toplice', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(36, 'Đurđevac', 'durdevac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(37, 'Koprivnica', 'koprivnica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(38, 'Križevci', 'krizevci', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(39, 'Bjelovar', 'bjelovar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(40, 'Čazma', 'cazma', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(41, 'Daruvar', 'daruvar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(42, 'Garešnica', 'garesnica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(43, 'Grubišno Polje', 'grubisno-polje', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(44, 'Bakar', 'bakar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(45, 'Cres', 'cres', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(46, 'Crikvenica', 'crikvenica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(47, 'Čabar', 'cabar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(48, 'Delnice', 'delnice', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(49, 'Kastav', 'kastav', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(50, 'Kraljevica', 'kraljevica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(51, 'Krk', 'krk', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(52, 'Mali Lošinj', 'mali-losinj', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(53, 'Novi Vinodolski', 'novi-vinodolski', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(54, 'Opatija', 'opatija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(55, 'Rab', 'rab', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(56, 'Rijeka', 'rijeka', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(57, 'Vrbovsko', 'vrbovsko', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(58, 'Gospić', 'gospic', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(59, 'Novalja', 'novalja', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(60, 'Otočac', 'otocac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(61, 'Senj', 'senj', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(62, 'Orahovica', 'orahovica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(63, 'Slatina', 'slatina', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(64, 'Virovitica', 'virovitica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(65, 'Kutjevo', 'kutjevo', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(66, 'Lipik', 'lipik', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(67, 'Pakrac', 'pakrac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(68, 'Pleternica', 'pleternica', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(69, 'Požega', 'pozega', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(70, 'Nova gradiška', 'nova-gradiska', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(71, 'Slavonski Brod', 'slavonski-brod', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(72, 'Benkovac', 'benkovac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(73, 'Biograd na Moru', 'biograd-na-moru', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(74, 'Nin', 'nin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(75, 'Obrovac', 'obrovac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(76, 'Pag', 'pag', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(77, 'Zadar', 'zadar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(78, 'Beli Manastir', 'beli-manastir', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(79, 'Belišće', 'belisce', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(80, 'Donji Miholjac', 'donji-miholjac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(81, 'Đakovo', 'dakovo', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(82, 'Našice', 'nasice', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(83, 'Osijek', 'osijek', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(84, 'Valpovo', 'valpovo', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(85, 'Drniš', 'drnis', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(86, 'Knin', 'knin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(87, 'Skradin', 'skradin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(88, 'Šibenik', 'sibenik', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(89, 'Vodice', 'vodice', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(90, 'Ilok', 'ilok', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(91, 'Otok', 'otok', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(92, 'Vinkovci', 'vinkovci', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(93, 'Vukovar', 'vukovar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(94, 'Županja', 'zupanja', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(95, 'Hvar', 'hvar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(96, 'Imotski', 'imotski', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(97, 'Kaštela', 'kastela', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(98, 'Komiža', 'komiza', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(99, 'Makarska', 'makarska', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(100, 'Omiš', 'omis', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(101, 'Sinj', 'sinj', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(102, 'Solin', 'solin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(103, 'Split', 'split', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(104, 'Stari Grad', 'stari-grad', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(105, 'Supetar', 'supetar', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(106, 'Trilj', 'trilj', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(107, 'Trogir', 'trogir', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(108, 'Vis', 'vis', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(109, 'Vrgorac', 'vrgorac', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(110, 'Vrlika', 'vrlika', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(111, 'Buje-Buie', 'buje-buie', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(112, 'Buzet', 'buzet', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(113, 'Labin', 'labin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(114, 'Novigrad', 'novigrad', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(115, 'Pazin', 'pazin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(116, 'Poreč', 'porec', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(117, 'Pula', 'pula', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(118, 'Rovinj', 'rovinj', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(119, 'Umag', 'umag', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(120, 'Vodnjan', 'vodnjan', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(121, 'Dubrovnik', 'dubrovnik', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(122, 'Korčula', 'korcula', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(123, 'Metković', 'metkovic', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(124, 'Opuzen', 'opuzen', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(125, 'Ploče', 'ploce', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(126, 'Čakovec', 'cakovec', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(127, 'Mursko Središće', 'mursko-sredisce', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(128, 'Prelog', 'prelog', '2016-12-24 12:52:14', '2016-12-24 12:52:14');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches`
--

CREATE TABLE IF NOT EXISTS `dispatches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dispatch_number` int(11) NOT NULL,
  `taxable` int(11) NOT NULL,
  `hide_amount` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
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
  PRIMARY KEY (`id`),
  KEY `dispatches_client_id_foreign` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches_products`
--

CREATE TABLE IF NOT EXISTS `dispatches_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dispatch_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dispatches_products_dispatch_id_foreign` (`dispatch_id`),
  KEY `dispatches_products_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches_services`
--

CREATE TABLE IF NOT EXISTS `dispatches_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dispatch_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dispatches_services_dispatch_id_foreign` (`dispatch_id`),
  KEY `dispatches_services_service_id_foreign` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `product_id` int(10) unsigned NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `existing` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imported_order_products_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_number` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `employee_id` int(10) unsigned NOT NULL,
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
  PRIMARY KEY (`id`),
  KEY `invoices_client_id_foreign` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `iso_tag`, `language`, `local_name`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', NULL, '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(2, 'hr', 'Croatian', 'Hrvatski', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(3, 'de', 'German', 'Deutsch', '2016-12-24 12:52:14', '2016-12-24 12:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `client_id` int(10) unsigned NOT NULL,
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
  PRIMARY KEY (`id`),
  KEY `narudzbenice_client_id_foreign` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice_products`
--

CREATE TABLE IF NOT EXISTS `narudzbenice_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `narudzbenica_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `narudzbenice_products_narudzbenica_id_foreign` (`narudzbenica_id`),
  KEY `narudzbenice_products_product_id_foreign` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagrebačka županija', 'zagrebacka-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(2, 'Krapinsko-zagorska županija', 'krapinsko-zagorska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(3, 'Sisačko-moslavačka županija', 'sisacko-moslavacka-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(4, 'Karlovačka županija', 'karlovacka-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(5, 'Varaždinska županija', 'varazdinska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(6, 'Koprivničko-križevačka županija', 'koprivnicko-krizevacka-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(7, 'Bjelovarsko-bilogorska županija', 'bjelovarsko-bilogorska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(8, 'Primorsko-goranska županija', 'primorsko-goranska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(9, 'Ličko-senjska županija', 'licko-senjska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(10, 'Virovitičko-podravska županija', 'viroviticko-podravska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(11, 'Požeško-slavonska županija', 'pozesko-slavonska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(12, 'Brodsko-posavska županija', 'brodsko-posavska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(13, 'Zadarska županija', 'zadarska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(14, 'Osječko-baranjska županija', 'osjecko-baranjska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(15, 'Šibensko-kninska županija', 'sibensko-kninska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(16, 'Vukovarsko-srijemska županija', 'vukovarsko-srijemska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(17, 'Splitsko-dalmatinska županija', 'splitsko-dalmatinska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(18, 'Istarska županija', 'istarska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(19, 'Dubrovačko-neretvanska županija', 'dubrovacko-neretvanska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(20, 'Međimurska županija', 'medimurska-zupanija', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(21, 'Grad Zagreb', 'grad-zagreb', '2016-12-24 12:52:14', '2016-12-24 12:52:14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(2, 'admin', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(3, 'manager', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(4, 'employee', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(5, 'user', '2016-12-24 12:52:14', '2016-12-24 12:52:14'),
(6, 'anonymous', '2016-12-24 12:52:14', '2016-12-24 12:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  KEY `users_language_foreign` (`language`),
  KEY `users_city_foreign` (`city`),
  KEY `users_region_foreign` (`region`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_group`, `email`, `password`, `first_name`, `last_name`, `address`, `city`, `mjesto`, `zip`, `country`, `fax`, `mobile`, `phone`, `web`, `iban`, `note`, `region`, `image`, `oib`, `company_name`, `client_type`, `remember_token`, `verify_code`, `language`, `consumer_key`, `consumer_secret`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', '$2y$10$diIfK5FFmpRqQFo71YH15enCN.HqlX3WUnTxb0IOAs2nTxKhneixO', 'Ivan', 'Horvat', 'Sunčana ulica 365', 83, NULL, NULL, NULL, '', '', '0959039610', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-24 12:52:15', '2016-12-24 12:52:15'),
(2, 'jbarnese', 'client', 'jbarnese@blogger.com', '$2y$10$6F3U12ZixBnHkQxAs2nNwuVKYzlXKbOgG7xFDKuv/Vr41Q3f.uhhq', 'Joyce', 'Barnese', '56 Sherman Lane', 83, NULL, '30000', NULL, '', '', '8912824968', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-24 12:52:15', '2016-12-24 12:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `workingorders`
--

CREATE TABLE IF NOT EXISTS `workingorders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workingorder_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taxable` int(11) NOT NULL,
  `hide_amount` int(11) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
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
  PRIMARY KEY (`id`),
  KEY `workingorders_client_id_foreign` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `workingorders_services`
--

CREATE TABLE IF NOT EXISTS `workingorders_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `workingorder_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `workingorders_services_workingorder_id_foreign` (`workingorder_id`),
  KEY `workingorders_services_service_id_foreign` (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dispatches`
--
ALTER TABLE `dispatches`
  ADD CONSTRAINT `dispatches_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `dispatches_products`
--
ALTER TABLE `dispatches_products`
  ADD CONSTRAINT `dispatches_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_services` (`id`),
  ADD CONSTRAINT `dispatches_products_dispatch_id_foreign` FOREIGN KEY (`dispatch_id`) REFERENCES `dispatches` (`id`);

--
-- Constraints for table `dispatches_services`
--
ALTER TABLE `dispatches_services`
  ADD CONSTRAINT `dispatches_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `products_services` (`id`),
  ADD CONSTRAINT `dispatches_services_dispatch_id_foreign` FOREIGN KEY (`dispatch_id`) REFERENCES `dispatches` (`id`);

--
-- Constraints for table `imported_order_products`
--
ALTER TABLE `imported_order_products`
  ADD CONSTRAINT `imported_order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `invoices_products` (`product_id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `invoices_products`
--
ALTER TABLE `invoices_products`
  ADD CONSTRAINT `invoices_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_services` (`id`),
  ADD CONSTRAINT `invoices_products_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Constraints for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  ADD CONSTRAINT `narudzbenice_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `narudzbenice_products`
--
ALTER TABLE `narudzbenice_products`
  ADD CONSTRAINT `narudzbenice_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_services` (`id`),
  ADD CONSTRAINT `narudzbenice_products_narudzbenica_id_foreign` FOREIGN KEY (`narudzbenica_id`) REFERENCES `narudzbenice` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`);

--
-- Constraints for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD CONSTRAINT `products_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `products_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_services` (`id`);

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `products_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_services` (`id`);

--
-- Constraints for table `products_tags`
--
ALTER TABLE `products_tags`
  ADD CONSTRAINT `products_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `products_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_services` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_region_foreign` FOREIGN KEY (`region`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `users_city_foreign` FOREIGN KEY (`city`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `users_language_foreign` FOREIGN KEY (`language`) REFERENCES `languages` (`id`);

--
-- Constraints for table `workingorders`
--
ALTER TABLE `workingorders`
  ADD CONSTRAINT `workingorders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `workingorders_services`
--
ALTER TABLE `workingorders_services`
  ADD CONSTRAINT `workingorders_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `products_services` (`id`),
  ADD CONSTRAINT `workingorders_services_workingorder_id_foreign` FOREIGN KEY (`workingorder_id`) REFERENCES `workingorders` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
