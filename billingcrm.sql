-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 06:04 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billingcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `permalink`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1. attribute', '1-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(2, '2. attribute', '2-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(3, '3. attribute', '3-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(4, '4. attribute', '4-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(5, '5. attribute', '5-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(6, '6. attribute', '6-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(7, '7. attribute', '7-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(8, '8. attribute', '8-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(9, '9. attribute', '9-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(10, '10. attribute', '10-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(11, '11. attribute', '11-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(12, '12. attribute', '12-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(13, '13. attribute', '13-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(14, '14. attribute', '14-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(15, '15. attribute', '15-attribute', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `permalink`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1. category', '1-category', '1. description', '/uploads/frontend/category/hotdog.jpg', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(2, '2. category', '2-category', '2. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(3, '3. category', '3-category', '3. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(4, '4. category', '4-category', '4. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(5, '5. category', '5-category', '5. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(6, '6. category', '6-category', '6. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(7, '7. category', '7-category', '7. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(8, '8. category', '8-category', '8. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(9, '9. category', '9-category', '9. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(10, '10. category', '10-category', '10. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(11, '11. category', '11-category', '11. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(12, '12. category', '12-category', '12. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(13, '13. category', '13-category', '13. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(14, '14. category', '14-category', '14. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(15, '15. category', '15-category', '15. description', NULL, '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagreb', 'zagreb', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(2, 'Dugo Selo', 'dugo-selo', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(3, 'Ivanić Grad', 'ivanic-grad', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(4, 'Jastrebarsko', 'jastrebarsko', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(5, 'Samobor', 'samobor', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(6, 'Sveta Nedelja', 'sveta-nedelja', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(7, 'Sveti Ivan Zelina', 'sveti-ivan-zelina', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(8, 'Velika Gorica', 'velika-gorica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(9, 'Vrbovec', 'vrbovec', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(10, 'Zaprešić', 'zapresic', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(11, 'Donja Stubica', 'donja-stubica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(12, 'Klanjec', 'klanjec', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(13, 'Krapina', 'krapina', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(14, 'Oroslavje', 'oroslavje', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(15, 'Pregrada', 'pregrada', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(16, 'Zabok', 'zabok', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(17, 'Zlatar', 'zlatar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(18, 'Glina', 'glina', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(19, 'Hrvatska Kostajnica', 'hrvatska-kostajnica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(20, 'Kutina', 'kutina', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(21, 'Novska', 'novska', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(22, 'Petrinja', 'petrinja', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(23, 'Popovača', 'popovaca', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(24, 'Sisak', 'sisak', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(25, 'Duga Resa', 'duga-resa', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(26, 'Karlovac', 'karlovac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(27, 'Ogulin', 'ogulin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(28, 'Ozalj', 'ozalj', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(29, 'Slunj', 'slunj', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(30, 'Ivanec', 'ivanec', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(31, 'Lepoglava', 'lepoglava', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(32, 'Ludbreg', 'ludbreg', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(33, 'Novi Marof', 'novi-marof', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(34, 'Varaždin', 'varazdin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(35, 'Varaždinske Toplice', 'varazdinske-toplice', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(36, 'Đurđevac', 'durdevac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(37, 'Koprivnica', 'koprivnica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(38, 'Križevci', 'krizevci', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(39, 'Bjelovar', 'bjelovar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(40, 'Čazma', 'cazma', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(41, 'Daruvar', 'daruvar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(42, 'Garešnica', 'garesnica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(43, 'Grubišno Polje', 'grubisno-polje', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(44, 'Bakar', 'bakar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(45, 'Cres', 'cres', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(46, 'Crikvenica', 'crikvenica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(47, 'Čabar', 'cabar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(48, 'Delnice', 'delnice', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(49, 'Kastav', 'kastav', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(50, 'Kraljevica', 'kraljevica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(51, 'Krk', 'krk', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(52, 'Mali Lošinj', 'mali-losinj', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(53, 'Novi Vinodolski', 'novi-vinodolski', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(54, 'Opatija', 'opatija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(55, 'Rab', 'rab', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(56, 'Rijeka', 'rijeka', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(57, 'Vrbovsko', 'vrbovsko', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(58, 'Gospić', 'gospic', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(59, 'Novalja', 'novalja', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(60, 'Otočac', 'otocac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(61, 'Senj', 'senj', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(62, 'Orahovica', 'orahovica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(63, 'Slatina', 'slatina', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(64, 'Virovitica', 'virovitica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(65, 'Kutjevo', 'kutjevo', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(66, 'Lipik', 'lipik', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(67, 'Pakrac', 'pakrac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(68, 'Pleternica', 'pleternica', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(69, 'Požega', 'pozega', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(70, 'Nova gradiška', 'nova-gradiska', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(71, 'Slavonski Brod', 'slavonski-brod', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(72, 'Benkovac', 'benkovac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(73, 'Biograd na Moru', 'biograd-na-moru', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(74, 'Nin', 'nin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(75, 'Obrovac', 'obrovac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(76, 'Pag', 'pag', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(77, 'Zadar', 'zadar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(78, 'Beli Manastir', 'beli-manastir', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(79, 'Belišće', 'belisce', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(80, 'Donji Miholjac', 'donji-miholjac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(81, 'Đakovo', 'dakovo', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(82, 'Našice', 'nasice', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(83, 'Osijek', 'osijek', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(84, 'Valpovo', 'valpovo', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(85, 'Drniš', 'drnis', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(86, 'Knin', 'knin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(87, 'Skradin', 'skradin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(88, 'Šibenik', 'sibenik', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(89, 'Vodice', 'vodice', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(90, 'Ilok', 'ilok', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(91, 'Otok', 'otok', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(92, 'Vinkovci', 'vinkovci', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(93, 'Vukovar', 'vukovar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(94, 'Županja', 'zupanja', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(95, 'Hvar', 'hvar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(96, 'Imotski', 'imotski', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(97, 'Kaštela', 'kastela', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(98, 'Komiža', 'komiza', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(99, 'Makarska', 'makarska', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(100, 'Omiš', 'omis', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(101, 'Sinj', 'sinj', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(102, 'Solin', 'solin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(103, 'Split', 'split', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(104, 'Stari Grad', 'stari-grad', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(105, 'Supetar', 'supetar', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(106, 'Trilj', 'trilj', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(107, 'Trogir', 'trogir', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(108, 'Vis', 'vis', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(109, 'Vrgorac', 'vrgorac', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(110, 'Vrlika', 'vrlika', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(111, 'Buje-Buie', 'buje-buie', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(112, 'Buzet', 'buzet', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(113, 'Labin', 'labin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(114, 'Novigrad', 'novigrad', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(115, 'Pazin', 'pazin', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(116, 'Poreč', 'porec', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(117, 'Pula', 'pula', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(118, 'Rovinj', 'rovinj', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(119, 'Umag', 'umag', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(120, 'Vodnjan', 'vodnjan', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(121, 'Dubrovnik', 'dubrovnik', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(122, 'Korčula', 'korcula', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(123, 'Metković', 'metkovic', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(124, 'Opuzen', 'opuzen', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(125, 'Ploče', 'ploce', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(126, 'Čakovec', 'cakovec', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(127, 'Mursko Središće', 'mursko-sredisce', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(128, 'Prelog', 'prelog', '2016-12-14 18:03:22', '2016-12-14 18:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches`
--

CREATE TABLE `dispatches` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches_products`
--

CREATE TABLE `dispatches_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `dispatch_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dispatches_services`
--

CREATE TABLE `dispatches_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `dispatch_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imported_order_products`
--

CREATE TABLE `imported_order_products` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `from_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices_products`
--

CREATE TABLE `invoices_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `iso_tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `local_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `iso_tag`, `language`, `local_name`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', NULL, '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(2, 'hr', 'Croatian', 'Hrvatski', '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(3, 'de', 'German', 'Deutsch', '2016-12-14 18:03:20', '2016-12-14 18:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
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

CREATE TABLE `narudzbenice` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenice_products`
--

CREATE TABLE `narudzbenice_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `narudzbenica_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reminders`
--

CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_services`
--

CREATE TABLE `products_services` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_tags`
--

CREATE TABLE `products_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `name`, `permalink`, `created_at`, `updated_at`) VALUES
(1, 'Zagrebačka županija', 'zagrebacka-zupanija', '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(2, 'Krapinsko-zagorska županija', 'krapinsko-zagorska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(3, 'Sisačko-moslavačka županija', 'sisacko-moslavacka-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(4, 'Karlovačka županija', 'karlovacka-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(5, 'Varaždinska županija', 'varazdinska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(6, 'Koprivničko-križevačka županija', 'koprivnicko-krizevacka-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(7, 'Bjelovarsko-bilogorska županija', 'bjelovarsko-bilogorska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(8, 'Primorsko-goranska županija', 'primorsko-goranska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(9, 'Ličko-senjska županija', 'licko-senjska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(10, 'Virovitičko-podravska županija', 'viroviticko-podravska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(11, 'Požeško-slavonska županija', 'pozesko-slavonska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(12, 'Brodsko-posavska županija', 'brodsko-posavska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(13, 'Zadarska županija', 'zadarska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(14, 'Osječko-baranjska županija', 'osjecko-baranjska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(15, 'Šibensko-kninska županija', 'sibensko-kninska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(16, 'Vukovarsko-srijemska županija', 'vukovarsko-srijemska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(17, 'Splitsko-dalmatinska županija', 'splitsko-dalmatinska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(18, 'Istarska županija', 'istarska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(19, 'Dubrovačko-neretvanska županija', 'dubrovacko-neretvanska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(20, 'Međimurska županija', 'medimurska-zupanija', '2016-12-14 18:03:22', '2016-12-14 18:03:22'),
(21, 'Grad Zagreb', 'grad-zagreb', '2016-12-14 18:03:22', '2016-12-14 18:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(2, 'admin', '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(3, 'manager', '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(4, 'employee', '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(5, 'user', '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(6, 'anonymous', '2016-12-14 18:03:20', '2016-12-14 18:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `permalink`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1. tag', '1-tag', '1. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(2, '2. tag', '2-tag', '2. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(3, '3. tag', '3-tag', '3. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(4, '4. tag', '4-tag', '4. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(5, '5. tag', '5-tag', '5. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(6, '6. tag', '6-tag', '6. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(7, '7. tag', '7-tag', '7. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(8, '8. tag', '8-tag', '8. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(9, '9. tag', '9-tag', '9. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(10, '10. tag', '10-tag', '10. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(11, '11. tag', '11-tag', '11. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(12, '12. tag', '12-tag', '12. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(13, '13. tag', '13-tag', '13. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(14, '14. tag', '14-tag', '14. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL),
(15, '15. tag', '15-tag', '15. description', '2016-12-14 18:03:22', '2016-12-14 18:03:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `mjesto` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `web` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `iban` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci,
  `region` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oib` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `consumer_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `consumer_secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_group`, `email`, `password`, `first_name`, `last_name`, `address`, `city`, `mjesto`, `zip`, `country`, `fax`, `mobile`, `phone`, `web`, `iban`, `note`, `region`, `image`, `oib`, `company_name`, `client_type`, `remember_token`, `verify_code`, `language`, `consumer_key`, `consumer_secret`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', '', 'admin@gmail.com', '$2y$10$teAu76MDHnmVoEgvurWmsO0wpBFGqTgYSXMzYd1qE7S2uaz/x0S.e', 'Ivan', 'Horvat', 'Sunčana ulica 365', 83, NULL, NULL, NULL, '', '', '0959039610', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:20', '2016-12-14 18:03:20'),
(2, 'jbarnese', 'client', 'jbarnese@blogger.com', '$2y$10$0VFXx0rVeCTTUQ07vfQqqe0KDX9jYAm2K6.WSixhAyV/ITEq.Qf6S', 'Joyce', 'Barnese', '56 Sherman Lane', 83, NULL, '30000', NULL, '', '', '8912824968', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(3, 'fbrownb', 'client', 'fbrownb@weebly.com', '$2y$10$W.CidvfFDZ48g8ajjyOiDOZSU/vEQBJd6cuGl6jwTN9n46OH.F4jS', 'Fred', 'Brown', '2014 Hoffman Parkway', 83, NULL, '31000', NULL, '', '', '5237464341', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(4, 'blanec', 'client', 'blanec@businessweek.com', '$2y$10$I7/QBMC6fdbEFUbwcFQm9e2cWdgmo45p9Arz55Mu57ZdsVbJny8r6', 'Brian', 'Lane', '1 Hanover Street', 83, NULL, '32000', NULL, '', '', '2024359010', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(5, 'shayesd', 'client', 'shayesd@hubpages.com', '$2y$10$1VwPmLnIFu5D.84oE/NRAOxQlXRhoOsTNe8PAXXwZy6aPgK41Ntui', 'Shiley', 'Hayes', '3 Quincy Way', 83, NULL, '33000', NULL, '', '', '2253961257', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(6, 'epeters8', 'client', 'epeters8@dagondesign.com', '$2y$10$VLpRFc1jquV307aE4auF.upjZCbu1RiqRXgGZyrh/OGCFmqvopFfa', 'Eugene', 'Peters', '82 Duke Avenue', 83, NULL, '34000', NULL, '', '', '3984360132', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(7, 'wgraham9', 'client', 'wgraham9@marriott.com', '$2y$10$4GNPmUb84TET7D0zZ5149eZOyuTzcg1hYiMm8mXWNHOWMq0w8vB.i', 'Willie', 'Graham', '53 Carey Parkway', 83, NULL, '35000', NULL, '', '', '8912824968', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(8, 'achapmana', 'client', 'achapmana@wordpress.org', '$2y$10$zGS1YsKfQMhC6JfVIPBeRuAeouDmpJbW2BmX4kBOfR6kS59RSTtI.', 'Andrew', 'Chapman', '0 Gale Trail', 83, NULL, '36000', NULL, '', '', '9292275546', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(9, 'cfreeman7', 'client', 'cfreeman7@jimdo.com', '$2y$10$8H47hc790.YpsfGZowPdKuK.ph84FPR3SFIe6XBee6YT8nZKeJNm6', 'Clarence', 'Freeman', '0621 Spaight Way', 83, NULL, '37000', NULL, '', '', '2822200509', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(10, 'erogers6', 'client', 'erogers6@tamu.edu', '$2y$10$yiZKrpGKiuv.PrTjo67Ez.VtAUI0jB1SXq80L4shhmvI8QI/ovKNW', 'Emily', 'Rogers', '969 Parkside Park', 83, NULL, '38000', NULL, '', '', '4589807140', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(11, 'wlittle5', 'client', 'wlittle5@tuttocitta.it', '$2y$10$CyFD6FDlZNzlQ94lt0UrjO6eofDOyvIBowIA7qyoRoNIBx14k39Dy', 'Wanda', 'Little', '12 Hauk Place', 83, NULL, '39000', NULL, '', '', '8171047682', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(12, 'rdiaz4', 'client', 'rdiaz4@canalblog.com', '$2y$10$2S/XvaMT3UA5ouISLjc0r.h801HBBxAVyZpgWHEf.gxn0ZryFB066', 'Rebecca', 'Diaz', '85646 Cottonwood Parkway', 83, NULL, '40000', NULL, '', '', '9211325551', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(13, 'bcastillo3', 'client', 'bcastillo3@deviantart.com', '$2y$10$Oe/zRsRH4Gp17v1F7SDRouMmRXDN8UTZ6K48E90PIcij6X.zoUZii', 'Bonnie', 'Castillo', '30 Acker Center', 83, NULL, '41000', NULL, '', '', '9396412064', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(14, 'jgomez2', 'client', 'jgomez2@imdb.com', '$2y$10$PTE.rNCiZkM9JGX6bT4Ak.JeN5hcRvV59sn5iwoH1N1GYa5WoXjTy', 'Jacqueline', 'Gomez', '08 Towne Place', 83, NULL, '42000', NULL, '', '', '9396412064', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(15, 'kday0', 'client', 'kday0@walmart.com', '$2y$10$hp67Lyypt3x7vzvQXVeQG.9qpLm0dUkbM0suFlydKZTJZdFij6bNa', 'Kathleen', 'Day', '53964 Spenser Trail', 83, NULL, '43000', NULL, '', '', '7732294081', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21'),
(16, 'bcarter1', 'client', 'bcarter1@auda.org.au', '$2y$10$tH4r/w0CmESbYLV4iV7O.uDLknSZs5gWVvoT9s21B9SfAdpDFv1Uy', 'Barbara', 'Carter', '697 Jenifer Way', 83, NULL, '44000', NULL, '', '', '8326578470', '', '', NULL, 14, '', NULL, NULL, NULL, NULL, NULL, 1, '', '', NULL, '2016-12-14 18:03:21', '2016-12-14 18:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `workingorders`
--

CREATE TABLE `workingorders` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workingorders_services`
--

CREATE TABLE `workingorders_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `workingorder_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` float(8,2) NOT NULL,
  `discount` float(8,2) NOT NULL,
  `taxpercent` float(8,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_user_id_foreign` (`user_id`),
  ADD KEY `assigned_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatches`
--
ALTER TABLE `dispatches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatches_products`
--
ALTER TABLE `dispatches_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispatches_services`
--
ALTER TABLE `dispatches_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imported_order_products`
--
ALTER TABLE `imported_order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices_products`
--
ALTER TABLE `invoices_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_products_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoices_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_iso_tag_unique` (`iso_tag`);

--
-- Indexes for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzbenice_products`
--
ALTER TABLE `narudzbenice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reminders`
--
ALTER TABLE `password_reminders`
  ADD KEY `password_reminders_email_index` (`email`),
  ADD KEY `password_reminders_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_attributes_product_id_foreign` (`product_id`),
  ADD KEY `products_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_product_id_foreign` (`product_id`),
  ADD KEY `products_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `products_services`
--
ALTER TABLE `products_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_tags`
--
ALTER TABLE `products_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_tags_product_id_foreign` (`product_id`),
  ADD KEY `products_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_language_foreign` (`language`);

--
-- Indexes for table `workingorders`
--
ALTER TABLE `workingorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workingorders_services`
--
ALTER TABLE `workingorders_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dispatches`
--
ALTER TABLE `dispatches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dispatches_products`
--
ALTER TABLE `dispatches_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dispatches_services`
--
ALTER TABLE `dispatches_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imported_order_products`
--
ALTER TABLE `imported_order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invoices_products`
--
ALTER TABLE `invoices_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `narudzbenice`
--
ALTER TABLE `narudzbenice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `narudzbenice_products`
--
ALTER TABLE `narudzbenice_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offers_products`
--
ALTER TABLE `offers_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products_services`
--
ALTER TABLE `products_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `products_tags`
--
ALTER TABLE `products_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `workingorders`
--
ALTER TABLE `workingorders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workingorders_services`
--
ALTER TABLE `workingorders_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
